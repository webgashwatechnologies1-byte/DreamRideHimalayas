{{-- resources/views/admin/pages/blog/edit.blade.php --}}
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
  <meta charset="utf-8" />
  <title>Edit Blog - Travel & Tour Booking Admin</title>
  <meta name="author" content="themesflat.com" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Styles (use your existing theme files) -->
  <link rel="stylesheet" href="/app/css/app.css" />
  <link rel="stylesheet" href="/app/css/map.min.css" />
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" /> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- TinyMCE core -->
  <script src="/app/js/tinymce/tinymce.min.js"></script>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    /* Page-specific styles (same as Add page) */
    .author-preview { width:120px; height:120px; border-radius:999px; border:2px solid #e6e6e6; overflow:hidden; display:inline-flex; align-items:center; justify-content:center; background:#fff; }
    .author-preview img { width:100%; height:100%; object-fit:cover; }
    .input-wrap label { font-weight:600; margin-bottom:6px; display:block; }
    .tag-pill { display:inline-flex; align-items:center; gap:8px; padding:6px 10px; border-radius:999px; background:#f1f5f9; border:1px solid #e2e8f0; margin:6px 6px 0 0; }
    .tag-pill .remove-tag { cursor:pointer; color:#e11d48; margin-left:6px; }
    .tags-input { min-height:56px; padding:8px; border:1px dashed #e6e6e6; border-radius:8px; background:#fff; }
    .widget-dash-board { background:#fff; padding:18px; border-radius:8px; border:1px solid #eef2f6; margin-bottom:24px; }
    .btn-small { padding:6px 10px; font-size:13px; border-radius:6px; }

    /* thumbnail preview full width handling */
    #thumbnailPreviewBox img { width:100%; display:block; height:auto; max-height:420px; object-fit:cover; border-radius:10px; border:1px solid #e3e3e3; }

    /* global loader helper (hidden by default) */
    .global-loader { position:fixed; inset:0; display:flex; align-items:center; justify-content:center; background: rgba(0,0,0,0.35); z-index:99999; }
    .global-loader.hidden { display:none; }
    .loader-circle { width:84px; height:84px; border-radius:50%; border:8px solid rgba(255,255,255,0.14); border-top-color:#fff; animation: spin 1s linear infinite; }
    @keyframes spin { to { transform: rotate(360deg); } }

  </style>
</head>

<body class="body header-fixed">

  <div id="wrapper">
    <div id="pagee" class="clearfix">

      {{-- sidebar/header --}}
      @include('admin.components.sidebar')
      <div class="has-dashboard">
        <header class="main-header flex">
          @include('admin.components.header')
        </header>

        <main id="main">
          <section class="profile-dashboard">
            <div class="inner-header mb-40">
              <h3 class="title">Edit Blog</h3>
            </div>

            {{-- include loader component (must contain the loader element with id #globalLoader) --}}
           <div id="globalLoader" class="hidden">
            @include('components.loader')
           </div>

            <!-- Main form -->
            <form id="form-edit-blog" class="form-add-blog" enctype="multipart/form-data" onsubmit="return false;">
              <!-- 1. Basic Info -->
              <div class="widget-dash-board">
                <h4 class="mb-3">1. Basic Information</h4>

                <div class="grid-input-2 mb-3">
                  <!-- PREVIEW BOX -->
                  <div id="thumbnailPreviewBox" style="margin-top:15px; display:none;">
                    <img id="thumbnailPreviewImg" src="" alt="Thumbnail preview">
                  </div>

                  <div class="input-wrap mt-3">
                    <label for="thumbnail">Blog Thumbnail</label>
                    <input type="file" id="thumbnailInput" name="thumbnail" class="form-control" accept="image/*">
                    <small class="text-muted">Supported: JPG, PNG, WEBP</small>
                    <div id="thumbnailRemoveWrap" style="margin-top:8px; display:none;">
                      <button type="button" class="btn btn-sm btn-outline-danger btn-small" id="btnRemoveThumbnail"><i class="fa fa-trash"></i> Remove Thumbnail</button>
                    </div>
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
                    <label for="metaTitle">Meta Title</label>
                    <input id="metaTitle" name="meta_title" type="text" class="form-control" placeholder="Spiti Valley Blog" />
                    <div style="height:12px"></div>
                    <label for="metaDescription">Meta Description</label>
                    <textarea id="metaDescription" name="meta_description" rows="3" class="form-control" placeholder="Short meta description for SEO"></textarea>
                  </div>
                </div>
              </div>

              <!-- 2. Author Block -->
              <div class="widget-dash-board">
                <h4 class="mb-3">2. Author</h4>

                <div class="d-flex gap-4 align-items-center">
                  <!-- Author Image -->
                  <div class="text-center">
                    <label class="d-block mb-2">Author Image</label>
                    <div class="author-preview" id="authorPreview">
                      <img id="authorPreviewImg" src="/assets/images/default-avatar.png" alt="Author image">
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
                      <textarea id="authorDescription" name="author_description" rows="4" class="form-control" placeholder="Short author bio or description"></textarea>
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
                  <button type="button" class="my-4 btn-main-small" id="btnSaveBlog"><i class="fa-solid fa-save"></i> SAVE CHANGES</button>
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

  {{-- Ensure TinyMCE included once --}}
  <script src="/app/js/tinymce/tinymce.min.js"></script>
    <script src="/app/js/admin-auth-guard.js"></script>

  <script>
    // Server base URL
    const APP_URL = "{{ config('app.url') }}";
    // Blog ID from route compact('id')
    const BLOG_ID = {{ (int) $id }};
  </script>

  <!-- Minimal helpers and UI wiring -->
  <script>
    // small fetch wrapper to return structured result
    function fetchJSON(url, opts = {}) {
      return fetch(url, opts).then(async res => {
        const text = await res.text();
        try { return { ok: res.ok, status: res.status, data: JSON.parse(text) }; }
        catch(e) { return { ok: res.ok, status: res.status, data: text }; }
      });
    }

    // loader functions (shows/hides element included by components.loader)
    function showLoader(){
      const el = document.getElementById('globalLoader');
      if(el) el.classList.remove('hidden');
    }
    function hideLoader(){
      const el = document.getElementById('globalLoader');
      if(el) el.classList.add('hidden');
    }

    // tags helper (same as Add)
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
        tagsList.querySelectorAll('.remove-tag').forEach(node => {
          node.onclick = function(){ const i = Number(this.dataset.index); tags.splice(i,1); renderTags(); };
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
      tagNewInput.addEventListener('keydown', function(e){ if(e.key === 'Enter'){ e.preventDefault(); addTagFromInput(); } });

      window.__blogTagsHelper = {
        getTags: () => tags,
        setTags: (arr) => { tags.length = 0; tags.push(...arr||[]); renderTags(); }
      };

      renderTags();
    })();

    // Author image preview & getter
    (function(){
      const previewImg = document.getElementById('authorPreviewImg');
      const input = document.getElementById('authorImageInput');
      const btnChoose = document.getElementById('btnChooseAuthorImage');
      const btnRemove = document.getElementById('btnRemoveAuthorImage');
      let uploadedAuthorFile = null;

      btnChoose.addEventListener('click', () => input.click());
      input.addEventListener('change', function(){
        const file = this.files && this.files[0];
        if(!file) return;
        if(!file.type.startsWith('image/')) { alert('Please choose an image file'); return; }
        const reader = new FileReader();
        reader.onload = (e) => { previewImg.src = e.target.result; };
        reader.readAsDataURL(file);
        uploadedAuthorFile = file;
        window.__uploadedAuthorFile = uploadedAuthorFile;
      });

      btnRemove.addEventListener('click', () => {
        previewImg.src = '/assets/images/default-avatar.png';
        input.value = '';
        uploadedAuthorFile = null;
        window.__uploadedAuthorFile = null;
      });

      window.__authorImageGetter = () => uploadedAuthorFile;
    })();

    // Thumbnail preview handling
    (function(){
      const input = document.getElementById('thumbnailInput');
      const previewBox = document.getElementById('thumbnailPreviewBox');
      const previewImg = document.getElementById('thumbnailPreviewImg');
      const removeWrap = document.getElementById('thumbnailRemoveWrap');
      const btnRemove = document.getElementById('btnRemoveThumbnail');
      let uploadedThumbFile = null;

      input.addEventListener('change', function(){
        const file = this.files && this.files[0];
        if(!file) return;
        if(!file.type.startsWith('image/')) { alert('Please choose an image file'); return; }
        const reader = new FileReader();
        reader.onload = function(e){
          previewImg.src = e.target.result;
          previewBox.style.display = 'block';
          removeWrap.style.display = 'block';
        };
        reader.readAsDataURL(file);
        uploadedThumbFile = file;
        window.__uploadedThumbnailFile = uploadedThumbFile;
      });

      btnRemove.addEventListener('click', function(){
        previewImg.src = '';
        previewBox.style.display = 'none';
        removeWrap.style.display = 'none';
        input.value = '';
        uploadedThumbFile = null;
        window.__uploadedThumbnailFile = null;
      });

      window.__thumbnailGetter = () => uploadedThumbFile;
    })();

    // TinyMCE init (compatible with TinyMCE 8)
  (function initTinyMCE(){
  if(typeof tinymce === 'undefined') return;

  tinymce.init({
    selector: '#contentEditor',
    license_key: 'gpl',
    height: 650,
    menubar: true,
    branding: false,
    plugins: 'lists link image media table code fullscreen wordcount paste',
    toolbar: 'undo redo | fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image media link | removeformat | code fullscreen',
    fontsize_formats: '10px 12px 14px 16px 18px 24px 36px',
    image_title: true,
    relative_urls: false,
    convert_urls: false,
    valid_elements: '*[*]',
    file_picker_types: 'image media',
    paste_data_images: true,

    setup: function(editor) {
      editor.on("init", function () {

        // ⬇️ HERE WE FINALLY SET THE CONTENT SAFELY
        if (window.__BLOG_CONTENT__) {
          editor.setContent(window.__BLOG_CONTENT__);
        }

        // track media
        try {
          window.__editorMediaSet = new Set(
            Array.from(editor.getBody().querySelectorAll('img,video,iframe'))
                 .map(el => el.src)
          );
        } catch(e){}
      });

      editor.on('change input undo redo', function () {
        try { updateJsonPreview(); } catch(e){}
      });
    },

    file_picker_callback: async function(callback, value, meta) {
      const input = document.createElement('input');
      input.type = 'file';
      if(meta.filetype === 'image') input.accept = 'image/*';
      else input.accept = 'video/*';

      input.onchange = async function() {
        const file = this.files[0];
        const fd = new FormData();
        fd.append("file", file);

        const endpoint = meta.filetype === "image"
          ? `${APP_URL}/api/editor/upload-image`
          : `${APP_URL}/api/editor/upload-video`;

        const res = await fetch(endpoint, { method: "POST", body: fd });
        const json = await res.json();

        let url = json.location || json.url || json.data?.url;
        if (!url) return alert("Upload failed");

        if (url.charAt(0) !== "/") url = "/" + url;

        callback(APP_URL + url, { alt: file.name });
      };

      input.click();
    }
  });

})();


    // Wait helper
    function wait(ms){ return new Promise(r=>setTimeout(r,ms)); }

    // Load blog data and prefill form
    (async function loadBlog(){
      try {
        showLoader();
        const res = await fetchJSON(`${APP_URL}/api/blogs/${BLOG_ID}`);
        if(!res.ok) {
          hideLoader();
          Swal.fire('Error', `Failed to load blog (status ${res.status})`, 'error');
          return;
        }
        const blog = res.data;
        // Prefill fields
        document.getElementById('blogTitle').value = blog.title || '';
        document.getElementById('readingTime').value = blog.reading_time || '';
        document.getElementById('metaTitle').value = (blog.meta_description && blog.meta_description.title) ? blog.meta_description.title : '';
        document.getElementById('metaDescription').value = (blog.meta_description && blog.meta_description.description) ? blog.meta_description.description : '';
        // tags
        window.__blogTagsHelper.setTags(blog.tags || []);
        // description
        window.__BLOG_CONTENT__ = blog.content || "";

        // author
        if(blog.author) {
          document.getElementById('authorName').value = blog.author.name || '';
          document.getElementById('authorPassion').value = blog.author.passion || '';
          document.getElementById('authorDescription').value = blog.author.description || '';
          if(blog.author.image) {
            // ensure full URL
            let aimg = blog.author.image;
            if(!/^https?:\/\//i.test(aimg) && aimg.charAt(0) !== '/') aimg = '/' + aimg;
            document.getElementById('authorPreviewImg').src = (aimg.startsWith('/storage') ? APP_URL + aimg : aimg);
            // clear any uploadedAuthorFile because existing image is server-side
            window.__uploadedAuthorFile = null;
          }
        }

        // thumbnail
        if(blog.thumbnail) {
          let t = blog.thumbnail;
          if(!/^https?:\/\//i.test(t) && t.charAt(0) !== '/') t = '/' + t;
          document.getElementById('thumbnailPreviewImg').src = (t.startsWith('/storage') ? APP_URL + t : t);
          document.getElementById('thumbnailPreviewBox').style.display = 'block';
          document.getElementById('thumbnailRemoveWrap').style.display = 'block';
          // we'll treat this as server-side thumbnail unless user replaces it
          window.__uploadedThumbnailFile = null;
        }

        // content into TinyMCE when ready
      
      } catch(err) {
        console.error('Failed to load blog', err);
        Swal.fire('Error', 'Failed to load blog data', 'error');
      } finally {
        hideLoader();
      }
    })();

    // Preview button behaviour
    document.getElementById('btnPreviewDraft').addEventListener('click', async function(){
      const blogJson = await buildBlogJsonSync();
      const w = window.open('', '_blank');
      const html = `
        <!doctype html><html><head><meta charset="utf-8"><title>${escapeHtml(blogJson.title)}</title></head>
        <body style="font-family:system-ui, -apple-system, Roboto, 'Helvetica Neue', Arial; padding:30px; max-width:900px; margin:0 auto;">
          <h1>${escapeHtml(blogJson.title)}</h1>
          <p><strong>By:</strong> ${escapeHtml(blogJson.author.name)} — ${escapeHtml(blogJson.author.passion)}</p>
          <div>${blogJson.content}</div>
        </body></html>`;
      w.document.open(); w.document.write(html); w.document.close();
    });

    // Build blog JSON (reads tinymce content synchronously)
    function buildBlogJsonSync() {
      const title = document.getElementById('blogTitle').value.trim();
      const reading_time = document.getElementById('readingTime').value.trim();
      const tags = (window.__blogTagsHelper && window.__blogTagsHelper.getTags()) ? window.__blogTagsHelper.getTags() : [];
      const meta_description = { title: document.getElementById('metaTitle').value.trim(), description: document.getElementById('metaDescription').value.trim() };
      const author = { name: document.getElementById('authorName').value.trim(), passion: document.getElementById('authorPassion').value.trim(), image: '', description: document.getElementById('authorDescription').value.trim() };
      const content = (typeof tinymce !== 'undefined' && tinymce.get('contentEditor')) ? tinymce.get('contentEditor').getContent() : document.getElementById('contentEditor').value;
      return { title, author, content, reading_time, tags, meta_description };
    }

    // Save handler (bound to Save Blog button)
    document.getElementById('btnSaveBlog').addEventListener('click', async function(){
      const btn = this;
      try {
        // basic validation
        const jsonPreview = buildBlogJsonSync();
        const errors = [];
        if(!jsonPreview.title || jsonPreview.title.length < 3) errors.push('Title is required (min 3 chars).');
        if(!jsonPreview.content || jsonPreview.content.trim().length < 10) errors.push('Content is required (min 10 chars).');
        if(!jsonPreview.author || !jsonPreview.author.name) errors.push('Author name is required.');
        if(errors.length) {
          Swal.fire('Validation failed', errors.join('<br>'), 'error');
          return;
        }

        // UI: show loader + disable
        showLoader();
        btn.disabled = true;
        const originalHTML = btn.innerHTML;
        btn.innerHTML = `<i class="fa fa-spinner fa-spin"></i> Saving...`;

        // Build FormData - use POST with _method=PUT so Laravel receives files correctly
        const fd = new FormData();
        fd.append('_method', 'PUT'); // Laravel fallback for file uploads on update
        fd.append('blog', JSON.stringify(jsonPreview));

        // thumbnail file (if user selected a new one)
        const thumb = window.__thumbnailGetter ? window.__thumbnailGetter() : null;
        if(thumb) fd.append('thumbnail', thumb, thumb.name || 'thumbnail.jpg');

        // author image (if user selected a new one)
        const authorFile = window.__authorImageGetter ? window.__authorImageGetter() : null;
        if(authorFile) fd.append('author_image', authorFile, authorFile.name || 'author.jpg');

        // send to update endpoint (POST with _method=PUT)
        const response = await fetchJSON(`${APP_URL}/api/blogs/${BLOG_ID}`, {
          method: 'POST',
          body: fd
        });

        if(!response.ok) {
          const message = (response.data && response.data.message) ? response.data.message : `Server responded ${response.status}`;
          Swal.fire('Failed', message, 'error');
          return;
        }

        Swal.fire({ icon:'success', title:'Saved', text:'Blog updated successfully.' });

      } catch(err) {
        console.error(err);
        Swal.fire('Error', err.message || 'Unexpected error', 'error');
      } finally {
        hideLoader();
        btn.disabled = false;
        btn.innerHTML = `<i class="fa-solid fa-save"></i> Save Blog`;
      }
    });

    // helper: escape HTML
    function escapeHtml(str){ if(!str) return ''; return String(str).replace(/[&<>"'`=\/]/g, function(s){ return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;','/':'&#x2F;','`':'&#x60;','=':'&#x3D;'})[s]; }); }

  </script>

</body>
</html>
