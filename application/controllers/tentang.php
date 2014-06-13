<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function index()
	{
		isLogin();
		$this->load->view("tentang", $this->mview->toView());
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */