<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Gallery | Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="/app/css/app.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <script src="https://kit.fontawesome.com/a2d5a3b9b3.js" crossorigin="anonymous"></script>
  {!! ToastMagic::styles() !!}

  <style>
   /* ACTION BAR 
   /* GRID — keep centered and readable */
#galleryContainer {
  max-width: 1200px;
  margin: 24px auto;
  padding: 0 12px;
}

/* keep grid columns stable */
.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 25px;
  align-items: start;
}

/* CARD — create stacking context and constrain width */
.gallery-item {
  position: relative;
  overflow: hidden;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.06);
}

/* IMAGE — block-level, not covering the actions */
.gallery-item img {
  display: block;
  width: 100%;
  height: 220px;
  object-fit: cover;
  position: relative;
  z-index: 1;
}

/* META (title/subtitle) — below image */
.gallery-meta {
  padding: 12px 14px;
  background: #fff;
  position: relative;
  z-index: 2;
}

/* INDEX BADGE */
.gallery-index {
  position: absolute;
  top: 12px;
  left: 12px;
  background: #111;
  color: #fff;
  padding: 4px 8px;
  border-radius: 6px;
  z-index: 10;
  font-size: 13px;
}

/* ACTIONS WRAPPER — move to top-right and always visible */
.gallery-actions {
  position: absolute;
  top: 10px;
  right: 10px;
  display: flex;
  gap: 8px;
  z-index: 20;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.5s ease;
}

.gallery-item:hover .gallery-actions {
  opacity: 1;
  visibility: visible;
}

