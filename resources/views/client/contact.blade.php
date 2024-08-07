@extends('main')
@section('title', 'Liên Hệ')

@section('main')
<section class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Liên Hệ Với Chúng Tôi</h2>
        <div class="flex flex-col lg:flex-row lg:space-x-12">
            <!-- Contact Form -->
            <div class="lg:flex-1 bg-white p-8 shadow-lg rounded-lg">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Gửi Tin Nhắn</h3>
                <form action="/contact" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Tên</label>
                            <input type="text" id="name" name="name" value="{{ $user->name ?? '' }}" required class="w-full border border-gray-300 rounded-md py-2 px-4 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" value="{{ $user->email ?? '' }}" name="email" required class="w-full border border-gray-300 rounded-md py-2 px-4 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <!-- Subject Field -->
                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Chủ đề</label>
                        <input type="text" id="subject" name="subject" required class="w-full border border-gray-300 rounded-md py-2 px-4 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <!-- Message Field -->
                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Tin nhắn</label>
                        <textarea id="message" name="message" rows="4" required class="w-full border border-gray-300 rounded-md py-2 px-4 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Gửi</button>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <!-- Contact Details -->
            <div class="lg:flex-1 mt-8 lg:mt-0">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Thông Tin Liên Hệ</h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-map-marker-alt text-blue-500 text-2xl"></i>
                        <p class="text-gray-700">123 Đường ABC, Thành phố XYZ</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-phone-alt text-blue-500 text-2xl"></i>
                        <p class="text-gray-700">+123 456 789</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-envelope text-blue-500 text-2xl"></i>
                        <p class="text-gray-700">info@example.com</p>
                    </div>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-700 hover:text-gray-900"><i class="fab fa-facebook-f text-2xl"></i></a>
                        <a href="#" class="text-gray-700 hover:text-gray-900"><i class="fab fa-twitter text-2xl"></i></a>
                        <a href="#" class="text-gray-700 hover:text-gray-900"><i class="fab fa-instagram text-2xl"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@yield('footer')
