        <!-- Header top area start -->
        <div class="content-inner-all">

            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset animated fadeIn ">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Disposisi Keluar</h1>

                                    </div>
                                </div>
                                <div class="sparkline13-graph ">
                                    <div class="datatable-dashv1-list custom-datatable-overright animated zoomIn">
                                        <div id="toolbar">
                                          <!--  <span class="label label-warning">Belum Baca (<?= $jumlah_belum_terbaca ?>)</span> 
                                            <span class="label label-primary">Terbaca (<?= $jumlah_terbaca ?>)</span>
                                            <span class="label label-danger">Ditolak (<?= $jumlah_ditolak ?>)</span>
                                            <span class="label label-default">Semua (<?= $jumlah_disposisi ?>)</span> -->

                                        </div>
                                        <table id="table"  data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-show-export="true" data-show-columns="true">
                                            <thead>
                                                <tr>
                                                    <th data-sortable="true" data-field="no">No</th>
                                                    <th data-sortable="true" data-field="no_agenda">No Agenda</th>
                                                    <th data-sortable="true" data-field="urgensi">Kecepatan Penyampaian</th>
                                                    <th data-sortable="true" data-field="sifat_disposisi">Tingkat Keamanan</th>
                                                    <th data-sortable="true" data-field="tgl_disposisi">Tanggal Disposisi</th>
                                                    <th data-sortable="true" data-field="pengirim">Penerima Disposisi</th>
                                                    <th data-sortable="true" data-field="no_surat">Nomor Surat</th>
                                                    <th data-sortable="true" data-field="perihal">Perihal</th>
                                                    <th data-sortable="true" data-field="*">*</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($data as $d) {
                                                    echo "<tr>";
                                                    echo "<td>" . $no . "</td>";
                                                    echo "<td>" . $d['no_agenda_disposisi'] . "</td>";

                                                    echo "<td>" . $d['urgensi'] . "</td>";

                                                    echo "<td>" . $d['sifat_disposisi'] . "</td>";

                                                    echo "<td>" .  date("d-m-Y", strtotime($d['tgl_disposisi'])) . "</td>";
                                                    echo "<td>" . $d['nama_lengkap'] . "</td>";
                                                    echo "<td>" . $d['no_surat'] . "</td>";
                                                    echo "<td>" . $d['perihal'] . "</td>";
                                                    echo "<td><a href='" . base_url('Disposisi_keluar/detail/') . $d['id_disposisi'] . "'><span class='label label-primary'><i class='fa big-icon fa-eye'></i> Detail Disposisi</i></span>
                                                    </a> 
                                                      <a href='" .  base_url('Disposisi_keluar/del/') . $d['id_disposisi'] . "'  onclick=\"return confirm('Apakah anda yakin ingin menghapus ?');\">
                                                    <span class='label label-danger'><i class='fa big-icon fa-trash'></i> Hapus</span>
                                                    </a>
                                                    ";


                                                    if ($d['terbaca'] == 0) {
                                                        echo "<span  class='label label-warning'>Belum Dibaca</span>";
                                                    } else {
                                                        echo "<span  class='label label-success'>Sudah Dibaca</span>";
                                                    }
                                                    if ($d['ditolak'] == 0) { } else {
                                                        echo "<span style='margin-left:4px' class='label label-danger'>Ditolak</span>";
                                                    }
													if ($d['statusjawaban'] == "Proses") {
                                                        echo "<a href='" . base_url('Disposisi_masuk/detail/') . $d['id_disposisi'] . "'><span  style='margin-left:4px' class='label label-warning'>Proses</span></a>";
                                                    } else {
                                                        echo "<a href='" . base_url('Disposisi_masuk/detail/') . $d['id_disposisi'] . "'><span  style='margin-left:4px' class='label label-success'>Selesai</span></a>";
                                                    }

                                                    echo "</td></tr>";
                                                    $no++;
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
            <!-- Static Table End -->

        </div>