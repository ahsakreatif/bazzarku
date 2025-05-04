<section class="mb-12">
  <h2 class="text-2xl font-bold text-primary-700 mb-6">Tool Rentals</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach ($commodityTypes as $type)
      <!-- Large Cards Row -->
      <a href="{{ route('commodity-type.list', ['slug' => $type->slug]) }}" class="relative h-72 rounded-lg overflow-hidden group cursor-pointer">
          <img src="{{ $type->picture }}" alt="{{ $type->name }}"
              class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-black/20 flex items-end">
              <h3 class="text-white text-xl font-semibold p-6">{{ $type->name }}</h3>
          </div>
      </a>
    @endforeach
  </div>
</section>