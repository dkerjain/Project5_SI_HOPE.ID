<section>
    <nav class="navbar py-3 navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img width="150" src="vendor/images/logo_hope.png" alt="" class="">
            </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              @if(\Session::has('login'))
                  @if((\Session::has('customer')) || (\Session::has('umum')))
                  <li class="nav-item d-flex justify-content-center navigasi">
                    <a class="nav-link" href="/">Lihat Proyek</a>
                  </li>     
                  @endif 
                  
                  @if(\Session::has('petani'))
                  <li class="nav-item d-flex justify-content-center navigasi">
                    <a class="nav-link" href="/kelolaProyek">Kelola Proyek</a>
                  </li>  

                      <li class="nav-item d-flex justify-content-center navigasi">
                        <a class="nav-link" href="/applyProposal">Ajukan Portofolio</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item d-flex justify-content-center navigasi">
                    <a class="nav-link" href="/">Lihat Proyek</a>
                  </li>     
              @endif
              <li class="nav-item d-flex justify-content-center navigasi">
                <a class="nav-link" href="#about">Tentang Kami</a>
              </li>          

              @if(\Session::has('login'))
                <li class="nav-item dropdown d-flex justify-content-center navigasi">  
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Akun Saya
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @if((\Session::has('customer')) || (\Session::has('umum')))
                      <a class="dropdown-item" href="/daftarcustomer">Profil Investor</a>
                      <div class="dropdown-divider"></div>
                      
                      <a class="dropdown-item" href="/lengkapidokumen">Lengkapi Dokumen</a>
                      <div class="dropdown-divider"></div>
                      
                      <a class="dropdown-item" href="/inforekeningcustomer">Informasi Rekening</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/riwayatInvestasi">Riwayat Investasi</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/toPetani">Menjadi Petani Mitra</a>                      
                      @endif
                      
                      @if(\Session::has('petani'))
                      <a class="dropdown-item" href="/daftarpetani">Profil Petani Mitra</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/qrcode">Download QRCode</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/dokumen">Lengkapi Dokumen Petani</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/inforekeningpetani">Informasi Rekening</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/riwayatPengajuan">Riwayat Pengajuan</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/toInvestor">Menjadi Investor</a>
                      @endif
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">Keluar</a>
                  </div>
                </li>
              @endif
              @if(!\Session::has('login'))
              <li class="nav-item d-flex justify-content-center mx-2">
                <a class="nav-link bg-hijau rounded px-3" href="/login">Masuk</a>
              </li>                
              <li class="nav-item d-flex justify-content-center navigasi">
                <a class="nav-link" href="/register">Daftar</a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
</section>