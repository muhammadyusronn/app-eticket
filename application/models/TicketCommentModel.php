<?php
class TicketCommentModel extends MY_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->data['table_name'] = 'ticket_comments';
    $this->data['primary_key'] = 'id';
  }

  public function get_comments_with_attachment($cond = '')
  {
    $this->db
      ->select([
        'tc.id',
        'tc.ticket_id',
        'tc.name',
        'tc.comment',
        'tc.created_at',
        'tc.is_deleted',
        'tc.deleted_at',
        'tc.photo'
      ])
      ->select("
        IFNULL(
            GROUP_CONCAT(
                ca.attachment
                ORDER BY ca.uploaded_at ASC
                SEPARATOR '@!@'
            ),
            '0'
        ) AS attachment
    ", false)
      ->from('ticket_comments tc')
      ->join(
        'comment_attachments ca',
        'ca.comment_id = tc.id AND ca.is_deleted = 0',
        'left'
      )
      ->where('tc.is_deleted', 0);
    if (is_array($cond)) {
      $this->db->where($cond);
    }
    $this->db->group_by('tc.id');
    $this->db->order_by('tc.created_at', 'ASC');

    return $this->db->get()->result();
  }
}
