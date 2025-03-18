@extends('layout-user')


@section('title', 'Alamat')
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
            <li><a href="{{url('alamat')}}">Alamat</a></li>
            <li class="current">Tambah Alamat</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Main content -->
    <div class="container" data-aos="fade-up">
     <br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('alamat.store') }}">
            {{ csrf_field() }}
            
            <div class="mb-3 {{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title" class="form-label">Title</label>

              <div>
                <input id="title" maxlength="255" type="text" class="form-control " placeholder="ex : Rumah / Kantor / Gedung dll." name="title" value="{{ old('title') }}" required autofocus autocomplete="off">

                @if ($errors->has('title'))
                <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('provinsi') ? ' has-error' : '' }}">
              <label for="provinsi" class="form-label">Provinsi</label>
              <div>
              <select class="form-control form-select-lg" name="provinsi" id="provinsi" aria-label=".form-select-sm example">
                  <option selected>Pilih Provinsi</option>
                  <option value="3">BANTEN</option>
                  <option value="6">DKI JAKARTA</option>
                  <option value="9">JAWA BARAT</option>
                 
              </select>
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('kabupaten') ? ' has-error' : '' }}">
              <label for="kabupaten" class="form-label">Kabupaten</label>
              <div>
              <select class="form-control form-select-lg" name="kabupaten" id="kabupaten" aria-label=".form-select-sm example">
                  <option selected>Pilih Kabupaten</option>
                 
              </select>
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('kecamatan') ? ' has-error' : '' }}">
              <label for="kecamatan" class="form-label">Kecamatan</label>
              <div>
              <select class="form-control form-select-lg" name="kecamatan" id="kecamatan" aria-label=".form-select-sm example">
                  <option selected>Pilih Kecamatan</option>
                 
              </select>
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('kelurahan') ? ' has-error' : '' }}">
              <label for="kelurahan" class="form-label">Kelurahan</label>
              <div>
              <select class="form-control form-select-lg" name="kelurahan" id="kelurahan" aria-label=".form-select-sm example">
                  <option selected>Pilih Kelurahan</option>
                 
              </select>
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('alamat') ? ' has-error' : '' }}">
              <label for="alamat" class="form-label">Alamat</label>

              <div>
                <input type="hidden" name="detail_alamat" id="detail_alamat">
                <textarea name="alamat"  class="form-control "  id="alamat" cols="30" rows="10">{{ old('alamat') }}</textarea>

                @if ($errors->has('alamat'))
                <span class="help-block">
                  <strong>{{ $errors->first('alamat') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3">
                  <div class="col-md-offset-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                      Simpan
                    </button>
                    <a href="{{ route('user.profile') }}" class="btn btn-success"><i class="bi bi-arrow-left"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            @endsection
            <script src="{{ asset('home/assets/js/jquery-3.7.1.min.js') }}"></script>
            <script>
              $(document).ready(function(){
                get_kabupaten();
                get_kecamatan();
                get_kelurahan();
                get_alamat();
              });
              function get_kabupaten(){
                $("#provinsi").change(function(){
                  var id = $("#provinsi").val();
                  $.ajax({

                        url: "https://alamat.thecloudalert.com/api/kabkota/get/",
                        type: "GET",
                        cache: false,
                        data: {
                          'd_provinsi_id':id,
                        },
                        success:function(response){ 
                          $('#kabupaten').empty().append('<option selected="selected" value="">Pilih Kabupaten</option>');
                              
                          $.each(response.result, function (i, item) {
                              $('#kabupaten').append($('<option>', { 
                                  value: item.id,
                                  text : item.text 
                              }));
                          });
                        }
                    });
                });
              }
              function get_provinsi(){

                  $.ajax({

                  url: "https://alamat.thecloudalert.com/api/provinsi/get/",
                  type: "GET",
                  cache: false,
                  data: {
                      
                  },
                  success:function(response){ 

                    $.each(response.result, function (i, item) {
                      $('#provinsi').append($('<option>', { 
                          value: item.id,
                          text : item.text 
                      }));
                  });
                  }
                  });
            }
            function get_kecamatan(){
                $("#kabupaten").change(function(){
                  var id = $("#kabupaten").val();
                  $.ajax({

                        url: "https://alamat.thecloudalert.com/api/kecamatan/get/",
                        type: "GET",
                        cache: false,
                        data: {
                          'd_kabkota_id':id,
                        },
                        success:function(response){ 
                          $('#kecamatan').empty().append('<option selected="selected" value="">Pilih Kecamatan</option>');
                              
                          $.each(response.result, function (i, item) {
                              $('#kecamatan').append($('<option>', { 
                                  value: item.id,
                                  text : item.text 
                              }));
                          });
                        }
                    });
                });
              }
              function get_kelurahan(){
                $("#kecamatan").change(function(){
                  var id = $("#kecamatan").val();
                  $.ajax({

                        url: "https://alamat.thecloudalert.com/api/kelurahan/get/",
                        type: "GET",
                        cache: false,
                        data: {
                          'd_kecamatan_id':id,
                        },
                        success:function(response){ 
                          $('#kelurahan').empty().append('<option selected="selected" value="">Pilih Kelurahan</option>');
                              
                          $.each(response.result, function (i, item) {
                              $('#kelurahan').append($('<option>', { 
                                  value: item.id,
                                  text : item.text 
                              }));
                          });
                        }
                    });
                });
              }
              function get_alamat(){
                $("#kelurahan").change(function(){
                  var id = $("#kelurahan").val();
                  $("#detail_alamat").val($("#provinsi option:selected").text()+" , "+$("#kabupaten option:selected").text()+" , "+$("#kecamatan option:selected").text()+" , "+$("#kelurahan option:selected").text()) 
                });
              }
            </script>
       