@extends('layouts.master')

@section('title', 'จัดการประเภทบทความ')

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
        <h4 class="font-title text-primary">ประเภทบทความ</h4>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{asset('/')}}">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">ประเภทบทความ</li>
          </ol>
        </nav>
      </div>
      <div class="row">
          <div class="col-md-4">
              <div class="card card-add bg-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                  <div class="card-body text-center py-5">
                    <h4 class="text-primary font-title mb-0"><i class="bi bi-plus me-1"></i> เพิ่มข้อมูล</h4>
                  </div>
              </div>
          </div>
          <div class="col-md-8">
            <table class="table">
                <thead class="table-light">
                  <tr>
                    <td width="40" class="text-center">ลำดับ</td>
                    <td>ชื่อประเภทบทความ</td>
                    <td width="80">สถานะ</td>
                    <td width="140" class="text-center">จัดการข้อมูล</td>
                  </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
                @forelse($categories as $category)
                <tr>
                  <td width="40" class="text-center">
                    <span class="text-muted">{{$i++}}</span>
                  </td>
                  <td>
                    <p class="mb-1 text-dark fw-bold">{{ $category->category_name_th }}</p>
                    <p class="text-muted mb-0"><small>{{ $category->category_name_en }}</small></p> 
                  </td>
                  <td width="80"><span class="badge {{$category->category_status == 'active' ? 'bg-success' : 'bg-danger'}}">{{ $category->category_status == 'active' ? 'กำลังใช้งาน' : 'ปิดใช้งาน' }}</span></td>
                  <td width="140">
                    <div class="d-flex justify-content-center">
                      <div>
                        <button class="btn btn-link px-2" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $category->id }}"><i class="bi bi-pen text-dark"></i></button>
                        @include('categories.modal.edit')
                      </div>
                      <div>
                        <button class="btn btn-link px-2" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $category->id }}"><i class="bi bi-trash text-danger"></i></button>
                        @include('categories.modal.delete')
                      </div>
                    </div>
                  </td>
                  
                </tr>
                @empty
                <tr><td colspan="4" class="text-muted text-center">ยังไม่มีข้อมูล</td></tr>
                @endforelse
              </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
</section>
@include('categories.modal.create')
@endsection

@section('script')
@endsection