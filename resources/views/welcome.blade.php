<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek Abdira - Solusi Kesehatan Anda</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Konfigurasi Tailwind Kustom -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: '#0d9488', // Teal-600
                        secondary: '#14b8a6', // Teal-500
                        accent: '#f0fdfa', // Teal-50
                        dark: '#0f172a',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 1s ease-out forwards',
                        'slide-in-right': 'slideInRight 1s ease-out forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideInRight: {
                            '0%': { opacity: '0', transform: 'translateX(50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #0d9488;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #0f766e;
        }

        /* Utility untuk menyembunyikan elemen sebelum di-scroll */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-white text-gray-700 overflow-x-hidden">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md shadow-sm transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white">
                        <i class="fa-solid fa-prescription-bottle-medical text-xl"></i>
                    </div>
                    <span class="font-bold text-2xl text-primary tracking-tight">Apotek<span class="text-dark">Abdira</span></span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#home" class="text-gray-600 hover:text-primary font-medium transition">Beranda</a>
                    <a href="#layanan" class="text-gray-600 hover:text-primary font-medium transition">Layanan</a>
                    <a href="#produk" class="text-gray-600 hover:text-primary font-medium transition">Produk</a>
                    <a href="#tentang" class="text-gray-600 hover:text-primary font-medium transition">Tentang Kami</a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="/admin" class="text-primary font-medium hover:text-secondary px-4 py-2 transition">Masuk</a>
                    <a href="#" class="bg-primary text-white px-5 py-2.5 rounded-full font-medium hover:bg-teal-700 transition shadow-lg shadow-teal-500/30 transform hover:-translate-y-0.5">
                        Daftar Sekarang
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-gray-600 hover:text-primary focus:outline-none">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 absolute w-full shadow-lg">
            <div class="px-4 pt-2 pb-6 space-y-2">
                <a href="#home" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-teal-50">Beranda</a>
                <a href="#layanan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-teal-50">Layanan</a>
                <a href="#produk" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary hover:bg-teal-50">Produk</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-primary bg-teal-50 mt-4">Masuk</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-primary mt-2 text-center">Daftar</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden bg-gradient-to-br from-teal-50 to-white">
        <!-- Background Decoration -->
        <div class="absolute top-20 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-teal-100 blur-3xl opacity-50 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-blue-100 blur-3xl opacity-50"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="text-center lg:text-left animate-fade-in-up">
                    <div class="inline-block px-4 py-1.5 bg-teal-100 text-teal-700 rounded-full text-sm font-semibold mb-6 shadow-sm">
                        <i class="fa-solid fa-check-circle mr-2"></i>Apotik Terpercaya No. 1
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-dark leading-tight mb-6">
                        Solusi Kesehatan <br>
                        <span class="text-primary relative">
                            Keluarga Anda
                            <svg class="absolute w-full h-3 -bottom-1 left-0 text-yellow-300 opacity-60" viewBox="0 0 200 9" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M2.00025 6.99656C25.4728 9.12902 65.1224 7.32328 89.2686 5.29543C124.088 2.37169 160.028 2.67576 195.454 4.54924C197.669 4.66635 197.886 1.48702 195.669 1.3664C160.207 -0.528351 124.09 0.283182 89.043 3.19323C64.6548 5.21834 24.8784 7.15934 2.12261 4.97851C-0.108269 4.76472 -0.217398 7.91574 2.00025 6.99656Z"/></svg>
                        </span>
                    </h1>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed max-w-lg mx-auto lg:mx-0">
                        Dapatkan obat-obatan lengkap, vitamin, dan konsultasi apoteker profesional. Pesan online, kami antar sampai ke depan pintu rumah Anda.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#" class="px-8 py-4 bg-primary text-white rounded-full font-semibold shadow-lg shadow-teal-500/40 hover:bg-teal-700 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-cart-shopping"></i> Belanja Sekarang
                        </a>
                        <a href="#" class="px-8 py-4 bg-white text-primary border-2 border-primary rounded-full font-semibold hover:bg-teal-50 transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-user-doctor"></i> Konsultasi
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="mt-10 flex items-center justify-center lg:justify-start gap-8 text-gray-500">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-users text-2xl text-primary"></i>
                            <div class="text-left">
                                <p class="font-bold text-dark text-lg">10k+</p>
                                <p class="text-xs">Pelanggan</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-pills text-2xl text-primary"></i>
                            <div class="text-left">
                                <p class="font-bold text-dark text-lg">500+</p>
                                <p class="text-xs">Produk</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image/Illustration Content -->
                <div class="relative hidden lg:block animate-float">
                    <!-- Lingkaran Background -->
                    <div class="absolute inset-0 bg-teal-200 rounded-full opacity-20 transform scale-90 blur-2xl"></div>
                    
                    <!-- SVG Illustration -->
                    <img src="https://img.freepik.com/free-vector/pharmacist-concept-illustration_114360-3209.jpg?w=740&t=st=1685890000~exp=1685890600~hmac=abc" 
                         alt="Pharmacy Illustration" 
                         class="relative z-10 w-full rounded-3xl shadow-2xl border-4 border-white transform rotate-2 hover:rotate-0 transition duration-500"
                         onerror="this.src='https://placehold.co/600x400/0d9488/white?text=Apotek+Abdira+Illustration'">
                    
                    <!-- Floating Cards -->
                    <div class="absolute top-10 -left-10 bg-white p-4 rounded-xl shadow-xl z-20 animate-bounce" style="animation-duration: 3s;">
                        <div class="flex items-center gap-3">
                            <div class="bg-green-100 p-2 rounded-full text-green-600">
                                <i class="fa-solid fa-shield-heart"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Status</p>
                                <p class="font-bold text-sm text-dark">Aman & Resmi</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-10 -right-5 bg-white p-4 rounded-xl shadow-xl z-20 animate-bounce" style="animation-duration: 4s;">
                        <div class="flex items-center gap-3">
                            <div class="bg-blue-100 p-2 rounded-full text-blue-600">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Pengiriman</p>
                                <p class="font-bold text-sm text-dark">Cepat Kilat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Bar Section -->
    <div class="relative -mt-8 z-30 px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-6 md:p-8 border border-gray-100 reveal">
            <form action="#" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" placeholder="Cari obat, vitamin, atau suplemen..." class="w-full pl-12 pr-4 py-4 rounded-xl bg-gray-50 border-none focus:ring-2 focus:ring-primary focus:bg-white transition text-gray-700">
                </div>
                <div class="w-full md:w-1/4">
                    <button type="button" class="w-full h-full bg-dark text-white font-semibold rounded-xl hover:bg-gray-800 transition py-4 md:py-0">
                        Cari Obat
                    </button>
                </div>
            </form>
            <div class="mt-4 flex flex-wrap gap-2 text-sm text-gray-500">
                <span>Populer:</span>
                <a href="#" class="bg-gray-100 px-3 py-1 rounded-full hover:bg-teal-100 hover:text-teal-700 transition">Paracetamol</a>
                <a href="#" class="bg-gray-100 px-3 py-1 rounded-full hover:bg-teal-100 hover:text-teal-700 transition">Vitamin C</a>
                <a href="#" class="bg-gray-100 px-3 py-1 rounded-full hover:bg-teal-100 hover:text-teal-700 transition">Masker</a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <section id="layanan" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <span class="text-primary font-semibold tracking-wide uppercase text-sm">Kenapa Memilih Kami?</span>
                <h2 class="text-3xl md:text-4xl font-bold text-dark mt-2">Layanan Kesehatan Lengkap</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group reveal">
                    <div class="w-14 h-14 bg-teal-50 rounded-xl flex items-center justify-center text-primary text-2xl mb-6 group-hover:bg-primary group-hover:text-white transition">
                        <i class="fa-solid fa-file-prescription"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3">Tebus Resep</h3>
                    <p class="text-gray-500 leading-relaxed">
                        Upload foto resep dokter Anda, apoteker kami akan menyiapkan obat dengan dosis yang tepat.
                    </p>
                    <a href="#" class="inline-block mt-4 text-primary font-medium group-hover:underline">Upload Sekarang &rarr;</a>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group reveal" style="transition-delay: 100ms;">
                    <div class="w-14 h-14 bg-teal-50 rounded-xl flex items-center justify-center text-primary text-2xl mb-6 group-hover:bg-primary group-hover:text-white transition">
                        <i class="fa-solid fa-comments-dollar"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3">Chat Apoteker</h3>
                    <p class="text-gray-500 leading-relaxed">
                        Konsultasi gratis dengan apoteker berlisensi mengenai keluhan ringan dan penggunaan obat.
                    </p>
                    <a href="#" class="inline-block mt-4 text-primary font-medium group-hover:underline">Mulai Chat &rarr;</a>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group reveal" style="transition-delay: 200ms;">
                    <div class="w-14 h-14 bg-teal-50 rounded-xl flex items-center justify-center text-primary text-2xl mb-6 group-hover:bg-primary group-hover:text-white transition">
                        <i class="fa-solid fa-motorcycle"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3">Antar Cepat</h3>
                    <p class="text-gray-500 leading-relaxed">
                        Layanan pesan antar obat sampai ke rumah Anda dalam waktu kurang dari 2 jam (Area tertentu).
                    </p>
                    <a href="#" class="inline-block mt-4 text-primary font-medium group-hover:underline">Cek Lokasi &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-primary relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/medical-icons.png')] opacity-10"></div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Sudah punya akun?</h2>
            <p class="text-teal-100 text-lg mb-8">
                Dapatkan promo khusus member, poin belanja, dan riwayat kesehatan digital Anda dengan mendaftar hari ini.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#" class="bg-white text-primary px-8 py-3.5 rounded-full font-bold shadow-lg hover:bg-gray-100 transition transform hover:scale-105">
                    Login Member
                </a>
                <a href="#" class="bg-teal-700 text-white border border-teal-600 px-8 py-3.5 rounded-full font-bold shadow-lg hover:bg-teal-800 transition">
                    Download Aplikasi
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-prescription-bottle-medical text-2xl text-primary"></i>
                        <span class="font-bold text-2xl tracking-tight">Apotek<span class="text-primary">Abdira</span></span>
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-6 max-w-sm">
                        Kami berkomitmen menyediakan produk kesehatan berkualitas tinggi dengan harga terjangkau dan pelayanan yang ramah.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-bold text-lg mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-primary transition">Beranda</a></li>
                        <li><a href="#" class="hover:text-primary transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-primary transition">Layanan</a></li>
                        <li><a href="#" class="hover:text-primary transition">Kontak</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-4">Kontak</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot mt-1 text-primary"></i>
                            <span>Jl. Kesehatan No. 123, Jakarta Selatan, Indonesia</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-phone text-primary"></i>
                            <span>+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-primary"></i>
                            <span>info@apotekabdira.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 text-center text-gray-500 text-sm">
                &copy; 2024 Apotek Abdira. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Script JavaScript -->
    <script>
        // Toggle Mobile Menu
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const navbar = document.getElementById('navbar');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // Navbar Shadow on Scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                navbar.classList.add('shadow-md');
                navbar.classList.replace('bg-white/90', 'bg-white/95');
            } else {
                navbar.classList.remove('shadow-md');
                navbar.classList.replace('bg-white/95', 'bg-white/90');
            }
        });

        // Scroll Animation (Fade Up)
        const revealElements = document.querySelectorAll('.reveal');

        const revealOnScroll = () => {
            const windowHeight = window.innerHeight;
            const elementVisible = 150;

            revealElements.forEach((el) => {
                const elementTop = el.getBoundingClientRect().top;
                if (elementTop < windowHeight - elementVisible) {
                    el.classList.add('active');
                }
            });
        };

        window.addEventListener('scroll', revealOnScroll);
        // Trigger once on load
        revealOnScroll();
    </script>
</body>
</html>