<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dream Ride - Travel & Tour Booking HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/map.min.css">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.min.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a2e0bf0c10.js" crossorigin="anonymous"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Emoji Picker -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.min.css">
<script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.min.js"></script>
<script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">
    <style>
        .day-block {
          background: #fff;
          transition: 0.2s ease-in-out;
        }
        .day-block:hover {
          box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .grid-input-2 {
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 20px;
        }
        .input-wrap label {
          font-weight: 600;
          margin-bottom: 6px;
          display: block;
        }
        .btn-small {
          font-size: 14px;
          padding: 6px 12px;
          border-radius: 6px;
        }
        .emoji-preview img {
          width: 28px;
          height: 28px;
          vertical-align: middle;
        }
        emoji-picker {
          max-height: 280px !important;
          overflow-y: auto;
          box-shadow: 0 3px 12px rgba(0,0,0,0.15);
          border-radius: 8px;
        }
        .dual-manager { display: flex; gap: 20px; align-items: flex-start; }
        .dm-panel { flex: 1; background: #fff; border: 1px solid #e6e6e6; border-radius: 8px; padding: 12px; }
        .dm-top { display:flex; gap:8px; align-items:center; margin-bottom:8px; }
        .dm-search { flex:1; }
        .dm-list { max-height: 300px; overflow-y: auto; border:1px solid #f0f0f0; border-radius:6px; padding:8px; background:#fafafa; }
        .dm-item { display:flex; justify-content:space-between; align-items:center; padding:6px 8px; border-radius:6px; margin-bottom:6px; background:#fff; box-shadow: 0 0 0 1px rgba(0,0,0,0.02) inset; transition:all .18s ease; }
        .dm-item.disabled { background:#efefef; color:#888; pointer-events: none; opacity:0.7; }
        .dm-item .label { font-weight:600; }
        .dm-item .actions button { margin-left:6px; }
        .selected-tag { background:#f1f5f9; border:1px solid #e2e8f0; padding:6px 10px; border-radius:999px; display:flex; align-items:center; gap:8px; margin:6px 6px 0 0; }
        .selected-wrap { min-height:64px; max-height:300px; overflow-y:auto; padding:8px; border:1px dashed #eee; border-radius:6px; background:#fff; }
        .btn-small { padding:6px 10px; font-size:13px; }
        /* smooth move helper */
        .moving-temp { position: absolute; z-index: 9999; pointer-events:none; transition: all .32s ease; }
        .expectation-section {
            max-width: 100%;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
          }
          .expectation-section label {
            font-size: 16px;
          }
          .expectation-section input {
            font-size: 15px;
            padding: 8px 12px;
          }
          #highlightList input {
  font-size: 15px;
  padding: 6px 10px;
}
#highlightList li {
  transition: all 0.2s ease;
}
#highlightList li:hover {
  background: #f9fafb;
  border-radius: 6px;
}


      </style>
      
</head>

<body class="body header-fixed ">

    <div class="preload preload-container">
        <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
            <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
        </svg>
    </div>

    <!-- /preload -->

    <div id="wrapper">

        <div id="pagee" class="clearfix">

            @include('admin.components.sidebar')
            

            <div class="has-dashboard">
                <!-- Main Header -->
                <header class="main-header flex">
                    <!-- Header Lower -->
            @include('admin.components.header')
                    

                    <!-- End Header Lower -->


                    <!-- Mobile Menu  -->
                    <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
                     <div class="mobile-menu">
                        <div class="menu-backdrop"></div>
                        <nav class="menu-box">
                            <div class="nav-logo"><a href="index.html">
                                    <img src="/assets/images/logo2.png" alt=""></a></div>
                            <div class="bottom-canvas">
                                <div class="menu-outer">
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!-- End Mobile Menu -->

                </header>
                <!-- End Main Header -->
                <main id="main">
                 
                    <section class="profile-dashboard">
                        <div class="inner-header mb-40">
                          <h3 class="title">Add Tour</h3>
                        </div>
                        <form action="/" id="form-add-tour" class="form-add-tour">
                            <div class="widget-dash-board pr-256 mb-75">
                                <h4 class="title-add-tour mb-30">1. information</h4>
                                <div class="grid-input-2 mb-45">
                                  {{-- Places --}}
                 <div class="input-wrap">
  <label>Select your Place</label>
  <div class="nice-select" id="placeDropdown" tabindex="0">
    <span class="current">Select Place</span>
    <ul class="list" id="placeList">
      <li data-value="" class="option selected focus">Select Place</li>
    </ul>
  </div>
</div>
{{-- Tours --}}
<div class="input-wrap">
  <label>Select your Tours</label>
  <div class="nice-select" id="tourDropdown" tabindex="0">
    <span class="current">Select Tour</span>
    <ul class="list" id="tourList">
      <li data-value="" class="option selected focus">Select Tour</li>
    </ul>
  </div>
</div>

                                    <div class="input-wrap">
                                        <label>Enter your title</label>
                                        <input type="text" placeholder="Switzerland city tour">
                                    </div>
                                    <div class="input-wrap">
                                        <label>Enter your Subtitle</label>
                                        <input type="text" placeholder="Switzerland best city">
                                    </div>
                                    <div class="input-wrap">
                                      <label>No of Riders</label>
                                      <input type="text" placeholder="20,30... etc">
                                  </div>
                                   
                                  
                                    <div class="input-wrap">
  <label>Select your Type</label>
  <div class="nice-select" id="typeDropdown" tabindex="0">
    <span class="current">Select Type</span>
    <ul class="list" id="typeList">
      <li data-value="" class="option selected focus">Select Type</li>
    </ul>
  </div>
</div>
                                </div>
                                <div class="input-wrap mb-45">
                                    <label>Enter Keywords</label>
                                    <input type="text" placeholder="Keyword">
                                </div>
                                <div class="input-wrap mb-45">
                                    <label>Overview/Description</label>
                                    <textarea name="description" rows="12" cols="50"
                                        placeholder="Write content"></textarea>
                                </div>
                                <div class="container my-3">
                                  <h4 class="mb-3">Select Amenities</h4>
                                
                                    {{-- AMENITIES --}}
                                    <div class="dual-manager mb-4" id="amenities-manager">
                                      <div class="dm-panel">
                                        <div class="dm-top">
                                          <input class="form-control dm-search" type="search" id="searchSelectedAmenities" placeholder="Search selected amenities...">
                                          <div class="ms-2"><small class="text-muted">Selected</small></div>
                                        </div>
                                  
                                        <div class="selected-wrap dm-list" id="selectedAmenities"></div>
                                      </div>
                                  
                                      <div class="dm-panel">
                                        <div class="dm-top">
                                          <input class="form-control dm-search" type="search" id="searchAllAmenities" placeholder="Search all amenities...">
                                          <button type="button" class="btn btn-success btn-small ms-2" id="btnAddNewAmenity"><i class="fa fa-plus"></i> Add</button>
                                        </div>
                                  
                                        <div class="dm-list" id="allAmenitiesList">
                                          <p class="text-muted small m-0 p-2">Loading amenities...</p>
                                        </div>
                                      </div>
                                    </div>
                                  
                                    {{-- INCLUDED (same UI) --}}
                                  <h4 class="mb-3">Select Included</h4>

                                    <div class="dual-manager" id="included-manager">
                                      <div class="dm-panel">
                                        <div class="dm-top">
                                          <input class="form-control dm-search" type="search" id="searchSelectedIncluded" placeholder="Search selected included...">
                                          <div class="ms-2"><small class="text-muted">Selected</small></div>
                                        </div>
                                  
                                        <div class="selected-wrap dm-list" id="selectedIncluded"></div>
                                      </div>
                                  
                                      <div class="dm-panel">
                                        <div class="dm-top">
                                          <input class="form-control dm-search" type="search" id="searchAllIncluded" placeholder="Search all included items...">
                                          <button type="button" class="btn btn-success btn-small ms-2" id="btnAddNewIncluded"><i class="fa fa-plus"></i> Add</button>
                                        </div>
                                  
                                        <div class="dm-list" id="allIncludedList">
                                          <p class="text-muted small m-0 p-2">Loading included items...</p>
                                        </div>
                                      </div>
                                    </div>
                                    {{-- Services --}}
                                   <h4 class="mb-3 mt-3">Select Extra Services To Include in Package</h4>

<div class="row" id="servicesManager">
  <!-- Left: Selected -->
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 fw-semibold">Selected Services</h6>
        <small class="text-muted">Added items</small>
      </div>
      <div class="card-body" id="selectedServicesList">
        <p class="text-muted small m-0 p-2">No selected services.</p>
      </div>
    </div>
  </div>

  <!-- Right: All Services -->
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 fw-semibold">Available Services</h6>
        <small class="text-muted">All items</small>
      </div>
      <div class="card-body" id="allServicesList">
        <p class="text-muted small m-0 p-2">Loading services...</p>
      </div>
    </div>
  </div>
</div>


                                  </div>


                                  <!-- WHAT TO EXPECT SECTION -->
                                  <div class="widget-dash-board pr-256 mb-3 mt-4">
                                    <h4 class="mb-3">What To Expect</h4>

                                    <div class="expectation-section border rounded-3 p-4 bg-white">
                                      <div class="row mb-3 align-items-center">
                                        <div class="col-md-3">
                                          <label for="startingpoint" class="fw-semibold text-dark">Starting Point</label>
                                        </div>
                                        <div class="col-md-9">
                                          <input type="text" id="startingpoint" class="form-control" placeholder="e.g. Manali, Himachal Pradesh">
                                        </div>
                                      </div>

                                      <div class="row mb-3 align-items-center">
                                        <div class="col-md-3">
                                          <label for="endingpoint" class="fw-semibold text-dark">Ending Point</label>
                                        </div>
                                        <div class="col-md-9">
                                          <input type="text" id="endingpoint" class="form-control" placeholder="e.g. Leh, Ladakh">
                                        </div>
                                      </div>

                                      <div class="row mb-3 align-items-center">
                                        <div class="col-md-3">
                                          <label for="departuretime" class="fw-semibold text-dark">Departure Time</label>
                                        </div>
                                        <div class="col-md-9">
                                          <input type="text" id="departuretime" class="form-control" placeholder="e.g. Please arrive by 7:00 AM for departure at 7:30 AM">
                                        </div>
                                      </div>

                                      <div class="row align-items-center">
                                        <div class="col-md-3">
                                          <label for="difficultylevel" class="fw-semibold text-dark">Difficulty Level</label>
                                        </div>
                                        <div class="col-md-9">
                                          <input type="text" id="difficultylevel" class="form-control" placeholder="e.g. Moderate to Challenging">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- HIGHLIGHTS SECTION -->
                                  <div class="widget-dash-board pr-256 mb-3 mt-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <h4 class="mb-0">Highlights</h4>
                                      <button type="button" id="btnAddHighlight" class="btn btn-sm btn-success">
                                        <i class="fa fa-plus"></i> Add
                                      </button>
                                    </div>

                                    <ul id="highlightList" class="list-unstyled border rounded-3 p-3 bg-white">
                                      <li class="text-muted small">No highlights added yet.</li>
                                    </ul>
                                  </div>

                                <div class="input-wrap">
                                    <div class="d-flex justify-content-between">
                                        <label>Upload Package Images</label>
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
                                  {{-- Videos --}}
                                  <div class="input-wrap">
                                    <div class="d-flex justify-content-between">
                                        <label>Upload Videos</label>
                                     <button type="button" id="removeAllBtnvideo" class="btn-small btn-danger mt-2" style="display: none;">
                                        <i class="fa-solid fa-trash"></i> Remove All
                                      </button>
                                    </div>
                                    <div class="upload-video-add-car mb-30">
                                      <div id="videoPreviewContainer" class="video-preview-container"></div>
                                  
                                      <div class="upload-video-section">
  <label>Upload Tour Video</label>
  <input type="file" id="videoInput" accept="video/*" style="display:none;">

  <div id="progressContainer" style="display:none;width:100%;background:#eee;height:8px;margin:10px 0;">
    <div id="progressBar" style="background:#28a745;height:8px;width:0%;transition:width 0.3s;"></div>
  </div>

  <p id="uploadStatus" class="text-muted"></p>

  <div class="btn-group">
    <button type="button" class="btn btn-primary" id="replaceVideoBtn">Add/Replace Video</button>
    <button type="button" class="btn btn-danger" id="deleteVideoBtn">Delete Video</button>
    <button type="button" class="btn btn-warning" id="cancelUploadBtn">Cancel Upload</button>
  </div>
</div>

                                    </div>
                                    
                                    <p><span class="text-main">*</span>Supported: <span class="text-main">mp4</span> (Max: 20MB each)</p>

                                  </div>

                            </div>
                            <div class="widget-dash-board pr-256 mb-75">
                                <h4 class="title-add-tour mb-30">2. Tour Planning</h4>
                              
                                <div id="tourDaysContainer"></div>
                              
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                  <button type="button" id="addDayBtn" class="btn-small btn-success">
                                    <i class="fa-solid fa-plus"></i> Add New Day
                                  </button>
                                  <button type="button" id="removeAllDaysBtn" class="btn-small btn-danger" style="display: none;">
                                    <i class="fa-solid fa-trash"></i> Remove All
                                  </button>
                                </div>
                              </div>
                              {{-- Location Share Section  --}}
                            <div class="widget-dash-board pr-256 mb-75">
                                <h4 class="title">3. Location Share</h4>
                                <div class="grid-input-2 mb-45">
                                     <div class="input-wrap mb-45">
                                    <label>Description</label>
                                    <textarea name="descriptionLocation" rows="12" cols="50"
                                        placeholder="Write content"></textarea>
                                   </div>
                                    
                                </div>
                                <!-- HIGHLIGHTS SECTION -->
                                  <div class="widget-dash-board pr-256 mb-3 mt-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <h4 class="mb-0">Highlights</h4>
                                      <button type="button" id="btnAddHighlightLocation" class="btn btn-sm btn-success">
                                        <i class="fa fa-plus"></i> Add
                                      </button>
                                    </div>

                                    <ul id="highlightListLocation" class="list-unstyled border rounded-3 p-3 bg-white">
                                      <li class="text-muted small">No highlights added yet.</li>
                                    </ul>
                                  </div>
                                
                               


                            </div>

                           
                            <div class="widget-dash-board pr-256 mb-75">
                                <h4 class="title-add-tour mb-30">4. Pricing</h4>

                                <div class="grid-input-2 mb-45">
                                    <div class="input-wrap">
                                        <label>Tour Price</label>
                                        <input type="number" placeholder="₹ 3215">
                                    </div>
                                   
                                </div>
                               

                            </div>
                            <div class="widget-dash-board pr-256">
                                <h4 class="title-add-tour mb-30">5. Shot Gallery</h4>

                               {{-- Image will go here --}}
                                  <div class="upload-box">
              <label for="uploadImage">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <span>Click or drag to upload image</span>
                <input type="file" id="uploadImage" accept="image/*" hidden>
              </label>
            </div>

            <div id="galleryContainer" class="gallery-grid">
              <p class="text-center text-muted">Loading gallery...</p>
            </div>
                                <div class="input-wrap">
                                    <button type="button" class="button-add"> Save changes</button>
                                </div>

                            </div>

                        </form>


                    </section>
                </main>

                <footer class="footer footer-dashboard">
                    <div class="tf-container full">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-white">Made with ❤️ by Gashwa Technologies. </p>
                            </div>
                            <div class="col-lg-6">
                                <ul class="menu-footer flex-six">
                                    <li>
                                        <a href="#">Privacy & Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Licensing</a>
                                    </li>
                                    <li>
                                        <a href="#">Instruction</a>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </footer>

                <!-- Bottom -->
            </div>

        </div>
        <!-- /#page -->
    </div>

    <!-- Modal Popup Bid -->

    <a id="scroll-top" class="button-go"></a>

    <!-- Modal search-->
    <div class="modal search-mobie fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <form action="/" class="search-form-mobie">
                        <div class="search">
                            <i class="icon-circle2017"></i>
                            <input type="search" placeholder="Search Travel" class="search-input" autocomplete="off">
                            <button type="button">Search</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            ...
        </div>
    </div>

    <!-- Javascript -->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.js"></script>


    <script>
        const APP_URL = "{{ config('app.url') }}";
    </script>
    <script src="/app/js/main.js"></script>
    
    {{-- // Script for Amentite and included  --}}
    <script>
     

        // Generic manager factory
        function DualManager(opts) {
          const api = opts.api; // /api/amenities or /api/included
          const $allList = $(opts.allListSelector);
          const $selectedList = $(opts.selectedListSelector);
          const $addNewBtn = $(opts.addNewBtnSelector);
          const $searchAll = $(opts.searchAllSelector);
          const $searchSelected = $(opts.searchSelectedSelector);

          // state
          let allItems = [];         // full list from server [{id,name},...]
          let selectedItems = [];    // items added to left panel (array of objects)
          let filteredAll = [];      // for search
          let filteredSelected = [];

          // load from server
          function loadAll() {
            $allList.html('<p class="text-muted small m-0 p-2">Loading...</p>');
            $.get(api)
              .done((res) => {
                // handle response with either res.data or res
                allItems = (res && res.data) ? res.data : (Array.isArray(res) ? res : []);
                filteredAll = allItems.slice();
                renderAll();
                renderSelected();
              })
              .fail(() => {
                $allList.html('<p class="text-danger small m-0 p-2">Failed to load.</p>');
              });
          }

          // render all panel
          function renderAll() {
            $allList.empty();
            if (!filteredAll.length) {
              $allList.html('<p class="text-muted small m-0 p-2">No items found.</p>');
              return;
            }
            filteredAll.forEach(item => {
              const isAdded = !!selectedItems.find(s => s.id == item.id);
              const disabledClass = isAdded ? 'disabled' : '';
              const $el = $(`
                <div class="dm-item ${disabledClass}" data-id="${item.id}">
                  <div class="label">${escapeHtml(item.name)}</div>
                  <div class="actions">
                    <button type="button" class="btn btn-sm btn-outline-success btn-add" title="Add"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-sm btn-outline-primary btn-edit" title="Edit"><i class="fa fa-pen"></i></button>
                    <button type="button" class="btn btn-sm btn-outline-danger btn-delete" title="Delete"><i class="fa fa-trash"></i></button>
                  </div>
                </div>
              `);
              // attach events
              $el.find('.btn-add').on('click', function(e) {
                if (isAdded) return;
                moveToSelected(item);
              });
              $el.find('.btn-edit').on('click', function(e) {
                e.stopPropagation();
                openEditPopup(item);
              });
              $el.find('.btn-delete').on('click', function(e) {
                e.stopPropagation();
                openDeleteConfirm(item);
              });

              $allList.append($el);
            });
          }

          // render selected left panel
          function renderSelected() {
            $selectedList.empty();
            filteredSelected = selectedItems.slice();
            if (!filteredSelected.length) {
              $selectedList.html('<p class="text-muted small m-0 p-2">No selected items.</p>');
              return;
            }
            filteredSelected.forEach((item, idx) => {
              const $tag = $(`
                <div class="selected-tag d-inline-flex" data-id="${item.id}">
                  <span>${escapeHtml(item.name)}</span>
                  <button type="button" class="btn btn-sm btn-outline-danger ms-2 btn-remove" title="Remove"><i class="fa fa-times"></i></button>
                </div>
              `);
              $tag.find('.btn-remove').on('click', function(e) {
                e.stopPropagation();
                moveToAll(item);
              });
              $selectedList.append($tag);
            });
          }

          // add -> left side
          function moveToSelected(item) {
            // animate: clone element and animate to selected box
            const $source = $allList.find(`.dm-item[data-id="${item.id}"]`);
            if ($source.length) {
              const offsetSource = $source.offset();
              const $temp = $source.clone().addClass('moving-temp').css({
                width: $source.outerWidth(),
                height: $source.outerHeight(),
                left: offsetSource.left,
                top: offsetSource.top
              }).appendTo('body');
              // push into state
              selectedItems.push(item);
              renderAll();
              renderSelected();
              const $target = $selectedList.offset();
              // animate to target area
              $temp.animate({ left: $target.left + 10, top: $target.top + 10, opacity: 0.1, width: 40, height: 20 }, 300, function() {
                $temp.remove();
              });
            } else {
              // fallback
              selectedItems.push(item);
              renderAll();
              renderSelected();
            }
          }

          // remove from left back to all
          function moveToAll(item) {
            const $targetEl = $allList.find(`.dm-item[data-id="${item.id}"]`);
            // animate clone from selected
            const $source = $selectedList.find(`.selected-tag[data-id="${item.id}"]`);
            if ($source.length && $targetEl.length) {
              const offSource = $source.offset();
              const $temp = $source.clone().addClass('moving-temp').css({
                width: $source.outerWidth(),
                height: $source.outerHeight(),
                left: offSource.left,
                top: offSource.top
              }).appendTo('body');

              // remove from state
              selectedItems = selectedItems.filter(s => s.id != item.id);
              renderAll();
              renderSelected();

              const offTarget = $targetEl.offset();
              $temp.animate({ left: offTarget.left, top: offTarget.top, opacity: 0.1, width: $targetEl.outerWidth(), height: $targetEl.outerHeight() }, 300, function() {
                $temp.remove();
              });
            } else {
              selectedItems = selectedItems.filter(s => s.id != item.id);
              renderAll();
              renderSelected();
            }
          }

          // open add new popup
          $addNewBtn.on('click', function() {
            Swal.fire({
              title: 'Add new',
              input: 'text',
              inputPlaceholder: 'Enter name',
              showCancelButton: true,
              confirmButtonText: 'Add',
              inputValidator: v => !v && 'Name cannot be empty'
            }).then(res => {
              if (res.isConfirmed) {
                $.post(api, { name: res.value })
                  .done(resp => {
                    // if API returns created object, push
                    // reload all
                    loadAll();
                    Swal.fire('Added','New item added','success');
                  })
                  .fail(xhr => {
                    Swal.fire('Error', xhr.responseJSON?.message || 'Failed to add', 'error');
                  });
              }
            });
          });

          // edit
          function openEditPopup(item) {
            Swal.fire({
              title: 'Edit item',
              input: 'text',
              inputValue: item.name,
              showCancelButton: true,
              confirmButtonText: 'Save',
              inputValidator: v => !v && 'Name cannot be empty'
            }).then(res => {
              if (res.isConfirmed) {
                $.ajax({
                  url: `${api}/${item.id}`,
                  type: 'PUT',
                  data: { name: res.value }
                }).done(() => {
                  loadAll();
                  // update name also in selectedItems if present
                  selectedItems = selectedItems.map(si => si.id == item.id ? {...si, name: res.value} : si);
                  renderSelected();
                  Swal.fire('Saved','Updated successfully','success');
                }).fail(xhr => {
                  Swal.fire('Error', xhr.responseJSON?.message || 'Failed to update', 'error');
                });
              }
            });
          }

          // delete
          function openDeleteConfirm(item) {
            Swal.fire({
              title: `Delete "${item.name}"?`,
              text: "This cannot be undone.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete'
            }).then(res => {
              if (res.isConfirmed) {
                $.ajax({
                  url: `${api}/${item.id}`,
                  type: 'DELETE'
                }).done(() => {
                  // remove from state if selected
                  selectedItems = selectedItems.filter(s => s.id != item.id);
                  loadAll();
                  renderSelected();
                  Swal.fire('Deleted','Item removed','success');
                }).fail(xhr => {
                  Swal.fire('Error', xhr.responseJSON?.message || 'Failed to delete', 'error');
                });
              }
            });
          }

          // search handlers
          $searchAll.on('input', function() {
            const q = $(this).val().toLowerCase().trim();
            filteredAll = allItems.filter(it => it.name.toLowerCase().includes(q));
            renderAll();
          });
          $searchSelected.on('input', function() {
            const q = $(this).val().toLowerCase().trim();
            // filter selectedItems view only, state unchanged
            const prev = selectedItems.slice();
            const filtered = prev.filter(it => it.name.toLowerCase().includes(q));
            filteredSelected = filtered;
            // temporarily render filteredSelected
            $selectedList.empty();
            if (!filtered.length) $selectedList.html('<p class="text-muted small m-0 p-2">No selected items.</p>');
            else filtered.forEach((item, idx) => {
              const $tag = $(`
                <div class="selected-tag d-inline-flex" data-id="${item.id}">
                  <span>${escapeHtml(item.name)}</span>
                  <button type="button" class="btn btn-sm btn-outline-danger ms-2 btn-remove" data-index="${idx}"><i class="fa fa-times"></i></button>
                </div>
              `);
              $tag.find('.btn-remove').on('click', function(e) {
                e.stopPropagation();
                moveToAll(item);
              });
              $selectedList.append($tag);
            });
          });

          // expose getSelectedIds for form submission
          function getSelectedIds() {
            return selectedItems.map(s => s.id);
          }

          // escape html utility
          function escapeHtml(str) {
            return String(str).replace(/[&<>"'`=\/]/g, function(s){ return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;','/':'&#x2F;','`':'&#x60;','=':'&#x3D;'})[s]; });
          }

          // initial load
          loadAll();

          return {
            getSelectedIds
          };
        }

  // 🟢 Initialize emoji pickers inside each new day block
            function initializeEmojiPickers(container) {
                const emojiInputs = container.querySelectorAll('.emoji-input');

                emojiInputs.forEach((emojiInput) => {
                const emojiPicker  = emojiInput.closest('.position-relative').querySelector('.emoji-picker-panel');
                const emojiPreview = emojiInput.closest('.input-group').querySelector('.emoji-preview');

                // open picker
                emojiInput.addEventListener('focus', () => {
                    document.querySelectorAll('.emoji-picker-panel').forEach(p => p.style.display = 'none');
                    emojiPicker.style.display = 'block';
                });
                emojiInput.addEventListener('click', () => {
                    document.querySelectorAll('.emoji-picker-panel').forEach(p => p.style.display = 'none');
                    emojiPicker.style.display = 'block';
                });

                // when emoji is selected
                emojiPicker.addEventListener('emoji-click', event => {
                    const emoji = event.detail.unicode;
                    emojiInput.value = emoji;
                    emojiPreview.innerHTML = twemoji.parse(emoji, {
                    folder: 'svg',
                    ext: '.svg'
                    }); // render as Twemoji image
                    emojiPicker.style.display = 'none';
                });

                // click outside → close picker
                document.addEventListener('click', e => {
                    if (!emojiPicker.contains(e.target) && e.target !== emojiInput) {
                    emojiPicker.style.display = 'none';
                    }
                });
                });
            }

            // 🟢 Twemoji Render for existing emoji previews
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.emoji-preview').forEach(el => {
                el.innerHTML = twemoji.parse('😀', { folder: 'svg', ext: '.svg' });
                });
            });
       
      
</script>
<script>
  // =======================
  // 2️⃣ THEN instantiate it
  // =======================
  const amenitiesMgr = DualManager({
    api: APP_URL + '/api/amenities',
    allListSelector: '#allAmenitiesList',
    selectedListSelector: '#selectedAmenities',
    addNewBtnSelector: '#btnAddNewAmenity',
    searchAllSelector: '#searchAllAmenities',
    searchSelectedSelector: '#searchSelectedAmenities'
  });
  
  const includedMgr = DualManager({
    api: APP_URL + '/api/included',
    allListSelector: '#allIncludedList',
    selectedListSelector: '#selectedIncluded',
    addNewBtnSelector: '#btnAddNewIncluded',
    searchAllSelector: '#searchAllIncluded',
    searchSelectedSelector: '#searchSelectedIncluded'
  });


  </script>
  <script>
let allServices = [];
let selectedServices = [];

function loadServices() {
  const $all = $('#allServicesList');
  const $selected = $('#selectedServicesList');
  $all.html('<p class="text-muted small p-2">Loading services...</p>');

  $.get(`${APP_URL}/api/get-service`)
    .done(res => {
      allServices = res.data || [];
      renderAll();
      renderSelected();
    })
    .fail(() => {
      $all.html('<p class="text-danger small p-2">Failed to load services.</p>');
    });
}

// Render all services (right panel)
function renderAll() {
  const $all = $('#allServicesList');
  $all.empty();

  if (!allServices.length) {
    $all.html('<p class="text-muted small p-2">No services found.</p>');
    return;
  }

  allServices.forEach(service => {
    // skip if already selected
    if (selectedServices.find(s => s.id === service.id)) return;

    const shortDesc = service.description
      ? service.description.split(/\s+/).slice(0, 20).join(' ') +
        (service.description.split(/\s+/).length > 20 ? '…' : '')
      : '';

    const $card = $(`
      <div class="border rounded p-3 mb-2 service-card" data-id="${service.id}">
        <div class="fw-semibold">${service.name}</div>
        ${shortDesc ? `<div class="text-muted small mb-1">${shortDesc}</div>` : ''}
        <div class="text-success fw-semibold mb-2">₹${service.price}</div>
        <button type="button" class="btn btn-sm btn-outline-success btn-add">
          <i class="fa fa-plus"></i> Add
        </button>
      </div>
    `);

    $card.find('.btn-add').on('click', function() {
      selectedServices.push(service);
      renderAll();
      renderSelected();
    });

    $all.append($card);
  });

  if (!$all.children().length) {
    $all.html('<p class="text-muted small p-2">All services are selected.</p>');
  }
}

// Render selected (left panel)
function renderSelected() {
  const $selected = $('#selectedServicesList');
  $selected.empty();

  if (!selectedServices.length) {
    $selected.html('<p class="text-muted small p-2">No selected services.</p>');
    return;
  }

  selectedServices.forEach(service => {
    const shortDesc = service.description
      ? service.description.split(/\s+/).slice(0, 20).join(' ') +
        (service.description.split(/\s+/).length > 20 ? '…' : '')
      : '';

    const $card = $(`
      <div class="border rounded p-3 mb-2 bg-light" data-id="${service.id}">
        <div class="fw-semibold">${service.name}</div>
        ${shortDesc ? `<div class="text-muted small mb-1">${shortDesc}</div>` : ''}
        <div class="text-success fw-semibold mb-2">₹${service.price}</div>
        <button type="button" class="btn btn-sm btn-outline-danger btn-remove">
          <i class="fa fa-times"></i> Remove
        </button>
      </div>
    `);

    $card.find('.btn-remove').on('click', function() {
      selectedServices = selectedServices.filter(s => s.id !== service.id);
      renderAll();
      renderSelected();
    });

    $selected.append($card);
  });
}

// Get selected IDs for saving
function getSelectedServiceIds() {
  return selectedServices.map(s => s.id);
}



  $(document).ready(function () {

    const placeDropdown = $('#placeDropdown');
    const placeList = $('#placeList');
    const tourDropdown = $('#tourDropdown');
    const tourList = $('#tourList');
    loadServices();
    // Disable tour dropdown initially
    tourDropdown.addClass('disabled');
    tourDropdown.css('pointer-events', 'none');
    tourDropdown.find('.current').text('Select Place First');

    // ===========================
    // STEP 1: FETCH PLACES
    // ===========================
    fetch(`${APP_URL}/api/place`)
      .then((res) => {
        if (!res.ok) throw new Error("Network response not ok");
        return res.json();
      })
      .then((data) => {

        const places = data.data || [];
        placeList.empty().append('<li data-value="" class="option selected focus">Select Place</li>');

        places.forEach((place) => {
          placeList.append(`<li class="option" data-value="${place.id}">${place.name}</li>`);
        });

        // ===========================
        // STEP 2: HANDLE PLACE SELECTION
        // ===========================
        placeDropdown.on('click', '.option', function () {
          const value = $(this).data('value');
          const text = $(this).text();

          placeDropdown.find('.current').text(text);
          placeDropdown.find('.option').removeClass('selected focus');
          $(this).addClass('selected focus');
          placeDropdown.attr('data-selected-id', value);

          tourList.empty().append('<li class="option selected focus" data-value="">Select Tour</li>');
          tourDropdown.find('.current').text('Select Tour');

          if (value) {
            // Enable tours dropdown
            tourDropdown.removeClass('disabled');
            tourDropdown.css('pointer-events', 'auto');
            tourDropdown.find('.current').text('Fetching tours...');


            fetch(`${APP_URL}/api/tours/by-place/${value}`)
              .then((res) => res.json())
              .then((tourData) => {
                const tours = tourData.data || [];

                tourList.empty().append('<li class="option selected focus" data-value="">Select Tour</li>');
                if (tours.length > 0) {
                  tours.forEach((tour) => {
                    tourList.append(`<li class="option" data-value="${tour.id}">${tour.name}</li>`);
                  });
                  tourDropdown.find('.current').text('Select Tour');
                } else {
                  tourDropdown.find('.current').text('No tours found');
                  tourDropdown.addClass('disabled');
                  tourDropdown.css('pointer-events', 'none');
                }
              })
              .catch((err) => console.error("❌ Error fetching tours:", err));
          } else {
            tourDropdown.addClass('disabled');
            tourDropdown.css('pointer-events', 'none');
            tourDropdown.find('.current').text('Select Place First');
          }
        });
      })
      .catch((err) => {
        console.error("❌ Error fetching places:", err);
      });

    // ===========================
    // STEP 3: HANDLE TOUR SELECTION
    // ===========================
    tourDropdown.on('click', function (e) {
      if (tourDropdown.hasClass('disabled')) {
        e.stopPropagation();
        Swal.fire({
          icon: 'warning',
          title: 'Select Place First',
          text: 'Please choose a place before selecting a tour.',
          confirmButtonColor: '#3085d6'
        });
        return false;
      }
    });

    tourDropdown.on('click', '.option', function () {
      if (tourDropdown.hasClass('disabled')) return;

      const value = $(this).data('value');
      const text = $(this).text();
      tourDropdown.find('.current').text(text);
      tourDropdown.find('.option').removeClass('selected focus');
      $(this).addClass('selected focus');
      tourDropdown.attr('data-selected-id', value);
    });

    // Features Type 
    
    const typeDropdown = $('#typeDropdown');
     const typeList = $('#typeList'); // Step 1: Fetch data from API 
    $.get(`${APP_URL}/api/type/get`, function(response) { 
      // Clear any old items except the default 
     typeList.empty(); 
     typeList.append(`<li data-value="" class="option selected focus">Select Place</li>`); 
     // Step 2: Loop through the data array 
    response.data.forEach(function(type) { 
      typeList.append( `<li class="option" data-value="${type.id}">${type.name}</li>` ); 
    }); 
    // Step 3: Handle selection (for nice-select) 
      typeDropdown.on('click', '.option', function() {
         const value = $(this).data('value'); 
         const text = $(this).text(); 
         typeDropdown.find('.current').text(text); 
         typeDropdown.find('.option').removeClass('selected focus'); 
         $(this).addClass('selected focus'); 
         typeDropdown.attr('data-selected-id', value); // store selected ID 
     });
    });
  });
</script>

    <script>
        let dayIndex = 1;
        const tourDaysContainer = document.getElementById('tourDaysContainer');
        const addDayBtn = document.getElementById('addDayBtn');
        const removeAllDaysBtn = document.getElementById('removeAllDaysBtn');
 
        // ============================
        // Create Day Block
        // ============================
        function createDayBlock(index) {
          const block = document.createElement('div');
          block.classList.add('day-block', 'p-3', 'border', 'rounded', 'mb-4', 'shadow-sm');
          block.dataset.index = index;
    
          block.innerHTML = `
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="fw-semibold">Day ${index}</h5>
              <button type="button" class="btn-small btn-outline-danger btn-remove-day">
                <i class="fa-solid fa-trash"></i> Remove
              </button>
            </div>
     <!-- Emoji Picker -->
              <div class="input-wrap position-relative">
                <label>Select Emoji</label>
                <div class="input-group">
                  <input 
                    type="text" 
                    class="form-control emoji-input" 
                    name="emoji[]" 
                    placeholder="Click to choose emoji" 
                    readonly 
                    style="cursor:pointer;font-size:24px;text-align:center;">
                </div>
                <emoji-picker class="emoji-picker-panel" style="position:absolute;top:100%;left:0;z-index:999;display:none;width:300px;"></emoji-picker>
              </div>
            </div>
            <div class="grid-input-2 mb-3">
              <div class="input-wrap">
                <label>Period (Day/Night)</label>
                <select class="form-select">
                  <option value="Day">Day</option>
                </select>
              </div>
              <div class="input-wrap">
                <label>City Name</label>
                <input type="text" placeholder="Enter City Name" class="form-control">
              </div>
            </div>
    
            <div class="grid-input-2 mb-3">
              <div class="input-wrap">
                <label>City Subtitle</label>
                <input type="text" placeholder="From – To or Short Subtitle" class="form-control">
              </div>
    
             
    
        
    
            <div class="input-wrap mb-3">
              <label>Day Description (What we do there)</label>
             <textarea class="textarea-tinymce" name="area"></textarea>
            </div>
          `;
    
          initializeEmojiPickers(block);
          return block;
        }
    
        // ============================
        // Add New Day
        // ============================
        addDayBtn.addEventListener('click', () => {
          const newBlock = createDayBlock(dayIndex);
          tourDaysContainer.appendChild(newBlock);
          removeAllDaysBtn.style.display = 'inline-block';
          dayIndex++;
          bindRemoveButtons();
        });
    
        // ============================
        // Bind Remove Day Buttons
        // ============================
        function bindRemoveButtons() {
          const removeButtons = document.querySelectorAll('.btn-remove-day');
          removeButtons.forEach(btn => {
            btn.onclick = function () {
              Swal.fire({
                title: "Are you sure?",
                text: "This will remove the selected day from the tour plan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, remove it!"
              }).then((result) => {
                if (result.isConfirmed) {
                  btn.closest('.day-block').remove();
                  if (!tourDaysContainer.children.length) {
                    removeAllDaysBtn.style.display = 'none';
                    dayIndex = 1;
                  }
                  Swal.fire("Removed!", "Day plan has been deleted.", "success");
                }
              });
            };
          });
        }
    
        // ============================
        // Remove All Days
        // ============================
        removeAllDaysBtn.addEventListener('click', () => {
          Swal.fire({
            title: "Are you sure?",
            text: "This will remove all tour day plans!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, remove all!"
          }).then((result) => {
            if (result.isConfirmed) {
              tourDaysContainer.innerHTML = "";
              dayIndex = 1;
              removeAllDaysBtn.style.display = 'none';
              Swal.fire("All Cleared!", "All day plans have been removed.", "success");
            }
          });
        });
    


  

    // ===========================
// HIGHLIGHT MANAGEMENT for Information
// ===========================
$(function () {
  const $highlightList = $("#highlightList");
  const $btnAddHighlight = $("#btnAddHighlight");

  function renderHighlights() {
    const items = $highlightList.find("li input").map(function() {
      return $(this).val().trim();
    }).get().filter(Boolean);

    if (items.length === 0) {
      $highlightList.html('<li class="text-muted small">No highlights added yet.</li>');
    }
  }

  // Add new highlight
  $btnAddHighlight.on("click", function () {
    // remove "no highlights" message if present
    if ($highlightList.find("li.text-muted").length) $highlightList.empty();

    const $li = $(`
      <li class="mb-2 d-flex align-items-center">
        <input type="text" class="form-control me-2" placeholder="Enter highlight" style="flex:1;">
        <button type="button" class="btn btn-sm btn-outline-danger btn-remove"><i class="fa fa-trash"></i></button>
      </li>
    `);

    // remove logic with confirm
    $li.find(".btn-remove").on("click", function () {
      Swal.fire({
        title: "Remove this highlight?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, remove",
        cancelButtonText: "Cancel",
      }).then((res) => {
        if (res.isConfirmed) {
          $li.remove();
          renderHighlights();
          Swal.fire("Removed!", "Highlight removed.", "success");
        }
      });
    });

    $highlightList.append($li);
  });
});

// ===========================
// HIGHLIGHT MANAGEMENT for Location Share
// ===========================
$(function () {
  const $highlightList = $("#highlightListLocation");
  const $btnAddHighlight = $("#btnAddHighlightLocation");

  function renderHighlights() {
    const items = $highlightList.find("li input").map(function() {
      return $(this).val().trim();
    }).get().filter(Boolean);

    if (items.length === 0) {
      $highlightList.html('<li class="text-muted small">No highlights added yet.</li>');
    }
  }

  // Add new highlight
  $btnAddHighlight.on("click", function () {
    // remove "no highlights" message if present
    if ($highlightList.find("li.text-muted").length) $highlightList.empty();

    const $li = $(`
      <li class="mb-2 d-flex align-items-center">
        <input type="text" class="form-control me-2" placeholder="Enter highlight" style="flex:1;">
        <button type="button" class="btn btn-sm btn-outline-danger btn-remove"><i class="fa fa-trash"></i></button>
      </li>
    `);

    // remove logic with confirm
    $li.find(".btn-remove").on("click", function () {
      Swal.fire({
        title: "Remove this highlight?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, remove",
        cancelButtonText: "Cancel",
      }).then((res) => {
        if (res.isConfirmed) {
          $li.remove();
          renderHighlights();
          Swal.fire("Removed!", "Highlight removed.", "success");
        }
      });
    });

    $highlightList.append($li);
  });
});


    

  // =======================================
  // EXPORT TO FORM ON SUBMIT
  // =======================================


  // --- state ---
let filesArray = []; // package images (File objects)
let mainImageIndex = 0; // default main (index in filesArray)
let shotGalleryArray = []; // separate gallery images
let videoFile = null;

// ---------- Images (package) handling ----------
$('#images').on('change', function () {
  const newFiles = Array.from(this.files).filter(f => f.type && f.type.startsWith('image/'));
  filesArray = filesArray.concat(newFiles);
  renderPreviews();
  this.value = ""; // reset input so same file can be re-picked
  toggleRemoveAllBtn();
});

function renderPreviews() {
  const previewContainer = $('#imagePreviewContainer');
  previewContainer.empty();

  filesArray.forEach((file, index) => {
    const reader = new FileReader();
    reader.onload = function (e) {
      const isMain = index === mainImageIndex;
      const disabledAttr = isMain ? 'disabled' : '';
      const mainLabel = isMain ? 'Main' : 'Set as Main';

      const preview = $(`
        <div class="image-preview-box" data-index="${index}">
          <div class="image-preview">
            <img src="${e.target.result}" alt="Image Preview">
          </div>
          <div class="action-buttons">
            <button type="button" class="edit-btn btn btn-sm btn-secondary"><i class="fas fa-edit"></i> Edit</button>
            <button type="button" class="delete-btn btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
            <button type="button" class="set-main-btn btn btn-sm btn-warning" ${disabledAttr}><i class="fas fa-star"></i> ${mainLabel}</button>
          </div>
        </div>
      `);

      previewContainer.append(preview);
    };
    reader.readAsDataURL(file);
  });

  // if no images, show placeholder
  if (filesArray.length === 0) {
    $('#imagePreviewContainer').html('<p class="text-muted">No images added yet</p>');
  }
  toggleRemoveAllBtn();
}

function toggleRemoveAllBtn() {
  if (filesArray.length > 0) {
    $('#removeAllBtn').show();
  } else {
    $('#removeAllBtn').hide();
  }
}

// set as main
$('#imagePreviewContainer').on('click', '.set-main-btn', function () {
  const newMainIndex = Number($(this).closest('.image-preview-box').data('index'));
  if (!Number.isFinite(newMainIndex)) return;
  mainImageIndex = newMainIndex;
  renderPreviews();
});

// delete
$('#imagePreviewContainer').on('click', '.delete-btn', function () {
  const indexToDelete = Number($(this).closest('.image-preview-box').data('index'));
  if (!Number.isFinite(indexToDelete)) return;

  filesArray.splice(indexToDelete, 1);

  // fix main index: if removed a before-main index, shift left; if main deleted, set to 0
  if (filesArray.length === 0) {
    mainImageIndex = 0;
  } else if (indexToDelete === mainImageIndex) {
    mainImageIndex = 0;
  } else if (indexToDelete < mainImageIndex) {
    mainImageIndex = Math.max(0, mainImageIndex - 1);
  }

  renderPreviews();
});

// edit (replace single image)
$(document).on('click', '.edit-btn', function () {
  const $box = $(this).closest('.image-preview-box');
  const index = Number($box.data('index'));
  if (!Number.isFinite(index)) return;

  // hidden temp input
  const tempInput = $('<input type="file" accept="image/*" style="display:none;">');
  $('body').append(tempInput);
  tempInput.trigger('click');

  tempInput.on('change', function (e) {
    const file = e.target.files && e.target.files[0];
    if (file && file.type && file.type.startsWith('image/')) {
      filesArray[index] = file; // replace
      renderPreviews();
    } else {
      alert('Please select a valid image file.');
    }
    tempInput.remove();
  });
});

// remove all
$('#removeAllBtn').on('click', function () {
  if (!confirm('Remove all images?')) return;
  filesArray = [];
  mainImageIndex = 0;
  renderPreviews();
});

// ---------- Shot gallery handling ----------
$('#uploadImage').on('change', function () {
  const newFiles = Array.from(this.files).filter(f => f.type && f.type.startsWith('image/'));
  shotGalleryArray = shotGalleryArray.concat(newFiles);
  renderGallery();
  this.value = "";
});

function renderGallery() {
  const container = $('#galleryContainer');
  container.empty();

  if (shotGalleryArray.length === 0) {
    container.html('<p class="text-center text-muted">No gallery images yet</p>');
    return;
  }

  shotGalleryArray.forEach((file, index) => {
    const reader = new FileReader();
    reader.onload = function (e) {
      const card = $(`
        <div class="gallery-item" data-index="${index}">
          <img src="${e.target.result}" alt="Gallery image">
          <div class="gallery-actions">
            <button type="button" class="gallery-delete btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
          </div>
        </div>
      `);
      container.append(card);
    };
    reader.readAsDataURL(file);
  });
}

// delete gallery item
$('#galleryContainer').on('click', '.gallery-delete', function () {
  const idx = Number($(this).closest('.gallery-item').data('index'));
  if (!Number.isFinite(idx)) return;
  shotGalleryArray.splice(idx, 1);
  renderGallery();
});

// ---------- Video input ----------
/* Add this HTML where appropriate:
   <input type="file" id="videoInput" accept="video/*">
*/
$('#videoInput').on('change', function () {
  const file = this.files && this.files[0];
  if (file) {
    videoFile = file;
  } else {
    videoFile = null;
  }
});


let r = null;
let uploadedVideoPath = null; // from server
let currentUploadFile = null;

// Initialize resumable instance
function initResumable() {
  r = new Resumable({
    target: `${APP_URL}/api/upload/video`,
    chunkSize: 5 * 1024 *1024, // 5MB per chunk
    simultaneousUploads: 3,
    testChunks: false,
    throttleProgressCallbacks: 1,
  });

  r.assignBrowse(document.getElementById('videoInput'));

  // On file added
  r.on('fileAdded', function(file) {
    currentUploadFile = file;
    document.getElementById('progressContainer').style.display = 'block';
    document.getElementById('progressBar').style.width = '0%';
    r.upload();
  });

  // Progress event
  r.on('fileProgress', function(file) {
    const percent = Math.floor(file.progress() * 100);
    document.getElementById('progressBar').style.width = percent + '%';
  });

  // Upload success
  r.on('fileSuccess', function(file, response) {
    const res = JSON.parse(response);
    uploadedVideoPath = res.url;
    document.getElementById('progressBar').style.width = '100%';
    document.getElementById('uploadStatus').textContent = '✅ Upload complete!';
  });

  // Upload error
  r.on('fileError', function(file, message) {
    alert('Upload failed: ' + message);
  });
}

// Initialize on page load
initResumable();

// Cancel upload
document.getElementById('cancelUploadBtn').addEventListener('click', function() {
  if (r && currentUploadFile) {
    r.cancel(); // stops upload
    document.getElementById('progressBar').style.width = '0%';
    document.getElementById('uploadStatus').textContent = '❌ Upload canceled';
  }
});

// Delete uploaded video
document.getElementById('deleteVideoBtn').addEventListener('click', async function() {
  if (!uploadedVideoPath) return alert('No uploaded video to delete.');
  if (!confirm('Delete uploaded video?')) return;

  const res = await fetch(`${APP_URL}/api/video/delete`, {
    method: 'DELETE',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({ path: uploadedVideoPath })
  });

  const data = await res.json();
  if (data.status) {
    uploadedVideoPath = null;
    document.getElementById('uploadStatus').textContent = '🗑️ Video deleted';
  } else {
    alert(data.message);
  }
});

// Edit (replace) video
document.getElementById('replaceVideoBtn').addEventListener('click', async function() {
  // If old video exists, delete first
  if (uploadedVideoPath) {
    await fetch(`${APP_URL}/api/video/delete`, {
      method: 'DELETE',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ path: uploadedVideoPath })
    });
    uploadedVideoPath = null;
  }

  // Trigger new file selection
  document.getElementById('videoInput').click();
});

// ---------- Form submit (build FormData) ----------
$('.button-add').on('click', function (e) {
  e.preventDefault();

  // gather your existing information object (as before)
  const information = {
    title: $("input[placeholder='Switzerland city tour']").val()?.trim(),
    subtitle: $("input[placeholder='Switzerland best city']").val()?.trim(),
    noofriders: $("input[placeholder='20,30... etc']").val()?.trim(),
    description: $("textarea[name='description']").val()?.trim(),
    type: $("#typeDropdown .option.selected").data("value") || null,
    keyword: ($("input[placeholder='Keyword']").val() || "").split(",").map(k => k?.trim()).filter(Boolean),
    highlight: $("#highlightList li input").map(function () { return $(this).val().trim(); }).get().filter(Boolean),
    whattoexpect: {
      startingpoint: $("#startingpoint").val(),
      endingpoint: $("#endingpoint").val(),
      departuretime: $("#departuretime").val(),
      difficultylevel: $("#difficultylevel").val()
    },
    included: typeof includedMgr !== 'undefined' ? includedMgr.getSelectedIds() : [],
    amenities: typeof amenitiesMgr !== 'undefined' ? amenitiesMgr.getSelectedIds() : [],
  };
    const tour = [];
    $("#tourDaysContainer .day-block").each(function() {
      tour.push({
        period: $(this).find("select").val() || "",
        location: $(this).find("input[placeholder='Enter City Name']").val() || "",
        locationSubtitle: $(this).find("input[placeholder='From – To or Short Subtitle']").val() || "",
        locationDescription: $(this).find("textarea").val() || "",
        icon: $(this).find(".emoji-input").val() || ""
      });
    });

  const locationshare = {
    highlight: $("#highlightListLocation li input").map(function () { return $(this).val().trim(); }).get().filter(Boolean),
    description: $("textarea[name='descriptionLocation']").val()?.trim(),

  }
 const services = getSelectedServiceIds();


  // other top-level fields
  const place_id = $("#placeDropdown .option.selected").data("value") || null;
  const tour_id = $("#tourDropdown .option.selected").data("value") || null;
  const pricing = parseInt($("input[placeholder='₹ 3215']").first().val()) || 0;

  // Build FormData
  const fd = new FormData();
  information.video = uploadedVideoPath;
  // 1) information as JSON
  fd.append('information', JSON.stringify(information));
  fd.append('locationshare', JSON.stringify(locationshare));
  fd.append('tour', JSON.stringify(tour));
  fd.append('services', JSON.stringify(services));

  // 2) add place/tour/pricing scalars (optional separate fields)
  fd.append('place_id', place_id ?? '');
  fd.append('tour_id', tour_id ?? '');
  fd.append('pricing', pricing);

  // 3) images_meta: index and is_main, we will also append files as images[]
  const imagesMeta = filesArray.map((f, idx) => ({ index: idx, is_main: idx === mainImageIndex }));
  fd.append('images_meta', JSON.stringify(imagesMeta));

  // 4) append images files in the same order (so server can prefer first as main if desired)
  filesArray.forEach((file, idx) => {
    // key names: images[0], images[1] ... (common pattern)
    fd.append(`images[${idx}]`, file, file?.name || `image_${idx}.jpg`);
  });

  // 5) append shot gallery files (separate array)
  shotGalleryArray.forEach((file, idx) => {
    fd.append(`shotgallery[${idx}]`, file, file?.name || `shot_${idx}.jpg`);
  });

  

  // Example: send with fetch
  fetch(`${APP_URL}/api/package`, {
    method: 'POST',
    body: fd,
    headers: {
      // don't set Content-Type; browser sets boundary for multipart/form-data
      'Accept': 'application/json',
      // Add auth header if needed: 'Authorization': 'Bearer TOKEN'
    }
  })
  .then(async res => {
    if (!res.ok) {
      const txt = await res.text();
      throw new Error(`Server responded ${res.status}: ${txt}`);
    }
    return res.json();
  })
  .then(data => {
    console.log('Upload success', data);
    // handle success (redirect / show toast / reset form)
  })
  .catch(err => {
    console.error('Upload failed', err);
    alert('Upload failed: ' + err.message);
  });
});

      </script>
    

  
</body>

</html>
