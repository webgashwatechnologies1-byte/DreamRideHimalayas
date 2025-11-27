@php
    $filters = app()->call('\App\Http\Controllers\PackageController@getFilters')->getData(true);
@endphp

<script>
    window.FILTER_DATA = @json($filters);
</script>


<style>
    .search-box {
        border-radius: 22px;
        background: #fff;
    }
    .filter-item { display: flex; align-items: center; }
    .mr-3{ margin-right: 10px !important; }
    .filter-label { font-weight: 600; font-size: 15px; margin-bottom: 1px; }
    .filter-display {
        cursor: pointer; padding: 4px 0; display: flex;
        align-items: center; justify-content: space-between;
        border-radius: 8px; position: relative; user-select: none; gap: 20px;
    }
    .dropdown-menu-custom {
        display: none; position: absolute; top: 45px; left: 0; width: 100%;
        background: #ffffff; border-radius: 12px; padding: 10px 0;
        box-shadow: 0 4px 18px rgba(0,0,0,0.15); max-height: 250px;
        overflow-y: auto; z-index: 1000;
    }
    .dropdown-menu-custom li {
        list-style: none; padding: 10px 18px; cursor: pointer;
        font-size: 14px; color: #555; transition: 0.2s;
    }
    .dropdown-menu-custom li:hover { background: #fff4cd; }
    .dropdown-selected { color: #f5b400 !important; font-weight: 600; }
    .icon-wrap { color: #f5b400; font-size: 25px; margin-right: 10px; display: flex; align-items: center; }
    @media (min-width: 992px) {
        .v-divider { border-right: 1px solid #e5e5e5; height: 55px; margin-left: 15px; }
    }
    .search-btn-desktop {
        height: 55px; border-radius: 40px; font-weight: 600;
        display: flex; align-items: center; justify-content: center;
        background: #ffc000; color: white; padding: 0 35px;
    }
</style>

<div class="container my-4">
    <div class="search-box shadow p-4">
        <div class="row align-items-center gx-4 gy-1">

            <!-- Destination -->
            <div class="col-12 col-md-6 col-lg-2 position-relative">
                <div class="filter-item">
                    <i class="icon-18 icon-wrap"></i>
                    <div>
                        <label class="filter-label">Destination</label>
                        <div class="filter-display" data-dropdown="dest-dd">
                            <span id="dest-text">Select</span>
                            <i class="fa-solid fa-chevron-down mr-3"></i>
                        </div>
                        <ul class="dropdown-menu-custom" id="dest-dd"></ul>
                    </div>
                </div>
            </div>

            <!-- Type -->
            <div class="col-12 col-md-6 col-lg-2 position-relative">
                <div class="filter-item">
                    <i class="icon-hiking-1-1 icon-wrap"></i>
                    <div>
                        <label class="filter-label">Type</label>
                        <div class="filter-display" data-dropdown="type-dd">
                            <span id="type-text">Select</span>
                            <i class="fa-solid fa-chevron-down mr-3"></i>
                        </div>
                        <ul class="dropdown-menu-custom" id="type-dd"></ul>
                    </div>
                </div>
            </div>

            <!-- Duration -->
            <div class="col-12 col-md-6 col-lg-2 position-relative">
                <div class="filter-item">
                    <i class="icon-time-left icon-wrap"></i>
                    <div>
                        <label class="filter-label">Duration</label>
                        <div class="filter-display" data-dropdown="duration-dd">
                            <span id="duration-text">Select</span>
                            <i class="fa-solid fa-chevron-down mr-3"></i>
                        </div>
                        <ul class="dropdown-menu-custom" id="duration-dd"></ul>
                    </div>
                </div>
            </div>

            <!-- Riders -->
            <div class="col-12 col-md-6 col-lg-2 position-relative">
                <div class="filter-item">
                    <i class="icon-user icon-wrap"></i>
                    <div>
                        <label class="filter-label">Riders</label>
                        <div class="filter-display" data-dropdown="riders-dd">
                            <span id="riders-text">Select</span>
                            <i class="fa-solid fa-chevron-down mr-3"></i>
                        </div>
                        <ul class="dropdown-menu-custom" id="riders-dd"></ul>
                    </div>
                </div>
            </div>

            <!-- Search Button -->
            <div class="col-12 col-lg-4 d-flex justify-content-lg-end mt-lg-0">
                <button type="button" id="searchBtn" class="search-btn-desktop w-100 w-lg-auto">
                    <i class="icon-Vector5"></i> Search
                </button>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {

    const filters = window.FILTER_DATA;

    // Fill dropdowns properly
    fillDropdown("dest-dd", "dest-text", filters.destinations, "name");
    fillDropdown("type-dd", "type-text", filters.types, "name");
   fillDropdown("duration-dd", "duration-text", filters.durations, "label");
    fillDropdown("riders-dd", "riders-text", filters.riders, "label");

    // Dropdown toggle
    document.querySelectorAll(".filter-display").forEach(el => {
        el.addEventListener("click", () => {
            const id = el.dataset.dropdown;
            const dd = document.getElementById(id);

            document.querySelectorAll(".dropdown-menu-custom")
                .forEach(x => x.style.display = "none");

            dd.style.display = dd.style.display === "block" ? "none" : "block";
        });
    });

    // Close dropdown on outside click
    document.addEventListener("click", e => {
        if (!e.target.closest(".filter-item")) {
            document.querySelectorAll(".dropdown-menu-custom")
                .forEach(dd => dd.style.display = "none");
        }
    });
});


function fillDropdown(ulId, labelId, items, key = null) {
    const ul = document.getElementById(ulId);
    const label = document.getElementById(labelId);

    ul.innerHTML = "";

    items.forEach(item => {
        const displayText = key ? item[key] : item;

        const li = document.createElement("li");
        li.textContent = displayText;

        li.addEventListener("click", () => {
            label.textContent = displayText;
            label.setAttribute("data-value", key ? item.value : item);
            ul.querySelectorAll("li")
                .forEach(x => x.classList.remove("dropdown-selected"));

            li.classList.add("dropdown-selected");
            ul.style.display = "none";
        });

        ul.appendChild(li);
    });
}

document.getElementById("searchBtn").addEventListener("click", () => {
    const params = new URLSearchParams({
        destination: document.getElementById("dest-text").textContent.trim(),
        type: document.getElementById("type-text").textContent.trim(),
        duration: document.getElementById("duration-text").textContent.trim(),
        riders: document.getElementById("riders-text").dataset.value || "",

    });

    window.location.href = `/all-packages?${params.toString()}`;
});
</script>
