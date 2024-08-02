@extends('main')
@section('title', 'Trang chi tiết')

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
            @foreach ($data->take(5) as $key)
           <a href="{{ url('news/details/' . $key->id) }}">
            <div style="display: flex; border: 1px solid lightgray; padding: 5px;" class="rounded-md">
                <img style="padding-top: 3px;" src="{{asset('storage/' .$key->hinh_anh)}}" width="100px" alt="11233123">
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
                <img src="{{ asset('path_to_default_avatar') }}" alt="Avatar" width="50" class="rounded-full">
                <strong style="padding-left: 20px; font-size:20px; color:blueviolet">{{ $item->name }}</strong>
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
