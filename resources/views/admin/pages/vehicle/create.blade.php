<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle | Dashboard</title>
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
                                            <h3 class="title">Add Vehicle</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <main id="main">
                    <section class="profile-dashboard">
                        <form id="vehicleForm" enctype="multipart/form-data" class="form-add-tour">
                            @csrf
                            <div class="widget-dash-board pr-256 mb-75">
                                <h4 class="title-add-tour mb-30">Vehicle Information</h4>

                                <div class="grid-input-2 mb-45">
                                    <div class="input-wrap">
                                        <label>Vehicle Name</label>
                                        <input type="text" name="name" placeholder="Enfield Himalayan 450" required>
                                    </div>

                                    <div class="input-wrap">
                                        <label>RC Number</label>
                                        <input type="text" name="rc" placeholder="R12345XYZ">
                                    </div>
                                </div>

                                <div class="grid-input-2 mb-45">
                                    <div class="input-wrap">
                                        <label>Model</label>
                                        <input type="text" name="model" placeholder="2024" required>
                                    </div>

                                    <div class="input-wrap">
                                        <label>Vehicle Number</label>
                                        <input type="text" name="number" placeholder="HP34A9876" required>
                                    </div>
                                    <div class="input-wrap mb-45">
                                      <label>Vehicle Category</label>
                                      <select name="v_cat_id" id="v_cat_id" required class="form-select">
                                          <option value="">Select Category</option>
                                      </select>
                                    </div>
                                </div>

                                <div class="input-wrap mb-45">
                                    <label>Status</label>
                                    <div class="nice-select" tabindex="0">
                                        <span class="current">Select Status</span>
                                        <ul class="list">
                                            <li data-value="available" class="option selected focus">Available</li>
                                            <li data-value="unavailable" class="option">Unavailable</li>
                                            <li data-value="maintenance" class="option">Maintenance</li>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="status" value="available">
                                </div>

                                <div class="input-wrap">
                                    <div class="d-flex justify-content-between">
                                        <label>Upload Vehicle Images</label>
                                    <button type="button" id="removeAllBtn" class="btn-small btn-danger mt-2" style="display: none;">
                                        <i class="fa-solid fa-trash"></i> Remove All
                                      </button>
                                    </div>
                                    <div class="upload-image-add-car mb-30">
                                      <div id="imagePreviewContainer" class="image-preview-container"></div>
                                  
                                      <div class="upload-image-box">
                                        <label for="images" class="uploadLabel">
                                          <i class="fas fa-image"></i>
                                          <span>Add Photos</span>
                                          <span><i class="fa-solid fa-upload" style="font-size:14px;margin-right:5px;"></i> Choose Images</span>

                                          <input type="file" name="images[]" id="images" multiple accept="image/*">
                                        </label>
                                      </div>
                                    </div>
                                    
                                    <p><span class="text-main">*</span>Supported: <span class="text-main">JPG, PNG</span> (Max: 2MB each)</p>

                                  </div>
                                  

                                <div class="input-wrap text-end mt-40">
                                    <button type="submit" class="button-add">Save Vehicle</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </main>

                    @include('admin.components.footer')

            </div>

        </div>
    </div>

    <script src="/app/js/jquery.min.js"></script>
    <script src="/app/js/jquery.nice-select.min.js"></script>
    <script src="/app/js/bootstrap.min.js"></script>
    <script src="/app/js/main.js"></script>
    <script src="/app/js/admin-auth-guard.js"></script>
  {!! ToastMagic::scripts() !!}

    <script>
        const APP_URL = "{{ config('app.url') }}";
    </script>
    
    <script>
        $(document).ready(function () {
            // ============================
            // 🌄 IMAGE PREVIEW + EDIT + DELETE
            // ============================
            let filesArray = []; // maintain current image state
            let mainImageIndex = 0; // default first image as main

          
$('#images').on('change', function () {
  const newFiles = Array.from(this.files);
  filesArray = filesArray.concat(newFiles);
  renderPreviews();
  this.value = ""; // reset file input
});

function renderPreviews() {
  const previewContainer = $('#imagePreviewContainer');
  previewContainer.empty();

  filesArray.forEach((file, index) => {
    if (!file.type.startsWith('image/')) return;

    const reader = new FileReader();
    reader.onload = function (e) {
      const isMain = index === mainImageIndex;
      const preview = $(`
        <div class="image-preview-box" data-index="${index}">
          <div class="image-preview">
            <img src="${e.target.result}" alt="Image Preview">
          </div>
          <div class="action-buttons">
           
            <button type="button" class="edit-btn btn btn-sm btn-secondary">
              <i class="fas fa-edit"></i> Edit
            </button>
            <button type="button" class="delete-btn btn btn-sm btn-danger">
              <i class="fas fa-trash"></i> Delete
            </button>
          </div>
          <div class="action-buttons">
             <button type="button" class="set-main-btn btn btn-sm btn-warning" ${isMain ? 'disabled' : ''}>
              <i class="fas fa-star"></i> ${isMain ? 'Main' : 'Set as Main'}
            </button>
            </div>
        </div>
      `);

      previewContainer.append(preview);
    };
    reader.readAsDataURL(file);
  });
}

// ✅ Set as Main Image
$('#imagePreviewContainer').on('click', '.set-main-btn', function () {
  const newMainIndex = $(this).closest('.image-preview-box').data('index');
  mainImageIndex = newMainIndex;
  renderPreviews(); // re-render to update main label
});

// ✅ Delete image
$('#imagePreviewContainer').on('click', '.delete-btn', function () {
  const indexToDelete = $(this).closest('.image-preview-box').data('index');
  filesArray.splice(indexToDelete, 1);

  // Adjust main index if needed
  if (mainImageIndex >= filesArray.length) mainImageIndex = 0;

  renderPreviews();
});
        
           // ✏️ Edit image (fixed)
$(document).on('click', '.edit-btn', function () {
  const $box = $(this).closest('.image-preview-box');            // correct element
  const index = Number($box.data('index'));
  if (!Number.isFinite(index)) return;

  // create a hidden file input to pick replacement image
  const tempInput = $('<input type="file" accept="image/*" style="display:none;">');
  $('body').append(tempInput);
  tempInput.trigger('click');

  tempInput.on('change', function (e) {
    const file = e.target.files && e.target.files[0];
    if (file && file.type && file.type.startsWith('image/')) {
      filesArray[index] = file;   // replace file at same index
      renderPreviews();           // re-render previews
    } else {
      // optional: show user feedback for invalid file
      alert('Please select a valid image file.');
    }
    tempInput.remove();
  });
});

        
            // ============================
            // ✅ NICE SELECT LOGIC
            // ============================
            $(document).on('click', '.nice-select .option', function() {
                let value = $(this).data('value');
                $('input[name="status"]').val(value);
                $(this).siblings().removeClass('selected focus');
                $(this).addClass('selected focus');
                $(this).closest('.nice-select').find('.current').text($(this).text());
            });
            async function loadVehicleCategories() {
    try {
        const resp = await fetch(`${APP_URL}/api/v_cat`);
        const data = await resp.json();
        const select = $('#v_cat_id');

        select.empty().append('<option value="">Select Category</option>');

        if (Array.isArray(data.data)) {
            // if API is paginated
            data.data.forEach(cat => {
                select.append(`<option value="${cat.id}">${cat.name}</option>`);
            });
        } else if (Array.isArray(data)) {
            // if API returns plain array
            data.forEach(cat => {
                select.append(`<option value="${cat.id}">${cat.name}</option>`);
            });
        }
    } catch (err) {
        console.error('Failed to load categories:', err);
    }
}

loadVehicleCategories();
            // ============================
            // 🚗 FORM SUBMISSION WITH IMAGES
            // ============================
            $('#vehicleForm').on('submit', function(e) {
                e.preventDefault();
        
                const formData = new FormData(this);
                const toastMagic = new ToastMagic();
        
                // Remove any default "images[]" from the form input
                formData.delete('images[]');
        
                // Add the current files in array order
                filesArray.forEach(file => {
                    formData.append('images[]', file);
                });
        
                $.ajax({
                    url: `${APP_URL}/api/vehicles`, // ✅ dynamically fetched
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastMagic.success("Success!", "Vehicle added successfully!");
                        console.log(response);
                        $('#vehicleForm')[0].reset();
                        filesArray = []; // clear array
                        renderPreviews(); // clear preview
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        toastMagic.error("Error!", "Failed to add vehicle. Check console for details.");
                    }
                });
            });
        });
        </script>
        

</body>
</html>
