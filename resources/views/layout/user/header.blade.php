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
              <!-- <li class="nav-item active">
                <a class="nav-link d-flex justify-content-center" href="#">Home <span class="sr-only">(current)</span></a>
              </li> -->
              <li class="nav-item d-flex justify-content-center navigasi">
                <a class="nav-link" href="#">Lihat Proyek</a>
              </li>             

                  <li class="nav-item d-flex justify-content-center navigasi">
                    <a class="nav-link" href="#">Ajukan Portofolio</a>
                  </li>

              <li class="nav-item d-flex justify-content-center navigasi">
                <a class="nav-link" href="#">Cara Kerja</a>
              </li>            
              
              <li class="nav-item d-flex justify-content-center navigasi">
                <a class="nav-link" href="#">Tentang Kami</a>
              </li>          

              @if(auth()->user())
                <li class="nav-item dropdown d-flex justify-content-center navigasi">  
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Akun Saya
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(auth()->user()->ROLE == 'customer')
                      <a class="dropdown-item" href="/daftarcustomer">Profil Investor</a>
                      <div class="dropdown-divider"></div>
                      
                      <a class="dropdown-item" href="/lengkapidokumen">Lengkapi Dokumen</a>
                      <div class="dropdown-divider"></div>
                      
                      <a class="dropdown-item" href="/inforekeningcustomer">Informasi Rekening</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/daftarpetani">Menjadi Petani Mitra</a>

                    @else(auth()->user()->ROLE == 'mix')                   
                      <a class="dropdown-item" href="/daftarcustomer">Profil Investor</a>
                      <div class="dropdown-divider"></div>                      
                      <a class="dropdown-item" href="/lengkapidokumen">Lengkapi Dokumen Investor</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/daftarpetani">Profil Petani Mitra</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/lengkapidokumen">Lengkapi Dokumen Petani</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/inforekeningpetani">Informasi Rekening</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/dashboard">Menjadi investor</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">Keluar</a>
                  </div>
                </li>
              @endif
              @if(!auth()->user())
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