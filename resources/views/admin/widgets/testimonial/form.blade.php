<div class="testimonial-widget">

    <details class="mb-3">
        <summary>Main Images</summary>

        <!-- Image 1 -->
        <div class="mb-3">
            <label class="form-label">Image 1</label>

            @if(!empty($content['image1']))
                <img src="/{{ $content['image1'] }}" style="width:150px;border-radius:6px;" class="mb-2">
            @endif

            <input type="file" name="content[image1]" class="form-control">
        </div>

        <!-- Image 2 -->
        <div class="mb-3">
            <label class="form-label">Image 2</label>

            @if(!empty($content['image2']))
                <img src="/{{ $content['image2'] }}" style="width:150px;border-radius:6px;" class="mb-2">
            @endif

            <input type="file" name="content[image2]" class="form-control">
        </div>

    </details>

    <hr class="my-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Reviews</h4>
        <button type="button" class="btn btn-primary" onclick="addReview()">+ Add Review</button>
    </div>

    <!-- Reviews Container -->
    <div id="reviewsWrapper"></div>

</div>

<script>
let reviewIndex = 0;
let savedReviews = @json($content['reviews'] ?? []);

/* ==========================================================
    ADD REVIEW
========================================================== */
function addReview(existing = null) {
    let id = reviewIndex++;

    let name  = existing?.name ?? "";
    let desc  = existing?.description ?? "";
    let image = existing?.image ?? "";

    let preview = image ? `<img src="/${image}" class="img-preview mb-2" style="width:120px;border-radius:6px;">` : "";

    let html = `
        <div class="review-box border p-3 mb-3 rounded position-relative" id="review_${id}">

            <span class="btn btn-danger btn-sm position-absolute" 
                  style="top:5px; right:5px;" 
                  onclick="removeReview(${id})">
                X
            </span>

            <div class="mb-3">
                <label>Name</label>
                <input type="text" 
                       name="content[reviews][${id}][name]" 
                       value="${name}" 
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="content[reviews][${id}][description]" 
                          class="form-control">${desc}</textarea>
            </div>

            <div class="mb-3">
                <label>Avatar Image</label>

                ${preview}

                <input type="file" 
                       name="content[reviews][${id}][image]" 
                       class="form-control">
            </div>

        </div>
    `;

    document.getElementById("reviewsWrapper").insertAdjacentHTML("beforeend", html);
}

function removeReview(id) {
    document.getElementById("review_" + id)?.remove();
    renumberReviews();
}

function renumberReviews() {
    let items = document.querySelectorAll(".review-box");
    reviewIndex = 0;

    items.forEach(box => {
        let newId = reviewIndex++;

        box.id = "review_" + newId;

        box.querySelectorAll("input, textarea").forEach((input) => {
            input.name = input.name.replace(/\[\d+\]/, `[${newId}]`);
        });
    });
}

/* Load Existing */
document.addEventListener("DOMContentLoaded", () => {
    savedReviews.forEach(r => addReview(r));
});
</script>
