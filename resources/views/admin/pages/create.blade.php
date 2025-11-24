@extends('admin.layout')

@section('content')

<div id="wrapper">
    <div id="pagee" class="clearfix">

        @include('admin.components.sidebar')

        <div class="has-dashboard">

            @include('admin.components.header')

            <main id="main">
                <section class="profile-dashboard">

                   <form id="createPageForm" class="form-add-tour">
               @csrf

                        <div class="widget-dash-board pr-256 mb-75">
                            <h4 class="title-add-tour mb-30">Add New Page</h4>

                            <!-- Title + Slug -->
                            <div class="grid-input-2 mb-45">
                                <div class="input-wrap">
                                    <label>Page Title</label>
                                    <input type="text" name="title" placeholder="Enter page title" required>
                                </div>

                                <div class="input-wrap">
                                    <label>Slug (required)</label>
                                    <input type="text" name="slug" placeholder="This will be page url ">
                                </div>
                            </div>

                            <!-- Meta Title + Meta Description -->
                            <div class="grid-input-2 mb-45">
                                <div class="input-wrap">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" placeholder="SEO meta title">
                                </div>

                                <div class="input-wrap">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" placeholder="SEO description"></textarea>
                                </div>
                            </div>

                            <!-- Keywords Field -->
                            <div class="input-wrap mb-45">
                                <label>Keywords</label>
                                <div class="keyword-box" id="keywordBox"></div>
                                <input type="text" id="keywordInput" class="form-control mt-2" placeholder="Press Enter to add keyword">
                                <input type="hidden" name="keywords" id="keywordsField">
                            </div>

                            <!-- Status dropdown -->
                            <div class="input-wrap mb-45">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <!-- Save Button -->
                            <div class="input-wrap text-end mt-40">
                                <button type="submit" class="button-add">Save Page</button>
                            </div>

                        </div>

                    </form>

                </section>
            </main>

        </div>
    </div>
</div>

<style>
.keyword-box {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}
.keyword-tag {
    padding: 6px 12px;
    background: #eef3ff;
    border-radius: 20px;
    border: 1px solid #d0d7ff;
    display: flex;
    align-items: center;
    gap: 6px;
}
.keyword-tag span {
    cursor: pointer;
    font-weight: bold;
}
</style>

<script>
(() => {
    let keywords = [];

    const input = document.getElementById("keywordInput");
    const box = document.getElementById("keywordBox");
    const hidden = document.getElementById("keywordsField");

    input.addEventListener("keydown", e => {
        if (e.key === "Enter") {
            e.preventDefault();
            let val = input.value.trim();
            if (val !== "") {
                keywords.push(val);
                updateKeywords();
                input.value = "";
            }
        }
    });

    function updateKeywords() {
        box.innerHTML = "";
        keywords.forEach((k, i) => {
            box.innerHTML += `
                <div class="keyword-tag">${k} 
                    <span onclick="removeKeyword(${i})">×</span>
                </div>`;
        });
        hidden.value = keywords.join(',');
    }

    window.removeKeyword = i => {
        keywords.splice(i, 1);
        updateKeywords();
    }
})();
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById("createPageForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    let response = await fetch("{{ route('admin.pages.store') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: formData
    });

    let result = await response.json();

    if (result.status === 'error') {
        Swal.fire({
            icon: "error",
            title: "Error!",
            text: result.message
        });
        return;
    }

    Swal.fire({
        icon: "success",
        title: "Success!",
        text: result.message
    });

    // Optional: Reset form
    document.getElementById("createPageForm").reset();
});
</script>

@endsection
