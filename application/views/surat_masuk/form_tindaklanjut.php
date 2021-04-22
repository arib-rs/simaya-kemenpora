        <!-- Header top area start -->
        <div class="content-inner-all">



            <div class="project-details-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline13-list shadow-reset ">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1><span class="profile-details-name-nn">Buat Disposisi (Surat Nomor <strong><?= $data[0]['no_surat'] ?></strong>) </span> </h1>

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
                                                        <span><strong>No Agenda</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= $data[0]['no_agenda'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details-mg">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="project-details-st">
                                                        <span><strong>Tanggal Terima Surat</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="project-details-dt">
                                                        <span>: <?= date("d-m-Y", strtotime($data[0]['tgl_diterima'])) ?></span>
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

                                    </div>
                                </div>
                                <form class="adminpro-form" method="POST" enctype="multipart/form-data" action="../add_tindaklanjut">
                                    <div class="row">
                                    	<div class="col-lg-12">Status : </div>
                                        <div class="col-lg-12">
                                            <div class="interested-input-area" style="margin-top:10px;">
                                                <select name="statusjawaban" class="chosen-select selectpicker">
                                                    <option value="Proses">Proses</option>
                                                    <option value="Selesai">Selesai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">Jawaban Tindak Lanjut : </div>
                                        <div class="login-textarea-area col-lg-12">
                                            <textarea class="contact-message" rows="10" name="jawaban"></textarea>

                                        </div>
                                        <div class="login-textarea-area col-lg-12">
                                            Lampiran : <?php echo form_error('lampiranjawaban') ?></td><td> <input type="file" name="lampiranjawaban">
                                        </div>
                                        

                                    </div>
                                    <input type="hidden" name="id_surat" value="<?= $data[0]['id'] ?>" />
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-button-pro">
                                                <button type="submit" class="login-button login-button-lg">Simpan</button>

                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </div>
                    </div>
                </div>
                </form>
            </div>