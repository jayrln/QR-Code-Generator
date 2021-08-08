<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexEmployees extends CI_Controller {

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
	    $this->load->model('IndexEmployee_model');
    }
    
	public function index()
	{

		// $data['img_url']="";
		// if($this->input->post('action') && $this->input->post('action') == "generate_qrcode")
		// {
		// 	$this->load->library('ciqrcode');
		// 	$qr_image=rand().'.png';
		// 	$params['data'] = $this->input->post('fname');
		// 	$params['level'] = 'H';
		// 	$params['size'] = 8;
		// 	$params['savename'] =FCPATH."uploads/qr_image/".$qr_image;
		// 	if($this->ciqrcode->generate($params))
		// 	{
		// 		$data['img_url']=$qr_image;	
		// 	}
		// }
		// $this->load->view('Welcome.php',$data);

		$this->load->view('IndexEmployees.php');
	}

	public function Submit() {

		if ($this->input->post('fname') !== null) {

			$this->load->library('ciqrcode');
			$qr_image=rand().'.png';
			$params['data'] = str_replace(".png", "", $qr_image);
			$params['level'] = 'H';
			$params['size'] = 8;
			$params['savename'] =FCPATH."uploads/qr_image_emp/".$qr_image;
			
			if($this->ciqrcode->generate($params))
				{
					$qrCodeName=$qr_image;	
				}

			
			$data = array( 
			   'empID' => $this->input->post('empno'),
			   'Fname' => $this->input->post('fname'), 
			   'Mname' => $this->input->post('mname'),
			   'Lname' => $this->input->post('lname'),
			   'Address' => $this->input->post('address'),
			   'qrCode' => $qrCodeName
			    
			);

			$status = $this->IndexEmployee_model->add_employees($data);

			$repQr = str_replace(".png", "", $qrCodeName);
			//redirect
			redirect(base_url() . 'qrCode/employee/' .$repQr);
		}

	}

}
