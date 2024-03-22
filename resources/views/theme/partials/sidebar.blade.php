@php
use App\Models\Category;
use App\Models\Blog;
$sideCat = Category::take(3)->get();
$recentBlogs = Blog::take(3)->get();
@endphp

<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('Subscriber.store') }}" method="post">
                <div class="form-group mt-30">
                    <div class="col-autos">
                        @csrf
                        <input type="text" class="form-control" name="email" placeholder="Enter email"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                    </div>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="bbtns d-block mt-20 w-100">Subcribe</button>
            </form>
        </div>

        @if (count((array)$sideCat) > 0)
        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Catgory</h4>
            <ul class="cat-list mt-20">

                @foreach ($sideCat as $category )
                <li>
                    <a href="{{ route('Theme.category', ['id' => $category->id]) }}"
                        class="d-flex justify-content-between">
                        <p>{{ $category->name }}</p>
                        <p>{{ count($category->blogs) }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Post</h4>
            <div class="popular-post-list">
                @if (count($recentBlogs) > 0)
                @foreach ($recentBlogs as $blog )
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="{{ asset('storage') }}/blogs/{{ $blog->image }}" alt="">
                        <ul class="thumb-info">

                            <li><a href="#">{{ $blog->user->name }}</a></li>
                            <li><a href="#">{{ $blog->created_at->format('d M Y') }}</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                            <h6>{{ $blog->name }}</h6>
                        </a>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
</div>