
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

<div class="row">
    <div class="col-md-6">
        <label>Button Text</label>
        <input type="text" class="form-control"
               name="content[button][text]"
               value="{{ $content['button']['text'] ?? '' }}">
    </div>
    <div class="col-md-6">
        <label>Button URL</label>
        <input type="text" class="form-control"
               name="content[button][url]"
               value="{{ $content['button']['url'] ?? '' }}">
    </div>
</div>

<hr>

<h4 class="mb-3">View Tours – Select Tours</h4>

<div class="">
    <div class="col-md-6">
        <h6>Available Tours</h6>
        <div id="available-tours-box"
             class="border rounded p-2"
             style="max-height: 320px; overflow-y: auto;">
            <p class="text-muted mb-0">Loading tours...</p>
        </div>
    </div>

    <div class="col-md-6">
        <h6>Selected Tours (Order & duplicates allowed)</h6>
        <div id="selected-tours-box"
             class="border rounded p-2 mb-2"
             style="min-height: 80px;">
            <p class="text-muted mb-0">No tours selected yet.</p>
        </div>

        <div id="selected-tours-inputs"></div>
    </div>
</div>



<script>
(function () {

    const availableBox = document.getElementById("available-tours-box");
    const selectedBox  = document.getElementById("selected-tours-box");
    const inputHolder  = document.getElementById("selected-tours-inputs");
    if (!availableBox || !selectedBox) return;

    let allTours = [];

    // load from db
    let selectedTourIds = @json($content['tours'] ?? []);

    console.log("Loaded from DB:", selectedTourIds);

    // LOAD TOURS (1 time only)
    async function loadTours() {
        try {
            const resp = await fetch(`/api/get-all-tours`);
            const json = await resp.json();

            allTours = json.data || [];

            // ALWAYS render selected AFTER we have tours
            renderAvailableTours();
            renderSelectedTours();

        } catch (err) {
            console.error("Tour Load Error:", err);
            availableBox.innerHTML =
                '<p class="text-danger mb-0">Failed to load tours.</p>';
        }
    }

    // AVAILABLE
    function renderAvailableTours() {
        availableBox.innerHTML = "";

        if (!allTours.length) {
            availableBox.innerHTML = '<p class="text-muted mb-0">No tours found.</p>';
            return;
        }

        allTours.forEach(t => {
            availableBox.insertAdjacentHTML("beforeend", `
                <div class="d-flex align-items-center justify-content-between border rounded p-2 mb-2">
                    <div>
                        <strong>${t.name}</strong>
                        <small class="text-muted d-block">ID: ${t.id}</small>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary"
                        data-id="${t.id}">
                        Add
                    </button>
                </div>
            `);
        });

        availableBox.querySelectorAll("button").forEach(btn => {
            btn.addEventListener("click", function () {
                const id = Number(this.dataset.id);
                selectedTourIds.push(id);
                renderSelectedTours();
            });
        });
    }

    // SELECTED
    function renderSelectedTours() {
        selectedBox.innerHTML = "";
        inputHolder.innerHTML = "";

        if (!selectedTourIds.length) {
            selectedBox.innerHTML =
                '<p class="text-muted mb-0">No tours selected yet.</p>';
            return;
        }

        selectedTourIds.forEach((id, index) => {
            const tour = allTours.find(t => t.id == id);

            selectedBox.insertAdjacentHTML("beforeend", `
                <div class="d-flex align-items-center justify-content-between border rounded p-2 mb-2">
                    <div>
                        <strong>${tour ? tour.name : 'Tour #' + id}</strong>
                        <small class="text-muted d-block">ID: ${id}</small>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-danger"
                        data-index="${index}">
                        &times;
                    </button>
                </div>
            `);

            // submit input
            inputHolder.insertAdjacentHTML("beforeend", `
                <input type="hidden" name="content[tours][]" value="${id}">
            `);
        });

        // remove specific duplicate
        selectedBox.querySelectorAll("button").forEach(btn => {
            btn.addEventListener("click", function () {
                const i = Number(this.dataset.index);
                selectedTourIds.splice(i, 1);
                renderSelectedTours();
            });
        });
    }

    // INIT
    loadTours();

})();
</script>
