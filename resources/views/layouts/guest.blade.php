<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login siBolang</title>
    <link rel="icon" href="{{ asset('images/logo-sibolang.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: #fdf6ed;
        }
        .bg-info-box {
            background: #fffbe5;
        }
        .orange-btn {
            background: #e76f00;
        }
        .orange-btn:hover {
            background: #cf6200;
        }
        .info-bullet {
            color: #e76f00;
        }
        .decor-line {
            height: 3px;
            width: 70px;
            background: #e76f00;
            display: inline-block;
            border-radius: 3px;
            margin: 0 6px 8px 6px;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex flex-col md:flex-row items-stretch justify-center">
        {{-- Panel Info Kiri --}}
        <div class="w-full md:w-3/4 flex flex-col items-center justify-center px-4 py-10 bg-transparent">
    <div class="max-w-3xl w-full mx-auto">
        <!-- CARD Mengenal siBolang -->
        <div class="bg-white rounded-2xl shadow-lg px-6 py-6 md:py-8 mb-8 flex flex-col md:flex-row items-center gap-6">
            <!-- Logo -->
            <div class="flex flex-col items-center min-w-[108px]">
                <img src="{{ asset('images/logo-sibolang.png') }}" alt="Logo siBolang"
                     class="w-28 md:w-32 bg-white rounded-xl shadow mb-2"
                     style="box-shadow:0 6px 18px 0 #e76f0020;">
                <span class="h-1 w-12 bg-orange-500 rounded-full mt-1"></span>
            </div>
            <!-- Info -->
            <div class="flex-1 text-center md:text-left">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2 leading-tight">
                    Mengenal <span class="text-orange-600">siBolang</span>
                </h2>
                <div class="text-lg md:text-xl font-semibold text-gray-900 mb-1">
                    <span class="font-bold">siBolang</span>
                    <span class="italic text-base font-normal text-gray-800"> (Si roBot peLayan Guru) </span>
                    adalah asisten digital <span class="font-bold">berbasis AI</span>
                </div>
                <div class="text-base md:text-lg text-gray-800 font-medium mb-1">
                    untuk membantu <span class="text-orange-600 font-bold">guru</span> dan <span class="text-orange-600 font-bold">tenaga kependidikan</span>
                    di <span class="font-bold">Dinas Pendidikan Kabupaten Gorontalo Utara</span>.
                </div>
                <div class="text-base md:text-lg text-gray-700">
                    Dapatkan akses ke layanan, informasi, dan solusi administrasi pendidikan secara mudah, cepat, dan ramah.
                </div>
            </div>
        </div>
        <!-- Lanjutkan dengan fitur, visi, tips seperti sebelumnya -->


                {{-- Fitur Utama --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-info-box rounded-xl p-4 shadow text-center">
                        <span class="block font-bold mb-1">Layanan 24 Jam</span>
                        <span class="text-sm text-gray-700">siBolang siap menjawab pertanyaan kapan saja, tanpa batas waktu.</span>
                    </div>
                    <div class="bg-info-box rounded-xl p-4 shadow text-center">
                        <span class="block font-bold mb-1">Solusi Informasi Guru</span>
                        <span class="text-sm text-gray-700">Tunjangan, administrasi, pelatihan, dan pengembangan.</span>
                    </div>
                    <div class="bg-info-box rounded-xl p-4 shadow text-center">
                        <span class="block font-bold mb-1">Respon Cepat & Akurat</span>
                        <span class="text-sm text-gray-700">Jawaban instan berbasis data resmi Dinas Pendidikan.</span>
                    </div>
                    <div class="bg-info-box rounded-xl p-4 shadow text-center">
                        <span class="block font-bold mb-1">Data Aman & Terpercaya</span>
                        <span class="text-sm text-gray-700">Privasi pengguna terjaga sesuai standar keamanan.</span>
                    </div>
                </div>

                {{-- Visi, Tips, Bantuan --}}
                <div class="flex flex-col md:flex-row gap-6 mb-8">
                    <div class="bg-white border-l-4 border-orange-500 rounded-lg p-4 shadow flex-1">
                        <span class="font-semibold text-orange-600">Visi Kami</span>
                        <p class="text-sm mt-2 text-gray-700">
                            Menjadi mitra digital andalan untuk guru & tenaga pendidikan, mendukung pelayanan pendidikan yang modern, efisien, dan inklusif di Gorontalo Utara.
                        </p>
                    </div>
                    <div class="bg-white border-l-4 border-orange-500 rounded-lg p-4 shadow flex-1">
                        <span class="font-semibold text-orange-600">Panduan Penggunaan</span>
                        <ul class="list-disc ml-5 text-sm text-gray-700 mt-2 space-y-1">
                            <li>Login untuk akses fitur chatbot</li>
                            <li>Ketik pertanyaan apapun seputar layanan guru, tunjangan, pelatihan, dll.</li>
                        </ul>
                    </div>
                </div>

                {{-- Bantuan & Testimoni --}}
                <!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-info-box rounded-xl p-5 shadow text-left">
                        <span class="font-semibold text-orange-600">Butuh Bantuan?</span>
                        <ul class="text-sm text-gray-700 mt-2 space-y-1">
                            <li>Email: <a href="mailto:info@sibolang.id" class="text-orange-600 hover:underline">info@sibolang.id</a></li>
                            <li>WhatsApp: <a href="https://wa.me/6281234567890" target="_blank" class="text-orange-600 hover:underline">0812-3456-7890</a></li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-5 shadow text-left">
                        <span class="font-semibold text-orange-600">Testimoni</span>
                        <p class="text-sm mt-2 text-gray-700 italic">
                            “Dengan siBolang, kami para guru sangat terbantu untuk mengakses informasi tunjangan dan administrasi sekolah dengan cepat.”<br>
                            <span class="font-semibold text-gray-600">— Ibu Siti, SDN 1 Kwandang</span>
                        </p>
                    </div>
                </div> -->

                <!-- <div class="text-xs text-gray-400 mt-8 text-center">
                    &copy; {{ date('Y') }} Dinas Pendidikan Kab. Gorontalo Utara.<br>
                    <span class="italic">Dikembangkan oleh Tim Inovasi Digital</span>
                </div> -->
            </div>
        </div>

        {{-- Panel Login Kanan --}}
        <div class="w-full md:w-1/4 flex flex-col justify-center items-center px-6 py-8 bg-white shadow-xl">
            <div class="w-full max-w-md">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
