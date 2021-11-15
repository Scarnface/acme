@if (session()->has('success'))
  <div x-data="{ show: true }"
       x-init="setTimeout(() => show = false, 4000)"
       x-show="show"
       class="fixed bg-red-800 text-white text-sm mb-0 py-2 px-4 rounded-xl right-3 bottom-3"
  >
    <span>{{ session('success') }}</span>
  </div>
@endif
