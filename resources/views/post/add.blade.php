@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9">
                        {{ __('Create Post') }}
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ route('post.index') }}"><button type="submit" class="btn btn-primary">Go to List</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <form class="forms-sample" action="{{route('post.store')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="title">Title<span class="required-icon">*</span></label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter title" value="{{old('title')}}" maxlength="200"
                                required>
                            @error('title')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="body">Body</label>
                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="6" id="body" placeholder="Enter body" maxlength="4000">{{old('body')}}</textarea>
                            @error('body')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label w-100">Image<span class="required-icon">*</span></label>
                            <input type="file" class="form-control" name="image" id="image">
                            <!-- <small class="form-text text-muted">(jpg, jpeg, png)</small> -->
                            @error('image')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Insert</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
