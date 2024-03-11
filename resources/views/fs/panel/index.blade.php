@extends('fs.layout.app')

@section('title', 'About')

@section('header-section')
    <header class="masthead" style="background-color: #070F2B">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>My Stats</h1>
                        <span class="subheading">Monitor your progress here</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content-section')
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h3 style="text-decoration: underline; text-underline-offset:13px;">Yearly Post Overview</h3>
                    <div class="my-4">
                        <canvas id="post-chart" class="w-100"></canvas>
                    </div>
                    <ul>
                        <li>Current Month Viewers: <strong>90</strong></li>
                        <li>Current Month Likes: <strong>100</strong></li>
                        <li>Current Month Comments: <strong>30</strong></li>
                        <li>Current Month Reports: <strong>0</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('js')
    <script>
        new Chart(
            document.getElementById('post-chart'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr'],
                    datasets: [
                        {
                            label: 'Viewers',
                            fill: false,
                            data: [20, 98, 15, 0],
                            backgroundColor: '#50C4ED',
                            borderColor: '#50C4ED'
                        },
                        {
                            label: 'Likes',
                            fill: false,
                            data: [10, 74, 10, 0],
                            backgroundColor: '#387ADF',
                            borderColor: '#387ADF'
                        },
                        {
                            label: 'Comments',
                            fill: false,
                            data: [35, 30, 20, 1],
                            backgroundColor: '#333A73',
                            borderColor: '#333A73'
                        },
                        {
                            label: 'Reports',
                            fill: false,
                            data: [85, 28, 30, 0],
                            backgroundColor: '#FBA834',
                            borderColor: '#FBA834'
                        },

                    ]
                }
            }
        );
    </script>
@endpush

