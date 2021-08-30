@extends('layouts.master')

@section('title', 'จัดการบทความ')

@section('style')
@endsection

@section('content')
<section class="blog-table">
  <div class="row">
    <div class="col-md-4 col-lg-3">
      @include('components.profile')
    </div>
    <div class="col-md-8 col-lg-9">
      <div>
        <h4 class="font-title text-primary">จัดการบทความ</h4>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{asset('/')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">บทความ</li>
          </ol>
        </nav>
      </div>
      <form class="row mb-4" method="get">
          <div class="col-md-6">
            <input type="text" name="name" class="form-control form-control-sm" placeholder="ค้นหาชื่อ" value="{{ $name }}">
          </div>
          <div class="col-md-4">
            <select name="category" class="form-select form-select-sm">
              <option value="">ทั้งหมด</option>
              @foreach($categories as $category)
              <option value="{{$category->id}}"
                @if($category->id == $category_id) selected @endif
                >{{$category->category_name_th}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2">
            <div class="d-grid gap-2"><button class="btn btn-secondary btn-sm" type="submit"><i class="bi bi-search me-1"></i> ค้นหา</button></div>
          </div>
      </form>
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h5 class="font-title text-primary mb-0">บทความ</h5>
            <p> ข้อมูลทั้งหมด {{$posts->total()}} บทความ</p>
          </div>
          <div><a href="{{url('/posts/create')}}" class="btn btn-primary"><i class="bi bi-plus me-1"></i> เพิ่มข้อมูล</a></div>
        </div>
        <table class="table">
          <thead class="table-light">
            <tr>
              <td width="120">รูปภาพ</td>
              <td>ชื่อบทความ</td>
              <td width="180">ประเภทบทความ</td>
              <td width="140" class="text-center">จัดการข้อมูล</td>
            </tr>
          </thead>
          <tbody>
          @forelse($posts as $post)
          <tr>
            <td width="120">
              <img src="{{url('images/posts', $post->post_image)}}" class="img-fluid rounded">
            </td>
            <td>
              <a href='{{url("/posts/$post->id")}}' class="text-decoration-none"><p class="mb-1 text-dark fw-bold">{{ $post->post_name_th }}</p></a>
              <p class="text-muted"><small>{{ $post->post_name_en }}</small></p> 
            </td>
            <td width="180"><span class="badge bg-primary">{{ $post->category->category_name_th }}</span></td>
            <td width="140">
              <div class="d-flex justify-content-center">
                <div><a href='{{url("/posts/$post->id/edit")}}' class="btn btn-link px-2"><i class="bi bi-pen text-dark"></i></a></div>
                <div>
                  <form method="post" class="delete-post" action="{{url('/posts', $post->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link btn-delete-post px-2" type="button"><i class="bi bi-trash text-danger"></i></button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @empty
          <tr><td colspan="4" class="text-muted text-center">ยังไม่มีข้อมูล</td></tr>
          @endforelse
        </tbody>
        </table>
        <div class="d-flex justify-content-end">
          {{$posts->links()}}
        </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
  $('.btn-delete-post').click(function(e) {
    if (confirm('คุณต้องการลบข้อมูลหรือไม่!')) {
      $('.delete-post').submit();
      window.reload();
    }
  });
</script>
@endsection