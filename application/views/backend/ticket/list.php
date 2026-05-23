  <!-- Body: Body -->
  <div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
      <div class="row align-items-center">
        <div class="border-0 mb-4">
          <div
            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0">Tickets</h3>
            <div class="col-auto d-flex w-sm-100">
              <a class="btn btn-dark btn-set-task w-sm-100" href="<?= base_url('create-ticket') ?>"><i
                  class="icofont-plus-circle me-2 fs-6"></i>Add Tickets</a>
            </div>
          </div>
        </div>
      </div> <!-- Row end  -->
      <form action="<?= base_url('ticket') ?>" method="GET">

        <div class="row g-3 align-items-end mb-3">

          <div class="col-md-3">
            <label for="ct-satker" class="form-label fw-bold ct-label">
              Satuan Kerja
              <span class="text-danger">*</span>
            </label>

            <select class="form-select ct-input" id="ct-satker" name="satker">

              <option value="all" <?= (isset($_GET['satker']) && $_GET['satker'] == 'all') ? 'selected' : '' ?>>
                Semua
              </option>

              <?php foreach ($satker as $s): ?>
                <option value="<?= $s->id ?>"
                  <?= (isset($_GET['satker']) && $_GET['satker'] == $s->id) ? 'selected' : '' ?>>
                  <?= $s->nama_satker ?>
                </option>
              <?php endforeach; ?>

            </select>
          </div>

          <div class="col-md-3">
            <label for="ct-status" class="form-label fw-bold ct-label">
              Status
              <span class="text-danger">*</span>
            </label>

            <select class="form-select ct-input" id="ct-status" name="status">

              <option value="all" <?= (isset($_GET['status']) && $_GET['status'] == 'all') ? 'selected' : '' ?>>
                Semua
              </option>

              <?php foreach ($status as $s): ?>
                <option value="<?= $s->id ?>"
                  <?= (isset($_GET['status']) && $_GET['status'] == $s->id) ? 'selected' : '' ?>>
                  <?= $s->status_name ?>
                </option>
              <?php endforeach; ?>

            </select>
          </div>

          <div class="col-md-3">
            <label for="ct-petugas" class="form-label fw-bold ct-label">
              Petugas
              <span class="text-danger">*</span>
            </label>

            <select class="form-select ct-input" id="ct-petugas" name="petugas">

              <option value="all" <?= (isset($_GET['petugas']) && $_GET['petugas'] == 'all') ? 'selected' : '' ?>>
                Semua
              </option>

              <?php foreach ($petugas as $p): ?>
                <option value="<?= $p->id ?>"
                  <?= (isset($_GET['petugas']) && $_GET['petugas'] == $p->id) ? 'selected' : '' ?>>
                  <?= $p->name ?>
                </option>
              <?php endforeach; ?>

            </select>
          </div>

          <div class="col-3 d-flex">
            <button type="submit" class="btn btn-primary ml-auto me-2">
              Filter
            </button>

            <a href="<?= base_url('ticket') ?>" class="btn btn-secondary">
              Reset
            </a>
          </div>

        </div>

      </form>
      <div class="row clearfix g-3">
        <?php echo $this->session->flashdata('msg'); ?>
        <div class="col-sm-12">
          <div class="card mb-3">
            <div class="card-body">
              <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                <thead>
                  <tr>
                    <th>No. Tiket</th>
                    <th>Judul</th>
                    <th>Pelapor</th>
                    <th>Tanggal Lapor</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($tickets as $i): ?>
                    <tr>
                      <td>
                        <a href="<?= base_url('edit-ticket?id=' . $i->id); ?>"
                          class="fw-bold text-secondary"><?= html_escape($i->ticket_number) ?></a>
                      </td>
                      <td>
                        <?= limit_text(html_escape($i->title), 50) ?>
                      </td>
                      <td>
                        <img class="avatar rounded-circle" src="<?= base_url($i->image) ?>" alt="">
                        <span class="fw-bold ms-1"><?= html_escape($i->pelapor) ?></span>
                      </td>
                      <td>
                        <?= date('d-m-Y H:m:s', strtotime($i->reported_at)) ?>
                      </td>
                      <td>
                        <div>
                          <span class="badge bg-info">
                            <?= html_escape($i->petugas) ? html_escape($i->petugas) : 'Unassigned' ?>
                          </span>
                        </div>

                        <div class="mt-1">
                          <span
                            class="badge bg-<?= html_escape($i->status_class) ? html_escape($i->status_class) : 'secondary' ?>">
                            <?= html_escape($i->status_name) ?>
                          </span>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                          <?php if ($i->status_id != 4): ?>
                            <a href="<?= base_url('edit-ticket?id=' . $i->id); ?>" class="btn btn-outline-secondary"><i
                                class="icofont-edit text-success"></i></a>
                            <?php if ($i->status_id == 1): ?>
                              <a href="<?= base_url('cancel-ticket?id=' . $i->id); ?>"
                                onclick="return confirm('Anda yakin membatalkan tiket?')" class="btn btn-outline-secondary">
                                <i class="icofont-ui-delete text-danger"></i>
                              </a>
                            <?php endif; ?>
                          <?php else: ?>
                            <a href="<?= base_url('edit-ticket?id=' . $i->id); ?>" class="btn btn-info">
                              <i class="icofont-eye text-white"></i>
                            </a>
                          <?php endif; ?>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div><!-- Row End -->
    </div>
  </div>