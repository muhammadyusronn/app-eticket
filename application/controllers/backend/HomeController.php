<?php
class HomeController extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->data['token'] = $this->session->userdata('token');
    // if (empty($this->data['token'])) {
    //   $this->flashmsg('Anda harus login dulu!', 'danger');
    //   redirect('login');
    // }
  }

  public function index()
  {
    $data['title'] = 'Dashboard - Mosaic';
    $data['active'] = 'dash';
    $this->render('backend/dashboard', $data);
  }
}
