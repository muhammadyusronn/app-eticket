<!-- Body: Body -->
<div class="body d-flex py-3">
  <div class="container-xxl">

    <!-- Hero Section -->
    <div class="row justify-content-center mb-4">
      <div class="col-lg-8 text-center">
        <!-- Icon -->
        <div class="kb-hero-icon mx-auto mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
            <path
              d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
          </svg>
        </div>
        <h2 class="fw-bold mb-2">Knowledge Base</h2>
        <p class="text-muted mb-4">Silakan cari solusi untuk masalah Anda di Knowledge Base kami sebelum membuat tiket
          baru. Sebagian besar masalah umum telah didokumentasikan.</p>

        <!-- Search Bar -->
        <div class="kb-search-wrapper mx-auto mb-3">
          <div class="input-group input-group-lg kb-search-group">
            <span class="input-group-text bg-white border-end-0">
              <i class="fa fa-search text-muted"></i>
            </span>
            <input type="text" class="form-control border-start-0" id="kb-search-input"
              placeholder="Ketik kata kunci masalah (contoh: error login SIPP)...">
            <button class="btn btn-primary px-4 fw-bold" type="button" id="kb-search-btn">
              <i class="fa fa-search me-1 d-sm-none"></i>
              <span>Cari Solusi</span>
            </button>
          </div>
        </div>

        <!-- Popular Categories -->
        <div class="kb-popular-tags d-flex align-items-center justify-content-center flex-wrap gap-2">
          <span class="text-muted small me-1">Kategori Populer:</span>
          <button class="btn btn-outline-secondary btn-sm kb-tag-btn" data-category="SIKEP">SIKEP</button>
          <button class="btn btn-outline-secondary btn-sm kb-tag-btn" data-category="E-Court">E-Court</button>
          <button class="btn btn-outline-secondary btn-sm kb-tag-btn" data-category="SIPP">SIPP</button>
          <button class="btn btn-outline-secondary btn-sm kb-tag-btn" data-category="Jaringan">Jaringan</button>
        </div>
      </div>
    </div>

    <!-- Suggested Solutions Section -->
    <div class="row mb-3">
      <div class="col-12 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0">Solusi yang Disarankan</h5>
        <span class="text-muted small" id="kb-result-count">Menampilkan 3 artikel teratas</span>
      </div>
    </div>

    <div class="row g-3 mb-4" id="kb-articles-container">
      <!-- Article Card 1 -->
      <div class="col-md-6 col-lg-4 kb-article-item" data-category="SIKEP">
        <div class="card kb-article-card h-100">
          <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <span class="badge kb-badge-category">SIKEP</span>
              <span class="badge kb-badge-solved">
                <i class="icofont-check-circled me-1"></i>SOLVED
              </span>
            </div>
            <h6 class="fw-bold mb-2 kb-article-title">Gagal Sinkronisasi Data Pegawai pada Aplikasi...</h6>
            <p class="text-muted small flex-grow-1 kb-article-excerpt">Langkah-langkah penyelesaian jika aplikasi SIKEP
              tidak dapat menarik data terbaru dari server...</p>
            <a href="javascript:void(0);" class="kb-read-more text-primary fw-bold small text-decoration-none">
              Baca Solusi Lengkap <i class="icofont-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Article Card 2 -->
      <div class="col-md-6 col-lg-4 kb-article-item" data-category="E-Court">
        <div class="card kb-article-card h-100">
          <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <span class="badge kb-badge-category">E-COURT</span>
              <span class="badge kb-badge-solved">
                <i class="icofont-check-circled me-1"></i>SOLVED
              </span>
            </div>
            <h6 class="fw-bold mb-2 kb-article-title">Error 500 Saat Mengunggah Dokumen...</h6>
            <p class="text-muted small flex-grow-1 kb-article-excerpt">Panduan mengatasi error internal server saat
              upload PDF. Solusi utama melibatkan pengecekan...</p>
            <a href="javascript:void(0);" class="kb-read-more text-primary fw-bold small text-decoration-none">
              Baca Solusi Lengkap <i class="icofont-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Article Card 3 -->
      <div class="col-md-6 col-lg-4 kb-article-item" data-category="SIPP">
        <div class="card kb-article-card h-100">
          <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <span class="badge kb-badge-category">SIPP</span>
              <span class="badge kb-badge-solved">
                <i class="icofont-check-circled me-1"></i>SOLVED
              </span>
            </div>
            <h6 class="fw-bold mb-2 kb-article-title">Database SIPP Terkunci (Locked) Saat Delegasi...</h6>
            <p class="text-muted small flex-grow-1 kb-article-excerpt">Cara aman melepaskan lock pada tabel database
              SIPP ketika proses pencatatan delegasi terputus...</p>
            <a href="javascript:void(0);" class="kb-read-more text-primary fw-bold small text-decoration-none">
              Baca Solusi Lengkap <i class="icofont-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Article Card 4 (hidden by default, appears on search) -->
      <div class="col-md-6 col-lg-4 kb-article-item d-none" data-category="Jaringan">
        <div class="card kb-article-card h-100">
          <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <span class="badge kb-badge-category">JARINGAN</span>
              <span class="badge kb-badge-solved">
                <i class="icofont-check-circled me-1"></i>SOLVED
              </span>
            </div>
            <h6 class="fw-bold mb-2 kb-article-title">Koneksi VPN Tidak Stabil Saat Akses Aplikasi...</h6>
            <p class="text-muted small flex-grow-1 kb-article-excerpt">Panduan troubleshooting koneksi VPN yang
              intermittent saat mengakses aplikasi internal Badilag...</p>
            <a href="javascript:void(0);" class="kb-read-more text-primary fw-bold small text-decoration-none">
              Baca Solusi Lengkap <i class="icofont-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Article Card 5 (hidden by default) -->
      <div class="col-md-6 col-lg-4 kb-article-item d-none" data-category="SIKEP">
        <div class="card kb-article-card h-100">
          <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <span class="badge kb-badge-category">SIKEP</span>
              <span class="badge kb-badge-pending">
                <i class="icofont-clock-time me-1"></i>PENDING
              </span>
            </div>
            <h6 class="fw-bold mb-2 kb-article-title">Data Mutasi Pegawai Tidak Muncul di SIKEP...</h6>
            <p class="text-muted small flex-grow-1 kb-article-excerpt">Langkah pelaporan jika data mutasi yang sudah
              diinput tidak tampil di dashboard SIKEP...</p>
            <a href="javascript:void(0);" class="kb-read-more text-primary fw-bold small text-decoration-none">
              Baca Solusi Lengkap <i class="icofont-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Article Card 6 (hidden by default) -->
      <div class="col-md-6 col-lg-4 kb-article-item d-none" data-category="E-Court">
        <div class="card kb-article-card h-100">
          <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <span class="badge kb-badge-category">E-COURT</span>
              <span class="badge kb-badge-solved">
                <i class="icofont-check-circled me-1"></i>SOLVED
              </span>
            </div>
            <h6 class="fw-bold mb-2 kb-article-title">Gagal Login E-Court Setelah Reset Password...</h6>
            <p class="text-muted small flex-grow-1 kb-article-excerpt">Solusi ketika pengguna tidak bisa login ke
              E-Court meskipun sudah melakukan reset password melalui admin...</p>
            <a href="javascript:void(0);" class="kb-read-more text-primary fw-bold small text-decoration-none">
              Baca Solusi Lengkap <i class="icofont-arrow-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- No Results Message (hidden by default) -->
    <div class="row mb-4 d-none" id="kb-no-results">
      <div class="col-12 text-center py-5">
        <img src="<?= base_url() ?>assets/images/no-data.svg" alt="No Data" style="max-width: 200px;" class="mb-3">
        <h5 class="fw-bold text-muted">Tidak ada artikel yang ditemukan</h5>
        <p class="text-muted">Coba gunakan kata kunci lain atau buat tiket baru</p>
      </div>
    </div>

    <!-- CTA: Solution Not Found -->
    <div class="row">
      <div class="col-12">
        <div class="card kb-cta-card">
          <div class="card-body py-4 px-4">
            <div class="d-flex align-items-center flex-column flex-md-row">
              <div class="kb-cta-icon me-md-4 mb-3 mb-md-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                  <path
                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                </svg>
              </div>
              <div class="flex-grow-1">
                <h5 class="fw-bold mb-1">Solusi tidak ditemukan?</h5>
                <p class="text-muted mb-0 small">Jika Anda sudah mencari dan tidak menemukan dokumentasi yang sesuai
                  dengan masalah Anda, silakan lanjutkan untuk membuat tiket dukungan baru kepada tim IT.</p>
              </div>
              <div class="ms-md-4 mt-3 mt-md-0">
                <a href="javascript:void(0);" class="btn btn-outline-dark px-4 py-2 fw-bold kb-create-ticket-btn">
                  <i class="icofont-plus me-1"></i> Lanjut Buat Tiket
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div><!-- container-xxl end -->
</div>

