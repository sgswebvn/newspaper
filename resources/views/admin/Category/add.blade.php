@extends('admin.main2')
@section('title', 'Thêm danh mục')

@section('main')


<div class="mb-6 mx-10 py-10">
    <form action="/add_cate" method="POST">
        @csrf
        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên danh mục</label>
        <input type="text" name="the_loai" placeholder="Nhập danh mục của bạn" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <br>
        <input type="submit" name="dd" value="Thêm danh mục" class="inline-block rounded-md bg-blue-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
        <button type="button" onclick="window.location.href='/'" class="inline-block rounded-md bg-green-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-green-600 focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            Quay về
        </button>
    </form>
</div>
@foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

@endsection