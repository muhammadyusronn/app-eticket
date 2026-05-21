<?php
class TicketController extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function create()
  {
    $data['title'] = 'Buat Tiket Baru - e-Ticket';
    $data['active'] = 'createticket';
    $this->render('backend/ticket/form', $data);
  }
}
