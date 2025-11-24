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
<div  style="margin:20px auto;padding:20px">
    <h4>Footer Settings</h4>

    <div style="display:flex; gap:18px;">
        <div style="flex:1; min-width:380px; background:#fff; padding:14px; border-radius:8px; box-shadow:0 6px 24px rgba(0,0,0,0.06);">
            <ul style="display:flex; gap:8px; list-style:none; padding:0; margin-bottom:12px;">
                <li><button class="tab-btn" data-tab="about">About</button></li>
                <li><button class="tab-btn" data-tab="services">Services</button></li>
                <li><button class="tab-btn" data-tab="gallery">Gallery</button></li>
                <li><button class="tab-btn" data-tab="newsletter">Newsletter</button></li>
                <li><button class="tab-btn" data-tab="bottom">Bottom</button></li>
            </ul>

            <div id="tab-content" style="min-height:420px;">
                <!-- dynamic -->
            </div>
        </div>

      
    </div>
      <div style="flex:1;">
            <div style="background:#fff;padding:14px;border-radius:8px;box-shadow:0 6px 24px rgba(0,0,0,0.06);">
                <h4>Preview</h4>
                <div id="footerPreview" style="background:#0b0b0b;color:#fff;padding:18px;border-radius:6px;">
                    <!-- preview will be rendered here -->
                </div>
            </div>
        </div>
</div>
        </main>
      </div>
    </div>
  </div>
</body>

<script>
const API_BASE = '/api';
const CSRF = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

let FOOTER = {};

async function fetchFooter(){
    const res = await fetch(API_BASE + '/footer');
    FOOTER = await res.json();
    renderActiveTab('about');
    renderPreview();
}
function byId(id){ return document.getElementById(id); }

function setActiveBtn(tab){
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelector('.tab-btn[data-tab="'+tab+'"]').classList.add('active');
}

document.querySelectorAll('.tab-btn').forEach(b=>{
    b.addEventListener('click', ()=> {
        renderActiveTab(b.dataset.tab);
    });
});

// Render tab content
function renderActiveTab(tab){
    setActiveBtn(tab);
    const container = document.getElementById('tab-content');
    if(tab === 'about'){
        const about = FOOTER.about || {};
        container.innerHTML = `
            <label>Logo</label>
            <div style="display:flex; gap:8px; align-items:center;">
                <input type="file" id="logoFile" />
                <img id="logoPreview" src="${about.logo ? '/'+about.logo : ''}" style="width:56px;display:${about.logo?'block':'none'};"/>
            </div>
            <div style="height:8px;"></div>
            <label>Description</label>
            <textarea id="aboutDesc" style="width:100%;height:90px">${about.description || ''}</textarea>

            <div style="height:8px;"></div>
            <label>Contacts</label>
            <div id="contactsList"></div>
            <div style="display:flex; gap:8px; margin-top:8px;">
                <select id="newContactType"><option value="email">email</option><option value="phone">phone</option><option value="whatsapp">whatsapp</option></select>
               <input id="newContactValue" class="footer-input" placeholder="value" />
                
                <button onclick="addContact()" class="btn">Add</button>
            </div>
            <div style="height:14px;"></div>
            <div style="display:flex; gap:8px;">
                <button onclick="saveAbout()" class="btn btn-primary">Save About</button>
            </div>
        `;
        renderContacts();
        document.getElementById('logoFile').addEventListener('change', uploadLogo);
    }

    if(tab === 'services'){
        const services = FOOTER.services || [];
        container.innerHTML = `
            <div id="servicesList"></div>
            <div style="height:8px;"></div>
            <div style="display:flex; gap:8px;">
                <input id="serviceLabel" placeholder="Label" /><input id="serviceUrl" placeholder="/path" />
                <button onclick="addService()">Add</button>
            </div>
            <div style="height:12px;"></div>
            <button onclick="saveServices()" class="btn btn-primary">Save Services</button>
        `;
        renderServices();
    }

    if(tab === 'gallery'){
        const gallery = FOOTER.gallery || [];
        container.innerHTML = `
            <div id="galleryList" style="display:flex; gap:8px; flex-wrap:wrap;"></div>
            <div style="height:8px;"></div>
            <input type="file" id="galleryFile" />
            <div style="height:8px;"></div>
            <small>Max 6 images. Current: ${ (FOOTER.gallery||[]).length }</small>
        `;
        renderGallery();
        document.getElementById('galleryFile').addEventListener('change', uploadGalleryImage);
    }

    if(tab === 'newsletter'){
        const nl = FOOTER.newsletter || { show:true, placeholder:'Enter email', social_icons:[] };
        container.innerHTML = `
            <div style="display:flex;gap:8px;align-items:center;">
                <label>Show Newsletter</label>
                <input type="checkbox" id="nlShow" ${nl.show ? 'checked' : ''} />
            </div>
            <div style="height:8px;"></div>
            <label>Placeholder</label>
            <input id="nlPlaceholder" value="${nl.placeholder || ''}" style="width:100%"/>
            <div style="height:8px;"></div>
            <label>Social Icons (font-awesome class + url)</label>
            <div id="nlSocials"></div>
            <div style="display:flex;gap:8px;margin-top:8px;">
                <input id="nlIcon" placeholder="fa-brands fa-facebook-f" /><input id="nlIconUrl" placeholder="#" />
                <button onclick="addNlSocial()">Add</button>
            </div>
            <div style="height:8px;"></div>
            <button onclick="saveNewsletter()" class="btn btn-primary">Save Newsletter</button>
        `;
        renderNlSocials();
    }

    if(tab === 'bottom'){
        const bottom = FOOTER.bottom || {copyright:'', social_icons:[]};
        container.innerHTML = `
            <label>Copyright</label>
            <input id="bottomCopyright" value="${bottom.copyright || ''}" style="width:100%"/>
            <div style="height:8px;"></div>
            <label>Social Icons</label>
            <div id="bottomSocials"></div>
            <div style="display:flex;gap:8px;margin-top:8px;">
                <input id="bottomIcon" placeholder="fa-brands fa-x" /><input id="bottomIconUrl" placeholder="#" />
                <button onclick="addBottomSocial()">Add</button>
            </div>
            <div style="height:8px;"></div>
            <button onclick="saveBottom()" class="btn btn-primary">Save Bottom</button>
        `;
        renderBottomSocials();
    }
}

