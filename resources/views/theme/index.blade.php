@extends('theme.master')

@section('title', 'Index')

@section('home-active', 'active')

@section('content')

<!--================Hero Banner start =================-->
<section class="mb-30px">
    <div class="container">
        <div class="hero-banner">
            <div class="hero-banner__content">
                <h3>Welcome to My Blog</h3>
                <h2>Discovering New Horizons Through Blogging</h2>
                <h4>{{ date("F j, Y") }}</h4>
            </div>
        </div>
    </div>
</section>

<!--================Hero Banner end =================-->

<!--================ Blog slider start =================-->
@if (count($sliderBlogs) > 0)

<section>
    <div class="container">
        <div class="owl-carousel owl-theme blog-slider">
            @foreach ($sliderBlogs as $blog )

            <div class="card blog__slide text-center">
                <div class="blog__slide__img">
                    <img class="card-img rounded-0" src="{{ asset('storage') }}/blogs/{{ $blog->image }}" alt=""
                        height="150px">
                </div>
                <div class="blog__slide__content">
                    <a class="blog__slide__label" href="{{ route('Theme.category', ['id' => $blog->category->id]) }}">{{
                        $blog->category->name }}</a>
                    <h3><a href="{{ route('blogs.show', ['blog' => $blog]) }}">{{ $blog->name }}</a></h3>
                    <p>{{ $blog->created_at->format('d M Y') }}</p>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
@endif
<!--================ Blog slider end =================-->

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">



                @if (count($blogs) > 0)
                @foreach ($blogs as $blog )
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="{{ asset('storage') }}/blogs/{{ $blog->image }}" alt="">
                        <ul class="thumb-info">
                            <li><a href="#"><i class="ti-user"></i>{{ $blog->user?->name }}</a></li>
                            <li><a href="#"><i class="ti-notepad"></i>{{ $blog->created_at->format('d M Y')}}</a></li>
                            <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="blog-single.html">
                            <h3>{{ $blog->name }}</h3>
                        </a>
                        <p>{{ $blog->description }}</p>
                        <a class="button" href="{{ route('blogs.show', ['blog' => $blog]) }}">Read More <i
                                class="ti-arrow-right"></i></a>
                    </div>
                </div>

                @endforeach

                @endif



                <div class="row">
                    <div class="col-lg-12">
                        {{ $blogs->render('pagination::bootstrap-4')}}
                    </div>
                </div>

            </div>

            <!-- Start Blog Post Siddebar -->
            <!-- didn't include it in the master cause some pages doesn't have it -->
            @include('theme.partials.sidebar')

            <!-- End Blog Post Siddebar -->
        </div>
</section>
<!--================ End Blog Post Area =================-->



@endsection