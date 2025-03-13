
@extends('layout-admin')
@section('content')
   <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">
    <div class="page-title">
      
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{url('jadwal')}}">Layanan</a></li>
            <li class="current">Jadwal</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
     
      <div class="container" data-aos="fade-up">
         <!-- Section Title -->
      <div class="container section-title mt-5" data-aos="fade-up">
        <h2>Jadwal Layanan</h2>
        <p>Layanan Tersedia Dandani.id</p>
      </div><!-- End Section Title -->
      <div class="row">
        <div class="col-md-9">
          <a class="btn btn-primary mb-5" href="{{route('jadwal.create')}}"><i class="bi bi-plus"></i> Tambah</a>
        </div>
        <div class="col-md-3">
          <div class="search-widget widget-item">
            <form action="{{route('jadwal.index')}}" method="GET">
              <input required type="text" name="query" value="<?php if(isset($_GET['query'])) echo $_GET['query']; ?>">
              <button type="submit"  title="Search"><i class="bi bi-search"></i></button>
            </form>
          </div>
        </div>
      </div>
      
          <div class="table-responsive">
            <table id="tbl_data" class="table" style="width:100%">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                
								<th class="text-center">Id</th>
								<th class="text-center">Id Pemesanan</th>
								<th class="text-center">Tanggal Kunjungan</th>
								<th class="text-center">Tanggal Selesai</th>
                <th class="text-center">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($jadwal as $data )
              <tr>
                <td class="text-center">{{ ($jadwal->perPage() * ($jadwal->currentPage() - 1)) + $loop->iteration }}</td>
                
								<td class="text-center">{{ $data->id }}</td>
								<td class="text-center">{{ $data->id_pemesanan }}</td>
								<td class="text-center">{{ $data->tanggal_kunjungan }}</td>
								<td class="text-center">{{ $data->tanggal_selesai }}</td>
                <td class="text-center">
                  <a href="{{ url('jadwal/destroy')}}/{{ $data->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</a> |
                  <a href="{{ url('jadwal/edit')}}/{{ $data->id }}" class="btn btn-success"><i class="bi bi-pencil"></i> Edit</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            </table>
            {{ $jadwal->links() }}

          </div>
        </div>
      </div>
    </section><!-- /Starter Section Section -->
    <section id="starter-section" class="starter-section section">
    </section><!-- /Starter Section Section -->
      
@endsection
