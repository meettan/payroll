<?php

	class Salary extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->model('Login_Process');

			$this->load->model('Salary_Process');
		}
    


/******************************************************* */
public function earning() {

    $earning['earning_dtls']    =   $this->Salary_Process->f_get_earning();

   
    $this->load->view('post_login/payroll_main');
    $this->load->view("earning/dashboard", $earning);

    $this->load->view('post_login/footer');

}

public function f_sal_dtls()
{

    $emp_code = $this->input->get('emp_code');
    // $emp_code =$this->input->post('emp_code');
    // echo ($emp_code);
    // die();
    $data = $this->Salary_Process->f_sal_dtls($emp_code);
    // echo $this->db->last_query();
    // die();
    echo json_encode($data);

}
public function earning_add() {

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        
        // $sal_month  =   $this->input->post('month');

        // $year       =   $this->input->post('year');

        // $emp_dtls   =   json_decode($this->input->post('emp_code'));

        // $emp_cd     =   $emp_dtls->empid;

        // $emp_name   =   $emp_dtls->empname;
        $emp_cd   =   $this->input->post('emp_code');

        $category   =   $this->input->post('category');

        $basic    =   $this->input->post('basic');

        $da   =   $this->input->post('da');

        $hra   =   $this->input->post('hra');

        $ma        =   $this->input->post('ma');

        $oa       =   $this->input->post('oa');

        //For Current Date
        $sal_date   =   $_SESSION['sys_date'];
   
       

        

        $data_array = array (

        // "sal_yr"       =>  $year,		

        //         "sal_month"    =>  $sal_month,

                "effective_date"     =>  $sal_date,

                "emp_code"       =>  $emp_cd,

                // "emp_name"     =>  $emp_name,

                // "emp_catg"     =>  $category,

                "basic_pay"      =>  $basic,

                "da_amt"     =>  $da,

                "hra_amt" =>  $hra,

                "med_allow"          =>  $ma,

                "othr_allow"         =>  $oa,

                "created_by"   =>  $this->session->userdata('loggedin')->user_name,

                "created_dt"   =>  date('Y-m-d h:i:s')

            );
        

        $this->Salary_Process->f_insert('td_income', $data_array);

        $this->session->set_flashdata('msg', 'Successfully Added!');

        redirect('salary/earning');

    }

    else {
        
        //Month List
        // $deduction['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

        
        //For Current Date
        $earning['sys_date']   =   $_SESSION['sys_date'];

        //For Employee List
        unset($select);
        $select = array ("emp_code", "emp_name", "emp_catg");

        // $where  = array (

        // "emp_catg in (1,2,3)"  => null,
        //  "emp_status"	   => 'A'

        // );

    //Employee List
        $earning['emp_list']   =   $this->Salary_Process->f_get_particulars("md_employee", $select, NULL, 0);

     //   Category List
    $earning['category']   =   $this->Salary_Process->f_get_particulars("md_category", NULL, NULL, 0);
//     echo $this->db->last_query();
// die();
    //Month List
    // $deduction['month']	     =   $this->Payroll->f_get_particulars("md_month", NULL, NULL, 0);

        // $this->load->view('post_login/payroll_main');
        $this->load->view('post_login/payroll_main');
        $this->load->view("earning/add", $earning);

        $this->load->view('post_login/footer');

    }

}





    /*********************For Deduction Screen******************/
    //Salary Deduction List for all employees		
    public function f_deduction() {

            $deduction['deduction_dtls']    =   $this->Payroll->f_get_deduction();

            $this->load->view('post_login/main');

            $this->load->view("deduction/dashboard", $deduction);

            $this->load->view('post_login/footer');
        
    }

    //New Deduction Add for a particular employee 
    public function f_deduction_add() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $sal_month  =   $this->input->post('month');

            $year       =   $this->input->post('year');

            $emp_dtls   =   json_decode($this->input->post('emp_cd'));

            $emp_cd     =   $emp_dtls->empid;

            $emp_name   =   $emp_dtls->empname;

            $category   =   $this->input->post('category');

            $gen_adv    =   $this->input->post('gen_adv');

            $gen_intt   =   $this->input->post('gen_intt');

            $fest_adv   =   $this->input->post('fest_adv');

            $lic        =   $this->input->post('lic');

            $itax       =   $this->input->post('itax');

            //For Current Date
            $sal_date   =   $_SESSION['sys_date'];
       
            if(!isset($gen_adv) || !isset($gen_intt) || !isset($fest_adv) || !isset($lic) || !isset($itax)) {

                $data_array = array (

                    "sal_yr"       =>  $year,
    
                    "sal_month"    =>  $sal_month,

                    "sal_date"     =>  $sal_date,
    
                    "emp_cd"       =>  $emp_cd,
    
                    "emp_name"     =>  $emp_name,

                    "emp_catg"     =>  $category,
    
                    "gen_adv"      =>  0,
    
                    "gen_intt"     =>  0,
    
                    "festival_adv" =>  0,
    
                    "lic"          =>  0,
    
                    "itax"         =>  0,
    
                    "created_by"   =>  $this->session->userdata('loggedin')->user_name,
    
                    "created_dt"   =>  date('Y-m-d h:i:s')
    
                );  

            }

            else {

		    $data_array = array (

		    "sal_yr"       =>  $year,		
    
                    "sal_month"    =>  $sal_month,

                    "sal_date"     =>  $sal_date,
    
                    "emp_cd"       =>  $emp_cd,
    
                    "emp_name"     =>  $emp_name,

                    "emp_catg"     =>  $category,
    
                    "gen_adv"      =>  $gen_adv,
    
                    "gen_intt"     =>  $gen_intt,
    
                    "festival_adv" =>  $fest_adv,
    
                    "lic"          =>  $lic,
    
                    "itax"         =>  $itax,
    
                    "created_by"   =>  $this->session->userdata('loggedin')->user_name,
    
                    "created_dt"   =>  date('Y-m-d h:i:s')
    
                );
            }

            $this->Payroll->f_insert('td_deductions', $data_array);

            $this->session->set_flashdata('msg', 'Successfully Added!');

            redirect('payroll/deduction');

        }

        else {
            
            //Month List
            $deduction['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

            
            //For Current Date
            $deduction['sys_date']   =   $_SESSION['sys_date'];

            //For Employee List
            unset($select);
            $select = array ("emp_code", "emp_name", "emp_catg");

            $where  = array (

		    "emp_catg in (1,2,3)"  => null,
		     "emp_status"	   => 'A'

            );
	
	    //Employee List
            $deduction['emp_list']   =   $this->Payroll->f_get_particulars("md_employee", $select, $where, 0);

            //Category List
	    $deduction['category']   =   $this->Payroll->f_get_particulars("md_category", NULL, NULL, 0);

	    //Month List
	    $deduction['month']	     =   $this->Payroll->f_get_particulars("md_month", NULL, NULL, 0);

            $this->load->view('post_login/main');

            $this->load->view("deduction/add", $deduction);

            $this->load->view('post_login/footer');

        }

    }


    //Edit Deduction Add for a particular employee 
    public function f_deduction_edit(){

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $sal_month  =   $this->input->post('sal_month');

            $year       =   $this->input->post('sal_yr');

            $sal_date   =   $this->input->post('sal_date');

            $emp_cd     =   $this->input->post('emp_cd');

            $emp_name   =   $this->input->post('empname');

            $gen_adv    =   $this->input->post('gen_adv');

            $gen_intt   =   $this->input->post('gen_intt');

            $fest_adv   =   $this->input->post('fest_adv');

            $lic        =   $this->input->post('lic');

            $itax       =   $this->input->post('itax');


            $data_array = array (

                "sal_yr"       =>  $year,

                "sal_month"    =>  $sal_month,

                "sal_date"     =>  $sal_date,

                "emp_cd"       =>  $emp_cd,

                "emp_name"     =>  $emp_name,

                "gen_adv"      =>  $gen_adv,

                "gen_intt"     =>  $gen_intt,

                "festival_adv" =>  $fest_adv,

                "lic"          =>  $lic,

                "itax"         =>  $itax,

                "modified_by"  =>  $this->session->userdata('loggedin')->user_name,

                "modified_dt"  =>  date('Y-m-d h:i:s')

            );

            $where = array(

                "emp_cd"       =>  $emp_cd,

                "sal_date"     =>  $sal_date

            );
            
            $this->session->set_flashdata('msg', 'Successfully Updated!');

            $this->Payroll->f_edit('td_deductions', $data_array, $where);

            redirect('payroll/deduction');

        }

        else {

            $where = array(

                "sal_date"    =>  $this->input->get('month'),

                "emp_cd"       =>  $this->input->get('emp_cd')

            );


            //Month List
            $deduction['month_list'] =   $this->Payroll->f_get_particulars("md_month", NULL, NULL, 0);
            
            //Deduction list of latest month
            $deduction['deduction_dtls']    =   $this->Payroll->f_get_particulars("td_deductions", NULL, $where, 1);

            $this->load->view('post_login/main');

            $this->load->view("deduction/edit", $deduction);

            $this->load->view('post_login/footer');

        }
    }

    //Deduction Delete for a particular employee
    public function f_deduction_delete(){

        $where = array(
            
            "emp_cd"    =>  $this->input->get('empcd'),

            "sal_date"  =>  $this->input->get('saldate')
            
        );

        $this->session->set_flashdata('msg', 'Successfully Deleted!');

        $this->Payroll->f_delete('td_deductions', $where);

        redirect("payroll/deduction");
        
    }


    


   
  /*************************REPORTS**************************/

    //For Categorywise Salary Report
    public function f_salary_report() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {


            //Employee Ids for Salary List
            $select     =   array("emp_code");

            $where      =   array(

                "emp_catg"  =>  $this->input->post('category')

            );

            $emp_id     =   $this->Payroll->f_get_particulars("md_employee", $select, $where, 0);

            //Temp variable for emp_list
            $eid_list   =   [];

            for($i = 0; $i < count($emp_id); $i++) {

                array_push($eid_list, $emp_id[$i]->emp_code);

            }


            //List of Salary Category wise
            unset($where);
            $where = array (

                "sal_month"     =>  $this->input->post('sal_month'),

                "sal_year"      =>  $this->input->post('year')

            );

            $salary['list']               =   $this->Payroll->f_get_particulars_in("td_pay_slip", $eid_list, $where);

            $salary['attendance_dtls']    =   $this->Payroll->f_get_attendance();

            //Employee Group Count
            unset($select);
            unset($where);

            $select =   array(

                "emp_no", "emp_name", "COUNT(emp_name) count"

            );

            $where  =   array(

                "sal_month"     =>  $this->input->post('sal_month'),

                "sal_year = '".$this->input->post('year')."' GROUP BY emp_no, emp_name"      =>  NULL

            );

            $salary['count']              =   $this->Payroll->f_get_particulars("td_pay_slip", $select, $where, 0);

            $this->load->view('post_login/main');

            $this->load->view("reports/salary", $salary);

            $this->load->view('post_login/footer');

        }

        else {

            //Month List
            $salary['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

            //For Current Date
            $salary['sys_date']   =   $_SESSION['sys_date'];

            //Category List
            $salary['category']   =   $this->Payroll->f_get_particulars("md_category", NULL, array('category_code IN (1,2,3)' => NULL), 0);

            $this->load->view('post_login/main');

            $this->load->view("reports/salary", $salary);

            $this->load->view('post_login/footer');

        }

    }
