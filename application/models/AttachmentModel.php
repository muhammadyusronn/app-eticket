<?php
class AttachmentModel extends MY_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->data['table_name'] = 'ticket_attachment';
    $this->data['primary_key'] = 'id';
  }
}
