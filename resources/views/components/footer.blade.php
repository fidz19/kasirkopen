<footer class="glass-effect mt-12 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-cash-register text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold gradient-text">Kasir Modern</span>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Sistem kasir modern dengan tampilan elegan dan fitur lengkap untuk mengelola bisnis Anda dengan mudah.
                </p>
                <div class="flex space-x-3">
                    <a href="#" class="w-9 h-9 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center smooth-transition hover-lift">
                        <i class="fab fa-facebook-f text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center smooth-transition hover-lift">
                        <i class="fab fa-twitter text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center smooth-transition hover-lift">
                        <i class="fab fa-instagram text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center smooth-transition hover-lift">
                        <i class="fab fa-linkedin-in text-white text-sm"></i>
                    </a>
                </div>
            </div>
            
            <div>
                <h3 class="text-gray-900 font-semibold mb-4 flex items-center">
                    <i class="fas fa-link mr-2 text-purple-600"></i>Menu Cepat
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-purple-600 smooth-transition flex items-center group">
                            <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 smooth-transition"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transaksi.index') }}" class="text-gray-600 hover:text-purple-600 smooth-transition flex items-center group">
                            <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 smooth-transition"></i>
                            Transaksi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('menu.index') }}" class="text-gray-600 hover:text-purple-600 smooth-transition flex items-center group">
                            <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 smooth-transition"></i>
                            Menu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.index') }}" class="text-gray-600 hover:text-purple-600 smooth-transition flex items-center group">
                            <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 smooth-transition"></i>
                            Laporan
                        </a>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-gray-900 font-semibold mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-purple-600"></i>Bantuan
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="text-gray-600 hover:text-purple-600 smooth-transition flex items-center group">
                            <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 smooth-transition"></i>
                            Panduan Penggunaan
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-purple-600 smooth-transition flex items-center group">
                            <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 smooth-transition"></i>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-purple-600 smooth-transition flex items-center group">
                            <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 smooth-transition"></i>
                            Kontak Support
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-purple-600 smooth-transition flex items-center group">
                            <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 smooth-transition"></i>
                            Kebijakan Privasi
                        </a>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-gray-900 font-semibold mb-4 flex items-center">
                    <i class="fas fa-envelope mr-2 text-purple-600"></i>Hubungi Kami
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-start text-gray-600">
                        <i class="fas fa-map-marker-alt text-purple-600 mt-1 mr-3"></i>
                        <span class="text-sm">Jl. Contoh No. 123, Surabaya, Jawa Timur</span>
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-phone text-purple-600 mr-3"></i>
                        <span class="text-sm">+62 812-3456-7890</span>
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-envelope text-purple-600 mr-3"></i>
                        <span class="text-sm">info@kasirmodern.com</span>
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-clock text-purple-600 mr-3"></i>
                        <span class="text-sm">Senin - Jumat: 08:00 - 17:00</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="mt-8 pt-8 border-t border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="text-gray-600 text-sm text-center md:text-left">
                    <p>&copy; {{ date('Y') }} Kasir Modern. All rights reserved.</p>
                    <p class="text-xs mt-1">Developed with <i class="fas fa-heart text-red-500"></i> using Laravel {{ app()->version() }}</p>
                </div>
                <div class="flex items-center space-x-6 text-sm text-gray-600">
                    <a href="#" class="hover:text-purple-600 smooth-transition">Syarat & Ketentuan</a>
                    <span class="text-gray-400">|</span>
                    <a href="#" class="hover:text-purple-600 smooth-transition">Kebijakan Privasi</a>
                    <span class="text-gray-400">|</span>
                    <a href="#" class="hover:text-purple-600 smooth-transition">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
    
    <button id="scrollToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-full shadow-lg hover-lift smooth-transition opacity-0 invisible">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>

<script>
    const scrollToTopBtn = document.getElementById('scrollToTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.remove('opacity-0', 'invisible');
            scrollToTopBtn.classList.add('opacity-100', 'visible');
        } else {
            scrollToTopBtn.classList.add('opacity-0', 'invisible');
            scrollToTopBtn.classList.remove('opacity-100', 'visible');
        }
    });
    
    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>