<div class="flex items-center justify-end gap-3 text-black">
  <div class="leading-tight text-right">
    <p class="email text-sm font-semibold">{{ Auth::user()->email }}</p>
    <p class="jabatan text-xs">{{ Auth::user()->role ?? 'Admin' }}</p>
  </div>
  @php
    $profileImage = Auth::user()->imageUrls->where('jenis', 'teacher')->sortByDesc('created_at')->first();
    $imageUrl = $profileImage ? asset($profileImage->url) . '?v=' . time() : asset('img/pp.png');
  @endphp
  <img src="{{ $imageUrl }}" alt="User Photo" class="fotoProfil w-10 h-10 rounded-full object-cover shadow shadow-lg border-2 border-[#0090D4]" />
</div>