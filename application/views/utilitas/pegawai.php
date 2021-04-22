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
                                        <h1>Pegawai</h1>

                                    </div>
                                </div>

                                <div class="sparkline13-graph" style="text-align:left;">

                                    <div class="row">
                                        <?php
                                        if ($this->session->userdata('grup') == '1') {
                                            ?>
                                            <div class="col-lg-5">
                                            <?php
                                            } else {
                                                ?>
                                                <div class="col-lg-12">
                                                <?php
                                                }
                                                ?>
                                                <div class="login-bg">

                                                    <form id="adminpro-order-form" class="adminpro-form" method="POST" enctype="multipart/form-data" action="
                                                <?php
                                                if (empty($edit)) {
                                                    echo "add_Pegawai";
                                                } else {
                                                    echo "../add_Pegawai";
                                                }
                                                ?>">


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
                                                                    Pegawai</h4>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">

                                                                <?php if ($this->session->flashdata('flash')) {
                                                                    echo $this->session->flashdata('flash');
                                                                }  ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">NIP<a style="color:red;font-size:12px">*</a></label>
                                                            <div class="login-input-area ">
                                                                <input required class="col-lg-10" minlength="18" maxlength="18" type="text" name="nip" id="nip" value="<?php echo (empty($edit)) ? '' : $edit[0]['nip']; ?>" />

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Nama Lengkap<a style="color:red;font-size:12px">*</a></label>
                                                            <div class="login-input-area ">
                                                                <input required class="col-lg-10" type="text" name="nama_lengkap" value="<?php echo (empty($edit)) ? '' : $edit[0]['nama_lengkap']; ?>" />

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Nama Singkat</label>
                                                            <div class="login-input-area ">
                                                                <input class="col-lg-10" type="text" name="nama_singkat" maxlength="40" value="<?php echo (empty($edit)) ? '' : $edit[0]['nama_singkat']; ?>" />

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Alamat</label>
                                                            <div class="login-input-area ">
                                                                <input class="col-lg-10" type="text" name="alamat" value="<?php echo (empty($edit)) ? '' : $edit[0]['alamat']; ?>" />

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Telp</label>
                                                            <div class="login-input-area ">
                                                                <input class="col-lg-10" type="text" name="telp" value="<?php echo (empty($edit)) ? '' : $edit[0]['telp']; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' />

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Jenis Kelamin</label>
                                                            <div class="interested-input-area" style="margin-top:10px;">
                                                                <select name="jenis_kelamin" class="chosen-select selectpicker" tabindex="-1">
                                                                    <?php if (empty($edit)) { ?>
                                                                        <option value="Laki-laki">Laki-laki</option>
                                                                        <option value="Perempuan">Perempuan</option>
                                                                    <?php } else { ?>
                                                                        <option value="Laki-laki" <?php echo ($edit[0]['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                                                        <option value="Perempuan" <?php echo ($edit[0]['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Golongan</label>
                                                            <div class="interested-input-area" style="margin-top:10px;">
                                                                <select name="golongan" class="chosen-select selectpicker" tabindex="-1">
                                                                    <?php if (empty($edit)) { ?>
                                                                        <option value="I A">I A</option>
                                                                        <option value="I B">I B</option>
                                                                        <option value="I C">I C</option>
                                                                        <option value="I D">I D</option>
                                                                        <option value="II A">II A</option>
                                                                        <option value="II B">II B</option>
                                                                        <option value="II C">II C</option>
                                                                        <option value="II D">II D</option>
                                                                        <option value="III A">III A</option>
                                                                        <option value="III B">III B</option>
                                                                        <option value="III C">III C</option>
                                                                        <option value="III D">III D</option>
                                                                        <option value="IV A">IV A</option>
                                                                        <option value="IV B">IV B</option>
                                                                        <option value="IV C">IV C</option>
                                                                        <option value="IV D">IV D</option>
                                                                        <option value="IV E">IV E</option>
                                                                        <option value="Non-PNS">Non-PNS</option>
                                                                    <?php } else { ?>
                                                                        <option value="I A" <?php echo ($edit[0]['golongan'] == 'I A') ? 'selected' : ''; ?>>I A</option>
                                                                        <option value="I B" <?php echo ($edit[0]['golongan'] == 'I B') ? 'selected' : ''; ?>>I B</option>
                                                                        <option value="I C" <?php echo ($edit[0]['golongan'] == 'I C') ? 'selected' : ''; ?>>I C</option>
                                                                        <option value="I D" <?php echo ($edit[0]['golongan'] == 'I D') ? 'selected' : ''; ?>>I D</option>
                                                                        <option value="II A" <?php echo ($edit[0]['golongan'] == 'II A') ? 'selected' : ''; ?>>II A</option>
                                                                        <option value="II B" <?php echo ($edit[0]['golongan'] == 'II B') ? 'selected' : ''; ?>>II B</option>
                                                                        <option value="II C" <?php echo ($edit[0]['golongan'] == 'II C') ? 'selected' : ''; ?>>II C</option>
                                                                        <option value="II D" <?php echo ($edit[0]['golongan'] == 'II D') ? 'selected' : ''; ?>>II D</option>
                                                                        <option value="III A" <?php echo ($edit[0]['golongan'] == 'III A') ? 'selected' : ''; ?>>III A</option>
                                                                        <option value="III B" <?php echo ($edit[0]['golongan'] == 'III B') ? 'selected' : ''; ?>>III B</option>
                                                                        <option value="III C" <?php echo ($edit[0]['golongan'] == 'III C') ? 'selected' : ''; ?>>III C</option>
                                                                        <option value="III D" <?php echo ($edit[0]['golongan'] == 'III D') ? 'selected' : ''; ?>>III D</option>
                                                                        <option value="IV A" <?php echo ($edit[0]['golongan'] == 'IV A') ? 'selected' : ''; ?>>IV A</option>
                                                                        <option value="IV B" <?php echo ($edit[0]['golongan'] == 'IV B') ? 'selected' : ''; ?>>IV B</option>
                                                                        <option value="IV C" <?php echo ($edit[0]['golongan'] == 'IV C') ? 'selected' : ''; ?>>IV C</option>
                                                                        <option value="IV D" <?php echo ($edit[0]['golongan'] == 'IV D') ? 'selected' : ''; ?>>IV D</option>
                                                                        <option value="IV E" <?php echo ($edit[0]['golongan'] == 'IV E') ? 'selected' : ''; ?>>IV E</option>
                                                                        <option value="Non-PNS" <?php echo ($edit[0]['golongan'] == 'Non-PNS') ? 'selected' : ''; ?>>Non-PNS</option>

                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Agama</label>
                                                            <div class="interested-input-area" style="margin-top:10px;">
                                                                <select name="agama" class="chosen-select selectpicker" tabindex="-1">
                                                                    <?php if (empty($edit)) { ?>
                                                                        <option value="Islam">Islam</option>
                                                                        <option value="Kristen">Kristen</option>
                                                                        <option value="Katolik">Katolik</option>
                                                                        <option value="Hindu">Hindu</option>
                                                                        <option value="Budha">Budha</option>
                                                                    <?php } else { ?>
                                                                        <option value="Islam" <?php echo ($edit[0]['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                                                                        <option value="Kristen" <?php echo ($edit[0]['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                                                                        <option value="Katolik" <?php echo ($edit[0]['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
                                                                        <option value="Hindu" <?php echo ($edit[0]['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                                                                        <option value="Budha" <?php echo ($edit[0]['agama'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>

                                                                    <?php } ?>


                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Tempat Lahir</label>
                                                            <div class="login-input-area ">
                                                                <input class="col-lg-10" type="text" name="tempat_lahir" value="<?php echo (empty($edit)) ? '' : $edit[0]['tempat_lahir']; ?>" />

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Tanggal Lahir</label>
                                                            <div class="data-custon-pick" id="data_1">

                                                                <div class="input-group date" style="margin:10px 0px;">
                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                    <input style="width:96%;" type="text" class="form-control" name="tgl_lahir" value="<?php echo (empty($edit)) ? date("d-m-Y") : date("d-m-Y", strtotime($edit[0]['tgl_lahir'])); ?>">
                                                                </div>
                                                            </div>
                                                        </div>


														       <?php 
														       		if($this->session->userdata('grup') == '4' && '3' && '2'){
																	   $disable = true;
																	}else{
																	   $disable = false;
																	}
														       ?>

                                                        <div class="form-group">
                                                            <label for="">Struktur Organisasi</label>
                                                            <div class="interested-input-area" style="margin-top:10px;">
                                                                <select name="satuan_kerja" id="satuan_kerja" class="chosen-select selectpicker" tabindex="-1" <?=($disable ? " disabled=\"disabled\"" : "");?>/>
                                                                    <option value="" selected disabled>-- Pilih Struktur Organisasi --</option>
                                                                    <?php foreach ($satuankerja as $d) {

                                                                        if (empty($edit)) {
                                                                            echo  "<option value='" . $d['id'] . "'> 
                                                                                " . strtoupper($d['nama_unit'])  . "
                                                                                </option>";
                                                                        } else {
                                                                            if ($d['id'] == $edit[0]['id_satuan_kerja']) {
                                                                                echo "<option value='" . $d['id'] . "' selected> 
                                                                                " . strtoupper($d['nama_unit']) . "
                                                                                </option>";
                                                                            } else {
                                                                                echo "<option value='" . $d['id'] . "'> 
                                                                                " . strtoupper($d['nama_unit']) . "
                                                                                </option>";
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Jabatan</label>
                                                            <div class="interested-input-area" style="margin-top:10px;">
                                                                <select name="jabatan" id="jabatan" class="chosen-select selectpicker" tabindex="-1" <?=($disable ? " disabled=\"disabled\"" : "");?>/>
                                                                    <option value="" selected disabled>-- Pilih Struktur Organisasi --</option>
                                                                    <?php /*foreach ($jabatan as $d) {
                                                                            if (empty($edit)) {
                                                                                echo  "<option value='" . $d['id'] . "'> 
                                                                                " . strtoupper($d['jabatan']) . " " . strtoupper($d['nama_unit'])  . "
                                                                                </option>";
                                                                            } else {
                                                                                if ($d['id'] == $edit[0]['id_jabatan']) {
                                                                                    echo "<option value='" . $d['id'] . "' selected> 
                                                                                " . strtoupper($d['jabatan']) . " " . strtoupper($d['nama_unit']) . "
                                                                                </option>";
                                                                                } else {
                                                                                    echo "<option value='" . $d['id'] . "'> 
                                                                                " . strtoupper($d['jabatan']) . " " . strtoupper($d['nama_unit']) . "
                                                                                </option>";
                                                                                }
                                                                            }
                                                                        }*/
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <?php
                                                        if (!empty($edit)) {
                                                            echo  "<input type='hidden' id='jbtn_edit' value='" . $edit[0]['id_jabatan'] . "' />";
                                                        }
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="">Level</label>
                                                            <div class="interested-input-area" style="margin-top:10px;">
                                                                <select name="level" id="level" class="chosen-select selectpicker" tabindex="-1" <?=($disable ? " disabled=\"disabled\"" : "");?>/>

                                                                    <?php if (empty($edit)) { ?>
                                                                        <option value="1">TU Persuratan</option>
                                                                        <option value="2">Menteri</option>
                                                                        <!-- <option value="2">Sesmen / Kabiro</option> -->
                                                                        <option value="3">Eselon 1</option>
                                                                        <option value="4">Eselon 2</option>
                                                                        <option value="5">Eselon 3</option>
                                                                        <option value="6">Eselon 4</option>
                                                                    <?php } else { ?>
                                                                        <option value="1" <?php echo ($edit[0]['level'] == '1') ? 'selected' : ''; ?>>TU Persuratan</option>
                                                                        <option value="2" <?php echo ($edit[0]['level'] == '2') ? 'selected' : ''; ?>>Menteri</option>
                                                                        <!-- <option value="2" <?php echo ($edit[0]['level'] == '2') ? 'selected' : ''; ?>>Sesmen / Kabiro</option> -->
                                                                        <option value="3" <?php echo ($edit[0]['level'] == '3') ? 'selected' : ''; ?>>Eselon 1</option>
                                                                        <option value="4" <?php echo ($edit[0]['level'] == '4') ? 'selected' : ''; ?>>Eselon 2</option>
                                                                        <option value="5" <?php echo ($edit[0]['level'] == '5') ? 'selected' : ''; ?>>Eselon 3</option>
                                                                        <option value="6" <?php echo ($edit[0]['level'] == '6') ? 'selected' : ''; ?>>Eselon 4</option>

                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="id_edit" value="<?php echo (empty($edit)) ? '' : $edit[0]['id_pegawai']; ?>" />
                                                        <div class="clearfix"></div>
                                                        <div class="form-group">
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
                                                                
                                                                <a href='" . base_url('Utilitas/pegawai') . "' >
                                                                <button type='button' class='btn btn-default'>Batal</button>
                                                                </a>
                                                                </div>
                                                                ";
                                                            }
                                                            ?>

                                                        </div>


                                                    </form>


                                                </div>

                                                </div>


                                                <?php
                                                if ($this->session->userdata('grup') == '1') :
                                                    ?>
                                                    <div class="col-lg-7">

                                                        <div class="datatable-dashv1-list custom-datatable-overright animated zoomIn">


                                                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-show-export="true" data-show-columns="true">
                                                                <thead>
                                                                    <tr>
                                                                        <th data-sortable="true">No</th>
                                                                        <th data-sortable="true">*</th>
                                                                        <th data-sortable="true">NIP</th>
                                                                        <th data-sortable="true">Nama</th>
                                                                        <th data-sortable="true">Alamat</th>
                                                                        <th data-sortable="true">No Telp</th>
                                                                        <th data-sortable="true">Struktur Organisasi</th>
                                                                        <th data-sortable="true">Jabatan</th>
                                                                        <th data-sortable="true">Level</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        $no = 1;
                                                                        $lvl = array('-', 'TU Persuratan', 'Menteri', 'Eselon 1', 'Eselon 2', 'Eselon 3', 'Eselon 4');
                                                                        foreach ($data as $d) {
                                                                            // if ($d['id'] != 1) {
                                                                            echo "<tr>";

                                                                            echo "<td>" . $no . "</td>";
                                                                            echo "<td>
                                                    
                                                    <a title='Edit' href='" .  base_url('Utilitas/edit_pegawai/') . $d['id'] . "'>
                                                    <span class=''><i class='fa big-icon fa-pencil-square-o '></i> </span>
                                                    </a>
                                                    
                                                    <a title='Hapus' href='" .  base_url('Utilitas/del_Pegawai/') . $d['id'] . "'  onclick=\"return confirm('Apakah anda yakin ingin menghapus ?');\">
                                                    <span class=''><i class='fa big-icon fa-trash'></i> </span>
                                                    </a></td>";
                                                                            echo "<td>" . $d['nip']  . "</td>";
                                                                            echo "<td>" . $d['nama_lengkap'] . "</td>";
                                                                            echo "<td>" . $d['alamat'] . "</td>";
                                                                            echo "<td>" . $d['telp'] . "</td>";
                                                                            echo "<td>" . $d['nama_unit'] . "</td>";
                                                                            echo "<td>" . $d['jabatan'] . "</td>";
                                                                            echo "<td>" . $lvl[$d['level']] . "</td>";
                                                                            echo "</tr>";
                                                                            $no++;
                                                                            // }
                                                                        }
                                                                        ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                <?php
                                                endif;
                                                ?>

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Static Table End -->


            </div>