<div class="card card-profile">
    <div class="card-body">
      <div class="d-flex mb-4">
        <div class="me-3"><img src="{{asset('assets/img/male.png')}}" alt="profile" height="52" width="52"></div>
        <div>
          <h5 class="card-title">NameJakkpong</h5>
          <h6 class="card-subtitle mb-2 text-muted">Bloger</h6>
        </div>
      </div>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('posts', 'posts/*')) ? 'active' : '' }}" aria-current="page" href="{{asset('/posts')}}">บทความ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}" href="{{asset('/categories')}}">ประเภทบทความ</a>
        </li>
      </ul>
    </div>
</div>