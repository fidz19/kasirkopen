@extends('components.app')

@section('title', 'Kelola Menu - Sistem Kasir Modern')

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
    
    .menu-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .menu-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }
</style>
@endpush

@section('content')
<div class="min-h-screen gradient-bg py-8">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="mb-8">
            <div class="glass-card rounded-2xl p-6 shadow-2xl">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg mr-4">
                            <i class="fas fa-utensils text-white text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">
                                Kelola Menu
                            </h1>
                            <p class="text-gray-600 mt-1">Manajemen menu makanan dan minuman</p>
                        </div>
                    </div>
                    <a href="{{ route('menu.create') }}" 
                       class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-6 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transition-all">
                        <i class="fas fa-plus mr-2"></i>Tambah Menu
                    </a>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="mb-6 glass-card rounded-xl p-5 shadow-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-check-circle text-white text-lg"></i>
                    </div>
                    <p class="text-gray-800 font-semibold">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Search & Filter -->
        <div class="glass-card rounded-2xl p-6 mb-8 shadow-xl">
            <form method="GET" action="{{ route('menu.index') }}" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Cari menu..."
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition"
                    >
                </div>
                <select 
                    name="kategori"
                    class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition"
                >
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                            {{ $kategori }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-6 py-3 rounded-xl font-bold hover:shadow-lg transition">
                    <i class="fas fa-search mr-2"></i>Cari
                </button>
                <a href="{{ route('menu.index') }}" class="bg-white border-2 border-gray-300 text-gray-700 px-6 py-3 rounded-xl font-bold hover:bg-gray-50 transition text-center">
                    <i class="fas fa-redo mr-2"></i>Reset
                </a>
            </form>
        </div>

        <!-- Menu Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($menus as $menu)
                <div class="menu-card glass-card rounded-2xl overflow-hidden shadow-xl">
                    <!-- Gambar Menu -->
                    <div class="relative h-56 overflow-hidden">
                        @if($menu->gambar)
                            <img src="{{ asset('storage/' . $menu->gambar) }}" 
                                 alt="{{ $menu->nama_menu }}"
                                 class="w-full h-full object-cover"
                                 onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full bg-gradient-to-br from-purple-400 to-indigo-600 flex items-center justify-center\'><div class=\'text-center\'><i class=\'fas fa-image text-white text-6xl mb-3 opacity-50\'></i><p class=\'text-white text-sm font-medium\'>Gambar tidak ditemukan</p></div></div>'">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-purple-400 to-indigo-600 flex items-center justify-center">
                                <div class="text-center">
                                    <i class="fas fa-utensils text-white text-6xl mb-3 opacity-50"></i>
                                    <p class="text-white text-sm font-medium">Tidak ada gambar</p>
                                </div>
                            </div>
                        @endif
                        
                        <!-- Badge Kategori -->
                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1.5 bg-white/90 backdrop-blur-sm text-purple-700 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-tag mr-1"></i>{{ $menu->kategori }}
                            </span>
                        </div>

                        <!-- Badge Stok -->
                        <div class="absolute top-3 right-3">
                            <span class="px-3 py-1.5 {{ $menu->stok > 10 ? 'bg-green-500' : ($menu->stok > 0 ? 'bg-yellow-500' : 'bg-red-500') }} rounded-full text-white text-xs font-bold shadow-lg">
                                <i class="fas fa-box mr-1"></i>{{ $menu->stok }}
                            </span>
                        </div>
                    </div>

                    <!-- Info Menu -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $menu->nama_menu }}</h3>
                        
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Harga</p>
                            <p class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">
                                {{ $menu->harga_format }}
                            </p>
                        </div>

                        @if($menu->deskripsi)
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $menu->deskripsi }}</p>
                        @endif

                        <!-- Update Stok -->
                        <div class="mb-4 bg-gray-50 rounded-xl p-4 border border-gray-200">
                            <form method="POST" action="{{ route('menu.updateStok', $menu) }}">
                                @csrf
                                <label class="text-xs font-bold text-gray-700 uppercase tracking-wide flex items-center mb-3">
                                    <i class="fas fa-warehouse mr-2 text-purple-600"></i>
                                    Kelola Stok
                                </label>
                                <div class="flex items-stretch gap-2">
                                    <input 
                                        type="number" 
                                        name="stok" 
                                        value="{{ $menu->stok }}"
                                        min="0"
                                        class="w-20 px-3 py-2 border-2 border-gray-300 rounded-lg text-center font-bold text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                    >
                                    <button type="submit" class="flex-1 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:shadow-lg transition font-bold text-sm">
                                        <i class="fas fa-save mr-1"></i>Simpan
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3">
                            <a href="{{ route('menu.edit', $menu) }}" 
                               class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 text-white py-2.5 rounded-xl text-center hover:shadow-lg transition font-bold">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            <form method="POST" action="{{ route('menu.destroy', $menu) }}" 
                                  onsubmit="return confirm('Yakin ingin menghapus menu ini?')"
                                  class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white py-2.5 rounded-xl hover:shadow-lg transition font-bold">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="glass-card rounded-2xl p-16 text-center shadow-xl">
                        <div class="w-32 h-32 bg-gradient-to-br from-purple-400 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-2xl">
                            <i class="fas fa-utensils text-white text-6xl"></i>
                        </div>
                        <p class="text-gray-600 text-2xl font-bold mb-2">Belum ada menu</p>
                        <p class="text-gray-500 mb-6">Mulai tambahkan menu pertama Anda</p>
                        <a href="{{ route('menu.create') }}" 
                           class="inline-flex items-center bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-8 py-4 rounded-xl hover:shadow-2xl transition font-bold">
                            <i class="fas fa-plus mr-2"></i>Tambah Menu Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($menus->hasPages())
            <div class="mt-8">
                {{ $menus->links() }}
            </div>
        @endif
    </div>
</div>

<style>
    .line-clamp-2 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>
@endsection