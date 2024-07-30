@extends('admin.main2')
@section('title', 'Sửa danh mục')

@section('main')

<div class="py-10 mx-10">
    <form action="/admin/category/update/{{$categories->id}}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID danh mục</label>
            <input type="text" disabled  value="{{$categories->id}}" name="id" id="default-input" class="bg-gray-1 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên danh mục</label>
            <input type="text" value="{{$categories->the_loai}}" name="the_loai" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div>
            <input name="submit" type="submit" value="Sửa danh mục" class="inline-block rounded-md bg-blue-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <a href="{{route('category')}}" class="inline-block rounded-md bg-green-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
               Quay về
            </a>
        </div>
    </form>
    
</div>
@endsection