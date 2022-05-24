<?php

/**
 * Created by PhpStorm.
 * User: zeus
 * Date: 2019/6/19
 * Time: 4:38 AM
 */
class AuthController extends MY_Controller
{


    public function index() {
        $this->load->model('Admin_model');
		
		$email  = strtolower($this->input->post('email'));
		$pwd = $this->GetMd5($this->input->post('pass'));
		
		$existUser = $this->Admin_model->getAdmin(array('email' => $email, 'user_password' => $pwd));
		
		
		if(count($existUser) > 0 ) {
			$this->session->set_userdata('user_id',$existUser[0]['id']);
			$this->session->set_userdata('user_name',$existUser[0]['username']);
			$this->session->set_userdata('profile_pic',$existUser[0]['profile_pic']);
			$this->session->set_userdata('user_count',count($this->User_model->getUsersListInDashboard()));

			$allposts = $this->UserService_model->getServiceInfos(array('is_active' => 3));
			$open_reports = $this->PostReport_model->getReports(array("is_active" => 0));
			$total_count = count($this->AdminNotification_model->getAdminNotification(array('read_status' => 0))) + count( $open_reports) + count(  $open_businesUsers) + count($allposts);
			$this->session->set_userdata('notification_count',$total_count);
			$this->session->set_userdata('report_count',count($this->PostReport_model->getReports(array("is_active" => 0))));		
			redirect(route('admin.dashboards.index'));
		} else {
			redirect(route('admin.auth.login'));
		}
    }

    public function login() {
        $this->load->view('admin/auth/auth_login');
    }

    public function forgot_pass() {
        $this->load->view('admin/auth/auth_forgot_pass');
    }
	
	public function logout(){
		$this->session->sess_destroy();
		redirect(route('admin.auth.login'));
	}

    public function do_login() {
		$this->load->model('Admin_model');
		
		$email  = strtolower($this->input->post('email'));
		$pwd = $this->GetMd5($this->input->post('pass'));
		
		$existUser = $this->Admin_model->getAdmin(array('email' => $email, 'password' => $pwd));
		
		if(count($existUser) > 0 ) {
			$this->session->set_userdata('user_id',$existUser[0]['_id']);
			$this->session->set_userdata('user_name',$existUser[0]['username']);
			$this->session->set_userdata('profile_pic',$existUser[0]['profile_pic']);
			redirect(route('admin.dashboards.index'));
		} else {
			redirect(route('admin.auth.login'));
		}
    }
	
	public function register() {
		
	}

	public function sendPassword() {

	
	}
	
}
