<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('landing.partial.link')
    <link rel="icon" type="icon" href="/img/logo tutwuri.png">
    <title>Berkas Pendaftaran</title>
    <style>
        .custom-container {
            max-width: 640px;
            /* Lebar container diperbesar */
            width: 90%;
            /* Responsif untuk mobile */
        }

        .document-item {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            margin-bottom: 0.75rem;
            transition: all 0.2s ease;
        }

        .document-item:hover {
            background-color: #f8fafc;
            border-color: #cbd5e0;
        }

        .document-icon {
            margin-right: 1rem;
            color: #0090D4;
        }

        .document-name {
            flex-grow: 1;
            word-break: break-word;
            /* Memastikan nama file panjang tidak overflow */
        }
    </style>
</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center py-8"
    style="background-image: url('/img/bg-login.png');">
    <div class="bg-white p-8 rounded-2xl shadow-md custom-container">
        <h2 class="text-black text-2xl font-bold mb-6 text-center">Berkas Pendaftaran Peserta Didik Baru</h2>

        <!-- Downloadable PDF files -->
        <div class="mb-8">
            <h3 class="text-black font-semibold mb-3 text-lg">Unduh Berkas:</h3>
            <div class="space-y-3">
                <a href="/files/formulir_daftar.pdf" class="document-item" download>
                    <div class="document-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="document-name">Formulir Pendaftaran Peserta Didik Baru TK Pertiwi Grojogan.pdf</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-blue-600" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

                <a href="/files/surat_pernyataan.pdf" class="document-item" download>
                    <div class="document-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="document-name">Surat Pernyataan Peserta Didik Baru TK Pertiwi Grojogan.pdf</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-blue-600" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Panduan Pendaftaran -->
        <div class="mb-8">
            <h3 class="text-black font-semibold mb-3 text-lg">Panduan Pendaftaran:</h3>
            <ol class="list-decimal pl-5 space-y-3">
                <li class="pl-2">Unduh berkas pendaftaran lalu isi dengan data yang valid</li>
                <li class="pl-2">Persiapkan dokumen yang diperlukan (Fotocopy: Kartu Keluarga, Akta Kelahiran, Pas Foto
                    berwarna 3x4, KTP Orangtua/Wali)</li>
                <li class="pl-2">Serahkan formulir dan dokumen yang sudah dilengkapi ke administrasi TK Pertiwi Grojogan
                </li>
                <li class="pl-2">Tunggu proses verifikasi dan validasi serta konfirmasi dari pihak sekolah</li>
            </ol>
        </div>

        <!-- Back button -->
        <div class="text-center">
            <a href="{{ url('/?_fragment=hero') }}"
                class="bg-[#0090D4] text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 inline-block font-medium">
                Kembali
            </a>
        </div>
    </div>
</body>

</html>