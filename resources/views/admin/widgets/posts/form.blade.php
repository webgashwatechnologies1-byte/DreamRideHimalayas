<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts Section</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        .post-card-input {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            position: relative;
            background: #fafafa;
        }
        .preview-img {
            width: 100%;
            border-radius: 6px;
            margin-top: 10px;
        }
        .delete-card-btn {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 28px;
            height: 28px;
            background: red;
            color: #fff;
            border-radius: 50%;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .icon-preview {
            font-size: 38px;
            margin-top: 8px;
            color: #007bff;
        }
    </style>
</head>
<body>
<div>

    <!-- TITLE -->
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="content[title]" value="{{ $content['title'] ?? '' }}" class="form-control">
    </div>

    <!-- SUBTITLE -->
    <div class="mb-3">
        <label class="form-label">Subtitle</label>
        <input type="text" name="content[subtitle]" value="{{ $content['subtitle'] ?? '' }}" class="form-control">
    </div>

    <hr class="my-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Post Cards</h4>
        <button type="button" class="btn btn-primary add-post-card">+ Add Card</button>
    </div>

    <div class="posts-cards-wrapper"></div>

</div>

{{-- WIDGET SCRIPTS --}}
<script>
(function() {

    let wrapper = document.currentScript.previousElementSibling.querySelector('.posts-cards-wrapper');
    let addBtn  = document.currentScript.previousElementSibling.querySelector('.add-post-card');

    let cardIndex = 0;
    let savedData = @json($content['cards'] ?? []);

    function addCard(existing = null) {

        let id = cardIndex++;

        let imgSrc = existing?.image ? `/${existing.image}` : "";
        let iconClass = existing?.icon ?? "";

        let html = `
            <div class="post-card-input" id="card_${id}">
                
                <div class="delete-card-btn" onclick="this.parentElement.remove()">
                    <i class="fa fa-times"></i>
                </div>

                <label>Image</label>
        `;

        if (imgSrc) {
            html += `
                <img src="${imgSrc}" id="preview_${id}" class="preview-img">

                <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                    onclick="this.nextElementSibling.classList.remove('d-none')">
                    Change Image
                </button>

                <input type="file"
                    name="content[cards][${id}][image]"
                    class="form-control d-none"
                    onchange="previewImage(event, ${id})">
            `;
        } else {
            html += `
                <input type="file"
                    name="content[cards][${id}][image]"
                    class="form-control"
                    onchange="previewImage(event, ${id})">

                <img id="preview_${id}" class="preview-img d-none">
            `;
        }

        html += `
            <label class="form-label mt-3">Icon</label>
            <input type="text"
                   name="content[cards][${id}][icon]"
                   class="form-control"
                   value="${iconClass}"
                   oninput="document.getElementById('iconPrev_${id}').className = this.value + ' icon-preview'">

            <i id="iconPrev_${id}" class="${iconClass} icon-preview"></i>

            </div>
        `;

        wrapper.insertAdjacentHTML("beforeend", html);
    }

    window.previewImage = function (e, id) {
        const file = e.target.files[0];
        if (!file) return;

        document.getElementById("preview_" + id).src = URL.createObjectURL(file);
        document.getElementById("preview_" + id).classList.remove("d-none");
    }

    addBtn.addEventListener("click", () => addCard());
    savedData.forEach(card => addCard(card));

})();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
