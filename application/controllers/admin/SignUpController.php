<?php

/**
 * Created by PhpStorm.
 * User: zeus
 * Date: 2019/6/19
 * Time: 4:38 AM
 */
class SignUpController extends MY_Controller
{
    const PAGE_LIST = 0;
    const PAGE_DETAIL = 1;
    const PAGE_LOGIN_HISTORY = 2;
    const PAGE_BOOK_HISTORY = 3;
    const PAGE_POST_HISTORY = 4;
    const PAGE_REPORT_HISTORY = 5;
    const PAGE_BLOCK = 6;
    const PAGE_VIEW_POST = 7;

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $dataToBeDisplayed['users'] = $this->User_model->getUsersListInDashboard();    
        // print_r(json_encode( $dataToBeDisplayed['users']));

        $this->load->view('admin/user/userlist',  $dataToBeDisplayed);
    }

    public function detail($userid) {
        // print_r($userid);
        // exit;
        $dataToBeDisplayed['user'] = $this->User_model->getUserDeatil(array('_id' => new MongoDB\BSON\ObjectID($userid)));    
        $this->load->view('admin/user/userdetail',$dataToBeDisplayed);

    }


    public function block_user($userid) {
        $user =  $this->User_model->getUserDeatil(array('_id' => new MongoDB\BSON\ObjectID($userid)));
        $this->User_model->blockUser(array('_id' => new MongoDB\BSON\ObjectID($userid))  ,array('userBlocked' => !$user['userBlocked']));
        redirect('/admin/signups');
    }

}