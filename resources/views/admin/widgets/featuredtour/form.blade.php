
<div class="mb-3">
    <label>Title</label>
    <input type="text" class="form-control" 
           name="content[title]" 
           value="{{ $content['title'] ?? '' }}">
</div>

<div class="mb-3">
    <label>Subtitle</label>
    <input type="text" class="form-control" 
           name="content[subtitle]" 
           value="{{ $content['subtitle'] ?? '' }}">
</div>

<hr>

<h4 class="mb-3">Featured Tour Cards</h4>

<button type="button" class="btn btn-primary btn-sm mb-3" onclick="addFeaturedCard()">
    + Add Card
</button>

<div id="featured-cards-wrapper">
    @foreach(($content['cards'] ?? []) as $i => $c)
    <div class="card-item border rounded p-3 mb-3">

        <button type="button" class="btn btn-danger btn-sm float-end"
                onclick="this.parentNode.remove()">X</button>

        <div class="mb-3">
            <label>Select Tour</label>
            <select name="content[cards][{{ $i }}][tour]"
                    class="form-control select-tour"
                    data-selected="{{ $c['tour'] }}">
            </select>
        </div>

        <div class="mb-3">
            <label>Select Packages</label>
            <select multiple
                    name="content[cards][{{ $i }}][packages][]"
                    class="form-control select-packages"
                    data-selected="{{ implode(',', $c['packages'] ?? []) }}">
            </select>
        </div>

    </div>
    @endforeach
</div>
<script>
let allTours = [];
let allPackages = [];

// Fetch All Data Once
async function loadMasterData() {
    let t = await fetch("/api/get-all-tours").then(r => r.json());
    let p = await fetch("/api/packages/get-packages").then(r => r.json());

    allTours = t.data ?? [];
    allPackages = p.data ?? [];

    populateAllSelects();
}

// Populate All Existing Selects on Page Load
function populateAllSelects() {
    document.querySelectorAll(".select-tour").forEach(select => {
        let selected = select.dataset.selected;
        select.innerHTML = `<option value="">Select Tour</option>`;

        allTours.forEach(tour => {
            select.insertAdjacentHTML(
                "beforeend",
                `<option value="${tour.id}" ${tour.id == selected ? "selected" : ""}>
                    ${tour.id} - ${tour.name}
                </option>`
            );
        });
    });

    document.querySelectorAll(".select-packages").forEach(select => {
        let selected = (select.dataset.selected || "").split(",").map(Number);

        select.innerHTML = "";

        allPackages.forEach(pkg => {
            select.insertAdjacentHTML(
                "beforeend",
                `<option value="${pkg.id}" ${selected.includes(pkg.id) ? "selected" : ""}>
                    ${pkg.id} - ${pkg.title}
                </option>`
            );
        });
    });
}

// Add New Card
function addFeaturedCard() {
    let wrap = document.getElementById("featured-cards-wrapper");
    let i = wrap.children.length;

    wrap.insertAdjacentHTML("beforeend", `
        <div class="card-item border rounded p-3 mb-3">
            <button type="button" class="btn btn-danger btn-sm float-end"
                onclick="this.parentNode.remove()">X</button>

            <div class="mb-3">
                <label>Select Tour</label>
                <select name="content[cards][${i}][tour]"
                        class="form-control select-tour"
                        data-selected="">
                </select>
            </div>

            <div class="mb-3">
                <label>Select Packages</label>
                <select multiple
                        name="content[cards][${i}][packages][]"
                        class="form-control select-packages"
                        data-selected="">
                </select>
            </div>
        </div>
    `);

    // Populate Selects for Newly Added Card
    populateAllSelects();
}

// INITIAL LOAD
loadMasterData();
</script>
