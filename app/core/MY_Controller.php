<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CI_Publics extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$array = array(
			'current_url' => $this->uri->uri_string(),
		);		
		$this->session->set_userdata($array);
	}
}

class CI_Privates extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!$this->libs->log_in()) {
			show_404();
			return FALSE;
		} else {
			if ($this->libs->is_admin()) {
				return TRUE;
			} else {
				show_404();
				return FALSE;
			}
		}
	}
}