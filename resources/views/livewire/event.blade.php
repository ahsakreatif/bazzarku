<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap -mx-4 mb-20 items-center justify-between">
        <div class="w-full lg:w-auto px-4 mb-12 xl:mb-0">
          {{-- <h2 class="text-5xl font-bold font-heading">
            <span>Found 125 results for</span>
            <a class="relative text-blue-300 underline" href="#">Sports</a>
          </h2> --}}
        </div>
        <div class="w-full lg:w-auto px-4 flex flex-wrap items-center">
          <div class="w-full sm:w-auto mb-4 sm:mb-0 mr-5">
            <select class="pl-8 py-4 bg-white text-lg border border-gray-200 focus:ring-blue-300 focus:border-blue-300 rounded-md" name="sort" id="sort" wire:model="sort" wire:change="setSort">
              <option value="newest">Sort by newest</option>
              <option value="price">Sort by price</option>
            </select>
          </div>
          <a class="inline-block mr-3 h-full p-4 bg-white rounded-md border" href="#">
            <svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="4" height="4" rx="2" fill="#2B51C6"></rect><rect x="8" width="4" height="4" rx="2" fill="#2B51C6"></rect><rect x="16" width="4" height="4" rx="2" fill="#2B51C6"></rect><rect y="10" width="4" height="4" rx="2" fill="#2B51C6"></rect><rect x="8" y="10" width="4" height="4" rx="2" fill="#2B51C6"></rect><rect x="16" y="10" width="4" height="4" rx="2" fill="#2B51C6"></rect><rect y="20" width="4" height="4" rx="2" fill="#2B51C6"></rect><rect x="8" y="20" width="4" height="4" rx="2" fill="#2B51C6"></rect><rect x="16" y="20" width="4" height="4" rx="2" fill="#2B51C6"></rect></svg>
          </a>
          <a class="inline-block h-full p-4 hover:bg-white border rounded-md group" href="#">
            <svg class="text-gray-200 group-hover:text-blue-300" width="28" height="24" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="4" height="4" rx="2" fill="currentColor"></rect><rect x="8" width="4" height="4" rx="2" fill="currentColor"></rect><rect x="16" width="4" height="4" rx="2" fill="currentColor"></rect><rect x="24" width="4" height="4" rx="2" fill="currentColor"></rect><rect y="10" width="4" height="4" rx="2" fill="currentColor"></rect><rect x="8" y="10" width="4" height="4" rx="2" fill="currentColor"></rect><rect x="16" y="10" width="4" height="4" rx="2" fill="currentColor"></rect><rect x="24" y="10" width="4" height="4" rx="2" fill="currentColor"></rect><rect y="20" width="4" height="4" rx="2" fill="currentColor"></rect><rect x="8" y="20" width="4" height="4" rx="2" fill="currentColor"></rect><rect x="16" y="20" width="4" height="4" rx="2" fill="currentColor"></rect><rect x="24" y="20" width="4" height="4" rx="2" fill="currentColor"></rect></svg>
          </a>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-24">
        <div class="w-full lg:hidden px-3">
          <div class="flex flex-wrap -mx-2">
            <div class="w-1/2 md:w-1/3 px-2 mb-4">
              <div class="py-6 px-2 text-center bg-gray-50">
                <a class="font-bold font-heading" href="#">Category</a>
                {{-- <ul class="hidden text-left mt-6">
                  @foreach ($event_types as $type)
                    <li class="mb-4"><a href="/events?event_type={{ $type->id }}">{{ $type->name }}</a></li>
                  @endforeach
                </ul> --}}
                {{-- rerender category as radio button --}}
                <div class="mt-6">
                  @foreach ($event_types as $type)
                    <label class="flex items-center text-lg">
                      <input type="radio" name="event_type" value="{{ $type->id }}" wire:click="setFilter('event_type_id', {{ $type->id }})">
                      <span class="ml-2">{{ $type->name }}</span>
                    </label>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="mb-6 py-10 px-12 bg-gray-50">
              <h3 class="mb-8 text-2xl font-bold font-heading">Price</h3>
              <div>
                <input class="w-full mb-4 outline-none appearance-none bg-gray-100 h-1 rounded cursor-pointer" type="range" min="1" max="100" value="50">
                <div class="flex justify-between">
                  <span class="inline-block text-lg font-bold font-heading text-blue-300">$0</span>
                  <span class="inline-block text-lg font-bold font-heading text-blue-300">$289</span>
                </div>
              </div>
            </div>
            <div class="mb-6 py-10 px-12 bg-gray-50">
              <h3 class="mb-8 text-2xl font-bold font-heading">Date</h3>
              <div class="mb-4">
                <label class="block text-lg font-bold font-heading" for="start_date">Start Date</label>
                <input class="w-full px-8 py-4 bg-white border rounded-md" type="date" id="start_date" name="start_date">
              </div>
              <div>
                <label class="block text-lg font-bold font-heading" for="end_date">End Date</label>
                <input class="w-full px-8 py-4 bg-white border rounded-md" type="date" id="end_date" name="end_date">
              </div>
            </div>
            {{-- <div class="w-1/2 md:w-1/3 px-2 mb-4">
              <div class="py-6 px-2 text-center bg-gray-50">
                <a class="font-bold font-heading" href="#">Colors</a>
                <div class="hidden mt-6 flex flex-wrap">
                  <button class="mr-4 mb-2 rounded-full border border-blue-300 p-1">
                    <div class="rounded-full bg-blue-300 w-5 h-5"></div>
                  </button>
                  <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                    <div class="rounded-full bg-orange-300 w-5 h-5"></div>
                  </button>
                  <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                    <div class="rounded-full bg-gray-900 w-5 h-5"></div>
                  </button>
                  <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                    <div class="rounded-full bg-red-300 w-5 h-5"></div>
                  </button>
                  <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                    <div class="rounded-full bg-green-300 w-5 h-5"></div>
                  </button>
                  <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                    <div class="rounded-full bg-pink-300 w-5 h-5"></div>
                  </button>
                  <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                    <div class="rounded-full bg-yellow-300 w-5 h-5"></div>
                  </button>
                  <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                    <div class="rounded-full bg-gray-100 w-5 h-5"></div>
                  </button>
                </div>
              </div>
            </div> --}}
            {{-- <div class="w-1/2 md:w-1/3 px-2 mb-4">
              <div class="py-6 px-4 text-center bg-gray-50">
                <a class="font-bold font-heading" href="#">Price</a>
                <div class="hidden mt-6">
                  <input class="w-full mb-4 outline-none appearance-none bg-gray-100 h-1 rounded cursor-pointer" type="range" min="1" max="100" value="50">
                  <div class="flex justify-between">
                    <span class="inline-block text-lg font-bold font-heading text-blue-300">$0</span>
                    <span class="inline-block text-lg font-bold font-heading text-blue-300">$289</span>
                  </div>
                </div>
              </div>
            </div> --}}
            {{-- <div class="w-1/2 md:w-1/3 px-2 mb-4">
              <div class="py-6 px-4 text-center bg-gray-50">
                <a class="font-bold font-heading" href="#">Size</a>
                <div class="hidden mt-6 flex flex-wrap -mx-2 -mb-2">
                  <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">36</button>
                  <button class="relative mb-2 mr-1 w-16 border rounded-md">
                    37
                    <span class="absolute bottom-0 left-0 w-full py-px bg-blue-300"></span>
                  </button>
                  <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">38</button>
                  <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">39</button>
                  <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">40</button>
                  <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">41</button>
                  <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">42</button>
                  <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">43</button>
                  <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">44</button>
                </div>
                <div class="hidden mt-4 text-right">
                  <a class="inline-flex underline text-blue-300 hover:text-blue-400" href="#">
                    <span class="mr-2">Show all</span>
                    <svg width="14" height="27" viewBox="0 0 14 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M6.83901 26.2775L0.151884 19.5904L0.987775 18.7545L6.66766 24.4343L6.66347 0.782814L7.84208 0.782814L7.84626 24.4343L13.1082 19.1724L13.9441 20.0083L7.6749 26.2775C7.44407 26.5083 7.06985 26.5083 6.83901 26.2775Z" fill="#3C60D9"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div> --}}
            {{-- <div class="w-1/2 md:w-1/3 px-2 mb-4">
              <div class="py-6 px-4 text-center bg-gray-50">
                <a class="font-bold font-heading" href="#">Location</a>
                <div class="hidden mt-6">
                  <label class="flex mb-3 items-center text-lg">
                    <input type="checkbox">
                    <span class="ml-2">Standard</span>
                  </label>
                  <label class="flex items-center text-lg">
                    <input type="checkbox">
                    <span class="ml-2">Next day (yes!)</span>
                  </label>
                </div>
              </div>
            </div> --}}
            {{-- <div class="w-1/2 md:w-1/3 px-2 mb-4">
              <div class="py-6 px-4 text-center bg-gray-50">
                <a class="font-bold font-heading" href="#">Location</a>
                <input class="hidden mt-6 w-full px-8 py-4 bg-white border rounded-md" type="serach" placeholder="City">
              </div>
            </div> --}}
            {{-- confirm filter button --}}
            <div class="w-full px-2 mb-4">
              <div class="py-6 px-4 text-center bg-gray-50">
                <button class="w-full bg-blue-300 hover:bg-blue-400 text-white font-bold font-heading py-4 px-8 rounded-md uppercase" type="submit">Apply Filter</button>
              </div>
            </div>
          </div>
        </div>
        <div class="hidden lg:block w-1/4 px-3">
          <div class="mb-6 py-10 px-12 bg-gray-50">
            <h3 class="mb-8 text-2xl font-bold font-heading">Category</h3>
            <div class="mt-6">
                @foreach ($event_types as $type)
                <label class="flex items-center text-lg mb-2">
                  <input type="radio" name="event_type" value="{{ $type->id }}" wire:change="setFilter('event_type_id', {{ $type->id }})" class="form-radio h-5 w-5 text-blue-600">
                  <span class="ml-2">{{ $type->name }}</span>
                </label>
                @endforeach
            </div>
          </div>
          {{-- <div class="mb-6 py-10 px-12 bg-gray-50">
            <h3 class="mb-8 text-2xl font-bold font-heading">Colors</h3>
            <div class="flex flex-wrap">
              <button class="mr-4 mb-2 rounded-full border border-blue-300 p-1">
                <div class="rounded-full bg-blue-300 w-5 h-5"></div>
              </button>
              <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                <div class="rounded-full bg-orange-300 w-5 h-5"></div>
              </button>
              <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                <div class="rounded-full bg-gray-900 w-5 h-5"></div>
              </button>
              <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                <div class="rounded-full bg-red-300 w-5 h-5"></div>
              </button>
              <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                <div class="rounded-full bg-green-300 w-5 h-5"></div>
              </button>
              <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                <div class="rounded-full bg-pink-300 w-5 h-5"></div>
              </button>
              <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                <div class="rounded-full bg-yellow-300 w-5 h-5"></div>
              </button>
              <button class="mr-4 mb-2 rounded-full border border-transparent hover:border-gray-300 p-1">
                <div class="rounded-full bg-gray-100 w-5 h-5"></div>
              </button>
            </div>
          </div> --}}
          <div class="mb-6 py-10 px-12 bg-gray-50">
            <h3 class="mb-8 text-2xl font-bold font-heading">Date</h3>
            <div class="mb-4">
              <label class="block text-lg font-bold font-heading" for="start_date">Start Date</label>
              <input class="w-full px-8 py-4 bg-white border rounded-md" type="date" id="start_date" name="start_date" wire:model.change="start_date">
            </div>
            <div>
              <label class="block text-lg font-bold font-heading" for="end_date">End Date</label>
              <input class="w-full px-8 py-4 bg-white border rounded-md" type="date" id="end_date" name="end_date" wire:model.change="end_date">
            </div>
          </div>
          {{-- <div class="mb-6 py-12 pl-12 pr-6 bg-gray-50">
            <h3 class="mb-8 text-2xl font-bold font-heading">Size</h3>
            <div class="flex flex-wrap -mx-2 -mb-2">
              <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">36</button>
              <button class="relative mb-2 mr-1 w-16 border rounded-md">
                37
                <span class="absolute bottom-0 left-0 w-full py-px bg-blue-300"></span>
              </button>
              <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">38</button>
              <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">39</button>
              <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">40</button>
              <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">41</button>
              <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">42</button>
              <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">43</button>
              <button class="mb-2 mr-1 w-16 py-1 border hover:border-gray-400 rounded-md">44</button>
            </div>
            <div class="mt-4 text-right">
              <a class="inline-flex underline text-blue-300 hover:text-blue-400" href="#">
                <span class="mr-2">Show all</span>
                <svg width="14" height="27" viewBox="0 0 14 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.83901 26.2775L0.151884 19.5904L0.987775 18.7545L6.66766 24.4343L6.66347 0.782814L7.84208 0.782814L7.84626 24.4343L13.1082 19.1724L13.9441 20.0083L7.6749 26.2775C7.44407 26.5083 7.06985 26.5083 6.83901 26.2775Z" fill="#3C60D9"></path>
                </svg>
              </a>
            </div>
          </div> --}}
          {{-- <div class="mb-6 py-10 px-12 bg-gray-50">
            <h3 class="mb-6 text-2xl font-bold font-heading">Location</h3>
            <label class="flex mb-3 items-center text-lg">
              <input type="checkbox">
              <span class="ml-2">Standard</span>
            </label>
            <label class="flex items-center text-lg">
              <input type="checkbox">
              <span class="ml-2">Next day (yes!)</span>
            </label>
          </div> --}}
          {{-- <div class="mb-6 py-10 px-12 bg-gray-50">
            <h3 class="mb-6 text-2xl font-bold font-heading">Location</h3>
            <input class="w-full px-8 py-4 bg-white border rounded-md" typaaaaaaaae="serach" placeholder="City">
          </div> --}}
          {{-- <div class="w-full px-2 mb-4">
            <div class="py-6 px-4 text-center bg-gray-50">
              <button class="w-full bg-blue-300 hover:bg-blue-400 text-white font-bold font-heading py-4 px-8 rounded-md uppercase" type="submit">Apply Filter</button>
            </div>
          </div> --}}
        </div>
        <div class="w-full lg:w-3/4 px-3">
          <div class="flex flex-wrap -mx-3">
            @foreach ($events as $event)
              <div class="w-full md:w-1/2 lg:w-1/4 px-3 mb-6 lg:mb-4">
                  <div class="relative bg-gray-50">
                      {{-- <span class="absolute top-0 left-0 ml-6 mt-6 px-2 py-1 text-xs font-bold font-heading bg-white border-2 border-red-500 rounded-full text-red-500">-15%</span> --}}
                      <a class="block" href="/events/{{ $event->slug }}">
                          <img class="w-full h-64 object-cover"
                              src="{{ $event->picture }}" alt="">
                      </a>
                      <div class="px-6 pb-6 mt-8">
                          <a class="block px-6 mb-2" href="/events/{{ $event->slug }}">
                              <h3 class="mb-2 text-xl font-bold font-heading">{{ $event->name }}</h3>
                              <p class="text-lg font-bold font-heading text-blue-500">
                                  <span>IDR {{ number_format( $event->price, '0', ',', '.').'.-' }}</span>
                              </p>
                          </a>
                          <a class="ml-auto mr-2 flex items-center justify-center w-12 h-12 bg-blue-300 hover:bg-blue-400 rounded-md"
                              href="/event/{{ $event->slug }}/request">
                              {{-- request icon --}}
                              <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <rect x="5" width="2" height="12" fill="white"></rect>
                                  <rect x="12" y="5" width="2" height="12" transform="rotate(90 12 5)"
                                      fill="white"></rect>
                              </svg>
                              {{-- <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <rect x="5" width="2" height="12" fill="white"></rect>
                                  <rect x="12" y="5" width="2" height="12" transform="rotate(90 12 5)"
                                      fill="white"></rect>
                              </svg> --}}
                          </a>
                      </div>
                  </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="text-center">
        <a class="inline-block bg-orange-300 hover:bg-orange-400 text-white font-bold font-heading py-6 px-8 rounded-md uppercase" href="#" wire:click.prevent="showMore">Show More</a>
      </div>
    </div>
</section>
