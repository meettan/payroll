<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class SaleModel extends CI_Model{					/*Insert Data in Tables*/
		public function f_insert($table_name, $data_array) {

			$this->db->insert($table_name, $data_array);

			return;

		}
			/*Update table data*/
		public function f_edit($table_name, $data_array, $where) {

			$this->db->where($where);
			$this->db->update($table_name, $data_array);

			return;

		}
/*Select Data from a table*/		
		public function f_select($table,$select=NULL,$where=NULL,$type){
			if(isset($select)){
				$this->db->select($select);
			}
			if(isset($where)){
				$this->db->where($where);
			}
			$value = $this->db->get($table);
			if($type==1){
				return $value->row();
			}else{
				return $value->result();
			}
		}
		
		public function f_get_receiptReport_dtls($trans_do)
		{
	
		  $sql = $this->db->query("SELECT a.trans_do ,b.prod_desc ,b.hsn_code,b.gst_rt,c.soc_name,c.soc_add,
		                           c.gstin,c.mfms,a.trans_no,a.do_dt,a.sale_due_dt,a.trans_type,a.soc_id,
								   a.comp_id, a.sale_ro,a.stock_point,a.gov_sale_rt,a.qty,a.sale_rt,
								   a.base_price,a.taxable_amt,a.cgst,a.sgst,a.dis,a.tot_amt,a.paid_amt
								   from td_sale a  ,mm_product b,mm_ferti_soc c
								   where a.prod_id=b.prod_id
								   and a.soc_id=c.soc_id
								   and a.trans_do='$trans_do'");
											
		  return $sql->row();
	
		}


		public function f_get_saleinv_tot($trans_do)
		{
	
		  $sql = $this->db->query("SELECT a.trans_do ,sum(a.qty)as qty,sum(a.base_price) as base_price,
									sum(a.taxable_amt)as taxable_amt,sum(a.cgst)as cgst,sum(a.sgst)as sgst,
									sum(a.cgst+a.sgst)as tot_gst,sum(a.dis)as dis,sum(a.tot_amt)as tot_amt,
									sum(a.paid_amt) as paid_amt,ROUND(sum(a.tot_amt))as to_amt_rnd
									from td_sale a 
									where  a.trans_do='$trans_do'");
											
		  return $sql->row();
	
		}
   
		public function get_trans_no($fin_id,$branch_id){

			$sql="select ifnull(max(trans_no),0) + 1 trans_no
					 from td_sale where fin_yr = '$fin_id' AND br_cd= '$branch_id'";

		  $result = $this->db->query($sql);     
	  
		  return $result->row();

	  }
	  

	  
		public function js_get_stock_qty($ro)
		{

		$sql = $this->db->query("SELECT a.stock_qty -  (select  ifnull(sum(qty) ,0) from td_sale where sale_ro ='$ro') stkqty,a.prod_id ,b.gst_rt ,b.prod_id,b.prod_desc,a.unit,c.unit_name FROM td_purchase a ,mm_product b ,mm_unit c WHERE a.prod_id=b.prod_id and a.unit=c.id and  a.ro_no = '$ro'");
			return $sql->row();
		}

		public function js_get_sale_rate($br_cd,$comp_id,$ro_dt,$prod_id)
		{

		/*$sql = $this->db->query("SELECT a.catg_id,b.cate_desc
									from  mm_sale_rate a,
	   					                  mm_category b    							   							
					                     where  a.catg_id = b.sl_no
					                     and a.district='$br_cd'
			                             and a.comp_id='$comp_id'
			                             and a.prod_id ='$prod_id'
			                             and '$ro_dt' BETWEEN a.frm_dt and a.to_dt");  */

			                             $sql = $this->db->query("SELECT a.catg_id,b.cate_desc
									from  mm_sale_rate a,
	   					                  mm_category b    							   							
					                     where  a.catg_id = b.sl_no
					                     and a.district='$br_cd'
			                             and a.comp_id='$comp_id'
			                             and a.prod_id ='$prod_id'
			                         and a.frm_dt =(select  max(frm_dt) from mm_sale_rate where frm_dt<='$ro_dt')");

			return $sql->result();
		}

		public function get_sale_rate($br_cd,$comp_id,$ro_dt,$prod_id,$category)
		{

		/*$sql = $this->db->query("SELECT sp_mt
									from  mm_sale_rate		   							
					                     where  catg_id = '$category'
					                     and district='$br_cd'
			                             and comp_id='$comp_id'
			                             and prod_id ='$prod_id'
			                             and '$ro_dt' BETWEEN frm_dt and to_dt");*/
		 $sql = $this->db->query("SELECT sp_mt
									from  mm_sale_rate		   							
					                     where  catg_id = '$category'
					                     and district='$br_cd'
			                             and comp_id='$comp_id'
			                             and prod_id ='$prod_id'
			                             and frm_dt =(select  max(frm_dt) from mm_sale_rate where frm_dt<='$ro_dt')");
			return $sql->row();
		}
		public function get_govsale_rate($br_cd,$comp_id,$ro_dt,$prod_id,$category,$gov_sale_rt)
		{

			if($gov_sale_rt =="N"){
									 $sql = $this->db->query("SELECT sp_mt as rate
														     from  mm_sale_rate
										                     where  catg_id = '$category'
										                     and district='$br_cd'
								                             and comp_id='$comp_id'
								                             and prod_id ='$prod_id'
								                             and '$ro_dt' BETWEEN frm_dt and to_dt");
			}else{
									$sql = $this->db->query("SELECT sp_govt  as rate
														     from  mm_sale_rate
										                     where  catg_id = '$category'
										                     and district='$br_cd'
								                             and comp_id='$comp_id'
								                             and prod_id ='$prod_id'
								                             and '$ro_dt' BETWEEN frm_dt and to_dt");
			}

		
			return $sql->row();
		}

		public function js_get_stock_point($ro_no){


			$query = $this->db->query("select a.soc_id,a.soc_name
									from  mm_ferti_soc a,td_purchase b    							   							
					  where  a.soc_id = b.stock_point
					  and    a.stock_point_flag = 'Y'
					  and    b.ro_no            = '$ro_no'
					   ");

				
			
				return $query->row();
		}

		public function get_advance($soc_id){

		$sql = $this->db->query("select (ifnull(sum(in_adv),0) - ifnull(sum(out_adv),0) )advance_balance
								from (
								        SELECT ifnull(sum(adv_amt),0)in_adv,0 out_adv
								        FROM   `tdf_advance` 
								        where soc_id = '$soc_id'
								        and trans_type = 'I'
								        UNION
								        SELECT 0 in_adv,ifnull(sum(adv_amt),0)out_adv 
								        FROM `tdf_advance` 
								        where soc_id = '$soc_id' 
								        and trans_type = 'O') b");
			return $sql->row();

		}
		
		public function get_recv_amt($soc_id){

			$sql = $this->db->query("select ifnull(sum(tot_amt),0)- ifnull(sum(paid_amt),0) as recv_amt
			                         from td_sale
									  where soc_id = '$soc_id' ");
				return $sql->row();
	
			}
			
			public function get_virtual_point($ro){

				$sql = $this->db->query("select count(*) as ro_cnt
										 from tdf_virtual_stk_pnt
										  where ro_no = '$ro' ");
					return $sql->row();
		
				}
			
		public function f_get_drnote_dtls(){

		$data = $this->db->query("select a.comp_id,a.ro_no,a.ro_dt,a.invoice_no, sum(a.soc_amt) as tot_amt,b.COMP_NAME COMP_NAME
									from  td_dr_note a,
	   					    mm_company_dtls b    							   							
					  where  a.comp_id = b.COMP_ID
									group by comp_id,ro_no,ro_dt,invoice_no,COMP_NAME");

		
		 return $data->result();
		
			
		}
		public function f_get_crnote_dtls(){
			// $user_id    = $this->session->userdata('login')->user_id;
	
		$data = $this->db->query("select comp_id,do_no,do_dt,invoice_no, sum(br_amt) as tot_amt
									from td_cr_note 
									group by comp_id,do_no,do_dt,invoice_no");
	
		return $data->result();
			
		}

			 //  Function For Credit Note Developed By Lokesh  08/04/2020//
		public function credit_amt(){
		   $data=$this->db->query("Select a.comp_id comp_id,a.do_no do_no,a.do_dt do_dt,a.invoice_no invoice_no,a.invoice_dt  invoice_dt,sum(a.br_amt) as tot_amt,b.COMP_NAME COMP_NAME
       							
       						from  td_cr_note a,
	   					    mm_company_dtls b    							   							
					  where  a.comp_id = b.COMP_ID
					
					  group by comp_id,do_no,do_dt,invoice_no,invoice_dt,COMP_NAME");

				return $data->result();
		}

        //  Function For Credit Note Developed By Lokesh  11/04/2020//
		public function f_getdo_dtl($branch_id){
	
		$data = $this->db->query("select do_no
									from td_cr_note 
									where branch_id = '$branch_id'

									group by do_no");
	
		return $data->result();
			
		}
		public function f_get_ro_dtls($ro_no) // For Jquery
        {

            $sql = $this->db->query("SELECT a.invoice_no,a.invoice_dt,a.due_dt,a.qty,a.no_of_bags ,a.comp_id,a.prod_id,b.gst_no,c.hsn_code,b.comp_name,c.gst_rt,a.br
			FROM td_purchase a ,mm_company_dtls b,mm_product c
			WHERE a.ro_no ='$ro_no'
			and a.comp_id=b.comp_id
			and a.prod_id=c.prod_id");
            return $sql->result();

		}

		public function f_get_particulars_in($table_name, $where_in=NULL, $where=NULL) {

			if(isset($where)){
	
				$this->db->where($where);
	
			}
	
			if(isset($where_in)){
	
				$this->db->where_in('sl_no', $where_in);
	
			}
			
			$result	=	$this->db->get($table_name);
	
			return $result->result();
	
		}
	
		
		public function f_get_sales_dtls($banch_id,$fin_id){
			// $user_id    = $this->session->userdata('login')->user_id;
			
	
		$data = $this->db->query("select trans_do,do_dt,trans_type, sum(tot_amt) as tot_amt
									from td_sale
									where br_cd='$banch_id' 
									and fin_yr='$fin_id'
									group by trans_do,do_dt,trans_type");
	
		 return $data->result();
		
			
		}
   // Code Written By lokesh Kumar jha on 02/04/2020  //
       public function f_get_particulars($table_name, $select=NULL, $where=NULL, $flag) {
        
        if(isset($select)) {

            $this->db->select($select);

        }

        if(isset($where)) {

            $this->db->where($where);

        }

        $result		=	$this->db->get($table_name);

        if($flag == 1) {

            return $result->row();
            
        }else {

            return $result->result();

        }

       }


/*Select Maximun soceity Code*/
		public function get_soceity_code(){

			$this->db->select_max('soc_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_ferti_soc')->row()->soc_id;  
 
			return ($result+1);
		 }
		/*Select Maximun product Code*/
		public function get_product_code(){

			$this->db->select_max('prod_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_product')->row()->prod_id;  
 
			return ($result+1);
		 }
		 
		 /*Select Maximun comapany Code*/
		 public function get_company_code(){

			$this->db->select_max('comp_id');
 
			// $this->db->where('acc_type', $acc_type);
			
			$result = $this->db->get('mm_company_dtls')->row()->comp_id;  
 
			return ($result+1);
		 }
//Generate new schedule code accoring to acc_type(Liability 1,Asset 2,Income 5,Expense 6,Purchase 3,Sale 4)
		public function get_sch_code($acc_type){

		   $this->db->select_max('schedule_code');

		   $this->db->where('acc_type', $acc_type);
		   
		   $result = $this->db->get('md_schedule_heads')->row()->schedule_code;  

           return ($result+1);
		}

		public function get_subsch_code($sch_code,$acc_type){

		   $this->db->select_max('subschedule_code');
		   $this->db->where('acc_type', $acc_type);
		   $this->db->where('schedule_code', $sch_code);
           $result = $this->db->get('md_subschedule_heads')->row()->subschedule_code;  

           return ($result+1);
		}

/*Delete From Table*/
		public function f_delete($table_name, $where) {			

			$this->db->delete($table_name, $where);
			// echo $this->db->last_query();
			//  die();
			 return;
		}

/*Select Maximun Account Code*/
		public function f_max_no($sub_sch){

			$this->db->select_max('acc_code');

			$this->db->where('sub_sch_code', $sub_sch);

			$result = $this->db->get('md_account_heads');

			if($result->num_rows() > 0){

				return $result->row();

			}else{

			       return 0;	   	
			}	    
		}

		public function f_select_parameter($value){		      /*Select parameter value from table */
			$this->db->select('param_value');

			$this->db->where('sl_no',$value);

			$data = $this->db->get('md_parameters');

			if($data->num_rows() > 0){
				return $data->row();
			}else{
				return 0;	
			}
		}

		public function f_get_voucher_id_all($start_dt,$end_dt){   /*Get All Voucher ID*/		

			$this->db->distinct();

			$this->db->select('voucher_id');

			$this->db->where('voucher_date>=',$start_dt);

			$this->db->where('voucher_date<=',$end_dt);

			$this->db->where('approval_status','A');

			$result=$this->db->get('td_vouchers');

             return $result->result();
                }


		public function f_get_voucher_id($sys_date){

			$this->db->select_max('voucher_id');

			$this->db->where('voucher_date',$sys_date);

			$this->db->where('approval_status','A');

			$result=$this->db->get('td_vouchers');

			if($result->num_rows() > 0 ){
				
				return $result->row();
			}	
				else{
					return 0;
				 }
		}

		public function f_get_vouchers($start_dt,$end_dt,$voucher_id){

			 $vouchers=$this->db->query("select voucher_date,voucher_id,
						            voucher_mode,acc_code,
						            amount dr_amt,0 
						            cr_amt,remarks,
						            ins_no,ins_dt
						     from   td_vouchers
						     where  dr_cr_flag = 'Dr'
						     and    approval_status ='A'
						     and    voucher_date Between '$start_dt' And '$end_dt'
						     and    voucher_id = $voucher_id 
						     UNION
						     select voucher_date,voucher_id,
							    voucher_mode,acc_code,
							    0 dr_amt,
							    amount cr_amt,remarks,
							    ins_no,ins_dt
						     from   td_vouchers
						     where dr_cr_flag = 'Cr'
						     and    approval_status = 'A'
						     and    voucher_date Between '$start_dt' And '$end_dt'
						     and    voucher_id = $voucher_id 
						     order by voucher_date,voucher_id"); 
			 return $vouchers->result();
		}

		public function f_get_ac_code($acc_code){
			$this->db->select('acc_head');
			$this->db->where('acc_code',$acc_code);
			$result = $this->db->get('md_account_heads'); 
			return $result->row();
		}


		public function f_gl_report($start_dt,$end_dt,$acc_code){
		  $data=$this->db->query("select voucher_date,voucher_id,voucher_mode,ins_no,
       						     ins_dt,remarks,amount cr_amt,0 dr_amt,acc_code
       				  from   td_vouchers
					  where  dr_cr_flag = 'Cr'
					  and    voucher_date Between '$start_dt' And '$end_dt'
					  and    acc_code = $acc_code
					  UNION
					  select voucher_date,voucher_id,voucher_mode,ins_no,
       					  ins_dt,remarks,0 cr_amt,amount dr_amt,acc_code
       					  from   td_vouchers
					  where dr_cr_flag = 'Dr'
					  and    voucher_date Between '$start_dt' And '$end_dt'
					  and    acc_code = $acc_code
					  order by voucher_date,voucher_id");

				return $data->result();
		}

		public function f_opening_bal($adt_dt,$acc_code){
			$data=$this->db->query("select f_getopening('$adt_dt',$acc_code)opn_bal from Dual");
			return $data->row();
		}	

		public function f_closing_bal($adt_dt,$acc_code){
			$data=$this->db->query("select f_getclosing('$adt_dt',$acc_code)cls_bal from Dual");
			return $data->row();
		}
	
		public function f_trial_balance($adt_dt){
			$data=$this->db->query("select a.balance_dt,a.acc_code acc_code,
	   					       b.sch_code sch_code,
       						       c.schedule_type schedule_type,
	   					       b.acc_head acc_head,
	   					       a.balance_amt cr_amt,
     						       0 dr_amt
						from   tm_account_balance a,
	   					       md_account_heads b,
       						       md_schedule_heads c
						where  a.acc_code = b.acc_code
						and    b.sch_code = c.schedule_code
						and    a.balance_dt = (select max(balance_dt)
                       						       from   tm_account_balance
                       						       where  balance_dt <= '$adt_dt')
						and    a.balance_amt < 0
						UNION
						select a.balance_dt,a.acc_code acc_code,
	   					       b.sch_code sch_code,
       						       c.schedule_type schedule_type,
	   					       b.acc_head acc_head,
	   					       0 cr_amt,a.balance_amt dr_amt
						from   tm_account_balance a,
	   					       md_account_heads b,
       						       md_schedule_heads c
						where  a.acc_code = b.acc_code
						and    b.sch_code = c.schedule_code
						and    a.balance_dt = (select max(balance_dt)
                     						       from   tm_account_balance
                     						       where  balance_dt <= '$adt_dt')
						and    a.balance_amt > 0
						order by sch_code,acc_code");
			return $data->result();	

		}

		public function f_cash_book($from_dt,$to_dt){
			$data = $this->db->query("Select a.acc_code acc_code,
	   						 b.acc_head acc_head,
       							 sum(a.dr_amt)dr_amt,
       							 sum(a.cr_amt)cr_amt
						  from(select acc_code,Sum(amount) dr_amt,0 cr_amt from td_vouchers
						       where  voucher_date = '$from_dt'
						       and    dr_cr_flag = 'Dr'
						       and    voucher_mode = 'C'
					   	       and    acc_code <> 21101
						       group by acc_code     
						       UNION
						       select acc_code,0 dr_amt,Sum(amount) cr_amt from td_vouchers
						       where  voucher_date = '$to_dt'
						       and    dr_cr_flag = 'Cr'
						       and    voucher_mode = 'C'
						       and    acc_code <> 21101
						       group by acc_code)a,
						       md_account_heads b
						 where a.acc_code = b.acc_code
					         group by acc_code
						 ORDER BY acc_code");
			return $data->result();	
		}
    //  Function For Stock Report Developed By Lokesh  01/04/2020//
		public function stockreport($start_dt){
		   $data=$this->db->query("Select a.PROD_ID PROD_ID,a.COMPANY COMPANY,
	   						 a.PROD_DESC PROD_DESC,
       							 sum(b.qty) qty   

       						from   mm_product a,
	   					    td_purchase b    							   							
					  where  a.PROD_ID = b.prod_id
					
					  group by PROD_DESC,qty,PROD_ID,COMPANY");

				return $data->result();
		}

		public function f_get_stock_view($banch_id){
			$data=$this->db->query("select ro_no,ro_dt,invoice_no,invoice_dt,challan_flag from td_purchase
									where br='$banch_id' order by ro_dt,ro_no");
			return $data->result();

		}
   // Function For Stock Report Developed By Lokesh  13/04/2020//
		public function get_crnote_dist_report($banch_id){

                 $data=$this->db->query("select a.do_no,a.do_dt,a.tot_cr_amt,b.COMP_NAME 

       						from   td_cr_note a,
	   					    mm_company_dtls b  

					  where  a.comp_id = b.COMP_ID
                        and  a.branch_id = '$banch_id'
            				group by do_no,do_dt,tot_cr_amt,COMP_NAME");
              
				return $data->result();
		}

		public function get_crnote_comp_report($comp_id){


			  $data=$this->db->query("select a.do_no,a.do_dt,a.tot_cr_amt,a.branch_id,b.COMP_NAME ,c.district_name

       						from   td_cr_note a,
	   					    mm_company_dtls b,md_district c

					  where  a.comp_id = b.COMP_ID
					    and  a.branch_id =c.district_code
                        and  a.comp_id = '$comp_id'
            				group by do_no,do_dt,tot_cr_amt,branch_id,COMP_NAME,district_name");
              
				return $data->result();



		}
   // Code Devoleped For get Remain Amount Money Of Cr Of Company 15/04/2020/
		public function get_crnote_remain_report($comp_id){

			  $data=$this->db->query("select ro_no,branch_id,ifnull(sum(soc_amt),0) as soc_amt

       						from   td_dr_note
	   					   
					  where comp_id = '$comp_id'
					   
            				group by ro_no,branch_id");
              
				return $data->result();

		}

		// Function For Stock Report Developed By Lokesh  16/04/2020//
		public function get_drdist_report($banch_id){

                 $data=$this->db->query("select a.ro_no,a.tot_amt,ifnull(sum(a.soc_amt),0) as soc_amt,b.soc_name 

       						from   td_dr_note a,
	   					    mm_ferti_soc b  

					  where  a.soc_id = b.soc_id
                        and  a.branch_id = '$banch_id'
            				group by ro_no,tot_amt,soc_name");
              
				return $data->result();
		}


	}
?>
