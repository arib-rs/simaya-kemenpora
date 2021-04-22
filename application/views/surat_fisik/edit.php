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
                                        <form id="adminpro-order-form" class="adminpro-form" method="POST" enctype="multipart/form-data" action="add">

                                            <div class="login-bg">
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <h4>Edit Surat Fisik</h5>

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
                                                            <input class="col-lg-10" type="text" name="no_agenda" />

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
                                                            <input type="text" name="no_surat" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row mg-t-9 mg-b-9 animated flipInX" style="z-index:999;">
                                                    <div class="col-lg-1"></div>
                                                    <div class="chosen-select-single">
                                                        <div class="col-lg-2">
                                                            <div class="login-input-head">
                                                                <label style="margin-top:6px;">Pengirim</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="interested-input-area">
                                                                <select name="pengirim" class="chosen-select selectpicker" tabindex="-1">

                                                                    <?php foreach ($pengirim as $d) {
                                                                        echo "<option value='" . $d['id_pegawai'] . "'> 
                                                                        " . strtoupper($d['nama_lengkap']) . " | "
                                                                            . strtoupper($d['jabatan_dinas']) . " " . strtoupper($d['jabatan_non_dinas']) . " " . strtoupper($d['nama_unit']) . "
                                                                        </option>";
                                                                    }
                                                                    ?>
                                                                </select>
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
                                                            <input type="text" name="perihal" />
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
                                                        <div class="interested-input-area">
                                                            <select name="urgensi">
                                                                <option value="Biasa">Biasa</option>
                                                                <option value="Penting">Penting</option>
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
                                                        <div class="interested-input-area">
                                                            <select name="sifat_surat">
                                                                <option value="Biasa">Biasa</option>
                                                                <option value="Rahasia">Rahasia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Penerima</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="interested-input-area">
                                                            <select name="penerima" id='penerima'>
                                                                <option value=NULL disabled selected='true'>Pilih Dinas / Non-Dinas</option>
                                                                <option value="Dinas">Dinas</option>
                                                                <option value="Non-Dinas">Non-Dinas</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="interested-input-area">
                                                            <select name="jenis_surat">
                                                                <?php foreach ($jenis as $d) {
                                                                    echo "<option value='" . $d['id'] . "'>" . $d['jenis_surat'] . "</option>";
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row mg-t-9 mg-b-9 animated flipInX" id="satker" style="z-index:999;">
                                                    <div class="col-lg-1"></div>
                                                    <div class="chosen-select-single">
                                                        <div class="col-lg-2">
                                                            <div class="login-input-head">
                                                                <label style="margin-top:6px;">Satuan Kerja</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="interested-input-area">
                                                                <select name="satuan_kerja" class="chosen-select selectpicker" tabindex="-1">

                                                                    <?php foreach ($dinas as $d) {
                                                                        echo "<option value='" . $d['id_pegawai'] . "'> 
                                                                        " . strtoupper($d['nama_lengkap']) . " | "
                                                                            . strtoupper($d['jabatan_dinas']) . " " . strtoupper($d['nama_unit']) . "
                                                                        </option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row mg-t-9 mg-b-9 animated flipInX" id='nondinas' style="z-index:999;">
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

                                                                    <?php foreach ($nondinas as $d) {
                                                                        echo "<option value='" . $d['id_pegawai'] . "'> 
                                                                        " . strtoupper($d['nama_lengkap']) . " | "
                                                                            . strtoupper($d['jabatan_dinas']) . " " . strtoupper($d['nama_unit']) . "
                                                                        </option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-2">
                                                        <div class="login-input-head">
                                                            <p>Keterangan</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="login-textarea-area">
                                                            <textarea class="contact-message" cols="30" rows="10" name="keterangan"></textarea>

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
                                                    <small>Format lampiran : .pdf, .doc atau .docx dengan ukuran < 1 Mb</small> </div> </div> <div class="row">
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
                                                                        <input type="text" id="append-small-btn1" placeholder="no file selected">
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
                                                                <input type="text" id="append-small-btn2" placeholder="no file selected">
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
                                                                <input type="text" id="append-small-btn3" placeholder="no file selected">
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
                                                                <input type="text" id="append-small-btn4" placeholder="no file selected">
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
                                                                <input type="text" id="append-small-btn5" placeholder="no file selected">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1"></div>
                                                </div>
                                                <input type="hidden" name="registrator" value="<?= $id ?>">
                                                <div class="row">
                                                    <div class="col-lg-3"></div>
                                                    <div class="col-lg-9">
                                                        <div class="login-button-pro">
                                                            <button type="submit" class="login-button login-button-lg">Simpan</button>

                                                        </div>
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