<section class="py-12">
  <div class="container grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach(($data['images'] ?? []) as $image)
      <img src="{{ asset('storage/' . $image) }}" class="w-full h-64 object-cover rounded-lg">
    @endforeach
  </div>
</section>
