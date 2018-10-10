@extends('master')
@section('main_content')

@foreach($published_post as $v_post)
<div class="templatemo_post_wrapper">
    <div class="templatemo_post">
        <div class="post_title">{{$v_post->blog_title}}</div>
        <div class="post_info">
            Posted by {{$v_post->author_name}}, {{$v_post->created_at}}, Category: {{$v_post->created_at}}
        </div>
        <div class="post_body">
            <img src="{{asset('public/assets/images/templatemo_image_02.jpg')}}" alt="free css template" border="1" />
            <p>{{$v_post->blog_short_description}}</p>
        </div>
        <div class="post_comment">
            <a href="#">No Comment</a>
        </div>
    </div>
</div>
<!-- End of a post-->
@endforeach

@endsection