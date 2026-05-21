<?php
class ModuleModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'module';
        $this->data['primary_key'] = 'id';
    }
}
