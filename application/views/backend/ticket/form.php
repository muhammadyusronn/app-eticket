<!-- Body: Body -->
<div class="body d-flex py-3">
  <div class="container-xxl">

    <!-- Back Link -->
    <div class="row mb-2">
      <div class="col-12">
        <a href="<?= base_url('knowledgebase'); ?>" class="ct-back-link text-decoration-none">
          <i class="icofont-arrow-left me-1"></i> Kembali ke Pencarian
        </a>
      </div>
    </div>

    <!-- Page Header -->
    <div class="row mb-4">
      <div class="col-12">
        <h3 class="fw-bold mb-1">Buat Tiket Baru</h3>
        <p class="text-muted mb-0">Solusi tidak ditemukan. Silakan lengkapi formulir di bawah ini agar tim dukungan kami
          dapat membantu Anda.</p>
      </div>
    </div>

    <div class="row g-4">
      <!-- Left Column: Detail Masalah -->
      <div class="col-lg-8">
        <div class="card ct-form-card">
          <div class="card-body p-4">
            <h5 class="fw-bold mb-4">Detail Masalah</h5>

            <form id="ct-ticket-form" enctype="multipart/form-data">
              <!-- Judul Pertanyaan -->
              <div class="mb-4">
                <label for="ct-judul" class="form-label fw-bold ct-label">JUDUL PERTANYAAN <span
                    class="text-danger">*</span></label>
                <input type="text" class="form-control ct-input" id="ct-judul" name="judul"
                  placeholder="Contoh: Error saat login aplikasi SIPP" required>
              </div>

              <!-- Kategori -->
              <div class="mb-4">
                <label for="ct-kategori" class="form-label fw-bold ct-label">KATEGORI <span
                    class="text-danger">*</span></label>
                <select class="form-select ct-input" id="ct-kategori" name="kategori" required>
                  <option value="" selected disabled>Pilih Kategori Masalah</option>
                  <option value="Software">Software</option>
                  <option value="Hardware">Hardware</option>
                </select>
              </div>

              <!-- Aplikasi -->
              <div class="mb-4">
                <label for="ct-aplikasi" class="form-label fw-bold ct-label">APLIKASI <span
                    class="text-danger">*</span></label>
                <select class="form-select ct-input" id="ct-aplikasi" name="aplikasi" required>
                  <option value="" selected disabled>Pilih Aplikasi</option>
                  <option value="SIKEP">SIKEP</option>
                  <option value="E-Court">E-Court</option>
                  <option value="SIPP">SIPP</option>
                  <option value="KINSATKER">KINSATKER</option>
                </select>
              </div>

              <!-- Deskripsi Masalah -->
              <div class="mb-3">
                <label for="ct-deskripsi" class="form-label fw-bold ct-label">DESKRIPSI MASALAH <span
                    class="text-danger">*</span></label>
                <textarea class="form-control ct-input ct-textarea" id="ct-deskripsi" name="deskripsi" rows="5"
                  placeholder="Jelaskan langkah-langkah terjadinya error secara detail..." required></textarea>
              </div>
              <p class="text-muted small mb-4">Sertakan detail yang relevan seperti waktu kejadian dan pesan error yang
                muncul.</p>

              <!-- Lampiran -->
              <div class="mb-3">
                <label class="form-label fw-bold ct-label">LAMPIRAN (OPSIONAL)</label>
                <div class="ct-upload-area" id="ct-upload-area">
                  <input type="file" class="d-none" id="ct-file-input" name="lampiran" accept=".png,.jpg,.jpeg,.pdf"
                    multiple>
                  <div class="ct-upload-content text-center" id="ct-upload-content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                      class="mb-2 text-muted" viewBox="0 0 16 16">
                      <path
                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                      <path
                        d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                    </svg>
                    <p class="mb-1 fw-semibold">Pilih file atau tarik ke sini</p>
                    <p class="text-muted small mb-0">PNG, JPG, PDF (Max. 5MB)</p>
                  </div>
                </div>
                <!-- File list -->
                <div id="ct-file-list" class="mt-2"></div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Right Column: Tipe Layanan & Submit -->
      <div class="col-lg-4">
        <!-- Tipe Layanan Card -->
        <div class="card ct-form-card mb-4">
          <div class="card-body p-4">
            <h5 class="fw-bold mb-3">Tipe Layanan</h5>

            <!-- Regular Option -->
            <div class="ct-service-option active mb-3" id="ct-opt-regular" data-type="regular">
              <div class="d-flex align-items-start">
                <div class="ct-service-icon me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                      d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.855-.439-.855-.842 0-.464.36-.789.855-.876v1.718zm.6 1.548c.713.164 1.045.44 1.045.89 0 .527-.422.876-1.045.966V8.893z" />
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8z" />
                  </svg>
                </div>
                <div>
                  <h6 class="fw-bold mb-1">REGULAR</h6>
                  <p class="text-muted small mb-0">Layanan standar untuk masalah umum. Waktu respon estimasi 1×24 jam
                    kerja.</p>
                </div>
              </div>
            </div>

            <!-- Token Urgent Option -->
            <div class="ct-service-option" id="ct-opt-token" data-type="token">
              <div class="d-flex align-items-start">
                <div class="ct-service-icon me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                  </svg>
                </div>
                <div>
                  <span class="d-flex align-items-center gap-2 mb-1">
                    <h6 class="fw-bold mb-0">TOKEN</h6>
                    <span class="badge ct-badge-urgent">URGENT</span>
                  </span>
                  <p class="text-muted small mb-0">Prioritas tinggi. Membutuhkan kode token khusus untuk memilih tim IKS
                    sesuai yang anda mau.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Token Input (hidden by default) -->
        <div class="card ct-form-card mb-4 d-none" id="ct-token-card">
          <div class="card-body p-4">
            <label for="ct-token-input" class="form-label fw-bold ct-label">KODE TOKEN <span
                class="text-danger">*</span></label>
            <input type="text" class="form-control ct-input" id="ct-token-input" name="token"
              placeholder="Masukkan kode token dari supervisor">
          </div>
        </div>

        <!-- Submit Card -->
        <div class="card ct-submit-card">
          <div class="card-body p-4 text-center">
            <div class="ct-submit-icon mx-auto mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path
                  d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
              </svg>
            </div>
            <p class="text-muted small mb-3">Dengan mengirimkan tiket, Anda menyetujui kebijakan prosedur dukungan Team
              IT IKS.</p>
            <button type="button" class="btn ct-submit-btn w-100 py-2 fw-bold" id="ct-submit-btn">
              Kirim Tiket <i class="icofont-paper-plane ms-1"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

  </div><!-- container-xxl end -->
