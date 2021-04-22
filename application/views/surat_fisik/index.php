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
                                        <h1>Surat Fisik</h1>

                                    </div>
                                </div>
                                <div class="sparkline13-graph ">
                                    <div class="datatable-dashv1-list custom-datatable-overright animated zoomIn">
                                        <div id="toolbar">
                                            <span class="label label-warning">Belum Baca (0)</span>
                                            <span class="label label-success">Terbaca (0)</span>
                                            <span class="label label-default">Semua (<?= $jumlah_surat ?>)</span>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">

                                                <?php if ($this->session->flashdata('flash')) {
                                                    echo $this->session->flashdata('flash');
                                                }  ?>
                                            </div>
                                        </div>
                                        <table id="table"  data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-show-export="true" data-show-columns="true">
                                            <thead>
                                                <tr>
                                                    <th data-sortable="true" data-field="no">No</th>
                                                    <th data-sortable="true" data-field="no_surat">No Surat</th>
                                                    <th data-sortable="true" data-field="no_agenda">No Agenda</th>
                                                    <th data-sortable="true" data-field="tgl_surat">Tanggal Surat</th>
                                                    <th data-sortable="true" data-field="keterangan">Keterangan</th>
                                                    <th data-sortable="true" data-field="penerima">Penerima</th>
                                                    <th data-sortable="true" data-field="registrator">Registrator</th>
                                                    <th data-sortable="true" data-field="*">*</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($data as $d) {
                                                    echo "<tr >";

                                                    echo "<td>" . $no . "</td>";
                                                    echo "<td>" . $d['no_surat'] . "</td>";

                                                    echo "<td>" . $d['no_agenda'] . "</td>";

                                                    echo "<td>" . date("d-m-Y", strtotime($d["tgl_surat"])) . "</td>";

                                                    echo "<td>" . $d['keterangan'] . "</td>";

                                                    echo "<td>" . $d['nama_penerima'] . "</td>";
                                                    echo "<td>" . $d['registrator'] . "</td>";
                                                    echo "<td>
                                                    
                                                    <a href='" .  base_url('Surat_fisik/cetak_tandaterima/') . $d['id'] . "'>
                                                    <span class='label label-info'><i class='fa big-icon fa-print'></i> Cetak Tanda Terima</span>
                                                    </a>
                                                    <a href='" .  base_url('Surat_masuk/detail/') . $d['id'] . "'>
                                                    <span class='label label-primary'><i class='fa big-icon fa-eye'></i> Detail</span>
                                                    </a>
                                                    <a href='" .  base_url('Surat_fisik/edit/') . $d['id'] . "'>
                                                    <span class='label label-warning'><i class='fa big-icon fa-pencil-square-o'></i> Ubah</span>
                                                    </a>
                                                    <a href='" .  base_url('Surat_fisik/del/') . $d['id'] . "'  onclick=\"return confirm('Apakah anda yakin ingin menghapus ?');\">
                                                    <span class='label label-danger'><i class='fa big-icon fa-trash'></i> Hapus</span>
                                                    </a>
                                                   </td>";
                                                    echo "</tr>";
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