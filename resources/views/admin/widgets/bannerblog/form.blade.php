<div class="mb-3">
    <label>Title</label>
    <input type="text" class="form-control"
           name="content[title]"
           value="{{ $content['title'] ?? '' }}">
</div>

<div class="mb-3">
    <label>Subtitle</label>
    <textarea class="form-control" name="content[subtitle]">{{ $content['subtitle'] ?? '' }}</textarea>
</div>

<div class="mb-3">
    <label>Banner Image</label>
    <input type="file" class="form-control" name="content[image]">
    @if(!empty($content['image']))
        <p class="mt-2"><img src="/storage/{{ $content['image'] }}" width="180"></p>
    @endif
</div>

<hr>

<h4>Button Settings</h4>

<div class="mb-3">
    <label>Button Text</label>
    <input type="text" class="form-control"
           name="content[button][btntext]"
           value="{{ $content['button']['btntext'] ?? '' }}">
</div>

<div class="mb-3">
    <label>Button URL</label>
    <input type="text" class="form-control"
           name="content[button][btnurl]"
           value="{{ $content['button']['btnurl'] ?? '' }}">
</div>
