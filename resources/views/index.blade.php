<!DOCTYPE html>
<html>
<head>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<!-- Styling for public area -->
    <link rel="stylesheet" href= "{{ asset('css/style.css') }}">
    <link rel="stylesheet" href= "{{ asset('css/admin_styling.css') }}">
	<meta charset="UTF-8">

    <title>LifeBlog | Home </title>
</head>
<body>
<div class="container">                    
    @include("layouts/navbar")
    @include("layouts/banner")
    <div class="content">
        <h2 class="content-title">Recent Articles</h2>
        <hr>

        @foreach ($posts as $post) 
            <img src="{{ asset('storage/pictures/'.$post->image) }}" class="post_image" alt="ercgtfvbhjnk">
            <h4><a href = "edit.php?id='{{ $post['id'] }}'">{{ $post['title'] }} </a></h4>
            <p> {{ $post['body'] }}</p>
            <p> {{ $post['created_at'] }} </p>
            
        <a href="single_post.php?post-slug={{ $post['slug'] }}">
            <div class="post_info">
                <h3>{{ $post['title'] }}</h3>
                <div class="info">
                    <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
                    <span class="read_more">Read more...</span>
                </div>
            </div>
        </a> 
        @endforeach 

    </div>       
</div>
@foreach($posts as $post) {
<div class="post" style="margin-left: 0px;">
    
    @if (isset($post['topic']['name']))
        <a href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>" class="btn category">
            {{ $post['topic']['name'] }}
        </a>
    @endif
    }

    <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
        <div class="post_info">
            <h3>{{$post['title']}}</h3>
            <div class="info">
                <span>@date("F j, Y ", strtotime({{$post["created_at"]}}))</span>
                <span class="read_more">Read more...</span>
            </div>
        </div>
    </a>
</div>
@endforeach




{{-- // Fetch Data from the database --}}
{{-- **************** --}}



<div class="footer">
    <p>MyViewers &copy; <?php echo date('Y'); ?></p>
</div>

</div>	
</body>
</html>
                