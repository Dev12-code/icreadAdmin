<?php

use SebastianBergmann\Environment\Console;

/**
 * Created by PhpStorm.
 * User: zeus
 * Date: 2019/6/19
 * Time: 4:38 AM
 */
class InterestingController extends MY_Controller
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

    public function index($result = -1) {
        $dataToBeDisplayed['interestings'] = $this->Interesting_model->getInterestingListInDashboard();    
        // print_r(json_encode( $dataToBeDisplayed['users']));
        $dataToBeDisplayed['toastFlag'] = $result;    

        $this->load->view('admin/interesting/interestinglist',  $dataToBeDisplayed);
    }

    public function detail($userid) {
        // print_r($userid);
        // exit;
        $dataToBeDisplayed['user'] = $this->User_model->getUserDeatil(array('_id' => new MongoDB\BSON\ObjectID($userid)));    
        $this->load->view('admin/user/userdetail',$dataToBeDisplayed);

    }

    public function createInterest() {        
        $setArray = array(
            'label' => ucfirst($this->input->post('title')),
            'description' => ucfirst($this->input->post('content')),
            'slug' => $this->input->post('title'),
            'image_url' => "",
            'subscribers' => [],
            'type' => "interest",
            'type' => "play",


        );
        $result = $this->Interesting_model->createInterest($setArray);         
        $this->index($result);

    }
    public function removeInterest() {        
        $setArray = array(
            '_id' => new MongoDB\BSON\ObjectID(($this->input->post('interest_id'))),            

        );
        // print_r(json_encode($setArray));
        $result = $this->Interesting_model->removeInterest($setArray);         
        $this->index($result);
    }
    public function editInterest() { 
        $where = array(
            '_id' => new MongoDB\BSON\ObjectID(($this->input->post('interest_id'))),            

        );       
        $setArray = array(
            'label' => ucfirst($this->input->post('title')),
            'description' => ucfirst($this->input->post('content')),
            'slug' => $this->input->post('title'),            

        );
        $result = $this->Interesting_model->editInterest($where,$setArray);         
        $this->index($result);

    }

    function doUpload()
    {
        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
            {
                // get details of the uploaded file
                $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
                $fileName = $_FILES['uploadedFile']['name'];
                $fileSize = $_FILES['uploadedFile']['size'];
                $fileType = $_FILES['uploadedFile']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                //echo $fileExtension;

                // sanitize file-name
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

                // check if file has one of the following extensions
                $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');

                if (in_array($fileExtension, $allowedfileExtensions))
                {
                // directory in which the uploaded file will be moved
                $uploadFileDir = './uploads/image/';
                $dest_path = $uploadFileDir . $newFileName;
                $dest_path_ ="uploads/image/" . $newFileName;

                if(move_uploaded_file($fileTmpPath, $dest_path)) 
                {
                    $message ='File is successfully uploaded.';
                }
                else 
                {
                    $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                }
                }
                else
                {
                $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                }
            }
            else
            {
                $message = 'There is some error in the file upload. Please check the following error.<br>';
                $message .= 'Error:' . $_FILES['uploadedFile']['error'];
            }
            $data['status']="0";

            $data['file_name']=$fileName;
            $data['file_url']=$dest_path_;


            print json_encode( $data);

            exit;
        }
}