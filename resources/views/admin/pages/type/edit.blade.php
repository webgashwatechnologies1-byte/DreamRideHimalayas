<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Type | Dashboard</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/app/css/app.css">
  <link rel="stylesheet" href="/app/css/map.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .form-card {
      background: #fff;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }
    .form-label {
      font-weight: 600;
    }
  </style>
  {!! ToastMagic::styles() !!}
</head>

<body class="body header-fixed">

  <div class="preload preload-container">
    <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
      <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20"></circle>
      <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20"></circle>
      <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20"></circle>
      <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20"></circle>
    </svg>
  </div>

  <div id="wrapper">
    <div id="pagee" class="clearfix">
      @include('admin.components.sidebar')

      <div class="has-dashboard">
        <header class="main-header flex">
          <div id="header">
            <div class="header-dashboard">
              <div class="tf-container full">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="inner-container flex justify-space align-center">
                      <div class="header-search flex-three">
                        <div class="icon-bars"><i class="icon-Vector3"></i></div>
                        <form action="/" class="search-dashboard">
                          <i class="icon-Vector5"></i>
                          <input type="search" placeholder="Search...">
                        </form>
                      </div>
                      <div class="nav-outer flex align-center"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>

        <!-- MAIN -->
        <main id="main">
          <section class="profile-dashboard">
            <div class="inner-header mb-40 d-flex justify-content-between align-items-center">
              <div>
                <h3 class="title">Edit Type</h3>
                <p class="des">Modify your existing type details below</p>
              </div>
              <a href="{{ url('/admin/type') }}" class="btn-main-small text-decoration-none">← Back to List</a>
            </div>

            <div class="tf-container">
              <div class="form-card col-lg-6 col-md-8 mx-auto">
                <form id="editTypeForm">
                  @csrf
                  <div class="mb-4">
                    <label for="name" class="form-label">Type Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                  </div>

                  <div class="mb-4">
                    <label for="color" class="form-label">Color</label>
                    <input type="color" id="color" name="color" class="form-control form-control-color" value="#000000">
                  </div>

                  <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark px-4 py-2">Update Type</button>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </main>

        <footer class="footer footer-dashboard mt-5">
          <div class="tf-container full">
            <div class="row">
              <div class="col-lg-6">
                <p class="text-white">Made with ❤️ by Gashwa Technologies.</p>
              </div>
              <div class="col-lg-6">
                <ul class="menu-footer flex-six">
                  <li><a href="#">Privacy & Policy</a></li>
                  <li><a href="#">Licensing</a></li>
                  <li><a href="#">Instruction</a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <!-- JS -->
  

  <script src="/app/js/jquery.min.js"></script>
  <script src="/app/js/jquery.nice-select.min.js"></script>
  <script src="/app/js/bootstrap.min.js"></script>
  <script src="/app/js/tinymce/tinymce.min.js"></script>
  <script src="/app/js/tinymce/tinymce-custom.js"></script>
  <script src="/app/js/swiper-bundle.min.js"></script>
  <script src="/app/js/swiper.js"></script>
  <script src="/app/js/plugin.js"></script>
  <script src="/app/js/map.min.js"></script>
  <script src="/app/js/map.js"></script>
  <script src="/app/js/shortcodes.js"></script>
  <script src="/app/js/auth-validator.js"></script>   
  <script src="/app/js/main.js"></script>
  <script>
    const APP_URL = "{{ config('app.url') }}";
    const typeId = "{{ request()->segment(4) }}"; // expects URL like /admin/type/edit/{id}

    $(document).ready(function () {
      // ==============================
      // Fetch existing type data first
      // ==============================
      async function fetchTypeData() {
        try {
          const response = await fetch(`${APP_URL}/api/type/${typeId}`);
          if (!response.ok) throw new Error('Type not found');
          const data = await response.json();

          $('#name').val(data.name);
          $('#color').val(data.color || '#000000');
        } catch (error) {
          console.error(error);
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Failed to fetch type details.'
          });
        }
      }

      fetchTypeData();

      // ==============================
      // Handle Form Submission
      // ==============================
      $('#editTypeForm').on('submit', function (e) {
        e.preventDefault();

        const formData = {
          name: $('#name').val(),
          color: $('#color').val(),
          _token: '{{ csrf_token() }}'
        };

        $.ajax({
          url: `${APP_URL}/api/type/${typeId}`,
          method: 'PUT',
          data: formData,
          success: function (response) {
            Swal.fire({
              icon: 'success',
              title: 'Type Updated!',
              text: 'Changes have been saved successfully.',
              timer: 1500,
              showConfirmButton: false
            });
            setTimeout(() => {
              window.location.href = `${APP_URL}/admin/type`;
            }, 1500);
          },
          error: function (xhr) {
            let msg = 'Something went wrong.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
              msg = xhr.responseJSON.message;
            }
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: msg
            });
          }
        });
      });
    });
  </script>

  {!! ToastMagic::scripts() !!}
</body>
</html>
