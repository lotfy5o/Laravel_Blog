@extends('theme.master')

@section('title', 'Add Blogs')
@section('pageName', "Add Blogs")


@section('content')

  @include('theme.partials.hero')


  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
          <div class="col-12">
              @if (session('Blog-status'))
                  <div class="alert alert-success">
                      {{ session('Blog-status') }}
                  </div>
              @endif
          <form action="{{ route('blogs.store')}}" class="form-contact contact_form"
                method="post"  novalidate="novalidate" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input class="form-control border" name="name" placeholder="Enter Your Blog Title"  type="text" value="{{old('name')}}">
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="form-group">
              <input class="form-control border" name="image"  type="file" value="{{old('name')}}">
              <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <div class="form-group">
              <select class="form-control border" name="category_id"  value="{{old('category_id')}}">
                <option value="">Select Cateogry...</option>
                @if (count($categories) > 0)

                    @foreach ($categories as $category )

                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                    @endforeach


                @endif
              </select>
              <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>

            <div class="form-group">
              <textarea class="w-100 border" name="description" placeholder="Enter Your Blog" rows="5">{{ old('description') }}</textarea>
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>



            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Sumbit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->


@endsection
