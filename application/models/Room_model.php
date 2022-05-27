<?php
class Room_model extends MY_Model{
    public function geRoomsListInDashboard() {
        $users = $this->db -> users->find()->toArray();
        return $users;
    }
}