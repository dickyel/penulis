@extends('layouts.admin')

@section('title')
   Edit Kategori
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

        <div class="d-flex justify-content-between align-items-center nav-input-container">
            <div class="nav-input-group">
                <input type="text" class="nav-input" placeholder="Search people, team, project">
                <button class="btn-nav-input"><img src="./assets/img/global/search.svg" alt=""></button>
            </div>

        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12">
            
                @if($errors->any())
                
                    <div class="alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>    
                    </div>
                
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('galery.update', $galery->id) }}" method="POST" 
                        enctype="multipart/form-data"
                        >
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tambahkan  Foto</label>
                                        <input type="file" name="photos" class="form-control" " required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="form-group">
                                            <label>Ganti Konten</label>
                                            <select name="id_contents" class="form-control">
                                                @foreach ($contents as $content)
                                                <option value="{{ $content->id }}">{{ $content->title }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-primary px-5" style="margin-top: 10px;">
                                        Simpan Sekarang
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection