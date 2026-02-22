<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wedding of Romeo & Juliet</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://unpkg.com/heroicons@2.0.18/dist/outline/index.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Inter:wght@300;400;500&family=Great+Vibes&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Cinzel', 'serif'],
                        script: ['Great Vibes', 'cursive'],
                    },
                    colors: {
                        wedding: {
                            cream: '#F9F6F0', // Latar belakang utama
                            gold: '#CCA43B',  // Aksen
                            sage: '#8A9A8A',  // Aksen sekunder
                            dark: '#2C3333',  // Teks utama
                            muted: '#6B7280' // Teks sekunder
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* CSS Kustom untuk efek parallax sederhana */
        .hero-bg {
            /* GANTI URL GAMBAR INI DENGAN FOTO PREWEDDING UTAMA */
            background-image: url('https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .page-bg {
            background-image:
                radial-gradient(rgba(249,246,240,0.88), rgba(249,246,240,0.88)),
                url('https://images.unsplash.com/photo-1504199367641-aba8153c8b56?ixlib=rb-4.0.3&auto=format&fit=crop&w=2100&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        @media (max-width: 768px) {
            .hero-bg { background-attachment: scroll; }
            .page-bg { background-attachment: scroll; }
        }
        .reveal { opacity: 0; transform: translateY(16px); transition: opacity .7s ease, transform .7s ease; will-change: opacity, transform; }
        .reveal.in-view { opacity: 1; transform: none; }
        .reveal[data-anim="fade"] { transform: none; }
        .reveal[data-anim="zoom"] { transform: scale(0.96); }
        .reveal[data-anim="slide-left"] { transform: translateX(-24px); }
        .reveal[data-anim="slide-right"] { transform: translateX(24px); }
        .stagger > * { opacity: 0; transform: translateY(12px); transition: opacity .6s ease, transform .6s ease; }
        .in-view.stagger > * { opacity: 1; transform: none; }
        @media (prefers-reduced-motion: reduce) {
            .reveal, .stagger > * { transition: none !important; }
        }
    </style>
</head>
<body class="bg-wedding-cream page-bg text-wedding-dark font-sans antialiased">

    <nav class="fixed w-full z-50 bg-wedding-cream/80 backdrop-blur-md py-4 shadow-sm">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="text-2xl font-script text-wedding-gold font-bold">R & J</div>
            <button id="mobileMenuButton" class="md:hidden p-2 rounded-lg text-wedding-dark hover:text-wedding-gold focus:outline-none" aria-label="Buka menu">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75zm.75 4.5a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5H3.75z" clip-rule="evenodd" />
                </svg>
            </button>
            <div class="hidden md:flex space-x-6 text-sm font-medium text-wedding-dark uppercase tracking-wider">
                <a href="#couple" class="hover:text-wedding-gold transition">Pasangan</a>
                <a href="#event" class="hover:text-wedding-gold transition">Acara</a>
                <a href="#gallery" class="hover:text-wedding-gold transition">Galeri</a>
                <a href="#rsvp" class="hover:text-wedding-gold transition">RSVP</a>
            </div>
        </div>
        <div id="mobileMenu" class="md:hidden mt-3 px-4 space-y-2 text-sm font-medium text-wedding-dark uppercase tracking-wider hidden">
            <a href="#couple" class="block hover:text-wedding-gold transition">Pasangan</a>
            <a href="#event" class="block hover:text-wedding-gold transition">Acara</a>
            <a href="#gallery" class="block hover:text-wedding-gold transition">Galeri</a>
            <a href="#rsvp" class="block hover:text-wedding-gold transition">RSVP</a>
        </div>
    </nav>
    <audio id="bgm" src="{{ asset('audio/sampai-jadi-debu.mp3') }}" preload="none" loop></audio>
    <button id="bgmToggle" class="fixed bottom-6 right-6 z-50 bg-wedding-gold text-white rounded-full shadow-lg p-3 hover:bg-wedding-dark transition" aria-label="Putar musik: Banda Neira — Sampai Jadi Debu">
        <svg id="bgmIconPlay" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3.75A.75.75 0 015.75 3h.5a.75.75 0 01.75.75v15.5a.75.75 0 01-1.25.55l-.5-.4a.75.75 0 01-.25-.57V3.75zM8.5 5.5l12 6.5-12 6.5v-13z"/></svg>
        <svg id="bgmIconPause" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4.75A.75.75 0 017.75 4h2.5a.75.75 0 01.75.75v14.5a.75.75 0 01-.75.75h-2.5A.75.75 0 017 19.25V4.75zM13 4.75A.75.75 0 0113.75 4h2.5a.75.75 0 01.75.75v14.5a.75.75 0 01-.75.75h-2.5a.75.75 0 01-.75-.75V4.75z"/></svg>
    </button>
    <div class="fixed bottom-6 right-24 z-50 bg-wedding-cream/90 text-wedding-dark px-3 py-2 rounded-full shadow text-xs">Banda Neira — Sampai Jadi Debu</div>

    <section id="home" class="relative h-screen flex items-center justify-center hero-bg">
        <div class="absolute inset-0 bg-black/40"></div>
        
        <div class="relative z-10 text-center text-white px-4 animate-fade-in-up reveal" data-anim="fade-up">
            <p class="text-lg md:text-xl uppercase tracking-[0.2em] mb-4 font-sans">The Wedding Of</p>
            <h1 class="text-5xl md:text-7xl font-serif font-bold mb-6 text-wedding-gold">
                Romeo <span class="font-script text-4xl md:text-6xl mx-2 text-white">&</span> Juliet
            </h1>
            <p class="text-xl md:text-2xl font-light mb-8">Sabtu, 26 Oktober 2024</p>
            
            <a href="#couple" class="inline-flex flex-col items-center text-white/80 hover:text-wedding-gold transition mt-12 animate-bounce">
                <span class="text-sm uppercase tracking-widest mb-2">Buka Undangan</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </a>
        </div>
    </section>

    <section id="countdown" class="py-12 bg-white px-4">
        <div class="container mx-auto max-w-4xl text-center">
            <h2 class="text-2xl md:text-3xl font-serif text-wedding-dark mb-4">Menuju Hari Bahagia</h2>
            <div id="countdownBox" class="flex justify-center gap-4 md:gap-8">
                <div class="bg-wedding-cream rounded-xl px-5 py-4 shadow"><div id="cdDays" class="text-3xl md:text-5xl font-bold text-wedding-gold">00</div><div class="text-xs uppercase tracking-wider text-wedding-muted">Hari</div></div>
                <div class="bg-wedding-cream rounded-xl px-5 py-4 shadow"><div id="cdHours" class="text-3xl md:text-5xl font-bold text-wedding-gold">00</div><div class="text-xs uppercase tracking-wider text-wedding-muted">Jam</div></div>
                <div class="bg-wedding-cream rounded-xl px-5 py-4 shadow"><div id="cdMinutes" class="text-3xl md:text-5xl font-bold text-wedding-gold">00</div><div class="text-xs uppercase tracking-wider text-wedding-muted">Menit</div></div>
                <div class="bg-wedding-cream rounded-xl px-5 py-4 shadow"><div id="cdSeconds" class="text-3xl md:text-5xl font-bold text-wedding-gold">00</div><div class="text-xs uppercase tracking-wider text-wedding-muted">Detik</div></div>
            </div>
            <p id="countdownDone" class="mt-6 text-wedding-muted hidden">Acara telah berlangsung. Terima kasih atas doa dan kehadirannya.</p>
        </div>
    </section>

    <section id="couple" class="py-20 md:py-28 bg-white px-4">
        <div class="container mx-auto max-w-4xl text-center reveal" data-anim="fade-up">
            <span class="block text-wedding-sage text-sm uppercase tracking-[0.2em] font-semibold mb-4">Assalamu'alaikum Wr. Wb.</span>
            <h2 class="text-3xl md:text-4xl font-serif text-wedding-dark mb-8">Dengan Memohon Rahmat & Ridho Allah SWT</h2>
            <p class="text-wedding-muted leading-relaxed mb-12">
                Kami bermaksud menyelenggarakan acara pernikahan putra-putri kami yang insya Allah akan dilaksanakan pada:
            </p>

            <div class="grid md:grid-cols-2 gap-12 items-center mt-16 reveal stagger" data-anim="fade-up">
                <div class="flex flex-col items-center group">
                    <div class="w-48 h-48 md:w-64 md:h-64 rounded-full overflow-hidden border-4 border-wedding-gold/30 shadow-xl mb-6 rotate-3 group-hover:rotate-0 transition duration-500">
                        <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Romeo" loading="lazy" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-2xl font-serif font-bold text-wedding-dark">Romeo Montague</h3>
                    <p class="text-wedding-muted mt-2">Putra dari Bpk. Montague & Ibu Caroline</p>
                </div>

                <div class="hidden md:block text-6xl font-script text-wedding-gold relative -top-12">&</div>

                <div class="flex flex-col items-center group md:-mt-12">
                     <div class="w-48 h-48 md:w-64 md:h-64 rounded-full overflow-hidden border-4 border-wedding-gold/30 shadow-xl mb-6 -rotate-3 group-hover:rotate-0 transition duration-500">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80" alt="Juliet" loading="lazy" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-2xl font-serif font-bold text-wedding-dark">Juliet Capulet</h3>
                    <p class="text-wedding-muted mt-2">Putri dari Bpk. Capulet & Ibu Lady Capulet</p>
                </div>
            </div>
        </div>
    </section>

    <section id="story" class="py-20 bg-white px-4">
        <div class="container mx-auto max-w-5xl">
            <div class="text-center mb-12 reveal" data-anim="fade-up">
                <span class="block text-wedding-sage text-sm uppercase tracking-[0.2em] font-semibold mb-2">Cerita Kami</span>
                <h2 class="text-3xl md:text-4xl font-serif text-wedding-dark">Love Story</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6 reveal stagger" data-anim="fade-up">
                <div class="bg-wedding-cream rounded-xl p-6 shadow">
                    <h3 class="font-serif text-xl text-wedding-dark mb-2">Pertemuan</h3>
                    <p class="text-wedding-muted text-sm">Berawal dari tatap di sebuah perpustakaan kecil Verona.</p>
                </div>
                <div class="bg-wedding-cream rounded-xl p-6 shadow">
                    <h3 class="font-serif text-xl text-wedding-dark mb-2">Tunangan</h3>
                    <p class="text-wedding-muted text-sm">Keluarga dan sahabat menjadi saksi momen penuh sukacita.</p>
                </div>
                <div class="bg-wedding-cream rounded-xl p-6 shadow">
                    <h3 class="font-serif text-xl text-wedding-dark mb-2">Menuju Akad</h3>
                    <p class="text-wedding-muted text-sm">Melangkah bersama mengikat janji suci.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="dresscode" class="py-16 bg-wedding-cream px-4">
        <div class="container mx-auto max-w-5xl text-center reveal" data-anim="fade-up">
            <span class="block text-wedding-sage text-sm uppercase tracking-[0.2em] font-semibold mb-2">Dress Code</span>
            <h2 class="text-3xl md:text-4xl font-serif text-wedding-dark mb-8">Palet Warna</h2>
            <div class="flex flex-wrap justify-center gap-4 reveal stagger" data-anim="zoom">
                <div class="w-24 h-24 rounded-xl bg-wedding-cream border shadow flex items-center justify-center text-xs">Cream</div>
                <div class="w-24 h-24 rounded-xl bg-wedding-gold text-white shadow flex items-center justify-center text-xs">Gold</div>
                <div class="w-24 h-24 rounded-xl bg-wedding-sage text-white shadow flex items-center justify-center text-xs">Sage</div>
                <div class="w-24 h-24 rounded-xl bg-wedding-dark text-white shadow flex items-center justify-center text-xs">Dark</div>
            </div>
        </div>
    </section>

    <section id="event" class="py-20 md:py-28 bg-wedding-cream relative px-4">
        <div class="absolute top-0 left-0 hidden md:block opacity-10">
             <svg width="300" height="300" viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M250 0C111.929 0 0 111.929 0 250C0 388.071 111.929 500 250 500C388.071 500 500 388.071 500 250C500 111.929 388.071 0 250 0ZM250 455.357C136.429 455.357 44.6429 363.571 44.6429 250C44.6429 136.429 136.429 44.6429 250 44.6429C363.571 44.6429 455.357 136.429 455.357 250C455.357 363.571 363.571 455.357 250 455.357Z" fill="#CCA43B"/></svg>
        </div>

        <div class="container mx-auto max-w-5xl relative z-10">
            <div class="text-center mb-16 reveal" data-anim="fade-up">
                <h2 class="text-3xl md:text-5xl font-serif text-wedding-dark mb-4">Rangkaian Acara</h2>
                <p class="text-wedding-muted max-w-xl mx-auto">Kami menantikan kehadiran Anda untuk berbagi kebahagiaan di hari istimewa kami.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 reveal stagger" data-anim="fade-up">
                <div class="bg-white p-10 rounded-xl shadow-lg border-t-4 border-wedding-sage text-center transform hover:-translate-y-2 transition duration-300 reveal" data-anim="zoom">
                    <h3 class="text-3xl font-script text-wedding-gold mb-6">Akad Nikah</h3>
                    
                    <div class="space-y-6 text-wedding-dark">
                        <div class="flex flex-col items-center">
                            <div class="bg-wedding-cream p-3 rounded-full mb-3 text-wedding-sage">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0h18M5.25 12h13.5h-13.5zm1.5 0v6.75m13.5-6.75v6.75m-7.5-6.75v6.75" /></svg>
                            </div>
                            <span class="font-semibold text-lg">Sabtu, 26 Oktober 2024</span>
                        </div>
                        <div class="flex flex-col items-center">
                             <div class="bg-wedding-cream p-3 rounded-full mb-3 text-wedding-sage">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <span>Pukul 09:00 WIB - Selesai</span>
                        </div>
                        <div class="flex flex-col items-center">
                             <div class="bg-wedding-cream p-3 rounded-full mb-3 text-wedding-sage">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                            </div>
                            <p class="px-4">Masjid Agung Al-Azhar<br>Jl. Sisingamangaraja, Kebayoran Baru, Jakarta Selatan</p>
                        </div>
                    </div>

                    <a href="https://goo.gl/maps/PLACEHOLDER_LINK_AKAD" target="_blank" class="inline-block mt-8 px-8 py-3 bg-wedding-sage text-white rounded-full hover:bg-wedding-dark transition shadow-md font-medium text-sm uppercase tracking-wider">
                        Lihat Lokasi di Google Maps
                    </a>
                </div>

                <div class="bg-white p-10 rounded-xl shadow-lg border-t-4 border-wedding-gold text-center transform hover:-translate-y-2 transition duration-300 reveal" data-anim="zoom">
                    <h3 class="text-3xl font-script text-wedding-gold mb-6">Resepsi Pernikahan</h3>
                    
                     <div class="space-y-6 text-wedding-dark">
                        <div class="flex flex-col items-center">
                            <div class="bg-wedding-cream p-3 rounded-full mb-3 text-wedding-gold">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0h18M5.25 12h13.5h-13.5zm1.5 0v6.75m13.5-6.75v6.75m-7.5-6.75v6.75" /></svg>
                            </div>
                            <span class="font-semibold text-lg">Sabtu, 26 Oktober 2024</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-wedding-cream p-3 rounded-full mb-3 text-wedding-gold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <span>Pukul 11:00 - 14:00 WIB</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-wedding-cream p-3 rounded-full mb-3 text-wedding-gold">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                            </div>
                            <p class="px-4">Grand Ballroom Hotel Mulia<br>Jl. Asia Afrika, Senayan, Jakarta Pusat</p>
                        </div>
                    </div>

                    <a href="https://goo.gl/maps/PLACEHOLDER_LINK_RESEPSI" target="_blank" class="inline-block mt-8 px-8 py-3 bg-wedding-gold text-white rounded-full hover:bg-wedding-dark transition shadow-md font-medium text-sm uppercase tracking-wider">
                        Lihat Lokasi di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="map" class="py-16 bg-white px-4">
        <div class="container mx-auto max-w-5xl">
            <div class="text-center mb-8 reveal" data-anim="fade-up">
                <span class="block text-wedding-sage text-sm uppercase tracking-[0.2em] font-semibold mb-2">Lokasi</span>
                <h2 class="text-3xl md:text-4xl font-serif text-wedding-dark">Peta Acara</h2>
            </div>
            <div class="rounded-xl overflow-hidden shadow reveal" data-anim="zoom">
                <iframe class="w-full h-[320px] md:h-[420px]" src="https://www.google.com/maps?q=Hotel%20Mulia%20Senayan%2C%20Jakarta&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="flex flex-wrap gap-3 mt-6 justify-center">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Resepsi%20Romeo%20%26%20Juliet&dates=20241026T040000Z/20241026T070000Z&location=Hotel%20Mulia%20Senayan%2C%20Jakarta&details=Bergabung%20di%20hari%20bahagia%20kami" target="_blank" class="px-6 py-3 bg-wedding-gold text-white rounded-full shadow hover:bg-wedding-dark transition text-sm">Simpan ke Google Calendar</a>
                <button id="shareButton" class="px-6 py-3 bg-wedding-sage text-white rounded-full shadow hover:bg-wedding-dark transition text-sm">Bagikan Undangan</button>
                <a id="qrLink" href="#" class="px-6 py-3 bg-wedding-cream text-wedding-dark rounded-full shadow transition text-sm">QR Link</a>
            </div>
        </div>
    </section>

    <section id="gallery" class="py-20 bg-white px-4">
        <div class="container mx-auto max-w-5xl text-center mb-12 reveal" data-anim="fade-up">
            <span class="block text-wedding-sage text-sm uppercase tracking-[0.2em] font-semibold mb-4">Momen Bahagia</span>
            <h2 class="text-3xl md:text-5xl font-serif text-wedding-dark">Galeri Foto</h2>
        </div>
        
        <div class="container mx-auto max-w-6xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 px-4 reveal stagger" data-anim="fade-up">
            <div class="aspect-[2/3] rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-500 md:row-span-2">
                <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80" alt="Gallery 1" loading="lazy" class="w-full h-full object-cover hover:scale-110 transition duration-700">
            </div>
            <div class="aspect-square rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-500">
                <img src="https://images.unsplash.com/photo-1623091411395-09e79fdb906f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Gallery 2" loading="lazy" class="w-full h-full object-cover hover:scale-110 transition duration-700">
            </div>
            <div class="aspect-square rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-500">
                <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Gallery 3" loading="lazy" class="w-full h-full object-cover hover:scale-110 transition duration-700">
            </div>
            <div class="aspect-video md:aspect-auto md:col-span-2 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-500">
                <img src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="Gallery 4" loading="lazy" class="w-full h-full object-cover hover:scale-110 transition duration-700">
            </div>
        </div>
    </section>

    <section id="rsvp" class="py-20 bg-wedding-cream px-4">
        <div class="container mx-auto max-w-4xl">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-1/2 p-8 md:p-12 reveal" data-anim="slide-right">
                        <h2 class="text-2xl font-serif text-wedding-dark mb-6">Konfirmasi Kehadiran</h2>
                        <p class="text-wedding-muted text-sm mb-8">Mohon konfirmasi kehadiran Anda sebelum tanggal 20 Oktober 2024.</p>
                        
                        <form action="#" method="POST" class="space-y-5">
                            <div>
                                <label for="name" class="block text-sm font-medium text-wedding-dark mb-1">Nama Lengkap</label>
                                <input type="text" id="name" name="name" required class="w-full px-4 py-3 rounded-lg bg-wedding-cream border-transparent focus:border-wedding-gold focus:bg-white focus:ring-0 transition text-sm">
                            </div>
                            
                            <div>
                                <label for="guests" class="block text-sm font-medium text-wedding-dark mb-1">Jumlah Tamu</label>
                                <select id="guests" name="guests" class="w-full px-4 py-3 rounded-lg bg-wedding-cream border-transparent focus:border-wedding-gold focus:bg-white focus:ring-0 transition text-sm">
                                    <option value="1">1 Orang</option>
                                    <option value="2">2 Orang</option>
                                </select>
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-wedding-dark mb-1">Status Kehadiran</label>
                                <select id="status" name="status" class="w-full px-4 py-3 rounded-lg bg-wedding-cream border-transparent focus:border-wedding-gold focus:bg-white focus:ring-0 transition text-sm">
                                    <option value="hadir">Saya akan hadir</option>
                                    <option value="tidak_hadir">Maaf, saya tidak bisa hadir</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full py-3 px-6 bg-wedding-gold hover:bg-wedding-dark text-white rounded-lg font-medium transition duration-300 shadow-md">Kirim Konfirmasi</button>
                        </form>
                    </div>

                    <div class="md:w-1/2 bg-wedding-sage/10 p-8 md:p-12 flex flex-col justify-center reveal" data-anim="slide-left">
                        <div class="text-center mb-10">
                            <h2 class="text-2xl font-serif text-wedding-dark mb-4">Wedding Gift</h2>
                            <p class="text-wedding-muted text-sm">Doa restu Anda merupakan karunia terindah bagi kami. Namun jika Anda ingin memberikan tanda kasih, kami menyediakan amplop digital.</p>
                        </div>

                        <div class="space-y-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-wedding-sage/20 text-center relative group">
                                <h4 class="font-bold text-wedding-dark text-lg mb-1">BCA</h4>
                                <p class="text-2xl font-mono text-wedding-gold font-bold my-2 tracking-wider">123 456 7890</p>
                                <p class="text-sm text-wedding-muted mb-4">a.n Romeo Montague</p>
                                <button onclick="alert('Nomor rekening disalin!')" class="text-xs bg-wedding-cream hover:bg-wedding-sage hover:text-white text-wedding-dark py-2 px-4 rounded-full transition flex items-center justify-center mx-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5" /></svg>
                                    Salin Nomor
                                </button>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-sm border border-wedding-sage/20 text-center relative group">
                                <h4 class="font-bold text-wedding-dark text-lg mb-1">MANDIRI</h4>
                                <p class="text-2xl font-mono text-wedding-gold font-bold my-2 tracking-wider">098 765 4321</p>
                                <p class="text-sm text-wedding-muted mb-4">a.n Juliet Capulet</p>
                                <button onclick="alert('Nomor rekening disalin!')" class="text-xs bg-wedding-cream hover:bg-wedding-sage hover:text-white text-wedding-dark py-2 px-4 rounded-full transition flex items-center justify-center mx-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5" /></svg>
                                    Salin Nomor
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="lightbox" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">
        <img id="lightboxImg" src="" alt="" class="max-w-[90%] max-h-[85%] rounded-xl shadow-2xl">
    </div>

    <section id="guestbook" class="py-20 bg-wedding-cream px-4">
        <div class="container mx-auto max-w-4xl">
            <div class="bg-white rounded-2xl shadow-xl p-8 reveal" data-anim="fade-up">
                <h2 class="text-2xl font-serif text-wedding-dark mb-6 text-center">Buku Tamu & Ucapan</h2>
                <form id="gbForm" class="grid md:grid-cols-2 gap-4 mb-8">
                    <input id="gbName" type="text" placeholder="Nama" class="px-4 py-3 rounded-lg bg-wedding-cream border-transparent focus:border-wedding-gold focus:bg-white focus:ring-0 transition text-sm">
                    <input id="gbRelation" type="text" placeholder="Relasi (keluarga/sahabat)" class="px-4 py-3 rounded-lg bg-wedding-cream border-transparent focus:border-wedding-gold focus:bg-white focus:ring-0 transition text-sm">
                    <textarea id="gbMessage" placeholder="Tulis ucapan singkat" class="md:col-span-2 px-4 py-3 rounded-lg bg-wedding-cream border-transparent focus:border-wedding-gold focus:bg-white focus:ring-0 transition text-sm"></textarea>
                    <button type="submit" class="md:col-span-2 py-3 px-6 bg-wedding-gold hover:bg-wedding-dark text-white rounded-lg font-medium transition duration-300 shadow-md">Kirim Ucapan</button>
                </form>
                <div id="gbList" class="space-y-4"></div>
            </div>
        </div>
    </section>

    <footer class="bg-wedding-dark text-wedding-cream py-12 text-center px-4">
        <div class="container mx-auto">
             <h2 class="text-4xl font-script text-wedding-gold mb-6">Romeo & Juliet</h2>
             <p class="text-sm opacity-80 mb-8 max-w-md mx-auto">Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu.</p>
             
             <div class="border-t border-white/10 pt-8 mt-8 text-xs opacity-60 tracking-wider uppercase">
                 <p>© 2024 The Wedding of Romeo & Juliet. Built with Tailwind CSS.</p>
             </div>
        </div>
    </footer>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        const btn = document.getElementById('mobileMenuButton');
        const menu = document.getElementById('mobileMenu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
            menu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                });
            });
        }
        const bgm = document.getElementById('bgm');
        const bgmToggle = document.getElementById('bgmToggle');
        const iconPlay = document.getElementById('bgmIconPlay');
        const iconPause = document.getElementById('bgmIconPause');
        function updateBgmIcon(playing) {
            iconPlay.classList.toggle('hidden', playing);
            iconPause.classList.toggle('hidden', !playing);
        }
        bgmToggle.addEventListener('click', async () => {
            if (bgm.paused) { try { await bgm.play(); updateBgmIcon(true); } catch(e){} }
            else { bgm.pause(); updateBgmIcon(false); }
        });
        const openBtn = document.querySelector('a[href="#couple"]');
        if (openBtn) {
            openBtn.addEventListener('click', async () => {
                try { await bgm.play(); updateBgmIcon(true); } catch(e){}
            }, { once: true });
        }
        const eventDate = new Date('2024-10-26T09:00:00+07:00');
        function runCountdown() {
            const now = new Date();
            const diff = eventDate - now;
            const doneEl = document.getElementById('countdownDone');
            if (diff <= 0) {
                document.getElementById('cdDays').textContent = '00';
                document.getElementById('cdHours').textContent = '00';
                document.getElementById('cdMinutes').textContent = '00';
                document.getElementById('cdSeconds').textContent = '00';
                doneEl.classList.remove('hidden');
                return;
            }
            const d = Math.floor(diff / (1000*60*60*24));
            const h = Math.floor((diff / (1000*60*60)) % 24);
            const m = Math.floor((diff / (1000*60)) % 60);
            const s = Math.floor((diff / 1000) % 60);
            document.getElementById('cdDays').textContent = String(d).padStart(2,'0');
            document.getElementById('cdHours').textContent = String(h).padStart(2,'0');
            document.getElementById('cdMinutes').textContent = String(m).padStart(2,'0');
            document.getElementById('cdSeconds').textContent = String(s).padStart(2,'0');
        }
        runCountdown();
        setInterval(runCountdown, 1000);
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightboxImg');
        document.querySelectorAll('#gallery img').forEach(img => {
            img.style.cursor = 'zoom-in';
            img.addEventListener('click', () => {
                lightboxImg.src = img.src;
                lightbox.classList.remove('hidden');
                lightbox.classList.add('flex');
            });
        });
        lightbox.addEventListener('click', () => {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            lightboxImg.src = '';
        });
        function copyText(text) {
            navigator.clipboard.writeText(text).then(() => {
                const toast = document.createElement('div');
                toast.className = 'fixed bottom-6 left-1/2 -translate-x-1/2 bg-wedding-dark text-white px-4 py-2 rounded-full shadow z-50';
                toast.textContent = 'Tersalin ke clipboard';
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 1500);
            });
        }
        document.querySelectorAll('#rsvp .group').forEach(card => {
            const numberEl = card.querySelector('.font-mono');
            const btn = card.querySelector('button');
            if (btn && numberEl) {
                btn.onclick = () => copyText(numberEl.textContent.trim());
            }
        });
        const shareBtn = document.getElementById('shareButton');
        const qrLink = document.getElementById('qrLink');
        const shareText = 'Undangan digital Romeo & Juliet';
        const shareUrl = window.location.href;
        qrLink.href = 'https://chart.googleapis.com/chart?chs=180x180&cht=qr&chl=' + encodeURIComponent(shareUrl);
        shareBtn.addEventListener('click', async () => {
            const msg = shareText + ' ' + shareUrl;
            if (navigator.share) {
                try { await navigator.share({ title: 'Undangan', text: shareText, url: shareUrl }); } catch(e){}
            } else {
                const wa = 'https://wa.me/?text=' + encodeURIComponent(msg);
                window.open(wa, '_blank');
            }
        });
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    el.classList.add('in-view');
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.2 });
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>
</body>
</html>
