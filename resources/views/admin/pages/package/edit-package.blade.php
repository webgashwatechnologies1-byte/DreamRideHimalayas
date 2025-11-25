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
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  
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
          .upload-box {
            width: 100%;
            padding: 30px;
            border: 2px dashed #ced4da;
            border-radius: 12px;
            text-align: center;
            background: #fafafa;
            cursor: pointer;
            transition: 0.3s;
        }

        .upload-box:hover {
            background: #f1f1f1;
        }

        .upload-drop-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .upload-box.dragover {
            background: #e8f5e9;
            border-color: #28a745;
        }

        .upload-drop-area i {
            font-size: 40px;
            color: #6c757d;
        }

              .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 15px;
        }

        .gallery-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            background: #f8f9fa;
            border: 1px solid #e5e7eb;
        }

        .gallery-item img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            border-radius: 6px;
            display: block;
        }

        .gallery-delete {
            position: absolute;
            top: 8px;
            right: 8px;
            padding: 4px 7px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.85;
            transition: 0.2s;
        }

        .gallery-delete:hover {
            opacity: 1;
        }

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
        <form id="form-edit-package" class="form-add-tour" data-id="{{ $id }}">

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
                           <div class="upload-box mt-3 mb-2" id="uploadBox">
                              <label for="uploadImage" class="upload-drop-area">
                                  <i class="fa-solid fa-cloud-arrow-up"></i>
                                  <span>Click or Drag images here</span>
                              </label>
                              <input type="file" id="uploadImage" accept="image/*" multiple hidden>
                          </div>


            <div id="galleryContainer" class="gallery-grid mt-3 mb-3">
              <p class="text-center text-muted">Loading gallery...</p>
            </div>
