

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

<div class="mb-3">
    <label>Contact Message (Email / Phone / Text)</label>
    <input type="text" class="form-control"
           name="content[contactmessage]"
           value="{{ $content['contactmessage'] ?? '' }}">
</div>

<div class="mb-3">
    <label>YouTube URL</label>
    <input type="text" class="form-control"
           name="content[yturl]"
           value="{{ $content['yturl'] ?? '' }}">
</div>

<div class="mb-3">
    <label>Banner Image</label>
    <input type="file" class="form-control" name="content[image]">

    @if(!empty($content['image']))
        <img src="/storage/{{ $content['image'] }}" alt="" class="mt-2"
             style="width:120px; border-radius:6px;">
    @endif
</div>
