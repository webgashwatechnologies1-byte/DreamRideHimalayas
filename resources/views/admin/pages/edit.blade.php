@extends('admin.layout')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<style>
    .keyword-box {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    }

    .keyword-tag {
        background: #eef3ff;
        padding: 6px 12px;
        border-radius: 20px;
        border: 1px solid #d0d7ff;
        display: flex;
        gap: 6px;
        align-items: center;
    }

    .keyword-tag span {
        font-weight: bold;
        cursor: pointer;
    }
    .page-builder-wrapper { display:flex; gap:25px; padding:0 30px 20px; height:calc(100vh - 120px); }
    .page-settings { width:25%; background:#fff; border-radius:16px; padding:25px; box-shadow:0 3px 14px rgba(0,0,0,0.06); overflow-y:auto; height:100%; }
    .page-preview { 
        width:75%; 
        background:#fff; 
        border-radius:16px; 
        padding:20px; 
        box-shadow:0 3px 14px rgba(0,0,0,0.06);
        height:100%;
        display: flex !important;
        flex-direction: column !important;
        gap:20px;

        /* SCROLL FIX */
        overflow-y: auto;
        overflow-x: hidden;
    }


    .btn-yellow { background:#f7c73a; border:none; padding:10px 16px; color:#111; border-radius:8px; font-weight:600; }
    details[open] .toggle-icon {
         transform: rotate(90deg);
        }
        .toggle-icon {
            transition: 0.2s;
            display: inline-block;
        }
        summary::-webkit-details-marker {
            display: none;
        }
        summary {
            list-style: none;
        }
    .swal2-container {
        z-index: 999999 !important;
        position: fixed !important;
    }
    
</style>

{{-- HEADER --}}
<div class="tf-container full" style="padding: 25px 40px;">
    <div class="d-flex justify-content-between  align-items-center">
        <h3 class="m-0">{{ $page->title }}</h3>
        <a href="{{ route('admin.pages.index') }}" class="btn-yellow">← Back</a>
    </div>
</div>


<div class="page-builder-wrapper">


{{-- LEFT PANEL --}}
<div class="page-settings">

    {{-- PAGE INFO --}}
    <h4 class="mb-4">Page Settings</h4>
<details class="border rounded p-3">
  <summary>Edit Page Details</summary>
    <form action="{{ route('admin.pages.update', $page->id) }}" onsubmit="{(e)=>{e.preventDefault();}}" method="POST">
        @csrf @method('PUT')

        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $page->title }}">
            </div>

           @if(in_array($page->slug, ['home', 'about-us']))
                <input type="hidden" name="slug" value="{{ $page->slug }}">
                <div class="col-md-6">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" readonly value="{{ $page->slug }}" disabled>
                    <small class="text-muted">This slug cannot be changed.</small>
                </div>
            @else
                <div class="col-md-6">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ $page->slug }}">
                </div>
            @endif

        </div>


        <div class="input-wrap mb-20">
            <label>Meta Title</label>
            <input type="text" name="meta_title" value="{{ $page->meta_title }}">
        </div>

        <div class="input-wrap mb-20">
            <label>Meta Description</label>
            <textarea name="meta_description">{{ $page->meta_description }}</textarea>
        </div>

        <div class="input-wrap mb-20">
            <label>Keywords</label>

            <!-- display existing tags   -->
            @php
                $keywords = is_array($page->keywords) 
                            ? $page->keywords 
                            : json_decode($page->keywords, true);
            @endphp

            <div id="editKeywordBox" class="keyword-box mb-2">
                @foreach($keywords ?? [] as $kw)
                    <div class="keyword-tag">
                        {{ $kw }}
                        <span onclick="removeEditKeyword('{{ $kw }}')">×</span>
                    </div>
                @endforeach
            </div>


            <!-- input for new tags -->
            <input type="text" id="editKeywordInput" class="form-control" placeholder="Press Enter to add keyword">

            <!-- hidden field to store final keywords -->
            <input type="hidden" name="keywords" id="editKeywordsField"
                value="{{ is_array($page->keywords) ? implode(',', $page->keywords) : '' }}">
        </div>

        <button type="submit" class="button-add w-100 mt-3">Save Page</button>
    </form>
