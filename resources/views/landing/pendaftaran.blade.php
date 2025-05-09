<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('landing.partial.link')
    <link rel="icon" type="icon" href="/img/logo tutwuri.png">
    <title>Berkas Pendaftaran | TK Pertiwi Grojogan</title>
    <style>
        .custom-container {
            max-width: 640px;
            width: 95%;
            /* Lebih responsif untuk mobile */
            margin: 1rem auto;
            /* Jarak dari tepi layar */
        }

        .document-item {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            /* Diperkecil untuk mobile */
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            /* 6px */
            margin-bottom: 0.5rem;
            /* Diperkecil */
            transition: all 0.2s ease;
        }

        .document-item:hover {
            background-color: #f8fafc;
            border-color: #cbd5e0;
        }

        .document-icon {
            margin-right: 0.75rem;
            /* Diperkecil */
            color: #0090D4;
            flex-shrink: 0;
            /* Mencegah icon menyusut */
        }

        .document-icon svg {
            width: 1.25rem;
            /* 20px */
            height: 1.25rem;
        }

        .document-name {
            flex-grow: 1;
            word-break: break-word;
            font-size: 0.875rem;
            /* 14px */
            line-height: 1.25rem;
            /* 20px */
        }

        .download-icon svg {
            width: 1rem;
            /* 16px */
            height: 1rem;
        }

        /* Media queries untuk mobile */
        @media (max-width: 640px) {
            body {
                padding: 1rem;
                background-position: center;
            }

            .custom-container {
                padding: 1.25rem;
                /* Diperkecil dari p-8 */
            }

            h2 {
                font-size: 1.25rem;
                /* 20px */
                margin-bottom: 1rem;
                /* 16px */
            }

            h3 {
                font-size: 1rem;
                /* 16px */
                margin-bottom: 0.75rem;
                /* 12px */
            }

            ol,
            ul {
                padding-left: 1rem;
                /* 16px */
                font-size: 0.875rem;
                /* 14px */
            }

            li {
                margin-bottom: 0.5rem;
                /* 8px */
            }

            .back-button {
                padding: 0.5rem 1rem;
                /* py-2 px-4 */
                font-size: 0.875rem;
                /* 14px */
            }
        }

        /* Desktop styles */
        @media (min-width: 641px) {
            .document-icon svg {
                width: 1.5rem;
                /* 24px */
                height: 1.5rem;
            }

            .download-icon svg {
                width: 1.25rem;
                /* 20px */
                height: 1.25rem;
            }

            .document-name {
                font-size: 1rem;
                /* 16px */
            }
        }
    </style>
</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center py-4 md:py-8"
    style="background-image: url('/img/bg-login1.png');">
    <div class="bg-white p-4 md:p-8 rounded-xl md:rounded-2xl shadow-md custom-container">
        <h2 class="text-black text-xl md:text-2xl font-bold mb-4 md:mb-6 text-center">Berkas Pendaftaran Peserta Didik
            Baru</h2>

        <!-- Downloadable PDF files -->
        <div class="mb-6 md:mb-8">
            <h3 class="text-black font-semibold mb-2 md:mb-3 text-base md:text-lg">Unduh Berkas:</h3>
            <div class="space-y-2 md:space-y-3">
                <a href="/files/formulir_daftar.pdf" class="document-item" download>
                    <div class="document-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="document-name">Formulir Pendaftaran Peserta Didik Baru TK Pertiwi Grojogan.pdf</span>
                    <div class="download-icon ml-1 md:ml-2 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </a>

                <a href="/files/surat_pernyataan.pdf" class="document-item" download>
                    <div class="document-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="document-name">Surat Pernyataan Peserta Didik Baru TK Pertiwi Grojogan.pdf</span>
                    <div class="download-icon ml-1 md:ml-2 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <!-- Panduan Pendaftaran -->
        <div class="mb-6 md:mb-8">
            <h3 class="text-black font-semibold mb-2 md:mb-3 text-base md:text-lg">Panduan Pendaftaran:</h3>
            <ol class="list-decimal pl-4 md:pl-5 space-y-2 md:space-y-3">
                <li class="pl-1 md:pl-2 text-sm md:text-base">Unduh berkas pendaftaran lalu isi dengan data yang valid
                </li>
                <li class="pl-1 md:pl-2 text-sm md:text-base">Persiapkan dokumen yang diperlukan (Fotocopy: Kartu
                    Keluarga, Akta Kelahiran, Pas Foto berwarna 3x4, KTP Orangtua/Wali)</li>
                <li class="pl-1 md:pl-2 text-sm md:text-base">Serahkan formulir dan dokumen yang sudah dilengkapi ke
                    administrasi TK Pertiwi Grojogan</li>
                <li class="pl-1 md:pl-2 text-sm md:text-base">Tunggu proses verifikasi dan validasi serta konfirmasi
                    dari pihak sekolah</li>
            </ol>
        </div>

        <!-- Back button -->
        <div class="text-center">
            <a href="{{ url('/?_fragment=hero') }}"
                class="bg-[#0090D4] text-white px-4 md:px-6 py-1.5 md:py-2 rounded-lg hover:bg-blue-600 transition duration-300 inline-block font-medium text-sm md:text-base back-button">
                Kembali
            </a>
        </div>
    </div>
</body>

</html>