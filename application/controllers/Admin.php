<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if( isset( $_POST['btn_register'] ) )
		{
			// echo "<pre>";print_r($_POST);exit;
			$postData = array();
			

			$postData['name'] = $_POST['name'];
			$postData['number'] = $_POST['number'];
			$postData['email'] = $_POST['email'];
			$postData['password'] = $_POST['password'];
			if( $this->db->insert( 'mst_users', $postData ) )
			{
				$this->session->set_flashdata('message', ' User Registration Successful!!!!!');	
				redirect( base_url('admin/login') );
			}
		}
		$this->load->view('admin/registration');
	}
	public function login()
	{
		if( isset( $_POST['btn_login'] ) )
		{
			// echo "<pre>";print_r($_POST);exit;
			$this->session->set_userdata(array('username' => $_POST['email']	));
			$email = $_POST['email'];
			$password = $_POST['password'];

			$userExistCount = $this->Admin_model->getUserCount( $email , $password  );
			// echo $this->db->last_query();exit;
			// echo count($userExistCount);exit;
			if( count($userExistCount) > 0  )
				
				redirect( base_url('admin/profile') );
			else
			{
				$this->session->set_flashdata('message', ' Wrong UserName or password');
				redirect( base_url('admin/login') );
			}
			// if( $this->db->insert( 'mst_users', $postData ) )
			// {
			// 	$this->session->set_flashdata('message', ' User Registration Successful!!!!!');	
			// }
		}
		$this->load->view('admin/login');
	}
	public function profile()
	{
		$this->load->view('admin/profile');
	}
	public function addCard()
	{
		$sessionData= "";
		$sessionData =  $this->session->userdata('username');
		if( isset( $_POST['btn_add_card'] ) )
		{
			// echo "<pre>";print_r($_POST);exit;

			$postData = array();
			$postData['title'] = $_POST['title'];
			$postData['tags'] = $_POST['tags'];
			$postData['description'] = $_POST['description'];
			$postData['addedby'] = $sessionData;
			if( $this->db->insert( 'mst_cards', $postData ) )
			{
				$this->session->set_flashdata('message', ' Card Added Successful!!!!!');
					redirect( base_url('admin/viewCard') );
			}
		}
		
		$this->load->view('admin/addCard');
	}
	public function viewCard()
	{
		// echo $this->session->userdata('username');exit;

		$data['viewCardData'] = $this->Admin_model->getViewCardData();
		$this->load->view('admin/viewCard',$data);
	}
	public function ascSort()
	{
		$data['viewCardData'] = $this->Admin_model->getViewCardDataInAsc();
		$this->load->view('admin/viewCard',$data);
	}
	public function descSort()
	{
		$data['viewCardData'] = $this->Admin_model->getViewCardDataInDesc();
		$this->load->view('admin/viewCard',$data);
	}
	public function searchCard()
	{

		// echo "<pre>";print_r($_POST);exit;
		$title = $_POST['title'];
		$tags = $_POST['tags'];
		$username = $_POST['username'];
		if( !empty($username) )
		{

		$data['viewCardData'] = $this->Admin_model->getsearchUserData( $username);
		}
		else if ( !empty($title) &&  empty($tags) )
		{

		$data['viewCardData'] = $this->Admin_model->getsearchTitleCardData( $title);
		}
		else if ( empty($title) &&  !empty($tags) )
		{

		$data['viewCardData'] = $this->Admin_model->getsearchCardData( $tags);
		}
		else if ( !empty($title) &&  !empty($tags) )
		{

		$data['viewCardData'] = $this->Admin_model->getsearchAllCardData($title, $tags);
		}
		// echo $this->db->last_query();exit;
		$this->load->view('admin/viewCard',$data);
	}

public function logout()
	{
		// echo "<pre>";print_r($_POST);exit;
		$this->session->unset_userdata('username');
			redirect( base_url('admin/login') );
			// $data['viewCardData'] = $this->Admin_model->getViewCardData();
		// $this->load->view('admin/viewCard');
	}
}
