@extends('main')
@section('title', 'Trang chủ')

@section('header')
<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
   <div class="grid grid-cols-12 gap-4">
      <!-- Column 1: Bài viết chính (8/12 width) -->
      @if(isset($travel[0]))
      <div class="col-span-9 border border-blue-200 p-4">
         <a href="{{ url('/news/details/' . $travel[0]->id) }}">
            <div class="text-center mb-4">
               <img src="{{ asset('storage/'.$travel[0]->hinh_anh) }}" alt="Image" class="w-full h-auto">
            </div>
            <h2 class="text-2xl font-bold text-blue-800">
            {{ $travel[0]->tieu_de }}
            </h2>
            {!! Str::limit($travel[0]->noi_dung, 800,  '...') !!}

         </a>
      </div>
      @endif

      <!-- Column 2: Các bài viết phụ (4/12 width) -->
      <div class="col-span-3 space-y-4">
         @foreach ($travel->slice(1)->take(4) as $keyy)
         <div class="border border-blue-200 p-4">
            <a href="{{ url('/news/details/' . $keyy->id) }}">
               <img src="{{ asset('storage/'.$keyy->hinh_anh) }}" alt="Image" class="w-full h-48 object-cover mb-2">
               <h3 class="text-lg font-semibold">
               {{ Str::limit($keyy->tieu_de, 44, '...') }}
               </h3>
            </a>
         </div>
         @endforeach
      </div>
   </div>
</main>
<br>
<hr class="my-6 border-gray-300">
<div class="mx-auto max-w-7xl px-4 lg:px-8">
   @if(isset($travel[0]))
   <strong class="text-xl font-bold text-gray-900">
   <a href="{{ url('/news/details/' . $travel[0]->id) }}">
   TIN MỚI NHẤT
   </a> 
   </strong>
   @endif
</div>
<hr class="my-6 border-gray-300">
<br>    
@endsection

@section('main')
<div class="max-w-7xl mx-auto px-4 lg:px-8">
   @foreach ($news_travel as $key)
   <div class="flex border border-gray-200 p-4 mb-4">
      <img src="{{ asset('storage/'.$key->hinh_anh) }}" class="w-32 h-32 object-cover mr-4" alt="Image">
      <div>
         <a href="{{ url('news/details/' . $key->id) }}">
            <h4 class="text-lg font-semibold mb-2">
            {{ $key->tieu_de }}
            </h4>
            <p class="text-gray-700">
               {!! Str::limit($key->noi_dung, 450, '...') !!}
            </p>
         </a>
      </div>
   </div>
   @endforeach
</div>
<br>
@endsection

@section('footer')
<footer class="bg-gray-800 text-white mt-8 py-6">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center border-b border-gray-700 pb-4">
          <a href="" class="text-2xl font-semibold">Trang chủ</a>
          <ul class="flex space-x-4">
              <li><a href="#" class="hover:text-gray-400">Đời sống</a></li>
              <li><a href="#" class="hover:text-gray-400">Du lịch</a></li>
              <li><a href="#" class="hover:text-gray-400">Xã hội</a></li>
              <li><a href="#" class="hover:text-gray-400">Thể thao</a></li>
          </ul>
      </div>
      <div class="mt-4 text-center text-gray-500">
          <hr class="border-gray-700 mb-4">
          <span class="text-sm">© 2024 <a href="" class="hover:text-gray-400">Hiếu Trương</a></span>
      </div>
  </div>
</footer>
@endsection
