@extends('layout.user.index')
@section('title', 'Dashboard')
@section('content')
<section class="kahfibwa mt-5">
    <div class="container">
        <img src="vendor/images/header-back.jpg" class="img-fluid" alt="GambarHomePage">
    </div>
</section>

<section class="mt-5" id="proyek">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-9 text-center proyek border-bottom">
                <h1>Proyek Pembiayaan yang Tersedia</h1>                    
            </div>
        </div>
        <div  class="row my-5 px-4" >
            <div class="row">
                <!-- Item -->
                @foreach($proposal_investasi as $p)
                @php
                    $jumlah=0;
                    foreach($pembayaran_investasi as $pb){
                        if($p->ID_INVESTASI == $pb->ID_INVESTASI){                                            
                            $jumlah=$jumlah+($pb->JUMLAHPEMBAYARAN);
                        }
                    }
                @endphp
                @if($jumlah != $p->JUMLAHKEBUTUHAN)
                <div class="col-md-4 mb-5">
                    
                        <div class="bg-white rounded shadow">
                            <a href="/applyInvestasi/{{$p->ID_INVESTASI}}" data-toggle="lightbox">
                                <img src="{{asset($p->PATH)}}" alt="" class="img-fluid card-img-top galeri px-2 py-2">                    
                            </a>
                            <div class="p-4">
                                <!-- Jika Ingin Menambah Judul dan Caption Gambar -->
                                <!-- Direct Ke halaman Detail Investasi -->
                                <a href="/applyInvestasi/{{$p->ID_INVESTASI}}">
                                    <h5 class="cl-hijau">{{$p->NAMA_PROYEK}}</h5>
                                </a>
                                <p class="small text-muted mb-2">Dana yang Dibutuhkan :</p>
                                <h5 class="text-black border-bottom pb-2">Rp. {{number_format($p->JUMLAHKEBUTUHAN)}}</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-black mb-0">Jenis Investasi</p>
                                        <p class="cl-hijau">{{$p->JENISINVESTASI}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-black mb-0">Estimasi Profit</p>
                                        <p class="cl-hijau">{{$p->PERSENTASEPROFIT}} %</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-black mb-0">Periode Kontrak</p>
                                        <p class="cl-hijau">{{$p->PERIODEKONTRAK}} Bulan</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="text-black" style="font-size: 16px !important">Dana Terkumpul :</h5>
                                    </div>
                                    @php
                                        $jumlah=0;
                                        $dana=0;
                                        foreach($pembayaran_investasi as $pb){
                                            if($p->ID_INVESTASI == $pb->ID_INVESTASI){                                            
                                                $jumlah=$jumlah+($pb->JUMLAHPEMBAYARAN);
                                            }
                                            $dana=($jumlah/$p->JUMLAHKEBUTUHAN)*100;
                                        }
                                    @endphp
                                    <div class="col-6">
                                        <p class="cl-hijau text-right mb-0">{{$dana}}/100%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endif
                @endforeach
            </div>    
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection 
    