/* ---------- helper renderers ---------- */
function renderContacts(){
    const list = document.getElementById('contactsList');
    list.innerHTML = '';
    (FOOTER.about?.contacts || []).forEach((c, idx) => {
        const div = document.createElement('div');
        div.style.display='flex'; div.style.justifyContent='space-between'; div.style.marginTop='6px';
        div.innerHTML = `<div>${c.type}: ${c.value}</div><div><button onclick="removeContact(${idx})">Remove</button></div>`;
        list.appendChild(div);
    });
}
function addContact(){
    const type = document.getElementById('newContactType').value;
    const value = document.getElementById('newContactValue').value.trim();
    if(!value) return alert('value required');
    FOOTER.about = FOOTER.about || {};
    FOOTER.about.contacts = FOOTER.about.contacts || [];
    FOOTER.about.contacts.push({type,value});
    renderContacts();
    document.getElementById('newContactValue').value='';
}
function removeContact(i){
    FOOTER.about.contacts.splice(i,1);
    renderContacts();
}
async function saveAbout(){
    const desc = document.getElementById('aboutDesc').value.trim();
    const payload = {
        about: {
            ...FOOTER.about,
            description: desc
        }
    };
    await sendUpdate(payload);
}

/* services */
function renderServices(){
    const wrap = document.getElementById('servicesList');
    wrap.innerHTML='';
    (FOOTER.services || []).forEach((s, idx) => {
        const d = document.createElement('div');
        d.style.display='flex'; d.style.justifyContent='space-between'; d.style.marginTop='6px';
        d.innerHTML = `<div>${s.label} - ${s.url}</div><div><button onclick="removeService(${idx})">Remove</button></div>`;
        wrap.appendChild(d);
    });
}
function addService(){
    const label = document.getElementById('serviceLabel').value.trim();
    const url = document.getElementById('serviceUrl').value.trim();
    if(!label || !url) return alert('label & url required');
    FOOTER.services = FOOTER.services || [];
    FOOTER.services.push({label, url});
    document.getElementById('serviceLabel').value='';document.getElementById('serviceUrl').value='';
    renderServices();
}
function removeService(i){
    FOOTER.services.splice(i,1);
    renderServices();
}
async function saveServices(){
    await sendUpdate({services: FOOTER.services});
}

