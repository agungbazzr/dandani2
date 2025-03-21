@extends('layout-admin')


@section('title', 'Pemesanan')
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
            <li><a href="{{url('pemesanan')}}">Pemesanan</a></li>
            <li class="current">Tambah Pemesanan</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Main content -->
    <div class="container" data-aos="fade-up">
     <br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('pemesanan.store') }}">
            {{ csrf_field() }}
            
            <div class="mb-3 {{ $errors->has('id_pelanggan') ? ' has-error' : '' }}">
              <label for="id_pelanggan" class="form-label">Id Pelanggan</label>

              <div>
                <input id="id_pelanggan" maxlength="255" type="text" class="form-control " name="id_pelanggan" value="{{ old('id_pelanggan') }}" required autofocus autocomplete="off">

                @if ($errors->has('id_pelanggan'))
                <span class="help-block">
                  <strong>{{ $errors->first('id_pelanggan') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('id_tukang') ? ' has-error' : '' }}">
              <label for="id_tukang" class="form-label">Id Tukang</label>

              <div>
                <input id="id_tukang" maxlength="255" type="text" class="form-control " name="id_tukang" value="{{ old('id_tukang') }}" required autofocus autocomplete="off">

                @if ($errors->has('id_tukang'))
                <span class="help-block">
                  <strong>{{ $errors->first('id_tukang') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('id_alamat') ? ' has-error' : '' }}">
              <label for="id_alamat" class="form-label">Id Alamat</label>

              <div>
                <input id="id_alamat" maxlength="255" type="text" class="form-control " name="id_alamat" value="{{ old('id_alamat') }}" required autofocus autocomplete="off">

                @if ($errors->has('id_alamat'))
                <span class="help-block">
                  <strong>{{ $errors->first('id_alamat') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('id_jasa') ? ' has-error' : '' }}">
              <label for="id_jasa" class="form-label">Id Jasa</label>

              <div>
                <input id="id_jasa" maxlength="255" type="text" class="form-control " name="id_jasa" value="{{ old('id_jasa') }}" required autofocus autocomplete="off">

                @if ($errors->has('id_jasa'))
                <span class="help-block">
                  <strong>{{ $errors->first('id_jasa') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('total') ? ' has-error' : '' }}">
              <label for="total" class="form-label">Total</label>

              <div>
                <input id="total" maxlength="255" type="text" class="form-control " name="total" value="{{ old('total') }}" required autofocus autocomplete="off">

                @if ($errors->has('total'))
                <span class="help-block">
                  <strong>{{ $errors->first('total') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('keterangan') ? ' has-error' : '' }}">
              <label for="keterangan" class="form-label">Keterangan</label>

              <div>
                <input id="keterangan" maxlength="" type="text" class="form-control " name="keterangan" value="{{ old('keterangan') }}" required autofocus autocomplete="off">

                @if ($errors->has('keterangan'))
                <span class="help-block">
                  <strong>{{ $errors->first('keterangan') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('pesan') ? ' has-error' : '' }}">
              <label for="pesan" class="form-label">Pesan</label>

              <div>
                <input id="pesan" maxlength="" type="text" class="form-control " name="pesan" value="{{ old('pesan') }}" required autofocus autocomplete="off">

                @if ($errors->has('pesan'))
                <span class="help-block">
                  <strong>{{ $errors->first('pesan') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3">
                  <div class="col-md-offset-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                      Simpan
                    </button>
                    <a href="{{ route('pemesanan.index') }}" class="btn btn-success"><i class="bi bi-arrow-left"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            @endsection
       