<h4>Left Section</h4>

<div class="mb-3">
    <label>Left Image</label>
    <input type="file" name="content[left][image]" class="form-control">
    @if(!empty($content['left']['image']))
        <img src="/{{ $content['left']['image'] }}" class="mt-2" style="height:100px;border-radius:6px;">
    @endif
</div>

<div class="mb-3">
    <label>YouTube Video URL</label>
    <input type="text" class="form-control"
           name="content[left][ytvideourl]"
           value="{{ $content['left']['ytvideourl'] ?? '' }}">
</div>

<div class="mb-3">
    <label>Left Text</label>
    <textarea class="form-control"
              name="content[left][text]">{{ $content['left']['text'] ?? '' }}</textarea>
</div>

<hr>

<h4>Right Section</h4>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Title</label>
        <input type="text" class="form-control"
               name="content[right][title]"
               value="{{ $content['right']['title'] ?? '' }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Subtitle</label>
        <input type="text" class="form-control"
               name="content[right][subtitle]"
               value="{{ $content['right']['subtitle'] ?? '' }}">
    </div>
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea class="form-control"
              name="content[right][description]">{{ $content['right']['description'] ?? '' }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Button Text</label>
        <input type="text" class="form-control"
               name="content[right][btntext]"
               value="{{ $content['right']['btntext'] ?? '' }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Button URL</label>
        <input type="text" class="form-control"
               name="content[right][btnurl]"
               value="{{ $content['right']['btnurl'] ?? '' }}">
    </div>
</div>

<div class="mb-3">
    <label>Footer Text</label>
    <input type="text" class="form-control"
           name="content[right][footertext]"
           value="{{ $content['right']['footertext'] ?? '' }}">
</div>

<hr>

<h4>Cards</h4>
<button class="btn btn-primary btn-sm mb-2" onclick="addSubheroCard()" type="button">+ Add Card</button>

<div id="subhero-cards">
    @php $cards = $content['right']['cards'] ?? []; @endphp

    @foreach($cards as $i => $card)
        <div class="border p-3 mb-2 rounded">
            <button type="button" class="btn btn-danger btn-sm float-end"
                    onclick="this.parentNode.remove()">X</button>

            <div class="mb-2">
                <label>Icon Class</label>
                <input type="text" class="form-control"
                       name="content[right][cards][{{ $i }}][icon]"
                       value="{{ $card['icon'] }}">
            </div>

            <div class="mb-2">
                <label>Heading</label>
                <input type="text" class="form-control"
                       name="content[right][cards][{{ $i }}][heading]"
                       value="{{ $card['heading'] }}">
            </div>

            <div class="mb-2">
                <label>Text</label>
                <textarea class="form-control"
                          name="content[right][cards][{{ $i }}][text]">{{ $card['text'] }}</textarea>
            </div>
        </div>
    @endforeach
</div>

<script>
function addSubheroCard() {
    let wrapper = document.getElementById("subhero-cards");
    let i = wrapper.children.length;

    wrapper.insertAdjacentHTML("beforeend", `
        <div class="border p-3 mb-2 rounded">
            <button type="button" class="btn btn-danger btn-sm float-end" onclick="this.parentNode.remove()">X</button>

            <div class="mb-2">
                <label>Icon Class</label>
                <input type="text" class="form-control" name="content[right][cards][${i}][icon]">
            </div>

            <div class="mb-2">
                <label>Heading</label>
                <input type="text" class="form-control" name="content[right][cards][${i}][heading]">
            </div>

            <div class="mb-2">
                <label>Text</label>
                <textarea class="form-control" name="content[right][cards][${i}][text]"></textarea>
            </div>
        </div>
    `);
}
</script>