//////////////////////////////////////////////////////////////////////////
public function f_salaryold_report() {

    if($_SERVER['REQUEST_METHOD'] == "POST") {


        //Employee Ids for Salary List
        $select     =   array("emp_code");

        $where      =   array(

            "emp_catg"  =>  $this->input->post('category')

        );

        $emp_id     =   $this->Payroll->f_get_particulars("md_employee", $select, $where, 0);

        //Temp variable for emp_list
        $eid_list   =   [];

        for($i = 0; $i < count($emp_id); $i++) {

            array_push($eid_list, $emp_id[$i]->emp_code);

        }


        //List of Salary Category wise
        unset($where);
        $where = array (

            "sal_month"     =>  $this->input->post('sal_month'),

            "sal_year"      =>  $this->input->post('year')

        );

        $salary['list']               =   $this->Payroll->f_get_particulars_in("td_pay_slip_old ", $eid_list, $where);

        $salary['attendance_dtls']    =   $this->Payroll->f_get_attendance();

        //Employee Group Count
        unset($select);
        unset($where);

        $select =   array(

            "emp_no", "emp_name", "COUNT(emp_name) count"

        );

        $where  =   array(

            "sal_month"     =>  $this->input->post('sal_month'),

            "sal_year = '".$this->input->post('year')."' GROUP BY emp_no, emp_name"      =>  NULL

        );

        $salary['count']              =   $this->Payroll->f_get_particulars("td_pay_slip_old ", $select, $where, 0);

        $this->load->view('post_login/main');

        $this->load->view("reports/salaryold", $salary);

        $this->load->view('post_login/footer');

    }

    else {

        //Month List
        $salary['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

        //For Current Date
        $salary['sys_date']   =   $_SESSION['sys_date'];

        //Category List
        $salary['category']   =   $this->Payroll->f_get_particulars("md_category", NULL, array('category_code IN (1,2,3)' => NULL), 0);

        $this->load->view('post_login/main');

        $this->load->view("reports/salaryold", $salary);

        $this->load->view('post_login/footer');

    }

}
//////////////////////////////////////////////////////////////////////////
    //For Payslip Report
    public function f_payslip_report() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            //Payslip
            $where  =   array(

                "emp_no"            =>  $this->input->post('emp_cd'),

                "sal_month"         =>  $this->input->post('sal_month'),

                "sal_year"          =>  $this->input->post('year'),

                "approval_status"   =>  'A'

            );

            $payslip['emp_dtls']    =   $this->Payroll->f_get_particulars("md_employee", NULL, array("emp_code" =>  $this->input->post('emp_cd')), 1);

            $payslip['payslip_dtls']=   $this->Payroll->f_get_particulars("td_pay_slip", NULL, $where, 1);

            $this->load->view('post_login/main');

            $this->load->view("reports/payslip", $payslip);

            $this->load->view('post_login/footer');

        }
        
        else {

            //Month List
            $payslip['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

            //For Current Date
            $payslip['sys_date']   =   $_SESSION['sys_date'];

            //Employee List
            unset($select);
            $select = array ("emp_code", "emp_name");

            $payslip['emp_list']   =   $this->Payroll->f_get_particulars("md_employee", $select, array("emp_catg IN (1,2,3)" => NULL), 0);

            $this->load->view('post_login/main');

            $this->load->view("reports/payslip", $payslip);

            $this->load->view('post_login/footer');
            
        }

    }

