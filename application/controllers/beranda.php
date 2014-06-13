<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		if (isLogin())
			$this->load->view('beranda', $this->mview->toView());
		else
			$this->load->view('beranda_notlogin', $this->mview->toView());
	}
	public function calons() {
		if (isLogin()) {
			$this->load->view('calons', $this->mview->toView());
		} else {
			$this->load->view("redirect", array("duration" => 4000, "text" => "Login dengan facebook untuk dapat melihat profil calon dan wakil calon presiden"));
		}
	}
	public function calon($kode) {
		if (isLogin()) {
			if (in_array($kode, array("ps", "hr", "jw", "jk"))) {
				$this->mview->addView("js", "calon.js");
				$this->mview->addView("kode", $kode);
				$this->load->view('calon', $this->mview->toView());
			} else {
				$this->load->view("404");
			}
		} else {
			$this->load->view("redirect", array("duration" => 4000, "text" => "Login dengan facebook untuk dapat melihat profil calon dan wakil calon presiden"));
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */