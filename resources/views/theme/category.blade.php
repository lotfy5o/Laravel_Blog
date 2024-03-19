<!-- @extends('theme.master') -->


@section('title', 'Category')
@section('pageName', $categoryName)

@section('categories-active', 'active')


@section('content')
<main class="site-main">
    <!--================Hero Banner start =================-->
    @include('theme.partials.hero')
    <!--================Hero Banner end =================-->

    <!--================ Blog slider start =================-->
    <section>
        <div class="container">
            <div class="owl-carousel owl-theme blog-slider">
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                        <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide1.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                        <a class="blog__slide__label" href="#">Fashion</a>
                        <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                        <p>2 days ago</p>
                    </div>
                </div>
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                        <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide2.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                        <a class="blog__slide__label" href="#">Fashion</a>
                        <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                        <p>2 days ago</p>
                    </div>
                </div>
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                        <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide3.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                        <a class="blog__slide__label" href="#">Fashion</a>
                        <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                        <p>2 days ago</p>
                    </div>
                </div>
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                        <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide1.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                        <a class="blog__slide__label" href="#">Fashion</a>
                        <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                        <p>2 days ago</p>
                    </div>
                </div>
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                        <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide2.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                        <a class="blog__slide__label" href="#">Fashion</a>
                        <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                        <p>2 days ago</p>
                    </div>
                </div>
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                        <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide3.png" alt="">
                    </div>
                    <div class="blog__slide__content">
                        <a class="blog__slide__label" href="#">Fashion</a>
                        <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                        <p>2 days ago</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog slider end =================-->

    <!--================ Start Blog Post Area =================-->


    <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if(Illuminate\Support\Facades\Auth::check())
                    @if (isset($blogs) && count($blogs) > 0)
                    @foreach ($blogs as $blog )
                    <div class="single-recent-blog-post">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('storage') }}/blogs/{{ $blog->image }}" alt="">
                            <ul class="thumb-info">
                                <li><a href="#"><i class="ti-user"></i>{{ $blog->user?->name }}</a></li>
                                <li><a href="#"><i class="ti-notepad"></i>{{ $blog->created_at->format('d M Y') }}</a></li>
                                <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                            </ul>
                        </div>
                        <div class="details mt-20">
                            <a href="blog-single.html">
                                <h3>{{ $blog->name }}</h3>
                            </a>
                            <p>{{ $blog->description }}</p>
                            <a class="button" href="{{ route('blogs.show', ['blog' => $blog->id]) }}">Read More <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>

                    @endforeach
                    @endif
                    @endif



                    <div class="row">
                        <div class="col-lg-12">
                            @if (isset($blogs) && count($blogs) > 0)
                            {{ $blogs->render('pagination::bootstrap-4')}}
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Start Blog Post Siddebar -->
                @include('theme.partials.sidebar')
                <!-- End Blog Post Siddebar -->
            </div>
    </section>



    <!--================ End Blog Post Area =================-->
</main>

@endsection
