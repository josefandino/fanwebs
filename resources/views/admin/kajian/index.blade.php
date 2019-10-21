@extends('admin.adminlayout')

@section('css')
<style>
table.table .actions {
    width: 100px;
    text-align: center;
}
</style>
@stop

@section('page-header')
  Data Kajian <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

<div class="col-sm-12 col-sm-offset-6 col-lg-10 col-lg-offset-2 main">
  <div class="row">
      <ol class="breadcrumb">
          <li><a href="#">
              <em class="fa fa-home"></em>
              </a></li>
          <li class="active">Data Kajian</li>
      </ol>
    </div><br><!--/.row-->

<body>


  <div class="row">
    <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
            @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ Session::get('alert-success') }}</strong>
                </div>
            @endif
            <a href="{{ url('admin/kajian/create') }}" class="fa fa-plus-circle fa-2x"></a><h3 align="center">DATA KAJIAN</h3>
            <hr>
            <table class="table table-striped  table-bordered data">
                <thead>
                <tr>
                <th>No.</th>
                <th>Tema Kajian</th>
                <th>Nama Ustad</th>
                <th>Lokasi Kajian</th>
                <th>Waktu</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kajian as $data)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                         <td>{{ $data->tema_kajian }}</td>
                         <td>{{ $data->nama_ustad }}</td>
                         <td>{{ $data->lokasi_kajian }}</td>
                         <td>{{ $data->waktu }}</td>
                        <td>
                            <form action="{{ url('admin/kajian', $data->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <a href="{{ url('admin/kajian/'.$data->id.'/edit') }}" class=" btn btn-sm btn-primary">Update</a>
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
@endsection
