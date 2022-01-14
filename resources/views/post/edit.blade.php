@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Blog') }}</div>

                <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <form class="forms-sample" action="{{route('post.update', $post->id)}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title<span class="required-icon"> *
                                </span></label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter title" value="{{$post->title}}" maxlength="200">
                            @error('title')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="body">Body</label>
                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="6" id="body" placeholder="Enter body" maxlength="4000">@if(!empty($post->body)){!!$post->body!!}@else{{old('body')}}@endif</textarea>
                            @error('body')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label w-100"> Image </label>
                            <input type="hidden" name="hidden_image" value="{{$post->image}}">
                            @if(!empty($post->image))
                                <img src="{{asset('images/blog/'.$post->image)}}" alt="{{$post->title}}" width="80">
                            @else
                                <img src="{{asset('images/blog/dummy.png')}}" alt="{{$post->title}}" width="80">
                            @endif
                            <input type="file" class="form-control mt-2" id="image" name="image">
                            <!-- <small class="form-text text-muted">(jpg, jpeg, png)</small> -->
                            @error('image')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
