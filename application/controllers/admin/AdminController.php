<?php


class AdminController extends MY_Controller
{
	
	private function makeComponentLayout() {       
        $header_include_css = array(base_url().'admin_assets/global/plugins/datatables/datatables.min.css',
                base_url().'admin_assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css');
        
        $header_layout_data = array('arr_css' => $header_include_css, 'title' => 'Admin Accounts');
        $header_layout = $this->load->view('admin/common_template/header_layout', $header_layout_data, TRUE);

	$notificationCounter = $this->AdminNotification_model->getAdminNotification(array('read_status' => 0));
        $open_reports = $this->PostReport_model->getReports(array("is_active" => 0));

        $sidebar_menu_item = array(
            'selected_item' => MENU_SIGNUPS,
            'notifications_count' => count($notificationCounter),
            'reported_count' => count($open_reports)
                );

        $sidebar_layout = $this->load->view('admin/common_template/sidebar_layout', $sidebar_menu_item, TRUE);

        
		$footer_app_before_js = array(base_url().'admin_assets/global/scripts/datatable.js',
                base_url().'admin_assets/global/plugins/datatables/datatables.min.js',
                base_url().'admin_assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js');
        
		$footer_app_after_js = array();

        $footer_layout_data = array('before_app_js' => $footer_app_before_js, 'after_app_js' => $footer_app_after_js);
        $footer_layout = $this->load->view('admin/common_template/footer_layout', $footer_layout_data, TRUE);

        $dataToBeDisplayed['header_layout'] = $header_layout;
        $dataToBeDisplayed['sidebar_layout'] = $sidebar_layout;
        $dataToBeDisplayed['footer_layout'] = $footer_layout;
        return $dataToBeDisplayed;
    }
	
	public function index() {
        $dataToBeDisplayed = $this->makeComponentLayout();

        $dataToBeDisplayed['users'] = $this->Admin_model->getAdmin();
        $this->load->view('admin/admin/admin_list', $dataToBeDisplayed);
    }
	
	public function detail($userid) {
        $dataToBeDisplayed = $this->makeComponentLayout();
      
         $this->load->view('admin/admin/admin_detail', $dataToBeDisplayed);
        

    }

    public function createAdmin(){
      
      

        redirect('/admin/admin');
    }
    
    public function editAdmin(){  
    
    }

    public function deleteAdmin($userid) {
     
    }

    public function newAdmin(){
  
    }

   
	
}