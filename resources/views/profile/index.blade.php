@extends('components.app')

@section('title', 'Profile - Sistem Kasir Modern')

@push('styles')
<style>
    .gradient-bg {
        background: #1f2937;
    }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    
    .input-field {
        transition: all 0.3s ease;
    }
    
    .input-field:focus {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }
</style>
@endpush

@section('content')
<div class="min-h-screen gradient-bg py-8">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Header -->
        <div class="mb-8">
            <div class="glass-card rounded-2xl p-6 shadow-2xl">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg mr-4">
                        <i class="fas fa-user text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">
                            Profile Saya
                        </h1>
                        <p class="text-gray-600 mt-1">Kelola informasi akun Anda</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Kasir -->
        <div class="glass-card rounded-2xl p-6 shadow-xl mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                    <i class="fas fa-info-circle text-white"></i>
                </div>
                Informasi Akun
            </h2>
            <div class="space-y-3">
                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-2xl mr-4 shadow-lg">
                        {{ strtoupper(substr($kasir->nama_kasir, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 font-semibold">Nama Kasir</p>
                        <p class="text-lg font-bold text-gray-900">{{ $kasir->nama_kasir }}</p>
                    </div>
                </div>
                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                    <span class="text-gray-600 font-semibold">Username:</span>
                    <span class="font-bold text-gray-900 font-mono">{{ $kasir->username }}</span>
                </div>
            </div>
        </div>

        <!-- Form Update Nama Kasir -->
        <div class="glass-card rounded-2xl p-6 shadow-xl mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                    <i class="fas fa-id-card text-white"></i>
                </div>
                Update Nama Kasir
            </h2>
            
            <form action="{{ route('profile.updateNamaKasir') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="flex flex-col md:flex-row gap-4 items-end">
                    <div class="flex-1">
                        <label for="nama_kasir" class="block text-sm font-bold text-gray-700 mb-2">
                            Nama Kasir Baru
                        </label>
                        <input 
                            type="text" 
                            id="nama_kasir" 
                            name="nama_kasir" 
                            value="{{ old('nama_kasir', $kasir->nama_kasir) }}"
                            class="input-field w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-pink-500 focus:outline-none font-semibold"
                            placeholder="Masukkan nama kasir baru"
                            required
                        >
                        @error('nama_kasir')
                            <p class="text-red-600 text-sm mt-2 font-semibold">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <button 
                        type="submit" 
                        class="bg-gradient-to-r from-pink-500 to-pink-600 text-white px-8 py-3 rounded-xl font-bold hover:shadow-xl transition-all whitespace-nowrap"
                    >
                        <i class="fas fa-save mr-2"></i>Simpan Nama
                    </button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Form Update Username -->
            <div class="glass-card rounded-2xl p-6 shadow-xl">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                        <i class="fas fa-user-edit text-white"></i>
                    </div>
                    Update Username
                </h2>
                
                <form action="{{ route('profile.updateUsername') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-bold text-gray-700 mb-2">
                            Username Baru
                        </label>
                        <input 
                            type="text" 
                            id="username" 
                            name="username" 
                            value="{{ old('username', $kasir->username) }}"
                            class="input-field w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-purple-500 focus:outline-none font-semibold"
                            placeholder="Masukkan username baru"
                            required
                        >
                        @error('username')
                            <p class="text-red-600 text-sm mt-2 font-semibold">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-xl font-bold hover:shadow-xl transition-all"
                    >
                        <i class="fas fa-save mr-2"></i>Simpan Username
                    </button>
                </form>
            </div>

            <!-- Form Update Password -->
            <div class="glass-card rounded-2xl p-6 shadow-xl">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                        <i class="fas fa-lock text-white"></i>
                    </div>
                    Update Password
                </h2>
                
                <form action="{{ route('profile.updatePassword') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="password_lama" class="block text-sm font-bold text-gray-700 mb-2">
                            Password Lama
                        </label>
                        <input 
                            type="password" 
                            id="password_lama" 
                            name="password_lama" 
                            class="input-field w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-purple-500 focus:outline-none font-semibold"
                            placeholder="Masukkan password lama"
                            required
                        >
                        @error('password_lama')
                            <p class="text-red-600 text-sm mt-2 font-semibold">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="password_baru" class="block text-sm font-bold text-gray-700 mb-2">
                            Password Baru
                        </label>
                        <input 
                            type="password" 
                            id="password_baru" 
                            name="password_baru" 
                            class="input-field w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-purple-500 focus:outline-none font-semibold"
                            placeholder="Masukkan password baru (min. 6 karakter)"
                            required
                        >
                        @error('password_baru')
                            <p class="text-red-600 text-sm mt-2 font-semibold">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label for="password_baru_confirmation" class="block text-sm font-bold text-gray-700 mb-2">
                            Konfirmasi Password Baru
                        </label>
                        <input 
                            type="password" 
                            id="password_baru_confirmation" 
                            name="password_baru_confirmation" 
                            class="input-field w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-purple-500 focus:outline-none font-semibold"
                            placeholder="Konfirmasi password baru"
                            required
                        >
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-xl font-bold hover:shadow-xl transition-all"
                    >
                        <i class="fas fa-key mr-2"></i>Simpan Password
                    </button>
                </form>
            </div>
        </div>

        <!-- Security Tips -->
        <div class="mt-6 glass-card rounded-2xl p-6 shadow-xl">
            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                    <i class="fas fa-shield-alt text-white"></i>
                </div>
                Tips Keamanan
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-start p-4 bg-purple-50 rounded-lg border-l-4 border-purple-500">
                    <i class="fas fa-check-circle text-purple-600 text-xl mr-3 mt-1"></i>
                    <div>
                        <p class="font-bold text-gray-900">Gunakan Password Kuat</p>
                        <p class="text-sm text-gray-600">Minimal 6 karakter dengan kombinasi huruf dan angka</p>
                    </div>
                </div>
                <div class="flex items-start p-4 bg-indigo-50 rounded-lg border-l-4 border-indigo-500">
                    <i class="fas fa-check-circle text-indigo-600 text-xl mr-3 mt-1"></i>
                    <div>
                        <p class="font-bold text-gray-900">Jangan Bagikan Password</p>
                        <p class="text-sm text-gray-600">Jaga kerahasiaan password Anda</p>
                    </div>
                </div>
                <div class="flex items-start p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                    <i class="fas fa-check-circle text-blue-600 text-xl mr-3 mt-1"></i>
                    <div>
                        <p class="font-bold text-gray-900">Update Berkala</p>
                        <p class="text-sm text-gray-600">Ganti password secara berkala untuk keamanan</p>
                    </div>
                </div>
                <div class="flex items-start p-4 bg-green-50 rounded-lg border-l-4 border-green-500">
                    <i class="fas fa-check-circle text-green-600 text-xl mr-3 mt-1"></i>
                    <div>
                        <p class="font-bold text-gray-900">Username Unik</p>
                        <p class="text-sm text-gray-600">Gunakan username yang mudah diingat tapi unik</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
