@extends('main')
@section('title', 'Trang chi tiết')
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<style>body {
  font-family: 'Nunito', sans-serif;
  line-height: 1.6;
  color: #2c3e50;
}

/* Main container styling */
main {
  background-color: #f9fafb;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Headings */
h2, h3, h4 {
  color: #1a202c;
}

/* Main article section */
.col-span-9 {
  background-color: #ffffff;
  border-radius: 8px;

}

.col-span-9:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.col-span-9 h2 {
  margin-bottom: 12px;
  line-height: 1.3;
}

.col-span-9 img {
  border-radius: 8px;
}



/* Sidebar articles */
.col-span-3 div {
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
  transition: box-shadow 0.3s ease;
}

.col-span-3 div:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.col-span-3 h3 {
  line-height: 1.2;
  margin-top: 8px;
}

/* News listing */
.flex {
  background-color: #ffffff;
  border-radius: 8px;
  transition: box-shadow 0.3s ease;
}



.flex h4 {
  color: #007acc;
  transition: color 0.3s ease;
}

.flex h4:hover {
  color: #005999;
}

/* Utility classes */
.border-blue-200 {
  border-color: #cbd5e1;
}

.text-blue-800 {
  color: #1e40af;
}

.object-cover {
  object-fit: cover;
}

.mb-4, .mb-2 {
  margin-bottom: 16px;
}

.mt-8 {
  margin-top: 32px;
}

.py-6, .py-4 {
  padding-top: 24px;
  padding-bottom: 24px;
}



.hover\:text-gray-400:hover {
  color: #9ca3af;
}

.mx-auto {
  margin-left: auto;
  margin-right: auto;
}
</style>
@section('header')
<br>
<div class="mx-auto max-w-7xl lg:px-8">
    <div>
        <strong class="text-gray-800" style="color:brown;">TÊN DANH MỤC</strong>
        <strong class="text-gray-800" style="float: right; padding-right: 90px; color: red;">TIN TỨC KHÁC <hr></strong>
    </div>
    <br>
    <div class="max-w-7xl mx-auto grid grid-cols-12 gap-4">
        <div class="col-span-9 rounded-md" style="border: 1px solid lightgray; padding: 5px;">
            <strong class="text-xl text-gray-700">
                {{$details->tieu_de}}
            </strong>
            <br>
            <br>
            <p class="text-gray-700">
                {!! $details->noi_dung !!}
            </p>
            <div style="float: right;">
                <strong>Tác giả: {{$details->tac_gia}}</strong>
                <p>
                    {{$details->created_up}}
                </p>
            </div>
            <br>
        </div>
        <div class="col-span-3 text-center">
            @foreach ($data->take(3) as $key)
           <a href="{{ url('news/details/' . $key->id) }}">
            <div style="display: flex; border: 1px solid lightgray; padding: 5px;" class="rounded-md">
                <img style="padding-top: 3px;" src="{{asset('storage/' .$key->hinh_anh)}}" width="100px"  alt="11233123">
                <strong align="start" class="text-gray-700" style="padding-left: 10px;">
                    {{$key->tieu_de}}
                </strong>
            </div>
           </a>
            <br>
            @endforeach
        </div>
    </div>
</div>
<br>
<br>
<div class="mx-auto max-w-7xl lg:px-8">
    <div class="border border-light-gray p-8 rounded-lg shadow-md bg-white">
      <div class="comments">
        @foreach ($cmt as $item)
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            @if($item->user && $item->user->avatar) <!-- Check if the user and avatar exist -->
                <img src="{{ asset('storage/' . $item->user->avatar) }}" alt="Avatar" width="50" class="rounded-full">
            @else
                <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar" width="50" class="rounded-full">
            @endif
            <strong style="padding-left: 20px; font-size:20px; color:blueviolet">{{ $item->user->name }}</strong>
        </div>
        <strong>{{ $item->comment }}</strong>
        <hr>
        @endforeach
    </div>
        <br>
        <br>
        <br>
        <strong class="text-lg font-semibold text-gray-900">Bình luận ({{ count($cmt) }})</strong>
        @if(Auth::check())
        <form action="/comment" method="POST" class="mt-6 flex flex-col space-y-4">
            @csrf
            <textarea 
                name="comment" 
                placeholder="Để lại bình luận" 
                class="border border-gray-300 rounded-md px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                required
            ></textarea>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="news_id" value="{{ $details->id }}">
            <input type="hidden" name="status" value="1">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Gửi</button>
        </form>
        @else
        <p>Vui lòng <a href="{{ route('login') }}" class="text-blue-500 hover:underline">đăng nhập</a> để bình luận.</p>
        @endif
    </div>
</div>
<br>
<br>
@endsection
@yield('footer')
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/news-details.css') }}" rel="stylesheet">