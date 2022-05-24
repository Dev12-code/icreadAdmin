<?php
require 'vendor/autoload.php';
/**
 * Created by PhpStorm.
 * User: rock
 * Date: 23/7/2017
 * Time: 12:49 AM
 */
class MY_Model extends CI_Model
{
    /**
     * MY_Model constructor.
     */
    const DB_RESULT_SUCCESS = true;
    const DB_RESULT_FAILED = false;
    const TABLE_USER_INFO = "users";
    const TABLE_ADMIN = "admin";

    public function __construct()
    {
        parent::__construct();
        // echo "okay";
        // echo phpinfo(); exit;
        $MongoDBClient = new MongoDB\Client(
            'mongodb+srv://icered_admin:kjaYkKQeyPtDj6qy@members.br06s.mongodb.net/?authSource=admin&readPreference=primary&ssl=true'
        );
        $MongoDBClient->listDatabases();
        $this->db = $MongoDBClient ->icered;
        // $result =  $this->db->admin->find()->toArray();

        // print_r(json_encode( $result));

        // exit;
    }
}
