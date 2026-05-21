<?php
class SatkerModel extends MY_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->data['table_name'] = 'satker';
    $this->data['primary_key'] = 'id';
  }
}
