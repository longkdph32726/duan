<h1>Đây là trang danh sách</h1>
<a href="/admin/create">Thêm</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Danh mục</th>
            <th>Chủ đề</th>
            <th>Tên</th>
            <th>Nội dung</th>
            <th>Ảnh</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['category_id'] }}</td>
                <td>{{ $item['title'] }}</td>
                <td>{{ $item['excerpt'] }}</td>
                <td>{{ $item['content'] }}</td>
                <td>
                    <img src="{{ $item['image'] }}" width="50px" alt="">
                </td>
                <td>
                    <a href="/admin/{{ $item['id'] }}/update">Sửa</a>
                    <a href="/admin/{{ $item['id'] }}/delete" onclick="return confirm('Có chắc muốn xóa không!!!')">Xóa</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>