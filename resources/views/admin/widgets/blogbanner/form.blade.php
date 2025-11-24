@php
    $mainBlog = $content['main']['blogid'] ?? null;
    $selectedBlogs = $content['blogs'] ?? [];
@endphp

<div class="mb-3">
    <label>Title</label>
    <input type="text" class="form-control"
           name="content[title]"
           value="{{ $content['title'] ?? '' }}">
</div>

<div class="mb-3">
    <label>Subtitle</label>
    <input type="text" class="form-control"
           name="content[subtitle]"
           value="{{ $content['subtitle'] ?? '' }}">
</div>

<hr>

<h4>Main Blog (Featured Blog)</h4>

<input type="text" class="form-control mb-2" placeholder="Search Main Blog…" id="main-blog-search">

<select name="content[main][blogid]" id="main-blog-select" class="form-control mb-4">
    <option value="">Select Main Blog</option>
</select>

<hr>

<h4 class="mb-2">Select Additional Blogs (Max 3)</h4>

<div class="">
    <div class="col-md-12">
        <h6>All Blogs</h6>
        <input type="text" id="blog-search" placeholder="Search..." class="form-control mb-2">

        <div class="border rounded p-2"
             id="available-blogs"
             style="height: 330px; overflow-y:auto;">
            Loading…
        </div>
    </div>

    <div class="col-md-12">
        <h6>Selected Blogs</h6>

        <div class="border rounded p-2"
             id="selected-blogs"
             style="height: 330px; overflow-y:auto;">
        </div>

        <div id="hidden-blog-inputs">
            @foreach($selectedBlogs as $bid)
                <input type="hidden" name="content[blogs][]" value="{{ $bid }}">
            @endforeach
        </div>
    </div>
</div>

<script>
let allBlogs = [];
let selectedBlogIds = @json($selectedBlogs ?? []);
let mainSelectedBlog = "{{ $mainBlog }}";
let blogsLoaded = false;

// ---- MAIN LOADER ----
async function loadBlogs() {
    try {
        let r = await fetch("/api/blogs/list/simple");
        let json = await r.json();

        allBlogs = json.data || [];
        blogsLoaded = true;
        
        renderMainBlogList();
        renderAvailableBlogs();
        renderSelectedBlogs();

    } catch (e) {
        console.error("Blog Load Error:", e);
    }
}

document.addEventListener("DOMContentLoaded", loadBlogs);

// ---------------------------------------------------------
// SEARCH BLOCKING UNTIL LOADED
// ---------------------------------------------------------
document.getElementById("blog-search").addEventListener("input", function () {
    if (!blogsLoaded) return;
    renderAvailableBlogs(this.value.toLowerCase());
});

document.getElementById("main-blog-search").addEventListener("input", function () {
    if (!blogsLoaded) return;
    renderMainBlogList(this.value.toLowerCase());
});

// ---------------------------------------------------------
// MAIN BLOG DROPDOWN
// ---------------------------------------------------------
function renderMainBlogList(search = "") {
    const select = document.getElementById("main-blog-select");

    if (!blogsLoaded) {
        select.innerHTML = `<option>Loading…</option>`;
        return;
    }

    select.innerHTML = `<option value="">Select Main Blog</option>`;

    let list = allBlogs.filter(b => b.title.toLowerCase().includes(search));

    list.forEach(b => {
        select.insertAdjacentHTML("beforeend", `
            <option value="${b.id}" ${mainSelectedBlog == b.id ? "selected" : ""}>
                ${b.title}
            </option>
        `);
    });
}

// ---------------------------------------------------------
// AVAILABLE BLOGS LIST
// ---------------------------------------------------------
function renderAvailableBlogs(search = "") {
    const box = document.getElementById("available-blogs");

    if (!blogsLoaded) {
        box.innerHTML = "<p class='text-muted'>Loading blogs…</p>";
        return;
    }

    box.innerHTML = "";

    let list = allBlogs.filter(b => b.title.toLowerCase().includes(search));

    if (!list.length) {
        box.innerHTML = "<p class='text-muted text-center'>No blogs found</p>";
        return;
    }

    list.forEach(b => {
        box.insertAdjacentHTML("beforeend", `
            <div class="d-flex justify-content-between border rounded p-2 mb-2 bg-white">
                <div>${b.title}</div>
                <button type="button" class="btn btn-sm btn-outline-primary">Add</button>
            </div>
        `);

        // 🔥 FIXED → ADD WORKING NOW
        box.lastElementChild.querySelector("button").addEventListener("click", () => {
            if (selectedBlogIds.length >= 3) {
                alert("You can select max 3 blogs.");
                return;
            }

            selectedBlogIds.push(b.id);
            renderSelectedBlogs();
        });
    });
}

// ---------------------------------------------------------
// SELECTED BLOG LIST
// ---------------------------------------------------------
function renderSelectedBlogs() {
    const box = document.getElementById("selected-blogs");
    const hidden = document.getElementById("hidden-blog-inputs");

    if (!blogsLoaded) {
        box.innerHTML = "<p class='text-muted'>Loading…</p>";
        return;
    }

    box.innerHTML = "";
    hidden.innerHTML = "";

    if (!selectedBlogIds.length) {
        box.innerHTML = "<p class='text-muted'>No blogs selected.</p>";
        return;
    }

    selectedBlogIds.forEach((id, index) => {
        let blog = allBlogs.find(b => b.id == id);

        box.insertAdjacentHTML("beforeend", `
            <div class="d-flex justify-content-between border rounded p-2 mb-2 bg-light">
                <div>${blog ? blog.title : "Blog #" + id}</div>
                <button type="button" class="btn btn-sm btn-outline-danger">&times;</button>
            </div>
        `);

        // 🔥 FIXED REMOVE BUTTON
        box.lastElementChild.querySelector("button").addEventListener("click", () => {
            selectedBlogIds.splice(index, 1);
            renderSelectedBlogs();
        });

        hidden.insertAdjacentHTML("beforeend",
            `<input type="hidden" name="content[blogs][]" value="${id}">`
        );
    });
}
</script>
