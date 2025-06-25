<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow">
            <h2 class="text-xl font-bold text-center text-gray-800 mb-4">Verifikasi Email</h2>

            <p class="text-sm text-gray-600 mb-4 text-center">
                Terima kasih telah mendaftar! Sebelum melanjutkan, silakan verifikasi alamat email Anda
                dengan mengklik tautan yang telah kami kirimkan ke email Anda.
                Jika Anda belum menerima email, kami akan dengan senang hati mengirimkannya kembali.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm text-green-600 text-center font-medium">
                    Tautan verifikasi baru telah dikirim ke email Anda.
                </div>
            @endif

            <div class="flex justify-between items-center mt-6">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold text-sm transition">
                        Kirim Ulang Email Verifikasi
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-sm text-gray-600 hover:text-gray-900 underline transition">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
