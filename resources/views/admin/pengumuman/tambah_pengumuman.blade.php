<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="//unpkg.com/alpinejs" defer></script>

    @include('admin.partial.link')
    <title>Tambah Pengumuman | Admin TK Pintar</title>
</head>

<body class="text-blueGray-700 antialiased">
    @include('admin.partial.navbar')
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        <div class="relative md:ml-64 bg-blueGray-50">

            <!-- HEADER -->
            <div class="grid grid-cols-1 md:grid-cols-2 items-center md:px-10 px-4 mt-4">
                <a class="text-black text-sm uppercase font-semibold lg:inline-block">Tambah Pengumuman</a>
                @include('admin.partial.user_info')
            </div>

            <!-- FORM CONTAINER -->
            <div class="p-6">
                <form action="{{ route('pengumuman.store') }}" method="POST"
                    class="space-y-6 bg-white p-6 rounded-xl shadow-md">
                    @csrf
                    <!-- Form 1: Judul Pengumuman -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Pengumuman</label>
                        <input type="text" id="title" name="title" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan judul pengumuman">
                    </div>

                    <!-- Form 2: Isi Pengumuman -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Isi Pengumuman</label>
                        <textarea id="content" name="content" rows="6" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Tulis isi pengumuman di sini..."></textarea>
                    </div>

                    <!-- Form 3 & 4: Tanggal dan Kelas Tujuan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                            <input type="date" id="date" name="date" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
                        </div>

                        <div x-data="{ open: false, selected: [], allSelected: false }" class="relative">
                        <label for="classes" class="block text-sm font-medium text-gray-700 mb-2">Tujuan Kelas</label>
                        
                        <!-- Dropdown Button -->
                        <button type="button" @click="open = !open"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white text-left focus:outline-none focus:ring focus:border-blue-300">
                            <template x-if="selected.length === 0">
                                <span>Pilih Kelas</span>
                            </template>
                            <template x-if="selected.length > 0">
                                <span x-text="selected.length + ' kelas dipilih'"></span>
                            </template>
                        </button>

                        <!-- Dropdown Content -->
                        <div x-show="open" @click.away="open = false" class="absolute z-10 mt-2 w-full bg-white border border-gray-300 rounded-lg shadow-lg max-h-60 overflow-y-auto">
                            <label class="flex items-center px-4 py-2">
                                <input type="checkbox" value="all" @change="allSelected = !allSelected; selected = allSelected ? {{ $classes->pluck('id') }} : []"
                                    :checked="allSelected" class="mr-2">
                                Semua
                            </label>
                            @foreach($classes as $class)
                                <label class="flex items-center px-4 py-2">
                                    <input type="checkbox" name="classes[]" value="{{ $class->id }}"
                                        @change="if ($event.target.checked) selected.push({{ $class->id }}); else selected = selected.filter(id => id !== {{ $class->id }})"
                                        :checked="selected.includes {{ $class->id }})"
                                        class="mr-2">
                                    {{ $class->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('pengumuman.index') }}"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @include('admin.partial.script')
    <script>
document.getElementById('classes').addEventListener('change', function(e) {
    const select = e.target;
    const selectedValues = Array.from(select.selectedOptions).map(opt => opt.value);

    if (selectedValues.includes('all')) {
        // Select all except 'all'
        for (let option of select.options) {
            if (option.value !== 'all') {
                option.selected = true;
            }
        }
    } else {
        // If 'all' is selected but then unselected, deselect 'all'
        const allOption = Array.from(select.options).find(opt => opt.value === 'all');
        if (allOption) {
            allOption.selected = false;
        }
    }
});
</script>
</body>

</html>