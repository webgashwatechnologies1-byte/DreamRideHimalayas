<div class="subhero-widget">

    <details class="mb-3">
        <summary>Heading</summary>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="content[title]" value="{{ $content['title'] ?? '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Subtitle</label>
            <input type="text" name="content[subtitle]" value="{{ $content['subtitle'] ?? '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea class="form-control" name="content[description]">{{ $content['description'] ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Button Text</label>
            <input type="text" name="content[btn]" value="{{ $content['btn'] ?? '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Button URL</label>
            <input type="text" name="content[btnurl]" value="{{ $content['btnurl'] ?? '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Sidebar Text</label>
            <input type="text" name="content[sidebar]" value="{{ $content['sidebar'] ?? '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Head</label>
            <input type="text" name="content[head]" value="{{ $content['head'] ?? '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Body</label>
            <input type="text" name="content[body]" value="{{ $content['body'] ?? '' }}" class="form-control">
        </div>

    </details>

    <hr>

    <h4>Main Images</h4>

    <div class="mb-3">
        <label>Back Image</label>
        <input type="file" name="content[imageback]" class="form-control">
        @if(!empty($content['imageback']))
            <img src="/{{ $content['imageback'] }}" style="max-width:150px" class="mt-2">
        @endif
    </div>

    <div class="mb-3">
        <label>Front Image</label>
        <input type="file" name="content[imagefront]" class="form-control">
        @if(!empty($content['imagefront']))
            <img src="/{{ $content['imagefront'] }}" style="max-width:150px" class="mt-2">
        @endif
    </div>

    <hr>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Cards</h4>
        <button type="button" class="btn btn-primary" onclick="addSubHeroCard()">+ Add Card</button>
    </div>

    <div id="subHeroCardsWrapper"></div>

</div>

<script>
let subHeroIndex = 0;
let savedSubHeroCards = @json($content['cards'] ?? []);

function addSubHeroCard(existing = null) {
    let id = subHeroIndex++;

    let icon = existing?.icon ?? "";
    let title = existing?.title ?? "";
    let description = existing?.description ?? "";

    let html = `
        <div class="post-card-input mb-3" id="subhero_${id}">
            <div class="delete-card-btn" onclick="removeSubHero(${id})">
                <i class="fa fa-times"></i>
            </div>

            <div class="mb-2">
                <label>Icon</label>
                <input type="text" name="content[cards][${id}][icon]" value="${icon}" class="form-control">
            </div>

            <div class="mb-2">
                <label>Title</label>
                <input type="text" name="content[cards][${id}][title]" value="${title}" class="form-control">
            </div>

            <div class="mb-2">
                <label>Description</label>
                <input type="text" name="content[cards][${id}][description]" value="${description}" class="form-control">
            </div>
        </div>
    `;

    document.getElementById("subHeroCardsWrapper")
        .insertAdjacentHTML("beforeend", html);
}

function removeSubHero(id) {
    document.getElementById("subhero_" + id)?.remove();
}

document.addEventListener("DOMContentLoaded", () => {
    savedSubHeroCards.forEach(c => addSubHeroCard(c));
});
</script>
