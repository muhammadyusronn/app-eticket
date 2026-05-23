<?php
class MY_Controller extends CI_Controller
{
    protected function sendingemail($to, $subject, $message)
    {
        $config = [
            'mailtype'   => 'text',
            'charset'    => 'iso-8859-1',
            'protocol'   => 'smptp',
            'smptp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user'  => 'testingemailcodeku@gmail.com',
            'smtp_pass'  => '123yusron,./',
            'smtp_port'  => 465

        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('testingemailcodeku@gmail.com');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $send = $this->email->send();
        if ($send) {
            echo 'success';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function do_upload($directory = null)
    {
        $path = APPPATH . 'upload/' . $directory;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 10000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }
    }

    public function do_upload_multiple($field_name, $dir)
    {
        $files = $_FILES[$field_name];
        $uploaded_files = [];

        for ($i = 0; $i < count($files['name']); $i++) {

            if ($files['name'][$i] == '') continue;

            $_FILES['file']['name']     = $files['name'][$i];
            $_FILES['file']['type']     = $files['type'][$i];
            $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['file']['error']    = $files['error'][$i];
            $_FILES['file']['size']     = $files['size'][$i];

            $randomName = $this->__generate_random_string(20);
            $extension  = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $newName    = $randomName . '.' . strtolower($extension);

            $config['upload_path']   = FCPATH . $dir;
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size']      = 5120;
            $config['file_name']     = $newName;
            $config['overwrite']     = true;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0755, true);
            }

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $upload_data = $this->upload->data();

                $uploaded_files[] = $upload_data['file_name'];
            } else {

                return [
                    'is_success' => false,
                    'message' => $this->upload->display_errors('', '')
                ];
            }
        }

        return [
            'is_success' => true,
            'files' => $uploaded_files
        ];
    }

    function generateTicketNomber($prefix, $category, $lastNumber)
    {
        // Increment last number
        $nextNumber = $lastNumber;

        // Format: 0001
        $formattedNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        // Result: TID-123-0001
        return "{$prefix}-{$category}-{$formattedNumber}";
    }

    function getLastCounterNumber()
    {
        $this->db->trans_begin();

        try {
            $this->db->select('last_number');
            $this->db->from('ticket_counter');
            $this->db->order_by('id', 'DESC');
            $this->db->limit(1);
            $row = $this->db->get()->row();

            if (!$row) {

                $this->db->insert('ticket_counter', [
                    'last_number' => 0
                ]);

                $lastNumber = 0;
            } else {
                $lastNumber = $row->last_number;
            }
            $newNumber = $lastNumber + 1;

            // Update counter
            $this->db->update('ticket_counter', [
                'last_number' => $newNumber
            ]);
            $this->db->trans_commit();

            return $newNumber;
        } catch (Exception $e) {
            $this->db->trans_rollback();

            throw $e;
        }
    }

    function auditTrailTicket($ticketId, $oldStatus, $newStatus, $changedBy, $pending_reason = null, $root_cause = null, $solution = null, $preventive_action = null)
    {
        $this->load->model('TicketStatusHistoriesModel');
        $this->TicketStatusHistoriesModel->insert([
            'ticket_id' => $ticketId,
            'old_status' => $oldStatus,
            'new_status' => $newStatus,
            'changed_by' => $changedBy,
            'changed_at' => date('Y-m-d H:i:s'),
            'pending_reason' => $pending_reason,
            'root_cause' => $root_cause,
            'solution' => $solution,
            'preventive_action' => $preventive_action
        ]);
    }

    protected function arr_bulan($id)
    {
        $arrNamaBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
        return $arrNamaBulan[$id];
    }

    protected function POST($name)
    {
        return $this->input->post($name, true);
    }
    protected function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
    protected function __generate_random_string($length = 5)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $string;
    }

    protected function render($view, $data = '')
    {
        $this->load->model('TicketModel');
        if (1 == 1) {
            $cond = [
                'status_id' => 1,
                'is_active' => 1
            ];
            $cond_on_progress = [
                'status_id' => 2,
                'is_active' => 1
            ];
            $cond_on_pending = [
                'status_id' => 3,
                'is_active' => 1
            ];
            $cond_on_resolved = [
                'status_id' => 4,
                'is_active' => 1
            ];
            $cond_on_closed = [
                'status_id' => 5,
                'is_active' => 1
            ];
        } else {
            $cond = [
                'status_id' => 1,
                'is_active' => 1
            ];
            $cond_on_progress = [
                'status_id' => 2,
                'is_active' => 1
            ];
            $cond_on_pending = [
                'status_id' => 3,
                'is_active' => 1
            ];
            $cond_on_resolved = [
                'status_id' => 4,
                'is_active' => 1
            ];
            $cond_on_closed = [
                'status_id' => 5,
                'is_active' => 1
            ];
        }
        $data['jumlah_ticket_waiting'] = count($this->TicketModel->get($cond));
        $data['jumlah_ticket_on_progress'] = count($this->TicketModel->get($cond_on_progress));
        $data['jumlah_ticket_pending'] = count($this->TicketModel->get($cond_on_pending));
        $data['jumlah_ticket_resolved'] = count($this->TicketModel->get($cond_on_resolved));
        $data['jumlah_ticket_closed'] = count($this->TicketModel->get($cond_on_closed));
        $this->load->view('backend/template/header', $data);
        $this->load->view($view, $data);
        $this->load->view('backend/template/footer');
    }
    protected function flashmsg($msg, $type = 'success', $name = 'msg')
    {
        $status = ($type == 'success') ? 'Berhasil' : 'Gagal';
        return $this->session->set_flashdata($name, '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
    <strong>' . $status . '!</strong> ' . $msg . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
    }
}
