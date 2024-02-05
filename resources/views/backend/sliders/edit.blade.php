@extends('backend.layout')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Slider Düzenleme</h3>
            </div>
            <div class="box-body">
                <form action="{{route('slider.update',$sliders->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @isset($sliders->sliders_file)
                        <div class="form-group">
                            <label>Yüklü Görsel</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="100" src="/images/sliders/{{$sliders->sliders_file}}" alt="">
                                </div>
                            </div>
                        </div>
                    @endisset

                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="sliders_file"  type="file">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="sliders_title" value="{{$sliders->sliders_title}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="sliders_slug" value="{{$sliders->sliders_slug}}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                    <textarea class="form-control" id="editor1"
                                              name="sliders_content">{{$sliders->sliders_title}}</textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>

                            </div>
                        </div>

                        <div class="form-group">
                            <label>İçerik</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select name="sliders_status" class="form-control">
                                        <option {{$sliders->sliders_status=="1" ? "selected=''" : ""}} value="1">Aktif</option>
                                        <option {{$sliders->sliders_status=="0" ? "selected=''" : ""}} value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="old_file" value="{{$sliders->sliders_file}}">



                            <div align="right" class="box-footer">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                            </div>
                        </div>


                </form>
            </div>
        </div>
    </section>


@endsection
@section('css')@endsection
@section('js')@endsection
