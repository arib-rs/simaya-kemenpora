<br><br><br>        <!-- Header top area start-->
        <div class="content-inner-all">

            <!-- Header top area end-->



            <!-- income order visit user Start -->
            
            <!-- income order visit user End -->
            <?php
            for ($i = 1; $i <= 12; $i++) {
                echo "<input id='bulan" . $i . "' type='hidden' value=" . $suratperbulan[$i] . " />";
            }
            for ($i = 0; $i < 7; $i++) {
                if (isset($suratunit[$i]['nama_unit'])) {
                    echo "<input id='unit" . $i . "' type='hidden' value='" . $suratunit[$i]['nama_unit_singkat'] . "' />";
                } else {
                    echo "<input id='unit" . $i . "' type='hidden' value='-' />";
                }
            }
            for ($i = 0; $i < 7; $i++) {
                if (isset($suratunit[$i]['jumlah'])) {
                    echo "<input id='suratunit" . $i . "' type='hidden' value=" . $suratunit[$i]['jumlah'] . " />";
                } else {
                    echo "<input id='suratunit" . $i . "' type='hidden' value='0' />";
                }
            }


            ?>


            <div class="dashtwo-order-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashtwo-order-list shadow-reset">

                                <div class="alert-title">
                                    <h2>Surat Masuk Per Bulan</h2>
                                    <p>Periode
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        echo date('Y');

                                        ?>
                                    </p>
                                </div>
                                <canvas id="myChartsrs"></canvas>




                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="charts-single-pro shadow-reset nt-mg-b-30">
                                <div class="alert-title">
                                    <h2>Jumlah Surat Masuk</h2>
                                    <p>Per Struktur Organisasi</p>
                                </div>
                                <div id="bar4-chart">
                                    <canvas id="barchart4"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="charts-single-pro shadow-reset nt-mg-b-30">
                                <div class="alert-title">
                                    <h2>Rekap Jumlah Surat Per Struktur Organisasi</h2>
                                    <p>Periode
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        echo date('Y');

                                        ?>
                                    </p>
                                </div>
                                <!-- <div id="bar4-chart">
                                    <canvas id="barchart4"></canvas>
                                </div> -->
                                <div class="static-table-list" style="overflow-x:auto;">
                                    <table class="table border-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Struktur Organisasi</th>
                                                <th>Jan</th>
                                                <th>Feb</th>
                                                <th>Mar</th>
                                                <th>Apr</th>
                                                <th>Mei</th>
                                                <th>Jun</th>
                                                <th>Jul</th>
                                                <th>Agu</th>
                                                <th>Sep</th>
                                                <th>Okt</th>
                                                <th>Nov</th>
                                                <th>Des</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($suratunit as $d) {

                                                echo "
                                                <tr>
                                                <td>" . $count . "</td>
                                                <td>" . $d['nama_unit'] . "</td>";

                                                for ($i = 1; $i <= 12; $i++) {
                                                    echo "<td>" . count($this->M_surat->select_JumlahSuratPerUnitPerBulan($i, $d['id'])) . "</td>";
                                                }
                                                $count++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>