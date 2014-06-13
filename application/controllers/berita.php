<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function index()
	{
		if (!isLogin()) {
			$this->load->view("redirect", array("duration" => 2000, "text" => "Login dengan facebook untuk dapat melihat berita"));
			return;
		}

		$this->mview->addView("js", "berita.js");
		$this->load->view('berita', $this->mview->toView());
	}
	public function single($id) {
		if (!isLogin()) {
			$this->load->view("redirect");
			return;
		}
		$this->mview->addView("postid", $id);
		$this->mview->addView("js", "berita.js");
		$this->load->view('berita_single', $this->mview->toView());	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */