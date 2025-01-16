<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель управління</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
<div class="flex flex-col md:flex-row">
    <!-- Sidebar -->
    <div class="bg-gray-800 text-gray-100 w-full md:w-64 h-screen">
        <div class="p-4 text-lg font-bold border-b border-gray-700">МЕНЮ</div>
        <nav class="flex flex-col p-4 space-y-2">
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Панель управління</a>
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Каталог</a>
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Модулі / Розширення</a>
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Дизайн</a>
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Продажі</a>
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Клієнти</a>
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Маркетинг</a>
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Система</a>
            <a href="#" class="hover:bg-gray-700 p-2 rounded">Звіти</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Панель управління</h1>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-blue-500 text-white p-4 rounded shadow">
                <h2 class="text-lg">ЗАМОВЛЕНЬ</h2>
                <p class="text-4xl">28</p>
            </div>
            <div class="bg-blue-500 text-white p-4 rounded shadow">
                <h2 class="text-lg">ПРОДАЖІ</h2>
                <p class="text-4xl">23M</p>
            </div>
            <div class="bg-blue-500 text-white p-4 rounded shadow">
                <h2 class="text-lg">КЛІЄНТІВ</h2>
                <p class="text-4xl">0</p>
            </div>
            <div class="bg-blue-500 text-white p-4 rounded shadow">
                <h2 class="text-lg">ЛЮДИ ONLINE</h2>
                <p class="text-4xl">0</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-2">Карта світу</h2>
                <div class="h-64 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">Карта світу</span>
                </div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-2">Аналітика продажів</h2>
                <div class="h-64 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">Графік</span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
