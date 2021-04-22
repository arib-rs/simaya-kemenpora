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
                                        <h1>Akun User</h1>

                                    </div>
                                </div>

                                <div class="sparkline13-graph" style="text-align:left;">

                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="login-bg">

                                                <form id="adminpro-order-form" class="adminpro-form" method="POST" enctype="multipart/form-data" action="
                                                                <?php
                                                                if (empty($edit)) {
                                                                    echo "add_User";
                                                                } else {
                                                                    echo "../add_User";
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
                                                                Akun User</h4>

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
													  <label for="">Pegawai<a style="color:red;font-size:12px">*</a></label>
													  <div class="interested-input-area" style="margin-top:10px;">
                                                                <select name="pegawai" class="chosen-select selectpicker" tabindex="-1">

                                                                    <?php
                                                                    if (empty($edit)) {
                                                                        foreach ($pegawai as $d) {
                                                                            echo "<option value='" . $d['id'] . "'> 
                                                                        " . strtoupper($d['nama_lengkap']) . " | " . strtoupper($d['jabatan']) . " " . strtoupper($d['nama_unit']) . "
                                                                        </option>";
                                                                        }
                                                                    } else {
                                                                        echo "<option value='" . $edit[0]['id_pegawai'] . "'selected disabled> 
                                                                        " . strtoupper($edit[0]['nama_lengkap']) . " | " . strtoupper($d['jabatan']) . " " . strtoupper($edit[0]['nama_unit']) . "
                                                                        </option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
													</div>	
                                                    <div class="form-group">
													  <label for="">Username (tanpa spasi)<a style="color:red;font-size:12px">*</a></label>
													  <div class="login-input-area ">
                                                            <input class="col-lg-10" type="text" name="username" value="<?php echo (empty($edit)) ? '' : $edit[0]['username']; ?>" />
                                                      </div>
													</div>
													<div class="form-group">
													  <label for="">Password<a style="color:red;font-size:12px">*</a></label>
													  <div class="login-input-area ">
                                                                <input class="col-lg-10" type="password" onfocus="this.value=''" name="password" value="<?php echo (empty($edit)) ? '' : $edit[0]['password']; ?>" />

                                                      </div>
													</div>
                                                    <div class="form-group">
													  <label for="">Grup<a style="color:red;font-size:12px">*</a></label>
													  <div class="interested-input-area" style="margin-top:10px;">
                                                                <select name="grup" class="chosen-select selectpicker" tabindex="-1">

                                                                    <?php
                                                                    foreach ($grup as $d) {
                                                                        if ($d['id'] == $edit[0]['id_grup']) {
                                                                            echo "<option value='" . $d['id'] . "' selected> 
                                                                        " . strtoupper($d['grup']) . "
                                                                        </option>";
                                                                        } else {
                                                                            echo "<option value='" . $d['id'] . "'> 
                                                                        " . strtoupper($d['grup']) . "
                                                                        </option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                        </div>
													</div>
                                                    <input type="hidden" name="id_edit" value="<?php echo (empty($edit)) ? '' : $edit[0]['id_user']; ?>" />
                                                    <input type="hidden" name="oldusername" value="<?php echo (empty($edit)) ? '' : $edit[0]['username']; ?>" />
                                                    <input type="hidden" name="oldpassword" value="<?php echo (empty($edit)) ? '' : $edit[0]['password']; ?>" />
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
                                                                
                                                                <a href='" . base_url('Utilitas/user') . "'>
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
                                    

                                
									<div class="col-lg-7">
                                    <div class="datatable-dashv1-list custom-datatable-overright animated zoomIn" style="overflow-x:auto;">


                                        <table id="table"  data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-show-export="true" data-show-columns="true">
                                            <thead>
                                                <tr>
													<th data-sortable="true">No</th>
													<th data-sortable="true">*</th>
                                                    <th data-sortable="true">Nama</th>
                                                    <th data-sortable="true">Nama Akun</th>
                                                    <th data-sortable="true">Jabatan</th>
													<th data-sortable="true">Grup</th>
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
													echo "<td style='width:230px'>
                                                    
                                                    <a title='Edit' href='" .  base_url('Utilitas/edit_user/') . $d['id_user'] . "'>
                                                    <span class=''><i class='fa big-icon fa-pencil-square-o '></i></span>
                                                    </a>
                                                    
                                                    <a title='Hapus' href='" .  base_url('Utilitas/del_User/') . $d['id_user'] . "'  onclick=\"return confirm('Apakah anda yakin ingin menghapus ?');\">
                                                    <span class=''><i class='fa big-icon fa-trash'></i></span>
                                                    </a>
                                                  
                                                    
                                                    </td>";
                                                    echo "<td>" . $d['nama_lengkap'] . "</td>";
                                                    echo "<td>" . $d['username'] . "</td>";
                                                    echo "<td>" . $d['jabatan'] . "</td>";
													echo "<td>" . $d['grup'] . "</td>";
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
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->


        </div>