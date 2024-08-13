@extends('admin.main2')
@section('title', 'Bình luận')

@section('main')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" align="center">#</th>
                <th scope="col" class="px-6 py-3">Tên tài khoản</th>
                <th scope="col" class="px-6 py-3">ID bài viết</th>
                <th scope="col" class="px-6 py-3">Nội dung bình luận</th>
                <th scope="col" class="px-6 py-3">Ngày bình luận</th>
                <th scope="col" class="px-6 py-3" align="center">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comment as $key)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4" align="center">{{ $key->id }}</td>
                <td class="px-6 py-4">{{ $key->user_id }}</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $key->news_id }}</td>
                <td class="px-6 py-4">{{ $key->comment }}</td>
                <td class="px-6 py-4">{{ $key->date }}</td>
                <td class="px-6 py-4" align="center">
                    <select class="inline-block rounded-md bg-blue-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 toggle-status" data-comment-id="{{ $key->id }}">
                        <option value="1" {{ $key->status ? 'selected' : '' }}>Hiện</option>
                        <option value="0" {{ !$key->status ? 'selected' : '' }}>Ẩn</option>
                    </select>
                    <a href="" class="inline-block rounded-md bg-blue-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Xem</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.querySelectorAll('.toggle-status').forEach(function(selectElement) {
        selectElement.addEventListener('change', function() {
            const commentId = this.dataset.commentId;
            const status = this.value;
            const token = '{{ csrf_token() }}';

            fetch(`/comments/${commentId}/toggle-status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('status updated successfully.');
                } else {
                    alert('Failed to update status.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating status.');
            });
        });
    });
</script>

<br>
<a href="{{route('add_news')}}" class="inline-block rounded-md bg-blue-500 px-6 py-2 text-white text-sm font-semibold shadow-sm ring-1 ring-blue-500 ring-inset hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Thêm tin tức</a>
<br>

@endsection