<hr/>

                                <div class="input-wrap">
                                    <button type="button" class="button-add"> Save changes</button>
                                </div>

                            </div>

                        </form>


                    </section>
                </main>

                       @include('admin.components.footer')


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
    <script src="/app/js/admin-auth-guard.js"></script>


    <script>
        const APP_URL = "{{ config('app.url') }}";
    </script>
    <script src="/app/js/main.js"></script>
    
    {{-- // Script for Amentite and included  --}}
    <script>
     let loadedPackage = null; // will store API /api/package/{id} response


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
                      allItems = (res && res.data) ? res.data : (Array.isArray(res) ? res : []);
                      filteredAll = allItems.slice();
                      renderAll();
                      renderSelected();

                      // notify ready
                      if (typeof opts.onLoaded === "function") {
                            opts.onLoaded(allItems);
                        }
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
                getSelectedIds: () => selectedItems.map(s => s.id),
                allItems: () => allItems,
                selectedItems: () => selectedItems,
                renderAll,
                renderSelected,
                setSelected: (arr) => { selectedItems = arr; }
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
       
       function preselectAmenities() {
            const items = amenitiesMgr.allItems();
            const selected = [];

            loadedPackage.information.amenities.forEach(id => {
                const match = items.find(x => x.id == id);
                if (match) selected.push(match);
            });

            amenitiesMgr.setSelected(selected);
            amenitiesMgr.renderAll();
            amenitiesMgr.renderSelected();
        }



        function preselectIncluded() {
            const items = includedMgr.allItems();
            const selected = [];

            loadedPackage.information.included.forEach(id => {
                const match = items.find(x => x.id == id);
                if (match) selected.push(match);
            });

            includedMgr.setSelected(selected);
            includedMgr.renderAll();
            includedMgr.renderSelected();
        }



</script>
<script>
  // =======================
  // 2️⃣ THEN instantiate it
  // =======================
  const amenitiesMgr = DualManager({
    name: "amenities",
    api: APP_URL + '/api/amenities',
    allListSelector: '#allAmenitiesList',
    selectedListSelector: '#selectedAmenities',
    addNewBtnSelector: '#btnAddNewAmenity',
    searchAllSelector: '#searchAllAmenities',
    searchSelectedSelector: '#searchSelectedAmenities',
    onLoaded: () => {
        const check = setInterval(() => {
            if (loadedPackage && amenitiesMgr.allItems().length) {
                preselectAmenities();
                clearInterval(check);
            }
        }, 100);
    },

  });
  
  const includedMgr = DualManager({
    name: "included",
    api: APP_URL + '/api/included',
    allListSelector: '#allIncludedList',
    selectedListSelector: '#selectedIncluded',
    addNewBtnSelector: '#btnAddNewIncluded',
    searchAllSelector: '#searchAllIncluded',
    searchSelectedSelector: '#searchSelectedIncluded',
    onLoaded: () => {
        const check = setInterval(() => {
            if (loadedPackage && includedMgr.allItems().length) {
                preselectIncluded();
                clearInterval(check);
            }
        }, 100);
    },

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
// ✅ If we already loaded the package, pre-select PLACE and load its TOURS
if (loadedPackage && loadedPackage.place_id) {
  const placeId = loadedPackage.place_id;

  // 1. Select the saved place in dropdown
  const placeOption = $(`#placeList li[data-value='${placeId}']`);
  if (placeOption.length) {
    placeDropdown.find('.option').removeClass('selected focus');
    placeOption.addClass('selected focus');
    placeDropdown.find('.current').text(placeOption.text());
    placeDropdown.attr('data-selected-id', placeId);
  }

  // 2. Enable Tour dropdown & load tours for this place
  tourDropdown.removeClass('disabled')
              .css('pointer-events', 'auto');
  tourDropdown.find('.current').text('Fetching tours...');

  fetch(`${APP_URL}/api/tours/by-place/${placeId}`)
    .then(res => res.json())
    .then(tourData => {
      const tours = tourData.data || [];
      tourList.empty().append('<li class="option selected focus" data-value="">Select Tour</li>');

      tours.forEach(tour => {
        tourList.append(`<li class="option" data-value="${tour.id}">${tour.name}</li>`);
      });

      // 3. Now preselect saved tour
      if (loadedPackage.tour_id) {
        const tourOption = $(`#tourList li[data-value='${loadedPackage.tour_id}']`);
        if (tourOption.length) {
          tourDropdown.find('.option').removeClass('selected focus');
          tourOption.addClass('selected focus');
          tourDropdown.find('.current').text(tourOption.text());
          tourDropdown.attr('data-selected-id', loadedPackage.tour_id);
        } else {
          tourDropdown.find('.current').text('Select Tour');
        }
      } else {
        tourDropdown.find('.current').text('Select Tour');
      }
    })
    .catch(err => console.error("❌ Error auto-fetching tours for edit:", err));
}

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
       // ✅ If editing, preselect saved TYPE
      if (loadedPackage && loadedPackage.information && loadedPackage.information.type) {
        const typeId = loadedPackage.information.type;
        const typeOption = $(`#typeList li[data-value='${typeId}']`);
        if (typeOption.length) {
          typeDropdown.find('.option').removeClass('selected focus');
          typeOption.addClass('selected focus');
          typeDropdown.find('.current').text(typeOption.text());
          typeDropdown.attr('data-selected-id', typeId);
        }
      }

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
        function createDayBlock(index) 
        {
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
        // Renumber all days after add/delete
        function renumberDays() {
            let count = 1;
            $("#tourDaysContainer .day-block").each(function () {
                $(this).attr("data-index", count);
                $(this).find("h5").text("Day " + count);
                count++;
            });

            dayIndex = count; // reset global index for next new day correctly
        }

        // ============================
        // Add New Day
        // ============================
          addDayBtn.addEventListener('click', () => {
            const newBlock = createDayBlock(dayIndex);
            tourDaysContainer.appendChild(newBlock);

            renumberDays(); // 🔥 FIX — always recalc days
            removeAllDaysBtn.style.display = 'inline-block';
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

                renumberDays(); // 🔥 FIX — always recalc days

                if (!tourDaysContainer.children.length) {
                    removeAllDaysBtn.style.display = 'none';
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
              renumberDays(); // cleanup

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



// MAIN PACKAGE IMAGES
let existingImages = [];   // [{url,is_main}]
let newImages = [];        // [File]
let mainImageIndex = 0;    // unified index for "main"
  
// SHOT GALLERY
let existingGallery = [];  // [{url}]
let newGallery = [];       // [File]
 // separate gallery images
let videoFile = null;




















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



    // Handle input click selection (multi files)
    $("#uploadImage").on("change", function () {
        const files = Array.from(this.files);
        newGallery.push(...files);
        renderGallery();
        this.value = "";
    });

    // Drag & Drop Support
    const uploadBox = document.getElementById("uploadBox");

    uploadBox.addEventListener("dragover", (e) => {
        e.preventDefault();
        uploadBox.classList.add("dragover");
    });

    uploadBox.addEventListener("dragleave", () => {
        uploadBox.classList.remove("dragover");
    });

    uploadBox.addEventListener("drop", (e) => {
        e.preventDefault();
        uploadBox.classList.remove("dragover");

        const files = Array.from(e.dataTransfer.files).filter(
            (file) => file.type.startsWith("image/")
        );

        newGallery.push(...files);
        renderGallery();
    });

    // Clicking the box opens selector
    $("#uploadBox").on("click", () => {
        $("#uploadImage").trigger("click");
    });



function renderGallery() {
    const container = $("#galleryContainer");
    container.empty();

    if (existingGallery.length === 0 && newGallery.length === 0) {
        container.html('<p class="text-muted text-center">No gallery images</p>');
        return;
    }

      existingGallery.forEach((img, idx) => {
        container.append(`
            <div class="gallery-item" data-type="existing" data-index="${idx}">
                <img src="${img.url}">
                <button class="gallery-delete btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        `);
    });

      newGallery.forEach((file, idx) => {
          const src = URL.createObjectURL(file);
          container.append(`
              <div class="gallery-item" data-type="new" data-index="${idx}">
                  <img src="${src}">
                  <button class="gallery-delete btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                  </button>
              </div>
          `);
      });

}

$("#uploadImage").on("change", function () {
    const files = Array.from(this.files);
    newGallery.push(...files);
    renderGallery();
    this.value = "";
});

$("#galleryContainer").on("click", ".gallery-delete", function () {
    const box = $(this).closest(".gallery-item");
    const type = box.data("type");
    const idx = box.data("index");

    if (type === "existing") {
        existingGallery.splice(idx, 1);
    } else {
        newGallery.splice(idx, 1);
    }

    renderGallery();
});
/* ============================================================
   CLEAN IMAGE MANAGEMENT SYSTEM
   Supports:
   - existing images from server
   - uploading new images
   - deleting
   - set as main
   - correct unified index
=============================================================== */

// UNIFIED LIST
function allImages() {
    return [
        ...existingImages.map(img => ({ type: "existing", img })),
        ...newImages.map(file => ({ type: "new", img: file }))
    ];
}

// RENDER ALL IMAGES
function renderImages() {
    const container = $("#imagePreviewContainer");
    container.empty();

    const list = allImages();
    if (list.length === 0) {
        container.html('<p class="text-muted">No images selected</p>');
        $("#removeAllBtn").hide();
        return;
    }

    list.forEach((item, idx) => {
        let imgSrc = item.type === "existing"
            ? item.img.url
            : URL.createObjectURL(item.img);

        container.append(`
            <div class="image-preview-box" data-type="${item.type}" data-index="${idx}">
                <div class="image-preview">
                    <img src="${imgSrc}">
                </div>
                <div class="action-buttons">
                    <button class="btn btn-danger btn-sm btn-delete">Delete</button>
                    <button class="btn btn-warning btn-sm btn-main">
                        ${idx === mainImageIndex ? "Main" : "Set Main"}
                    </button>
                </div>
            </div>
        `);
    });

    $("#removeAllBtn").show();
}

// ON SELECT NEW FILES
$("#images").on("change", function () {
    const files = Array.from(this.files);
    newImages.push(...files);
    renderImages();
    this.value = "";
});

// DELETE HANDLER
$("#imagePreviewContainer").on("click", ".btn-delete", function () {
    const box = $(this).closest(".image-preview-box");
    const type = box.data("type");
    const idx = box.data("index");

    if (type === "existing") {
        existingImages.splice(idx, 1);
    } else {
        newImages.splice(idx - existingImages.length, 1);
    }

    // adjust main index
    if (mainImageIndex === idx) mainImageIndex = 0;
    renderImages();
});

// SET MAIN HANDLER
$("#imagePreviewContainer").on("click", ".btn-main", function () {
    const idx = $(this).closest(".image-preview-box").data("index");
    mainImageIndex = idx; // unified index
    renderImages();
});

// REMOVE ALL
$("#removeAllBtn").on("click", function () {
    existingImages = [];
    newImages = [];
    mainImageIndex = 0;
    renderImages();
});




const PACKAGE_ID = "{{ $id }}";
function fillForm(data) {

    // INFORMATION
    $("input[placeholder='Switzerland city tour']").val(data.information.title);
    $("input[placeholder='Switzerland best city']").val(data.information.subtitle);
    $("input[placeholder='20,30... etc']").val(data.information.noofriders);
    $("textarea[name='description']").val(data.information.description);

    // KEYWORDS
    $("input[placeholder='Keyword']").val(data.information.keyword.join(", "));

    // PLACE & TOUR SELECT
   // PLACE
    const placeOption = $(`#placeList li[data-value='${data.place_id}']`);
    if (placeOption.length) {
        $("#placeDropdown .option").removeClass("selected focus");
        placeOption.addClass("selected focus");
        $("#placeDropdown .current").text(placeOption.text());
        $("#placeDropdown").attr("data-selected-id", data.place_id);
    }

  // TOUR
    const tourOption = $(`#tourList li[data-value='${data.tour_id}']`);
    if (tourOption.length) {
        $("#tourDropdown .option").removeClass("selected focus");
        tourOption.addClass("selected focus");
        $("#tourDropdown .current").text(tourOption.text());
        $("#tourDropdown").attr("data-selected-id", data.tour_id);
    }

    // TYPE DROPDOWN
   // TYPE
    const typeOption = $(`#typeList li[data-value='${data.information.type}']`);
    if (typeOption.length) {
        $("#typeDropdown .option").removeClass("selected focus");
        typeOption.addClass("selected focus");
        $("#typeDropdown .current").text(typeOption.text());
        $("#typeDropdown").attr("data-selected-id", data.information.type);
    }

    // WHAT TO EXPECT
    $("#startingpoint").val(data.information.whattoexpect.startingpoint);
    $("#endingpoint").val(data.information.whattoexpect.endingpoint);
    $("#departuretime").val(data.information.whattoexpect.departuretime);
    $("#difficultylevel").val(data.information.whattoexpect.difficultylevel);

    // HIGHLIGHT (information)
    $("#highlightList").empty();
    data.information.highlight.forEach(h => {
        $("#highlightList").append(`
            <li class="mb-2 d-flex align-items-center">
                <input type="text" class="form-control me-2" value="${h}" style="flex:1;">
                <button type="button" class="btn btn-sm btn-outline-danger btn-remove"><i class="fa fa-trash"></i></button>
            </li>
        `);
    });

    // LOCATIONSHARE
    $("textarea[name='descriptionLocation']").val(data.locationshare.description);
    $("#highlightListLocation").empty();
    data.locationshare.highlight.forEach(h => {
        $("#highlightListLocation").append(`
            <li class="mb-2 d-flex align-items-center">
                <input type="text" class="form-control me-2" value="${h}" style="flex:1;">
                <button type="button" class="btn btn-sm btn-outline-danger btn-remove"><i class="fa fa-trash"></i></button>
            </li>
        `);
    });

    // PRICING
    $("input[placeholder='₹ 3215']").val(data.pricing);

    // TOUR DAYS
    tourDaysContainer.innerHTML = "";
    dayIndex = 1;

    data.tour.forEach((day, i) => {
        const block = createDayBlock(dayIndex);
        $(block).find(".emoji-input").val(day.icon);
        $(block).find("select").val(day.period);
        $(block).find("input[placeholder='Enter City Name']").val(day.location);
        $(block).find("input[placeholder='From – To or Short Subtitle']").val(day.locationSubtitle);
        $(block).find("textarea").val(day.locationDescription);
        tourDaysContainer.appendChild(block);
        dayIndex++;
    });
      renumberDays();          // ensure correct day numbers
      bindRemoveButtons();     // 🔥 now remove button will work






    // SERVICES (preselect)
    setTimeout(() => {
        selectedServices = data.services_details;
        renderAll();
        renderSelected();
    }, 1200);

    // IMAGES (package images - load preview)
    // IMAGES (package images - load preview)
      existingImages = (data.information.images || []).map(img => ({
          url: APP_URL + "/" + img.url,
          is_main: img.is_main ? true : false
      }));

      mainImageIndex = existingImages.findIndex(i => i.is_main);
      if (mainImageIndex < 0) mainImageIndex = 0;

      renderImages(); // ✅ use the new unified renderer

      // SHOT GALLERY (load existing gallery from server)
      existingGallery = (data.information.shot_gallery || []).map(img => ({
          url: APP_URL + "/" + img.url
      }));
      newGallery = [];
      renderGallery();



  

    // VIDEO URL
    uploadedVideoPath = data.information.video;
    $("#uploadStatus").text(uploadedVideoPath ? "Existing video loaded" : "No video");
}

fetch(`${APP_URL}/api/package/${PACKAGE_ID}`)
  .then(res => res.json())
  .then(packageData => {
      loadedPackage = packageData;
      fillForm(packageData);
  });

// ---------- Form submit (build FormData) ----------
$('.button-add').on('click', function (e) {
  e.preventDefault();
  Swal.fire({
        title: "Updating Package...",
        text: "Please wait while we save your changes.",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
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
   /* ============================================================
   IMAGE + GALLERY FORM DATA BUILDER
=============================================================== */

// PACKAGE IMAGES
existingImages.forEach((img, i) => {
    fd.append(`existing_images[${i}][url]`, img.url);
    fd.append(`existing_images[${i}][is_main]`, (mainImageIndex === i) ? 1 : 0);
});

newImages.forEach((file, i) => {
    fd.append(`new_images[${i}]`, file);
});

// unified main index
fd.append("main_index", mainImageIndex);

// SHOT GALLERY
existingGallery.forEach((img, i) => {
    fd.append(`existing_gallery[${i}]`, img.url);
});

newGallery.forEach((file, i) => {
    fd.append(`new_gallery[${i}]`, file);
});


  // Example: send with fetch
 fetch(`${APP_URL}/api/package/${PACKAGE_ID}`, {
    method: "POST",
    headers: {
        "X-HTTP-Method-Override": "PUT",
        "Accept": "application/json"
    },
    body: fd
}) .then(async res => {
        let data;
        try {
            data = await res.json();
        } catch (e) {
            throw new Error("Invalid JSON response from server.");
        }

        if (!res.ok) {
            throw new Error(data.message || "Something went wrong");
        }

        // ===========================
        // SUCCESS SWEETALERT
        // ===========================
        Swal.fire({
            icon: "success",
            title: "Updated Successfully!",
            text: "Your package has been updated.",
            confirmButtonColor: "#28a745",
        });

        return data;
    })
    .catch(err => {
        // ===========================
        // ERROR SWEETALERT
        // ===========================
        Swal.fire({
            icon: "error",
            title: "Update Failed",
            html: `<p style="text-align:left;">${err.message}</p>`,
            confirmButtonColor: "#d33",
        });
    });
});

      </script>
    

  
</body>

</html>
