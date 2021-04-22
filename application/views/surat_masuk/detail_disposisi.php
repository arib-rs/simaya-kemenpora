        <!-- Header top area start -->
        <div class="content-inner-all">
            <div class="project-details-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline13-list shadow-reset ">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1><span class="profile-details-name-nn"></span> <?= $data[0]['perihal'] ?>
                                            <a class="pull-right" style="margin-top:-5px; " href="<?= base_url('Surat_masuk/cetak_disposisi/') . $data[0]['id_disposisi']; ?>" target="_blank">
                                                <div class="project-details-title btn btn-primary">
                                                    <span><i class=" fa fa-print"></i></span><span class=""> Cetak Lembar Disposisi</span>
                                                </div>
                                            </a>                                            
                                            <a class="pull-right" style="margin-top:-5px; margin-right:4px" href="<?= base_url('Surat_masuk/detail/') . $data[0]['id_surat']; ?>">
                                                <div class="project-details-title btn btn-primary">
                                                    <span><i class=" fa fa-eye"></i></span><span class=""> Detail Surat</span>
                                                </div>
                                            </a>
                                            <?php
                                            if ($data[0]['pengirim'] != $this->session->userdata('id')) {
                                                echo "
                                                    <a class='pull-right' style='margin-top:-5px; margin-right:4px' href='" . base_url('Disposisi_masuk/tolak/') . $data[0]['id_disposisi'] . "'>
                                                    <div class='project-details-title btn btn-danger'>
                                                        <span><i class=' fa fa-times-circle'></i></span><span> Tolak</span>
                                                    </div>
                                                    </a>
                                                    ";
                                            }

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
                                                        <span><strong>Pemberi Disposisi</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $data[0]['nama_lengkap'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Tanggal Disposisi</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= date("d-m-Y", strtotime($data[0]['tgl_disposisi'])) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Pesan</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $data[0]['pesan'] ?></span>
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
                                                        <span><strong>Instruksi</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span><?php
                                                                echo ($data[0]['dijawab'] == '1') ? '- Dijawab <br>' : '';
                                                                echo ($data[0]['ditindak_lanjuti'] == '1') ? ' - Ditindak lanjuti <br>' : '';
                                                                echo ($data[0]['ditanggapi_tertulis'] == '1') ? '- Ditanggapi tertulis <br>' : '';
                                                                echo ($data[0]['disiapkan_makalah'] == '1') ? '- Disiapkan makalah/sambutan atau presentasi sesuai tema <br>' : '';
                                                                echo ($data[0]['koordinasikan'] == '1') ? '- Koordinasikan dengan <br>' : '';
                                                                echo ($data[0]['diwakili'] == '1') ? '- Diwakili & laporkan hasilnya <br>' : '';
                                                                echo ($data[0]['dihadiri'] == '1') ? '- Dihadiri & laporkan hasilnya <br>' : '';
                                                                echo ($data[0]['disiapkan_surat'] == '1') ? '- Disiapkan surat/memo dinas(internal) <br>' : '';
                                                                echo ($data[0]['arsip'] == '1') ? '- Arsip <br>' : '';
                                                                echo ($data[0]['agendakan'] == '1') ? '- Agendakan/jadwalkan <br>' : '';
                                                                echo ($data[0]['diperhatikan'] == '1') ? '- Diperhatikan <br>' : '';
                                                                echo ($data[0]['dijelaskan'] == '1') ? '- Diberikan penjelasan <br>' : '';
                                                                echo ($data[0]['diperbaiki'] == '1') ? '- Diperbaiki <br>' : '';
                                                                echo ($data[0]['diproses'] == '1') ? '- Diproses sesuai ketentuan, Peraturan dan UU yang berlaku <br>' : '';
                                                                echo ($data[0]['diketahui'] == '1') ? '- Diketahui <br>' : '';
                                                                echo ($data[0]['dibicarakan'] == '1') ? '- Dibicarakan dengan saya <br>' : '';
                                                                echo ($data[0]['lainlain'] == '1') ? '- Lain-lain <br>' : '';
                                                                ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Tanggal Selesai</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= date("d-m-Y", strtotime($data[0]['tgl_selesai'])) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
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
                                                        <span><strong>No Agenda Surat Masuk</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $data[0]['agenda_surat'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>No Surat</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $data[0]['no_surat'] ?></span>
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
                                                        <span><?php
                                                                $no = 1;
                                                                foreach ($tujuan as $d) {
                                                                    echo $no . ". " . $d['nama_penerima'] . "<br>";
                                                                    $no++;
                                                                }
                                                                ?></span>
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
                                                        <span><strong>Tanggal Surat</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= date("d-m-Y", strtotime($data[0]['tgl_surat'])) ?>
                                                        </span>
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
                                                        <span>: <?= $data[0]['jenis_surat'] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Kecepatan Penyampaian</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span class="label label-success"><?= $data[0]['urgensi_disposisi'] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Tingkat Keamanan</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span class="label label-success"><?= $data[0]['sifat_disposisi'] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
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
                                                        <span><strong>Status </strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <?php 

                                                        if ($data[0]['statusjawaban'] == "Proses") {
                                                        echo ":<span  style='margin-left:4px' class='label label-warning'>Proses</span></a>";
                                                         } else {
                                                        echo ":<span  style='margin-left:4px' class='label label-success'>Selesai</span></a>";
                                                        }

                                                         ?>
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
                                                        <span>: <?= $data[0]['jawaban'] ?>
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
                                                        <a href="<?php echo base_url('./upload/tindaklanjut/'.$data[0]['lampiranjawaban'].'');?>"><span> <?= $data[0]['lampiranjawaban'] ?>
                                                        </span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    </div>
                </div>