</details>
    <hr class="my-4">

    <details class="border rounded p-3">
        <summary>+ Add Sections</summary>
         {{-- ADD SECTION --}}
            <h4 class="my-3">Sections</h4>

            <form action="{{ route('admin.pages.addSection', $page->id) }}" method="POST">
                @csrf

                <select name="section_type" class="form-select p-2 mb-3">
                    @foreach($widgets as $widget)
                        <option class="p-2" value="{{ $widget }}">{{ ucfirst($widget) }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn-yellow w-100">+ Add Section</button>
            </form>
    </details>

    <hr class="my-4">

    {{-- EDIT SECTIONS --}}
 @if($page->sections->count() > 0)
    <h4 class="my-3">Manage Sections</h4>
<div id="sortable-sections">
    @foreach($page->sections as $section)
      <details class="border rounded mt-2 p-2 section-item"
                 data-id="{{ $section->id }}">
                                  <summary class="d-flex justify-content-between align-items-center">

                                                <div class="d-flex align-items-center gap-2">
                                                    <!-- Open/Close Icon -->
                                                    <span class="toggle-icon me-2">▸</span>

                                                    <!-- Section Name -->
                                                    <span>{{ ucfirst($section->section_type) }}</span>
                                                </div>

                                                <div class="d-flex align-items-center gap-3">

                                                    <!-- DELETE ICON -->
                                                  <i class="fa-solid fa-trash text-danger delete-section"
                                                    data-id="{{ $section->id }}"
                                                    style="cursor:pointer;"></i>

                                                    <!-- DRAG ICON -->
                                                    <i class="fa-solid fa-grip-vertical" style="cursor:grab;"></i>
                                                </div>

                                            </summary>


              <div class="mb-4 p-3" style="border:1px dashed #ccc; border-radius:10px;">

                    <strong>{{ ucfirst($section->section_type) }}</strong>

                    <form class="widget-form"
                            id="form-{{ $section->id }}"
                           action="{{ route('admin.pages.updateSection.' . $section->section_type, $section->id) }}"
                            enctype="multipart/form-data"
                            onsubmit="return false;">

                        
                        @includeIf("admin.widgets.$section->section_type.form", [
                            'content' => $section->content,
                            'section' => $section
                        ])

                        <input type="hidden" name="content_json" class="act-json">

                                <button type="submit"
                                        class="save-widget btn-yellow w-100 mt-2"
                                        data-id="{{ $section->id }}">
                                    Save Changes
                        </button>
                    </form>

                  <form action="{{ route('admin.pages.deleteSection', $section->id) }}"
                    method="POST"
                    class="delete-form-{{ $section->id }}"
                    style="display:none;">
                    @csrf
                    @method('DELETE')
                </form>


         </div>
       </details>
    @endforeach
</div>
@endif
</div>


{{-- RIGHT PREVIEW --}}
<div class="page-preview container" id="previewArea">

        <h4 class="mb-3">Live Preview</h4>
        {{-- @include("cms.layout.header"); --}}
                @if($page->sections->count() == 0)
                    <div class="alert alert-info text-center my-4">
                        No sections added yet.  
                        <br>
                        Add a section from the left panel ➕
                    </div>
                @else
                    @foreach($page->sections as $section)
                        <div id="widget-{{ $section->id }}" class="widget-wrapper mb-5 mt-5" style="width:100%; position:relative; display:block;">
                            @includeIf("widgets.$section->section_type.render", [
                                'content' => $section->content,
                                'section' => $section
                            ])
                        </div>
                    @endforeach
                @endif

        {{-- @include("cms.layout.footer"); --}}

    </div>

</div>
<div id="savingLoader" 
     style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
            background:rgba(255,255,255,0.7); z-index:999999; 
            align-items:center; justify-content:center;">
    <div class="spinner-border text-warning" style="width:4rem; height:4rem;"></div>
</div>

<script src="/app/js/jquery.min.js"></script>
<script src="/app/js/jquery.nice-select.min.js"></script>
<script src="/app/js/bootstrap.min.js"></script>
<script src="/app/js/jquery.magnific-popup.min.js"></script>
<script src="/app/js/countto.js"></script>
<script src="/app/js/swiper-bundle.min.js"></script>
<script src="/app/js/swiper.js"></script>
<script src="/app/js/plugin.js"></script>
<script src="/app/js/jquery.fancybox.js"></script>
<script src="/app/js/map.min.js"></script>
<script src="/app/js/map.js"></script>
<script src="/app/js/shortcodes.js"></script>
<script src="/app/js/main.js"></script>
    <script src="/app/js/admin-auth-guard.js"></script>

<script>

  

window.refreshSectionPreview = function(id) {
    $.get("/admin/sections/" + id + "/render", function(html) {

        // FIX 1: update preview wrapper
        if ($("#widget-" + id).length) {
            $("#widget-" + id).html(html);   // for new structure
        }
        if ($("#preview-section-" + id).length) {
            $("#preview-section-" + id).html(html); // for old structure
        }

        // FIX 2: reload form fields WITHOUT removing event listeners
        $("#form-" + id).load(location.href + " #form-" + id + " > *", function () {
            console.log("Form reloaded for section:", id);
        });

    });
};


document.addEventListener("DOMContentLoaded", function () {

    const sortable = new Sortable(document.getElementById("sortable-sections"), {
        animation: 150,
        handle: 'summary', // drag using the summary bar
        ghostClass: 'sortable-ghost',
        onEnd: function () {
            let orderedData = [];

            document.querySelectorAll(".section-item").forEach((el, index) => {
                orderedData.push({
                    id: el.dataset.id,
                    order_index: index + 1
                });
            });


            // SEND TO API
           fetch("{{ route('admin.pages.updateOrder', $page->id) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ sections :orderedData})
            })
            .then(res => res.json())
            .then(data => {
                console.log("ORDER SAVED:", data);
            });
        }
    });

});

