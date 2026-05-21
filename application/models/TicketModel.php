<?php
class TicketModel extends MY_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->data['table_name'] = 'tickets';
    $this->data['primary_key'] = 'id';
  }

  public function get_all_ticket($cond = '')
  {
    $this->db->select("
   t.id,
        t.category,
        m.module_name,
        t.title,
        t.description,
        t.ticket_number,
        s.status_name,
        r.name AS pelapor,
        r.image,
        t.reported_at,
        p.name AS petugas,
        ta.assigned_at,
        CASE
          WHEN t.status_id = 1 THEN 'primary'
          WHEN t.status_id = 2 THEN 'success'
          WHEN t.status_id = 3 THEN 'warning'
          WHEN t.status_id = 4 THEN 'secondary'
          ELSE 'light'
        END AS status_class
");
    $this->db->from('tickets t');
    $this->db->join(
      'status s',
      's.id = t.status_id',
      'inner'
    );
    $this->db->join(
      'reporter r',
      'r.id = t.reported_by',
      'inner'
    );
    $this->db->join(
      'module m',
      'm.id = t.module_id',
      'inner'
    );
    // latest assigned
    $this->db->join(
      '(SELECT 
            ta1.*
        FROM ticket_assignees ta1
        INNER JOIN (
            SELECT 
                ticket_id,
                MAX(assigned_at) AS max_assigned
            FROM ticket_assignees
            GROUP BY ticket_id
        ) latest 
        ON latest.ticket_id = ta1.ticket_id
        AND latest.max_assigned = ta1.assigned_at
        ) ta',
      'ta.ticket_id = t.id',
      'left'
    );

    // petugas
    $this->db->join(
      'petugas p',
      'p.id = ta.petugas_id',
      'left'
    );
    $this->db->where(['t.is_active' => 1]);
    if (is_array($cond)) {
      $this->db->where($cond);
    }
    $query = $this->db->get();
    return $query->result();
  }
}
