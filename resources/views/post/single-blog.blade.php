@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Blog By Slug') }}</div>

                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="row ">
                            <div class="col-lg-12">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12">
                                <div>
                                    <h1>{{ $post->title }}</h1>
                                </div>
                                <div class="row DDateHit">
                                    <div class="col-lg-12">
                                        <p>{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 h-100 d-flex justify-content-center">
                                        <img src="{{ asset('images/blog/'.$post->image) }}"
                                            alt="{{ $post->title }}" title="{{ $post->title }}" class="img-responsive img100">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-4">
                                        <p>{!! $post->body !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
