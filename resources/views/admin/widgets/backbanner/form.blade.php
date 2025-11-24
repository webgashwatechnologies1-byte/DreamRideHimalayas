<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="content[title]" 
           value="{{ $content['title'] ?? '' }}" 
           class="form-control" placeholder="Enter Banner Title">
</div>

<div class="mb-3">
    <label class="form-label">Banner Image</label>
    <input type="file" name="content[image]" class="form-control">

    @if(!empty($content['image']))
        <img src="/{{ $content['image'] }}" 
             style="width:220px;margin-top:10px;border-radius:6px;">
    @endif
</div>
