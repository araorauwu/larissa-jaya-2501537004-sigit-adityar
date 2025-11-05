<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel + Tailwind</title>

    <!-- Hubungkan Tailwind dari folder frontend -->
    <link rel="stylesheet" href="/larissa-jaya-2501537004-sigit-adityar/frontend/dist/output.css">
</head>

<body class="bg-blue-500 text-white min-h-screen flex items-center justify-center">

    <div class="text-center">
        <h1 class="text-5xl font-bold mb-4">Tailwind Berhasil Terhubung! ✅</h1>
        <p class="text-xl">Laravel + Tailwind berjalan sempurna.</p>

        <a href="/" class="mt-6 inline-block bg-white text-blue-600 px-5 py-2 rounded-lg font-semibold shadow">
            Halaman Utama
        </a>
    </div>

</body>
</html>
