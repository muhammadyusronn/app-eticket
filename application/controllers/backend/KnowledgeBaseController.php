<?php
class KnowledgeBaseController extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Knowledge Base - e-Ticket';
    $data['active'] = 'knowledgebase';
    $this->render('backend/knowledgebase', $data);
  }
}
