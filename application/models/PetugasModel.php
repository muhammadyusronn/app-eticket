<?php
class PetugasModel extends MY_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->data['table_name'] = 'petugas';
    $this->data['primary_key'] = 'id';
  }

  public function getPetugasTicket($satkerId)
  {
    $this->db->select("
        p.id,
        p.name,
        p.satker_id,
        s.nama_satker,
        COUNT(ta.ticket_id) AS jumlah_ticket
    ");

    $this->db->from('petugas p');

    $this->db->join(
      'satker s',
      's.id = p.satker_id',
      'inner'
    );

    $this->db->join(
      'ticket_assignees ta',
      'ta.petugas_id = p.id',
      'left'
    );

    $this->db->where('p.satker_id', $satkerId);

    $this->db->group_by([
      'p.id',
      'p.name',
      'p.satker_id',
      's.nama_satker'
    ]);

    $this->db->order_by('jumlah_ticket', 'ASC');

    return $this->db->get()->result();
  }
}
