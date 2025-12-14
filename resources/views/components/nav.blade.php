{{-- Pastikan Alpine.js sudah dimuat di layout utama --}}
{{-- Tambahkan ini di head jika belum ada: --}}
{{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

<nav class="shadow-lg sticky top-0 z-50 backdrop-blur-md bg-gradient-to-r from-emerald-600 to-teal-600 border-b border-emerald-500/30" x-data="{ open: false, profileOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo Section -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-white to-emerald-100 rounded-xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 ease-out">
                        <i class="fas fa-cash-register text-emerald-600 text-xl group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <div class="hidden sm:block">
                        <span class="text-2xl font-bold text-white group-hover:text-emerald-100 transition-all duration-300">Kasir Kopen</span>
                        <p class="text-xs text-emerald-100 -mt-1">Sistem POS Terpadu</p>
                    </div>
                </a>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-2">
                    <a href="{{ route('dashboard') }}" class="relative px-5 py-2.5 rounded-xl font-medium transition-all duration-300 group {{ request()->routeIs('dashboard') ? 'text-white' : 'text-emerald-50 hover:text-white' }}">
                        <span class="relative z-10 flex items-center">
                            <i class="fas fa-home mr-2 transition-transform group-hover:scale-110 duration-300"></i>
                            Dashboard
                        </span>
                        @if(request()->routeIs('dashboard'))
                        <span class="absolute inset-0 bg-white/20 rounded-xl backdrop-blur-sm"></span>
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1/2 h-1 bg-white rounded-full"></span>
                        @else
                        <span class="absolute inset-0 bg-white/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        @endif
                    </a>
                    
                    <a href="{{ route('transaksi.index') }}" class="relative px-5 py-2.5 rounded-xl font-medium transition-all duration-300 group {{ request()->routeIs('transaksi.*') ? 'text-white' : 'text-emerald-50 hover:text-white' }}">
                        <span class="relative z-10 flex items-center">
                            <i class="fas fa-shopping-cart mr-2 transition-transform group-hover:scale-110 duration-300"></i>
                            Transaksi
                        </span>
                        @if(request()->routeIs('transaksi.*'))
                        <span class="absolute inset-0 bg-white/20 rounded-xl backdrop-blur-sm"></span>
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1/2 h-1 bg-white rounded-full"></span>
                        @else
                        <span class="absolute inset-0 bg-white/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        @endif
                    </a>
                    
                    <a href="{{ route('menu.index') }}" class="relative px-5 py-2.5 rounded-xl font-medium transition-all duration-300 group {{ request()->routeIs('menu.*') ? 'text-white' : 'text-emerald-50 hover:text-white' }}">
                        <span class="relative z-10 flex items-center">
                            <i class="fas fa-utensils mr-2 transition-transform group-hover:scale-110 duration-300"></i>
                            Menu
                        </span>
                        @if(request()->routeIs('menu.*'))
                        <span class="absolute inset-0 bg-white/20 rounded-xl backdrop-blur-sm"></span>
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1/2 h-1 bg-white rounded-full"></span>
                        @else
                        <span class="absolute inset-0 bg-white/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        @endif
                    </a>
                    
                    <a href="{{ route('laporan.index') }}" class="relative px-5 py-2.5 rounded-xl font-medium transition-all duration-300 group {{ request()->routeIs('laporan.*') ? 'text-white' : 'text-emerald-50 hover:text-white' }}">
                        <span class="relative z-10 flex items-center">
                            <i class="fas fa-chart-line mr-2 transition-transform group-hover:scale-110 duration-300"></i>
                            Laporan
                        </span>
                        @if(request()->routeIs('laporan.*'))
                        <span class="absolute inset-0 bg-white/20 rounded-xl backdrop-blur-sm"></span>
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1/2 h-1 bg-white rounded-full"></span>
                        @else
                        <span class="absolute inset-0 bg-white/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        @endif
                    </a>
                </div>
            </div>
            
            <!-- Right Section -->
            <div class="hidden md:flex items-center space-x-3">
                <!-- Notification Button -->
                <button class="relative p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
                    <i class="fas fa-bell text-white text-lg group-hover:text-emerald-100 transition-colors duration-300 group-hover:animate-pulse"></i>
                    <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-gradient-to-r from-red-500 to-pink-500 rounded-full animate-pulse shadow-lg"></span>
                    <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full animate-ping"></span>
                </button>
                
                <!-- Profile Dropdown -->
                <div class="relative" @click.away="profileOpen = false">
                    <button @click="profileOpen = !profileOpen" class="flex items-center space-x-3 px-4 py-2.5 rounded-xl hover:bg-white/20 transition-all duration-300 group border-2 border-transparent hover:border-white/30">
                        <div class="w-10 h-10 bg-gradient-to-br from-white to-emerald-100 rounded-xl flex items-center justify-center shadow-md transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                            <span class="text-emerald-600 font-bold text-sm">{{ substr(auth()->user()->nama_kasir ?? 'A', 0, 1) }}</span>
                        </div>
                        <div class="text-left hidden lg:block">
                            <p class="text-sm font-semibold text-white group-hover:text-emerald-100 transition-colors duration-300">{{ auth()->user()->nama_kasir ?? 'Admin' }}</p>
                            <p class="text-xs text-emerald-100">{{ auth()->user()->username ?? 'admin' }}</p>
                        </div>
                        <i class="fas fa-chevron-down text-white text-sm transition-all duration-300 group-hover:text-emerald-100" :class="{ 'rotate-180': profileOpen }"></i>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div x-show="profileOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95 -translate-y-2"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 -translate-y-2"
                         class="absolute right-0 mt-3 w-56 bg-white/95 backdrop-blur-lg rounded-2xl shadow-2xl py-2 border border-gray-100 overflow-hidden z-50">
                        
                        <!-- Profile Header -->
                        <div class="px-4 py-3 bg-gradient-to-r from-emerald-50 to-teal-50 border-b border-gray-100">
                            <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->nama_kasir ?? 'Admin' }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->username ?? 'admin' }}</p>
                        </div>
                        
                        <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-emerald-50 hover:to-teal-50 transition-all duration-300 group">
                            <i class="fas fa-user mr-3 text-emerald-600 w-5 group-hover:scale-110 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Profil Saya</span>
                        </a>
                        
                        <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-emerald-50 hover:to-teal-50 transition-all duration-300 group">
                            <i class="fas fa-cog mr-3 text-emerald-600 w-5 group-hover:rotate-90 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Pengaturan</span>
                        </a>
                        
                        <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-emerald-50 hover:to-teal-50 transition-all duration-300 group">
                            <i class="fas fa-question-circle mr-3 text-emerald-600 w-5 group-hover:scale-110 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Bantuan</span>
                        </a>
                        
                        <hr class="my-2 border-gray-200">
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-3 text-sm text-red-600 hover:bg-gradient-to-r hover:from-red-50 hover:to-pink-50 transition-all duration-300 group">
                                <i class="fas fa-sign-out-alt mr-3 w-5 group-hover:translate-x-1 transition-transform duration-300"></i>
                                <span class="group-hover:translate-x-1 transition-transform duration-300">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="md:hidden relative z-50">
                <button type="button" @click="open = !open" class="p-3 rounded-xl hover:bg-white/20 transition-all duration-300 border-2 border-transparent hover:border-white/30 relative z-50 pointer-events-auto">
                    <i class="fas text-white text-xl transition-all duration-300" :class="open ? 'fa-times rotate-90' : 'fa-bars'"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div x-show="open" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-4"
         class="md:hidden border-t border-emerald-500/30 bg-gradient-to-r from-emerald-600 to-teal-600 backdrop-blur-lg">
        <div class="px-4 py-4 space-y-2">
            <!-- User Info Mobile -->
            <div class="flex items-center space-x-3 px-4 py-3 bg-white/20 rounded-xl mb-3">
                <div class="w-12 h-12 bg-gradient-to-br from-white to-emerald-100 rounded-xl flex items-center justify-center shadow-md">
                    <span class="text-emerald-600 font-bold">{{ substr(auth()->user()->nama_kasir ?? 'A', 0, 1) }}</span>
                </div>
                <div>
                    <p class="text-sm font-semibold text-white">{{ auth()->user()->nama_kasir ?? 'Admin' }}</p>
                    <p class="text-xs text-emerald-100">{{ auth()->user()->username ?? 'admin' }}</p>
                </div>
            </div>
            
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3.5 rounded-xl transition-all duration-300 group {{ request()->routeIs('dashboard') ? 'bg-white/20 text-white font-semibold shadow-sm' : 'text-emerald-50 hover:bg-white/10 hover:text-white' }}">
                <i class="fas fa-home mr-3 w-5 group-hover:scale-110 transition-transform duration-300"></i>
                <span class="group-hover:translate-x-1 transition-transform duration-300">Dashboard</span>
            </a>
            
            <a href="{{ route('transaksi.index') }}" class="flex items-center px-4 py-3.5 rounded-xl transition-all duration-300 group {{ request()->routeIs('transaksi.*') ? 'bg-white/20 text-white font-semibold shadow-sm' : 'text-emerald-50 hover:bg-white/10 hover:text-white' }}">
                <i class="fas fa-shopping-cart mr-3 w-5 group-hover:scale-110 transition-transform duration-300"></i>
                <span class="group-hover:translate-x-1 transition-transform duration-300">Transaksi</span>
            </a>
            
            <a href="{{ route('menu.index') }}" class="flex items-center px-4 py-3.5 rounded-xl transition-all duration-300 group {{ request()->routeIs('menu.*') ? 'bg-white/20 text-white font-semibold shadow-sm' : 'text-emerald-50 hover:bg-white/10 hover:text-white' }}">
                <i class="fas fa-utensils mr-3 w-5 group-hover:scale-110 transition-transform duration-300"></i>
                <span class="group-hover:translate-x-1 transition-transform duration-300">Menu</span>
            </a>
            
            <a href="{{ route('laporan.index') }}" class="flex items-center px-4 py-3.5 rounded-xl transition-all duration-300 group {{ request()->routeIs('laporan.*') ? 'bg-white/20 text-white font-semibold shadow-sm' : 'text-emerald-50 hover:bg-white/10 hover:text-white' }}">
                <i class="fas fa-chart-line mr-3 w-5 group-hover:scale-110 transition-transform duration-300"></i>
                <span class="group-hover:translate-x-1 transition-transform duration-300">Laporan</span>
            </a>
            
            <hr class="my-3 border-emerald-500/30">
            
            <a href="#" class="flex items-center px-4 py-3.5 rounded-xl text-emerald-50 hover:bg-white/10 hover:text-white transition-all duration-300 group">
                <i class="fas fa-cog mr-3 w-5 group-hover:rotate-90 transition-transform duration-300"></i>
                <span class="group-hover:translate-x-1 transition-transform duration-300">Pengaturan</span>
            </a>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3.5 rounded-xl text-red-100 hover:bg-red-500/30 hover:text-white transition-all duration-300 group">
                    <i class="fas fa-sign-out-alt mr-3 w-5 group-hover:translate-x-1 transition-transform duration-300"></i>
                    <span class="group-hover:translate-x-1 transition-transform duration-300">Logout</span>
                </button>
            </form>
        </div>
    </div>
</nav>

<style>
    /* Custom scrollbar untuk dropdown */
    .overflow-y-auto::-webkit-scrollbar {
        width: 6px;
    }
    
    .overflow-y-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .overflow-y-auto::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #10b981 0%, #14b8a6 100%);
        border-radius: 10px;
    }
    
    .overflow-y-auto::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #14b8a6 0%, #10b981 100%);
    }

    [x-cloak] { display: none !important;}
    
</style>