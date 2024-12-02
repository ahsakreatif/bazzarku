<section class="py-20 bg-gray-100 overflow-x-hidden">
    <div class="relative container px-4 mx-auto">
      <div class="relative max-w-4xl mx-auto">
        <div class="absolute inset-0 bg-blue-200 my-24 -ml-4 -mr-4"></div>
        <div class="relative py-16 md:pt-32 md:pb-20 px-4 sm:px-8 bg-white">
          <div class="max-w-lg mx-auto text-center">
            <a class="inline-block mb-14 text-3xl font-bold font-heading" href="/">
            <img class="h-24" src="/images/logo.png" alt="" width="auto">
            </a>
            <h3 class="mb-8 text-4xl md:text-5xl font-heading font-bold" >Register Account</h3>
            <form wire:submit="register">
              <div class="flex justify-center mb-10">
                <a class="mr-4 font-heading {{ $type == 'tenant' ? 'font-bold text-xl text-blue-700' : ''}}" href="{{ route('auth.register', ['type' => 'tenant' ]) }}">Tenant</a>
                <div class="w-0.5 h-6 bg-gray-300"></div>
                <a class="ml-4 font-heading {{ $type == 'vendor' ? 'font-bold text-xl text-blue-700' : '' }}" href="{{ route('auth.register', ['type' => 'vendor' ]) }}">Vendor</a>
              </div>
              {{-- add error validation messages --}}
              @if ($errors->any())
              <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                @foreach ($errors->all() as $error)
                  <span class="block sm:inline">{{ $error }}</span>
                @endforeach
              </div>
              @endif
              <input name="email" class="w-full mb-4 px-12 py-6 border border-gray-200 focus:ring-blue-300 focus:border-blue-300 rounded-md" type="text" placeholder="steven@example.dev">
              <input name="name" class="w-full mb-4 px-12 py-6 border border-gray-200 focus:ring-blue-300 focus:border-blue-300 rounded-md" type="text" placeholder="Full Name">
              <input name="phone_number" class="w-full mb-4 px-12 py-6 border border-gray-200 focus:ring-blue-300 focus:border-blue-300 rounded-md" type="text" placeholder="Phone Number">
              @if ($type == 'tenant')
              <input name="tenant_name" class="w-full mb-4 px-12 py-6 border border-gray-200 focus:ring-blue-300 focus:border-blue-300 rounded-md" type="text" placeholder="Tenant Name">
              @endif
              @if ($type == 'vendor')
              <input name="vendor_name" class="w-full mb-4 px-12 py-6 border border-gray-200 focus:ring-blue-300 focus:border-blue-300 rounded-md" type="text" placeholder="Vendor Name">
              @endif
              <input name="password" class="w-full mb-4 px-12 py-6 border border-gray-200 focus:ring-blue-300 focus:border-blue-300 rounded-md" type="password" placeholder="Password">
              <input name="password_confirmation" class="w-full mb-10 px-12 py-6 border border-gray-200 focus:ring-blue-300 focus:border-blue-300 rounded-md" type="password" placeholder="Repeat password">
              <label class="flex" for="">
                <input class="mr-4 mt-1" type="checkbox">
                <span class="text-sm">By signing up, you agree to our Terms, Data Policy and Cookies.</span>
              </label>
              <button type="submit" class="mt-12 md:mt-16 bg-blue-800 hover:bg-blue-900 text-white font-bold font-heading py-5 px-8 rounded-md uppercase">JOIN Bazzarku</button>
              <div class="mt-8">
                <span class="text-sm">Already have an account?</span>
                <a class="text-blue-800 hover:text-blue-900 font-bold" href="{{ route('auth.login', [ 'type' => $type ]) }}">Login</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
