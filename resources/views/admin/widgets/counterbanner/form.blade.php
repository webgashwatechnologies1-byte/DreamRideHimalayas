<div class="mb-3">
    <label>Title</label>
    <input type="text" class="form-control" 
           name="content[title]" 
           value="{{ $content['title'] ?? '' }}">
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea class="form-control" name="content[description]">{{ $content['description'] ?? '' }}</textarea>
</div>

<div class="mb-3">
    <label>Main Banner Image</label>
    <input type="file" class="form-control" name="content[image]">
    @if(!empty($content['image']))
        <img src="/storage/{{ $content['image'] }}" width="180" class="mt-2">
    @endif
</div>

<hr>
<h4>Button Settings</h4>

<div class="mb-3">
    <label>Button Text</label>
    <input type="text" class="form-control"
           name="content[button][btntext]"
           value="{{ $content['button']['btntext'] ?? '' }}">
</div>

<div class="mb-3">
    <label>Button URL</label>
    <input type="text" class="form-control"
           name="content[button][btnurl]"
           value="{{ $content['button']['btnurl'] ?? '' }}">
</div>

<hr>
<h4>Counter Cards</h4>

<button type="button" class="btn btn-primary btn-sm mb-3" onclick="addCounterCard()">+ Add Card</button>

<div id="counter-cards-wrapper">
    @foreach(($content['cards'] ?? []) as $i => $c)
    <div class="card-box border p-3 mb-3">

        <button type="button" class="btn btn-danger btn-sm float-end"
                onclick="this.parentNode.remove()">X</button>

        <input type="hidden" name="content[cards][{{ $i }}][index]" value="{{ $i }}">

        <div class="mb-2">
            <label>Number</label>
            <input type="text" class="form-control"
                   name="content[cards][{{ $i }}][number]"
                   value="{{ $c['number'] }}">
        </div>

        <div class="mb-2">
            <label>Title</label>
            <input type="text" class="form-control"
                   name="content[cards][{{ $i }}][title]"
                   value="{{ $c['title'] }}">
        </div>

        <div class="mb-2">
            <label>Image</label>
            <input type="file" class="form-control"
                   name="content[cards][{{ $i }}][file]">

            @if(!empty($c['image']))
                <img src="/storage/{{ $c['image'] }}" width="120" class="mt-2">
            @endif

            <input type="hidden" name="content[cards][{{ $i }}][image]"
                   value="{{ $c['image'] }}">
        </div>

    </div>
    @endforeach
</div>

<script>
function addCounterCard() {
    let w = document.getElementById("counter-cards-wrapper");
    let i = w.children.length;

    w.insertAdjacentHTML("beforeend", `
        <div class="card-box border p-3 mb-3">

            <button type="button" class="btn btn-danger btn-sm float-end" onclick="this.parentNode.remove()">X</button>

            <input type="hidden" name="content[cards][${i}][index]" value="${i}">

            <div class="mb-2">
                <label>Number</label>
                <input type="text" class="form-control" name="content[cards][${i}][number]">
            </div>

            <div class="mb-2">
                <label>Title</label>
                <input type="text" class="form-control" name="content[cards][${i}][title]">
            </div>

            <div class="mb-2">
                <label>Image</label>
                <input type="file" class="form-control" name="content[cards][${i}][file]">
                <input type="hidden" name="content[cards][${i}][image]">
            </div>

        </div>
    `);
}
</script>
