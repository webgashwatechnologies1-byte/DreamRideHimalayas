<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Vehicle | Dashboard</title>
  <link rel="stylesheet" href="/app/css/app.css">
  <link rel="stylesheet" href="/app/css/map.min.css">
  <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  {!! ToastMagic::styles() !!}
</head>

<body class="body header-fixed">

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
                      <h3 class="title">Edit Vehicle</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>

        <main id="main">
          <section class="profile-dashboard">
            <form id="vehicleEditForm" enctype="multipart/form-data" class="form-add-tour">
              @csrf
              @method('PUT')
              <div class="widget-dash-board pr-256 mb-75">
                <h4 class="title-add-tour mb-30">Vehicle Information</h4>

                <div class="grid-input-2 mb-45">
                  <div class="input-wrap">
                    <label>Vehicle Name</label>
                    <input type="text" name="name" required>
                  </div>
                  <div class="input-wrap">
                    <label>RC Number</label>
                    <input type="text" name="rc">
                  </div>
                </div>

                <div class="grid-input-2 mb-45">
                  <div class="input-wrap">
                    <label>Model</label>
                    <input type="text" name="model" required>
                  </div>
                  <div class="input-wrap">
                    <label>Vehicle Number</label>
                    <input type="text" name="number" placeholder="HP34A9876" required>
                  </div>
                </div>
                <div class="input-wrap mb-45">
                  <label>Vehicle Category</label>
                  <select name="v_cat_id" id="v_cat_id" required class="form-select">
                      <option value="">Select Category</option>
                  </select>
              </div>
                <div class="input-wrap mb-45">
                  <label>Status</label>
                  <div class="nice-select" tabindex="0">
                    <span class="current">Select Status</span>
                    <ul class="list">
                      <li data-value="available" class="option">Available</li>
                      <li data-value="unavailable" class="option">Unavailable</li>
                      <li data-value="maintenance" class="option">Maintenance</li>
                    </ul>
                  </div>
                  <input type="hidden" name="status">
                </div>

                <div class="input-wrap">
                  <div class="d-flex justify-content-between">
                    <label>Vehicle Images</label>
                    <button type="button" id="removeAllBtn" class="btn-small btn-danger mt-2" style="display:none;">
                      <i class="fa-solid fa-trash"></i> Remove All
                    </button>
                  </div>
                  <div class="upload-image-add-car mb-30">
                    <div id="imagePreviewContainer" class="image-preview-container"></div>
                    <div class="upload-image-box">
                      <label for="images" class="uploadLabel">
                        <i class="fas fa-image"></i>
                        <span><i class="fa-solid fa-upload" style="font-size:14px;margin-right:5px;"></i> Choose Images</span>
                        <input type="file" name="images[]" id="images" multiple accept="image/*">
                      </label>
                    </div>
                  </div>
                  <p><span class="text-main">*</span> Supported: JPG, PNG (Max: 2MB each)</p>
                </div>

                <div class="input-wrap text-end mt-40">
                  <button type="submit" class="button-add">Update Vehicle</button>
                </div>
              </div>
            </form>
          </section>
        </main>

              @include('admin.components.footer')

      </div>
    </div>
  </div>

  {{-- ================== SCRIPTS ================== --}}
  <script src="/app/js/jquery.min.js"></script>
  <script src="/app/js/jquery.nice-select.min.js"></script>
  <script src="/app/js/bootstrap.min.js"></script>
  <script src="/app/js/main.js"></script>
  {!! ToastMagic::scripts() !!}
    <script src="/app/js/admin-auth-guard.js"></script>

  <script>
    const APP_URL = "{{ config('app.url') }}";
    const VEHICLE_ID = "{{ $id }}"; // from route /edit/{id}
  </script>

  <script>
  $(document).ready(function () {
    let filesArray = [];
    let deletedImages = [];
    let mainImageIndex = 0;
    const toastMagic = new ToastMagic();

    // ==================== FETCH EXISTING VEHICLE ====================
    $.get(`${APP_URL}/api/vehicles/${VEHICLE_ID}`, function(vehicle) {
      $('input[name="name"]').val(vehicle.name);
      $('input[name="rc"]').val(vehicle.rc);
      $('input[name="model"]').val(vehicle.model);
      $('input[name="number"]').val(vehicle.number);
      $('input[name="status"]').val(vehicle.status);
      $('.nice-select .current').text(vehicle.status.charAt(0).toUpperCase() + vehicle.status.slice(1));

      if (vehicle.images && vehicle.images.length) {
        filesArray = vehicle.images.map(url => ({ url, isExisting: true }));
        mainImageIndex = vehicle.main_image_index ?? 0;
        renderPreviews();
      }
    }).fail(() => toastMagic.error("Error!", "Failed to load vehicle details."));

    // ==================== ADD NEW IMAGES ====================
    $('#images').on('change', function() {
      const newFiles = Array.from(this.files).map(f => ({ file: f, isExisting: false }));
      filesArray = filesArray.concat(newFiles);
      renderPreviews();
      this.value = "";
    });

    // ==================== RENDER PREVIEWS ====================
    function renderPreviews() {
      const container = $('#imagePreviewContainer');
      container.empty();

      filesArray.forEach((fileObj, index) => {
        if (fileObj.hidden) return;

        let src;
        if (fileObj.url) {
          if (fileObj.url.startsWith('http') || fileObj.url.startsWith('//')) src = fileObj.url;
          else src = `${APP_URL}/${fileObj.url.replace(/^\/+/, '')}`;
        } else if (fileObj.file instanceof File) {
          src = URL.createObjectURL(fileObj.file);
        } else return;

        const isMain = index === mainImageIndex;
        const box = $(`
          <div class="image-preview-box" data-index="${index}">
            <div class="image-preview">
              <img src="${src}" alt="Image Preview">
            </div>
            <div class="action-buttons">
              <button type="button" class="edit-btn btn btn-sm btn-secondary"><i class="fas fa-edit"></i> Edit</button>
              <button type="button" class="delete-btn btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </div>
            <div class="action-buttons">
              <button type="button" class="set-main-btn btn btn-sm btn-warning" ${isMain ? 'disabled' : ''}>
                <i class="fas fa-star"></i> ${isMain ? 'Main' : 'Set as Main'}
              </button>
            </div>
          </div>
        `);
        container.append(box);
      });

      $('#removeAllBtn').toggle(filesArray.some(f => !f.hidden));
    }

    // ==================== SET MAIN ====================
    $('#imagePreviewContainer').on('click', '.set-main-btn', function() {
      mainImageIndex = $(this).closest('.image-preview-box').data('index');
      renderPreviews();
    });

    // ==================== DELETE IMAGE ====================
    $('#imagePreviewContainer').on('click', '.delete-btn', function() {
      const idx = $(this).closest('.image-preview-box').data('index');
      const fileObj = filesArray[idx];
      if (fileObj.url) deletedImages.push(fileObj.url);
      filesArray[idx].hidden = true;
      $(this).closest('.image-preview-box').fadeOut(200, function() { $(this).remove(); });
    });

    // ==================== EDIT IMAGE ====================
    $(document).on('click', '.edit-btn', function() {
      const $box = $(this).closest('.image-preview-box');
      const index = Number($box.data('index'));
      const input = $('<input type="file" accept="image/*" style="display:none;">');
      $('body').append(input);
      input.trigger('click');
      input.on('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
          filesArray[index] = { file, isExisting: false };
          renderPreviews();
        } else toastMagic.error("Invalid file", "Please select a valid image.");
        input.remove();
      });
    });

    // ==================== REMOVE ALL ====================
    $('#removeAllBtn').on('click', function() {
      filesArray.forEach(f => { if (f.url) deletedImages.push(f.url); });
      filesArray = [];
      mainImageIndex = 0;
      renderPreviews();
    });

    // ==================== NICE SELECT ====================
    $(document).on('click', '.nice-select .option', function() {
      let value = $(this).data('value');
      $('input[name="status"]').val(value);
      $(this).siblings().removeClass('selected focus');
      $(this).addClass('selected focus');
      $(this).closest('.nice-select').find('.current').text($(this).text());
    });


   
    // ==================== SUBMIT FORM ====================
    $('#vehicleEditForm').on('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);
      formData.append('_method', 'PUT');
      formData.append('_token', $('input[name="_token"]').val());

      formData.delete('images[]');
      formData.delete('existing_images[]');
      formData.delete('deleted_images[]');

      filesArray.forEach(f => {
        if (!f.hidden && f.file instanceof File) formData.append('images[]', f.file);
        if (!f.hidden && f.url) formData.append('existing_images[]', f.url);
      });
      deletedImages.forEach(url => formData.append('deleted_images[]', url));
      formData.append('main_image_index', mainImageIndex);

      $.ajax({
        url: `${APP_URL}/api/vehicles/${VEHICLE_ID}`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
          toastMagic.success("Success!", "Vehicle updated successfully!");
          console.log(res);
        },
        error: function(xhr) {
          console.error(xhr.responseText);
          toastMagic.error("Error!", "Failed to update vehicle. Check console.");
        }
      });
    });
  });
  </script>

</body>
</html>
