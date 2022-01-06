@extends('layout/user/main')
@section('content')
<div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Proyek Tersedia</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/selada.png" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Selada Air</div>
                                    <div class="portfolio-caption-subheading text-muted">Jawara Farm</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Portfolio item 2-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                        </div>
                                        <img class="img-fluid" src="assets/img/pakcoi.jpg" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading">Pakcoy</div>
                                        <div class="portfolio-caption-subheading text-muted">Surabaya Farm</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Portfolio item 3-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                        </div>
                                        <img class="img-fluid" src="assets/img/selada.png" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading">Selada Air</div>
                                        <div class="portfolio-caption-subheading text-muted">Top Hidroponik</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection