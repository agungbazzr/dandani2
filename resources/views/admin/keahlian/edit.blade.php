@extends('layout-admin')


@section('title', 'Keahlian')
@section('content')
 @if(session('error'))
  <div class="alert alert-error">
   {{ session('error') }}
 </div>
 @endif

 @if(count($errors) > 0)
 <div class="alert alert-danger">
   <strong>info !!</strong>
   <br>
   <ul>
     @foreach($errors->all() as $error)
     <li>{{ $error }}</li>
     @endforeach
   </ul>
 </div>
 @endif
    <section id="comment-form" class="comment-form section">
    <div class="page-title">
      
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{url('keahlian')}}">Keahlian</a></li>
            <li class="current">Tambah Keahlian</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Main content -->
    <div class="container" data-aos="fade-up">
     <br>
        @foreach($keahlian as $data)
          <form class="form-horizontal" role="form" method="POST" action="{{ url('keahlian/update')}}/{{ $data->id }}">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="id">
            
            <div class="mb-3 {{ $errors->has('nama_keahlian') ? ' has-error' : '' }}">
              <label for="nama_keahlian" class="form-label">Nama Keahlian</label>

              <div>
                <input id="nama_keahlian" maxlength="255" type="text" class="form-control " name="nama_keahlian" value="{{ $data->nama_keahlian }}" required autofocus autocomplete="off">

                @if ($errors->has('nama_keahlian'))
                <span class="help-block">
                  <strong>{{ $errors->first('nama_keahlian') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('jenis_keahlian') ? ' has-error' : '' }}">
              <label for="jenis_keahlian" class="form-label">Jenis Keahlian</label>

              <div>
                <input id="jenis_keahlian" maxlength="255" type="text" class="form-control " name="jenis_keahlian" value="{{ $data->jenis_keahlian }}" required autofocus autocomplete="off">

                @if ($errors->has('jenis_keahlian'))
                <span class="help-block">
                  <strong>{{ $errors->first('jenis_keahlian') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('keterangan_keahlian') ? ' has-error' : '' }}">
              <label for="keterangan_keahlian" class="form-label">Keterangan Keahlian</label>

              <div>
                <input id="keterangan_keahlian" maxlength="" type="text" class="form-control " name="keterangan_keahlian" value="{{ $data->keterangan_keahlian }}" required autofocus autocomplete="off">

                @if ($errors->has('keterangan_keahlian'))
                <span class="help-block">
                  <strong>{{ $errors->first('keterangan_keahlian') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>
                  Simpan
                </button>
                <a href="{{ route('keahlian.index') }}" class="btn btn-success"><i class="fa fa-times"></i> Batal</a>
              </div>
            </div>
          </form>
        @endforeach
    </div>
    @endsection
       