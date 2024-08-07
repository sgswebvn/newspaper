@extends('admin.main2')
@section('title', 'Sửa tin tức')

@section('main')

<div class="py-10 mx-10">
    <form action="/edit_news/{{$news->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chọn thể loại</label>
        <select id="countries" name="the_loai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $news->the_loai == $category->id ? 'selected' : '' }}>
                    {{ $category->the_loai }}
                </option>
            @endforeach
        </select>
        <br>
        <div class="mb-6">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiêu đề</label>
            <input type="text" value="{{ $news->tieu_de }}" name="tieu_de" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nội dung</label>
            <textarea name="noi_dung" id="editor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" cols="30" rows="10">
                {{ old('noi_dung', $news->noi_dung) }}
            </textarea>
            <br>
        </div>
        <div class="mb-6">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tác giả</label>
            <input type="text" value="{{ $news->tac_gia }}" name="tac_gia" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mô tả</label>
            <input type="text" value="{{ $news->description }}" name="description" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Hình ảnh hiện tại</label>
        <img src="{{ asset('storage/' .$news->hinh_anh) }}"  width="200px" alt="">
        <br>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Tải hình ảnh mới</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" name="hinh_anh" type="file">
        <br>
        <div>
            <input type="submit" name="submit" value="Sửa tin tức" class="inline-block rounded-md bg-blue-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <a href="{{ route('news') }}" class="inline-block rounded-md bg-green-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
               Quay về
            </a>
        </div>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'), {
      toolbar: {
        items: [
          'bold', 'italic', 'underline', 'strikethrough', '|',
          'link', 'imageUpload', 'blockQuote', 'insertTable', 'undo', 'redo'
        ]
      },
      placeholder: 'Nhập nội dung của bạn vào đây'
    })
    .catch(error => {
      console.error(error);
    });
</script>
@endsection
