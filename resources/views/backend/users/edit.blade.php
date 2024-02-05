@extends('backend.layout')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User Düzenleme</h3>
            </div>
            <div class="box-body">
                <form action="{{route('user.update',$users->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @isset($users->user_file)
                        <div class="form-group">
                            <label>Yüklü Görsel</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="120" src="/images/users/{{$users->user_file}}" alt="">
                                </div>
                            </div>
                        </div>
                    @endisset

                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-3">
                                <input class="form-control" name="user_file"  type="file">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <div class="row">
                            <div class="col-xs-6">
                                <input class="form-control" type="text" name="name" value="{{$users->name}}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Kullanıcı adı (E-mail)</label>
                        <div class="row">
                            <div class="col-xs-6">
                                <input class="form-control" type="email" name="email" value="{{$users->email}}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Şifre</label>
                        <div class="row">
                            <div class="col-xs-6">
                                <input class="form-control" type="password" name="password">
                                <small>Eğer şifreyiniz değiştirmek istemiyorsanız boş bırakın!</small>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-2">
                                <select name="status" class="form-control">
                                    <option {{$users->status=="1" ? "selected=''" : ""}} value="1">Aktif</option>
                                    <option {{$users->status=="0" ? "selected=''" : ""}} value="0">Pasif</option>
                                </select>
                            </div>
                        </div>

                            <input type="hidden" name="old_file" value="{{$users->user_file}}">



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
