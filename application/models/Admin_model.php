<?php 
class Admin_model extends CI_Model {





        public $name;
        public $number;
        public $email;
        public $password;

       
         public function getUserCount( $email , $password )
        {
                $this->db->where( 'mst_users.email = "'.$email.'" AND mst_users.password = "'.$password.'"'  );
                $query = $this->db->get('mst_users');
                return $query->result_array();
        }
         public function getViewCardData()
        {
                $query = $this->db->get('mst_cards');
                return $query->result_array();
        }
         public function getViewCardDataInAsc()
        {
                $this->db->order_by('mst_cards.title','asc');
                $query = $this->db->get('mst_cards');
                return $query->result_array();
        }
         public function getViewCardDataInDesc()
        {
                $this->db->order_by('mst_cards.title','desc');
                $query = $this->db->get('mst_cards');
                return $query->result_array();
        }

         public function getsearchCardData( $tags=false )
        {
                 $this->db->where( 'mst_cards.tags like "%'.$tags.'%" '  );
                $query = $this->db->get('mst_cards');
                return $query->result_array();
        }
         public function getsearchAllCardData( $title=false, $tags=false )
        {
                 $this->db->where( ' mst_cards.title like "%'.$title.'%" OR mst_cards.tags like "%'.$tags.'%" '  );
                $query = $this->db->get('mst_cards');
                return $query->result_array();
        }
         public function getsearchTitleCardData( $title=false )
        {
                 $this->db->where( 'mst_cards.title like "%'.$title.'%" '  );
                $query = $this->db->get('mst_cards');
                return $query->result_array();
        }
          public function getsearchUserData( $username = false )
        {
                 $this->db->where( 'mst_cards.addedby = "'.$username.'" '  );
                $query = $this->db->get('mst_cards');
                return $query->result_array();
        }

        // public function insert_entry()
        // {
        //         $this->title    = $_POST['title']; // please read the below note
        //         $this->content  = $_POST['content'];
        //         $this->date     = time();

        //         $this->db->insert('entries', $this);
        // }

        // public function update_entry()
        // {
        //         $this->title    = $_POST['title'];
        //         $this->content  = $_POST['content'];
        //         $this->date     = time();

        //         $this->db->update('entries', $this, array('id' => $_POST['id']));
        // }
         public function delete($id){
   
       $result = $this->db->query("delete from `mst_users` where user_id = $id");
       if($result)
       {
           return "Data is deleted successfully";
       }
       else
       {
           return "Error has occurred";
       }
   }
   public function update($id,$data){
   
      $this->name    = $data['name']; // please read the below note
       $this->number  = $data['number'];
       $this->email = $data['email'];
       $this->password = $data['password'];
       $result = $this->db->update('mst_users',$this,array('user_id' => $id));
       if($result)
       {
           return "Data is updated successfully";
       }
       else
       {
           return "Error has occurred";
       }
   }


}


?>