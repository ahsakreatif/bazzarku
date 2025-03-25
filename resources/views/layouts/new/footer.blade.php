<!-- Footer -->
<footer class="bg-primary-700 text-white mt-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="flex items-center justify-between">
          <div class="flex items-center">
              <img class="h-8 w-auto" src="/images/bazzarku.jpg" alt="{{ config('app.name') }} Logo">
              <div class="ml-8 space-x-6">
                  @foreach(config('navigation.footer', [
                      'dashboard' => 'Home',
                      'rentals' => 'Rental',
                      'events' => 'Events'
                  ]) as $route => $label)
                      <a href="{{ route($route) }}" class="hover:underline">{{ $label }}</a>
                  @endforeach
              </div>
          </div>
          <div class="flex items-center space-x-4">
              <span class="font-medium">Contact Us</span>
              @php
                  $socialLinks = [
                      'whatsapp' => [
                          'url' => config('social.whatsapp', '#'),
                          'icon' => config('filesystems.public_cdn') . '/icons/whatsapp.png'
                      ],
                      'tiktok' => [
                          'url' => config('social.tiktok', '#'),
                          'icon' => config('filesystems.public_cdn') . '/icons/tiktok.png'
                      ],
                      'youtube' => [
                          'url' => config('social.youtube', '#'),
                          'icon' => config('filesystems.public_cdn') . '/icons/youtube.png'
                      ],
                      'instagram' => [
                          'url' => config('social.instagram', '#'),
                          'icon' => config('filesystems.public_cdn') . '/icons/instagram.png'
                      ],
                  ];
              @endphp

              @foreach($socialLinks as $platform => $data)
                  <a href="{{ $data['url'] }}" class="hover:opacity-80" target="_blank" rel="noopener noreferrer">
                      <img src="{{ $data['icon'] }}" alt="{{ ucfirst($platform) }}" class="h-6 w-6">
                  </a>
              @endforeach
          </div>
      </div>
      <div class="mt-4 text-sm text-gray-300">
          Hak Cipta © 2025 Bazaarku. Hak Cipta Dilindungi Undang-undang.
      </div>
  </div>
</footer>