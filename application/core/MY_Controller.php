<?php
use Firebase\JWT\JWT;
use Restserver\Libraries\REST_Controller;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use PubNub\PubNub;
use PubNub\Enums\PNStatusCategory;
use PubNub\Callbacks\SubscribeCallback;
use PubNub\PNConfiguration;
use Lcobucci\JWT\Validation\ConstraintViolation;


//Load Composer's autoloader
require 'vendor/autoload.php';
/**
 * Created by PhpStorm.
 * User: rock
 * Date: 23/7/2017
 * Time: 1:31 AM
 */

class MY_Controller extends CI_Controller
{
    const RESULT_FIELD_NAME = "result";
    const MESSAGE_FIELD_NAME = "msg";
    const EXTRA_FIELD_NAME = "extra";

	public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
        $this->load->library('session');

	}

    protected function generateToken($user_id){
        $token['id'] = $user_id;
        $date = new DateTime();
        $token['iat'] = $date->getTimestamp();
        $token['exp'] = $date->getTimestamp() + 60*60*24*5;
        $token_code = JWT::encode($token,$this->config->item('encryption_key'),'HS256');
        return $token_code;
    }

    protected function verificationToken($token) {
        $ret_val = array();
        try{

            $user_data = JWT::decode($token, $this->config->item('encryption_key'), array('HS256'));
            $user_model = $this->User_model->getOnlyUser(array('ID' => $user_data->id));

            if($user_model[0]['status'] == '3') {
                $ret_val[self::RESULT_FIELD_NAME] = true;
                $ret_val['id'] = $user_data->id;

            }
            else {
                $ret_val[self::RESULT_FIELD_NAME] = false;
                $ret_val['id'] = -1;
            }
        }
        catch (Exception $e){
            $ret_val[self::RESULT_FIELD_NAME] = false;
            $ret_val['id'] = -1;
        }
        return $ret_val;
    }

   
	
}
