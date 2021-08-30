<div class="blog-grid--jumbotron">
    <img src="{{asset('assets/img/animation.gif')}}" alt="Ads" class="img-fluid">
</div>
<div class="blog-grid--categories">
    <h5 class="blog-grid--title">ประเภทบทความ</h5>
    <ul class="list-group">
        @php $i = 1; @endphp
        @foreach ($categories as $item)
            <li class="list-group-item d-flex border-0">
                <div class="me-3"><h1 class="font-title opacity-25 mb-0">@if ($i < 10) 0{{$i++}} @else {{$i++}} @endif</h1></div>
                <div>
                    <h6 class="font-title text-primary mt-1 mb-0">{{ $item->category_name_th }}</h6>
                    <p class="font-title">{{ $item->category_name_en }}</p>
                </div>
            </li>
        @endforeach
      </ul>
</div>