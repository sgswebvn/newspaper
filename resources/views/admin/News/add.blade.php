@extends('admin.main2')
@section('title', 'Thêm tin tức')

@section('main')

<div class="mb-6 mx-10 py-10">
<form method="POST" action="/add" enctype="multipart/form-data">
  @csrf
  <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chọn danh mục</label>
  <select id="countries" name="the_loai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="" disabled selected>Chọn danh mục</option>
    @foreach($categories as $category)
      <option value="{{ $category->id }}" {{ old('the_loai') == $category->id ? 'selected' : '' }}>{{ $category->the_loai }}</option>
    @endforeach
  </select>
  <br>
  
  <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiêu đề</label>
  <input type="text" name="tieu_de" value="{{ old('tieu_de') }}" placeholder="Nhập tiêu đề" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  <br>
  @error('tieu_de')
    <span class="badge badge-danger" style="color:red">{{ $message }}</span>
  @enderror
  <br>
  
  <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nội dung</label>
  <textarea name="noi_dung" id="editor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" cols="30" rows="10">{{ old('noi_dung') }}</textarea>
  <br>
  @error('noi_dung')
    <span class="badge badge-danger" style="color:red">{{ $message }}</span>
  @enderror
  <br>
  
  <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tác giả</label>
  <input type="text" name="tac_gia" value="{{ old('tac_gia', 'Hiếu Trương') }}" placeholder="Tác giả" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  <br>
  
  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Tải lên hình ảnh</label>
  <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="hinh_anh">
  @error('hinh_anh')
    <span class="badge badge-danger" style="color:red">{{ $message }}</span>
  @enderror
  <br>
  
  <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mô tả</label>
  <input type="text" name="description" value="{{ old('description') }}" placeholder="Nhập mô tả" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  <br>
  <br>
  @error('description')
    <span class="badge badge-danger" style="color:red">{{ $message }}</span>
  @enderror
  <input type="submit" name="submit" value="Thêm tin tức" class="inline-block rounded-md bg-blue-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
  <a href="{{ route('news') }}" type="reset" class="inline-block rounded-md bg-green-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Quay về</a>
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
