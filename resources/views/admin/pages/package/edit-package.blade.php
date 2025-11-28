<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dream Ride - Travel & Tour Booking HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

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
     /* Upload Box */
     .location-suggestions {
          max-height: 200px;
          overflow-y: auto;
          cursor: pointer;
      }
      .location-suggestions .suggestion-item:hover {
          background: #f3f4f6;
      }
      .map-toggle-btn {
          padding: 8px 20px;
          border: 2px solid black;
          background: white;
          color: black;
          border-radius: 8px;
          font-weight: 600;
          transition: 0.25s ease;
      }

      .map-toggle-btn.active {
          background: #facc15; /* yellow */
          color: white;
          border-color: #facc15;
      }

        .upload-box {
            width: 220px;
            height: 220px;
            border: 2px dashed #b3b3b3;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            cursor: pointer;
            background: #f8f9fa;
            transition: 0.25s ease;
            text-align: center;
            margin-bottom: 15px;
        }

        .upload-box:hover {
            background: #eef2f3;
        }

        .upload-box.dragover {
            background: #e1f7e6;
            border-color: #22c55e;
        }

        .upload-label {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .upload-label i {
            font-size: 40px;
            margin-bottom: 8px;
            color: #666;
        }

        .upload-label span {
            font-size: 14px;
            color: #444;
        }

        /* Gallery Grid (same as edit page) */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 15px;
        }

        .gallery-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            background: #f8f9fa;
            border: 1px solid #e5e7eb;
        }

        .gallery-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .gallery-delete {
            position: absolute;
            top: 8px;
            right: 8px;
            padding: 6px 8px;
            border-radius: 50%;
            opacity: 0.8;
            transition: 0.2s ease;
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
                        <form action="/" id="form-add-tour" class="form-add-tour"> 
                          <div class="container-fluid">
  <div class="row">
    <!-- LEFT FORM -->
    <div class="col-lg-8 col-md-12" id="form-left">
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

                                                                                                                  <!-- Inclusion -->
                                                                                <div class="widget-dash-board pr-256 mb-3 mt-4">
                                                                                  <div class="d-flex justify-content-between">
                                                                                    <h4>Inclusion</h4>
                                                                                    <button type="button" id="btnAddInclusion" class="btn btn-sm btn-success">+ Add</button>
                                                                                  </div>
                                                                                  <ul id="inclusionList" class="list-unstyled border rounded p-3 bg-white">
                                                                                    <li class="text-muted small">No inclusion added.</li>
                                                                                  </ul>
                                                                                </div>

                                                                                  <!-- Exclusion -->
                                                                                  <div class="widget-dash-board pr-256 mb-3 mt-4">
                                                                                    <div class="d-flex justify-content-between">
                                                                                      <h4>Exclusion</h4>
                                                                                      <button type="button" id="btnAddExclusion" class="btn btn-sm btn-success">+ Add</button>
                                                                                    </div>
                                                                                    <ul id="exclusionList" class="list-unstyled border rounded p-3 bg-white">
                                                                                      <li class="text-muted small">No exclusion added.</li>
                                                                                    </ul>
                                                                                  </div>

                                                                                  <!-- Complimentary -->
                                                                                  <div class="widget-dash-board pr-256 mb-3 mt-4">
                                                                                    <div class="d-flex justify-content-between">
                                                                                      <h4>Complimentary Benefits</h4>
                                                                                      <button type="button" id="btnAddCompl" class="btn btn-sm btn-success">+ Add</button>
                                                                                    </div>
                                                                                    <ul id="complList" class="list-unstyled border rounded p-3 bg-white">
                                                                                      <li class="text-muted small">No complimentary benefit added.</li>
                                                                                    </ul>
                                                                                  </div>

                                                                           

                                                                        </div>
                            <div class="widget-dash-board pr-256 mb-75">
                                <div class="d-flex justify-content-between mb-30">
                                <h4 class="title-add-tour ">2. Tour Planning</h4>
                                  <button type="button" id="toggleMapBtn" class="map-toggle-btn">Enable Map</button>
                              </div>
                                <div id="tourDaysContainer"></div>
                                  <h4 class="mt-4" id="routemapheading">Route Map</h4>
                                  <div id="routeMap" style="height: 400px; width: 100%;"></div>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                  <button type="button" id="addDayBtn" class="btn-small btn-success">
                                    <i class="fa-solid fa-plus"></i> Add New Day
                                  </button>
                                  <button type="button" id="removeAllDaysBtn" class="btn-small btn-danger" style="display: none;">
                                    <i class="fa-solid fa-trash"></i> Remove All
                                  </button>
                                </div>
                              </div>
                              {{-- Date Adding Repeater --}}
                              <!-- DATES SECTION -->
                            <div class="widget-dash-board pr-256 mb-75">
                              <h4 class="title-add-tour mb-30">3. Dates</h4>

                              <div id="datesContainer"></div>

                              <button type="button" id="addDateBtn" class="btn btn-sm btn-success mt-2">
                                <i class="fa fa-plus"></i> Add Date
                              </button>
                            </div>

                            

                           
                            <div class="widget-dash-board pr-128 mb-75">
                                <h4 class="title-add-tour mb-30">4. Pricing</h4>

                                <div class="grid-input-2 mb-45">
                                    <div class="input-wrap">
                                      <div id="pricingContainer"></div>
                                        <button type="button" id="addPriceBtn" class="btn btn-sm btn-success">
                                          <i class="fa fa-plus"></i> Add Price Type
                                        </button>
                                    </div>
                                   
                                </div>
                               

                            </div>
                         
    </div>
      <div style="height: fit-content" class="col-lg-4 bg-white p-4 col-md-12">
      <div id="mediaSidebar" class="sticky-top">
 
                                                                             
        <h4>Tour Images</h4>
        <!-- KEEP YOUR IMAGE UPLOAD CODE HERE -->
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

        <hr>

        <h4>Tour Video</h4>
        <!-- KEEP VIDEO UPLOAD -->
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

        <hr>

        <h4>Shot Gallery</h4>
        <!-- KEEP GALLERY CODE -->
        <div class="input-wrap">
              <h4 class="title-add-tour mb-30">5. Shot Gallery</h4>

                               {{-- Image will go here --}}
                                <div id="uploadBox" class="upload-box">
                                    <label for="uploadImage" class="upload-label">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        <span>Click or Drag Images</span>
                                    </label>
                                    <input type="file" id="uploadImage" accept="image/*" multiple hidden>
                                </div>

                                <div id="galleryContainer" class="gallery-grid">
                                    <p class="text-center text-muted">No Image Selected</p>
                                </div>
        </div>

      </div>
         <div class="widget-dash-board ">
                            
                                        <hr/>
                                <div class="input-wrap  my-3">
                                    <button type="button" class="button-add w-100 "> Save changes</button>
                                </div>

                            </div>
    </div> <!-- END RIGHT -->

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
    <script src="/app/js/admin-auth-guard.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

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
    

  <script>
let allServices = [];
let selectedServices = [];
let ALL_LOCATIONS = [];
let loadedPackage = null; // will store API /api/package/{id} response
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
            <div class="grid-input-2 mb-3">
              <div class="input-wrap">
                <label>Period (Day/Night)</label>
                <select class="form-select">
                  <option value="Day">Day</option>
                </select>
              </div>
              <!-- CITY NAME (Always Visible) -->
                <div class="input-wrap">
                  <label>City Name</label>
                  <input type="text" placeholder="Enter City Name" class="form-control city-input">
                </div>

                <!-- EXACT LOCATION (Visible Only When Map = ON) -->
                <div class="input-wrap exact-location-wrap" style="display:none; position:relative;">
                    <label>Exact Location (Map Search)</label>

                    <input type="text" class="form-control exact-location-input" placeholder="Search location...">

                    <!-- Suggestions dropdown -->
                    <div class="location-suggestions bg-white border rounded mt-1" 
                        style="display:none; position:absolute; width:100%; z-index:9999;"></div>

                    <!-- Hidden map coords -->
                    <input type="hidden" class="location-lat">
                    <input type="hidden" class="location-lng">
                    <input type="hidden" class="location-display">
                </div>


            </div>
    
            <div class="grid-input-2 mb-3">
              <div class="input-wrap">
                <label>City Subtitle</label>
                <input type="text" placeholder="From – To or Short Subtitle" class="form-control">
              </div>
            </div>
    
             
    
        
    
            <div class="input-wrap mb-3">
              <label>Day Description (What we do there)</label>
             <textarea class="textarea-tinymce" name="area"></textarea>
            </div>
          `;
    
        attachLocationAutocomplete(block);

          return block;
        }
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

    function drawRouteMap() {
      const mapDiv = document.getElementById("routeMap");
      if (!mapDiv) return;

      mapDiv.innerHTML = "";
      let points = [];

      $("#tourDaysContainer .day-block").each(function () {
          const lat = $(this).find(".location-lat").val();
          const lng = $(this).find(".location-lng").val();

          if (lat && lng) points.push([parseFloat(lat), parseFloat(lng)]);
      });

      if (points.length < 2) return;

      const map = L.map("routeMap").setView(points[0], 6);

      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);

      // draw route
      L.polyline(points, { color: "yellow", weight: 4 }).addTo(map);

      // markers
      points.forEach((p, i) => {
          L.marker(p).addTo(map).bindPopup("Day " + (i + 1));
      });

      map.fitBounds(points);
  }

  function attachLocationAutocomplete(block) {
      const input = block.querySelector(".exact-location-input");
      const suggestionBox = block.querySelector(".location-suggestions");
      const latInput = block.querySelector(".location-lat");
      const lngInput = block.querySelector(".location-lng");
      const displayInput = block.querySelector(".location-display");

     input.addEventListener("input", function () {
    const val = this.value.trim();

    if (!val) {
        suggestionBox.style.display = "none";
        return;
    }

    fetch(`https://nominatim.openstreetmap.org/search?format=json&addressdetails=1&limit=10&countrycodes=in&q=${encodeURIComponent(val)}`)
        .then(res => res.json())
        .then(data => {
            if (!data.length) {
                suggestionBox.innerHTML = `<div class="p-1 text-muted">No results</div>`;
                suggestionBox.style.display = "block";
                return;
            }

            suggestionBox.innerHTML = data
                .map(loc => `
                    <div class="p-1 suggestion-item"
                        data-lat="${loc.lat}"
                        data-lon="${loc.lon}"
                        data-name="${loc.display_name}">
                        ${loc.display_name}
                    </div>
                `)
                .join("");

            suggestionBox.style.display = "block";

            suggestionBox.querySelectorAll(".suggestion-item").forEach(item => {
                item.addEventListener("click", function () {
                    input.value = this.dataset.name;
                    latInput.value = this.dataset.lat;
                    lngInput.value = this.dataset.lon;
                    displayInput.value = this.dataset.name;
                    suggestionBox.style.display = "none";

                    drawRouteMap();
                });
            });
        });
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
  // Load locations at start (India only)
  fetch("https://nominatim.openstreetmap.org/search?country=India&format=json&addressdetails=1&limit=500&dedupe=1&featureType=city")
      .then(res => res.json())
      .then(data => {
          ALL_LOCATIONS = data;
          console.log("Loaded:", ALL_LOCATIONS.length);
      });


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
 
      

        let mapEnabled = false;

       $("#toggleMapBtn").on("click", function () {

          mapEnabled = !mapEnabled;

          // Toggle button look
          $(this).toggleClass("active");

          // Show/Hide exact location fields for ALL existing days
          $("#tourDaysContainer .exact-location-wrap").each(function () {
              $(this).toggle(mapEnabled);
          });

          // Show/Hide map
          $("#routeMap").toggle(mapEnabled);
          $('#routemapheading').toggle(mapEnabled);
          if (mapEnabled) drawRouteMap();
      });


    
        // ============================
        // Add New Day
        // ============================
        addDayBtn.addEventListener('click', () => {
          const newBlock = createDayBlock(dayIndex);
          if (mapEnabled) {
            $(newBlock).find(".exact-location-wrap").show();
        }

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
                  renumberDays();
                  drawRouteMap();
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
        function renumberDays() {
          let dayNum = 1;
          $("#tourDaysContainer .day-block").each(function () {
            $(this).find("h5").text("Day " + dayNum);
            dayNum++;
          });
        }
        function renumberDates() {
          let i = 1;
          $("#datesContainer .date-block").each(function(){
            $(this).find("h6").text("Date " + i);
            i++;
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
    
 
  

  // // 🟢 Twemoji Render for existing emoji previews
  // document.addEventListener('DOMContentLoaded', () => {
  //   document.querySelectorAll('.emoji-preview').forEach(el => {
  //     el.innerHTML = twemoji.parse('😀', { folder: 'svg', ext: '.svg' });
  //   });
  // });

  

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




    

  // =======================================
  // EXPORT TO FORM ON SUBMIT
  // =======================================


  // --- state ---
// ===================
// IMAGE / GALLERY STATE
// ===================

// For main package images (existing + new)
let imagesState = []; 
// item = { type: 'existing' | 'new', url: '...', file: File|null, is_main: boolean }

// For shot gallery (existing + new)
let shotGalleryState = []; 
// item = { type: 'existing' | 'new', url: '...', file: File|null }

// Video
let videoFile = null;
let uploadedVideoPath = null; // from resumable upload (string path)

// ---------- Images (package) handling ----------
// =============== PACKAGE IMAGES ===============

// When user selects new images
$('#images').on('change', function () {
    const newFiles = Array.from(this.files).filter(f => f.type && f.type.startsWith('image/'));

    newFiles.forEach(file => {
        imagesState.push({
            type: 'new',
            file,
            url: URL.createObjectURL(file),
            is_main: imagesState.length === 0 // first image becomes main if none
        });
    });

    renderPreviews();
    this.value = ""; // allow same file again if needed
});

// Render preview of main package images
function renderPreviews() {
    const previewContainer = $('#imagePreviewContainer');
    previewContainer.empty();

    if (!imagesState.length) {
        $('#removeAllBtn').hide();
        previewContainer.html('<p class="text-muted">No images added yet</p>');
        return;
    }

    $('#removeAllBtn').show();

    imagesState.forEach((item, index) => {
        const isMain = item.is_main;
        const mainLabel = isMain ? 'Main' : 'Set as Main';
        const disabledAttr = isMain ? 'disabled' : '';

        const src = item.type === 'existing'
            ? item.url              // full URL already
            : item.url;             // created via URL.createObjectURL

        const preview = $(`
            <div class="image-preview-box" data-index="${index}">
                <div class="image-preview">
                    <img src="${src}" alt="Image Preview">
                </div>
                <div class="action-buttons">
                    <button type="button" class="edit-btn btn btn-sm btn-secondary">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button type="button" class="delete-btn btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                    <button type="button" class="set-main-btn btn btn-sm btn-warning" ${disabledAttr}>
                        <i class="fas fa-star"></i> ${mainLabel}
                    </button>
                </div>
            </div>
        `);

        previewContainer.append(preview);
    });
}

// Set as main image
$('#imagePreviewContainer').on('click', '.set-main-btn', function () {
    const idx = Number($(this).closest('.image-preview-box').data('index'));
    if (!Number.isFinite(idx)) return;

    imagesState = imagesState.map((img, i) => ({
        ...img,
        is_main: i === idx
    }));

    renderPreviews();
});

// Delete single image
$('#imagePreviewContainer').on('click', '.delete-btn', function () {
    const idx = Number($(this).closest('.image-preview-box').data('index'));
    if (!Number.isFinite(idx)) return;

    imagesState.splice(idx, 1);
    // ensure at least one is main if any exists
    if (imagesState.length && !imagesState.some(i => i.is_main)) {
        imagesState[0].is_main = true;
    }
    renderPreviews();
});

// Edit/replace single image
$(document).on('click', '.edit-btn', function () {
    const $box = $(this).closest('.image-preview-box');
    const idx = Number($box.data('index'));
    if (!Number.isFinite(idx)) return;

    const tempInput = $('<input type="file" accept="image/*" style="display:none;">');
    $('body').append(tempInput);
    tempInput.trigger('click');

    tempInput.on('change', function (e) {
        const file = e.target.files && e.target.files[0];
        if (file && file.type && file.type.startsWith('image/')) {
            imagesState[idx] = {
                type: 'new',
                file,
                url: URL.createObjectURL(file),
                is_main: imagesState[idx].is_main
            };
            renderPreviews();
        } else {
            alert('Please select a valid image file.');
        }
        tempInput.remove();
    });
});

// Remove all images
$('#removeAllBtn').on('click', function () {
    if (!confirm('Remove all images?')) return;
    imagesState = [];
    renderPreviews();
});


// =============== SHOT GALLERY ===============

// Add new gallery images via input
$('#uploadImage').on('change', function () {
    const newFiles = Array.from(this.files).filter(f => f.type && f.type.startsWith('image/'));
    newFiles.forEach(file => {
        shotGalleryState.push({
            type: 'new',
            file,
            url: URL.createObjectURL(file)
        });
    });
    renderGallery();
    this.value = "";
});

// Render shot gallery
function renderGallery() {
    const container = $('#galleryContainer');
    container.empty();

    if (!shotGalleryState.length) {
        container.html('<p class="text-center text-muted">No gallery images yet</p>');
        return;
    }

    shotGalleryState.forEach((item, index) => {
        const src = item.url;
        const card = $(`
            <div class="gallery-item" data-index="${index}">
                <img src="${src}" alt="Gallery image">
                <div class="gallery-actions">
                    <button type="button" class="gallery-delete btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `);
        container.append(card);
    });
}

// Delete gallery image
$('#galleryContainer').on('click', '.gallery-delete', function () {
    const idx = Number($(this).closest('.gallery-item').data('index'));
    if (!Number.isFinite(idx)) return;
    shotGalleryState.splice(idx, 1);
    renderGallery();
});

// Drag-and-drop for shot gallery
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

    const files = Array.from(e.dataTransfer.files).filter(f => f.type.startsWith("image/"));
    files.forEach(file => {
        shotGalleryState.push({
            type: 'new',
            file,
            url: URL.createObjectURL(file)
        });
    });
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

// DATES HANDLER
let dateIndex = 1;

$("#addDateBtn").on("click", function(){
  $("#datesContainer").append(`
      <div class="border rounded p-3 mb-3 date-block">
        <div class="d-flex justify-content-between">
          <h6>Date ${dateIndex}</h6>
          <button class="btn btn-sm btn-danger remove-date">Remove</button>
        </div>

        <div class="row mt-2">
          <div class="col-md-6">
            <label>Starting Date</label>
            <input type="date" class="form-control startingDate">
          </div>

          <div class="col-md-6">
            <label>Ending Date</label>
            <input type="date" class="form-control endingDate">
          </div>
        </div>
      </div>
  `);
  dateIndex++;
});

$(document).on("click", ".remove-date", function(){
  $(this).closest(".date-block").remove();
    renumberDates();
});

$("#addPriceBtn").on("click", function(){
  $("#pricingContainer").append(`
    <div class="border p-3 rounded mb-2 price-block">
      <div class="row">
        <div class="col-md-5">
          <label>Name (Solo/Dual/OBOF/SIC)</label>
          <input type="text" class="form-control price-name">
        </div>
       
         <div class="col-md-5">
          <label>No of Riders</label>
          <input type="number" class="form-control rider-value">
        </div>

         <div class="col-md-5">
          <label>Price</label>
          <input type="number" class="form-control price-value">
        </div>
        <div class="col-md-2 d-flex align-items-end">
          <button class="btn btn-danger btn-sm remove-price">X</button>
        </div>
      </div>
    </div>
  `);
});

$(document).on("click", ".remove-price", function(){
  $(this).closest(".price-block").remove();
});




// GENERIC ADD/REMOVE
  function listHandler(btnId, containerId, emptyText){
    $(btnId).on("click", function(){
      const list = $(containerId);
      if(list.find("li.text-muted").length) list.empty();

      const li = $(`
        <li class="mb-2 d-flex align-items-center">
          <input type="text" class="form-control me-2" placeholder="Type and enter">
          <button class="btn btn-sm btn-danger btn-remove">X</button>
        </li>
      `);

      li.find(".btn-remove").on("click", ()=> {
        li.remove();
        if(!$(containerId).children().length){
          $(containerId).html(`<li class='text-muted small'>${emptyText}</li>`);
        }
      });

      list.append(li);
    });
  }

listHandler("#btnAddInclusion", "#inclusionList", "No inclusion added.");
listHandler("#btnAddExclusion", "#exclusionList", "No exclusion added.");
listHandler("#btnAddCompl", "#complList", "No complimentary benefits added.");

// ---------- Form submit (build FormData) ----------
  $('.button-add').on('click', function (e) {
    e.preventDefault();
    const packageId = window.location.pathname.split("/").pop();

    Swal.fire({
        title: "Updating Package...",
        text: "Please wait while we save your changes.",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        didOpen: () => Swal.showLoading()
    });

    // ---------- Build information ----------
    const information = {
        title: $("input[placeholder='Switzerland city tour']").val()?.trim(),
        subtitle: $("input[placeholder='Switzerland best city']").val()?.trim(),
        noofriders: $("input[placeholder='20,30... etc']").val()?.trim(),
        description: $("textarea[name='description']").val()?.trim(),
        type: $("#typeDropdown .option.selected").data("value") || $("#typeDropdown").attr("data-selected-id") || null,
        keyword: ($("input[placeholder='Keyword']").val() || "")
            .split(",")
            .map(k => k.trim())
            .filter(Boolean),
        highlight: $("#highlightList li input").map(function () {
            return $(this).val().trim();
        }).get().filter(Boolean),
        whattoexpect: {
            startingpoint: $("#startingpoint").val(),
            endingpoint: $("#endingpoint").val(),
            departuretime: $("#departuretime").val(),
            difficultylevel: $("#difficultylevel").val()
        },
        video: uploadedVideoPath || null
    };

    // ---------- Tour ----------
    const tour = [];
    $("#tourDaysContainer .day-block").each(function () {
        const city = $(this).find(".city-input").val() || "";
        const exactLocation = $(this).find(".location-display").val() || "";
        const lat = $(this).find(".location-lat").val() || "";
        const lng = $(this).find(".location-lng").val() || "";
        const enableMap = mapEnabled;

        tour.push({
            period: $(this).find("select").val() || "",
            location: city,
            locationSubtitle: $(this).find("input[placeholder='From – To or Short Subtitle']").val() || "",
            locationDescription: $(this).find("textarea").val() || "",
            icon: $(this).find(".emoji-input").val() || "",
            ...(enableMap ? {
                exact_location: exactLocation,
                lat: lat,
                long: lng
            } : {})
        });
    });

    // ---------- Inclusion / Exclusion / Complimentary ----------
    function getList(selector) {
        return $(selector + " input").map(function () {
            return $(this).val().trim();
        }).get().filter(Boolean);
    }
    information.inclusion = getList("#inclusionList");
    information.exclusion = getList("#exclusionList");
    information.complimentary_benefits = getList("#complList");

    // ---------- Services ----------
    const services = getSelectedServiceIds();

    // ---------- Place / Tour ids ----------
    const place_id = $("#placeDropdown .option.selected").data("value") || $("#placeDropdown").attr("data-selected-id") || null;
    const tour_id = $("#tourDropdown .option.selected").data("value") || $("#tourDropdown").attr("data-selected-id") || null;

    // ---------- Dates ----------
    const dates = [];
    $("#datesContainer .date-block").each(function () {
        dates.push({
            startingDate: $(this).find(".startingDate").val(),
            endingDate: $(this).find(".endingDate").val()
        });
    });

    // ---------- Pricing ----------
    const pricing = [];
    $("#pricingContainer .price-block").each(function () {
        pricing.push({
            name: $(this).find(".price-name").val(),
            price: $(this).find(".price-value").val(),
            riders: $(this).find(".rider-value").val()
        });
    });

    // ---------- Build FormData ----------
    const fd = new FormData();

    fd.append('information', JSON.stringify(information));
    fd.append('tour', JSON.stringify(tour));
    fd.append('services', JSON.stringify(services));
    fd.append('place_id', place_id ?? '');
    fd.append('tour_id', tour_id ?? '');
    fd.append('dates', JSON.stringify(dates));
    fd.append('pricing', JSON.stringify(pricing));
    fd.append('_method', 'PUT');

    // ===== IMAGES META (Option A: keep existing unless removed) =====
    const imagesMeta = [];
    let newIndex = 0;

    imagesState.forEach((img) => {
        if (img.type === 'existing') {
            // send existing path for backend
            const cleanPath = img.url.replace(/^https?:\/\/[^/]+/, '').replace(/^\//, '');
            imagesMeta.push({
                type: 'existing',
                url: cleanPath,
                is_main: !!img.is_main
            });
        } else if (img.type === 'new' && img.file instanceof File) {
            imagesMeta.push({
                type: 'new',
                index: newIndex,
                is_main: !!img.is_main
            });
            fd.append(`images[${newIndex}]`, img.file, img.file.name || `image_${newIndex}.jpg`);
            newIndex++;
        }
    });

    fd.append('images_meta', JSON.stringify(imagesMeta));

    // ===== SHOT GALLERY META =====
    const shotMeta = [];
    let shotNewIndex = 0;

    shotGalleryState.forEach((img) => {
        if (img.type === 'existing') {
            const cleanPath = img.url.replace(/^https?:\/\/[^/]+/, '').replace(/^\//, '');
            shotMeta.push({
                type: 'existing',
                url: cleanPath
            });
        } else if (img.type === 'new' && img.file instanceof File) {
            shotMeta.push({
                type: 'new',
                index: shotNewIndex
            });
            fd.append(`shotgallery[${shotNewIndex}]`, img.file, img.file.name || `shot_${shotNewIndex}.jpg`);
            shotNewIndex++;
        }
    });

    fd.append('shotgallery_meta', JSON.stringify(shotMeta));



    // ---------- SEND PUT REQUEST ----------
    fetch(`${APP_URL}/api/package/${packageId}`, {
        method: 'POST',       // If you're using Laravel, for PUT you might need POST + _method
        body: fd,
        headers: {
            'Accept': 'application/json'
        }
    })
        .then(async res => {
            let data;
            try {
                data = await res.json();
            } catch (e) {
                throw new Error("Invalid JSON response from server.");
            }

            if (!res.ok) {
                throw new Error(data.message || "Something went wrong");
            }

            Swal.fire({
                icon: "success",
                title: "Updated Successfully!",
                text: "Your package has been updated.",
                confirmButtonColor: "#28a745",
            });

            return data;
        })
        .catch(err => {
            Swal.fire({
                icon: "error",
                title: "Update Failed",
                html: `<p style="text-align:left;">${err.message}</p>`,
                confirmButtonColor: "#d33",
            });
        });
  });


      </script>
    
      <script>
          // =========================
          // AUTO-FILL PACKAGE EDIT FORM
          // =========================

            document.addEventListener("DOMContentLoaded", function () {
                const packageId = window.location.pathname.split("/").pop(); // get id from /admin/package/edit/4

                fetch(`/api/package/${packageId}`)
                    .then(res => res.json())
                    .then(data => fillForm(data));
            });

            function fillForm(pkg) {
                const info = pkg.information || {};

                // ---------- 1. Information ----------
                $("input[placeholder='Switzerland city tour']").val(info.title || "");
                $("input[placeholder='Switzerland best city']").val(info.subtitle || "");
                $("input[placeholder='20,30... etc']").val(info.noofriders || "");
                $("textarea[name='description']").val(info.description || "");

                // Keywords
                if (Array.isArray(info.keyword)) {
                    $("input[placeholder='Keyword']").val(info.keyword.join(", "));
                }

                // Type dropdown (after /api/type/get has populated)
                // We only set text + selected id; matching by id
                if (info.type) {
                    $("#typeDropdown").attr("data-selected-id", info.type);
                    // name text: if you want real name you can map later when types loaded
                    $("#typeDropdown .current").text(info.type);
                }

                // What to expect
                const wte = info.whattoexpect || {};
                $("#startingpoint").val(wte.startingpoint || "");
                $("#endingpoint").val(wte.endingpoint || "");
                $("#departuretime").val(wte.departuretime || "");
                $("#difficultylevel").val(wte.difficultylevel || "");

                // ---------- 2. Highlights ----------
                $("#highlightList").empty();
                if (Array.isArray(info.highlight) && info.highlight.length) {
                    info.highlight.forEach(h => {
                        $("#highlightList").append(`
                            <li class="mb-2 d-flex align-items-center">
                                <input type="text" class="form-control me-2" value="${h}">
                                <button type="button" class="btn btn-sm btn-outline-danger btn-remove">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </li>
                        `);
                    });
                } else {
                    $("#highlightList").html(`<li class="text-muted small">No highlights added yet.</li>`);
                }

                // ---------- 3. Inclusion ----------
                $("#inclusionList").empty();
                if (Array.isArray(info.inclusion) && info.inclusion.length) {
                    info.inclusion.forEach(i => {
                        $("#inclusionList").append(`
                            <li class="mb-2 d-flex align-items-center">
                                <input type="text" class="form-control me-2" value="${i}">
                                <button class="btn btn-sm btn-danger btn-remove">X</button>
                            </li>
                        `);
                    });
                } else {
                    $("#inclusionList").html(`<li class="text-muted small">No inclusion added.</li>`);
                }

                // ---------- 4. Exclusion ----------
                $("#exclusionList").empty();
                if (Array.isArray(info.exclusion) && info.exclusion.length) {
                    info.exclusion.forEach(i => {
                        $("#exclusionList").append(`
                            <li class="mb-2 d-flex align-items-center">
                                <input type="text" class="form-control me-2" value="${i}">
                                <button class="btn btn-sm btn-danger btn-remove">X</button>
                            </li>
                        `);
                    });
                } else {
                    $("#exclusionList").html(`<li class="text-muted small">No exclusion added.</li>`);
                }

                // ---------- 5. Complimentary ----------
                $("#complList").empty();
                if (Array.isArray(info.complimentary_benefits) && info.complimentary_benefits.length) {
                    info.complimentary_benefits.forEach(c => {
                        $("#complList").append(`
                            <li class="mb-2 d-flex align-items-center">
                                <input type="text" class="form-control me-2" value="${c}">
                                <button class="btn btn-sm btn-danger btn-remove">X</button>
                            </li>
                        `);
                    });
                } else {
                    $("#complList").html(`<li class="text-muted small">No complimentary benefit added.</li>`);
                }

                // ---------- 6. Tour Days ----------
                $("#tourDaysContainer").empty();
                if (Array.isArray(pkg.tour)) {
                    pkg.tour.forEach((day, i) => {
                        dayIndex = i + 1;
                        const block = createDayBlock(dayIndex);

                        $(block).find(".city-input").val(day.location || "");
                        $(block).find("input[placeholder='From – To or Short Subtitle']").val(day.locationSubtitle || "");
                        $(block).find("textarea").val(day.locationDescription || "");

                        $("#tourDaysContainer").append(block);
                    });
                    if (pkg.tour.length > 0) {
                        $("#removeAllDaysBtn").show();
                    }
                }

                // ---------- 7. Dates ----------
                $("#datesContainer").empty();
                if (Array.isArray(pkg.dates)) {
                    pkg.dates.forEach((d, i) => {
                        $("#datesContainer").append(`
                            <div class="border rounded p-3 mb-3 date-block">
                                <div class="d-flex justify-content-between">
                                    <h6>Date ${i + 1}</h6>
                                    <button class="btn btn-sm btn-danger remove-date">Remove</button>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label>Starting Date</label>
                                        <input type="date" class="form-control startingDate" value="${d.startingDate}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Ending Date</label>
                                        <input type="date" class="form-control endingDate" value="${d.endingDate}">
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                }

                // ---------- 8. Pricing ----------
                $("#pricingContainer").empty();
                if (Array.isArray(pkg.pricing)) {
                    pkg.pricing.forEach(p => {
                        $("#pricingContainer").append(`
                            <div class="border p-3 rounded mb-2 price-block">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Name (Solo/Dual/OBOF/SIC)</label>
                                        <input type="text" class="form-control price-name" value="${p.name}">
                                    </div>
                                    <div class="col-md-5">
                                        <label>No of Riders</label>
                                        <input type="number" class="form-control rider-value" value="${p.riders}">
                                    </div>
                                    <div class="col-md-5">
                                        <label>Price</label>
                                        <input type="number" class="form-control price-value" value="${p.price}">
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button class="btn btn-danger btn-sm remove-price">X</button>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                }

                // ---------- 9. Services (pre-selected) ----------
                selectedServices = pkg.services_details || [];
                renderSelected();
                renderAll();

                // ---------- 10. Images ----------
                imagesState = [];
                if (Array.isArray(info.images)) {
                    info.images.forEach((img, idx) => {
                        imagesState.push({
                            type: 'existing',
                            url: '/' + img.url,
                            file: null,
                            is_main: !!img.is_main || idx === 0
                        });
                    });
                }
                renderPreviews();

                // ---------- 11. Shot gallery ----------
                shotGalleryState = [];
                if (Array.isArray(info.shot_gallery)) {
                    info.shot_gallery.forEach(img => {
                        shotGalleryState.push({
                            type: 'existing',
                            url: '/' + img.url,
                            file: null
                        });
                    });
                }
                renderGallery();

                // ---------- 12. Video ----------
                if (info.video) {
                    uploadedVideoPath = info.video; // server path
                    $("#uploadStatus").text("Existing video attached.");
                }

                // ---------- 13. Place / Tour preselect (if dropdowns already loaded) ----------
                // NOTE: your place/tour dropdowns are filled via /api/place and /api/tours/by-place
                // This just sets attributes; you may want to hook into that logic if you need full nice-select behaviour.
                if (pkg.place_id) {
                    $("#placeDropdown").attr("data-selected-id", pkg.place_id);
                }
                if (pkg.tour_id) {
                    $("#tourDropdown").attr("data-selected-id", pkg.tour_id);
                }
            }

      </script>
  
</body>

</html>
