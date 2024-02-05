@extends('frontend.layout')
@section('title',"BUÜ | Orhangazi MYO")
@section('content')

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$pages->pages_title}}</h1>


        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="/images/pages/{{$pages->pages_file}}" alt="">

                <hr>

                <!-- Date/Time -->
                <p> Yayınlanma Zamanı {{$pages->created_at->format('d-m-Y h:i')}}</p>

                <hr>

                <p>{!! $pages->pages_content !!}</p>
                <hr>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">


                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Son Pagelar</h5>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($pageList as $list)
                                <a href="{{route('page.Detail',$list->pages_slug)}}"> <li  class="list-group-item ">{{$list->pages_title}}</li></a>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>

@endsection
@section('css') @endsection
@section('js') @endsection
