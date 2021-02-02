<?php
    class Report extends MX_Controller{

        public function __construct(){

            parent::__construct();

            $this->load->model('ReportModel');

            $this->load->helper('paddyrate');

            $this->session->userdata('fin_yr');

            if(!isset($this->session->userdata['loggedin']['user_id'])){
            
            redirect('User_Login/login');

            }
        }

        public function rateslab(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

               $company     = $_POST['company'];

               $product     = $_POST['product'];

               $select      = array(

                'a.frm_dt',"a.to_dt","a.catg_id","a.sp_mt","a.sp_bag","a.sp_govt","b.cate_desc"

               );

               $where       = array(

                "a.catg_id  =  b.sl_no" => NULL,

                "a.comp_id"     =>  $company,

                "a.prod_id"     =>  $_POST['product'],

                "a.district"    =>  $this->session->userdata['loggedin']['branch_id'],

                "a.fin_id"      =>  $this->session->userdata['loggedin']['fin_id']

               );

               $data['rate']       =   $this->ReportModel->f_select("mm_sale_rate a,mm_category b", $select, $where, 0);

               $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, $this->input->POST['company'], 1);

               $wheres      = array(

                "prod_id"     =>  $_POST['product']

               );

               $data['product']    =   $this->ReportModel->f_select("mm_product", NULL,$wheres, 1);

               $where1             =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

               $data['branch']     =   $this->ReportModel->f_select("md_district", NULL, $where1, 1);
              
               $this->load->view('post_login/fertilizer_main');
               $this->load->view('report/rate_slab/rate_slab.php',$data);
               $this->load->view('post_login/footer');

            }else{

                $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

              
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/rate_slab/rate_slab_ip.php',$data);
                $this->load->view('post_login/footer');
            }

        }
         public function rateslabho(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $comp_id  = $_POST['company'];

                $district = $this->input->post('district');

                $frm_date = $this->input->post('fr_date');

                $to_date  = $this->input->post('to_date');

                $fin_id   = $this->session->userdata['loggedin']['fin_id'];

               $data['rate']     = $this->ReportModel->f_get_salerateho($comp_id,$district,$frm_date,$to_date,$fin_id);

               $data['company']  =  $this->ReportModel->f_select("mm_company_dtls", NULL, $this->input->POST['company'], 1);

               $where1           =  array("district_code"  =>  $this->input->post('district'));

               $data['branch']   =  $this->ReportModel->f_select("md_district", NULL, $where1, 1);
              
               $this->load->view('post_login/fertilizer_main');
               $this->load->view('report/rate_slabho/rate_slab.php',$data);
               $this->load->view('post_login/footer');

            }else{

                $data['branch']     =   $this->ReportModel->f_get_district_asc();

                $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/rate_slabho/rate_slab_ip.php',$data);
                $this->load->view('post_login/footer');
            }

        }

        public function popProd(){

            $where  = array('company' => $this->input->get('company'));

            $data     = $this->ReportModel->f_select("mm_product", NULL, $where, 0);

            echo json_encode($data);
        }

        public function stkStmt(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

                $data['product']     =   $this->ReportModel->f_get_product_list($branch,$opndt);

                $data['opening']     =   $this->ReportModel->f_get_balance($branch,$opndt,$prevdt);

                $data['purchase']    =   $this->ReportModel->f_get_purchase($branch,$from_dt,$to_dt);

                $data['sale']        =   $this->ReportModel->f_get_sale($branch,$from_dt,$to_dt);

                $data['closing']     =   $this->ReportModel->f_get_balance($branch,$opndt,$to_dt);

                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_stmt/stk_stmt',$data);
                $this->load->view('post_login/footer');

            }else{

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_stmt/stk_stmt_ip');
                $this->load->view('post_login/footer');
            }

        }

        // Company Wise Stock Statement 12/10/2020 //

        public function stkScomp(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $comp_id    =   $this->input->post('company');

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

                $data['product']     =   $this->ReportModel->f_get_product_list_companywise($branch,$opndt,$comp_id);

                $data['opening']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$prevdt);

                $data['purchase']    =   $this->ReportModel->f_get_purchase_rowise($branch,$from_dt,$to_dt);

                $data['sale']        =   $this->ReportModel->f_get_sale_rowise($branch,$from_dt,$to_dt);

                $data['closing']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$to_dt);

                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_comp/stk_comp',$data);
                $this->load->view('post_login/footer');

            }else{

                $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_comp/stk_comp_ip',$data);
                $this->load->view('post_login/footer');
            }

        }

         // Ro Wise Product Ledger 12/10/2020 //

        public function stkSprodro(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $comp_id    =   $this->input->post('company');

                $prod_id    =   $this->input->post('product');

                $ro         =   $this->input->post('ro');

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

                $data['product']     =   $this->ReportModel->f_get_product_comp_prod_ro($branch,$from_dt,$to_dt,$comp_id,$prod_id,$ro);

                $data['opening']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$prevdt);

                $data['purchase']    =   $this->ReportModel->f_get_purchase_rowise($branch,$from_dt,$to_dt);

                $data['sale']        =   $this->ReportModel->f_get_sale_rowise($branch,$from_dt,$to_dt);

                $data['closing']     =   $this->ReportModel->f_get_balance_rowise($branch,$opndt,$to_dt);

                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_ro/stk_ro',$data);
                $this->load->view('post_login/footer');

            }else{

                $data['company']    =   $this->ReportModel->f_select("mm_company_dtls", NULL, NULL, 0);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_ro/stk_ro_ip',$data);
                $this->load->view('post_login/footer');
            }

        }


        public function purrep(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
                
                $data['purchase']    =   $this->ReportModel->f_get_purchaserep($branch,$from_dt,$to_dt);

                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/purchase/pur_stmt',$data);
                $this->load->view('post_login/footer');

            }else{

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/purchase/pur_stmt_ip');
                $this->load->view('post_login/footer');
            }

        }

        public function salerep(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
                
                $data['sales']    =   $this->ReportModel->f_get_sales($branch,$from_dt,$to_dt);

                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/sale/output',$data);
                $this->load->view('post_login/footer');

            }else{

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/sale/input');
                $this->load->view('post_login/footer');
            }

        }


        public function salerepbr(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $soc_id     =   $this->input->post('soc_id');

                $br     =   $this->input->post('br');

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
                
                $data['sales']       =   $this->ReportModel->f_get_sales_society($branch,$from_dt,$to_dt,$soc_id);
                $data['br_sales']       =   $this->ReportModel->f_get_sales_branch($from_dt,$to_dt,$br);
                // echo $this->db->last_query();
                // die();
                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);
                $where2             =   array("district_code"  => $br);
                $select1      = array("district_code","district_name");
                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where2,1);
                //  die();
                $data['all_branch']      =   $this->ReportModel->f_select("md_district", $select1, NULL,0);
                // echo $this->db->last_query();
                // die();
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/sale_br/output',$data);
                $this->load->view('post_login/footer');

            }else{

                $select      = array("soc_id","soc_name");
                $select1      = array("district_code","district_name");
                
                $where       = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

                $society['societyDtls']   = $this->ReportModel->f_select('mm_ferti_soc',$select,$where,0);
                $data['all_branch']      =   $this->ReportModel->f_select("md_district", $select1, NULL,0);
                $this->load->view('post_login/fertilizer_main');
                // $this->load->view('report/sale_society/input',$society);
                $this->load->view('report/sale_br/input',$data);
                $this->load->view('post_login/footer');
            }

        }
        public function salerepsoc(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $soc_id     =   $this->input->post('soc_id');
                $soc_name = $this->ReportModel->get_fersociety_name($soc_id );
            //    echo $soc_id;
            //    die();
                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));
                
                $data['sales']       =   $this->ReportModel->f_get_sales_society($branch,$from_dt,$to_dt,$soc_id);
            //   echo $this->db->last_query();
            //   die();
                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/sale_society/salesocrep',$data);
                $this->load->view('post_login/footer');

            }else{

                $select      = array("soc_id","soc_name");
                
                $where       = array("district"  =>  $this->session->userdata['loggedin']['branch_id']);

                $society['societyDtls']   = $this->ReportModel->f_select('mm_ferti_soc',$select,$where,0);
                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/sale_society/input',$society);
                $this->load->view('post_login/footer');
            }

        }


        public function stkstkpnt(){

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                $from_dt    =   $_POST['from_date'];

                $to_dt      =   $_POST['to_date'];

                $comp_id    =   $this->input->post('company');

                $branch     =   $this->session->userdata['loggedin']['branch_id'];

                $mth        =  date('n',strtotime($from_dt));

                $yr         =  date('Y',strtotime($from_dt));

                if($mth > 3){

                    $year = $yr;

                }else{

                    $year = $yr - 1;
                }

                $opndt      =  date($year.'-04-01');

                $prevdt     =  date('Y-m-d', strtotime('-1 day', strtotime($from_dt)));

                $_SESSION['date']    =   date('d/m/Y',strtotime($from_dt)).'-'.date('d/m/Y',strtotime($to_dt));

                $data['product']     =   $this->ReportModel->f_get_product_list($branch,$opndt);

                $data['stocks']      =   $this->ReportModel->f_get_stock_stockwise($branch,$from_dt,$to_dt);


                $where1              =   array("district_code"  =>  $this->session->userdata['loggedin']['branch_id']);

                $data['branch']      =   $this->ReportModel->f_select("md_district", NULL, $where1,1);

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_stkpnt/stk_stkpnt',$data);
                $this->load->view('post_login/footer');

            }else{

                $this->load->view('post_login/fertilizer_main');
                $this->load->view('report/stk_stkpnt/stk_stkpnt_ip');
                $this->load->view('post_login/footer');
            }

        }
        
    }
?>