<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$data['css_page_level_plugins'] = '
		<link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
		';
		$data['css_page_level_styles'] = '';
		$data['js_page_level_plugins'] = '';
		$data['js_page_level_scripts'] = '';
		//1)if set session success and get roles session equal to 1
		if ($this->session->userdata('roles') == 'admin') {
			$this->load->view('admin/header',$data);
			$this->load->view('admin/welcome_message',$data);
			$this->load->view('admin/footer',$data);
		}
		//2)if set session success and get roles session not equal to 1
		else{
			show_404();
		}
	}

	public function home()
	{
		$this->load->view('index');
	}

	public function aboutus()
	{
		$this->load->view('aboutus');
	}
	public function fuel()
	{
		$this->load->view('fuel');
	}
	public function grocer()
	{
		$this->load->view('grocer');
	}
	public function insurance()
	{
		$this->load->view('insurance');
	}
	public function sme()
	{
		$this->load->view('sme');
	}

}
