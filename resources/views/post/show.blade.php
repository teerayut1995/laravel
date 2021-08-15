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
      <h1>{{$post->post_name_th}}</h1>
      <h4>{{$post->post_name_en}}</h4>
      <img src="{{url('/images/posts', $post->post_image)}}" style="width: 50%;">
      <br>
      <p>{!! nl2br($post->post_description) !!}</p>

      <p>เพิ่มเมื่อ {{$post->created_at}}, {{$post->created_at->diffForHumans()}}</p>
      <p>อัพเดตล่าสุด {{$post->updated_at}}, {{$post->created_at->diffForHumans()}}</p>

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