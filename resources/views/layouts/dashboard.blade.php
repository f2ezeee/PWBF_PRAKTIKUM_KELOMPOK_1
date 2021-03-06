@extends('layouts.index')

@section('main')

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index" class="logo d-flex align-items-center">
        {{-- <img src="/img/dashboard/logo.png" alt=""> --}}
        <span class="d-none d-lg-block">TPQ Nurul Fajar</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">
          @php
              $fullname = auth()->user()->nama ?: auth()->user()->namasantri;
              $pieces = explode(" ", $fullname);
              if (count($pieces) > 1) {
                $first = $pieces[0];
                $last = $pieces[1][0] . '.';
                $fullname = $first . " " . $last;
              } else
                $fullname = $pieces[0];
          @endphp

          <a class="nav-link nav-profile d-flex align-items-center pe-0" role="button" data-bs-toggle="dropdown">
            <img src="{{ auth()->user()->profile_pic ?: "/img/dashboard/profile-img-" . auth()->user()->gender . ".jpg"}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ $fullname }}</span>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Login as:</h6>
              <span>{{ auth()->user()->has_role ?: auth()->user()->detailperan()->first()
                ->peran()->first()->peran }}
              </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/dashboard/profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="/profile">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> --}}

            <li>
              <a class="dropdown-item d-flex align-items-center" role="button" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                <i class="bi bi-key"></i>
                <span>Change Password</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" role="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @cannot('isSantri')
        
      {{-- <li class="nav-item">
        <a class="nav-link{{ request()->is('dashboard') ? '' : ' collapsed' }}" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav --> --}}

      <li class="nav-item">
        <a class="nav-link{{ request()->is('dashboard/pengurus') ? '' : ' collapsed' }}" href="/dashboard/pengurus">
          <i class="bi bi-people"></i>
          <span>Pengurus</span>
        </a>
      </li><!-- End Pengurus Nav -->

      <li class="nav-item">
        <a class="nav-link{{ request()->is('dashboard/santri') ? '' : ' collapsed' }}" href="/dashboard/santri">
          <i class="bi bi-people"></i>
          <span>Santri</span>
        </a>
      </li><!-- End Santri Nav -->

      <li class="nav-item">
        <a class="nav-link{{ request()->is('dashboard/buku') ? '' : ' collapsed' }}" href="/dashboard/buku">
          <i class="bi bi-journal-bookmark"></i>          
          <span>Buku</span>
        </a>
      </li><!-- End Kemajuan Nav -->

      <li class="nav-item">
        <a class="nav-link{{ request()->is('dashboard/buku/*') ? '' : ' collapsed' }}" id="daftarBukuList" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book"></i>Daftar Buku</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content listBuku collapse {{ request()->is('dashboard/buku/*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        </ul>
      </li><!-- End Icons Nav -->

      @endcannot

      <li class="nav-item">
        <a class="nav-link{{ request()->is('dashboard/kemajuan') ? '' : ' collapsed' }}" href="/dashboard/kemajuan">
          <i class="bi bi-bar-chart-line"></i>
          <span>Kemajuan</span>
        </a>
      </li><!-- End Kemajuan Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav --> --}}

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link{{ request()->is('dashboard/profile') ? '' : ' collapsed' }}" href="/dashboard/profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield('container')
    <!-- Sign Out Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirmation Dialog</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah anda yakin untuk Sign Out?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="window.location.href='/logout'">Sign Out</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Change Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="profile/password" method="post" id="change-password">
              @csrf
              <div class="col-12">
                <label for="yourName" class="form-label">Password Lama</label>
                <input type="password" name="password" class="form-control" required>
                <div class="invalid-feedback">Mohon input password lama</div>
              </div>
          
              <div class="col-12">
                <label for="yourEmail" class="form-label">Password Baru</label>
                <input type="password" name="new_password" class="form-control" required>
                <div class="invalid-feedback">Mohon input password baru</div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="submitForm()">Change</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
    </div>
  </footer><!-- End Footer -->

@endsection

@section('scripts')
    <script>
      var url = '/dashboard/buku/'
      $.ajax({
          url: '/dashboard/buku/list',
          type: 'get',
          success: function(data){
            var out = ""
            var active = ""
            $.each(data, function(key, obj){
              if (window.location.pathname == url+obj['idbuku'])
                active = "class='active'"
              else
              active = ''
              var id = obj['idbuku']
              var nama = obj['buku']
              out += "\
              <li> \
                <a "+ active +" href=\'/dashboard/buku/"+id+"\'> \
                  <i class='bi bi-circle'></i><span>"+nama+"</span> \
                </a> \
              </li>"
            })
            $('.listBuku').html(out)
          }
      });

      function submitForm() {
        $("#change-password").submit()
      }
    </script>
@endsection

  