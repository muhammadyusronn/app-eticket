<?php
class CommentAttachmentModel extends MY_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->data['table_name'] = 'comment_attachments';
    $this->data['primary_key'] = 'id';
  }
}
