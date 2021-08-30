@extends('layouts.master')

@section('title', 'แก้ไขบทความ')

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
        <h4 class="font-title text-primary">แก้ไขบทความ</h4>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{asset('/')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{asset('/posts')}}">บทความ</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มบทความ</li>
          </ol>
        </nav>
      </div>
      <form class="row g-3" method="post" action="{{url('/posts', $post_id)}}" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
          <label class="form-label">ชื่อ (ภาษาไทย)</label>
          <input type="text" name="post_name_th" class="form-control" value="{{ $post->post_name_th }}" required>
        </div>
        <div class="col-12">
          <label class="form-label">ชื่อ (ภาษาอังกฤษ)</label>
          <input type="text" name="post_name_en" class="form-control"  value="{{ $post->post_name_en }}" required>
        </div>
        <div class="col-12">
          <label class="form-label">หมวดหมู่</label>
          <select name="category_id" class="form-select">
            <option value="">เลือกหมวดหมู่</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}" @if($category->id == $post->category_id) selected @endif>{{$category->category_name_th}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12">
          <label class="form-label">รูปภาพเดิม</label>
          <img src="{{url('images/posts', $post->post_image)}}" height="250" class="d-block rounded">
        </div>
        <div class="col-12">
          <label class="form-label">รูปภาพ</label>
          <input type="file" name="post_image" accept="image/*" class="form-control" required>
        </div>

        <div class="col-12">
          <label class="form-label">รายละเอียด</label>
          <textarea name="post_description" rows="7" class="form-control">{{ $post->post_description }}</textarea>
        </div>
        <div class="d-grid gap-2">
          {{-- <div><a href="{{url('/posts')}}" class="btn btn-light btn-sm"><i class="bi bi-arrow-left"></i> ย้อนกลับ</a></div> --}}
          <button class="btn btn-primary" type="submit">อัพเดทข้อมูล <i class="bi bi-arrow-repeat ms-1"></i></button>
        </div>
        
      </form>
    </div>
  </div>
</section>
@endsection

@section('script')
@endsection
