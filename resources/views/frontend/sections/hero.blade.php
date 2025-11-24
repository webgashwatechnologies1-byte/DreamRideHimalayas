<section class="bg-cover bg-center py-20 text-center text-white"
         style="background-image:url('{{ asset('storage/' . ($data['background_image'] ?? 'default.jpg')) }}')">
    <div class="container mx-auto">
        <h1 class="text-4xl md:text-6xl font-bold">{{ $data['title'] ?? '' }}</h1>
        <p class="mt-4 text-lg">{{ $data['subtitle'] ?? '' }}</p>
    </div>
</section>