/* gallery */
function renderGallery(){
    const wrap = document.getElementById('galleryList');
    wrap.innerHTML='';
    (FOOTER.gallery || []).forEach((g, idx) => {
        const img = document.createElement('div');
        img.style.width='120px'; img.style.position='relative'; img.style.margin='6px';
        img.innerHTML = `<img src="/${g}" style="width:100%;height:100px;object-fit:cover;border-radius:6px;"/>
            <div style="position:absolute;right:1px;top:1px;">
                <button style="width:10px;height:10px" onclick="deleteGallery(${idx})">x</button>
            </div>`;
        wrap.appendChild(img);
    });
}
async function uploadGalleryImage(e){
    const f = e.target.files[0];
    if(!f) return;
    if((FOOTER.gallery||[]).length >= 6) return alert('max 6 images');
    const fd = new FormData();
    fd.append('file', f);
    fd.append('type','gallery');

    const res = await fetch(API_BASE + '/footer/upload-image', {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': CSRF },
        body: fd
    });
    if(!res.ok) {
        const j = await res.json().catch(()=>({}));
        return alert(j.message || 'Upload failed');
    }
    const j = await res.json();
    // API auto-added URL to gallery on server; re-fetch footer for authoritative state:
    await fetchFooter();
}
async function deleteGallery(index){
    const ok = confirm('Delete this image?'); if(!ok) return;
    const res = await fetch(API_BASE + '/footer/gallery/' + index, { method: 'DELETE', headers: {'X-CSRF-TOKEN': CSRF} });
    if(!res.ok) return alert('Delete failed');
    await fetchFooter();
}

/* newsletter */
function renderNlSocials(){
    const wrap = document.getElementById('nlSocials');
    wrap.innerHTML='';
    (FOOTER.newsletter?.social_icons || []).forEach((s, idx) => {
        const div = document.createElement('div');
        div.style.display='flex'; div.style.justifyContent='space-between'; div.style.marginTop='6px';
        div.innerHTML = `<div><i class="${s.icon}"></i> ${s.url}</div><div><button onclick="removeNlSocial(${idx})">Remove</button></div>`;
        wrap.appendChild(div);
    });
}
function addNlSocial(){
    const icon = document.getElementById('nlIcon').value.trim();
    const url = document.getElementById('nlIconUrl').value.trim();
    if(!icon || !url) return alert('icon & url required');
    FOOTER.newsletter = FOOTER.newsletter || { social_icons: []};
    FOOTER.newsletter.social_icons.push({icon, url});
    document.getElementById('nlIcon').value='';document.getElementById('nlIconUrl').value='';
    renderNlSocials();
}
function removeNlSocial(i){ FOOTER.newsletter.social_icons.splice(i,1); renderNlSocials(); }
async function saveNewsletter(){
    const show = document.getElementById('nlShow').checked;
    const placeholder = document.getElementById('nlPlaceholder').value.trim();
    await sendUpdate({ newsletter: { ...FOOTER.newsletter, show, placeholder } });
}

/* bottom */
function renderBottomSocials(){
    const wrap = document.getElementById('bottomSocials');
    wrap.innerHTML='';
    (FOOTER.bottom?.social_icons || []).forEach((s, idx) => {
        const div = document.createElement('div');
        div.style.display='flex'; div.style.justifyContent='space-between'; div.style.marginTop='6px';
        div.innerHTML = `<div><i class="${s.icon}"></i> ${s.url}</div><div><button onclick="removeBottomSocial(${idx})">Remove</button></div>`;
        wrap.appendChild(div);
    });
}
function addBottomSocial(){
    const icon = document.getElementById('bottomIcon').value.trim();
    const url = document.getElementById('bottomIconUrl').value.trim();
    if(!icon || !url) return alert('icon & url required');
    FOOTER.bottom = FOOTER.bottom || { social_icons: [] };
    FOOTER.bottom.social_icons.push({icon, url});
    document.getElementById('bottomIcon').value='';document.getElementById('bottomIconUrl').value='';
    renderBottomSocials();
}
function removeBottomSocial(i){ FOOTER.bottom.social_icons.splice(i,1); renderBottomSocials(); }
async function saveBottom(){
    const copyright = document.getElementById('bottomCopyright').value;
    await sendUpdate({ bottom: { ...FOOTER.bottom, copyright } });
}

