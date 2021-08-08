<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexLogin extends CI_Controller {

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
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
	    $this->load->database(); 
	    $this->load->model('IndexLogin_model');		
    }
    
	public function index()
	{
		$this->load->view('IndexLogin');

	}

	public function Submit() 
	{
		$lName = $this->input->post('lname');
		$bDate = $this->input->post('bdate');
		//redirect
		redirect(base_url() . 'qrCode/user/' .$lName. '/' . $bDate);	
	}


}
