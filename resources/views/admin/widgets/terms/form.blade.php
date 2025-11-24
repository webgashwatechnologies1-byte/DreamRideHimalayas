<div class="mb-3">
    <label class="form-label">Main Title</label>
    <input type="text" class="form-control"
           name="content[title]"
           value="{{ $content['title'] ?? '' }}"
           placeholder="Enter Terms & Conditions Title">
</div>

<hr>

<h4 class="mb-2">Cards</h4>
<button type="button" class="btn btn-sm btn-primary mb-3" onclick="addTCcard()">+ Add Card</button>

<div id="tc-cards-wrapper">
    @php $existing = $content['cards'] ?? []; @endphp

    @foreach($existing as $i => $card)
        <div class="tc-card-box border p-3 mb-3 rounded" data-index="{{ $i }}">
            <button type="button" class="btn btn-sm btn-danger float-end"
                    onclick="this.parentNode.remove()">Remove</button>

            <div class="mb-2">
                <label>Card Name</label>
                <input type="text" name="content[cards][{{ $i }}][name]"
                       class="form-control"
                       value="{{ $card['name'] ?? '' }}">
            </div>

            <div class="mb-2">
                <label>Description (HTML)</label>
                <textarea class="form-control tc-editor"
                          id="tc-editor-{{ $i }}"
                          name="content[cards][{{ $i }}][description]">
                    {!! $card['description'] ?? '' !!}
                </textarea>
            </div>
        </div>
    @endforeach
</div>

{{-- LOAD TinyMCE v8 --}}
<script src="/app/js/tinymce/tinymce.min.js"></script>

<script>
/* ------------------------------------------
   INITIALIZE TINYMCE (Same as Blog Page)
------------------------------------------- */
function initTCeditors() {

    tinymce.init({
        selector: '.tc-editor',
        license_key: 'gpl',
        height: 350,
        menubar: false,
        branding: false,
        plugins: 'lists link image media table code fullscreen paste',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link | code fullscreen',
        relative_urls: false,
        convert_urls: false,
        paste_data_images: true,
        valid_elements: '*[*]',

        file_picker_callback: function(callback, value, meta) {
            const input = document.createElement('input');
            input.type = 'file';

            if (meta.filetype === 'image') input.accept = 'image/*';
            else input.accept = '*/*';

            input.onchange = async function() {
                const file = this.files[0];
                const fd = new FormData();
                fd.append("file", file);

                const res = await fetch("/api/editor/upload-image", {
                    method: "POST",
                    body: fd
                });

                const json = await res.json();

                let url = json.location || json.url;
                if(!url) return alert("Upload failed");

                callback(url, { alt: file.name });
            };

            input.click();
        }
    });
}

/* Run on first load */
document.addEventListener("DOMContentLoaded", initTCeditors);



/* ------------------------------------------
   ADD CARD DYNAMICALLY
------------------------------------------- */
function addTCcard() {
    let wrapper = document.getElementById("tc-cards-wrapper");
    let index = wrapper.children.length;

    let html = `
        <div class="tc-card-box border p-3 mb-3 rounded" data-index="${index}">
            <button type="button" class="btn btn-sm btn-danger float-end"
                    onclick="this.parentNode.remove()">Remove</button>

            <div class="mb-2">
                <label>Card Name</label>
                <input type="text" name="content[cards][${index}][name]" class="form-control">
            </div>

            <div class="mb-2">
                <label>Description (HTML)</label>
                <textarea class="form-control tc-editor"
                          id="tc-editor-${index}"
                          name="content[cards][${index}][description]"></textarea>
            </div>
        </div>
    `;

    wrapper.insertAdjacentHTML("beforeend", html);

    // Destroy all editors and re-init properly
    tinymce.remove();
    initTCeditors();
}
</script>
