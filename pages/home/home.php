<?php include_once "../inc/sidebar.php"; ?>
<?php include_once "../inc/header.php"; ?>
<?php include_once "../inc/_database.php"; ?>


<div class="container-fluid py-4" id="">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Umana'</p>
                                <h5 class="font-weight-bolder ms-3  h2">
                                    <?php
                                    $db = __database();
                                    $ambil = __ambil($db, "tb_umana");
                                    echo $jumlahUmana = mysqli_num_rows($ambil);
                                    ?>
                                    <span class="text-primary h4 font-weight-bolder">Orang</span>
                                </h5>
                                <p class="mb-0">
                                    <span class=" h2 font-weight-bolder"></span>

                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Umana' Aktif</p>
                                <h5 class="font-weight-bolder h2">
                                    <?php
                                    $where = [
                                        'kd_status' => '1'
                                    ];
                                    $ambil = __ambil($db, "tb_umana", '*', $where);
                                    echo $jumlahAktif = mysqli_num_rows($ambil);
                                    ?>
                                    <span class="text-success h4 font-weight-bolder">Orang</span>
                                </h5>

                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Umana' Tidak Aktif</p>
                                <h5 class="font-weight-bolder h2">
                                    <?php
                                    $where = [
                                        'kd_status' => '0'
                                    ];
                                    $ambil = __ambil($db, "tb_umana", '*', $where);
                                    echo $jumlahAktif = mysqli_num_rows($ambil);
                                    ?>
                                    <span class="text-danger h4 font-weight-bolder">Orang</span>
                                </h5>

                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Instansi</p>
                                <h5 class="font-weight-bolder h2">
                                    <?php

                                    $ambil = __ambil($db, "tb_instansi");
                                    echo $jumlahAktif = mysqli_num_rows($ambil);
                                    ?>
                                    <span class="text-success h4 font-weight-bolder">Instansi</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Grafik Kehadiran</h6>

                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
            <script>
                var chartData = {
                    labels: ["January", "February", "March", "April", "May", "June"],
                    datasets: [{
                        fillColor: "#79D1CF",
                        strokeColor: "#79D1CF",
                        data: [60, 80, 81, 56, 55, 40]
                    }]
                };

                var ctx = document.getElementById("#chart-line").getContext("2d");
                var myLine = new Chart(ctx).Line(chartData, {
                    showTooltips: false,
                    onAnimationComplete: function() {

                        var ctx = this.chart.ctx;
                        ctx.font = this.scale.font;
                        ctx.fillStyle = this.scale.textColor
                        ctx.textAlign = "center";
                        ctx.textBaseline = "bottom";

                        this.datasets.forEach(function(dataset) {
                            dataset.points.forEach(function(points) {
                                ctx.fillText(points.value, points.x, points.y - 10);
                            });
                        })
                    }
                });
            </script>

        </div>
        <div class="col-lg-5">
            <div class="card card-carousel overflow-hidden h-100 p-0">
                <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner border-radius-lg h-100">
                        <div class="carousel-item h-100 active" style="background-image: url('../../assets/img/sukorejo.jpg');background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                    <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                </div>
                                <h5 class="text-white mb-1">"Mondhuk Entar Ngabdhi ben Ngajhi"</h5>
                                <p>KHR. Syamsul Arifin</p>
                            </div>
                        </div>
                        <div class="carousel-item h-100" style="background-image: url('../../assets/img/sukorejo3.jpg');background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                    <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                                </div>
                                <h5 class="text-white mb-1">"Kalau tidak mau repot jangan berjuang, karena perjuangan selalu membutuhkan pengorbanan"</h5>
                                <p>KHR. As'ad Syamsul Arifin</p>
                            </div>
                        </div>
                        <div class="carousel-item h-100" style="background-image: url('../../assets/img/sukorejo2.jpg');background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                    <i class="ni ni-trophy text-dark opacity-10"></i>
                                </div>
                                <h5 class="text-white mb-1">Perjuangan dan pengabdian harus dijunjung tinggi oleh kader Salafiyah Syafi'iyah</h5>
                                <p>KHR. Ach. Fawa'id As'ad.</p>
                            </div>
                        </div>
                        <div class="carousel-item h-100" style="background-image: url('../../assets/img/sukorejo1.jpg');background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                    <i class="ni ni-trophy text-dark opacity-10"></i>
                                </div>
                                <h5 class="text-white mb-1">"Belajaralah menghargai orang lain! dan belajarlah membalas hinaan dengan senyum manis!"</h5>
                                <p>KHR. Ahmad Azaim Ibrahimy</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
    </div>
</div>
<?php include "../inc/footer.php"; ?>