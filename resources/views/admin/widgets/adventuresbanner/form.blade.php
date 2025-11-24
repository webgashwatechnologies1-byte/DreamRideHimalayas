@php
    $cards = $content['cards'] ?? [];
@endphp

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

<h4 class="mb-2">Adventure Cards</h4>

<button type="button" class="btn btn-primary btn-sm mb-3" id="add-card-btn">

    + Add Card
</button>

<div id="adventure-cards-wrapper">

    {{-- EXISTING CARDS --}}
    @foreach($cards as $i => $c)
    <div class="border rounded p-3 mb-3 adventure-card" data-index="{{ $i }}">

        <button type="button" class="btn btn-danger btn-sm float-end"
                onclick="this.parentNode.remove()">×</button>

        <div class="mb-3">
            <label>Card Title</label>
            <input type="text" class="form-control"
                   name="content[cards][{{ $i }}][title]"
                   value="{{ $c['title'] ?? '' }}">
        </div>

        <label>Search Tour</label>
        <input type="text" class="form-control mb-2 search-box"
               id="adv-search-{{ $i }}" placeholder="Search…">

        <h6>Available Tours</h6>
        <div class="tour-list-box" id="adv-available-{{ $i }}">
            Loading…
        </div>

        <h6 class="mt-3">Selected Tours</h6>
        <div class="tour-list-box" id="adv-selected-{{ $i }}">
        </div>

        <div id="adv-hidden-{{ $i }}">
            @foreach($c['tours'] ?? [] as $tid)
                <input type="hidden" name="content[cards][{{ $i }}][tours][]" value="{{ $tid }}">
            @endforeach
        </div>

    </div>
    @endforeach

</div>


<template id="adv-card-template">
    <div class="border rounded p-3 mb-3 adventure-card" data-index="__INDEX__">

        <button type="button" class="btn btn-danger btn-sm float-end"
                onclick="this.parentNode.remove()">×</button>

        <div class="mb-3">
            <label>Card Title</label>
            <input type="text" class="form-control"
                   name="content[cards][__INDEX__][title]">
        </div>

        <label>Search Tour</label>
        <input type="text" class="form-control mb-2 search-box"
               id="adv-search-__INDEX__" placeholder="Search…">

        <h6>Available Tours</h6>
        <div class="tour-list-box" id="adv-available-__INDEX__">Loading…</div>

        <h6 class="mt-3">Selected Tours</h6>
        <div class="tour-list-box" id="adv-selected-__INDEX__"></div>

        <div id="adv-hidden-__INDEX__"></div>

    </div>
</template>


<style>
.tour-list-box {
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 6px;
    height: 400px;
    overflow-y: auto;
    overflow-x: hidden;
}
.tour-item-row {
    border: 1px solid #ccc;
    padding: 6px 10px;
    border-radius: 6px;
    display: flex;
    justify-content: space-between;
    background: #fff;
    margin-bottom: 6px;
}
.search-box { margin-bottom: 10px; }
</style>

<script>
(() => {   // ← ENTIRE SCRIPT IS NOW LOCAL TO THIS FILE

    let allTours = [];

    const wrapper = document.getElementById("adventure-cards-wrapper");
    const addBtn  = document.getElementById("add-card-btn");

    if (!wrapper || !addBtn){ 
        return}; // <-- prevent execution on other pages


    // MAIN INIT
    document.addEventListener("DOMContentLoaded", () => {

        // Load tours
        fetch('/api/get-all-tours')
            .then(r => r.json())
            .then(j => {
                allTours = j.data || [];
                initExistingCards();
            });

        // ADD NEW CARD BUTTON
        addBtn.addEventListener("click", addAdventureCard);
    });


    // ADD CARD
    function addAdventureCard() {

        let index = wrapper.children.length;

        let html = document.getElementById("adv-card-template").innerHTML;
        html = html.replace(/__INDEX__/g, index);

        wrapper.insertAdjacentHTML("beforeend", html);

        initCard(wrapper.lastElementChild);
    }


    // INIT EXISTING CARDS
    function initExistingCards() {

        document.querySelectorAll(".adventure-card").forEach(card => {
            initCard(card);
        });

    }


    // INIT SINGLE CARD
    function initCard(card) {

        let i = card.dataset.index;

        let availableBox = document.getElementById(`adv-available-${i}`);
        let selectedBox  = document.getElementById(`adv-selected-${i}`);
        let hiddenBox    = document.getElementById(`adv-hidden-${i}`);
        let searchInput  = document.getElementById(`adv-search-${i}`);

        let selectedIds = [...hiddenBox.querySelectorAll("input")].map(x => Number(x.value));

        renderAvailable();
        renderSelected();

        searchInput.addEventListener("input", () =>
            renderAvailable(searchInput.value.toLowerCase())
        );



        // --------------------------
        // AVAILABLE LIST
        function renderAvailable(search = "") {

            availableBox.innerHTML = "";

            let list = allTours.filter(t =>
                t.name.toLowerCase().includes(search)
            );

            if (!list.length) {
                availableBox.innerHTML =
                    "<p class='text-muted text-center'>No tours found</p>";
                return;
            }

            list.forEach(t => {

                let row = document.createElement("div");
                row.className = "tour-item-row";

                row.innerHTML = `
                    <div>${t.name}</div>
                    <button type="button" class="btn btn-sm btn-outline-primary">Add</button>
                `;

                row.querySelector("button").addEventListener("click", () => {
                    selectedIds.push(t.id);
                    renderSelected();
                });

                availableBox.appendChild(row);
            });
        }



        // --------------------------
        // SELECTED LIST
        function renderSelected() {

            selectedBox.innerHTML = "";
            hiddenBox.innerHTML   = "";

            if (!selectedIds.length) {
                selectedBox.innerHTML =
                    "<p class='text-muted text-center'>No tours selected</p>";
                return;
            }

            selectedIds.forEach((id, idx) => {

                let t = allTours.find(x => x.id === id);

                let row = document.createElement("div");
                row.className = "tour-item-row";

                row.innerHTML = `
                    <div>${t ? t.name : "Tour #" + id}</div>
                    <button type="button" class="btn btn-sm btn-outline-danger">&times;</button>
                `;

                row.querySelector("button").addEventListener("click", () => {
                    selectedIds.splice(idx, 1);
                    renderSelected();
                });

                selectedBox.appendChild(row);

                // Hidden field
                let input = document.createElement("input");
                input.type  = "hidden";
                input.name  = `content[cards][${i}][tours][]`;
                input.value = id;

                hiddenBox.appendChild(input);
            });

        }

    }

})(); // ← END LOCAL SCRIPT
</script>
