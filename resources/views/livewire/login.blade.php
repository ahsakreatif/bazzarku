<section class="py-20 bg-gray-100 overflow-x-hidden">
    <div class="relative container px-4 mx-auto">
      <div class="relative max-w-4xl mx-auto">
        <div class="absolute inset-0 bg-blue-200 my-24 -ml-4 -mr-4"></div>
        <div class="relative py-16 md:pt-32 md:pb-20 px-4 sm:px-8 bg-white">
          <div class="max-w-lg mx-auto text-center">
            <a class="inline-block mb-14 text-3xl font-bold font-heading" href="/">
              <img class="h-24" src="/images/logo.png" alt="" width="auto">
            </a>
            <h3 class="mb-8 text-4xl md:text-5xl font-bold font-heading">Sign in</h3>
            <form wire:submit.prevent="login">
              <div class="flex justify-center mb-10">
                <a class="mr-4 font-heading {{ $type == 'tenant' ? 'font-bold text-xl text-blue-700' : ''}}" href="{{ route('auth.login', ['type' => 'tenant' ]) }}">Tenant</a>
                <div class="w-0.5 h-6 bg-gray-300"></div>
                <a class="ml-4 font-heading {{ $type == 'vendor' ? 'font-bold text-xl text-blue-700' : '' }}" href="{{ route('auth.login', ['type' => 'vendor' ]) }}">Vendor</a>
              </div>
              @if ($errors->any())
                <div class="mb-4 text-red-500">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              @if (session('error'))
                <div class="mb-4 text-red-500">{{ session('error') }}</div>
              @endif
              <input name="email" wire:model.lazy="email" class="w-full mb-4 px-12 py-6 border border-gray-200 focus:ring-blue-300 focus:border-blue-300 rounded-md" type="text" placeholder="steven@example.dev">
              <input name="password" wire:model.lazy="password" class="w-full mb-4 px-12 py-6 border border-gray-200 focus:ring-blue-300 focus:border-blue-300 rounded-md" type="password" placeholder="Password">
              <button type="submit" class="mt-12 md:mt-16 bg-blue-800 hover:bg-blue-900 text-white font-bold font-heading py-5 px-8 rounded-md uppercase">Sign In</button>
              <div class="mt-8">
                <span class="text-sm">Don't have an account?</span>
                <a class="text-blue-800 hover:text-blue-900 font-bold" href="{{ route('auth.register', [ 'type' => $type ]) }}">Register</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
