<div class="world-widget">

    <details>
        <summary>Heading</summary>

        <!-- Main Title -->
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" 
                   name="content[title]"  
                   value="{{ $content['title'] ?? '' }}"
                   class="form-control" 
                   placeholder="Enter Title">
        </div>

        <!-- Subtitle -->
        <div class="mb-3">
            <label class="form-label">Subtitle</label>
            <input type="text" 
                   name="content[subtitle]"  
                   value="{{ $content['subtitle'] ?? '' }}"
                   class="form-control" 
                   placeholder="Enter Subtitle">
        </div>

    </details>

    <hr>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Cards</h4>
        <button type="button" class="btn btn-main-small" onclick="addWorldCard()">+ Add Card</button>
    </div>

    <div id="worldCardsWrapper"></div>

</div>

<style>
.world-card {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
    background: #fafafa;
    position: relative;
}
.delete-card-btn {
    position: absolute;
    top: 8px;
    right: 8px;
    background: red;
    color: white;
    width: 26px;
    height: 26px;
    border-radius: 50%;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
</style>

<script>
let worldIndex = 0;
let worldSavedCards = @json($content['cards'] ?? []);

/* Add a new card */
function addWorldCard(existing = null) {

    let id = worldIndex++;

    const html = `
        <div class="world-card" id="world_card_${id}">

            <div class="delete-card-btn" onclick="removeWorldCard(${id})">
                <i class="fa fa-times"></i>
            </div>

            <div class="mb-3">
                <label>Icon</label>
                <input type="text" 
                       name="content[cards][${id}][icon]" 
                       value="${existing?.icon ?? ''}" 
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Title</label>
                <input type="text" 
                       name="content[cards][${id}][title]" 
                       value="${existing?.title ?? ''}" 
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Subtitle</label>
                <input type="text" 
                       name="content[cards][${id}][subtitle]" 
                       value="${existing?.subtitle ?? ''}" 
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Button Title</label>
                <input type="text" 
                       name="content[cards][${id}][btntitle]" 
                       value="${existing?.btntitle ?? ''}" 
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Button URL</label>
                <input type="text" 
                       name="content[cards][${id}][btnurl]" 
                       value="${existing?.btnurl ?? ''}" 
                       class="form-control">
            </div>

        </div>
    `;

    document.getElementById("worldCardsWrapper").insertAdjacentHTML("beforeend", html);
}

/* Delete card */
function removeWorldCard(id) {
    document.getElementById("world_card_" + id)?.remove();
    renumberWorldCards();
}

/* Re-number card names after deletion */
function renumberWorldCards() {
    let cards = document.querySelectorAll(".world-card");
    worldIndex = 0;

    cards.forEach(card => {
        let newId = worldIndex++;
        card.id = "world_card_" + newId;

        card.querySelectorAll("input").forEach(input => {
            input.name = input.name.replace(/\[\d+\]/, `[${newId}]`);
        });
    });
}

/* Load existing cards */
document.addEventListener("DOMContentLoaded", () => {
    worldSavedCards.forEach(card => addWorldCard(card));
});
</script>
