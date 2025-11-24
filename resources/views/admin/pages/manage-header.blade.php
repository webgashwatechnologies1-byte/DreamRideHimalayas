<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Manage Header & Topbar — DreamRide (Yellow + White)</title>

<!-- Icons & SweetAlert (JS will use SweetAlert for confirmations) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <!-- Theme CSS -->
  <link rel="stylesheet" href="/app/css/app.css">
  <link rel="stylesheet" href="/app/css/map.min.css">

  <!-- Optional: Bootstrap & Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<!-- NOTE: include SweetAlert script in Part 2 or just before the closing body tag -->
<style>
  :root{
    --yellow: #ffc107;
    --dark: #081E2A;
    --muted: #6b7280;
    --white: #ffffff;
    --radius-pill: 30px;
    --header-height: 82px;
    --topbar-height: 44px;
    --font-sans: "Helvetica Neue", Arial, sans-serif;
    --card-radius: 10px;
    --shadow: 0 12px 40px rgba(16,24,40,0.06);
  }

  /* ---------- Base ---------- */
  html,body{ height:100%; }
  body{
    font-family: var(--font-sans);
    margin:0;
    padding:24px;
    background:#f3f4f6;
    color:var(--dark);
    -webkit-font-smoothing:antialiased;
    -moz-osx-font-smoothing:grayscale;
  }

  .page-wrap{
    max-width:1300px;
    margin: 0 auto;
    display:grid;
    grid-template-columns: 420px 1fr;
    gap:20px;
    align-items:start;
  }

  /* Left column = Form & tools */
  .panel {
    background: #fff;
    border-radius: var(--card-radius);
    padding:16px;
    box-shadow: var(--shadow);
    border: 1px solid rgba(2,6,23,0.04);
  }

  .panel h2 {
    margin:0 0 12px 0;
    font-size:18px;
    font-weight:700;
  }

  .small-muted { color:var(--muted); font-size:13px; margin-top:6px; }

  /* ---------- CREATE FORM ---------- */
  .form-row { display:flex; gap:8px; margin-top:12px; }
  .form-row .col { flex:1; }
  label { display:block; font-weight:700; font-size:13px; margin-bottom:6px; }
  input[type="text"], input[type="number"], select {
    width:100%;
    padding:10px 12px;
    border-radius:8px;
    border:1px solid #e6e7e9;
    font-size:14px;
  }
  .file-input {
    display:flex;
    gap:8px;
    align-items:center;
  }
  .file-input input[type=file] { display:block; }
  .preview-thumb {
    width:84px;
    height:84px;
    object-fit:cover;
    border-radius:8px;
    border:1px solid #e6e7e9;
    display:none;
  }

  .btn {
    display:inline-block;
    padding:10px 14px;
    border-radius:8px;
    border:none;
    cursor:pointer;
    font-weight:700;
  }
  .btn-primary { background: var(--yellow); color:#111; box-shadow:0 8px 20px rgba(255,160,0,0.12); }
  .btn-ghost { background:#f3f4f6; color:#111; }

  .form-section { margin-bottom:16px; padding-bottom:8px; border-bottom:1px dashed rgba(2,6,23,0.04); }

  /* quick helper list */
  .list-compact { margin:8px 0 0 0; padding:0; list-style:none; display:flex; flex-direction:column; gap:8px; }
  .list-compact li { display:flex; justify-content:space-between; align-items:center; gap:8px; padding:8px; border-radius:8px; background:#fff; border:1px solid rgba(2,6,23,0.03); }

  /* ---------- RIGHT COLUMN = PREVIEW CARD ---------- */
  .preview-card {
    background:var(--white);
    border-radius: var(--card-radius);
    overflow:hidden;
    box-shadow: var(--shadow);
    border:1px solid rgba(2,6,23,0.04);
  }

  /* Topbar */
  .topbar{
    background:var(--yellow);
    height:var(--topbar-height);
    display:flex;
    align-items:center;
    padding:0 28px;
    justify-content:space-between;
  }
  .topbar .left, .topbar .right{
    display:flex;
    align-items:center;
    gap:18px;
  }
  .topbar .left .item, .topbar .right .item{
    display:flex;
    align-items:center;
    gap:8px;
    color:#fff;
    font-weight:600;
    font-size:14px;
  }
  .topbar i.fa-envelope, .topbar i.fa-phone{ font-size:15px; color:#fff; }

  .topbar .right .follow-text{ color: rgba(0,0,0,0.65); font-weight:600; margin-right:8px; color:#111827; opacity:0.85; }
  .topbar .socials{ display:flex; gap:12px; align-items:center; }
  .topbar .socials a{ color:#fff; font-size:14px; text-decoration:none; opacity:0.95; }

  /* Header (white) */
  .main-header{
    background:var(--white);
    min-height: var(--header-height);
    display:flex;
    align-items:center;
    padding:18px 28px;
    justify-content:space-between;
  }

  .header-left{ display:flex; align-items:center; gap:18px; min-width:240px; }
  .logo img{ height:56px; width:auto; display:block; border-radius:6px; }

  .header-center{ flex:1; display:flex; justify-content:center; align-items:center; }
  .nav {
    display:flex;
    gap:28px;
    list-style:none;
    margin:0;
    padding:0;
    align-items:center;
  }
  .nav a{ text-decoration:none; color:var(--dark); font-weight:600; font-size:17px; }
  .nav li{ position:relative; padding:6px 0; }

  .header-right{ display:flex; align-items:center; gap:18px; min-width:220px; justify-content:flex-end; }
  .btn-book{
    background:var(--yellow);
    color: #fff;
    padding:12px 26px;
    border-radius: var(--radius-pill);
    font-weight:700;
    text-decoration:none;
    box-shadow:0 6px 18px rgba(255,160,0,0.12);
  }

  /* Dropdown placeholder styling */
  .dropdown2 .dropdown-content{
    display:none;
    position:absolute;
    top:42px;
    left:0;
    background:#fff;
    padding:16px;
    box-shadow:0 8px 30px rgba(0,0,0,0.08);
    border-radius:8px;
    min-width:420px;
    z-index:50;
  }
  .dropdown2:hover .dropdown-content{ display:block; }

  /* Component wrapper + actions */
  .component-wrapper { display:inline-block; position:relative; }
  .component-actions {
    position:absolute;
    top:-20px;
    right:-20px;
    display:flex;
    gap:6px;
    opacity:0;
    transform:translateY(-6px);
    transition: all .18s ease;
    pointer-events:none;
    z-index:12000;
  }
  .component-wrapper:hover .component-actions{
    opacity:1; transform:translateY(0); pointer-events:auto;
  }
  .component-action-btn{
    width:10px; height:10px; border-radius:8px; display:inline-flex; align-items:center; justify-content:center; border:none; cursor:pointer;
    box-shadow:0 6px 18px rgba(2,6,23,0.06);
    color:#fff; font-size:10px;
  }
  .component-action-btn.edit{ background:#0d6efd; }
  .component-action-btn.delete{ background:#dc3545; }

  /* footer note */
  .preview-meta { padding:12px 18px; font-size:13px; color:#374151; background:#fff7e6; border-top:1px solid rgba(0,0,0,0.02); }

  /* responsive tweaks */
  @media (max-width:1100px){
    .page-wrap { grid-template-columns: 1fr; }
  }

  /* small utilities */
        .muted { color:var(--muted); font-weight:600; font-size:14px; }
        .gap-8 { height:8px; display:block; }
        .ui-item-wrapper {
            position: relative;
            display: inline-block;
        }

        .ui-actions {
            position: absolute;
            top: -10px;
            right: -10px;
            display: none;
            gap: 4px;
        }

        .ui-item-wrapper:hover .ui-actions {
            display: flex;
        }

        .ui-edit,
        .ui-delete {
            padding: 5px 7px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .ui-edit { background: #007bff; color: #fff; }
        .ui-delete { background: #dc3545; color: #fff; }
        .logo-img{
            width: 70px;
            height: 70px;
        }
        .menu-link{
            margin: 10px !important;
            text-decoration: none;
            color: black !important;
        }
</style>
</head>
<body class="body header-fixed">

  <div id="wrapper">
    <div id="pagee" class="clearfix">

      @include('admin.components.sidebar')

      <div class="has-dashboard">

        <header class="main-header flex">
          @include('admin.components.header')
        </header>

        <main id="main">
 <!-- RIGHT: Live Preview -->
                        <div class="preview-card px-5 mb-5">

                            <!-- dynamic topbar -->
                            <div id="dynamicTopbar" class="topbar" role="banner" aria-label="Topbar preview">
                            <!-- rendered by JS -->
                            </div>

                            <!-- dynamic header -->
                            <header id="dynamicHeader" class="main-header" role="navigation" aria-label="Header preview">
                            <!-- rendered by JS -->
                            </header>

                            <div class="preview-meta">Preview: topbar + header (yellow & white). Hover any item to edit or delete.</div>
                        </div>
                        <!-- LEFT: Create / Quick tools -->
                        <div class="panel">

                            <h2>Create Component</h2>
                            <div class="small-muted">Add a new topbar or header component. Logo supports image upload.</div>

                            <div class="form-section" style="margin-top:12px;">
                            <label>Component Group</label>
                            <select id="create_component_group">
                                <option value="topbar">Topbar</option>
                                <option value="header">Header</option>
                            </select>

                            <div class="form-row" style="margin-top:12px;">
                                <div class="col">
                                <label>Component Type</label>
                                <select id="create_component_name" onchange="onCreateTypeChange()">
                                    <option value="email">Email</option>
                                    <option value="phone">Phone</option>
                                    <option value="logo">Logo (Image Upload)</option>
                                    <option value="menu">Menu Item</option>
                                    <option value="book_now">Book Now Button</option>
                                    <option value="social">Social Icon</option>
                                    <option value="text">Text Block</option>
                                    <option value="button">Button</option>
                                </select>
                                </div>
                                <div class="col">
                                <label>Order</label>
                                <input type="number" id="create_order_no" value="1" min="1" />
                                </div>
                            </div>

                            <div style="margin-top:12px;">
                                <label id="create_label_label">Label</label>
                                <input type="text" id="create_label" placeholder="e.g. Home / Email / Call Now" />
                            </div>

                            <div style="margin-top:12px;">
                                <label id="create_value_label">Value</label>
                                <input type="text" id="create_value" placeholder="/about or email/phone/icon/url" />
                            </div>

                            <div style="margin-top:12px; display:none;" id="create_icon_row">
                                <label>Icon Class (font-awesome)</label>
                                <input type="text" id="create_icon_class" placeholder="e.g. fa-instagram" />
                                <div class="small-muted">Use font-awesome class without the <code>fa</code> prefix or with it (e.g. <code>fa-instagram</code>).</div>
                            </div>

                            <div style="margin-top:12px; display:none;" id="create_logo_row">
                                <label>Upload Logo (image)</label>
                                <div class="file-input">
                                <input type="file" id="create_logo_file" accept="image/*" />
                                <img id="create_logo_preview" class="preview-thumb" alt="preview" />
                                </div>
                                <div class="small-muted">Logo will be uploaded to /api/upload-logo and saved value used as src.</div>
                            </div>

                            <div class="form-row" style="margin-top:12px;">
                                <div class="col">
                                <label>Desktop Position</label>
                                <select id="create_desktop_position">
                                    <option value="left">left</option>
                                    <option value="center">center</option>
                                    <option value="right">right</option>
                                    <option value="hide">hide</option>
                                </select>
                                </div>
                                <div class="col">
                                <label>Mobile Position</label>
                                <select id="create_mobile_position">
                                    <option value="top">top</option>
                                    <option value="sidebar">sidebar</option>
                                    <option value="bottom">bottom</option>
                                    <option value="hide">hide</option>
                                </select>
                                </div>
                            </div>

                            <div style="margin-top:14px; display:flex; gap:8px;">
                                <button class="btn btn-primary" id="createBtn">Create Component</button>
                                <button class="btn btn-ghost" id="resetCreateBtn" type="button">Reset</button>
                            </div>
                            </div>

                            <div style="height:12px;"></div>

                            {{-- <h2 style="margin-top:12px;">Existing Components</h2>
                            <div class="small-muted">Quick list (click refresh to reload)</div>

                            <ul id="componentsList" class="list-compact" style="margin-top:10px;">
                            <!-- JS will inject component rows with edit/delete quick controls -->
                            </ul> --}}

                            <div style="margin-top:12px; display:flex; gap:8px;">
                            <button class="btn btn-ghost" id="refreshBtn">Refresh Preview</button>
                            <button class="btn btn-ghost" id="openMobileBtn">Mobile Drawer</button>
                            </div>

                        </div> <!-- end left panel -->

                       


        </main>
      </div>
    </div>
  </div>
  
<!-- EDIT MODAL (hidden initially) -->
<div id="editModal" style="display:none; position:fixed; inset:0; z-index:2200; align-items:center; justify-content:center;">
  <div style="position:fixed; inset:0; background:rgba(2,6,23,0.45);" onclick="closeEditModal()"></div>
  <div style="width:640px; max-width:94%; background:#fff; border-radius:10px; padding:18px; position:relative; box-shadow:0 18px 50px rgba(2,6,23,0.24);">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
      <h3 style="margin:0; font-size:18px;">Edit Component</h3>
      <button onclick="closeEditModal()" style="background:#efefef; border:none; padding:8px 10px; border-radius:6px; cursor:pointer;">✕</button>
    </div>

    <form id="editForm" onsubmit="event.preventDefault(); saveEdit()">
      <input type="hidden" id="edit_id" />
      <div style="display:grid; grid-template-columns: 1fr 240px; gap:12px;">
        <div>
          <label>Label</label>
          <input id="edit_label" type="text" />
        </div>
        <div>
          <label>Order</label>
          <input id="edit_order_no" type="number" value="1" />
        </div>
      </div>

      <div style="margin-top:10px;">
        <label>Value (url / email / phone)</label>
        <input id="edit_value" type="text" />
      </div>

      <div style="margin-top:10px;">
        <label>Icon Class (optional)</label>
        <input id="edit_icon_class" type="text" placeholder="fa-instagram or fa-facebook-f" />
      </div>

      <div id="edit_logo_upload_row" style="margin-top:10px; display:none;">
        <label>Logo Image (upload)</label>
        <div style="display:flex; gap:8px; align-items:center;">
          <input type="file" id="edit_logo_file" accept="image/*" />
          <img id="edit_logo_preview" class="preview-thumb" alt="logo preview" style="display:none;" />
        </div>
      </div>

      <div style="margin-top:12px; display:flex; gap:8px; align-items:center;">
        <label style="font-weight:700">Desktop position</label>
        <select id="edit_desktop_position" style="padding:8px; border-radius:8px;">
          <option value="left">left</option>
          <option value="center">center</option>
          <option value="right">right</option>
          <option value="hide">hide</option>
        </select>

        <label style="font-weight:700">Mobile position</label>
        <select id="edit_mobile_position" style="padding:8px; border-radius:8px;">
          <option value="top">top</option>
          <option value="sidebar">sidebar</option>
          <option value="bottom">bottom</option>
          <option value="hide">hide</option>
        </select>
      </div>

      <div style="margin-top:18px; display:flex; justify-content:flex-end; gap:10px;">
        <button type="button" class="btn btn-ghost" onclick="closeEditModal()">Cancel</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
  </div>
</div>

<!-- MOBILE DRAWER (will be toggled by JS) -->
<div id="mobileDrawerOverlay" style="display:none; position:fixed; inset:0; background:rgba(2,6,23,0.45); z-index:2100;"></div>
<div id="mobileDrawer" style="display:none; position:fixed; left:0; top:0; height:100%; width:300px; background:#fff; box-shadow:3px 0 18px rgba(2,6,23,0.08); z-index:2110; overflow:auto; padding:12px;">
  <div style="display:flex; justify-content:space-between; align-items:center;">
    <strong>Mobile Preview</strong>
    <button onclick="closeMobileDrawer()" style="background:#efefef; border:none; padding:6px 8px; border-radius:6px;">✕</button>
  </div>
  <div id="mobileDrawerContent" style="margin-top:12px;"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>if (!window.Swal) document.write('<script src="/fallback/sweetalert2.js"><\/script>');</script>

<!-- Place for Part 2 script to be injected (render & API logic) -->
<script>
/* --------------------------
   Configuration / Helpers
   
   -------------------------- */
const API_BASE = ''; // if your API is at same origin leave empty, otherwise put full base URL e.g. 'https://example.com'
const APP_URL = "{{ config('app.url') }}";
function dedupe(arr) {
    const map = new Map();
    arr.forEach(i => map.set(i.id, i));
    return Array.from(map.values());
}


function wrapComponent(item, html) {
    return `
    <div class="ui-item-wrapper" data-id="${item.id}">
        <div class="ui-actions">
            <button class="ui-edit" onclick="editComponent(${item.id})"><i class="fa fa-edit"></i></button>
            <button class="ui-delete" onclick="deleteComponentConfirm(${item.id})"><i class="fa fa-trash"></i></button>
        </div>
        ${html}
    </div>
    `;
}

function wrapPreviewItem(item, html) {
    return `
        <div class="component-wrapper m-2" data-id="${item.id}">
            <div class="component-actions">
                <button class="component-action-btn edit" onclick="openEditModal(${item.id})">
                    <i class="fa fa-edit"></i>
                </button>
                <button class="component-action-btn delete" onclick="deleteComponentConfirm(${item.id})">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
            ${html}
        </div>
    `;
}

const SELECTORS = {
  dynamicTopbar: document.getElementById('dynamicTopbar'),
  dynamicHeader: document.getElementById('dynamicHeader'),
  mobileSidebar: document.getElementById('mobileDrawerContent'),
  componentsList: document.getElementById('componentsList'),
  createBtn: document.getElementById('createBtn'),
  refreshBtn: document.getElementById('refreshBtn'),
  openMobileBtn: document.getElementById('openMobileBtn'),
  mobileDrawer: document.getElementById('mobileDrawer'),
  mobileDrawerOverlay: document.getElementById('mobileDrawerOverlay'),
  editModal: document.getElementById('editModal'),
  editForm: document.getElementById('editForm')
};

/* Utility: show toast using SweetAlert */
function toastSuccess(msg) {
  Swal.fire({ icon: 'success', title: msg, toast: true, timer: 1800, position: 'top-end', showConfirmButton: false });
}
function toastError(msg) {
  Swal.fire({ icon: 'error', title: msg, toast: true, timer: 2500, position: 'top-end', showConfirmButton: false });
}

/* Small DOM helpers */
function el(tag, props = {}, children = '') {
  const node = document.createElement(tag);
  Object.entries(props).forEach(([k,v]) => {
    if (k === 'class') node.className = v;
    else if (k === 'html') node.innerHTML = v;
    else node.setAttribute(k, v);
  });
  if (typeof children === 'string') {
    node.innerHTML = children;
  } else if (Array.isArray(children)) {
    children.forEach(c => node.appendChild(c));
  }
  return node;
}

/* --------------------------
   State
   -------------------------- */
let UI_STATE = {
  topbar: { desktop: { left:[], center:[], right:[] }, mobile: { top:[], sidebar:[], bottom:[] }, visibility: { visible_global:true } },
  header: { desktop: { left:[], center:[], right:[] }, mobile: { top:[], sidebar:[], bottom:[] } },
  allComponentsFlat: [] // flat list of components returned from API for quick editing
};

/* --------------------------
   Boot / Bind events
   -------------------------- */
document.addEventListener('DOMContentLoaded', () => {
  // wire buttons
  SELECTORS.createBtn.addEventListener('click', handleCreate);
  SELECTORS.refreshBtn.addEventListener('click', loadUIComponents);
  SELECTORS.openMobileBtn.addEventListener('click', openMobileDrawer);
  document.getElementById('resetCreateBtn').addEventListener('click', resetCreateForm);

  // wire file preview for create
  document.getElementById('create_logo_file').addEventListener('change', function() {
    const f = this.files && this.files[0];
    const preview = document.getElementById('create_logo_preview');
    if (!f) { preview.style.display='none'; preview.src=''; return; }
    const reader = new FileReader();
    reader.onload = e => { preview.src = e.target.result; preview.style.display='block'; };
    reader.readAsDataURL(f);
  });

  // edit modal file preview
  document.getElementById('edit_logo_file').addEventListener('change', function() {
    const f = this.files && this.files[0];
    const preview = document.getElementById('edit_logo_preview');
    if (!f) { preview.style.display='none'; preview.src=''; return; }
    const reader = new FileReader();
    reader.onload = e => { preview.src = e.target.result; preview.style.display='block'; };
    reader.readAsDataURL(f);
  });

  // edit form submit bound inside Part 1 via onsubmit calling saveEdit()

  // load initial
  loadUIComponents();
});

/* --------------------------
   API Helpers
   -------------------------- */
async function apiGet(path) {
  const res = await fetch(API_BASE + path, { credentials: 'same-origin' });
  if (!res.ok) throw new Error(`GET ${path} failed: ${res.status}`);
  return res.json();
}
async function apiPost(path, body) {
  const res = await fetch(API_BASE + path, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
    body: JSON.stringify(body),
    credentials: 'same-origin'
  });
  if (!res.ok) {
    let txt = await res.text();
    throw new Error(txt || `POST ${path} failed: ${res.status}`);
  }
  return res.json();
}
async function apiPut(path, body) {
  const res = await fetch(API_BASE + path, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
    body: JSON.stringify(body),
    credentials: 'same-origin'
  });
  if (!res.ok) {
    let txt = await res.text();
    throw new Error(txt || `PUT ${path} failed: ${res.status}`);
  }
  return res.json();
}
async function apiDelete(path) {
  const res = await fetch(API_BASE + path, { method:'DELETE', credentials:'same-origin' });
  if (!res.ok) {
    let txt = await res.text();
    throw new Error(txt || `DELETE ${path} failed: ${res.status}`);
  }
  return res.json();
}

/* Upload file (logo) -> returns url string or null */
async function uploadLogoFileFromInput(inputEl) {
  if (!inputEl || !inputEl.files || !inputEl.files[0]) return null;
  const fd = new FormData();
  fd.append('file', inputEl.files[0]);
  try {
    const res = await fetch(API_BASE + '/api/upload-logo', { method: 'POST', body: fd, credentials:'same-origin' });
    if (!res.ok) {
      const txt = await res.text();
      throw new Error(txt || 'Upload failed');
    }
    const json = await res.json();
    // prefer json.url or json.data.url
    if (json.url) return json.url;
    if (json.data && json.data.url) return json.data.url;
    // fallback to text
    return null;
  } catch (err) {
    console.error('logo upload error', err);
    throw err;
  }
}

/* --------------------------
   Load UI (GET /api/ui) and render everything
   -------------------------- */
async function loadUIComponents() {
  try {
    const json = await apiGet('/api/ui');
    // normalize fallback structure
    const topbar = json.topbar || { desktop:{left:[],center:[],right:[]}, mobile:{top:[],sidebar:[],bottom:[]}, visibility:{ visible_global:true } };
    const header = json.header || { desktop:{left:[],center:[],right:[]}, mobile:{top:[],sidebar:[],bottom:[]} };

    UI_STATE.topbar = topbar;
    UI_STATE.header = header;

    // build flat list for quick operations (merge arrays)
    const flat = [];
    ['topbar','header'].forEach(group => {
      const section = json[group] || {};
      const desktop = section.desktop || {};
      const mobile = section.mobile || {};
      ['left','center','right'].forEach(pos => (desktop[pos] || []).forEach(i => flat.push(i)));
      ['top','sidebar','bottom'].forEach(pos => (mobile[pos] || []).forEach(i => flat.push(i)));
    });
    UI_STATE.allComponentsFlat = flat;
    console.log(flat);
    renderTopbar(topbar);
    renderHeader(header);
    renderMobileSidebar(header.mobile || { top:[], sidebar:[], bottom:[] });
    // renderComponentsList(flat);

  } catch (err) {
    console.error('loadUIComponents error', err);
    toastError('Failed to load UI components');
  }
}

/* --------------------------
   Render components list on left panel
   -------------------------- */
function renderComponentsList(list) {
  const wrap = SELECTORS.componentsList;
  wrap.innerHTML = '';
  if (!list || list.length === 0) {
    const li = el('li', {}, '<span class="muted">No components found</span>');
    wrap.appendChild(li); return;
  }

  // sort by group then order_no
  list.sort((a,b) => (a.component_group||'').localeCompare(b.component_group||'') || ((a.order_no||0)-(b.order_no||0)));

  list.forEach(item => {
    const leftLabel = `<div style="display:flex;gap:8px;align-items:center;">
                        <strong style="font-size:13px;">${item.label || item.component_name}</strong>
                        <small style="color:#6b7280;margin-left:6px;">[${item.component_group}/${item.desktop_position || item.mobile_position || ''}]</small>
                      </div>`;
    const rightActions = `<div style="display:flex;gap:6px;align-items:center;">
                            <button class="component-action-btn edit" title="Edit" data-id="${item.id}"><i class="fa fa-edit"></i></button>
                            <button class="component-action-btn delete" title="Delete" data-id="${item.id}"><i class="fa fa-trash"></i></button>
                          </div>`;
    const li = el('li', {}, '');
    li.innerHTML = `<div style="display:flex;align-items:center;justify-content:space-between;width:100%;">${leftLabel}${rightActions}</div>`;
    // event delegation
    li.querySelector('.component-action-btn.edit').addEventListener('click', () => openEditModal(item.id));
    li.querySelector('.component-action-btn.delete').addEventListener('click', () => deleteComponentConfirm(item.id));
    wrap.appendChild(li);
  });
}




function renderTopbarItem(item) {
    let html = "";

    if (item.component_name === "email") {
        html = `<i class="fa fa-envelope"></i> ${item.value}`;
    }
    if (item.component_name === "phone") {
        html = `<i class="fa fa-phone"></i> ${item.value}`;
    }
    if (item.component_name === "social") {
        html = `<a href="${item.value}"><i class="${item.icon_class}"></i></a>`;
    }

    return wrapComponent(item, html);
}

/* --------------------------
   RENDER TOPBAR & HEADER (pixel-perfect matching Part 1 CSS)
   - wrap each rendered component HTML inside .component-wrapper
   - add actions (edit / delete) visible on hover via CSS (component-actions)
   -------------------------- */
function renderTopbar(topbar) {
    const L = dedupe(topbar.desktop.left);
    const C = dedupe(topbar.desktop.center);
    const R = dedupe(topbar.desktop.right);

    function itemHtml(i) {
        if (!i) return "";

        if (i.component_name === "email")
            return wrapPreviewItem(i, `<div class="item"><i class="fa fa-envelope"></i> ${i.value}</div>`);

        if (i.component_name === "phone")
            return wrapPreviewItem(i, `<div class="item"><i class="fa fa-phone"></i> ${i.value}</div>`);

        if (i.component_name === "social")
            return wrapPreviewItem(i, `<div class="item"><a href="${i.value}" target="_blank"><i class="${i.icon_class}"></i></a></div>`);

        if (i.component_name === "text")
            return wrapPreviewItem(i, `<div class="item">${i.label || i.value}</div>`);

        if (i.component_name === "book_now" || i.component_name === "button")
            return wrapPreviewItem(i, `<a href="${i.value}" class="btn-book">${i.label}</a>`);

        return wrapPreviewItem(i, `<div class="item">${i.label || i.value}</div>`);
    }

    SELECTORS.dynamicTopbar.innerHTML = `
        <div class="left">${L.map(itemHtml).join("")}</div>
        <div class="center">${C.map(itemHtml).join("")}</div>
        <div class="right">${R.map(itemHtml).join("")}</div>
    `;
}

/* --------------------------
   Render Header exactly like the screenshot
   -------------------------- */
function renderHeader(header) {
    const L = dedupe(header.desktop.left);
    const C = dedupe(header.desktop.center);
    const R = dedupe(header.desktop.right);

    function itemHtml(i) {
        if (!i) return "";

        if (i.component_name === "logo")
            return wrapPreviewItem(i, `<a href="/"><img src="${APP_URL + "/" + i.value}" class="logo-img"></a>`);

        if (i.component_name === "menu")
            return wrapPreviewItem(i, `<a class="menu-link" class="p-2" href="${i.value}">${i.label}</a>`);

        if (i.component_name === "book_now")
            return wrapPreviewItem(i, `<a href="${i.value}" class="btn-book">${i.label}</a>`);

        if (i.component_name === "social")
            return wrapPreviewItem(i, `<a href="${i.value}" target="_blank"><i class="${i.icon_class}"></i></a>`);

        if (i.component_name === "email")
            return wrapPreviewItem(i, `<div><i class="fa fa-envelope"></i> ${i.value}</div>`);

        if (i.component_name === "phone")
            return wrapPreviewItem(i, `<div><i class="fa fa-phone"></i> ${i.value}</div>`);

        return wrapPreviewItem(i, `<div>${i.label || i.value}</div>`);
    }

    SELECTORS.dynamicHeader.innerHTML = `
        <div class="header-left " style="z-index:100">
            ${L.map(itemHtml).join("")}
        </div>

        <div class="header-center">
            ${C.map(itemHtml).join("")}
        </div>

        <div class="header-right">
            ${R.map(itemHtml).join("")}
        </div>
    `;
}

/* --------------------------
   Mobile sidebar rendering
   -------------------------- */
function renderMobileSidebar(mobile) {
    const top = dedupe((mobile && mobile.top) ? mobile.top : []);
    const sidebar = dedupe((mobile && mobile.sidebar) ? mobile.sidebar : []);
    const bottom = dedupe((mobile && mobile.bottom) ? mobile.bottom : []);
    const items = [...top, ...sidebar, ...bottom];

  const html = items.map(i => {
    if (!i) return '';
    if (i.component_name === 'logo') return `<div style="text-align:center;padding:8px;"><img src="${APP_URL+"/"+i.value}" style="height:56px;object-fit:contain;"></div>`;
    if (i.component_name === 'menu') return `<div style="padding:8px 0;"><a href="${i.value}">${i.label}</a></div>`;
    if (i.component_name === 'book_now' || i.component_name === 'button') return `<div style="padding:8px 0;"><a href="${i.value}" style="display:block;padding:10px;border-radius:8px;background:#0d6efd;color:#fff;text-align:center;text-decoration:none;">${i.label}</a></div>`;
    if (i.component_name === 'social') return `<div style="padding:6px 0;"><a href="${i.value}" target="_blank"><i class="${i.icon_class}"></i>&nbsp;${i.label}</a></div>`;
    return `<div style="padding:6px 0;">${i.label || i.value}</div>`;
  }).join('');

  SELECTORS.mobileSidebar.innerHTML = html;
}

/* --------------------------
   Create component (button handler)
   -------------------------- */
async function handleCreate(e) {
  e.preventDefault();
  try {
    const group = document.getElementById('create_component_group').value;
    const name = document.getElementById('create_component_name').value;
    const label = document.getElementById('create_label').value.trim();
    let value = document.getElementById('create_value').value.trim();
    const icon = document.getElementById('create_icon_class').value.trim();
    const desktop_position = document.getElementById('create_desktop_position').value;
    const mobile_position = document.getElementById('create_mobile_position').value;
    const order_no = parseInt(document.getElementById('create_order_no').value || '1', 10);

    // if logo type with file -> upload first
    if (name === 'logo') {
      const fileInput = document.getElementById('create_logo_file');
      if (fileInput.files && fileInput.files[0]) {
        const uploadedUrl = await uploadLogoFileFromInput(fileInput);
        if (!uploadedUrl) { toastError('Logo upload failed'); return; }
        value = uploadedUrl;
      }
      if (!value) { toastError('Logo requires an image or URL'); return; }
    }

    // minimal payload
    const payload = {
      component_group: group,
      component_name: name,
      label: label || (name === 'logo' ? 'logo' : ''),
      value,
      icon_class: icon || null,
      desktop_position,
      mobile_position,
      order_no
    };

    const created = await apiPost('/api/ui-components', payload);
    toastSuccess('Component created');
    resetCreateForm();
    loadUIComponents();
  } catch (err) {
    console.error('create error', err);
    toastError('Create failed: ' + (err.message || err));
  }
}

function resetCreateForm() {
  document.getElementById('create_label').value = '';
  document.getElementById('create_value').value = '';
  document.getElementById('create_icon_class').value = '';
  document.getElementById('create_logo_file').value = '';
  document.getElementById('create_logo_preview').style.display = 'none';
  document.getElementById('create_order_no').value = 1;
}

/* --------------------------
   Edit flow
   -------------------------- */
function openEditModal(id) {
  // find item in flat list
  const item = UI_STATE.allComponentsFlat.find(i => i.id === id);
  if (!item) { toastError('Component not found'); return; }

  // populate fields
  document.getElementById('edit_id').value = item.id;
  document.getElementById('edit_label').value = item.label || '';
  document.getElementById('edit_value').value = item.value || '';
  document.getElementById('edit_icon_class').value = item.icon_class || '';
  document.getElementById('edit_order_no').value = item.order_no || 1;
  document.getElementById('edit_desktop_position').value = item.desktop_position || 'left';
  document.getElementById('edit_mobile_position').value = item.mobile_position || 'top';

  // show/hide logo upload row if logo type
  const logoRow = document.getElementById('edit_logo_upload_row');
  const logoPreview = document.getElementById('edit_logo_preview');
  document.getElementById('edit_logo_file').value = '';
  logoPreview.style.display = 'none';
  if (item.component_name === 'logo') {
    logoRow.style.display = 'block';
    // prefill preview if value present (if URL begins with /storage or http)
    if (item.value) {
      logoPreview.src = item.value;
      logoPreview.style.display = 'block';
    }
  } else {
    logoRow.style.display = 'none';
  }

  // open modal
  SELECTORS.editModal.style.display = 'flex';
  // Ensure clicking overlay closes (already implemented in HTML wrapper)
}

function closeEditModal() {
  SELECTORS.editModal.style.display = 'none';
}

/* Called by Part1 editForm onsubmit attribute */
async function saveEdit() {
  try {
    const id = document.getElementById('edit_id').value;
    if (!id) { toastError('Missing component id'); return; }
    const label = document.getElementById('edit_label').value.trim();
    let value = document.getElementById('edit_value').value.trim();
    const icon_class = document.getElementById('edit_icon_class').value.trim();
    const desktop_position = document.getElementById('edit_desktop_position').value;
    const mobile_position = document.getElementById('edit_mobile_position').value;
    const order_no = parseInt(document.getElementById('edit_order_no').value || '1', 10);

    // if logo input has a file selected -> upload first
    const editFileInput = document.getElementById('edit_logo_file');
    if (editFileInput && editFileInput.files && editFileInput.files[0]) {
      const uploaded = await uploadLogoFileFromInput(editFileInput);
      if (!uploaded) { toastError('Logo upload failed'); return; }
      value = uploaded;
    }

    const payload = {
      label,
      value,
      icon_class: icon_class || null,
      desktop_position,
      mobile_position,
      order_no
    };

    await apiPut(`/api/ui-components/${id}`, payload);
    toastSuccess('Updated');
    closeEditModal();
    loadUIComponents();
  } catch (err) {
    console.error('saveEdit error', err);
    toastError('Update failed: ' + (err.message || err));
  }
}

/* --------------------------
   Delete with confirmation
   -------------------------- */
function deleteComponentConfirm(id) {
  Swal.fire({
    title: 'Delete component?',
    text: 'This will permanently remove the component.',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete',
    confirmButtonColor: '#d33'
  }).then(async (r) => {
    if (!r.isConfirmed) return;
    try {
      await apiDelete(`/api/ui-components/${id}`);
      toastSuccess('Deleted');
      loadUIComponents();
    } catch (err) {
      console.error('delete error', err);
      toastError('Delete failed');
    }
  });
}

/* --------------------------
   Mobile drawer open/close
   -------------------------- */
function openMobileDrawer() {
  document.getElementById('mobileDrawerOverlay').style.display = 'block';
  const drawer = document.getElementById('mobileDrawer');
  drawer.style.display = 'block';
  // copy content
  document.getElementById('mobileDrawerContent').innerHTML = SELECTORS.mobileSidebar.innerHTML;
}
function closeMobileDrawer() {
  document.getElementById('mobileDrawerOverlay').style.display = 'none';
  document.getElementById('mobileDrawer').style.display = 'none';
  document.getElementById('mobileDrawerContent').innerHTML = '';
}

/* --------------------------
   Helper: on create type change (show/hide fields)
   (this function is referenced in Part1 select onchange)
   -------------------------- */
function onCreateTypeChange() {
  const type = document.getElementById('create_component_name').value;
  const iconRow = document.getElementById('create_icon_row');
  const logoRow = document.getElementById('create_logo_row');
  const valueLabel = document.getElementById('create_value_label');
  const labelLabel = document.getElementById('create_label_label');

  iconRow.style.display = 'none';
  logoRow.style.display = 'none';
  // default state
  labelLabel.textContent = 'Label';
  valueLabel.textContent = 'Value';

  if (type === 'logo') {
    logoRow.style.display = 'block';
    document.getElementById('create_value').style.display = 'none';
    valueLabel.textContent = '(image will be uploaded)';
    labelLabel.textContent = 'Label (optional)';
  } else if (type === 'social') {
    iconRow.style.display = 'block';
    document.getElementById('create_value').style.display = 'block';
    valueLabel.textContent = 'URL';
    labelLabel.textContent = 'Platform label';
  } else if (type === 'phone') {
    document.getElementById('create_value').style.display = 'block';
    valueLabel.textContent = 'Phone';
  } else if (type === 'email') {
    document.getElementById('create_value').style.display = 'block';
    valueLabel.textContent = 'Email';
  } else if (type === 'text') {
    document.getElementById('create_value').style.display = 'none';
    valueLabel.textContent = '';
    labelLabel.textContent = 'Text';
  } else {
    document.getElementById('create_value').style.display = 'block';
    valueLabel.textContent = 'Value / URL';
  }
}

/* expose some functions to global scope (used by inline on* in HTML render fragments) */
window.openEditModal = openEditModal;
window.deleteComponentConfirm = deleteComponentConfirm;
window.openMobileDrawer = openMobileDrawer;
window.closeMobileDrawer = closeMobileDrawer;
window.saveEdit = saveEdit;
window.onCreateTypeChange = onCreateTypeChange;

/* initial call to set the create form visibility correctly */
onCreateTypeChange();

</script>
<script>
/* ============================================================
   PART 3 — DRAG & DROP SORTING + ORDER SAVE
   ============================================================ */

/* ------------------------------------------------------------
   We will convert every component-wrapper inside preview into
   draggable elements and track their parent groups.
------------------------------------------------------------ */

function enableDragSorting() {
    const sortableGroups = [
        { selector: "#dynamicTopbar .left", group: "topbar", pos: "left" },
        { selector: "#dynamicTopbar .center", group: "topbar", pos: "center" },
        { selector: "#dynamicTopbar .right", group: "topbar", pos: "right" },

        { selector: "#dynamicHeader .header-left nav ul.nav", group: "header", pos: "left" },
        { selector: "#dynamicHeader .header-center nav ul.nav", group: "header", pos: "center" },
        { selector: "#dynamicHeader .header-right nav ul.nav", group: "header", pos: "right" },

        // Inline items (non-menu)
        { selector: "#dynamicHeader .header-left", group: "header", pos: "left_inline" },
        { selector: "#dynamicHeader .header-right", group: "header", pos: "right_inline" },
    ];

    sortableGroups.forEach(cfg => {
        const container = document.querySelector(cfg.selector);
        if (!container) return;
        makeContainerSortable(container, cfg.group, cfg.pos);
    });
}

/* ------------------------------------------------------------
   Convert any container into a sortable list
------------------------------------------------------------ */

function makeContainerSortable(container, group, position) {
    let dragged;

    container.querySelectorAll(".component-wrapper").forEach(el => {
        el.setAttribute("draggable", true);

        el.addEventListener("dragstart", e => {
            dragged = el;
            el.style.opacity = "0.3";
            e.dataTransfer.effectAllowed = "move";
        });

        el.addEventListener("dragend", () => {
            dragged.style.opacity = "1";
            saveOrder(container, group, position);
        });
    });

    container.addEventListener("dragover", e => {
        e.preventDefault();
        const after = getDragAfterElement(container, e.clientX, e.clientY);
        if (after == null) {
            container.appendChild(dragged);
        } else {
            container.insertBefore(dragged, after);
        }
    });
}

/* ------------------------------------------------------------
   Helper: Get element after drop cursor
------------------------------------------------------------ */

function getDragAfterElement(container, x, y) {
    const els = [...container.querySelectorAll(".component-wrapper:not(.dragging)")];

    return els.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;

        if (offset < 0 && offset > closest.offset) {
            return { offset, element: child };
        }
        return closest;

    }, { offset: Number.NEGATIVE_INFINITY }).element;
}

/* ------------------------------------------------------------
   Save order after dragging stops
------------------------------------------------------------ */

async function saveOrder(container, group, pos) {
    const children = container.querySelectorAll(".component-wrapper");
    const updates = [];

    children.forEach((el, index) => {
        const id = el.getAttribute("data-id");
        updates.push({
            id: Number(id),
            order_no: index + 1,
            component_group: group,
            position: pos
        });
    });

    try {
        await fetch("/api/ui-components/reorder", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ updates }),
        });

        toastSuccess("Order updated");
        loadUIComponents(); // Re-render preview

    } catch (err) {
        toastError("Failed to save new order");
        console.error(err);
    }
}

/* ------------------------------------------------------------
   After each UI load, enable dragging again
------------------------------------------------------------ */


/* FINAL PATCH — Enable drag AFTER loadUIComponents exists */
window.addEventListener("load", () => {
    if (typeof loadUIComponents === "function") {
        const original = loadUIComponents;

        window.loadUIComponents = async function () {
            await original();
            enableDragSorting();
        };
    }
});

</script>


</body>
</html>
