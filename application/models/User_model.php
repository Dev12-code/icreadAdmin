<?php
class User_Model extends MY_Model{
    public function getUsersListInDashboard() {
        $users = $this->db -> users->find()->toArray();
        return $users;
    }
}