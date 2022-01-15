@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<style>
svg.w-5.h-5 {
 height: 10px!important;
}
span.relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5.rounded-md {
    display: none;
}
a.relative.inline-flex.items-center.px-4.py-2.ml-3.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.rounded-md.hover\:text-gray-500.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150 {
    display: none;
}
a.relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.rounded-md.hover\:text-gray-500.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150 {
    display: none;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9">
                            {{ __('Blog List') }}
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ route('post.add') }}"><button type="submit" class="btn btn-primary">Create New Post</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table_id"
                                class="table table-striped dataTable no-footer dtr-inline mt-4">
                                <thead>
                                    <tr role="row">
                                        <th>SL.</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($post as $pos)
                                    <tr class="even">
                                        <td>{{$no++}}</td>
                                        <td>{{$pos->title}}</td>
                                        <td>
                                            @if($pos->image)
                                            <img src="{{asset('images/blog/'.$pos->image)}}" width="70">
                                            @else
                                            <img src="{{asset('images/blog/dummy.jpg')}}" width="70">
                                            @endif
                                        </td>
                                        <td class="table-action">
                                            <a href="{{route('post.edit',[$pos->id])}}"><i class="fas fa-edit"></i><a>
                                            <a href="{{route('post.delete',[$pos->id])}}"><i class="fas fa-trash-alt" onClick="return confirm('Are you sure you want to Destroy this data permanently?')"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($post->hasPages())
                        <div class="d-flex justify-content-center">
                            {{ $post->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
