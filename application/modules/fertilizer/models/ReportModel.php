<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ReportModel extends CI_Model{

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

        public function f_get_product_list($branch,$frmDt){
            /*$query  = $this->db->query("select a.PROD_ID,a.PROD_DESC,a.COMPANY,a.unit,b.COMP_ID,
                                     b.COMP_NAME,b.short_name
                              from   mm_product a,mm_company_dtls b
                              where  a.COMPANY = b.COMP_ID
                              order by a.COMPANY,a.PROD_ID");*/

            $query  = $this->db->query("select Distinct a.prod_id,b.PROD_DESC,a.comp_id,a.unit,
                                        c.COMP_NAME,c.short_name
                                from   td_purchase a,mm_product b,mm_company_dtls c
                                where  a.prod_id = b.PROD_ID
                                and    a.comp_id = c.COMP_ID
                                and    a.trans_dt >= '$frmDt'
                                and     a.br       = $branch
                                order by a.comp_id,a.prod_id");

            return $query->result();
        }

        public function f_get_product_list_companywise($branch,$frmDt,$comp_id){
           

            $query  = $this->db->query("select Distinct a.prod_id,a.ro_no,b.PROD_DESC,a.comp_id,a.unit,
                                        c.COMP_NAME,c.short_name
                                from   td_purchase a,mm_product b,mm_company_dtls c
                                where  a.prod_id = b.PROD_ID
                                and    a.comp_id = c.COMP_ID
                                and    a.comp_id = '$comp_id'
                                and    a.trans_dt >= '$frmDt'
                                and     a.br       = $branch
                                order by a.comp_id,a.prod_id");

            return $query->result();
        }

        public function f_get_district_asc(){

            $query  = $this->db->query("SELECT * FROM `md_branch` order by branch_name asc");
            
            return $query->result();

        }

        public function f_get_salerateho($comp_id,$district,$frm_date,$to_date,$fin_id){

            $sql ="SELECT `a`.`frm_dt`, `a`.`to_dt`, `a`.`catg_id`, `a`.`sp_mt`, `a`.`sp_bag`, `a`.`sp_govt`, `b`.`cate_desc`, `c`.`PROD_DESC` FROM `mm_sale_rate` `a`, `mm_category` `b`, `mm_product` `c` WHERE `a`.`catg_id` = `b`.`sl_no` AND `a`.`prod_id` = `c`.`PROD_ID` AND `a`.`comp_id` = '$comp_id' AND `a`.`district` = '$district' AND `a`.`frm_dt` >= '$frm_date' AND `a`.`frm_dt` <= '$to_date' AND `a`.`fin_id` = '$fin_id' order by c.PROD_DESC,b.cate_desc,a.frm_dt" ;
            
            $query  = $this->db->query($sql);

            return $query->result();

        }


        //  public function f_get_product_comp_prod_ro($branch,$frmDt,$comp_id,$prod_id,$ro){
           

        //     $query  = $this->db->query("select Distinct a.prod_id,d.sale_ro,b.PROD_DESC,a.comp_id,a.unit,d.do_dt,d.trans_do,
        //                                 c.COMP_NAME,c.short_name
        //                         from   td_purchase a,mm_product b,mm_company_dtls c,td_sale d
        //                         where  a.prod_id = b.PROD_ID
        //                         and    a.comp_id = c.COMP_ID
        //                         and    a.ro_no   = d.sale_ro
        //                         and    a.comp_id = '$comp_id'
        //                         and    a.prod_id = '$prod_id'
        //                         and    d.sale_ro   = '$ro'
        //                         and    d.sale_due_dt >= '$frmDt'
        //                         and    a.br       = $branch
        //                         order by a.comp_id");

        //     return $query->result();
        // }

         public function f_get_product_comp_prod_ro($branch,$frmDt,$to_dt,$comp_id,$prod_id,$ro){

           
            // $query  = $this->db->query("select Distinct a.prod_id,d.sale_ro,b.PROD_DESC,a.comp_id,a.unit,
            //                             c.COMP_NAME,c.short_name
            //                     from   td_purchase a,mm_product b,mm_company_dtls c,td_sale d
            //                     where  a.prod_id = b.PROD_ID
            //                     and    a.comp_id = c.COMP_ID
            //                     and    a.ro_no   = d.sale_ro
            //                     and    a.comp_id = '$comp_id'
            //                     and    a.prod_id = '$prod_id'
            //                     and    d.sale_ro   = '$ro'
            //                     and    d.sale_due_dt >= '$frmDt'
            //                     and    a.br       = $branch
            //                     order by a.comp_id");

            $query =$this->db->query("select a.prod_id,a.ro_no,a.comp_id,a.unit,b.COMP_NAME,c.PROD_DESC,b.short_name
                                            from td_purchase a,mm_company_dtls b,mm_product c
                                            where a.comp_id =b.comp_id
                                            and   a.prod_id = c.prod_id
                                            and a.br  = $branch
                                            and   a.trans_dt between '$frmDt' and '$to_dt'
                                            and   a.trans_flag = 1
                                            and   a.ro_no      = '$ro'
                                            UNION
                                            select a.prod_id,a.sale_ro,a.comp_id,a.unit,b.COMP_NAME,c.PROD_DESC,b.short_name
                                            from td_sale a,mm_company_dtls b,mm_product c
                                            where a.comp_id =b.comp_id
                                            and   a.prod_id = c.prod_id
                                            and a.br_cd     = $branch
                                            and   a.do_dt between '$frmDt' and '$to_dt'
                                            and   a.sale_ro    ='$ro'");


            

            return $query->result();      

           
        }

        public function f_get_balance($branch,$frmDt,$toDt){

            $data = $this->db->query("Select prod_id,ifnull(Sum((qty + tot_pur) - tot_sale),0) as opn_qty,0 tot_pur,0 tot_sale
									  from (
                                            select prod_id,ifnull(qty,0)qty,0 tot_pur,0 tot_sale
											from tdf_opening_stock
                                            where branch_id	    = $branch
                                            and   balance_dt    = '$frmDt'
											UNION
                                            select prod_id, 0 qty,ifnull(sum(qty),0)tot_pur,0 tot_sale
											from td_purchase
                                            where br	    = $branch
                                            and   trans_dt between '$frmDt' and '$toDt'
                                            and   trans_flag = 1
											group by prod_id
											UNION
											select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale
											from td_sale
                                            where br_cd	    = $branch
                                            and   do_dt between '$frmDt' and '$toDt'
											group by prod_id)a
                                        group by prod_id
                                        order by prod_id");

			if($data->num_rows() > 0 ){
				$row = $data->result();
			}else{
				$row = 0;
			}
			return $row;
        }

        public function f_get_balance_rowise($branch,$frmDt,$toDt){

            $data = $this->db->query("Select prod_id,ifnull(Sum((qty + tot_pur) - tot_sale),0) as opn_qty,0 tot_pur,0 tot_sale,ro_no 
                                      from (
                                            select prod_id,ifnull(qty,0)qty,0 tot_pur,0 tot_sale,ro_no
                                            from tdf_opening_stock
                                            where branch_id     = $branch
                                            and   balance_dt    = '$frmDt'
                                            UNION
                                            select prod_id, 0 qty,ifnull(sum(qty),0)tot_pur,0 tot_sale,ro_no
                                            from td_purchase
                                            where br        = $branch
                                            and   trans_dt between '$frmDt' and '$toDt'
                                            and   trans_flag = 1
                                            group by prod_id,ro_no
                                            UNION
                                            select prod_id,0 qty,0 tot_pur,ifnull(sum(qty),0) tot_sale,sale_ro
                                            from td_sale
                                            where br_cd     = $branch
                                            and   do_dt between '$frmDt' and '$toDt'
                                            group by prod_id,sale_ro)a
                                        group by prod_id,ro_no
                                        order by prod_id");

            if($data->num_rows() > 0 ){
                $row = $data->result();
            }else{
                $row = 0;
            }
            return $row;
        }
        
        public function f_get_purchase($branch,$frmDt,$toDt){
            $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_pur
                                        from td_purchase
                                        where br	    = $branch
                                        and   trans_dt between '$frmDt' and '$toDt'
                                        and   trans_flag = 1
                                        group by prod_id");

            return $query->result();
        }

        public function f_get_purchase_rowise($branch,$frmDt,$toDt){
            $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_pur,ro_no
                                        from td_purchase
                                        where br        = $branch
                                        and   trans_dt between '$frmDt' and '$toDt'
                                        and   trans_flag = 1
                                        group by prod_id,ro_no");

            return $query->result();
        }



        public function f_get_sale($branch,$frmDt,$toDt){
            $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_sale
                                        from td_sale
                                        where br_cd	    = $branch
                                        and   do_dt between '$frmDt' and '$toDt'
                                        group by prod_id");

            return $query->result();
        }

        public function f_get_sale_rowise($branch,$frmDt,$toDt){
            $query  = $this->db->query("select prod_id, ifnull(sum(qty),0)tot_sale,sale_ro
                                        from td_sale
                                        where br_cd     = $branch
                                        and   do_dt between '$frmDt' and '$toDt'
                                        group by prod_id,sale_ro");

            return $query->result();
        }

        public function f_get_purchaserep($branch,$frmDt,$toDt){
            $query  = $this->db->query("select a.ro_no,a.ro_dt,a.invoice_no,a.invoice_dt,a.qty,a.retlr_margin,
                                        a.spl_rebt,a.rbt_add,a.rbt_less,a.rnd_of_add,a.rnd_of_less,
                                        a.unit,a.stock_qty,a.rate,a.base_price,a.no_of_bags,a.cgst,a.sgst,a.tot_amt,
                                        c.short_name,b.PROD_DESC,a.trad_margin,a.oth_dis,a.frt_subsidy
                                        from td_purchase a,mm_product b,mm_company_dtls c
                                        where  a.prod_id = b.PROD_ID
                                        and    a.comp_id = c.COMP_ID
                                        and    a.br        = '$branch'
                                        and    a.trans_dt between '$frmDt' and '$toDt'
                                        and    a.trans_flag = 1");

            return $query->result();
        }

        public function f_get_sales($branch,$frmDt,$toDt){
            $query  = $this->db->query("select a.trans_do,a.do_dt,a.trans_type,a.sale_ro,a.qty,a.soc_id,
                                               a.sale_rt,a.taxable_amt,a.cgst,a.sgst,a.dis,a.tot_amt,c.short_name,b.PROD_DESC

                                        from td_sale a,mm_product b,mm_company_dtls c
                                        where  a.prod_id = b.PROD_ID
                                        and    a.comp_id = c.COMP_ID
                                       
                                        and    a.br_cd   = '$branch'
                                        and    a.do_dt between '$frmDt' and '$toDt'");

            return $query->result();
        }
        public function f_get_sales_society($branch,$frmDt,$toDt,$soc_id){
            $query  = $this->db->query("select a.trans_do,a.do_dt,a.trans_type,a.sale_ro,a.qty,a.soc_id,d.soc_name,
                                               a.sale_rt,a.taxable_amt taxable_amt,a.cgst,a.sgst,a.dis,a.tot_amt,c.short_name,b.PROD_DESC

                                        from td_sale a,mm_product b,mm_company_dtls c,mm_ferti_soc d
                                        where  a.prod_id = b.PROD_ID
                                        and    a.comp_id = c.COMP_ID
                                        and    a.stock_point  = '$soc_id'
                                        and    a.br_cd   = '$branch'
                                        and    a.stock_point  = d.soc_id
                                        and    a.do_dt between '$frmDt' and '$toDt'");

            return $query->result();
        }

		public function get_fersociety_name($soc_id){

			$sql="select soc_name
			     from mm_ferti_soc where soc_id = '$soc_id' ";

		  $result = $this->db->query($sql);     
	  
		  return $result->row();

  }
        public function f_get_sales_branch($frmDt,$toDt,$br){
            $query  = $this->db->query("select a.trans_do,a.do_dt,a.trans_type,a.sale_ro,a.qty,a.soc_id,
                                               a.sale_rt,a.taxable_amt,a.cgst,a.sgst,a.dis,a.tot_amt,c.short_name,b.PROD_DESC

                                        from td_sale a,mm_product b,mm_company_dtls c
                                        where  a.prod_id = b.PROD_ID
                                        and    a.comp_id = c.COMP_ID
                                      
                                        and    a.br_cd   = '$br'
                                        and    a.do_dt between '$frmDt' and '$toDt'");

            return $query->result();
        }

        public function f_get_stock_stockwise($branch,$frmDt,$toDt){

            $data = $this->db->query("select a.prod_id,a.stock_point,sum(a.qty) as qty,a.soc_name,b.COMP_NAME
                                       from(select a.prod_id as prod_id,a.comp_id as comp_id,a.stock_point as stock_point,ifnull(sum(a.qty),0) as qty, b.soc_name as soc_name 
                                           from td_purchase a,mm_ferti_soc b where a.stock_point = b.soc_id and a.trans_dt between '$frmDt' and '$toDt' and a.br = '$branch' 
                                           group by a.stock_point,b.soc_name,a.prod_id,a.comp_id 
                                           UNION 
                                           select a.prod_id as prod_id,a.comp_id as comp_id,a.stock_point as stock_point,ifnull(sum(a.qty),0)*-1 as qty , b.soc_name as soc_name 
                                           from td_sale a,mm_ferti_soc b 
                                           where a.stock_point = b.soc_id 
                                           and a.br_cd = '$branch' and a.do_dt between '$frmDt' 
                                           and '$toDt' 
                                           group by a.stock_point,b.soc_name,a.prod_id,a.comp_id)a,mm_company_dtls b
                                           where a.comp_id = b.COMP_ID
                                           group by a.prod_id,a.stock_point,a.soc_name,b.COMP_NAME
                                           order by a.soc_name");

            if($data->num_rows() > 0 ){
                $row = $data->result();
            }else{
                $row = 0;
            }
            return $row;
        }

    }
?>