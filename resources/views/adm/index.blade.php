@extends('adm.layout.master')

@section('title', 'Beranda')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Product Counter Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="#">0</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Counter Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Portofolio</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="#">0</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Article Counter Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Artikel
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <a href="#">0</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Counter Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="#">0</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Daily Visitor Counter Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Pengunjung Harian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="#">0</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Visitor Counter Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Pengunjung Bulanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="#">0</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Yearly Visitor Counter Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Pengunjung Tahunan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="#">0</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row d-flex align-items-stretch">

        <!-- Alert -->
        <div class="col-xl-4 h-100">
            <div class="card shadow mb-4 h-100">
                <div class="h-100">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Selamat Datang , Di
                            Dashboard Pustaka Tungga
                        </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <p>
                            Pustaka Tungga adalah wadah ilmu dan pengetahuan yang berkomitmen untuk menyediakan akses yang
                            mudah
                            dan efisien terhadap berbagai sumber literatur. Dashboard admin ini hadir sebagai alat yang
                            memungkinkan pengelolaan dan pemantauan operasional Pustaka Tungga dengan lebih baik.
                        </p>
                        <div class="d-flex flex-column" style="gap: 7.5px">
                            <a href="#" class="btn btn-success">
                                Lihat Produk Pustaka Tungga
                            </a>
                            <a href="#" class="btn btn-primary">
                                Lihat Data Pelanggan Pustaka Tungga
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visitor Counter Bar Chart -->
        <div class="col-xl-8 h-100">
            <div class="card shadow mb-4 h-100">
                <div class="h-100">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Pengunjung Website</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        {{-- <canvas id="visitor-chart" class="w-100"></canvas> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Chartjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script>
        new Chart(
            document.getElementById('visitor-chart'), {
                type: 'bar',
                data: {
                    labels: data.map(row => row.month),
                    datasets: [{
                        label: 'Grafik Pengunjung Tahunan',
                        data: data.map(row => row.count)
                    }]
                }
            }
        );
    </script> --}}
@endpush
