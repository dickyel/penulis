@extends('layouts.admin')

@section('title')
    Penulis Dashboard Admin
@endsection

@push('prepend-style')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> 
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')

<!-- Section Content -->
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
                    <h2 class="content-title">Kategori</h2>
                    <h5 class="content-desc mb-4">Daftar Kategori Di semua websitemu</h5>
                    
                    <div class="card" >
                    
                        <div class="card-body">
                            <a href="{{ route('category.create') }}" class="btn btn-primary" style="width: 200px; margin-bottom: 6px;">
                            + Tambah Kategori
                            </a>
                           
                            
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100 table-bordered" id="crudTable">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th>
                                            <a href="{{ route('category.index', ['sort' => $sortOrder === 'oldest' ? 'latest' : 'oldest']) }}">
                                                Sort by {{ $sortOrder === 'oldest' ? 'Latest' : 'Oldest' }}
                                            </a>
                                        </th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        
                                        <th>Slug</th>

                                        <th>Aksi</th>
                                        <th>Craeted</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $key => $category )
                                    <tr style="text-align: center;">
                                        <td></td>
                                        <td>{{ $key + 1 }}</td>
                                        
                                        <td>{{ $category->categories_name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td style="text-align: center;">
                                            <div class="d-flex">
                                                <a class="btn btn-primary" href="{{ route('category.edit', $category->id) }}">
                                                    Edit
                                                </a>
                                                <span>
                                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </span>
                                            </div>
                                            <td>{{ $category->created_at }}</td>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $categories->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>  
                </div>
                
            </div>
        </div>
    </div>
@endsection


@push('addon-script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
@endpush