<!-- Knowledge Base Custom Styles -->
<style>
  /* Hero Icon */
  .kb-hero-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: var(--primary-color, #0d6efd);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    margin-bottom: 8px;
    box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
  }

  /* Search Wrapper */
  .kb-search-wrapper {
    max-width: 640px;
  }

  .kb-search-group {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    border: 1px solid #dee2e6;
  }

  .kb-search-group .input-group-text {
    border: none;
    padding-left: 16px;
  }

  .kb-search-group .form-control {
    border: none;
    font-size: 0.95rem;
    padding: 12px 8px;
  }

  .kb-search-group .form-control:focus {
    box-shadow: none;
  }

  .kb-search-group .btn-primary {
    border: none;
    border-radius: 0 10px 10px 0 !important;
    font-size: 0.9rem;
    letter-spacing: 0.02em;
  }

  /* Tag Buttons */
  .kb-tag-btn {
    border-radius: 20px;
    font-size: 0.8rem;
    padding: 4px 14px;
    transition: all 0.2s ease;
  }

  .kb-tag-btn:hover,
  .kb-tag-btn.active {
    background-color: var(--primary-color, #0d6efd);
    color: #fff;
    border-color: var(--primary-color, #0d6efd);
    transform: translateY(-1px);
  }

  /* Article Cards */
  .kb-article-card {
    border: 1px solid #e9ecef;
    border-radius: 12px;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    cursor: pointer;
  }

  .kb-article-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    border-color: var(--primary-color, #0d6efd);
  }

  .kb-article-card .card-body {
    padding: 20px;
  }

  /* Category Badge */
  .kb-badge-category {
    background-color: #f0f0f0;
    color: #555;
    font-weight: 600;
    font-size: 0.7rem;
    padding: 4px 10px;
    border-radius: 4px;
    letter-spacing: 0.03em;
  }

  /* Solved Badge */
  .kb-badge-solved {
    background-color: #e8f5e9;
    color: #2e7d32;
    font-weight: 600;
    font-size: 0.7rem;
    padding: 4px 10px;
    border-radius: 4px;
  }

  /* Pending Badge */
  .kb-badge-pending {
    background-color: #fff3e0;
    color: #e65100;
    font-weight: 600;
    font-size: 0.7rem;
    padding: 4px 10px;
    border-radius: 4px;
  }

  /* Article Title */
  .kb-article-title {
    font-size: 0.95rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  /* Article Excerpt */
  .kb-article-excerpt {
    font-size: 0.82rem;
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  /* Read More Link */
  .kb-read-more {
    font-size: 0.82rem;
    transition: all 0.2s ease;
  }

  .kb-read-more:hover {
    letter-spacing: 0.02em;
  }

  .kb-read-more i {
    transition: transform 0.2s ease;
  }

  .kb-read-more:hover i {
    transform: translateX(4px);
  }

  /* CTA Card */
  .kb-cta-card {
    border: 1px solid #e9ecef;
    border-radius: 12px;
    background: #fff;
  }

  .kb-cta-icon {
    width: 52px;
    height: 52px;
    min-width: 52px;
    border-radius: 50%;
    background: #f5f5f5;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #666;
  }

  .kb-create-ticket-btn {
    border-radius: 8px;
    white-space: nowrap;
    transition: all 0.2s ease;
  }

  .kb-create-ticket-btn:hover {
    background-color: #212529;
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  /* Animation for articles */
  .kb-article-item {
    animation: fadeInUp 0.4s ease forwards;
  }

  .kb-article-item:nth-child(1) {
    animation-delay: 0.05s;
  }

  .kb-article-item:nth-child(2) {
    animation-delay: 0.1s;
  }

  .kb-article-item:nth-child(3) {
    animation-delay: 0.15s;
  }

  .kb-article-item:nth-child(4) {
    animation-delay: 0.2s;
  }

  .kb-article-item:nth-child(5) {
    animation-delay: 0.25s;
  }

  .kb-article-item:nth-child(6) {
    animation-delay: 0.3s;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(16px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Dark mode support */
  [data-theme="dark"] .kb-hero-icon {
    box-shadow: 0 4px 15px rgba(13, 110, 253, 0.4);
  }

  [data-theme="dark"] .kb-search-group {
    border-color: #495057;
  }

  [data-theme="dark"] .kb-badge-category {
    background-color: #2d2d2d;
    color: #adb5bd;
  }

  [data-theme="dark"] .kb-badge-solved {
    background-color: #1b3a1e;
    color: #66bb6a;
  }

  [data-theme="dark"] .kb-badge-pending {
    background-color: #3e2a0a;
    color: #ffb74d;
  }

  [data-theme="dark"] .kb-cta-icon {
    background: #2d2d2d;
    color: #adb5bd;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .kb-search-wrapper {
      max-width: 100%;
    }

    .kb-hero-icon {
      width: 52px;
      height: 52px;
    }

    .kb-hero-icon svg {
      width: 24px;
      height: 24px;
    }
  }
</style>

<!-- Knowledge Base JavaScript -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('kb-search-input');
    const searchBtn = document.getElementById('kb-search-btn');
    const tagBtns = document.querySelectorAll('.kb-tag-btn');
    const articles = document.querySelectorAll('.kb-article-item');
    const resultCount = document.getElementById('kb-result-count');
    const noResults = document.getElementById('kb-no-results');
    const articlesContainer = document.getElementById('kb-articles-container');

    // Search function
    function performSearch() {
      const query = searchInput.value.toLowerCase().trim();
      let visibleCount = 0;

      articles.forEach(function(article) {
        const title = article.querySelector('.kb-article-title').textContent.toLowerCase();
        const excerpt = article.querySelector('.kb-article-excerpt').textContent.toLowerCase();
        const category = article.getAttribute('data-category').toLowerCase();

        if (query === '' || title.includes(query) || excerpt.includes(query) || category.includes(query)) {
          article.classList.remove('d-none');
          visibleCount++;
        } else {
          article.classList.add('d-none');
        }
      });

      // Show/hide no results message
      if (visibleCount === 0) {
        noResults.classList.remove('d-none');
        articlesContainer.classList.add('d-none');
      } else {
        noResults.classList.add('d-none');
        articlesContainer.classList.remove('d-none');
      }

      resultCount.textContent = 'Menampilkan ' + visibleCount + ' artikel';
    }

    // Filter by category
    function filterByCategory(category) {
      let visibleCount = 0;

      articles.forEach(function(article) {
        const artCategory = article.getAttribute('data-category');

        if (artCategory === category) {
          article.classList.remove('d-none');
          visibleCount++;
        } else {
          article.classList.add('d-none');
        }
      });

      if (visibleCount === 0) {
        noResults.classList.remove('d-none');
        articlesContainer.classList.add('d-none');
      } else {
        noResults.classList.add('d-none');
        articlesContainer.classList.remove('d-none');
      }

      resultCount.textContent = 'Menampilkan ' + visibleCount + ' artikel untuk kategori ' + category;
    }

    // Show all articles
    function showAll() {
      articles.forEach(function(article) {
        article.classList.remove('d-none');
      });
      noResults.classList.add('d-none');
      articlesContainer.classList.remove('d-none');
      resultCount.textContent = 'Menampilkan ' + articles.length + ' artikel';
    }

    // Search button click
    searchBtn.addEventListener('click', function() {
      // Clear active tag
      tagBtns.forEach(function(btn) {
        btn.classList.remove('active');
      });

      if (searchInput.value.trim() === '') {
        // Show only first 3 when search is empty
        articles.forEach(function(article, index) {
          if (index < 3) {
            article.classList.remove('d-none');
          } else {
            article.classList.add('d-none');
          }
        });
        resultCount.textContent = 'Menampilkan 3 artikel teratas';
        noResults.classList.add('d-none');
        articlesContainer.classList.remove('d-none');
      } else {
        performSearch();
      }
    });

    // Enter key on search input
    searchInput.addEventListener('keyup', function(e) {
      if (e.key === 'Enter') {
        searchBtn.click();
      }
    });

    // Category tag buttons
    tagBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        const category = this.getAttribute('data-category');

        // Toggle active state
        const wasActive = this.classList.contains('active');
        tagBtns.forEach(function(b) {
          b.classList.remove('active');
        });

        if (wasActive) {
          // Deselect - show default 3
          articles.forEach(function(article, index) {
            if (index < 3) {
              article.classList.remove('d-none');
            } else {
              article.classList.add('d-none');
            }
          });
          resultCount.textContent = 'Menampilkan 3 artikel teratas';
          noResults.classList.add('d-none');
          articlesContainer.classList.remove('d-none');
        } else {
          this.classList.add('active');
          searchInput.value = '';
          filterByCategory(category);
        }
      });
    });
  });
</script>