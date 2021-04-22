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
                                <form class="adminpro-form" method="POST" enctype="multipart/form-data" action="../add_disposisi">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="project-details-mg">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="project-details-dt ">
                                                            <span><label>Pengirim Disposisi : <?= $detailuser[0]['nama_lengkap'] . " (" . $detailuser[0]['nip'] . ")" ?></label></span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <?php if ($this->session->flashdata('flash')) {
                                                echo $this->session->flashdata('flash');
                                            }  ?>
                                        </div>
                                    </div>
                                    <!-- <div class="row">

                                        <div class="col-lg-12">No Agenda Disposisi : </div>
                                        <div class="login-input-area col-lg-12">
                                            <input type="text" name="no_agenda" value=" <?= $data[0]['no_agenda_disposisi'] ?>" disabled />

                                        </div>

                                    </div> -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- <div class="sparkline10-list shadow-reset">
                                <div class="sparkline10-hd">
                                    <div class="main-sparkline10-hd">
                                        <h1>Dual List box</h1>
    
                                    </div>
                                </div>
                                <div class="sparkline10-graph"> -->
                                            <div class="basic-login-form-ad">
                                                <div class="row">
                                                    <div class="col-lg-12" style="margin-bottom:10px;">
                                                        <div class="col-lg-12" style=" padding:0;">
                                                            <div class="col-lg-6" style="padding:10px 0 0 0;"> Diteruskan Kepada Yth : </div>
                                                            <div class="col-lg-6"><a id="btnpenerima" onclick="toggle_penerima()" style="border:solid 1px silver" class=" btn btn-sm btn-secondary"> Penerima Lainnya </a> </div>
                                                        </div>
                                                        <div class="dual-list-box-inner">
                                                            <select class="form-control dual_select" multiple="multiple" name="penerima[]">

                                                                <?php
                                                                foreach ($penerima as $d) {
                                                                    echo "<option class='pfilter' style='padding:4px; margin-left:5px;' value='" . $d['id_pegawai'] . "'>" .
                                                                        $d['nama_lengkap'] . " | " . $d['jabatan'] . " - " . $d['nama_unit'] .
                                                                        "</option>";
                                                                }
                                                                foreach ($all_penerima as $d) {
                                                                    echo "<option class='psemua' style='padding:4px; margin-left:5px; display:none; color:blue;' value='" . $d['id_pegawai'] . "'>" .
                                                                        $d['nama_lengkap'] . " | " . $d['jabatan'] . " - " . $d['nama_unit'] .
                                                                        "</option>";
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                            <!-- </div> -->
                                            <!-- </div> -->
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="project-details-mg">
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <div class="project-details-dt ">
                                                            <div style="margin-bottom:10px;">Untuk :</div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="dijawab"> <i></i> Dijawab</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="ditindak_lanjuti"> <i></i> Ditindaklanjuti</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="ditanggapi_tertulis"> <i></i> Ditanggapi tertulis</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="disiapkan_makalah"> <i></i> Disiapkan makalah/sambutan atau presentasi sesuai tema</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="koordinasikan"> <i></i> Koordinasikan dengan</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="diwakili"> <i></i> Diwakili & laporkan hasilnya</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="dihadiri"> <i></i> Dihadiri & dilaporkan hasilnya</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="disiapkan_surat"> <i></i> Disiapkan surat/memo dinas (internal)</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="arsip"> <i></i> Arsip</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="agendakan"> <i></i> Agendakan/jadwalkan</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="diperhatikan"> <i></i> Diperhatikan</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="dijelaskan"> <i></i> Diberikan penjelasan</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="diperbaiki"> <i></i> Diperbaiki</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="diproses"> <i></i> Diproses sesuai ketentuan, peraturan dan UU yang berlaku</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="diketahui"> <i></i> Diketahui</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="dibicarakan"> <i></i> Dibicarakan dengan saya</label>
                                                            </div>
                                                            <div class="i-checks pull-left col-lg-4">
                                                                <label style="font-weight: normal; ">
                                                                    <input type="checkbox" value="1" name="lainlain"> <i></i> Lain - lain</label>
                                                            </div>
                                                            <!-- <div class="chosen-select-single">

                                                                <select data-placeholder="Pilih instruksi.." name="instruksi[]" class="chosen-select" multiple="multiple" tabindex="-1">

                                                                    <option value="dijawab">Dijawab</option>
                                                                    <option value="ditindaklanjuti">Ditindaklanjuti</option>
                                                                    <option value="ditanggapi">Ditanggapi tertulis</option>
                                                                    <option value="disiapkan">Disiapkan makalah/sambutan atau presentasi sesuai tema</option>
                                                                    <option value="koordinasikan">Koordinasikan dengan</option>
                                                                    <option value="diwakili">Diwakili & laporkan hasilnya</option>
                                                                    <option value="dihadiri">Dihadiri & dilaporkan hasilnya</option>
                                                                    <option value="disiapkansurat">Disiapkan surat/memo dinas (internal)</option>
                                                                    <option value="arsip">Arsip</option>
                                                                    <option value="agendakan">Agendakan/jadwalkan</option>
                                                                    <option value="diperhatikan">Diperhatikan</option>
                                                                    <option value="diberikan">Diberikan penjelasan</option>
                                                                    <option value="diperbaiki">Diperbaiki</option>
                                                                    <option value="diproses">Diproses sesuai ketentuan, peraturan dan UU yang berlaku</option>
                                                                    <option value="diketahui">Diketahui</option>
                                                                    <option value="dibicarakan">Dibicarakan dengan saya</option>
                                                                    <option value="lainlain">Lain - lain</option>

                                                                </select>
                                                            </div> -->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="project-details-mg">
                                                <div class="row">
                                                    <div class="col-lg-3">

                                                        <div class="project-details-dt ">
                                                            <div>Tingkat Keamanan : </div>
                                                            <div class="interested-input-area">
                                                                <select name="sifat_disposisi">
                                                                    <option value="Biasa">Biasa</option>
                                                                    <option value="Rahasia">Rahasia</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">

                                                        <div class="project-details-dt ">
                                                            <div>Kecepatan Penyampaian : </div>
                                                            <div class="interested-input-area">
                                                                <select name="urgensi">
                                                                    <option value="Biasa">Biasa</option>
                                                                    <option value="Penting">Penting</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">

                                                        <div class="project-details-dt ">
                                                            <div>Tandai sebagai disposisi penting : </div>
                                                            <div class="interested-input-area">
                                                                <select name="penting">
                                                                    <option value="0">Tidak</option>
                                                                    <option value="1">Tandai</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">

                                                        <div class="project-details-dt ">
                                                            <div style="margin-bottom:10px;">Tanggal selesai :</div>
                                                            <div class="form-group data-custon-pick" id="data_1">

                                                                <div class="input-group date ">
                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                    <input type="text" class="form-control" name="tgl_selesai" value="<?= date("d-m-Y") ?>">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">

                                        <div class="col-lg-12">Isi Disposisi : </div>
                                        <div class="login-textarea-area col-lg-12">
                                            <textarea class="contact-message" rows="10" name="pesan"></textarea>

                                        </div>

                                    </div>
                                    <input type="hidden" name="id_surat" value="<?= $data[0]['id'] ?>" />
                                    <input type="hidden" name="pengirim" value="<?= $id ?>" />
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