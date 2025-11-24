<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Category | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="/app/css/app.css">
  <link rel="stylesheet" href="/app/css/map.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .upload-image-box label {
      border: 2px dashed #ccc;
      border-radius: 10px;
      padding: 30px;
      width: 100%;
      text-align: center;
      cursor: pointer;
      color: #666;
      transition: 0.3s;
    }
    .upload-image-box label:hover {
      border-color: #222;
      color: #000;
    }
    .image-preview-container img {
      width: 180px;
      height: 150px;
      border-radius: 10px;
      object-fit: cover;
      border: 2px solid #eee;
    }
    .image-preview-actions {
      margin-top: 10px;
      display: flex;
      justify-content: center;
      gap: 10px;
    }
  </style>

  {!! ToastMagic::styles() !!}
</head>

<body class="body header-fixed">

  <div id="wrapper">
    <div id="pagee" class="clearfix">

      @include('admin.components.sidebar')
      <div class="has-dashboard">
        @include('admin.components.header')

        <main id="main">
          <section class="profile-dashboard">
            <form id="editTourForm" enctype="multipart/form-data" class="form-add-tour">
              @csrf
              <input type="hidden" id="id" value="{{ $id }}">

              <div class="widget-dash-board pr-256 mb-75">
                <h4 class="title-add-tour mb-30">Edit Category Information</h4>

                <div class="grid-input-2 mb-45">
                  <div class="input-wrap">
                    <label>Category Name</label>
                    <input type="text" name="name" id="name" placeholder="Category name" required>
                  </div>
                </div>
               
                <div class="input-wrap">
                  <label>Category Image</label>
                  <div class="upload-image-add-car mb-30">
                    <div id="catImagePreview" class="image-preview-container mb-3 text-center"></div>
                    <div class="upload-image-box">
                      <label for="image" class="uploadLabel">
                        <i class="fas fa-image"></i>
                        <span><i class="fa-solid fa-upload me-2"></i>Choose Image</span>
                        <input type="file" name="image" id="image" accept="image/*">
                      </label>
                    </div>
                  </div>
                  <p><span class="text-main">*</span> Supported: JPG, PNG (Max: 2MB)</p>
                </div>

                <div class="input-wrap text-end mt-40">
                  <button type="submit" class="button-add">Update Category</button>
                </div>
              </div>
            </form>
          </section>
        </main>

        <footer class="footer footer-dashboard">
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
  <script src="/app/js/bootstrap.min.js"></script>
  <script src="/app/js/plugin.js"></script>
  <script src="/app/js/main.js"></script>

  <script>
    const APP_URL = "{{ config('app.url') }}";
    let selectedImage = null;
    let currentImage = null;

    $(document).ready(function () {
      const id = $('#id').val();
      const toast = new ToastMagic();

      // ===== Fetch Tour Data =====
      $.get(`${APP_URL}/api/categories/${id}`, function (data) {
        $('#name').val(data.name);
      
        if (data.image) {
          currentImage = data.image;
          $('#catImagePreview').html(`
            <div>
              <img src="${APP_URL}/${data.image.replace(/^\/+/, '')}" alt="Category Image">
              <div class="image-preview-actions">
                <button type="button" class="btn btn-sm btn-secondary" id="editImageBtn">
                  <i class="fas fa-edit"></i> Change
                </button>
                <button type="button" class="btn btn-sm btn-danger" id="deleteImageBtn">
                  <i class="fas fa-trash"></i> Remove
                </button>
              </div>
            </div>
          `);
          $('.upload-image-box').hide();
        }
      }).fail(function () {
        toast.error("Error!", "Failed to load Category details.");
      });

      // ===== Image Preview After Selection =====
      $('#image').on('change', function () {
        const file = this.files[0];
        if (!file || !file.type.startsWith('image/')) return;

        selectedImage = file;
        const reader = new FileReader();
        reader.onload = function (e) {
          $('#catImagePreview').html(`
            <div>
              <img src="${e.target.result}" alt="Preview">
              <div class="image-preview-actions">
                <button type="button" class="btn btn-sm btn-secondary" id="editImageBtn">
                  <i class="fas fa-edit"></i> Change
                </button>
                <button type="button" class="btn btn-sm btn-danger" id="deleteImageBtn">
                  <i class="fas fa-trash"></i> Remove
                </button>
              </div>
            </div>
          `);
        };
        reader.readAsDataURL(file);
        $('.upload-image-box').hide();
      });

      // ===== Edit Image =====
      $(document).on('click', '#editImageBtn', function () {
        $('#image').trigger('click');
      });

      // ===== Delete Image =====
      $(document).on('click', '#deleteImageBtn', function () {
        selectedImage = null;
        currentImage = null;
        $('#catImagePreview').empty();
        $('#image').val('');
        $('.upload-image-box').show();
      });

      // ===== Submit Update Form =====
      $('#editTourForm').on('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        formData.delete('image');
        if (selectedImage) {
          formData.append('image', selectedImage);
        }

        if (!currentImage && !selectedImage) {
          formData.append('remove_image', true);
        }

        $.ajax({
          url: `${APP_URL}/api/categories/${id}`,
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          headers: { 'X-HTTP-Method-Override': 'PUT' },
          success: function (response) {
            toast.success("Success!", "Category updated successfully!");
          },
          error: function (xhr) {
            console.error(xhr.responseText);
            toast.error("Error!", "Failed to update Category.");
          }
        });
      });
    });
  </script>

  {!! ToastMagic::scripts() !!}
</body>
</html>