/* Each button: small circular pill that's obvious on any background */
.gallery-actions button {
  background: rgba(0,0,0,0.6);
  border: 0;
  color: #fff;
  width: 38px;
  height: 38px;
  border-radius: 8px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
  transition: transform .12s ease, background .12s ease;
}
.gallery-actions button:hover { transform: scale(1.06); }
.btn-edit:hover   { background: rgba(0,180,255,0.85); }
.btn-index:hover  { background: rgba(255,193,7,0.9); color: #111; }
.btn-delete:hover { background: rgba(255,77,77,0.95); }

/* make icons slightly bigger for clarity */
.gallery-actions button i { font-size: 16px; }

/* mobile tweaks */
@media (max-width: 600px) {
  .gallery-item img { height: 180px; }
  .gallery-actions button { width: 36px; height: 36px; }
}

    /* ===============================
       UPLOAD BOX
    ================================*/
    .upload-box {
      text-align: center;
      border: 2px dashed #ccc;
      border-radius: 12px;
      padding: 40px 20px;
      margin: 40px auto;
      max-width: 500px;
      color: #666;
      transition: 0.3s ease;
    }

    .upload-box:hover {
      background: #fafafa;
      border-color: #666;
      color: #000;
    }

    .upload-box i {
      font-size: 40px;
      color: #444;
      margin-bottom: 10px;
    }

    .upload-box span {
      display: block;
      margin-top: 8px;
      font-size: 15px;
      color: #555;
    }

  
  </style>
</head>

<body class="body header-fixed">
  <div id="wrapper">
    <div id="pagee" class="clearfix">
      @include('admin.components.sidebar')
      <div class="has-dashboard">
        @include('admin.components.header')

        <main id="main">
          <section class="profile-dashboard">
            <div class="inner-header mb-40 d-flex justify-content-between align-items-center">
              <div>
                <h3 class="title">Gallery</h3>
                <p class="des">Manage your image gallery — upload, edit or delete instantly.</p>
              </div>
            </div>

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
          </section>
        </main>

        <footer class="footer footer-dashboard">
          <div class="tf-container full">
            <p class="text-white">Made with ❤️ by Gashwa Technologies.</p>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/a2d5a3b9b3.js" crossorigin="anonymous"></script>

  <script src="/app/js/jquery.min.js"></script>
  {!! ToastMagic::scripts() !!}

  <script>
    const APP_URL = "{{ config('app.url') }}".replace(/\/+$/, '');
    const toast = new ToastMagic();
    let images = [];

    // 🔹 Load Gallery
    async function loadGallery() {
      const container = $('#galleryContainer');
      container.html(`<p class="text-center text-muted">Loading gallery...</p>`);

      try {
        const res = await fetch(`${APP_URL}/api/gallery`);
        const data = await res.json();

        if (!data.status || !data.data.length) {
          container.html(`<p class="text-center text-muted">No images uploaded yet.</p>`);
          return;
        }

        images = data.data;
        renderGallery();
      } catch (err) {
        console.error(err);
        container.html(`<p class="text-center text-danger">Failed to load gallery.</p>`);
      }
    }

    // 🔹 Render Gallery
  function renderGallery() {
  const container = $('#galleryContainer');
  container.empty();

  images.forEach(img => {
    const titleHtml = img.title ? `<p class="title">${escapeHtml(img.title)}</p>` : '';
    const subtitleHtml = img.subtitle ? `<p class="subtitle">${escapeHtml(img.subtitle)}</p>` : '';

    const card = $(`
      <div class="gallery-item" data-id="${img.id}">
        <span class="gallery-index">#${img.index ?? '-'}</span>

        <img src="${APP_URL}/${img.url}" alt="Gallery Image">

        <!-- action buttons — top right -->
        <div class="gallery-actions" aria-hidden="false">
          <button class="btn-edit"><i class="fa-solid fa-pen-to-square"></i> </button>
          <button class="btn-index"><i class="fa-solid fa-list-ol"></i></button>
          <button class="btn-delete"><i class="fa-solid fa-trash"></i></button>
        </div>

        <!-- meta below image -->
        <div class="gallery-meta">
          ${titleHtml}
          ${subtitleHtml}
        </div>
      </div>
    `);

    container.append(card);
  });
}


// small helper to avoid XSS in inserted text
function escapeHtml(str) {
  if (!str) return '';
  return String(str)
    .replace(/&/g, '&amp;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#39;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;');
}


    // 🔹 Upload
    $('#uploadImage').on('change', async function() {
      const file = this.files[0];
      if (!file) return;
      this.value = '';

      const { value: formValues } = await Swal.fire({
          title: 'Upload Image Details',
          html: `
            <input id="swal-index" type="number" class="swal2-input" placeholder="Index (optional)">
            <input id="swal-title" type="text" class="swal2-input" placeholder="Title (optional)">
            <input id="swal-subtitle" type="text" class="swal2-input" placeholder="Subtitle (optional)">
          `,
          focusConfirm: false,
          showCancelButton: true,
          preConfirm: () => {
            return {
              index: document.getElementById('swal-index').value,
              title: document.getElementById('swal-title').value,
              subtitle: document.getElementById('swal-subtitle').value
            }
          }
        });

        if (!formValues) return;

        const formData = new FormData();
        formData.append('image', file);

        if (formValues.index) formData.append('index', formValues.index);
        if (formValues.title) formData.append('title', formValues.title);
        if (formValues.subtitle) formData.append('subtitle', formValues.subtitle);

      try {
        const res = await fetch(`${APP_URL}/api/gallery`, { method: 'POST', body: formData });
        const data = await res.json();
        if (data.status) {
          toast.success('Uploaded!', 'Image added successfully.');
          loadGallery();
        } else {
          toast.error('Error', data.message || 'Upload failed.');
        }
      } catch {
        toast.error('Error', 'Upload failed.');
      }
    });

    // 🔹 Replace
  $(document).on('click', '.btn-edit', function () {
            const id = $(this).closest('.gallery-item').data('id');
            const img = images.find(i => i.id === id);

            Swal.fire({
              title: 'Update Image Details',
              html: `
                <input id="swal-title" type="text" class="swal2-input" placeholder="Title" value="${img.title ?? ''}">
                <input id="swal-subtitle" type="text" class="swal2-input" placeholder="Subtitle" value="${img.subtitle ?? ''}">
                <label style="margin-top:10px;">Replace image:</label>
                <input id="swal-image" type="file" accept="image/*" class="swal2-file">
              `,
              showCancelButton: true,
              confirmButtonText: 'Update',
              preConfirm: () => {
                return {
                  title: document.getElementById('swal-title').value,
                  subtitle: document.getElementById('swal-subtitle').value,
                  file: document.getElementById('swal-image').files[0]
                        }
                      }
                    }).then(async (result) => {
                      if (!result.value) return;

                      const formData = new FormData();
                      formData.append('title', result.value.title);
                      formData.append('subtitle', result.value.subtitle);

                      if (result.value.file) {
                        formData.append('image', result.value.file);
                      }

            const res = await fetch(`${APP_URL}/api/gallery/${id}`, {
              method: 'POST',
              headers: { 'X-HTTP-Method-Override': 'PUT' },
              body: formData
            });

            const data = await res.json();
            if (data.status) {
              toast.success('Updated!', 'Gallery updated successfully.');
              loadGallery();
            }
          });
        });


    // 🔹 Change Index
    $(document).on('click', '.btn-index', async function() {
      const id = $(this).closest('.gallery-item').data('id');
      const img = images.find(i => i.id === id);

      const { value: newIndex } = await Swal.fire({
        title: 'Change Image Index',
        input: 'number',
        inputValue: img?.index || '',
        inputAttributes: { min: 1 },
        showCancelButton: true,
        confirmButtonText: 'Update'
      });

      if (!newIndex) return;
      const res = await fetch(`${APP_URL}/api/gallery/${id}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ index: newIndex })
      });
      const data = await res.json();

      if (data.status) {
        toast.success('Updated!', 'Index updated successfully.');
        loadGallery();
      } else {
        toast.error('Error', 'Failed to update index.');
      }
    });

    // 🔹 Delete
    $(document).on('click', '.btn-delete', async function() {
      const id = $(this).closest('.gallery-item').data('id');
      const confirm = await Swal.fire({
        title: 'Delete this image?',
        text: 'This cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
      });
      if (confirm.isConfirmed) {
        const res = await fetch(`${APP_URL}/api/gallery/${id}`, { method: 'DELETE' });
        const data = await res.json();
        if (data.status) {
          toast.success('Deleted!', 'Image removed successfully.');
          loadGallery();
        } else {
          toast.error('Error', 'Failed to delete image.');
        }
      }
    });

    $(document).ready(() => loadGallery());
  </script>
</body>
</html>
