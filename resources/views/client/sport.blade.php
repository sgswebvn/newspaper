@extends('main')
@section('title', 'Trang chủ')



@section('main')
<section class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        <h3 class="text-2xl font-bold text-gray-900 mb-8"> Danh mục / {{ $categories[3]->the_loai }}</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($news_sport as $key)
            <div class="flex flex-col border border-gray-200 rounded-lg overflow-hidden shadow-lg">
                <a href="{{ url('news/details/' . $key->id) }}">
                    <img src="{{ asset('storage/'.$key->hinh_anh) }}" class="w-full h-48 object-cover" alt="Image">
                    <div class="p-4 bg-white">
                        <h4 class="text-lg font-semibold text-blue-800 mb-2">
                            {{ $key->tieu_de }}
                        </h4>
                        <p class="text-gray-700">
                            {!! Str::limit($key->noi_dung, 450, '...') !!}
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

