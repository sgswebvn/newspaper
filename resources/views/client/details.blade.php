@extends('main')
@section('title', 'Trang chi tiết')

@section('header')
<br>
<div class="mx-auto max-w-7xl lg:px-8">
    <div>
        <strong class="text-gray-800" style="color:brown;">TÊN DANH MỤC </strong> 
        <strong class="text-gray-800" style="float: right; padding-right: 90px; color: red;">TIN TỨC KHÁC <hr></strong>
        

    </div>
    <br>
    <div class="max-w-7xl mx-auto grid grid-cols-12 gap-4 ">
        <div class="col-span-9 rounded-md" style="border: 1px solid lightgray; padding: 5px; " >
            <strong class="text-xl text-gray-700">
                {{$details ->tieu_de}}
            </strong>
            <br>
            <br>
            <img style="padding-left: 80px;" src="{{asset($details->hinh_anh)}}" alt="123">
            <br>
            <p class="text-gray-700">
                {!! $details ->noi_dung !!}

            </p>
            <div style="float: right;">
                <strong >Tác giả : {{$details ->tac_gia}}</strong>
                <p >
                {{$details ->created_up}}
                </p>
            </div>
         
            <br>
        </div>
        @foreach ($data->take(4) as $key)
        <div class="col-span-3 text-center">
            <div style="display: flex; border: 1px solid lightgray; padding: 5px;" class="rounded-md ">
                <img style="padding-top: 3px;" src="{{asset($key->hinh_anh)}}" width="100px" alt="11233123">
                <strong align="start" class="text-gray-700" style="padding-left: 10px;">
                    {{$key ->tieu_de}}
                </strong>
            </div>
            <br>
        @endforeach
        </div>
    </div>
</div>
<br>
<br>


<br>
<div class="mx-auto max-w-7xl lg:px-8 grid grid-cols-12 gap-4">
    <div class="col-span-8 group">
        <div class="border border-light-gray p-8 rounded-lg shadow-md bg-white">
            <strong class="text-lg font-semibold text-gray-900">Bình luận (0)</strong>
            <form action="" class="mt-6 flex flex-col space-y-4">
              <input 
                type="text" 
                placeholder="Để lại bình luận" 
                class="border border-gray-300 rounded-md px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
              >
              <input 
                type="submit" 
                value="Bình luận" 
                class="inline-block rounded-md bg-blue-500 px-6 py-3 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
              >
            </form>
          </div>
          
</div>
</div>
@endsection

