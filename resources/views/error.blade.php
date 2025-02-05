<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-red-500 to-orange-400">

    <div class="bg-white p-8 rounded-lg shadow-lg text-center max-w-sm">
        <h1 class="text-3xl font-bold text-red-600">⛔ Akses Ditolak!</h1>
        <p class="text-gray-700 mt-3">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
        <a href="{{ url('/home') }}"
           class="mt-4 inline-block bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
            🔙 Kembali ke Beranda
        </a>
    </div>

</body>
</html>
