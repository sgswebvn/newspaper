@extends('main')
@section('title', 'Trang chủ')
@yield('nav')
@section('header')
<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
   <div class="max-w-7xl mx-auto grid grid-cols-12 gap-4">
      <!-- Column 1: Bài viết chính (8/12 width) -->
      @if(isset($home[0]))
      <div class="col-span-10" style="border: 1px solid lightblue; padding: 10px;">
         <a href="{{ url('/news/details/' . $home[0]->id) }}">
            <div class="mx-auto text-center">
               <img src="{{ asset($home[0]->hinh_anh) }}" alt="Image" width="100%">
            </div>
            <br>
            <strong style="font-size: 30px; color: blueviolet;"> 
            {{ $home[0]->tieu_de }}
            </strong>
         </a>
      </div>
      @endif
      <!-- Column 2: Các bài viết phụ (4/12 width) -->
      <div class="col-span-2">
         @foreach ($home->slice(1)->take(4) as $keyy)  <!-- Bỏ qua bài viết chính -->
         <div class="mx-auto" style="border: 1px solid lightblue; padding: 10px;">
            <a href="{{ url('/news/details/' . $keyy->id) }}">
            <img src="{{ asset($keyy->hinh_anh) }}" alt="Image" style="max-height: 300px">
            <strong >
            {{ substr($keyy->tieu_de, 0,44) . '...' }}
            </strong>
            </a>
         </div>
         <br>
         @endforeach
      </div>
   </div>
</main>
<br>
<br>
<hr>
<div class="mx-auto max-w-7xl lg:px-8 " >
   @if(isset($home[0]))
   <strong>
   <a href="{{ url('/news/details/' . $home[0]->id) }}" class="text-xl font-large text-gray-1000">
   TIN MỚI NHẤT
   </a> 
   </strong>
   @endif
</div>
<hr>
<br>    
@endsection

@section('main')
<div class="max-auto max-w-7xl lg:px-16" style="padding-right: 20px">
      @foreach ($news_home as $key)
      <div class="col-span-10">
         <div class="new" style="display: flex;">
            <img src="{{ asset($key->hinh_anh) }}" width="150" style="height: 100px" alt="" style="padding-top: 7px;">
            <div style="padding-left: 15px;">
               <a href="{{ url('news/details/' . $key->id) }}">
                  <strong>
                  {{ $key->tieu_de }}
                  </strong>
                  <br>
                  <p >
                     {!! strlen($key->noi_dung) > 450 ? substr($key->noi_dung, 0, 450) . '...' : $key->noi_dung !!}
                  </p>
               </a>
            </div>
         </div>
         <br>
         @endforeach
      </div>
      <br>
   </div>
</div>
<br>
<hr>
<br>
<br>

@endsection

@section('footer')
<footer class="bg-light rounded-lg shadow dark:bg-gray-900 m-4">
  <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
      <div class="sm:flex sm:items-center sm:justify-between">
          <a href="" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
              <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Trang chủ</span>
          </a>
          <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
              <li>
                  <a href="#" class="hover:underline me-4 md:me-6">Đời sống</a>
              </li>
              <li>
                  <a href="#" class="hover:underline me-4 md:me-6">Du lịch</a>
              </li>
              <li>
                  <a href="#" class="hover:underline me-4 md:me-6">Xã hội</a>
              </li>
              <li>
                  <a href="#" class="hover:underline">Thể thao</a>
              </li>
          </ul>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="" class="hover:underline">Hiếu Trương</a></span>
  </div>
</footer>
@endsection