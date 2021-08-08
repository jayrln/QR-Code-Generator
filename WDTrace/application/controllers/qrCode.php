<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class qrCode extends CI_Controller {

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
	    $this->load->model('Welcome_model');
	    $this->load->model('IndexLogin_model');
	    $this->load->model('IndexEmployee_model');
    }
    
	public function index()
	{	
		$sCode = $this->uri->segment(3);
		$data['img_url'] = $sCode;
		$data['fetch_details'] = $this->Welcome_model->fetch_details($sCode.'.png');
		$this->load->library('Pdf');
		$this->load->view('qrCode.php',$data);
	}

	public function user() 
	{
		$data = array( 
		   'Lname' => $this->uri->segment(3), 
		   'Birthdate' => $this->uri->segment(4)
		);
			
		$data['fetch_details'] = $this->IndexLogin_model->fetch_details($data);
		
		foreach ($data['fetch_details']->result() as $row)
      		{
      			$data['img_url'] = str_replace(".png", "", $row->qrCode);
      		}
		$this->load->library('Pdf');
		$this->load->view('qrCode.php',$data);
	}

	public function employee() {

		$sCode = $this->uri->segment(3);
		$data['img_url'] = $sCode;
		$data['fetch_details'] = $this->IndexEmployee_model->fetch_details($sCode.'.png');
		$this->load->library('Pdf');
		$this->load->view('qrCodeEmployees.php',$data);

	}

}
