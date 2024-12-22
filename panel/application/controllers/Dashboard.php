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
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
}
