<?php

	class Admin extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->model('Login_Process');

			$this->load->model('Admin_Process');
		}

		public function parameter(){

    		$this->load->view('post_login/payroll_main');

    		$param_dtls['parameter'] = $this->Admin_Process->f_get_particulars("md_parameters",NULL,NULL,0);
    		
			$this->load->view('parameter/dashboard', $param_dtls);

    		$this->load->view('post_login/footer'); 
		}

		public function parameter_edit(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {
				
				$sl_no  			=   $this->input->post('sl_no');
		
				$param_desc       	=   $this->input->post('param_desc');
		
				$param_value   		=   $this->input->post('param_value');
		
				$data_array = array (
		
					"param_value"     	=>  $param_value,

					"modified_by"		=>  $this->session->userdata['loggedin']['user_id'],

					"modified_dt"    =>  date('Y-m-d h:i:s')

				);
		
				$where = array(
		
					"sl_no"       =>  $sl_no
		
				);
				
				$this->session->set_flashdata('msg', 'Successfully updated!');
		
				$this->Admin_Process->f_edit('md_parameters', $data_array, $where);
		
				redirect('vls');
		
			}
		
			else {
		
				$where = array(
		
					"sl_no"     =>  $this->input->get('sl_no')
		
				);
				
				//Bonus list of latest month
				 $parameter['param_dtls']    =   $this->Admin_Process->f_get_particulars("md_parameters", NULL, $where, 1);
		
				$this->load->view('post_login/payroll_main');
		
				$this->load->view("parameter/edit", $parameter);
		
				$this->load->view('post_login/footer');
		
			}
		
		}

	}
?>
		
		 