/* upload logo */
async function uploadLogo(e){
    const f = e.target.files[0];
    if(!f) return;
    const fd = new FormData();
    fd.append('file', f);
    fd.append('type','logo');
    const res = await fetch(API_BASE + '/footer/upload-image', {
        method: 'POST',
        headers: {'X-CSRF-TOKEN': CSRF},
        body: fd
    });
    if(!res.ok) return alert('logo upload failed');
    await fetchFooter();
}

/* generic send update - partial */
async function sendUpdate(payload){
    const res = await fetch(API_BASE + '/footer', {
        method: 'PUT',
        headers: {
            'Content-Type':'application/json',
            'X-CSRF-TOKEN': CSRF
        },
        body: JSON.stringify(payload)
    });
    if(!res.ok){
        const j = await res.json().catch(()=>({}));
        alert(j.message || 'Update failed');
        return;
    }
    await fetchFooter();
    alert('Saved');
}

/* preview */
function renderPreview(){
    const p = document.getElementById('footerPreview');
    const about = FOOTER.about || {};
    const services = FOOTER.services || [];
    const gallery = FOOTER.gallery || [];
    const nl = FOOTER.newsletter || {};
    const bottom = FOOTER.bottom || {};

    const count = gallery.length;
    let columns, imgSize;

    if (count === 1) {
        columns = 1;
        imgSize = "140px";
    } 
    else if (count === 2) {
        columns = 2;
        imgSize = "100px";
    }
    else if (count === 3) {
        columns = 2; // 2 + 1 arrangement
        imgSize = "90px";
    }
    else if (count === 4) {
        columns = 2;
        imgSize = "90px";
    }
    else if (count === 5) {
        columns = 3; // 3 + 2
        imgSize = "80px";
    }
    else if (count === 6) {
        columns = 3; // 3x3 layout (2 rows filled)
        imgSize = "80px";
    }
    else {
        // default for >6
        columns = 3;
        imgSize = "80px";
    }
    p.innerHTML = `
        <div style="display:flex; gap:16px;">
            <div style="flex:1;">
                ${ about.logo ? `<img src="/${about.logo}" style="width:104px;display:block;">` : '' }
                <div style="margin-top:8px;">${about.description || ''}</div>
                <div style="margin-top:8px;">
                    ${(about.contacts || []).map(c => `<div>${c.type}: ${c.value}</div>`).join('')}
                </div>
            </div>
            <div style="flex:1;">
                <h4 style="color:#fff">Services</h4>
                <ul>${services.map(s=>`<li>${s.label}</li>`).join('')}</ul>
            </div>
            <div style="flex:1;">
                <h4 style="color:#fff">Gallery</h4>
               <div style="display:grid; gap:6px; grid-template-columns:repeat(${columns},1fr); width:100%;">
                    ${gallery.map(g=>`
                        <img src="/${g}" style="height:${imgSize}; width:100%; object-fit:cover; border-radius:4px;">
                    `).join('')}
                </div>
              </div>
            <div style="flex:1;">
                <h4 style="color:#fff">Newsletter</h4>
                ${ nl.show ? `<div><input placeholder="${nl.placeholder || 'Enter email'}" style="padding:6px;border-radius:20px;width:70%"><button style="margin-left:6px;border-radius:20px;padding:6px 10px;background:#ffc107;border:none">Send</button></div>` : '<div>Hidden</div>'}
                <div style="margin-top:8px;">${(nl.social_icons||[]).map(s=>`<i class="${s.icon}"></i>`).join(' ')}</div>
            </div>
        </div>
        <div style="margin-top:12px;border-top:1px solid rgba(255,255,255,0.06);padding-top:8px;">
            <div>${bottom.copyright || ''}</div>
            <div style="margin-top:6px;">${(bottom.social_icons||[]).map(s=>`<i class="${s.icon}"></i>`).join(' ')}</div>
        </div>
    `;
}

window.addEventListener('DOMContentLoaded', fetchFooter);
</script>
</html>