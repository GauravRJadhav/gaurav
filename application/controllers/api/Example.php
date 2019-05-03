<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Example extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        // $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

   
     public function users_get(){
           $data['CardData'] = $this->Admin_model->getViewCardData();
           $this->response($data); 
       }
   public function userAdd_post(){

           $data = array('name' => $this->input->post('name'),
           'number' => $this->input->post('number'),
           'email' => $this->input->post('email'),
           'password' => $this->input->post('password')
           );
          $r = $this->db->insert('mst_users', $data);
           $this->response($r); 
       }
  public function userEdit_post(){
           // $id = $this->uri->segment(4);
           // echo $id;
           $data = array('name' => $this->input->post('name'),
           'number' => $this->input->post('number'),
           'email' => $this->input->post('email'),
           'password' => $this->input->post('password')
           );
           $this->db->where('user_id',$this->input->post('user_id'));
        $r=   $this->db->update('mst_users',$data);
            // $r = $this->Admin_model->update($id,$data);
               $this->response($r); 
       }
   public function user_delete(){
           $id = $this->uri->segment(4);
           $r = $this->Admin_model->delete($id);
           $this->response($r); 
       }
   
}
