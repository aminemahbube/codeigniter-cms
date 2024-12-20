<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $viewFolder = "";

	public function __construct() //Construct metodu bu class çağırıldığında çalışacak olan ilk metottur.
	{
		parent::__construct(); //Sistem klasöründeki Controller'ın içindeki Construct metodunu çalıştırır.
	
		$this->viewFolder="dashboard_v";
	
	}
		public function index()
	{
		$this->load->view("{$this->viewFolder}/index");
	}
}
