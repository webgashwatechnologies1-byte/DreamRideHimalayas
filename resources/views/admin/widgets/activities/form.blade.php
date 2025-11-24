<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" class="form-control"
           name="content[title]"
           value="{{ $content['title'] ?? '' }}">
</div>

<div class="mb-3">
    <label class="form-label">Background Image</label>

    <input type="file" class="form-control" name="content[backImage]">

    @if(!empty($content['backImage']))
        <img src="/storage/{{ $content['backImage'] }}" class="mt-2" style="height:80px;border-radius:4px;">
    @endif
</div>

<hr>

<h4 class="mb-3">Activity Cards</h4>

<button type="button" class="btn btn-primary btn-sm mb-3" onclick="addActivityCard()">
    + Add Card
</button>

<div id="activities-wrapper">

    @foreach(($content['cards'] ?? []) as $i => $card)
    <div class="act-card border p-3 rounded mb-3">

        <button type="button" class="btn btn-danger btn-sm float-end"
                onclick="this.parentNode.remove()">X</button>

        <input type="hidden" name="content[cards][{{ $i }}][index]" value="{{ $i }}">

        <div class="mb-2">
            <label>Image</label>
            <input type="file" class="form-control"
                   name="content[cards][{{ $i }}][file]">
            @if(!empty($card['image']))
                <img src="/storage/{{ $card['image'] }}" class="mt-2"
                     style="height:70px;border-radius:4px;">
            @endif

            <input type="hidden" name="content[cards][{{ $i }}][image]" value="{{ $card['image'] }}">
        </div>

        <div class="mb-3">
            <label>Heading</label>
            <input type="text" class="form-control"
                   name="content[cards][{{ $i }}][heading]"
                   value="{{ $card['heading'] ?? '' }}">
        </div>

    </div>
    @endforeach

</div>


<script>
function addActivityCard() {
    let wrap = document.getElementById("activities-wrapper");
    let i = wrap.children.length;

    wrap.insertAdjacentHTML("beforeend", `
        <div class="act-card border p-3 rounded mb-3">

            <button type="button" class="btn btn-danger btn-sm float-end"
                    onclick="this.parentNode.remove()">X</button>

            <input type="hidden" name="content[cards][${i}][index]" value="${i}">

            <div class="mb-2">
                <label>Image</label>
                <input type="file" class="form-control"
                       name="content[cards][${i}][file]">
                <input type="hidden" name="content[cards][${i}][image]">
            </div>

            <div class="mb-3">
                <label>Heading</label>
                <input type="text" class="form-control"
                       name="content[cards][${i}][heading]">
            </div>

        </div>
    `);
}
</script>
