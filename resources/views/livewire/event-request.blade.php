<section class="py-20 bg-gray-100">
  <div class="container mx-auto px-4">
    <h2 class="mb-8 text-5xl font-bold font-heading">Request History</h2>
    <p class="mb-14 text-lg text-gray-500">Recent event requested to Vendor</p>
    <div class="mb-12 py-8 px-8 md:px-20 bg-white">
      @foreach ($event_tenants as $history)
        @php
          $event = $history->event;
        @endphp
        <div class="flex flex-wrap -mx-4 mb-8">
          <div class="w-full lg:w-1/6 px-4 mb-8 lg:mb-0">
            <div class="flex items-center justify-center h-72 bg-gray-100">
              <img class="h-64 object-cover" src="{{ $event->picture }}" alt="">
            </div>
          </div>
          <div class="w-full lg:w-5/6 px-4">
            <div class="flex mb-16">
              <div class="mr-auto">
                <h3 class="text-xl font-bold font-heading">{{ $event->name }}</h3>
                <p class="text-gray-500">{{ $event->description }}</p>
              </div>
              <span class="text-2xl font-bold font-heading text-blue-300">IDR {{ $event->price }}</span>
            </div>
            <div class="flex flex-wrap -mx-10">
              <div class="w-full lg:w-auto px-10 mb-6 lg:mb-0">
                <h4 class="mb-6 font-bold font-heading">Requested on</h4>
                <p class="text-gray-500">{{ $history->created_at }}</p>
              </div>
              <div class="w-full lg:w-auto px-10 mb-6 lg:mb-0">
                <h4 class="mb-6 font-bold font-heading">Status</h4>
                <p class="text-gray-500">{{ $history->status }}</p>
              </div>
              <div class="w-full lg:w-auto ml-auto px-10">
                {{-- <a class="inline-block w-full md:w-auto mb-4 md:mb-0 mr-4 bg-gray-100 hover:bg-gray-200 text-center font-bold font-heading py-4 px-8 rounded-md uppercase transition duration-200" href="#">View summary</a> --}}
                <a class="inline-block w-full md:w-auto bg-green-500 hover:bg-green-700 text-center text-white font-bold font-heading py-4 px-8 rounded-md uppercase transition duration-200" href="https://wa.me/628986849527?text=Halo Bazzarku, saya ingin membayar untuk mendaftar di event {{ $event->name }}">
                  {{-- whatsapp icon --}}
                    <img src="/images/whatsapp.png" alt="whatsapp" class="w-6 h-6 inline-block mr-2">
                    Chat Admin
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
