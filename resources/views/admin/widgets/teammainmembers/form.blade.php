<style>
.member-image-box {
    position: relative;
    display: inline-block;
}

.member-links-overlay {
    position: absolute;
    top: 8px;
    left: 8px;
    display: flex;
    gap: 8px;
    z-index: 5;
}

.member-links-overlay i {
    font-size: 18px;
    background: #fff;
    padding: 6px;
    border-radius: 50%;
    border: 1px solid #ddd;
}
</style>

<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control"
           name="content[name]"
           value="{{ $content['name'] ?? '' }}"
           placeholder="Enter Member Name">
</div>

<div class="mb-3">
    <label class="form-label">Position</label>
    <input type="text" class="form-control"
           name="content[position]"
           value="{{ $content['position'] ?? '' }}"
           placeholder="Enter Member Position">
</div>

<div class="mb-3">
    <label class="form-label">Description (HTML allowed)</label>
    <textarea class="form-control tc-editor"
              name="content[description]"
              id="main-member-desc"
              rows="5">{!! $content['description'] ?? '' !!}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Member Image</label>
    <input type="file" name="content[image]" class="form-control">

    @if(!empty($content['image']))
        <div class="member-image-box mt-2">
            
            {{-- Social Links Overlay On Image --}}
            <div class="member-links-overlay">
                @foreach($content['links'] ?? [] as $link)
                    <a href="{{ $link['url'] }}" target="_blank">
                        <i class="{{ $link['iconClassName'] }}"></i>
                    </a>
                @endforeach
            </div>

            {{-- Main Image --}}
            <img src="{{ asset('storage/'.$content['image']) }}" width="150"
                 class="rounded-circle border">
        </div>
    @endif
</div>


{{-- <div class="form-check form-switch mb-3">
    <input class="form-check-input" type="checkbox"
           name="content[reverse]" value="1"
        {{ !empty($content['reverse']) ? 'checked' : '' }}>
    <label class="form-check-label">Reverse Layout (Image Right)</label>
</div> --}}


<hr>

<h4 class="mb-2">Social Links</h4>
<button type="button" class="btn btn-sm btn-primary mb-3"
        onclick="addMainLink()">+ Add Link</button>

<div id="main-links-wrapper">
    @foreach($content['links'] ?? [] as $i => $link)
        <div class="row mb-2 link-item">

            <div class="col-md-5">
                <input type="text" class="form-control"
                       placeholder="Icon Class (fa-brands fa-facebook)"
                       name="content[links][{{ $i }}][iconClassName]"
                       value="{{ $link['iconClassName'] }}">
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control"
                       placeholder="URL"
                       name="content[links][{{ $i }}][url]"
                       value="{{ $link['url'] }}">
            </div>

            <div class="col-md-1">
                <button type="button"
                        class="btn btn-danger btn-sm"
                        onclick="this.closest('.link-item').remove()">X</button>
            </div>
        </div>
    @endforeach
</div>

<script>
function addMainLink() {
    let wrapper = document.getElementById("main-links-wrapper");
    let i = wrapper.children.length;

    wrapper.insertAdjacentHTML("beforeend", `
        <div class="row mb-2 link-item">

            <div class="col-md-5">
                <input type="text" class="form-control"
                       placeholder="Icon Class"
                       name="content[links][${i}][iconClassName]">
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control"
                       placeholder="URL"
                       name="content[links][${i}][url]">
            </div>

            <div class="col-md-1">
                <button type="button"
                        class="btn btn-danger btn-sm"
                        onclick="this.closest('.link-item').remove()">X</button>
            </div>

        </div>
    `);
}
</script>
