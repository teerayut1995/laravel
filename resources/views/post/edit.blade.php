<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    
    <div class="container">
      <h1>Update Posts</h1>

      <form method="post" action="{{url('/posts', $post_id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>หมวดหมู่</label>
          <select name="category_id" class="form-control">
            <option value="">เลือกหมวดหมู่</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}"
              @if($category->id == $post->category_id) selected @endif
            >{{$category->category_name_th}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>ชื่อ (ภาษาไทย)</label>
          <input type="text" name="post_name_th" class="form-control" value="{{ $post->post_name_th }}" required>
        </div>

        <div class="form-group">
          <label>ชื่อ (ภาษาอังกฤษ)</label>
          <input type="text" name="post_name_en" class="form-control"  value="{{ $post->post_name_en }}" required>
        </div>

        <div class="form-group">
          <img src="{{url('images/posts', $post->post_image)}}" style="width: 250px;">
        </div>

        <div class="form-group">
          <label>รูปภาพ</label>
          <input type="file" name="post_image" accept="image/*" class="form-control">
        </div>

        <div class="form-group">
          <label>รายละเอียด</label>
          <textarea name="post_description" rows="7" class="form-control">{{ $post->post_description }}</textarea>
        </div>

        <div class="form-group">
          <button class="btn btn-primary" type="submit">บันทึก</button>
          <a href="{{url('/posts')}}" class="btn btn-danger">ย้อนกลับ</a>
        </div>
        
      </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>