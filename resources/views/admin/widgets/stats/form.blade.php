<div class="stats-widget">

    <h4 class="mb-3">Stats Cards</h4>
    <button type="button" class="btn btn-primary mb-3" onclick="addStatsCard()">+ Add Card</button>

    <div id="statsCardsWrapper"></div>
</div>

<script>
let statsIndex = 0;
let savedStats = @json($content['cards'] ?? []);

function addStatsCard(existing = null) {
    let id = statsIndex++;
    let imagePreview = existing?.image ? '/' + existing.image : "";

    let html = `
        <div class="border rounded p-3 mb-3" id="statsCard_${id}">
            <button type="button" class="btn btn-danger btn-sm float-end" onclick="removeStatsCard(${id})">X</button>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="content[cards][${id}][image]" class="form-control">
                ${existing?.image ? `<img src="/${existing.image}" class="mt-2" style="height:80px;">` : ""}
            </div>

            <div class="mb-3">
                <label>Number / Count (Title)</label>
                <input type="text" name="content[cards][${id}][title]" class="form-control"
                       value="${existing?.title ?? ''}">
            </div>

            <div class="mb-3">
                <label>Subtitle</label>
                <input type="text" name="content[cards][${id}][subtitle]" class="form-control"
                       value="${existing?.subtitle ?? ''}">
            </div>
        </div>
    `;

    document.getElementById("statsCardsWrapper").insertAdjacentHTML("beforeend", html);
}

function removeStatsCard(id) {
    document.getElementById("statsCard_" + id)?.remove();
}

document.addEventListener("DOMContentLoaded", () => {
    savedStats.forEach(c => addStatsCard(c));
});
</script>
