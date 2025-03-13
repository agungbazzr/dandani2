@extends('layout-user')
@section('content')
<link href="{{ asset('home/assets/vendor/bootstrap/js/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('home/assets/vendor/bootstrap/js/css/bootstrap-datepicker.css') }}" rel="stylesheet">
<style>
    input[type=checkbox]
        {
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.5); /* IE */
        -moz-transform: scale(1.5); /* FF */
        -webkit-transform: scale(1.5); /* Safari and Chrome */
        -o-transform: scale(1.5); /* Opera */
        padding: 10px;
        margin-right:15px;
        }

        .comment-form .container{
          background-color: var(--surface-color);
          margin-top: 30px;
          padding: 30px;
          box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }
        .comment-form .row{
          background-color: var(--surface-color);
          margin-top: 10px;
          padding: 10px;
          box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .comment-form button{
          margin-top: 30px;
          padding: 10px;
        }
</style>
<section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>SERVICES</h2>
        <p>HOME MAINTENANCE<br></p>
      </div><!-- End Section Title -->

      <div class="container">
      <form action="{{route('u_pemesanan.store')}}" method="POST" id="regForm">
      {{ csrf_field() }}
        <div class="row gy-5">

          <div class="col-xl-4" data-aos="zoom-out" data-aos-delay="100">
            <img src="{{ asset('home/assets/img/features.png') }}" class="img-fluid" alt="">
          </div>
          
          <div class="col-xl-8 d-flex">
            <div class="row align-self-center gy-4">

              

              @foreach($jasa as $data )
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-box d-flex align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="service[]" id="{{ $data->id }}">
                        <label class="form-check-label" for="{{ $data->id }}">
                            <h5>{{ $data->nama_jasa }}</h5>
                        </label>
                    </div>
                </div>
              </div>
             
              @endforeach
              

            </div>
            
          </div>

        </div>
      </div>

    </section><!-- /Features Section -->

    <section id="comment-form" class="comment-form section">
            <div class="container">

                <h4>Detail Pemesanan</h4>
                <p>Lengkapi data di bawah ini untuk melanjutkan pemesanan * </p>
                <div class="row">
                  <div class="col-md-6 form-group">
                  <label class="form-label font-weight-bold">Foto</label>
                    <input name="foto" type="text" class="form-control" placeholder="Lampirkan Foto (opsional)">
                  </div>
                  <div class="col-md-6 form-group">
                  <label class="form-label font-weight-bold">Tanggal Pengerjaan *</label>
                    <input name="tanggal_pengerjaan" type="text" class="form-control" id="tanggal_pengerjaan" placeholder="Tanggal Pengerjaan">
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col form-group">
                  <label class="form-label font-weight-bold">Alamat *</label>
                    <input name="id_alamat" type="text" class="form-control" placeholder="Pilih Alamat *">
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                  <label class="form-label font-weight-bold">Deskripsi Tambahan *</label>
                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Tambahan *"></textarea>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                </div>

              </form>

            </div>
          </section><!-- /Comment Form Section -->
          <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Material Design DatePicker</title>
                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
                <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
            </head>
            <body>
                
                <?php
                  $date=date_create(date("m/d/Y"));
                  date_add($date,date_interval_create_from_date_string("30 days"));
              ?>
                <script>
                    $('#tanggal_pengerjaan').datepicker({
                        showOtherMonths: true,
                        minDate: '{{date("d-m-Y");}}',
                        maxDate: '{{date_format($date,"d-m-Y")}}',
                        value: '{{date("d-m-Y");}}',
                        format: 'dd-mm-yyyy'
                    });
                </script>
            </body>
            </html>

    <!-- Stats Section -->
    
@endsection