</script>
<script>



function setDeepValue(obj, path, value) {
    let current = obj;

    for (let i = 0; i < path.length; i++) {
        let key = path[i];

        // If last key → set value
        if (i === path.length - 1) {
            current[key] = value;
            return;
        }

        // Build array or object based on next key
        if (current[key] === undefined) {
            current[key] = isNaN(path[i + 1]) ? {} : [];
        }

        current = current[key];
    }
}

function buildWidgetJSON(form) {
    let data = {};

    // Loop through all inputs that are NOT file inputs
    form.find("[name^='content']").each(function () {

        let input = $(this);

        // Ignore files → backend handles them
        if (input.attr("type") === "file") return;

        let name = input.attr("name");   // example: content[cards][0][title]
        let value = input.val();

        // Extract path inside content
        let path = name
            .replace("content", "")       // remove content
            .replace(/\]/g, "")           // remove ]
            .split(/\[/)                  // split by [
            .filter(Boolean);             // remove empty parts

        // Set value deep inside JSON
        setDeepValue(data, path, value);
    });

    return data;
}


$(document).ready(function () {

   $(".widget-form").on("submit", function (e) {
    e.preventDefault();

    let form = this;
    let fd = new FormData(form);
    let id = $(form).find(".save-widget").data("id");
    const toast = new ToastMagic();
      $("#savingLoader").fadeIn();
    fetch(form.action, {
        method: "POST",
        body: fd
    })
    .then(res => res.json())
    .then(data => {
        refreshSectionPreview(id); // <-- REQUIRED
$("#savingLoader").fadeOut();
          toast.success('Saved!', 'Updated successfully!');

    });
});


});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".delete-section").forEach(btn => {

        btn.addEventListener("click", function (e) {
            e.stopPropagation(); // prevent opening detail

            let id = this.dataset.id;
            let form = document.querySelector(`.delete-form-${id}`);
            let sectionBox = document.querySelector(`details[data-id="${id}"]`);

            Swal.fire({
                title: "Are you sure?",
                text: "This section will be deleted permanently.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it"
            }).then(result => {

                if (!result.isConfirmed) return;

                // Convert form to AJAX request
                let fd = new FormData(form);

                fetch(form.action, {
                    method: "POST",
                    body: fd
                })
                .then(res => res.json())
                .then(data => {

                    // Remove from DOM
                    if (sectionBox) {
                        sectionBox.remove();
                   
                    }
                let preview = document.querySelector("#widget-" + id);
                    if (preview) preview.remove();

                    Swal.fire(
                        "Deleted!",
                        "Section removed successfully.",
                        "success"
                    );
                });
            });

        });

    });

});
</script>
<script>
(() => {

    let keywords = [];

    // Load existing keywords from hidden input
    const hidden = document.getElementById("editKeywordsField");
    const box = document.getElementById("editKeywordBox");
    const input = document.getElementById("editKeywordInput");

    if (hidden.value.trim() !== "") {
        keywords = hidden.value.split(',').map(k => k.trim());
    }

    updateUI();

    // Add keyword on Enter
    input.addEventListener("keydown", e => {
        if (e.key === "Enter") {
            e.preventDefault();
            let val = input.value.trim();
            if (val !== "" && !keywords.includes(val)) {
                keywords.push(val);
                input.value = "";
                updateUI();
            }
        }
    });

    // Remove keyword
    window.removeEditKeyword = function(keyword) {
        keywords = keywords.filter(k => k !== keyword);
        updateUI();
    };

    function updateUI() {
        box.innerHTML = "";
        keywords.forEach(k => {
            box.innerHTML += `
                <div class="keyword-tag">
                    ${k}
                    <span onclick="removeEditKeyword('${k}')">×</span>
                </div>`;
        });

        hidden.value = keywords.join(',');
    }

})();
</script>

@endsection
