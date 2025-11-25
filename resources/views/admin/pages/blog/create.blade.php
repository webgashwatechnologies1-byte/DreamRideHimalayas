<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
  <meta charset="utf-8" />
  <title>Add Blog - Travel & Tour Booking Admin</title>
  <meta name="author" content="themesflat.com" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Styles (use your existing theme files) -->
  <link rel="stylesheet" href="/app/css/app.css" />
  <link rel="stylesheet" href="/app/css/map.min.css" />
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" /> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- TinyMCE core (script included, config will be in PART 3) -->
  <script src="/app/js/tinymce/tinymce.min.js"></script>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    /* Small page-specific styles (keeps theme look) */
    .author-preview {
      width: 120px;
      height: 120px;
      border-radius: 999px;
      border: 2px solid #e6e6e6;
      overflow: hidden;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: #fff;
    }
    .author-preview img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .input-wrap label { font-weight: 600; margin-bottom: 6px; display:block; }
    .tag-pill { display:inline-flex; align-items:center; gap:8px; padding:6px 10px; border-radius:999px; background:#f1f5f9; border:1px solid #e2e8f0; margin:6px 6px 0 0; }
    .tag-pill .remove-tag { cursor:pointer; color:#e11d48; margin-left:6px; }
    .tags-input { min-height:56px; padding:8px; border:1px dashed #e6e6e6; border-radius:8px; background:#fff; }
    .meta-block { background:#fff; border:1px solid #e6e6e6; padding:12px; border-radius:8px; }
    .btn-small { padding:6px 10px; font-size:13px; border-radius:6px; }
    .widget-dash-board { background:#fff; padding:18px; border-radius:8px; border:1px solid #eef2f6; margin-bottom:24px; }
    .top-actions { display:flex; gap:10px; align-items:center; justify-content:flex-end; margin-bottom:12px; }
    .editor-hint { font-size:13px; color:#6b7280; margin-top:6px; 
              /* ============================
          PART 2 — Blog Add Page Styles
          Place in head or app.css (end)
          ============================ */

        /* Layout & widget base (aligns with your theme) */
        .widget-dash-board {
          background: #ffffff;
          border: 1px solid #e9eef4;
          border-radius: 10px;
          padding: 18px;
          box-shadow: 0 1px 0 rgba(0,0,0,0.02);
        }

        /* Grid helpers */
        .grid-input-2 {
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 18px;
        }

        @media (max-width: 768px) {
          .grid-input-2 {
            grid-template-columns: 1fr;
          }
        }

        /* Input labels */
        .input-wrap label {
          display: block;
          font-weight: 600;
          margin-bottom: 6px;
          color: #111827;
        }

        /* TinyMCE container */
        .tox-tinymce {
          border-radius: 8px;
          border: 1px solid #e6edf3;
          box-shadow: none;
        }

        /* Editor hint text */
        .editor-hint {
          color: #6b7280;
          font-size: 13px;
          margin-bottom: 8px;
        }

        /* Author preview circle (option B) */
        .author-preview {
          width: 120px;
          height: 120px;
          border-radius: 999px;
          border: 2px solid #eef2f7;
          overflow: hidden;
          background: linear-gradient(180deg,#ffffff,#fbfcfe);
          display: inline-flex;
          align-items: center;
          justify-content: center;
          box-shadow: 0 6px 18px rgba(2,6,23,0.04);
        }

        .author-preview img {
          width: 100%;
          height: 100%;
          object-fit: cover;
          display: block;
        }

        /* Buttons style */
        .btn-small {
          padding: 7px 12px;
          font-size: 13px;
          border-radius: 8px;
        }

        /* Tags UI */
        .tags-input {
          min-height: 56px;
          border-radius: 8px;
          padding: 10px;
          background: #fff;
          border: 1px dashed #e6edf3;
          display: flex;
          flex-direction: column;
          gap: 8px;
        }

        #tagsList {
          display: flex;
          gap: 8px;
          flex-wrap: wrap;
        }

        .tag-pill {
          display: inline-flex;
          align-items: center;
          gap: 8px;
          background: #f8fafc;
          border: 1px solid #e6eef6;
          padding: 6px 10px;
          border-radius: 999px;
          font-weight: 600;
          color: #0f172a;
          box-shadow: 0 1px 0 rgba(2,6,23,0.02) inset;
        }

        .tag-pill .remove-tag {
          display: inline-flex;
          align-items: center;
          justify-content: center;
          width: 22px;
          height: 22px;
          border-radius: 50%;
          background: transparent;
          color: #ef4444;
          cursor: pointer;
          font-size: 14px;
        }

        /* Meta block */
        .meta-block {
          background: #ffffff;
          border: 1px solid #eef2f7;
          padding: 12px;
          border-radius: 8px;
        }

        /* JSON preview */
        #jsonPreview {
          font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, "Roboto Mono", monospace;
          font-size: 13px;
          color: #0f172a;
          background: linear-gradient(180deg,#fbfdff,#f8fbff);
          border: 1px solid #e6eef6;
          padding: 12px;
          border-radius: 8px;
        }

        /* Small helper / muted text */
        .text-muted.small {
          font-size: 13px;
        }

        /* File input invis trick */
        input[type="file"].hidden-file-input {
          display: none;
        }

        /* Form spacing */
        .form-add-blog .input-wrap { margin-bottom: 12px; }

        /* Small icon in buttons */
        .btn .fa {
          margin-right: 6px;
          font-size: 13px;
        }

        /* Responsive adjustments for author block */
        @media (max-width: 992px) {
          .author-preview {
            width: 100px;
            height: 100px;
          }
        }

        /* Tiny helper for disabled states */
        .disabled {
          opacity: 0.6;
          pointer-events: none;
        }

        /* TinyMCE media styling inside content preview (so editor content renders nicely) */
        .content-preview img, .tox-content img {
          max-width: 100%;
          height: auto;
          display: block;
        }

        .content-preview iframe, .tox-content iframe {
          max-width: 100%;
        }

        /* Accessibility focus */
        input:focus, textarea:focus, .tox .tox-editor-container:focus {
          outline: 2px solid rgba(59,130,246,0.12);
          box-shadow: 0 0 0 3px rgba(59,130,246,0.08);
        }

        /* Small warning / error */
        .form-error {
          color: #b91c1c;
          font-size: 13px;
          margin-top: 6px;
        }

        /* Small success toast helper */
        .toast-success {
          background: #ecfdf5;
          border: 1px solid #bbf7d0;
          color: #065f46;
          padding: 8px 12px;
          border-radius: 6px;
        }

        /* Drag & drop hint (if later used) */
        .drag-drop {
          border: 2px dashed #e6edf3;
          padding: 16px;
          border-radius: 8px;
          background: #fbfdff;
          text-align: center;
        }

        /* Keep footer sticky-ish inside admin area */
        .footer-dashboard {
          margin-top: 24px;
          padding: 18px 0;
          background: linear-gradient(180deg,#0b1220,#071021);
          color: #fff;
        }

        /* Slight hover for pill */
        .tag-pill:hover {
          transform: translateY(-2px);
          transition: transform .12s ease;
        }

        /* Make JSON preview monospace scrollable */
        #jsonPreview::-webkit-scrollbar { height: 8px; width:10px; }
        #jsonPreview::-webkit-scrollbar-thumb { background: #cfe9ff; border-radius: 8px; }

        /* TinyMCE toolbar responsive wrap */
        .tox-toolbar__primary {
          flex-wrap: wrap;
        }

    }
  </style>
</head>

<body class="body header-fixed">

  <div id="wrapper">
    <div id="pagee" class="clearfix">

      <!-- include your admin sidebar -->
      @include('admin.components.sidebar')

      <div class="has-dashboard">
        <!-- Main Header -->
        <header class="main-header flex">
          @include('admin.components.header')
        </header>

        <main id="main">
          <section class="profile-dashboard">
            <div class="inner-header mb-40">
              <h3 class="title">Add Blog</h3>
            </div>

            <!-- Main form -->
            <form id="form-add-blog" class="form-add-blog" enctype="multipart/form-data" onsubmit="return false;">
              <!-- Top actions -->
              

              <!-- 1. Basic Info -->
              <div class="widget-dash-board">
                <h4 class="mb-3">1. Basic Information</h4>

                <div class="grid-input-2 mb-3">
                    <!-- PREVIEW BOX -->
                  <div id="thumbnailPreviewBox" 
                      style="margin-top:15px; display:none;">
                      <img id="thumbnailPreviewImg" 
                          src=""
                          style="width:100%; max-height:380px; object-fit:cover; border-radius:10px; border:1px solid #e3e3e3;">
                  </div>
                  <div class="input-wrap mt-3">
                      <label for="thumbnail">Blog Thumbnail</label>
                      <input type="file" id="thumbnailInput" name="thumbnail" class="form-control">
                      <small class="text-muted">Supported: JPG, PNG, WEBP</small>
                  </div>

                  <div class="input-wrap">
                    <label for="blogTitle">Title</label>
                    <input id="blogTitle" name="title" type="text" class="form-control" placeholder="Ride to Spiti Valley" />
                  </div>

                  <div class="input-wrap">
                    <label for="readingTime">Reading Time</label>
                    <input id="readingTime" name="reading_time" type="text" class="form-control" placeholder="e.g. 5 min" />
                  </div>
                </div>

                <div class="grid-input-2 mb-3">
                  <div class="input-wrap">
                    <label>Tags</label>
                    <div class="tags-input" id="tagsInputContainer">
                      <div id="tagsList" style="min-height:32px;"></div>
                      <div class="mt-2 d-flex gap-2">
                        <input id="tagNewInput" type="text" class="form-control" placeholder="Add tag and press Enter" />
                        <button type="button" class="btn btn-success btn-small" id="btnAddTag"><i class="fa fa-plus"></i> Add</button>
                      </div>
                    </div>
                  </div>

                  <div class="input-wrap">
                    <label>Thumbnail (Author image handled in Author block)</label>
                    <p class="text-muted small m-0">If you want a blog cover set it later in meta or content (optional)</p>
                  </div>
                </div>

                <div class="input-wrap mt-3">
                  <label for="metaTitle">Meta Title</label>
                  <input id="metaTitle" name="meta_title" type="text" class="form-control" placeholder="Spiti Valley Blog" />
                </div>

                <div class="input-wrap mt-3">
                  <label for="metaDescription">Meta Description</label>
                  <textarea id="metaDescription" name="meta_description" rows="3" class="form-control"
                    placeholder="Short meta description for SEO"></textarea>
                </div>
              </div>

              <!-- 2. Author Block -->
              <div class="widget-dash-board">
                <h4 class="mb-3">2. Author</h4>

                <div class="d-flex gap-4 align-items-center">
                  <!-- Author Image (Option B) -->
                  <div class="text-center">
                    <label class="d-block mb-2">Author Image</label>
                    <div class="author-preview" id="authorPreview">
                      <!-- preview img inserted via JS -->
                      <img id="authorPreviewImg" src="/assets/images/default-avatar.png" alt="Author Image" />
                    </div>
                    <div class="mt-2">
                      <input type="file" id="authorImageInput" accept="image/*" style="display:none;">
                      <button type="button" class="btn btn-sm btn-outline-primary btn-small" id="btnChooseAuthorImage"><i class="fa fa-upload"></i> Choose</button>
                      <button type="button" class="btn btn-sm btn-outline-danger btn-small" id="btnRemoveAuthorImage"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                    <small class="text-muted d-block mt-2">Circle preview • JPG/PNG • max 2MB</small>
                  </div>

                  <!-- Author details -->
                  <div style="flex:1;">
                    <div class="grid-input-2 mb-3">
                      <div class="input-wrap">
                        <label for="authorName">Author Name</label>
                        <input id="authorName" name="author_name" type="text" class="form-control" placeholder="Rahul Sharma" />
                      </div>

                      <div class="input-wrap">
                        <label for="authorPassion">Passion / Title</label>
                        <input id="authorPassion" name="author_passion" type="text" class="form-control" placeholder="Adventure Rider" />
                      </div>
                    </div>

                    <div class="input-wrap">
                      <label for="authorDescription">Author Description</label>
                      <textarea id="authorDescription" name="author_description" rows="4" class="form-control"
                        placeholder="Short author bio or description"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <!-- 3. Content -->
              <div class="widget-dash-board">
                <h4 class="mb-2">3. Content</h4>
                <p class="editor-hint">Use the editor below — you can add images, videos, YouTube embeds, and raw HTML (iframes).</p>

                <div class="input-wrap mt-2">
                  <textarea id="contentEditor" name="content" rows="20"></textarea>
                </div>

                 <div class="top-actions my-3">
                <button type="button" hidden class="btn btn-outline-secondary btn-small" id="btnPreviewDraft"><i class="fa-solid fa-eye"></i> Preview</button>
                <button type="button" class=" btn-main-small" id="btnSaveBlog"><i class="fa-solid fa-save"></i> Save Blog</button>
              </div>
              </div>

             

            </form>
          </section>
        </main>

              @include('admin.components.footer')


      </div>
      <!-- /has-dashboard -->
    </div>
    <!-- /pagee -->
  </div>
  <!-- /wrapper -->

  <!-- libs -->
  <script src="/app/js/jquery.min.js"></script>
  <script src="/app/js/jquery.nice-select.min.js"></script>
  <script src="/app/js/bootstrap.min.js"></script>
  <script src="/app/js/plugin.js"></script>
  <script src="/app/js/main.js"></script>

  <!-- TinyMCE (we loaded earlier). TinyMCE configuration + upload handling will be added in PART 3. -->

  <script>
    // small client-side constants (JS wiring will be provided in PART 3)
    const APP_URL = "{{ config('app.url') }}";
  </script>
<script src="/app/js/tinymce/tinymce.min.js"></script>

  <!-- Minimal inline wiring to make basic UI interactive until PART 3 adds full behavior -->
  <script>
    document.getElementById("thumbnailInput").addEventListener("change", function() {
    const file = this.files[0];
    if (!file) return;

    const previewBox = document.getElementById("thumbnailPreviewBox");
    const previewImg = document.getElementById("thumbnailPreviewImg");

    const reader = new FileReader();
    reader.onload = function(e) {
        previewImg.src = e.target.result;
        previewBox.style.display = "block";
    };

    reader.readAsDataURL(file);
});

    // tags UI (basic)
    (function(){
      const tags = [];
      const tagsList = document.getElementById('tagsList');
      const tagNewInput = document.getElementById('tagNewInput');
      const btnAddTag = document.getElementById('btnAddTag');

      function renderTags() {
        tagsList.innerHTML = '';
        if(tags.length === 0) {
          tagsList.innerHTML = '<div class="text-muted small">No tags yet.</div>';
          return;
        }
        tags.forEach((t, i) => {
          const el = document.createElement('span');
          el.className = 'tag-pill';
          el.innerHTML = `<span>${t}</span><span class="remove-tag" data-index="${i}">&times;</span>`;
          tagsList.appendChild(el);
        });
        // attach removal
        tagsList.querySelectorAll('.remove-tag').forEach(node => {
          node.onclick = function(){
            const i = Number(this.dataset.index);
            tags.splice(i,1);
            renderTags();
          };
        });
      }

      function addTagFromInput() {
        const v = tagNewInput.value.trim();
        if(!v) return;
        if(!tags.includes(v)) tags.push(v);
        tagNewInput.value = '';
        renderTags();
      }

      btnAddTag.addEventListener('click', addTagFromInput);
      tagNewInput.addEventListener('keydown', function(e){
        if(e.key === 'Enter') {
          e.preventDefault();
          addTagFromInput();
        }
      });

      // expose small helper to window for PART 3
      window.__blogTagsHelper = {
        getTags: () => tags,
        setTags: (arr) => { tags.length = 0; tags.push(...arr); renderTags(); }
      };

      renderTags();
    })();

    // Author image preview (Option B)
    (function(){
      const previewImg = document.getElementById('authorPreviewImg');
      const input = document.getElementById('authorImageInput');
      const btnChoose = document.getElementById('btnChooseAuthorImage');
      const btnRemove = document.getElementById('btnRemoveAuthorImage');
      let uploadedAuthorFile = null; // will be used in PART 3 to append to formdata

      btnChoose.addEventListener('click', () => input.click());
      input.addEventListener('change', function(){
        const file = this.files && this.files[0];
        if(!file) return;
        if(!file.type.startsWith('image/')) { alert('Please choose an image file'); return; }
        const reader = new FileReader();
        reader.onload = (e) => {
          previewImg.src = e.target.result;
        };
        reader.readAsDataURL(file);
        uploadedAuthorFile = file;
        // expose to global
        window.__uploadedAuthorFile = uploadedAuthorFile;
      });

      btnRemove.addEventListener('click', () => {
        previewImg.src = '/assets/images/default-avatar.png';
        input.value = '';
        uploadedAuthorFile = null;
        window.__uploadedAuthorFile = null;
      });

      // expose getter
      window.__authorImageGetter = () => uploadedAuthorFile;
    })();

    // JSON Preview generator (simple)
    (function(){
      const btnGen = document.getElementById('btnGenerateJSON');
      const pre = document.getElementById('jsonPreview');
      const btnSubmitToApi = document.getElementById('btnSubmitToApi');

      btnGen.addEventListener('click', () => {
        const json = buildBlogJson();
        pre.textContent = JSON.stringify(json, null, 2);
      });

      // placeholder: actual submit will be wired in PART 3
      btnSubmitToApi.addEventListener('click', () => {
        document.getElementById('btnSaveBlog').click();
      });

      window.buildBlogJson = function() {
        const title = document.getElementById('blogTitle').value.trim();
        const reading_time = document.getElementById('readingTime').value.trim();
        const author = {
          name: document.getElementById('authorName').value.trim(),
          passion: document.getElementById('authorPassion').value.trim(),
          image: '', // will be filled server-side with uploaded path
          description: document.getElementById('authorDescription').value.trim()
        };
        // content will be pulled from TinyMCE in PART 3
        const content = (typeof tinymce !== 'undefined' && tinymce.get('contentEditor')) ? tinymce.get('contentEditor').getContent() : '';
        const tags = (window.__blogTagsHelper && window.__blogTagsHelper.getTags()) ? window.__blogTagsHelper.getTags() : [];
        const meta = {
          title: document.getElementById('metaTitle').value.trim(),
          description: document.getElementById('metaDescription').value.trim()
        };
        return {
          title, author, content, reading_time, tags, meta_description: meta
        };
      };
    })();
  </script>
    <script src="/app/js/admin-auth-guard.js"></script>

<!-- PART 3: JS - TinyMCE + Uploads + Form Submit -->
<script>
/*
  Requirements recap:
  - APP_URL constant must be set (e.g. window.APP_URL = "{{ config('app.url') }}")
  - Endpoints:
      POST  ${APP_URL}/api/editor/upload/image   (field name: file)
      POST  ${APP_URL}/api/editor/upload/video   (field name: file)
      DELETE ${APP_URL}/api/editor/delete        (JSON { path: "/storage/..." })
      POST  ${APP_URL}/api/blogs                 (multipart: 'blog' JSON + 'author_image' file)
*/

// -----------------------------
// Helper: fetch JSON wrapper
// -----------------------------
function fetchJSON(url, opts = {}) {
  return fetch(url, opts).then(async (res) => {
    const text = await res.text();
    try { return { ok: res.ok, status: res.status, data: JSON.parse(text) }; }
    catch (e) { return { ok: res.ok, status: res.status, data: text }; }
  });
}

// -----------------------------
// TinyMCE init with uploader
// -----------------------------
(function initTinyMCE(){
  if (typeof tinymce === 'undefined') {
    console.warn('tinymce not loaded');
    return;
  }

  // keep track of media currently in editor (to detect deletions)
  window.__editorMediaSet = new Set();

 tinymce.init({
    selector: "#contentEditor",
    license_key: "gpl",
    height: 650,
    menubar: true,
    branding: false,

    plugins: "lists link image media table code fullscreen wordcount",
    toolbar:
        "undo redo | bold italic underline | " +
        "alignleft aligncenter alignright alignjustify | " +
        "bullist numlist outdent indent | " +
        "image media link | code fullscreen",

    images_file_types: "jpg,jpeg,gif,png,webp",
    media_file_types: "mp4,webm,ogg",

    relative_urls: false,
    convert_urls: false,

    /* allow HTML like <iframe> */
    valid_elements: '*[*]',

    /* enable uploads */
    file_picker_types: "image media",

    file_picker_callback: function (callback, value, meta) {
        const input = document.createElement("input");
        input.type = "file";

        if (meta.filetype === "image") {
            input.accept = "image/*";
        } else if (meta.filetype === "media") {
            input.accept = "video/*";
        }

        input.onchange = async function () {
            const file = this.files[0];
            const form = new FormData();
            form.append("file", file);

            const endpoint =
                meta.filetype === "image"
                    ? `${APP_URL}/api/editor/upload-image`
                    : `${APP_URL}/api/editor/upload-video`;

            const res = await fetch(endpoint, {
                method: "POST",
                body: form,
            });

            const json = await res.json();
            callback(APP_URL +"/" +json.location, { alt: file.name });
        };

        input.click();
    },

    paste_data_images: true,
});
  // tinymce.init end

  // -----------------------------
  // MutationObserver to detect removed media and auto-upload pasted data-urls
  // -----------------------------
  // Wait until editor iframe is available
  function getEditorBody() {
    const ed = tinymce.get('contentEditor');
    if (!ed) return null;
    return ed.getBody();
  }

  // Convert current editor HTML to set of media URLs
  function extractMediaUrlsFromHtml(html) {
    if (!html) return [];
    const div = document.createElement('div');
    div.innerHTML = html;
    const urls = [];
    div.querySelectorAll('img, video, iframe, source').forEach(node => {
      const src = node.getAttribute('src') || node.getAttribute('data-src') || node.getAttribute('data-lazy-src');
      if (src) urls.push(src);
    });
    return urls;
  }

  // update global set from given HTML
  function updateEditorMediaSet(html) {
    const urls = extractMediaUrlsFromHtml(html);
    window.__editorMediaSet = new Set(urls);
  }

  // observe and react
  let lastHtmlSnapshot = '';
  function startEditorObserver() {
    const body = getEditorBody();
    if (!body) {
      setTimeout(startEditorObserver, 300);
      return;
    }

    const observer = new MutationObserver(async function(mutationsList) {
      // cheap approach: compare HTML snapshot
      const ed = tinymce.get('contentEditor');
      if (!ed) return;
      const html = ed.getContent({ format: 'html' });
      if (html === lastHtmlSnapshot) return;
      // compute removed URLs
      const previous = new Set([...window.__editorMediaSet || []]);
      const currentUrls = new Set(extractMediaUrlsFromHtml(html));
      // removed = previous - current
      const removed = [...previous].filter(x => !currentUrls.has(x));
      // new ones added
      const added = [...currentUrls].filter(x => !previous.has(x));

      // handle added data: or blob URLs by finding elements and uploading them
      // upload any <img src="data:..."> or <video> with source data:
      const div = document.createElement('div');
      div.innerHTML = html;
      const nodesToUpload = [];
      div.querySelectorAll('img, video').forEach(node => {
        const src = node.getAttribute('src') || '';
        if (src.startsWith('data:') || src.startsWith('blob:')) {
          nodesToUpload.push({ tag: node.tagName.toLowerCase(), src });
        }
      });

      // upload nodesToUpload: find the actual node in editor DOM to get File via clipboard? For data URLs we can convert to blob
      for (let nodeInfo of nodesToUpload) {
        try {
          if (nodeInfo.src.startsWith('data:')) {
            const blob = dataURLtoBlob(nodeInfo.src);
            const formData = new FormData();
            formData.append('file', blob, (nodeInfo.tag === 'img' ? 'pasted-image.jpg' : 'pasted-video.mp4'));
            const endpoint = nodeInfo.tag === 'img' ? `${APP_URL}/api/editor/upload/image` : `${APP_URL}/api/editor/upload/video`;
            const res = await fetchJSON(endpoint, { method: 'POST', body: formData });
            if (res.ok && res.data && res.data.url) {
              // replace the data: src in editor with real url
              const ed = tinymce.get('contentEditor');
              const editorDom = ed.getDoc();
              // find elements with matching src
              const allMedia = editorDom.querySelectorAll(nodeInfo.tag);
              allMedia.forEach(el => {
                if (el.src && el.src === nodeInfo.src) {
                  el.src = res.data.url;
                }
              });
              // update sets
              window.__editorMediaSet.add(res.data.url);
            }
          }
        } catch(err) {
          console.error('Auto-upload failed', err);
        }
      }

      // call delete API for removed urls
      if (removed.length) {
        removed.forEach(async (p) => {
          try {
            // only delete if path looks like our storage path
            if (String(p).startsWith('/storage/blogEditor/')) {
              await fetchJSON(`${APP_URL}/api/editor/delete`, {
                method: 'DELETE',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ path: p })
              });
            }
          } catch (e) {
            console.warn('Failed to delete media', p, e);
          }
        });
      }

      // update snapshot & set
      lastHtmlSnapshot = html;
      window.__editorMediaSet = currentUrls;
      // also update JSON preview live
      updateJsonPreview();
    });

    observer.observe(body, { childList: true, subtree: true, attributes: true, characterData: true });
  }

  // helper: convert dataURL to blob
  function dataURLtoBlob(dataURL) {
    const arr = dataURL.split(',');
    const mime = arr[0].match(/:(.*?);/)[1];
    const bstr = atob(arr[1]);
    let n = bstr.length;
    const u8arr = new Uint8Array(n);
    while(n--){
      u8arr[n] = bstr.charCodeAt(n);
    }
    return new Blob([u8arr], { type: mime });
  }

  // wait for the editor to be ready
  startEditorObserver();

})(); // initTinyMCE end


// -----------------------------
// Tags + Author image getter already wired in PART1; add upload-on-submit & final form submit
// -----------------------------
(function wireFormSubmit() {
  const btnSave = document.getElementById('btnSaveBlog');
  const btnPreviewDraft = document.getElementById('btnPreviewDraft');

  // Get author file from PART1 helper
  function getAuthorFile() {
    if (typeof window.__authorImageGetter === 'function') {
      return window.__authorImageGetter();
    }
    return null;
  }

  // Validate minimal fields
  function validate(blogJson) {
    const errors = [];
    if (!blogJson.title || blogJson.title.length < 3) errors.push('Title is required (min 3 chars).');
    if (!blogJson.content || blogJson.content.trim().length < 10) errors.push('Content is required (min 10 chars).');
    if (!blogJson.author || !blogJson.author.name) errors.push('Author name is required.');
    return errors;
  }

  // Build blog JSON object (same shape you requested)
  async function buildBlogJson() {
    const title = document.getElementById('blogTitle').value.trim();
    const reading_time = document.getElementById('readingTime').value.trim();
    const tags = (window.__blogTagsHelper && window.__blogTagsHelper.getTags()) ? window.__blogTagsHelper.getTags() : [];
    const meta_description = {
      title: document.getElementById('metaTitle').value.trim(),
      description: document.getElementById('metaDescription').value.trim()
    };
    const author = {
      name: document.getElementById('authorName').value.trim(),
      passion: document.getElementById('authorPassion').value.trim(),
      image: '', // server will set after we upload author_image file
      description: document.getElementById('authorDescription').value.trim()
    };
    const content = (typeof tinymce !== 'undefined' && tinymce.get('contentEditor')) ? tinymce.get('contentEditor').getContent() : document.getElementById('contentEditor').value;

    return { title, author, content, reading_time, tags, meta_description };
  }

  // Show JSON preview
  async function updateJsonPreview() {
    const pre = document.getElementById('jsonPreview');
    const json = await buildBlogJson();
    pre.textContent = JSON.stringify(json, null, 2);
  }

  // Preview draft (open a new window with the content)
  btnPreviewDraft.addEventListener('click', async function () {
    const blogJson = await buildBlogJson();
    // quick preview: open new window and show title + content inside simple html
    const w = window.open('', '_blank');
    const html = `
      <!doctype html>
      <html>
        <head><meta charset="utf-8"><title>${escapeHtml(blogJson.title)}</title></head>
        <body style="font-family:system-ui, -apple-system, Roboto, 'Helvetica Neue', Arial; padding:30px; max-width:900px; margin:0 auto;">
          <h1>${escapeHtml(blogJson.title)}</h1>
          <p><strong>By:</strong> ${escapeHtml(blogJson.author.name)} — ${escapeHtml(blogJson.author.passion)}</p>
          <div>${blogJson.content}</div>
        </body>
      </html>
    `;
    w.document.open();
    w.document.write(html);
    w.document.close();
  });

  // Submit: upload author image (if any) then send blog JSON and author_image as multipart
  btnSave.addEventListener('click', async function () {
    try {
      // disable button
      btnSave.disabled = true;
      btnSave.innerHTML = `<i class="fa fa-spinner fa-spin"></i> Saving...`;

      const blogJson = await buildBlogJson();
      const errors = validate(blogJson);
      if (errors.length) {
        Swal.fire('Validation failed', errors.join('<br>'), 'error');
        btnSave.disabled = false;
        btnSave.innerHTML = `<i class="fa-solid fa-save"></i> Save Blog`;
        return;
      }

      // Build FormData
      const fd = new FormData();
      fd.append('blog', JSON.stringify(blogJson));
      const thumbnailInput = document.getElementById("thumbnailInput");
      if (thumbnailInput.files[0]) {
          fd.append("thumbnail", thumbnailInput.files[0]);
      }

      // attach author image file if present
      const authorFile = getAuthorFile();
      if (authorFile) fd.append('author_image', authorFile, authorFile.name || 'author_image.jpg');

      // send
      const response = await fetchJSON(`${APP_URL}/api/blogs`, { method: 'POST', body: fd });
      if (!response.ok) {
        const message = (response.data && response.data.message) ? response.data.message : `Server responded ${response.status}`;
        Swal.fire('Failed', message, 'error');
        console.log(response);
        
        btnSave.disabled = false;
        btnSave.innerHTML = `<i class="fa-solid fa-save"></i> Save Blog`;
        return;
      } 

      Swal.fire({
        icon: 'success',
        title: 'Saved',
        text: 'Blog saved successfully.',
        showConfirmButton: true
      }).then(() => {
        // optionally redirect to edit page / list
        // e.g. window.location = `${APP_URL}/admin/blogs`;
      });

      // reset UI state as desired
    } catch (err) {
      console.error(err);
      Swal.fire('Error', err.message || 'Unknown error', 'error');
    } finally {
      btnSave.disabled = false;
      btnSave.innerHTML = `<i class="fa-solid fa-save"></i> Save Blog`;
    }
  });

  // Utility: escape HTML (preview)
  function escapeHtml(str) {
    if (!str) return '';
    return String(str).replace(/[&<>"'`=\/]/g, function(s){ return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;','/':'&#x2F;','`':'&#x60;','=':'&#x3D;'})[s]; });
  }

  // expose updateJsonPreview for mutation code
  window.updateJsonPreview = updateJsonPreview;
  // initial preview
  updateJsonPreview();

})(); // end wireFormSubmit
</script>

</body>

</html>
