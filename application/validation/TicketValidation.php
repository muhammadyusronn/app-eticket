<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'validation/BaseValidation.php';

class TicketValidation extends BaseValidation
{
  public function store()
  {
    return [
      $this->required('judul', 'Judul'),
      $this->required('deskripsi', 'Deskripsi'),
      $this->required('kategori', 'Kategori'),
      $this->required('module', 'Modul'),
    ];
  }

  public function update_status($status_id)
  {
    $validation = [
      $this->required('ticket_id', 'Ticket ID'),
      $this->required('ticket_status', 'Status Tiket'),
    ];
    if ($status_id == 3) {
      $validation[] = $this->required('pending_reason', 'Alasan Pending');
    }
    if ($status_id == 4) {
      $validation[] = $this->required('root_cause', 'Akar Masalah');
      $validation[] = $this->required('solution', 'Solusi');
      $validation[] = $this->required('preventive_action', 'Tindakan Pencegahan');
    }
    return $validation;
  }

  public function comment()
  {
    return [
      $this->required('ticket_id', 'Ticket ID'),
      $this->required('comment', 'Komentar')
    ];
  }
}
