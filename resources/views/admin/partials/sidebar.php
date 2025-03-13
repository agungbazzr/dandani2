
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
      <img src="{{ asset('svg/icon_al.jpeg') }}" alt="DANDANI" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DANDANI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="DANDANI">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a id="side_admin" href="home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a id="side_alamat" href="{{ route('alamat.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Data Alamat
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a id="side_bank" href="{{ route('bank.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Data Bank
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a id="side_jadwal" href="{{ route('jadwal.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Data Jadwal
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a id="side_jasa" href="{{ route('jasa.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Data Jasa
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a id="side_keahlian" href="{{ route('keahlian.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Data Keahlian
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a id="side_pelanggan" href="{{ route('pelanggan.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Data Pelanggan
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a id="side_pemesanan" href="{{ route('pemesanan.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Data Pemesanan
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a id="side_tukang" href="{{ route('tukang.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Data Tukang
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>