<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Undang extends CI_Controller {

	public function index()
	{
		if (!isLogin()) {
			$this->load->view("redirect");
			return;
		}

		$this->load->view("undang", $this->mview->toView());
	}
	public function u($id) {
		if (isLogin()) {
			$this->load->view('beranda', $this->mview->toView());
		} else {
			$this->sess->set("logby", $id);
			$this->load->view('beranda_notlogin', $this->mview->toView());
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */