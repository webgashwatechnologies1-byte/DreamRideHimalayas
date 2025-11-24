<div class="mb-3">
    <label class="form-label">Section Title</label>
    <input type="text" class="form-control"
           name="content[title]"
           value="{{ $content['title'] ?? '' }}"
           placeholder="Enter Team Section Title">
</div>

<div class="mb-3">
    <label class="form-label">Section Subtitle</label>
    <input type="text" class="form-control"
           name="content[subtitle]"
           value="{{ $content['subtitle'] ?? '' }}"
           placeholder="Enter Subtitle">
</div>

<hr>

<h4 class="mb-2">Team Cards</h4>
<button type="button"
        class="btn btn-sm btn-primary mb-3"
        onclick="addTeamCard()">+ Add Team Member</button>

<div id="team-cards-wrapper">
    @php $cards = $content['card'] ?? []; @endphp

    @foreach($cards as $i => $card)
        <div class="team-card-box border p-3 mb-3 rounded" data-index="{{ $i }}">

            <button type="button"
                    class="btn btn-sm btn-danger float-end"
                    onclick="this.parentNode.remove()">Remove</button>

            <div class="row mb-2">
                <div class="col-md-12">
                    <label>Name</label>
                    <input type="text" class="form-control"
                           name="content[card][{{ $i }}][name]"
                           value="{{ $card['name'] ?? '' }}">
                </div>

                <div class="col-md-12">
                    <label>Position</label>
                    <input type="text" class="form-control"
                           name="content[card][{{ $i }}][position]"
                           value="{{ $card['position'] ?? '' }}">
                </div>
            </div>

            <div class="mb-3">
                <label>Photo</label>
                <input type="file" name="content[card][{{ $i }}][image]" class="form-control">

                @if(!empty($card['image']))
                    <img src="{{ asset('storage/'.$card['image']) }}"
                         width="120" class="mt-2 rounded">
                @endif
            </div>

            <h5>Social Links</h5>
            <button type="button"
                    class="btn btn-sm btn-success mb-2"
                    onclick="addSocialLink(this, {{ $i }})">+ Add Link</button>

            <div class="social-links-wrapper">
                @foreach($card['links'] as $j => $link)
                    <div class="row mb-2 social-link-item">
                        <div class="col-md-5">
                            <input type="text" class="form-control"
                                   placeholder="Icon Class"
                                   name="content[card][{{ $i }}][links][{{ $j }}][iconClassName]"
                                   value="{{ $link['iconClassName'] }}">
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control"
                                   placeholder="URL"
                                   name="content[card][{{ $i }}][links][{{ $j }}][url]"
                                   value="{{ $link['url'] }}">
                        </div>

                        <div class="col-md-1">
                            <button type="button"
                                    class="btn btn-danger btn-sm"
                                    onclick="this.closest('.social-link-item').remove()">X</button>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endforeach
</div>

<script>
/* ------------------------------------------
   ADD NEW TEAM CARD
------------------------------------------- */
function addTeamCard() {
    const wrapper = document.getElementById("team-cards-wrapper");
    let i = wrapper.children.length;

    let html = `
        <div class="team-card-box border p-3 mb-3 rounded" data-index="${i}">
            <button type="button"
                    class="btn btn-sm btn-danger float-end"
                    onclick="this.parentNode.remove()">Remove</button>

            <div class="row mb-2">
                <div class="col-md-6">
                    <label>Name</label>
                    <input type="text" class="form-control"
                        name="content[card][${i}][name]">
                </div>

                <div class="col-md-6">
                    <label>Position</label>
                    <input type="text" class="form-control"
                        name="content[card][${i}][position]">
                </div>
            </div>

            <div class="mb-3">
                <label>Photo</label>
                <input type="file" class="form-control"
                    name="content[card][${i}][image]">
            </div>

            <h5>Social Links</h5>
            <button type="button"
                    class="btn btn-sm btn-success mb-2"
                    onclick="addSocialLink(this, ${i})">+ Add Link</button>

            <div class="social-links-wrapper"></div>
        </div>
    `;

    wrapper.insertAdjacentHTML("beforeend", html);
}

/* ------------------------------------------
   ADD SOCIAL LINK TO SPECIFIC CARD
------------------------------------------- */
function addSocialLink(button, cardIndex) {
    const wrapper = button.nextElementSibling;

    let linkIndex = wrapper.children.length;

    let html = `
        <div class="row mb-2 social-link-item">

            <div class="col-md-5">
                <input type="text" class="form-control"
                       placeholder="Icon Class"
                       name="content[card][${cardIndex}][links][${linkIndex}][iconClassName]">
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control"
                       placeholder="URL"
                       name="content[card][${cardIndex}][links][${linkIndex}][url]">
            </div>

            <div class="col-md-1">
                <button type="button"
                        class="btn btn-danger btn-sm"
                        onclick="this.closest('.social-link-item').remove()">X</button>
            </div>
        </div>
    `;

    wrapper.insertAdjacentHTML("beforeend", html);
}
</script>
