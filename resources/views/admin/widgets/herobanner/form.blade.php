<div class="mb-3">
    <label class="form-label">Subtitle</label>
    <input type="text" class="form-control" name="content[subtitle]"
           value="{{ $content['subtitle'] ?? '' }}">
</div>

<div class="mb-3">
    <label class="form-label">Title Line 1</label>
    <input type="text" class="form-control" name="content[title1]"
           value="{{ $content['title1'] ?? '' }}">
</div>

<div class="mb-3">
    <label class="form-label">Title Line 2</label>
    <input type="text" class="form-control" name="content[title2]"
           value="{{ $content['title2'] ?? '' }}">
</div>

<hr>

<h4 class="mb-2">Animated Titles</h4>
<button type="button" class="btn btn-sm btn-primary mb-3" onclick="addTitle()">+ Add Title</button>

<div id="titles-wrapper">
    @php $titles = $content['titles'] ?? []; @endphp
    @foreach($titles as $i => $t)
        <div class="title-box mb-2 d-flex gap-2">
            <input type="text" class="form-control"
                   name="content[titles][{{ $i }}]"
                   value="{{ $t }}">
            <button type="button" class="btn btn-danger btn-sm"
                    onclick="this.parentNode.remove()">X</button>
        </div>
    @endforeach
</div>

<hr>

<h4 class="mb-2">Slider Images</h4>
<button type="button" class="btn btn-sm btn-success mb-3" onclick="addHeroImage()">+ Add Image</button>

<div id="hero-images-wrapper" class="sortable-images">
    @php $imgs = $content['images'] ?? []; @endphp
    @foreach($imgs as $i => $img)
        <div class="hero-img-item border p-2 mb-2 rounded d-flex align-items-center gap-2" data-index="{{ $i }}">
            <input type="file" name="content[images][{{ $i }}][file]" class="form-control" style="width:60%">
            <input type="hidden" name="content[images][{{ $i }}][url]" value="{{ $img['url'] }}">
            <span class="badge bg-dark">{{ $img['url'] }}</span>
            <button type="button" class="btn btn-danger btn-sm ms-auto"
                    onclick="this.parentNode.remove()">Remove</button>
        </div>
    @endforeach
</div>

<hr>

<h4 class="mb-2">Checks (Icon + Text)</h4>
<button type="button" class="btn btn-sm btn-primary mb-3" onclick="addCheck()">+ Add Check</button>

<div id="checks-wrapper">
    @php $checks = $content['checks'] ?? []; @endphp

    @foreach($checks as $i => $chk)
        <div class="check-box border p-3 mb-2 rounded" data-index="{{ $i }}">
            <button type="button" class="btn btn-danger btn-sm float-end"
                    onclick="this.parentNode.remove()">X</button>

            <div class="mb-2">
                <label>Icon Class</label>
                <input type="text" class="form-control"
                       name="content[checks][{{ $i }}][icon]"
                       value="{{ $chk['icon'] ?? '' }}"
                       placeholder="e.g. icon-Vector-5 or fa-solid fa-check">
            </div>

            <div>
                <label>Text</label>
                <input type="text" class="form-control"
                       name="content[checks][{{ $i }}][text]"
                       value="{{ $chk['text'] ?? '' }}"
                       placeholder="Enter check text">
            </div>
        </div>
    @endforeach
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<script>
function addTitle() {
    let wrapper = document.getElementById("titles-wrapper");
    let i = wrapper.children.length;

    wrapper.insertAdjacentHTML("beforeend", `
        <div class="title-box mb-2 d-flex gap-2">
            <input type="text" class="form-control" name="content[titles][${i}]">
            <button type="button" class="btn btn-danger btn-sm" onclick="this.parentNode.remove()">X</button>
        </div>
    `);
}

function addHeroImage() {
    let wrap = document.getElementById("hero-images-wrapper");
    let i = wrap.children.length;

    wrap.insertAdjacentHTML("beforeend", `
        <div class="hero-img-item border p-2 mb-2 rounded d-flex align-items-center gap-2" data-index="${i}">
            <input type="file" name="content[images][${i}][file]" class="form-control" style="width:60%">
            <input type="hidden" name="content[images][${i}][url]">
            <button type="button" class="btn btn-danger btn-sm ms-auto" onclick="this.parentNode.remove()">Remove</button>
        </div>
    `);
}

function addCheck() {
    let wrap = document.getElementById("checks-wrapper");
    let i = wrap.children.length;

    wrap.insertAdjacentHTML("beforeend", `
        <div class="check-box border p-3 mb-2 rounded" data-index="${i}">
            <button type="button" class="btn btn-danger btn-sm float-end" onclick="this.parentNode.remove()">X</button>

            <div class="mb-2">
                <label>Icon Class</label>
                <input type="text" class="form-control"
                       name="content[checks][${i}][icon]"
                       placeholder="e.g. icon-Vector-5 or fa-solid fa-check">
            </div>

            <div class="mb-2">
                <label>Text</label>
                <input type="text" class="form-control"
                       name="content[checks][${i}][text]"
                       placeholder="Enter check label">
            </div>
        </div>
    `);
}

new Sortable(document.getElementById("hero-images-wrapper"), {
    animation: 200
});
</script>