</div>

<!-- Create Ticket Custom Styles -->
<style>
  /* Back Link */
  .ct-back-link {
    color: #555;
    font-size: 0.9rem;
    transition: all 0.2s ease;
  }

  .ct-back-link:hover {
    color: var(--primary-color, #0d6efd);
  }

  /* Form Card */
  .ct-form-card {
    border: 1px solid #e9ecef;
    border-radius: 12px;
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.04);
  }

  /* Labels */
  .ct-label {
    font-size: 0.75rem;
    letter-spacing: 0.05em;
    color: #333;
  }

  /* Inputs */
  .ct-input {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 10px 14px;
    font-size: 0.9rem;
    transition: all 0.2s ease;
  }

  .ct-input:focus {
    border-color: var(--primary-color, #0d6efd);
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
  }

  .ct-input::placeholder {
    color: #adb5bd;
  }

  /* Textarea */
  .ct-textarea {
    resize: vertical;
    min-height: 120px;
  }

  /* Upload Area */
  .ct-upload-area {
    border: 2px dashed #dee2e6;
    border-radius: 10px;
    padding: 30px 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: #fafbfc;
  }

  .ct-upload-area:hover,
  .ct-upload-area.dragover {
    border-color: var(--primary-color, #0d6efd);
    background: rgba(13, 110, 253, 0.03);
  }

  .ct-upload-content svg {
    opacity: 0.5;
  }

  .ct-upload-area:hover .ct-upload-content svg {
    opacity: 0.8;
  }

  /* File Item */
  .ct-file-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 12px;
    background: #f8f9fa;
    border-radius: 8px;
    margin-bottom: 6px;
    font-size: 0.85rem;
    animation: fadeInUp 0.3s ease;
  }

  .ct-file-item .ct-file-remove {
    background: none;
    border: none;
    color: #dc3545;
    cursor: pointer;
    padding: 2px 6px;
    border-radius: 4px;
    transition: all 0.2s ease;
  }

  .ct-file-item .ct-file-remove:hover {
    background: #fce4ec;
  }

  /* Service Options */
  .ct-service-option {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 16px;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    position: relative;
  }

  .ct-service-option:hover {
    border-color: #adb5bd;
    background: #fafbfc;
  }

  .ct-service-option.active {
    border-color: #198754;
    background: rgba(25, 135, 84, 0.03);
    box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.1);
  }

  .ct-service-option.active::after {
    content: '✓';
    position: absolute;
    top: 10px;
    right: 12px;
    width: 22px;
    height: 22px;
    background: #198754;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem;
    font-weight: bold;
  }

  .ct-service-icon {
    width: 36px;
    height: 36px;
    min-width: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #555;
  }

  .ct-service-option.active .ct-service-icon {
    color: #198754;
  }

  /* Urgent Badge */
  .ct-badge-urgent {
    background: #dc3545;
    color: #fff;
    font-size: 0.6rem;
    padding: 2px 8px;
    border-radius: 4px;
    letter-spacing: 0.05em;
    font-weight: 700;
  }

  /* Submit Card */
  .ct-submit-card {
    border: 1px solid #e9ecef;
    border-radius: 12px;
    background: #f8faf8;
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.04);
  }

  .ct-submit-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #666;
  }

  .ct-submit-btn {
    background: #198754;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 0.95rem;
    letter-spacing: 0.02em;
    transition: all 0.3s ease;
  }

  .ct-submit-btn:hover {
    background: #157347;
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3);
  }

  .ct-submit-btn:active {
    transform: translateY(0);
  }

  /* Animations */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(12px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .ct-form-card {
    animation: fadeInUp 0.4s ease forwards;
  }

  .col-lg-4 .ct-form-card:nth-child(1) {
    animation-delay: 0.1s;
  }

  .col-lg-4 .ct-submit-card {
    animation: fadeInUp 0.4s ease 0.15s forwards;
  }

  /* Success Modal Overlay */
  .ct-success-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    animation: fadeIn 0.3s ease;
  }

  .ct-success-modal {
    background: #fff;
    border-radius: 16px;
    padding: 40px;
    text-center;
    max-width: 400px;
    width: 90%;
    animation: scaleIn 0.3s ease;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  @keyframes scaleIn {
    from {
      transform: scale(0.9);
      opacity: 0;
    }

    to {
      transform: scale(1);
      opacity: 1;
    }
  }

  /* Responsive */
  @media (max-width: 992px) {
    .ct-form-card .card-body {
      padding: 20px !important;
    }
  }
</style>

<!-- Create Ticket JavaScript -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Service type selection
    const optRegular = document.getElementById('ct-opt-regular');
    const optToken = document.getElementById('ct-opt-token');
    const tokenCard = document.getElementById('ct-token-card');
    const options = document.querySelectorAll('.ct-service-option');

    options.forEach(function(opt) {
      opt.addEventListener('click', function() {
        options.forEach(function(o) {
          o.classList.remove('active');
        });
        this.classList.add('active');

        // Show/hide token input
        if (this.getAttribute('data-type') === 'token') {
          tokenCard.classList.remove('d-none');
        } else {
          tokenCard.classList.add('d-none');
        }
      });
    });

    // File upload
    const uploadArea = document.getElementById('ct-upload-area');
    const fileInput = document.getElementById('ct-file-input');
    const fileList = document.getElementById('ct-file-list');
    let selectedFiles = [];

    uploadArea.addEventListener('click', function() {
      fileInput.click();
    });

    // Drag and drop
    uploadArea.addEventListener('dragover', function(e) {
      e.preventDefault();
      this.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', function(e) {
      e.preventDefault();
      this.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', function(e) {
      e.preventDefault();
      this.classList.remove('dragover');
      handleFiles(e.dataTransfer.files);
    });

    fileInput.addEventListener('change', function() {
      handleFiles(this.files);
    });

    function handleFiles(files) {
      var maxSize = 5 * 1024 * 1024; // 5MB
      var allowedTypes = ['image/png', 'image/jpeg', 'image/jpg', 'application/pdf'];

      for (var i = 0; i < files.length; i++) {
        var file = files[i];

        if (!allowedTypes.includes(file.type)) {
          alert('Tipe file "' + file.name + '" tidak didukung. Gunakan PNG, JPG, atau PDF.');
          continue;
        }

        if (file.size > maxSize) {
          alert('File "' + file.name + '" melebihi batas 5MB.');
          continue;
        }

        selectedFiles.push(file);
      }

      renderFileList();
    }

    function renderFileList() {
      fileList.innerHTML = '';
      selectedFiles.forEach(function(file, index) {
        var size = (file.size / 1024).toFixed(1);
        var unit = 'KB';
        if (size > 1024) {
          size = (size / 1024).toFixed(1);
          unit = 'MB';
        }

        var item = document.createElement('div');
        item.className = 'ct-file-item';
        item.innerHTML = '<div class="d-flex align-items-center">' +
          '<i class="icofont-file-document me-2 text-primary"></i>' +
          '<span>' + file.name + ' <small class="text-muted">(' + size + ' ' + unit + ')</small></span>' +
          '</div>' +
          '<button type="button" class="ct-file-remove" data-index="' + index + '">' +
          '<i class="icofont-close-line"></i>' +
          '</button>';
        fileList.appendChild(item);
      });

      // Bind remove buttons
      document.querySelectorAll('.ct-file-remove').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
          e.stopPropagation();
          var idx = parseInt(this.getAttribute('data-index'));
          selectedFiles.splice(idx, 1);
          renderFileList();
        });
      });
    }

    // Form submit
    var submitBtn = document.getElementById('ct-submit-btn');
    submitBtn.addEventListener('click', function() {
      var judul = document.getElementById('ct-judul').value.trim();
      var kategori = document.getElementById('ct-kategori').value;
      var deskripsi = document.getElementById('ct-deskripsi').value.trim();
      var activeType = document.querySelector('.ct-service-option.active');
      var serviceType = activeType ? activeType.getAttribute('data-type') : '';

      // Validation
      if (!judul) {
        alert('Silakan isi judul pertanyaan.');
        document.getElementById('ct-judul').focus();
        return;
      }
      if (!kategori) {
        alert('Silakan pilih kategori masalah.');
        document.getElementById('ct-kategori').focus();
        return;
      }
      if (!deskripsi) {
        alert('Silakan isi deskripsi masalah.');
        document.getElementById('ct-deskripsi').focus();
        return;
      }

      if (serviceType === 'token') {
        var tokenVal = document.getElementById('ct-token-input').value.trim();
        if (!tokenVal) {
          alert('Silakan masukkan kode token dari supervisor.');
          document.getElementById('ct-token-input').focus();
          return;
        }
      }

      // Show success message
      showSuccessModal();
    });

    function showSuccessModal() {
      var overlay = document.createElement('div');
      overlay.className = 'ct-success-overlay';
      overlay.innerHTML = '<div class="ct-success-modal text-center">' +
        '<div style="width:64px;height:64px;border-radius:50%;background:#e8f5e9;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">' +
        '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#198754" viewBox="0 0 16 16">' +
        '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>' +
        '</svg></div>' +
        '<h4 class="fw-bold mb-2">Tiket Berhasil Dikirim!</h4>' +
        '<p class="text-muted mb-3">Tiket Anda telah tercatat. Tim IT akan segera meninjau dan menghubungi Anda.</p>' +
        '<p class="mb-4"><span class="badge bg-light text-dark px-3 py-2 fs-6">No. Tiket: TKT-' + generateTicketNo() +
        '</span></p>' +
        '<button class="btn ct-submit-btn px-4 py-2" onclick="window.location.href=\'' + '<?= base_url("dash"); ?>' +
        '\'">Kembali ke Dashboard</button>' +
        '</div>';

      document.body.appendChild(overlay);

      overlay.addEventListener('click', function(e) {
        if (e.target === overlay) {
          overlay.remove();
        }
      });
    }

    function generateTicketNo() {
      var now = new Date();
      var month = String(now.getMonth() + 1).padStart(2, '0');
      var random = String(Math.floor(Math.random() * 999) + 1).padStart(3, '0');
      return month + '-' + random;
    }
  });
</script>