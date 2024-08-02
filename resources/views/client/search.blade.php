@extends('main')
@section('title', 'Not found')
@yield('nav')


@section('header')
<br>
@if($items->isEmpty())
    <h1 align="center">Tìm không ra bạn ơi </h1>
@else
<div class="max-auto max-w-7xl lg:px-16" style="padding-right: 20px">
    @foreach ($items as $key)
    <div class="col-span-10">
       <div class="new" style="display: flex;">
          <img src="{{ asset('storage/'.$key->hinh_anh) }}" width="150" style="height: 100px" alt="" style="padding-top: 7px;">
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
@endif
@endsection