//////////////////////////////////////////////////////////////////

public function f_payslipold_report() {

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        //Payslip
        $where  =   array(

            "emp_no"            =>  $this->input->post('emp_cd'),

            "sal_month"         =>  $this->input->post('sal_month'),

            "sal_year"          =>  $this->input->post('year'),

            "approval_status"   =>  'A'

        );

        $payslip['emp_dtls']    =   $this->Payroll->f_get_particulars("md_employee", NULL, array("emp_code" =>  $this->input->post('emp_cd')), 1);

        $payslip['payslip_dtls']=   $this->Payroll->f_get_particulars("td_pay_slip_old ", NULL, $where, 1);

        $this->load->view('post_login/main');

        $this->load->view("reports/payslipold", $payslip);

        $this->load->view('post_login/footer');

    }
    
    else {

        //Month List
        $payslip['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

        //For Current Date
        $payslip['sys_date']   =   $_SESSION['sys_date'];

        //Employee List
        unset($select);
        $select = array ("emp_code", "emp_name");

        $payslip['emp_list']   =   $this->Payroll->f_get_particulars("md_employee", $select, array("emp_catg IN (1,2,3)" => NULL), 0);

        $this->load->view('post_login/main');

        $this->load->view("reports/payslipold", $payslip);

        $this->load->view('post_login/footer');
        
    }

}

    //For Salary Statement
    public function f_statement_report(){

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Employees salary statement
            $select = array(

                "m.emp_name", "m.bank_ac_no",
                
                "t.net_amount"

            );

            $where  = array(

                "m.emp_code = t.emp_no" =>  NULL,

                "t.sal_month"           =>  $this->input->post('sal_month'),

                "t.sal_year"            =>  $this->input->post('year'),

                "m.emp_catg"            =>  $this->input->post('category'),

                "m.emp_status"          =>  'A',

                "m.deduction_flag"      =>  'Y'

            );

            $statement['statement'] =   $this->Payroll->f_get_particulars("md_employee m, td_pay_slip t", $select, $where, 0);

            $this->load->view('post_login/main');

            $this->load->view("reports/statement", $statement);

            $this->load->view('post_login/footer');

        }

        else {

            //Month List
            $statement['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

            //Category List
            $statement['category']   =   $this->Payroll->f_get_particulars("md_category", NULL, array('category_code IN (1,2,3)' => NULL), 0);

            $this->load->view('post_login/main');

            $this->load->view("reports/statement", $statement);

            $this->load->view('post_login/footer');

        }

    }
