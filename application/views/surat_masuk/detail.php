        <!-- Header top area start -->
        <div class="content-inner-all">
            <div class="project-details-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline13-list shadow-reset ">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1><span class="profile-details-name-nn">Surat Nomor</span> <strong><?= $data[0]['no_surat'] ?></strong>
                                            <?php
                                            //if ($data[0]['penerima'] == $this->session->userdata('id') || $this->session->userdata('grup') < 3) {
                                                if ($data[0]['penerima'] == $this->session->userdata('id') || $this->session->userdata('grup') == 4) {
                                                    echo "
                                                    <a class='pull-right' style='margin-top:-5px' href='" . base_url('Surat_masuk/form_disposisi/' . $data[0]['id']) . "'>
                                                    <div class='project-details-title btn btn-primary'>
                                                        <span><i class=' fa fa-file'></i></span><span> Buat Disposisi</span>
                                                    </div>
                                                    </a>";
                                                    echo "
                                                    <a class='pull-right' style='margin-top:-5px; margin-right:4px' href='" . base_url('Surat_masuk/form_tindaklanjut/' . $data[0]['id']) . "'>
                                                    <div class='project-details-title btn btn-primary'>
                                                        <span><i class=' fa fa-file'></i></span><span> Tindak Lanjut</span>
                                                    </div>
                                                    </a>";
                                                }
                                            // if ($data[0]['disposisi'] == 0) { } else {
                                            //     echo "
                                            //     <a class='pull-right' style='margin-top:-5px; margin-right:10px; margin-left:10px;' href='" . base_url('Surat_masuk/detail_disposisi/' . $data[0]['id']) . "'>
                                            //     <div class='project-details-title btn btn-success'>
                                            //         <span><i class=' fa fa-eye'></i></span><span> Detail Disposisi</span>
                                            //     </div>
                                            //     </a>";
                                            // }
                                            ?>

                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="project-details-wrap shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Tanggal Terima Surat</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= date("d-m-Y", strtotime($data[0]['tgl_terima_surat'])) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Jenis Surat</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $data[0]['jenis_surat'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Pengirim</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $data[0]['pengirim'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Tujuan</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $data[0]['nama_penerima'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Kecepatan Penyampaian</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        : <span class='label label-primary'><?= $data[0]['urgensi'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Sifat Surat</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        : <span class='label label-primary'><?= $data[0]['sifat_surat'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Perihal</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $data[0]['perihal'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Keterangan</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $data[0]['keterangan'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Keterangan: </strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                       <?php
                                                $no = 1;
                                                foreach ($data as $d) {
															$this->db->select('*');
															$this->db->from('tb_disposisi');
															$this->db->where("id_surat=".$d['id']." AND statusjawaban='Selesai'");
															$num_results = $this->db->count_all_results();
                                                    if ($this->session->userdata('grup') > 0 && $this->session->userdata('grup') <= 4) {
                                                    
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="project-details-wrap shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Status</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $disposisi[0]['statusjawaban'] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Tindak Lanjut</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $disposisi[0]['jawaban'] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Lampiran Tindak Lanjut</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <a href="<?php echo base_url('./upload/tindaklanjut/'.$disposisi[0]['lampiranjawaban'].'');?>"><span class="label label-success"> <?= $disposisi[0]['lampiranjawaban'] ?>
                                                        </span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="project-details-tab">
                                            <ul class="nav nav-tabs res-pd-less-sm">
                                                
                                                <li><a data-toggle="tab" href="#menu1">Lampiran</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content res-tab-content-project">
                                                <div id="home" class="tab-pane fade in active animated fadeIn">
                                                    <p>
                                                        <?php if ($data[0]['isi'] == NULL) {
                                                            echo "<div class='col-lg-12 mg-t-9 mg-b-10 align-self-center'>Tidak Tersedia. Cek Lampiran.</div>";
                                                        } else {
                                                            echo "<div class='col-lg-12 mg-t-9 mg-b-10 align-self-center'>" . $data[0]['isi'] . "</div>";
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div id="menu1" class="tab-pane fade animated fadeIn">
                                                    <?php
                                                    $count = 0;
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($data[0]['lampiran' . $i] != NULL) {
                                                            ?>
                                                            <a href="<?= base_url('upload/') . $data[0]['lampiran' . $i] ?>">
                                                                <div class="sparkline8-graph project-details-price-hd col-lg-1">

                                                                    <div class="view-file-in">
                                                                        <i class="fa fa-file-o"></i>
                                                                    </div>
                                                                    <div class="" style="word-wrap:break-word;">
                                                                        <h5>Lampiran <?= $i ?>
                                                                        </h5>
                                                                    </div>
                                                            </a>

                                                </div>
                                        <?php
                                                $count++;
                                            }
                                        }
                                        if ($count == 0) {
                                            echo "<div class='col-lg-12 mg-t-30 mg-b-10 align-self-center'>Tidak Ada Lampiran</div>";
                                        }
                                        ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($this->session->userdata('grup') == '3' || $this->session->userdata('grup') == '2' ) {
                            ?>
                            <div class="row">
                                <div class="sparkline13-graph">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="login-bg">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <h4>Histori Disposisi</h4>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="project-details-mg">
                                                        <div class="row col-lg-12">
                                                            <table align="center" style="text-align:left;">
                                                                <?php
                                                                $tgl = '';
                                                                $pengirim = '';
                                                                foreach ($histori as $d) { ?>


                                                                    <tr>
                                                                        <?php

                                                                            if ($tgl != date("d-m-Y H:m", strtotime($d['tgl_disposisi']))) {
                                                                                echo "<td style='padding:5px 20px'>
                                                                                <div class='label label-default'>" . date('d-m-Y H:m', strtotime($d['tgl_disposisi'])) . "</div>
                                                                                </td>";
                                                                            } else {
                                                                                echo "<td></td>";
                                                                            }
                                                                            if ($pengirim != $d['pengirim']) {
                                                                                echo  "<td style='padding:5px 20px'>" . $d['pengirim'] . " (" . $d['jabatan_pengirim'] . " " . $d['unit_pengirim'] . ")</td>";
                                                                            } else {
                                                                                echo "<td></td>";
                                                                            }
                                                                            ?>

                                                                        <td style="padding:5px 10px"> <span class="fa big-icon fa-arrow-right"></span> </td>
                                                                        <td style="padding:5px 20px"><?= $d['penerima'] . " (" . $d['jabatan_penerima'] . " " . $d['unit_penerima'] . ")" ?></td>
                                                                        <?php

                                                                            $tgl = date("d-m-Y H:m", strtotime($d['tgl_disposisi']));
                                                                            $pengirim = $d['pengirim'];
                                                                            ?>
                                                                    </tr>

                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                            <?php }?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
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