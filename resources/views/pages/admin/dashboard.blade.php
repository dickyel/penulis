@extends('layouts.admin')

@section('title')
    Admin Dashboard Penulis
@endsection

@section('content')
    <div class="col-12 col-xl-9">
        <div class="nav">
            <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                <div class="d-flex justify-content-start align-items-center">
                    <button id="toggle-navbar" onclick="toggleNavbar()">
                        <img src="./assets/img/global/burger.svg" class="mb-2" alt="">
                    </button>
                    <h2 class="nav-title">Selamat Datang, Admin</h2>
                </div>
                <button class="btn-notif d-block d-md-none"><img src="./assets/img/global/bell.svg" alt=""></button>
            </div>

            <div class="d-flex  nav-input-container">
                
                <form class="nav-input-group" method="GET" action="/admin/content/">
                       
                       <input type="text" class="nav-input" placeholder="Search content berdasarkan keyword" value="{{ request('keyword') }}">
                       <span><button type="submit" class="btn btn-primary mb-1">Cari</button></span>
                   </div>
               </form>
                    
                </div>

            </div>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-12">
                    <h2 class="content-title">Statistik</h2>
                    <h5 class="content-desc mb-4">Jumlah Pengunjung Di Website mu hari ini</h5>
                </div>

                <div class="col-8 col-md-6 col-lg-4">
                    <div class="statistics-card">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h5 class="content-desc">Jumlah Kategori</h5>
                                <h3 class="statistics-value">132</h3>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="statistics-card">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h5 class="content-desc">Jumlah Kontent</h5>

                                <h3 class="statistics-value">122,000</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection