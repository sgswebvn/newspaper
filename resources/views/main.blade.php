<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<nav class="bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Logo" />
        <span class="self-center text-2xl font-bold whitespace-nowrap dark:text-white">Tin tức Fpoly</span>
    </a>
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li><a href="{{ route('life') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Đời sống</a></li>
      <li><a href="{{ route('xh') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Xã hội</a></li>
      <li><a href="{{ route('travel') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Du lịch</a></li>
      <li><a href="{{ route('sport') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Thể thao</a></li>
    </ul>
    <div class="flex items-center space-x-4 rtl:space-x-reverse md:order-2">
      @guest
      <div class="relative flex items-center space-x-4 rtl:space-x-reverse" style="padding-right: 16px">
        <a href="{{ route('login') }}" class="flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
          <i class="fas fa-sign-in-alt text-lg"></i> <!-- Font Awesome icon for login -->
          <span class="ml-2 hidden md:inline">Đăng nhập</span>
        </a>
        <a href="{{ route('register') }}" class="flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
          <i class="fas fa-user-plus text-lg"></i> <!-- Font Awesome icon for register -->
          <span class="ml-2 hidden md:inline">Đăng ký</span>
        </a>
      </div>
      @else
      <!-- Show user avatar and dropdown menu when the user is logged in -->
      <div class="relative">
        <button id="user-menu-button" class="flex items-center space-x-2 text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">
          <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="User Avatar" class="w-8 h-8 rounded-full">
          <span class="hidden md:inline">{{ Auth::user()->name }}</span>
        </button>
        <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 hidden">
          <ul class="py-1 text-sm text-gray-900 dark:text-white">
            <li><a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">Quản lý tài khoản</a></li>
            <li>
              <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
      @endguest
      
      <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Search</span>
      </button>
    </div>
    <div class="flex items-center space-x-4 rtl:space-x-reverse">
      <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Search</span>
      </button>
      <form action="/search" method="GET" class="relative hidden md:flex">
        @csrf
        <input type="text" name="query" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tìm kiếm...">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
          <span class="sr-only">Search icon</span>
        </div>
      </form>
    </div>
     
    </div>
  </div>
</nav>

<hr>

@yield('header')

<main>
    @yield('main')
</main>

@yield('footer')

<script>
  // Toggle user menu visibility
  document.getElementById('user-menu-button').addEventListener('click', function() {
    var menu = document.getElementById('user-menu');
    menu.classList.toggle('hidden');
  });
</script>

<script>
  // Toggle authentication menu visibility
  document.getElementById('auth-menu-button').addEventListener('click', function(event) {
    event.stopPropagation(); // Prevents the event from bubbling up to the document
    var menu = document.getElementById('auth-menu');
    menu.classList.toggle('hidden');
  });

  // Close the menu if the user clicks outside of it
  document.addEventListener('click', function(event) {
    var menu = document.getElementById('auth-menu');
    if (!menu.contains(event.target) && !event.target.matches('#auth-menu-button')) {
      menu.classList.add('hidden');
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thành công',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false,
            timerProgressBar: true,
        })
    </script>
@endif
</body>
</html>
