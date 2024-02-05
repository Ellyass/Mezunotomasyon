@extends('frontend.layout')
@section('title',"BUÜ | Orhangazi MYO")
@section('content')

    <div class="container containerSearch">
        <!-- search form (Optional) -->
        <form action="{{ route('search.Index') }}" method="GET" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" id="search-btn" class="btn btn-flat btn-success"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        @if(count($users)>0)

            <div>
                <table width="100%" cellpadding="1" border="1" class="table table-striped">
                    <thead>
                    <tr>
                        <th>İsmi</th>
                        <th>E-postası</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div style="margin-top: 2vh;justify-content: center;text-align: center">
                {{ $users->appends(request()->query())->onEachSide(1)->links() }}
            </div>
        @else
            <h4 style="text-align: center">Öğrenci bulunamadı!</h4>
        @endif
        <!-- /.search form -->

    </div>
    <style>
        .sidebar-form {
        }

        .input-group {
            margin-top: 23vh;
            margin-bottom: 5vh;
        }
        .containerSearch{
            height: 80vh;
        }
    </style>
@endsection
@section('css') @endsection
@section('js') @endsection
