@extends('layouts.frontend')

@section('content')

    <style>
        .medium-padding120{
            padding: 60px 0;
        }
        .post-standard-details {
            margin-bottom: 60px;
        }
        .blog-details-author {
            margin-bottom: 0;
        }
        .post-standard-details .post-thumb{
            margin-left: 50%;
            transform: translateX(-50%);
        }
        .pagination-arrow{
            margin-bottom : 0;
            padding: 75px 0 85px;
        }
        .post .post__content {
            border-bottom: 1px solid #800000;
        }
        .case-item:hover {
            background: #2f2c2c;
        }
        @media (max-width: 768px) {
            .medium-padding120{
                padding: 30px 0 0;
            }
        }
    </style>

    <div class="stunning-header" style="padding: 30px 0 0;">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title" style="color: #2f2c2c;">Search results for keyword: {{$query}}</h1>
        </div>
    </div>

    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="row">
                    @if($posts->count() > 0)
                        <div class="case-item-wrap">
                            @foreach($posts as $post)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="case-item">
                                        <div class="case-item__thumb">
                                            <img src="{{asset($post->featured)}}" alt="our case">
                                        </div>
                                        <h6 class="case-item__title"><a href="{{route('post.single', ['slug' => $post->slug])}}">{{$post->title}}</a></h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">No results found.</p>
                    @endif
                </div>
                
                <!-- End Post Details -->
            </main>
        </div>
    </div>

@stop
