<div class="tours-widget">

    <!-- Title -->
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="content[title]"
               value="{{ $content['title'] ?? '' }}"
               class="form-control">
    </div>

    <!-- Subtitle -->
    <div class="mb-3">
        <label class="form-label">Subtitle</label>
        <input type="text" name="content[subtitle]"
               value="{{ $content['subtitle'] ?? '' }}"
               class="form-control">
    </div>

    <hr class="my-4">

    <h4 class="mb-2">Select Packages</h4>

    {{-- SCROLL CONTAINER --}}
    <div class="border rounded p-2 tours-packages-wrapper" 
         id="tours-packages-{{ $section->id }}">
        {{-- checkboxes will be injected here --}}
    </div>

</div>

<style>
    /* Scroll area: height 400px, vertical scroll, horizontal if needed */
    #tours-packages-{{ $section->id }} {
        max-height: 400px;
        overflow-y: auto;
        overflow-x: auto;
        padding: 6px;
    }
   #tours-packages-{{ $section->id }} label.package-item.selected {
    background: #f7c73a !important;
    border-color: #e0b128 !important;
}


    /* Each package as a pill-like row */
    #tours-packages-{{ $section->id }} .package-item {
        display: flex;
        align-items: center;
        gap: 6px;
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 6px 10px;
        margin: 0 8px 8px 0;
        background: #fff;
        cursor: pointer;
        width: fit-content;
    }

    #tours-packages-{{ $section->id }} .package-item input[type="checkbox"] {
        cursor: pointer;
    }
</style>

    <script>
(function () {

    const wrapperId = "tours-packages-{{ $section->id }}";
    const wrapper   = document.getElementById(wrapperId);
    if (!wrapper) return;

    const selected = @json($content['packages'] ?? []);
    const selectedIds = selected.map(p => String(p.id ?? p));

    console.log(selected);
    
    async function loadPackages() {
        try {
            const resp = await fetch(`/api/packages/get-packages`);
            const data = await resp.json();

            if (!Array.isArray(data.data)) return;

           data.data.forEach(pkg => {
    const isChecked = selectedIds.includes(String(pkg.id)) ? "checked" : "";
    const isSelectedClass = isChecked ? "selected" : "";

    wrapper.insertAdjacentHTML("beforeend", `
        <label class="package-item ${isSelectedClass}">
            <input type="checkbox"
                   class="package-checkbox"
                   name="content[packages][]"
                   value="${pkg.id}"
                   ${isChecked}>
            <span>${pkg.title}</span>
        </label>
    `);
});

addSelectionBehavior();

// highlight selected items on load
setTimeout(() => {
    wrapper.querySelectorAll(".package-checkbox").forEach(cb => {
        if (cb.checked) {
            cb.closest(".package-item").classList.add("selected");
        }
    });
}, 50);


        } catch (err) {
            console.error("Package Load Error:", err);
        }
    }

    function addSelectionBehavior() {
        wrapper.querySelectorAll(".package-checkbox").forEach(cb => {
            cb.addEventListener("change", function () {
                const item = this.closest(".package-item");

                if (this.checked) {
                    item.classList.add("selected");
                } else {
                    item.classList.remove("selected");
                }
            });
        });
    }

    loadPackages();

})();
</script>

