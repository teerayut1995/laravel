<header class="blog-header py-3">
  <div class="row justify-content-between align-items-center">
    <div class="col">
      <a class="blog-header--logo" href="{{url('/')}}"><img src="{{asset('assets/img/mini_blog.png')}}" alt="mini blog"></a>
    </div>
    <div class="col d-flex justify-content-end align-items-center">
      <a class="blog-header--link link-facebook" href="#"><i class="bi bi-facebook"></i></a>
      <a class="blog-header--link link-twitter" href="#"><i class="bi bi-twitter"></i></a>
      <a class="blog-header--link link-ig" href="#"><i class="bi bi-instagram"></i></a>
      <p class="mb-0"></p>
    </div>
  </div>
</header>
<div class="blog-nav nav-scroller py-1 mb-2">
  <nav class="nav d-flex justify-content-between blog-nav--menu nav-light bg-light">
    <a class="py-2 px-4 link-secondary {{ (request()->is('/')) ? 'active' : '' }}" href="{{url('/')}}">หน้าหลัก</a>
    @php $catagories = App\Models\Category::where('category_status' , 'active')->get(); @endphp
    @foreach ($catagories as $item)
      <a class='py-2 px-4 link-secondary {{ (request()->is("categories/$item->id")) ? 'active' : '' }}' href="{{url('/categories', $item->id)}}">{{ $item->category_name_th }}</a>
    @endforeach
    <a class="py-2 px-4 link-secondary {{ (request()->is('posts', 'posts/*', 'categories')) ? 'active' : '' }}" href="{{url('/posts')}}" target="_blank"><i class="bi bi-gear me-1"></i> จัดการบทความ</a>
  </nav>
</div>