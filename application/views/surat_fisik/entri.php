        <!-- Header top area start-->
        <div class="content-inner-all">

            <!-- Header top area end-->



            <div class="admintab-area login-form-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">


                        <div class="col-lg-12">
                            <div class="admintab-wrap mg-b-40 animated zoomInDown">
                                <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                    <li id="liForm" class="active"><a data-toggle="tab" href="#TabForm"><span class=" tab-custon-ic"></span>Form</a>
                                    </li>
                                    <li id="liLampiran"><a data-toggle="tab" href="#TabLampiran"><span class=" tab-custon-ic"></span>Lampiran</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="TabForm" class="tab-pane in active animated slideInDown custon-tab-style1">
                                        <form id="adminpro-order-form" class="adminpro-form" method="POST" enctype="multipart/form-data" action="
                                        
                                                                                        <?php
                                                                                        if (empty($edit)) {
                                                                                            echo "add";
                                                                                        } else {
                                                                                            echo "../add";
                                                                                        }
                                                                                        ?>">

                                            <div class="login-bg">
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <h4>
                                                            <?php
                                                            if (empty($edit)) {
                                                                echo "Entri ";
                                                            } else {
                                                                echo "Edit ";
                                                            }
                                                            ?>
                                                            Surat Fisik
                                                        </h4>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <?php if ($this->session->flashdata('flash')) {
                                                            echo $this->session->flashdata('flash');
                                                        }  ?>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-1"></div>

                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>No Agenda</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="login-input-area ">
                                                            <input required class="col-lg-10" type="text" name="no_agenda" <?php
                                                                                                                            if (empty($edit)) {
                                                                                                                                echo "  ";
                                                                                                                            } else {
                                                                                                                                echo " readonly='readonly' ";
                                                                                                                            }
                                                                                                                            ?> onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo (empty($edit)) ? '' : $edit[0]['no_agenda']; ?>" />

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>No Surat</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="login-input-area">
                                                            <input required type="text" name="no_surat" value="<?php echo (empty($edit)) ? '' : $edit[0]['no_surat']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row animated flipInX" style="z-index:999;">
                                                    <div class="col-lg-1"></div>
                                                    <div class="chosen-select-single">
                                                        <div class="col-lg-2">
                                                            <div class="login-input-head">
                                                                <p>Pengirim</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="login-input-area">
                                                                <input required type="text" name="pengirim" value="<?php echo (empty($edit)) ? '' : $edit[0]['pengirim']; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Perihal</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="login-input-area">
                                                            <input required type="text" name="perihal" value="<?php echo (empty($edit)) ? '' : $edit[0]['perihal']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Tanggal Terima Surat</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="data-custon-pick" id="data_1">

                                                            <div class="input-group date" style="margin:10px 0px;">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input style="width:98%;" type="text" class="form-control" name="tgl_terima" value="<?php echo (empty($edit)) ? date("d-m-Y") : date("d-m-Y", strtotime($edit[0]['tgl_terima_surat'])); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Tanggal Surat</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="data-custon-pick" id="data_1">

                                                            <div class="input-group date" style="margin:10px 0px;">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input style="width:98%;" type="text" class="form-control" name="tgl_surat" value="<?php echo (empty($edit)) ? date("d-m-Y") : date("d-m-Y", strtotime($edit[0]['tgl_surat'])); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Kecepatan Sampai</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="interested-input-area" style="margin-top:10px;">
                                                            <select name="urgensi" class="chosen-select selectpicker">


                                                                <?php if (empty($edit)) { ?>
                                                                    <option value="Biasa">Biasa</option>
                                                                    <option value="Penting">Penting</option>
                                                                <?php } else { ?>
                                                                    <option value="Biasa" <?php echo ($edit[0]['urgensi'] == 'Biasa') ? 'selected' : ''; ?>>Biasa</option>
                                                                    <option value="Penting" <?php echo ($edit[0]['urgensi'] == 'Penting') ? 'selected' : ''; ?>>Penting</option>
                                                                <?php } ?>


                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Sifat Surat</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="interested-input-area" style="margin-top:10px;">
                                                            <select name="sifat_surat" class="chosen-select selectpicker">
                                                                <?php if (empty($edit)) { ?>
                                                                    <option value="Biasa">Biasa</option>
                                                                    <option value="Segera">Segera</option>
                                                                    <option value="Rahasia">Rahasia</option>
                                                                    <option value="Terbatas">Terbatas</option>
                                                                    <option value="Sangat Segera">Sangat Segera</option>
                                                                <?php } else { ?>
                                                                    <option value="Biasa" <?php echo ($edit[0]['sifat_surat'] == 'Biasa') ? 'selected' : ''; ?>>Biasa</option>
                                                                    <option value="Segera" <?php echo ($edit[0]['sifat_surat'] == 'Segera') ? 'selected' : ''; ?>>Segera</option>
                                                                    <option value="Rahasia" <?php echo ($edit[0]['sifat_surat'] == 'Rahasia') ? 'selected' : ''; ?>>Rahasia</option>
                                                                    <option value="Terbatas" <?php echo ($edit[0]['sifat_surat'] == 'Terbatas') ? 'selected' : ''; ?>>Terbatas</option>
                                                                    <option value="Sangat Segera" <?php echo ($edit[0]['sifat_surat'] == 'Rahasia') ? 'selected' : ''; ?>>Sangat Segera</option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Jenis Surat</p>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-4">
                                                        <div class="interested-input-area" style="margin-top:10px;">
                                                            <select name="penerima" id='penerima' class="chosen-select selectpicker">
                                                                <option value=NULL disabled selected='true'>Pilih Dinas / Non-Dinas</option>
                                                                <option value="Dinas">Dinas</option>
                                                                <option value="Non-Dinas">Non-Dinas</option>

                                                            </select>
                                                        </div>
                                                    </div> -->

                                                    <div class="col-lg-8">
                                                        <div class="interested-input-area" style="margin-top:10px;">
                                                            <select name="jenis_surat" class="chosen-select selectpicker">
                                                                <?php foreach ($jenis as $d) {

                                                                    if (empty($edit)) {
                                                                        echo "<option value='" . $d['id'] . "'>" . $d['jenis_surat'] . "</option>";
                                                                    } else {
                                                                        if ($d['id'] == $edit[0]['id_jenis_surat']) {
                                                                            echo "<option value='" . $d['id'] . "' selected >" . $d['jenis_surat'] . "</option>";
                                                                        } else {
                                                                            echo "<option value='" . $d['id'] . "'>" . $d['jenis_surat'] . "</option>";
                                                                        }
                                                                    }
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row mg-t-9 mg-b-9">
                                                    <div class="col-lg-1"></div>
                                                    <div class="chosen-select-single">
                                                        <div class="col-lg-2">
                                                            <div class="login-input-head">
                                                                <label style="margin-top:6px;">Penerima</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="interested-input-area">

                                                                <?php 
                                                                if ($edit == ""){
                                                                    echo '<select name="penerima[]" class="select2_demo_2 form-control" tabindex="-1" multiple="multiple">';
                                                                }else{
                                                                    echo '<select name="penerima" class="chosen-select selectpicker" tabindex="-1" >';
                                                                }
                                                               
                                                                

                                                                   


                                                                    foreach ($penerima as $d) {
                                                                        // echo "<option value='" . $d['id_pegawai'] . "'> 
                                                                        // " . strtoupper($d['nama_lengkap']) . " | "
                                                                        //     . strtoupper($d['jabatan']) . " " . strtoupper($d['nama_unit']) . "
                                                                        // </option>";
                                                                        if (empty($edit)) {
                                                                            echo "<option value='" . $d['id_pegawai'] . "'>" . strtoupper($d['nama_lengkap']) . " | "
                                                                                . strtoupper($d['jabatan']) . " " . strtoupper($d['nama_unit']) . "</option>";
                                                                        } else {
                                                                            if ($d['id_pegawai'] == $edit[0]['penerima']) {
                                                                                echo "<option value='" . $d['id_pegawai'] . "' selected>" . strtoupper($d['nama_lengkap']) . " | "
                                                                                    . strtoupper($d['jabatan']) . " " . strtoupper($d['nama_unit']) . "</option>";
                                                                            } else {
                                                                                echo "<option value='" . $d['id_pegawai'] . "'>" . strtoupper($d['nama_lengkap']) . " | "
                                                                                    . strtoupper($d['jabatan']) . " " . strtoupper($d['nama_unit']) . "</option>";
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <!-- <div class="row mg-t-9 mg-b-9 animated flipInX" id='nondinas' style="z-index:999;">
                                                    <div class="col-lg-1"></div>
                                                    <div class="chosen-select-single">
                                                        <div class="col-lg-2">
                                                            <div class="login-input-head">
                                                                <label style="margin-top:6px;">Satuan Kerja Non-Dinas</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="interested-input-area">
                                                                <select name="non_dinas" class="chosen-select selectpicker" tabindex="-1">

                                                                    <?php
                                                                    // foreach ($nondinas as $d) {
                                                                    //     echo "<option value='" . $d['id_pegawai'] . "'> 
                                                                    //     " . strtoupper($d['nama_lengkap']) . " | "
                                                                    //         . strtoupper($d['jabatan_dinas']) . " " . strtoupper($d['nama_unit']) . "
                                                                    //     </option>";
                                                                    // }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div> -->
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Keterangan</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="login-textarea-area">
                                                            <textarea required class="contact-message" cols="30" rows="10" name="keterangan"><?php echo (empty($edit)) ? '' : $edit[0]['keterangan']; ?></textarea>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3"></div>
                                                    <div class="col-lg-9">
                                                        <div class="login-button-pro">
                                                            <a onclick="lampiranAktif()" data-toggle="tab" href="#TabLampiran">
                                                                <button class="login-button login-button-lg">Selanjutnya</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                    </div>
                                    <div id="TabLampiran" class="tab-pane animated slideInDown custon-tab-style1">

                                        <div class="login-bg">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h4>Upload Lampiran</h4>
                                                    <small><i>Format lampiran : .png ,.jpg ,.pdf, .doc atau .docx dengan ukuran < 5 Mb</i> </small> <div class="row">
                                                                <div class="col-lg-1"></div>
                                                                <div class="col-lg-2">
                                                                    <div class="login-input-head">
                                                                        <p>Lampiran hal 1</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <div class="login-input-area file-upload-inner file-upload-inner-right ts-forms">
                                                                        <div class="input append-small-btn">
                                                                            <div class="file-button">
                                                                                Browse
                                                                                <input type="file" name="lampiran1" onchange="document.getElementById('append-small-btn1').value = this.files[0].name;">
                                                                            </div>
                                                                            <input type="text" name="lampiran1_info" id="append-small-btn1" placeholder="no file selected" value="<?php echo (empty($edit)) ? '' : $edit[0]['lampiran1']; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Lampiran hal 2</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="login-input-area file-upload-inner file-upload-inner-right ts-forms">
                                                            <div class="input append-small-btn">
                                                                <div class="file-button">
                                                                    Browse
                                                                    <input type="file" name="lampiran2" onchange="document.getElementById('append-small-btn2').value = this.files[0].name;">
                                                                </div>
                                                                <input type="text" name="lampiran2_info" id="append-small-btn2" placeholder="no file selected" value="<?php echo (empty($edit)) ? '' : $edit[0]['lampiran2']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Lampiran hal 3</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="login-input-area file-upload-inner file-upload-inner-right ts-forms">
                                                            <div class="input append-small-btn">
                                                                <div class="file-button">
                                                                    Browse
                                                                    <input type="file" name="lampiran3" onchange="document.getElementById('append-small-btn3').value = this.files[0].name;">
                                                                </div>
                                                                <input type="text" name="lampiran3_info" id="append-small-btn3" placeholder="no file selected" value="<?php echo (empty($edit)) ? '' : $edit[0]['lampiran3']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Lampiran hal 4</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="login-input-area file-upload-inner file-upload-inner-right ts-forms">
                                                            <div class="input append-small-btn">
                                                                <div class="file-button">
                                                                    Browse
                                                                    <input type="file" name="lampiran4" onchange="document.getElementById('append-small-btn4').value = this.files[0].name;">
                                                                </div>
                                                                <input type="text" name="lampiran4_info" id="append-small-btn4" placeholder="no file selected" value="<?php echo (empty($edit)) ? '' : $edit[0]['lampiran4']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Lampiran hal 5</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="login-input-area file-upload-inner file-upload-inner-right ts-forms">
                                                            <div class="input append-small-btn">
                                                                <div class="file-button">
                                                                    Browse
                                                                    <input type="file" name="lampiran5" onchange="document.getElementById('append-small-btn5').value = this.files[0].name;">
                                                                </div>
                                                                <input type="text" name="lampiran5_info" id="append-small-btn5" placeholder="no file selected" value="<?php echo (empty($edit)) ? '' : $edit[0]['lampiran5']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <input type="hidden" name="id_edit" value="<?php echo (empty($edit)) ? '' : $edit[0]['id']; ?>" />
                                                <input type="hidden" name="oldnoagenda" value="<?php echo (empty($edit)) ? '' : $edit[0]['no_agenda']; ?>" />
                                                <input type="hidden" name="oldnosurat" value="<?php echo (empty($edit)) ? '' : $edit[0]['no_surat']; ?>" />
                                                <input type="hidden" name="registrator" value="<?= $id ?>">
                                                <div class="row">
                                                    <div class="col-lg-3"></div>
                                                    <div class="col-lg-9">
                                                        <?php
                                                        if (empty($edit)) {
                                                            echo "
                                                                <div class='login-button-pro'>
                                                                <button type='submit' class='btn btn-primary'>Simpan</button>
                                                                </div>
                                                                ";
                                                        } else {
                                                            echo "
                                                                <div class='login-button-pro'>
                                                                <button type='submit' class='btn btn-warning'>Ubah</button>
                                                                
                                                                <a href='" . base_url('Surat_fisik/') . "' >
                                                                <button type='button' class='btn btn-default'>Batal</button>
                                                                </a>
                                                                </div>
                                                                ";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>