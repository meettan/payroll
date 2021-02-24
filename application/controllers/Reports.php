<?php

	class Reports extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->model('Login_Process');
            $this->load->model('Report_Process');
			$this->load->model('Admin_Process');
		}

		

        public function payslipreport() {
// echo 'raja';
// die();
            if($_SERVER['REQUEST_METHOD'] == "POST") {
    
                //Payslip
                $empno     =  $this->input->post('emp_cd');
    
                $sal_month  = $this->input->post('sal_month');
    
                $sal_yr     = $this->input->post('year');

                $where  =   array(
    
                    "emp_no"            =>  $this->input->post('emp_cd'),
    
                    "sal_month"         =>  $this->input->post('sal_month'),
    
                    "sal_year"          =>  $this->input->post('year'),
    
                    "approval_status"   =>  'A'
    
                );
    
                $payslip['emp_dtls']    =   $this->Report_Process->f_get_particulars("md_employee", NULL, array("emp_code" =>  $this->input->post('emp_cd')), 1);
    
                $payslip['payslip_dtls']    =   $this->Report_Process->f_get_emp_dtls($empno, $sal_month,$sal_yr);
                // $payslip['payslip_dtls']=   $this->Report_Process->f_get_particulars("td_pay_slip", NULL, $where, 1);
                // echo $this->db->last_query();
                // die();

                $this->load->view('post_login/payroll_main');
    
                $this->load->view("reports/payslip", $payslip);
    
                $this->load->view('post_login/footer');
    
            }
            
            else {
    
                //Month List
                $payslip['month_list'] =   $this->Report_Process->f_get_particulars("md_month",NULL, NULL, 0);
    
                //For Current Date
                $payslip['sys_date']   =   $_SESSION['sys_date'];
    
                //Employee List
                unset($select);
                $select = array ("emp_code", "emp_name");
    
                $payslip['emp_list']   =   $this->Report_Process->f_get_particulars("md_employee", $select, array("emp_catg IN (1,2,3)" => NULL), 0);
    
                $this->load->view('post_login/payroll_main');
    
                $this->load->view("reports/payslip", $payslip);
    
                $this->load->view('post_login/footer');
                
            }
    
        }
    

	}
?>
		
		 