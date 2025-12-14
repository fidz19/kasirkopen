@extends('components.app')

@section('title', 'Tambah Menu - Sistem Kasir Modern')

@push('styles')
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    
    .form-input {
        transition: all 0.3s ease;
    }
    
    .form-input:focus {
        transform: translateY(-2px);
    }
</style>
@endpush

@section('content')
<div class="min-h-screen gradient-bg py-8">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('menu.index') }}" 
               class="inline-flex items-center text-white hover:text-gray-200 mb-4 font-semibold transition-all">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Menu
            </a>
            <div class="glass-card rounded-2xl p-6 shadow-2xl">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg mr-4">
                        <i class="fas fa-utensils text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">
                            Tambah Menu Baru
                        </h1>
                        <p class="text-gray-600 mt-1">Lengkapi informasi menu yang ingin ditambahkan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="glass-card rounded-2xl shadow-2xl overflow-hidden">
            <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="p-8 space-y-6">
                    <!-- Nama Menu -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">
                            <i class="fas fa-utensils mr-2 text-purple-600"></i>Nama Menu *
                        </label>
                        <input 
                            type="text" 
                            name="nama_menu" 
                            value="{{ old('nama_menu') }}"
                            class="form-input w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 @error('nama_menu') border-red-500 @enderror"
                            placeholder="Contoh: Nasi Goreng Spesial"
                            required
                        >
                        @error('nama_menu')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Harga & Stok -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Harga -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">
                                <i class="fas fa-money-bill-wave mr-2 text-green-600"></i>Harga *
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-bold">Rp</span>
                                <input 
                                    type="number" 
                                    name="harga" 
                                    value="{{ old('harga') }}"
                                    min="0"
                                    step="0.01"
                                    class="form-input w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-green-500/20 focus:border-green-500 @error('harga') border-red-500 @enderror"
                                    placeholder="15000"
                                    required
                                >
                            </div>
                            @error('harga')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Stok -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">
                                <i class="fas fa-box mr-2 text-blue-600"></i>Stok Awal *
                            </label>
                            <input 
                                type="number" 
                                name="stok" 
                                value="{{ old('stok', 0) }}"
                                min="0"
                                class="form-input w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 @error('stok') border-red-500 @enderror"
                                placeholder="50"
                                required
                            >
                            @error('stok')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">
                            <i class="fas fa-tag mr-2 text-orange-600"></i>Kategori *
                        </label>
                        <div class="flex gap-3">
                            <select 
                                name="kategori" 
                                id="kategoriSelect"
                                class="form-input flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-orange-500/20 focus:border-orange-500 @error('kategori') border-red-500 @enderror"
                                required
                            >
                                <option value="">Pilih Kategori</option>
                                @foreach($kategoris as $kat)
                                    <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>
                                        {{ $kat }}
                                    </option>
                                @endforeach
                                <option value="custom">+ Kategori Baru</option>
                            </select>
                            <input 
                                type="text" 
                                id="kategoriCustom"
                                class="hidden form-input flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-orange-500/20 focus:border-orange-500"
                                placeholder="Nama kategori baru"
                            >
                        </div>
                        @error('kategori')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">
                            <i class="fas fa-image mr-2 text-pink-600"></i>Gambar Menu
                        </label>
                        <div class="grid md:grid-cols-2 gap-4">
                            <label class="cursor-pointer">
                                <div class="border-3 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-purple-500 transition-all bg-white">
                                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                                        <i class="fas fa-cloud-upload-alt text-white text-2xl"></i>
                                    </div>
                                    <p class="text-gray-700 font-semibold mb-1">Klik untuk upload</p>
                                    <p class="text-xs text-gray-500">JPG, PNG, GIF (Max: 2MB)</p>
                                </div>
                                <input 
                                    type="file" 
                                    name="gambar" 
                                    accept="image/*"
                                    class="hidden"
                                    onchange="previewImage(event)"
                                >
                            </label>
                            <div id="imagePreview" class="hidden">
                                <div class="relative h-full rounded-xl overflow-hidden shadow-xl">
                                    <img src="" alt="Preview" class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                        @error('gambar')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">
                            <i class="fas fa-align-left mr-2 text-indigo-600"></i>Deskripsi
                        </label>
                        <textarea 
                            name="deskripsi" 
                            rows="4"
                            class="form-input w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 resize-none @error('deskripsi') border-red-500 @enderror"
                            placeholder="Deskripsi singkat tentang menu..."
                        >{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="bg-gray-50 px-8 py-6 flex gap-4">
                    <button 
                        type="submit"
                        class="flex-1 bg-gradient-to-r from-purple-500 to-indigo-600 text-white py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transition-all"
                    >
                        <i class="fas fa-save mr-2"></i>Simpan Menu
                    </button>
                    <a 
                        href="{{ route('menu.index') }}"
                        class="flex-1 bg-white border-2 border-gray-300 text-gray-700 py-3 rounded-xl font-bold hover:bg-gray-50 transition-all text-center"
                    >
                        <i class="fas fa-times mr-2"></i>Batal
                    </a>
                </div>
            </form>
        </div>
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
            kategoriCustom.focus();
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

<style>
    .border-3 {
        border-width: 3px;
    }
</style>
@endpush
@endsection