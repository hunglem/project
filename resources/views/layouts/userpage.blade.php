<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TNC Store - User Page">
    <meta name="robots" content="index,follow">
    <title>User Page - Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header Section -->
    <header class="bg-orange-500 text-white">
        <div class="container mx-auto flex justify-between items-center py-4">
            <a href="/" class="text-lg font-bold">PLAY-Store</a>
            <div class="flex space-x-4">
                <a href="/sitemap" class="hover:underline">Tất cả sản phẩm</a>
                <a href="/tel" class="hover:underline">(034) 309.1525</a>
                <a href="/mail" class="hover:underline">cskh@playstore.vn</a>
            </div>
        </div>
    </header>

    <!-- Navigation Section -->
    <nav class="bg-white shadow">
        <div class="container mx-auto flex justify-between items-center py-4">
            <a href="/" class="text-lg font-bold">Trang chủ</a>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:text-orange-500">Máy chơi game</a></li>
                <li><a href="/" class="hover:text-orange-500">Phụ Kiện</a></li>
                <li><a href="/" class="hover:text-orange-500">Đĩa Game</a></li>
                <li><a href="/" class="hover:text-orange-500">Hướng Dẫn</a></li>
            </ul>
            <div class="flex space-x-4">
                <a href="/login" class="hover:text-orange-500">Đăng nhập</a>
                <a href="/cart" class="relative hover:text-orange-500">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-2">0</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content Section -->
    <main class="container mx-auto py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Sidebar -->
            <aside class="bg-white shadow p-4">
                <h2 class="text-lg font-bold mb-4">Danh mục sản phẩm</h2>
                <ul class="space-y-2">
                <li><a href="/" class="hover:text-orange-500">Sony</a></li>
                <li><a href="/" class="hover:text-orange-500">Nintendo</a></li>
                <li><a href="/" class="hover:text-orange-500">Microsoft</a></li>
                <li><a href="/" class="hover:text-orange-500">Valve</a></li>
                <li><a href="/" class="hover:text-orange-500">Asus</a></li>
                <li><a href="/" class="hover:text-orange-500">Lenovo</a></li> 
                </ul>
            </aside>

            <!-- Main Content -->
            <section class="col-span-2 bg-white shadow p-4">
                <h1 class="text-2xl font-bold mb-4">Danh sách sản phẩm</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="border rounded-lg shadow p-4">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded mb-4">
                            <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                            <p class="text-gray-600">{{ $product->description }}</p>
                            
                            <a href="/products/{{ $product->id }}" class="block mt-4 text-center bg-orange-500 text-white py-2 rounded hover:bg-orange-600">Xem chi tiết</a>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 All rights reserved.</p>

        </div>
    </footer>

</body>
</html>