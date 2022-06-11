<?php
class Interesting_model extends MY_Model{
    public function getInterestingListInDashboard() {
        $interesting = $this->db -> interests->find()->toArray();
        return $interesting;
    }
    public function getUserDeatil($where = array()) {
        $user = $this->db -> users->findone($where);
        $posts = $this->db -> posts->find(array('author' =>(string)($user->_id) ))->toArray();
        for ($i = 0; $i < count($posts); $i++) {          
            $post_id = (string)($posts[$i]->_id);
            $comments = $this->db -> comments->find(array('post_id' =>$post_id ))->toArray();
           $posts[$i]['user'] = $user;
            for ($j = 0; $j < count($comments); $j++) {
                $comments[$j]['user'] =  $this->db -> users->findone(array('_id' =>new MongoDB\BSON\ObjectID($comments[$j]['commmenter_user_id'])));
            }
            $posts[$i]['comments'] = $comments;
        }
        $user['posts'] = $posts;
        return $user;
    }
    public function createInterest($where = array()) {
        try {
            $interesting = $this->db -> interests->insertOne($where);
        } catch (Exception $e) {
            return 0;

        }
        return 1;

    }
    public function removeInterest($where = array()) {
      
        $interesting = $this->db -> interests->deleteOne($where);      
        
        return 1;

    }
    public function editInterest($whereArray = array(), $setArray = array()) {
        $interesting = $this->db -> interests->updateOne($whereArray, ['$set' => $setArray]);       
        return 1;

    }

}