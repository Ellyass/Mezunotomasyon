@extends('frontend.layout')
@section('title',"BUÜ | Orhangazi MYO")
@section('content')

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">
            <small>İş İlanları</small>
        </h1>


        @foreach($data['blogs'] as $blog)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="#">
                            <img class="img-fluid rounded" src="/images/blogs/{{$blog->blogs_file}}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="card-title">{{$blog->blogs_title}}</h2>
                        <p class="card-text">{!! substr($blog->blogs_content,0,140) !!}</p>
                        <a href="{{route('blog.Detail',$blog->blogs_slug)}}" class="btn btn-primary">Devamını Oku &rarr;</a>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
               Yayınlama Zamanı {{$blog->created_at->format('d-m-Y h:i')}}
            </div>
        </div>
            @endforeach









    </div>

@endsection
@section('css') @endsection
@section('js') @endsection
