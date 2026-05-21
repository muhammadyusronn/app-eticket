<?php
class StatusModel extends MY_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->data['table_name'] = 'status';
    $this->data['primary_key'] = 'id';
  }
}
