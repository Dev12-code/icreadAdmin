<?php

class Post_model extends MY_Model{
    public function gePostsListInDashboard() {
        $posts = $this->db -> posts->find()->toArray();
        for ($i = 0; $i < count($posts); $i++) {
            $author = $posts[$i]["author"];
            $user = $this->db -> users->findone(array('_id' => new MongoDB\BSON\ObjectID($author)));
            // $user = $this->db -> users->findone(array('phone' => "5303242463"));
            $posts[$i]['user'] = $user;
            $post_id = (string)($posts[$i]->_id);
            $comments = $this->db -> comments->find(array('post_id' =>$post_id ))->toArray();
           
            for ($j = 0; $j < count($comments); $j++) {
                $comments[$j]['user'] =  $this->db -> users->findone(array('_id' =>new MongoDB\BSON\ObjectID($comments[$j]['commmenter_user_id'])));
            }
            $posts[$i]['comments'] = $comments;
        }
        return $posts;
    }
}