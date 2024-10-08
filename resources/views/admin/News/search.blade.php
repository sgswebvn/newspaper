@extends('admin.main2')
@section('title', 'Search')

@section('main')
<br>
@if($items->isEmpty())
    <h1 align="center">Tìm không ra bạn ơi </h1>
@else
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                
                <th scope="col" class="px-6 py-3" align="center">
                   #
                </th>
                <th scope="col" class="px-6 py-3">
                    Tiêu đề
                  </th>

                <th scope="col" class="px-6 py-3">
                    Danh mục
                 </th>
                
                
                <th scope="col" class="px-6 py-3">
                   Tác giả
                 </th>
                 <th scope="col" class="px-6 py-3">
                    Ngày tạo
                  </th>
              
                <th scope="col" class="px-6 py-3" align="center">
                    Chức năng
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4" align="center">
                    {{$key->id}}
                </td>
                
                <th scope="row" class="px-6 py-4">
                    {{$key->tieu_de}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$key->the_loai}}
                </th>
                <td class="px-6 py-4">
                    {{$key->tac_gia}}
                </td>
                <td class="px-6 py-4">
                    {{$key->created_at}}

                </td>

                <td class="px-6 py-4" align="center">
                    <a href="{{route('delete_news', ['id' => $key->id])}}" class="inline-block rounded-md bg-blue-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Xóa</a>
                    <a href="{{route('edit_news', ['id' => $key->id])}}" class="inline-block rounded-md bg-green-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Sửa</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endif
@endsection