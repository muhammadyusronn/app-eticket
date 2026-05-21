<?php
class TicketController extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('SatkerModel');
    $this->load->model('StatusModel');
    $this->load->model('ModuleModel');
    $this->load->model('TicketModel');
    $this->load->model('PetugasModel');
    $this->load->model('AttachmentModel');
    $this->load->model('TicketAssigneesModel');
  }

  public function index()
  {
    $data['title'] = 'Daftar Tiket - e-Ticket';
    $data['active'] = 'ticket';
    $data['url'] = base_url('ticket');
    $data['status'] = $this->StatusModel->get();
    $data['satker'] = $this->SatkerModel->get();
    $data['petugas'] = $this->PetugasModel->get();
    $cond = [];

    if (isset($_GET['satker']) && $_GET['satker'] != 'all') {
      $cond = array_merge($cond, ['r.satker_id' => $this->input->get('satker')]);
    }

    if (isset($_GET['petugas']) && $_GET['petugas'] != 'all') {
      $cond = array_merge($cond, ['p.id' => $this->input->get('petugas')]);
    }

    if (isset($_GET['status']) && $_GET['status'] != 'all') {
      $cond = array_merge($cond, ['t.status_id' => $this->input->get('status')]);
    }

    $data['tickets'] = $this->TicketModel->get_all_ticket($cond);
    $this->render('backend/ticket/list', $data);
  }

  public function create()
  {
    if (isset($_POST['submit'])) {
      $result = $this->do_upload_multiple('attachment', 'upload/attachment/');
      if (!$result['is_success']) {
        $this->flashmsg('Gagal melakukan upload file', 'danger');
        redirect('create-ticket');
        return;
      }

      $petugas = $this->PetugasModel->getPetugasTicket(2);

      if (count($petugas) > 0) {
        $petugasId = $petugas[0]->id;
      } else {
        $this->flashmsg('Gagal menambah ticket', 'danger');
        redirect('create-ticket');
      }
      $data = [
        'category' => $_POST['kategori'],
        'module_id' => $_POST['module'],
        'ticket_number' => $this->generateTicketNomber('TID', $_POST['module'], $this->getLastCounterNumber()),
        'title' => $_POST['judul'],
        'description' => $_POST['deskripsi'],
        'module_id' => $_POST['module'],
        'reported_by' => 1,
        'reported_at' => date('Y-m-d H:i:s'),
      ];

      $this->db->trans_start();
      // Insert ticket
      $insert = $this->db->insert('tickets', $data);
      $ticketId = $this->db->insert_id();

      // Assign ticket to petugas
      $this->TicketAssigneesModel->insert([
        'ticket_id' => $ticketId,
        'petugas_id' => $petugasId,
        'assigned_at' => date('Y-m-d H:i:s'),
      ]);
      // Audit trail
      $this->auditTrailTicket($ticketId, '0', 1, 1);

      // Insert attachment
      if ($result['is_success'] && count($result['files']) > 0) {
        foreach ($result['files'] as $i) {
          $this->AttachmentModel->insert([
            'ticket_id' => $ticketId,
            'attachment' => $i,
            'created_at' => date('Y-m-d H:i:s')
          ]);
        }
      }

      $this->db->trans_complete();
      if ($this->db->trans_status() === FALSE) {
        $this->flashmsg('Gagal menambah ticket', 'danger');
        redirect('ticket');
      } else {
        $this->flashmsg('Sukses menambah ticket', 'success');
        redirect('ticket');
      }
      exit;
    } else {
      $data['title'] = 'Buat Tiket Baru - e-Ticket';
      $data['active'] = 'createticket';
      $data['url'] = base_url('create-ticket');
      $data['modules'] = $this->ModuleModel->get();
      $this->render('backend/ticket/form', $data);
    }
  }

  public function in_active_ticket()
  {
    $id = $this->input->get('id');
    $this->db->where('id', $id);
    $update = $this->db->update('tickets', ['is_active' => 0]);
    if ($update) {
      $this->flashmsg('Sukses membatalkan ticket', 'success');
      redirect('ticket');
    } else {
      $this->flashmsg('Gagal membatalkan ticket', 'danger');
      redirect('ticket');
    }
  }

  public function detail()
  {
    $id = $this->input->get('id');
    $ticket = $this->TicketModel->get_all_ticket(['t.id' => $id]);
    $attachment = $this->AttachmentModel->get(['ticket_id' => $id]);
    // $this->dump($ticket);
    // exit;
    if (count($ticket) > 0) {
      $data['ticket'] = $ticket[0];
    } else {
      $this->flashmsg('Tiket tidak ditemukan', 'danger');
      redirect('ticket');
    }
    $data['title'] = 'Detail Tiket - e-Ticket';
    $data['active'] = 'ticket';
    $data['ticket'] = $ticket[0];
    $data['attachment'] = $attachment;
    $this->render('backend/ticket/detail', $data);
  }
}
