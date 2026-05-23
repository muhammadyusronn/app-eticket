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
    $this->load->model('TicketCommentModel');
    $this->load->model('CommentAttachmentModel');

    require_once APPPATH . 'validation/TicketValidation.php';

    $this->validation = new TicketValidation();
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
      $this->form_validation->set_rules(
        $this->validation->store()
      );

      if ($this->form_validation->run() == FALSE) {
        $this->flashmsg(
          validation_errors('<li>', '</li>'),
          'danger'
        );
        redirect('create-ticket');
      } else {

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
      }
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
    $comments = $this->TicketCommentModel->get_comments_with_attachment(['ticket_id' => $id]);
    // $this->dump($ticket);
    if (count($ticket) > 0) {
      $data['ticket'] = $ticket[0];
    } else {
      $this->flashmsg('Tiket tidak ditemukan', 'danger');
      redirect('ticket');
    }

    $data['url'] = base_url('update-ticket-status');
    $data['title'] = 'Detail Tiket - e-Ticket';
    $data['active'] = 'ticket';
    $data['ticket'] = $ticket[0];
    $data['attachment'] = $attachment;
    $data['comments'] = $comments;
    $data['status'] = $this->StatusModel->get();
    $this->render('backend/ticket/detail', $data);
  }

  public function comment()
  {
    if (isset($_POST['submit'])) {
      $ticketId = $this->input->post('ticket_id');
      $comment = $this->input->post('comment');

      $this->form_validation->set_rules(
        $this->validation->comment()
      );

      if ($this->form_validation->run() == FALSE) {
        $this->flashmsg(
          validation_errors('<li>', '</li>'),
          'danger'
        );
        redirect('edit-ticket?id=' . $ticketId);
        return;
      }

      $result = $this->do_upload_multiple('attachment', 'upload/attachment/comments/');
      if (!$result['is_success']) {
        $this->flashmsg('Gagal melakukan upload file', 'danger');
        redirect('edit-ticket?id=' . $ticketId);
        return;
      }

      $this->db->trans_start();
      // Insert ticket comment
      $insert = $this->db->insert('ticket_comments', [
        'ticket_id' => $ticketId,
        'name' => 'Muhammad Yusron Hartoyo',
        'comment' => $comment,
        'created_at' => date('Y-m-d H:i:s'),
      ]);
      $commentId = $this->db->insert_id();

      if ($result['is_success'] && count($result['files']) > 0) {
        foreach ($result['files'] as $i) {
          $this->CommentAttachmentModel->insert([
            'comment_id' => $commentId,
            'attachment' => $i,
            'uploaded_at' => date('Y-m-d H:i:s')
          ]);
        }
      }

      $this->db->trans_complete();
      if ($this->db->trans_status() === FALSE) {
        $this->flashmsg('Gagal menambah komentar', 'danger');
        redirect('edit-ticket?id=' . $ticketId);
      } else {
        $this->flashmsg('Sukses menambah komentar', 'success');
        redirect('edit-ticket?id=' . $ticketId);
      }
    } else {
      redirect('edit-ticket?id=' . $ticketId);
    }
  }

  public function update_ticket_status()
  {
    if (isset($_POST['submit'])) {

      $id = $this->input->post('ticket_id');
      $statusId = $this->input->post('ticket_status');
      $this->form_validation->set_rules(
        $this->validation->update_status($statusId)
      );

      if ($this->form_validation->run() == FALSE) {
        $this->flashmsg(
          validation_errors('<li>', '</li>'),
          'danger'
        );
        redirect('edit-ticket?id=' . $id);
        return;
      }

      $ticket = $this->TicketModel->get_all_ticket(['t.id' => $id]);
      if (count($ticket) > 0) {
        $ticket = $ticket[0];
      } else {
        $this->flashmsg('Tiket tidak ditemukan', 'danger');
        redirect('ticket');
      }

      $update = $this->TicketModel->update($id, ['status_id' => $statusId]);

      if ($update) {
        // Audit trail
        $this->auditTrailTicket($id, $ticket->status_id, $statusId, $ticket->petugas_id, $this->POST('pending_reason'), $this->POST('root_cause'), $this->POST('solution'), $this->POST('preventive_action'));
        if ($statusId == 3 || $statusId == 4) {
          $this->TicketCommentModel->insert([
            'ticket_id' => $id,
            'name' => 'Muhammad Yusron Hartoyo',
            'comment' => ($statusId == 3) ? $this->POST('pending_reason') : 'Root Cause: ' . $this->POST('root_cause') . '<br>Solution: ' . $this->POST('solution') . '<br>Preventive Action: ' . $this->POST('preventive_action'),
            'created_at' => date('Y-m-d H:i:s'),
          ]);
        }
        $this->flashmsg('Sukses update status ticket', 'success');
        redirect('ticket');
      } else {
        $this->flashmsg('Gagal update status ticket', 'danger');
        redirect('ticket');
      }
    } else {
      redirect('ticket');
    }
  }
}
