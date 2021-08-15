@foreach($posts as $post)
	{{ $post->post_name_th }}
	<br>
	<img src="{{url('/images/posts', $post->post_image)}}" style="width: 250px; height: 250px;">
	<!-- {{ $post->post_image }} -->
	<br>
	<B>หมวดหมู่ {{ $post->category->category_name_th }}</B>
	<br>
@endforeach