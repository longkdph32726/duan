<h1>Đây là trang cập nhật</h1>
<form action="" method="POST" enctype="multipart/form-data">
    Category <br>
    <select name="category" id="" >
        <option value="0">Loại 0</option>
        <option value="1">Loại 1</option>
        <option value="2">Loại 2</option>
    </select><br>
    Tiêu đề<br>
    <input type="text" name="title" ><br>
    Tên<br>
    <input type="text" name="excerpt" ><br>
    Nội dung<br>
    <textarea name="content" id="" cols="30" rows="10"></textarea><br>
    Ảnh<br>
    <input type="file" name="image" value="{{ $post['image'] }}"><br>
    <button type="submit">Thêm</button>
</form>