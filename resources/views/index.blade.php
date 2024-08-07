@extends('main')
@section('title', 'Trang chủ')
@section('main')
<main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Featured Article -->
        @if(isset($home[0]))
        <div class="lg:col-span-2 bg-white shadow-lg rounded-lg overflow-hidden">
            <a href="{{ url('/news/details/' . $home[0]->id) }}" class="block">
                <img src="{{ asset('storage/'. $home[0]->hinh_anh) }}" alt="Image" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-blue-800 mb-4">
                        {{ $home[0]->tieu_de }}
                    </h2>
                    <p class="text-gray-700">{!! Str::limit($home[0]->noi_dung, 1300, '...') !!}</p>
                </div>
            </a>
        </div>
        @endif

        <!-- Secondary Articles -->
        <div class="space-y-6">
            @foreach ($home->slice(1)->take(4) as $keyy)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <a href="{{ url('/news/details/' . $keyy->id) }}" class="block">
                    <img src="{{ asset('storage/'. $keyy->hinh_anh) }}" alt="Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-blue-800">
                            {{ Str::limit($keyy->tieu_de, 44, '...') }}
                        </h3>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</main>

<section class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        <h3 class="text-2xl font-bold text-gray-900 mb-8">Tin Mới Nhất</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($news_home as $key)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <a href="{{ url('news/details/' . $key->id) }}" class="block">
                    <img src="{{ asset('storage/'. $key->hinh_anh) }}" class="w-full h-48 object-cover" alt="Image">
                    <div class="p-4">
                        <h4 class="text-lg font-semibold text-blue-800 mb-2">
                            {{ $key->tieu_de }}
                        </h4>
                        <p class="text-gray-700">
                            {!! Str::limit($key->noi_dung, 340, '...') !!}
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@yield('footer')
@show