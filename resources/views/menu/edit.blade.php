@extends('components.app')

@section('title', 'Edit Menu - Sistem Kasir Modern')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <!-- Header -->
    <div class="mb-8">
        <a href="{{ route('menu.index') }}" class="text-purple-600 hover:text-purple-700 mb-4 inline-block">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
        <h1 class="text-3xl font-bold gradient-text mb-2">Edit Menu</h1>
        <p class="text-gray-600">Update informasi menu {{ $menu->nama_menu }}</p>
    </div>

    <!-- Form -->
    <div class="card p-8">
        <form method="POST" action="{{ route('menu.update', $menu) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Menu -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-utensils mr-2 text-purple-600"></i>Nama Menu *
                </label>
                <input 
                    type="text" 
                    name="nama_menu" 
                    value="{{ old('nama_menu', $menu->nama_menu) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 @error('nama_menu') border-red-500 @enderror"
                    required
                >
                @error('nama_menu')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Harga & Stok -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-money-bill-wave mr-2 text-purple-600"></i>Harga *
                    </label>
                    <input 
                        type="number" 
                        name="harga" 
                        value="{{ old('harga', $menu->harga) }}"
                        min="0"
                        step="0.01"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 @error('harga') border-red-500 @enderror"
                        required
                    >
                    @error('harga')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-box mr-2 text-purple-600"></i>Stok *
                    </label>
                    <input 
                        type="number" 
                        name="stok" 
                        value="{{ old('stok', $menu->stok) }}"
                        min="0"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 @error('stok') border-red-500 @enderror"
                        required
                    >
                    @error('stok')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Kategori -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-tag mr-2 text-purple-600"></i>Kategori *
                </label>
                <div class="flex gap-2">
                    <select 
                        name="kategori" 
                        id="kategoriSelect"
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500"
                        required
                    >
                        @foreach($kategoris as $kat)
                            <option value="{{ $kat }}" {{ old('kategori', $menu->kategori) == $kat ? 'selected' : '' }}>
                                {{ $kat }}
                            </option>
                        @endforeach
                        <option value="custom">+ Kategori Baru</option>
                    </select>
                    <input 
                        type="text" 
                        id="kategoriCustom"
                        class="hidden flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500"
                        placeholder="Nama kategori baru"
                    >
                </div>
                @error('kategori')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gambar -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-image mr-2 text-purple-600"></i>Gambar Menu
                </label>
                
                @if($menu->gambar)
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                        <img src="{{ asset('storage/' . $menu->gambar) }}" 
                             alt="{{ $menu->nama_menu }}"
                             class="w-48 h-48 object-cover rounded-lg">
                    </div>
                @endif

                <div class="flex items-center gap-4">
                    <label class="flex-1 cursor-pointer">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-purple-500 transition">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-600">Klik untuk upload gambar baru</p>
                            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF (Max: 2MB)</p>
                        </div>
                        <input 
                            type="file" 
                            name="gambar" 
                            accept="image/*"
                            class="hidden"
                            onchange="previewImage(event)"
                        >
                    </label>
                    <div id="imagePreview" class="hidden w-32 h-32">
                        <img src="" alt="Preview" class="w-full h-full object-cover rounded-lg">
                    </div>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-align-left mr-2 text-purple-600"></i>Deskripsi
                </label>
                <textarea 
                    name="deskripsi" 
                    rows="4"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500"
                >{{ old('deskripsi', $menu->deskripsi) }}</textarea>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4">
                <button 
                    type="submit"
                    class="flex-1 bg-gradient-to-r from-purple-500 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:shadow-lg transition"
                >
                    <i class="fas fa-save mr-2"></i>Update Menu
                </button>
                <a 
                    href="{{ route('menu.index') }}"
                    class="flex-1 bg-gray-200 text-gray-800 py-3 rounded-lg font-semibold hover:bg-gray-300 transition text-center"
                >
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    const kategoriSelect = document.getElementById('kategoriSelect');
    const kategoriCustom = document.getElementById('kategoriCustom');

    kategoriSelect.addEventListener('change', function() {
        if (this.value === 'custom') {
            kategoriCustom.classList.remove('hidden');
            kategoriCustom.required = true;
            kategoriSelect.removeAttribute('name');
            kategoriCustom.setAttribute('name', 'kategori');
        } else {
            kategoriCustom.classList.add('hidden');
            kategoriCustom.required = false;
            kategoriCustom.removeAttribute('name');
            kategoriSelect.setAttribute('name', 'kategori');
        }
    });

    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        const img = preview.querySelector('img');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
@endsection