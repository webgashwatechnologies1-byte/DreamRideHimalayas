<div class="mb-3">
    <label>Title</label>
    <input type="text" class="form-control"
           name="content[left][title]"
           value="{{ $content['left']['title'] ?? '' }}">
</div>

<div class="mb-3">
    <label>Subtitle</label>
    <input type="text" class="form-control"
           name="content[left][subtitle]"
           value="{{ $content['left']['subtitle'] ?? '' }}">
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea class="form-control"
              name="content[left][description]"
              rows="3">{{ $content['left']['description'] ?? '' }}</textarea>
</div>

<h5 class="mt-4">Button</h5>
<div class="row">
    <div class="col-md-6">
        <label>Button Text</label>
        <input type="text" class="form-control"
               name="content[left][button][text]"
               value="{{ $content['left']['button']['text'] ?? '' }}">
    </div>

    <div class="col-md-6">
        <label>Button URL</label>
        <input type="text" class="form-control"
               name="content[left][button][url]"
               value="{{ $content['left']['button']['url'] ?? '' }}">
    </div>
</div>

<h5 class="mt-4">Offer Box</h5>
<div class="row">
    <div class="col-md-4">
        <label>Off Value</label>
        <input type="number" class="form-control"
               name="content[left][off][value]"
               value="{{ $content['left']['off']['value'] ?? '' }}">
    </div>

    <div class="col-md-4">
        <label>Off Text</label>
        <input type="text" class="form-control"
               name="content[left][off][text]"
               value="{{ $content['left']['off']['text'] ?? '' }}">
    </div>

    <div class="col-md-4">
        <label>Off Description</label>
        <input type="text" class="form-control"
               name="content[left][off][description]"
               value="{{ $content['left']['off']['description'] ?? '' }}">
    </div>
</div>

<h5 class="mt-4">Footer</h5>
<div class="mb-3">
    <label>Footer Text</label>
    <input type="text" class="form-control"
           name="content[left][footer][text]"
           value="{{ $content['left']['footer']['text'] ?? '' }}">
</div>

<div class="mb-3">
    <label>Valid Till Date</label>
    <input type="date" class="form-control"
           name="content[left][footer][validTillDate]"
           value="{{ $content['left']['footer']['validTillDate'] ?? '' }}">
</div>

<hr>

<h4>Select Packages (Right Side Slider)</h4>
<select class="form-control" multiple id="right-packages"
        name="content[right][]">
</select>

<script>
document.addEventListener("DOMContentLoaded", function() {

    fetch("/api/packages/get-packages")
        .then(res => res.json())
        .then(json => {
            let select = document.getElementById("right-packages");
            let selected = @json($content['right'] ?? []);

            json.data.forEach(pkg => {
                let opt = document.createElement("option");
                opt.value = pkg.id;
                opt.textContent = pkg.title;

                if (selected.includes(pkg.id)) opt.selected = true;

                select.appendChild(opt);
            });
        });
});
</script>
