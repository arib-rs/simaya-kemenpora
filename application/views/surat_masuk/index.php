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
                                        <h1>Surat Masuk</h1>

                                    </div>
                                </div>

                                <div class="sparkline13-graph ">
                                    <div class="row" style="text-align:left;">
                                        <div class="col-lg-12">

                                            <?php if ($this->session->flashdata('flash')) {
                                                echo $this->session->flashdata('flash');
                                            }  ?>
                                        </div>
                                    </div>
                                    <div class="datatable-dashv1-list custom-datatable-overright animated zoomIn">

                                        <div id="toolbar">
                                            <span class="label label-warning">Belum Baca (<?= $jumlah_belum_terbaca ?>)</span>
                                            <span class="label label-primary">Terbaca (<?= $jumlah_terbaca ?>)</span>
                                            <span class="label label-success">Sudah Disposisi (<?= $jumlah_disposisi ?>)</span>
                                            <span class="label label-default">Semua (<?= $jumlah_surat ?>)</span>

                                        </div>
                                        <table id="table"  data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-show-export="true" data-show-columns="true">
                                            
                                            <thead>
                                                <tr>
                                                    <th data-sortable="true">No</th>
                                                    <th data-sortable="true">No Agenda</th>
													<th data-sortable="true">No Agenda TU</th>
                                                    <th data-sortable="true">Tanggal Penerimaan</th>
                                                    <th data-sortable="true">Nomor Surat</th>
                                                    <th data-sortable="true">Jenis Surat</th>
                                                    <th data-sortable="true">Pengirim</th>
                                                    <th data-sortable="true">Perihal</th>
                                                    <th data-sortable="true">Status Surat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($data as $d) {
													$this->db->select('*');
													$this->db->from('tb_disposisi');
													$this->db->where("id_surat=".$d['id']." AND statusjawaban='Selesai'");
													$num_results = $this->db->count_all_results();
													
                                                    if ($this->session->userdata('grup') > 0 && $this->session->userdata('grup') <= 4) {
                                                        echo "<tr>";

                                                        echo "<td>" . $no . "</td>";
                                                        echo "<td>" . $d['no_agenda'] . "</td>";
														echo "<td>" . $d['no_agenda_disposisi'] . "</td>";

                                                        echo "<td>" . date("d-m-Y", strtotime($d["tgl_terima_surat"]))  . "</td>";

                                                        echo "<td>" . $d['no_surat'] . "</td>";

                                                        echo "<td>" . $d['jenis_surat'] . "</td>";
                                                        echo "<td>" . $d['pengirim'] . "</td>";

                                                        echo "<td>" . $d['perihal'] . "</td>";
                                                        echo "<td>
                                                    
                                                    <a href='" .  base_url('Surat_masuk/detail/') . $d['id'] . "'>
                                                    <span class='label label-primary'><i class='fa big-icon fa-eye'></i> Detail Surat</span>
                                                    </a>";
                                                        if ($d['diterima'] == 0) {
                                                            echo "
                                                                <a href='#' onclick='approve(" . $d['id'] . ")' data-toggle='modal' data-target='#PrimaryModalalert2'>
                                                                <span class='label label-info'><i class='fa big-icon fa-check'></i> Approve</span>
                                                                </a>";
                                                        } else {
                                                            echo "<span style='margin-right:4px' class='label label-success'><i class='fa big-icon fa-check'></i> Approved</span>";
                                                        }
                                                        if ($d['terbaca'] == 0) {
                                                            echo "<span  class='label label-warning'>Belum Dibaca</span>";
                                                        } else {
                                                            echo "<span  class='label label-success'>Sudah Dibaca</span>";
                                                        }
                                                        if ($d['disposisi'] == 0) {
                                                            echo "<span style='margin-left:4px' class='label label-default'>Belum Disposisi</span>";
                                                        } else {
                                                            echo "<span style='margin-left:4px' class='label label-success'>Sudah Disposisi</span>";
                                                        }
														if ($num_results == 0) {
															echo "<a href=''><span  style='margin-left:4px' class='label label-warning'>Proses</span></a>";
														} else {
															echo "<a href=''><span  style='margin-left:4px' class='label label-success'>Selesai</span></a>";
														}
														
															
															
                                                        echo "</td></tr>";
                                                        $no++;
                                                    } else {
                                                        if ($d['penerima'] == $this->session->userdata('id')) {
                                                            echo "<tr>";

                                                            echo "<td>" . $no . "</td>";
                                                            echo "<td>" . $d['no_agenda'] . "</td>";
															echo "<td>" . $d['no_agenda_disposisi'] . "</td>";
                                                            echo "<td>" . date("d-m-Y", strtotime($d["tgl_terima_surat"]))  . "</td>";

                                                            echo "<td>" . $d['no_surat'] . "</td>";

                                                            echo "<td>" . $d['jenis_surat'] . "</td>";
                                                            echo "<td>" . $d['pengirim'] . "</td>";

                                                            echo "<td>" . $d['perihal'] . "</td>";
                                                            echo "<td>
                                                    
                                                    <a href='" .  base_url('Surat_masuk/detail/') . $d['id'] . "'>
                                                    <span class='label label-primary'><i class='fa big-icon fa-eye'></i> Detail Surat</span>
                                                    </a>";

                                                            if ($d['terbaca'] == 0) {
                                                                echo "<span class='label label-warning'>Belum Dibaca</span>";
                                                            } else {
                                                                echo "<span class='label label-success'>Sudah Dibaca</span>";
                                                            }
                                                            if ($d['disposisi'] == 0) {
                                                                echo "<span style='margin-left:4px' class='label label-default'>Belum Disposisi</span>";
                                                            } else {
                                                                echo "<span style='margin-left:4px' class='label label-success'>Sudah Disposisi</span>";
                                                            }
															if ($num_results == 0) {
																echo "<a href=''><span  style='margin-left:4px' class='label label-warning'>Proses</span></a>";
															} else {
																echo "<a href=''><span  style='margin-left:4px' class='label label-success'>Selesai</span></a>";
															}
                                                            echo "</td></tr>";
                                                            $no++;
                                                        }
                                                    }
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


        <div id="PrimaryModalalert2" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                    <form id="adminpro-order-form" class="adminpro-form" method="POST" enctype="multipart/form-data" action="<?= base_url('Surat_masuk/approve_surat') ?>">

                        <div class="modal-body" style="text-align:left;">
                            <h2></h2>
                            <?php if ($this->session->flashdata('flash')) {
                                echo $this->session->flashdata('flash');
                            }  ?>
                            <div class="row">

                                <div class="col-lg-5">
                                    <div class="login-input-head">
                                        <p>No Agenda TU </p>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="login-input-area ">
                                        <input class="col-lg-10" type="text" name="no_agenda_disposisi" />

                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="id_surat" name="id_surat" value="" />

                        </div>
                        <div class="modal-footer">
                            <div class="login-button-pro" style="text-align:center;padding:0 0 20px 0;">


                                <button type="submit" class="login-button login-button-lg">Approve</button>
                                <!-- <button data-dismiss="modal" class="login-button login-button-lg">Batal</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>