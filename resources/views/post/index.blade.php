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
      <h1>Posts</h1>

      <form method="get">
        <div class="row">
          <div class="col-md-5">
            <input type="text" name="name" class="form-control" placeholder="ค้นหาชื่อ" value="{{ $name }}">
          </div>

          <div class="col-md-5">
            <select name="category" class="form-control">
              <option value="">ทั้งหมด</option>
              @foreach($categories as $category)
              <option value="{{$category->id}}"
                @if($category->id == $category_id) selected @endif
                >{{$category->category_name_th}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-2">
            <button class="btn btn-primary" type="submit">ค้นหา</button>
          </div>

        </div>
      </form>

      <hr>
      <p> ข้อมูลทั้งหมด {{$posts->total()}} </p>
      <a href="{{url('/posts/create')}}" class="btn btn-primary">เพิ่มข้อมูล</a>
      <table class="table">
        <tr>
          <td>image</td>
          <td>post name th</td>
          <td>post name end</td>
          <td>category</td>
          <td>description</td>
          <td>ดูข้อมูล</td>
          <td>แก้ไข</td>
          <td>ลบ</td>
        </tr>
        @foreach($posts as $post)
        <tr>
          <td style="width: 10%;">
            <img src="{{url('images/posts', $post->post_image)}}" style="width: 100%;">
          </td>
          <td>{{ $post->post_name_th }}</td>
          <td>{{ $post->post_name_en }}</td>
          <td>{{ $post->category->category_name_th }}</td>
          <td>{{ $post->post_description }}</td>
          <td>
            <a href='{{url("/posts/$post->id")}}' class="btn btn-success">ดูข้อมูล</a>
          </td>
          <td>
            <a href='{{url("/posts/$post->id/edit")}}' class="btn btn-primary">แก้ไข</a>
          </td>
          <td>
            <form method="post" class="delete-post" action="{{url('/posts', $post->id)}}">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-delete-post" type="button">ลบ</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>

      <div>
        {{$posts->links()}}
      </div>

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"></script>

    <script type="text/javascript">
      $('.btn-delete-post').click(function(e) {
        if (confirm('คุณต้องการลบข้อมูลหรือไม่!')) {
          $('.delete-post').submit();
        }
      });
    </script>

  </body>
</html>