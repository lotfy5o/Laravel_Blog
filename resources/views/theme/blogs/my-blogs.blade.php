@extends('theme.master')

@section('title', 'My Blogs')
@section('pageName', "My Blogs")


@section('content')

@include('theme.partials.hero')


<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('BlogDeleteStatus'))
                <div class="alert alert-success">
                    {{ session('BlogDeleteStatus') }}
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col" width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($blogs) > 0)
                        @foreach ($blogs as $blog )
                        <tr>
                            <td>
                                <a href="{{route('blogs.show', ['blog'=>$blog])}}" target="_blank">{{ $blog->name }}</a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary mr-2" href="{{ route('blogs.edit', ['blog' => $blog]) }}" role="button">Edit</a>
                                <form action="{{ route('blogs.destroy', ['blog' => $blog]) }}" id="deleteForm" class="d-inline" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger mr-2">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach



                        @endif
                    </tbody>
                </table>
                @if (count($blogs) > 0)
                {{ $blogs->render('pagination::bootstrap-4')}}
                @endif

            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->


@endsection