//////////////////////////////////////
public function f_statementold_report(){

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Employees salary statement
        $select = array(

            "m.emp_name", "m.bank_ac_no",
            
            "t.net_amount"

        );

        $where  = array(

            "m.emp_code = t.emp_no" =>  NULL,

            "t.sal_month"           =>  $this->input->post('sal_month'),

            "t.sal_year"            =>  $this->input->post('year'),

            "m.emp_catg"            =>  $this->input->post('category'),

            "m.emp_status"          =>  'A',

            "m.deduction_flag"      =>  'Y'

        );

        $statement['statement'] =   $this->Payroll->f_get_particulars("md_employee m, td_pay_slip t", $select, $where, 0);

        $this->load->view('post_login/main');

        $this->load->view("reports/statementold", $statement);

        $this->load->view('post_login/footer');

    }

    else {

        //Month List
        $statement['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

        //Category List
        $statement['category']   =   $this->Payroll->f_get_particulars("md_category", NULL, array('category_code IN (1,2,3)' => NULL), 0);

        $this->load->view('post_login/main');

        $this->load->view("reports/statementold", $statement);

        $this->load->view('post_login/footer');

    }

}



////////////////////////////////////////

    //For Bonus Report
    public function f_bonus_report() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Employee Ids for Bonus
            $select     =   array("emp_code");

            $where      =   array(

                "emp_catg"  =>  $this->input->post('category')

            );

            $emp_id     =   $this->Payroll->f_get_particulars("md_employee", $select, $where, 0);

            //Temp variable for emp_list
            $eid_list   =   [];

            for($i = 0; $i < count($emp_id); $i++) {

                array_push($eid_list, $emp_id[$i]->emp_code);

            }


            //List of Bonus Category wise
            unset($where);
            $where = array (

                "month"     =>  $this->input->post('month'),

                "year"      =>  $this->input->post('year')

            );

            $bonus['list']          =   $this->Payroll->f_get_particulars_in("td_bonus", $eid_list, $where);

            $bonus['bonus_dtls']    =   $this->Payroll->f_get_attendance();

            //Bonus Salary Range
            $bonus['bonus_range']  =   $this->Payroll->f_get_particulars("md_parameters", array('param_value'), array('sl_no' => 14), 1);

            //Bonus Salary Year
            $bonus['bonus_year']  =   $this->Payroll->f_get_particulars("md_parameters", array('param_value'), array('sl_no' => 15), 1);

            $this->load->view('post_login/main');

            $this->load->view("reports/bonus", $bonus);

            $this->load->view('post_login/footer');

        }

        else {

            //Month List
            $bonus['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

            //For Current Date
            $bonus['sys_date']   =   $_SESSION['sys_date'];

            //Category List
            $bonus['category']   =   $this->Payroll->f_get_particulars("md_category", NULL, NULL, 0);


            $this->load->view('post_login/main');

            $this->load->view("reports/bonus", $bonus);

            $this->load->view('post_login/footer');

        }

    }


    //For Incentive Report
    public function f_incentive_report() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Employee Ids for Incentive
            $select     =   array("emp_code");

            $where      =   array(

                "emp_catg"  =>  4

            );

            $emp_id     =   $this->Payroll->f_get_particulars("md_employee", $select, $where, 0);

            //Temp variable for emp_list
            $eid_list   =   [];

            for($i = 0; $i < count($emp_id); $i++) {

                array_push($eid_list, $emp_id[$i]->emp_code);

            }


            //List of Incentive Category wise
            unset($where);
            $where = array (

                "month"     =>  $this->input->post('month'),

                "year"      =>  $this->input->post('year')

            );

            //Incentive list
            $incentive['list']          =   $this->Payroll->f_get_particulars_in("td_incentive", $eid_list, $where);

            //Incentive Year
            $incentive['incentive_year']  =   $this->Payroll->f_get_particulars("md_parameters", array('param_value'), array('sl_no' => 15), 1);

            $this->load->view('post_login/main');

            $this->load->view("reports/incentive", $incentive);

            $this->load->view('post_login/footer');

        }

        else {

            //Month List
            $incentive['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

            //For Current Date
            $incentive['sys_date']   =   $_SESSION['sys_date'];

            $this->load->view('post_login/main');

            $this->load->view("reports/incentive", $incentive);

            $this->load->view('post_login/footer');

        }

    }


    //Total Deduction Report

    public function f_totaldeduction_report () {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $totaldeduction['total_deduct'] =   $this->Payroll->f_get_totaldeduction($this->input->post('from_date'), $this->input->post('to_date'));

            //Current Year
            $totaldeduction['year']  =   $this->Payroll->f_get_particulars("md_parameters", array('param_value'), array('sl_no' => 15), 1);

            $this->load->view('post_login/main');

            $this->load->view("reports/totaldeduction", $totaldeduction);

            $this->load->view('post_login/footer');

        }

        else{

            //Month List
            $totaldeduction['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

            //For Current Date
            $totaldeduction['sys_date']   =   $_SESSION['sys_date'];

            $this->load->view('post_login/main');

            $this->load->view("reports/totaldeduction", $totaldeduction);

            $this->load->view('post_login/footer');

        }

    }


    //PF Contribution Report
    public function f_pfcontribution_report () {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Opening Balance Date
            $where  =   array(

                "emp_no"      => $this->input->post('emp_cd'),

                "trans_dt < " => $this->input->post("from_date")

            );

            //Max Transaction Date
            $max_trans_dt   =   $this->Payroll->f_get_particulars("tm_pf_dtls", array("MAX(trans_dt) trans_dt"), $where, 1);
            

            //temp variable
            $pfcontribution['pf_contribution']   =   NULL;

            if(!is_null($max_trans_dt->trans_dt)) {

                //Opening Balance
                $pfcontribution['opening_balance']   =   $this->Payroll->f_get_particulars("tm_pf_dtls", array("balance"), array("emp_no" => $this->input->post('emp_cd'),"trans_dt" => $max_trans_dt->trans_dt), 1);

            }

            else {

                //Opening Balance
                $pfcontribution['opening_balance']   =   0;

            }

            //PF Contribution List
            unset($where);
            $where  =   array(

                "emp_no"    => $this->input->post('emp_cd'),

                "trans_dt BETWEEN '".$this->input->post("from_date")."' AND '".$this->input->post('to_date')."'" => NULL

            );

            $pfcontribution['pf_contribution']   =   $this->Payroll->f_get_particulars("tm_pf_dtls", NULL, $where, 0);


            //Current Year
            $pfcontribution['year']  =   $this->Payroll->f_get_particulars("md_parameters", array('param_value'), array('sl_no' => 15), 1);

            //Employee Name
            $pfcontribution['emp_name']  =   $this->Payroll->f_get_particulars("md_employee", array('emp_name'), array('emp_code' => $this->input->post('emp_cd')), 1);

            $this->load->view('post_login/main');

            $this->load->view("reports/pfcontribution", $pfcontribution);

            $this->load->view('post_login/footer');

        }

        else{

            //Month List
            $pfcontribution['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

            //For Current Date
            $pfcontribution['sys_date']   =   $_SESSION['sys_date'];

            //Employee List
            $select =   array ("emp_code", "emp_name");

            $where  =   array(

                "emp_catg IN (1,2,3)"      => NULL,

                "deduction_flag"           => "Y"
            );

            $pfcontribution['emp_list']   =   $this->Payroll->f_get_particulars("md_employee", $select, $where, 0);

            $this->load->view('post_login/main');

            $this->load->view("reports/pfcontribution", $pfcontribution);

            $this->load->view('post_login/footer');

        }

    }

}
    
?>
