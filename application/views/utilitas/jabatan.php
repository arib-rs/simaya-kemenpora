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
                                        <h1>Jabatan</h1>

                                    </div>
                                </div>

                                <div class="sparkline13-graph" style="text-align:left;">

                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="login-bg">

                                                <form id="adminpro-order-form" class="adminpro-form" method="POST" enctype="multipart/form-data" action="
                                                                                                                <?php
                                                                                                                if (empty($edit)) {
                                                                                                                    echo "add_Jabatan";
                                                                                                                } else {
                                                                                                                    echo "../add_Jabatan";
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
                                                                Jabatan</h4>

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
													  <label for="">Struktur Organisasi<a style="color:red;font-size:12px">*</a></label>
													  <div class="interested-input-area" style="margin-top:10px;">
                                                                <select name="nama_unit" class="chosen-select selectpicker" tabindex="-1">

                                                                    <?php
                                                                    if (empty($edit)) {
                                                                        foreach ($satuankerja as $d) {
                                                                            echo "<option value='" . $d['id'] . "'> 
                                                                        " . strtoupper($d['nama_unit'])  . "
                                                                        </option>";
                                                                        }
                                                                    } else {
                                                                        echo "<option value='" . $edit[0]['id'] . "' selected readonly='readonly'> 
                                                                        " . strtoupper($edit[0]['nama_unit'])  . "
                                                                        </option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                        </div>
													</div>		
                                                    <div class="form-group">
													  <label for="">Jabatan<a style="color:red;font-size:12px">*</a></label>
													  <div class="login-input-area ">
                                                        <input class="col-lg-10" type="text" name="jabatan" value="<?php echo (empty($edit)) ? '' : $edit[0]['jabatan']; ?>" />
                                                      </div>
													</div>	
                                                    
                                                    <input type="hidden" name="id_edit" value="<?php echo (empty($edit)) ? '' : $edit[0]['id']; ?>" />
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
                                                                
                                                                <a href='" . base_url('Utilitas/jabatan') . "'>
                                                                <button type='button' class='btn btn-default'>Batal</button>
                                                                </a>
                                                                </div>
                                                                ";
                                                            }
                                                            ?>
                                                        <div>
                                                    </div>

                                                </form>




                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-7">

                                        <div class="datatable-dashv1-list custom-datatable-overright animated zoomIn">


                                            <table id="table"  data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-show-export="true" data-show-columns="true">
                                                <thead>
                                                    <tr>
                                                        <th data-sortable="true">No</th>
														<th data-sortable="true">*</th>
                                                        <th data-sortable="true">Struktur Organisasi</th>
                                                        <th data-sortable="true">Jabatan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($data as $d) {
                                                        if ($d['id'] != 1 || $d['nama_unit'] <> 'TU Persuratan') {
                                                            echo "<tr>";

                                                            echo "<td>" . $no . "</td>";
															echo "<td>
                                                            
															<a title='Edit' href='" .  base_url('Utilitas/edit_jabatan/') . $d['id'] . "'>
															<span class=''><i class='fa big-icon fa-pencil-square-o '></i> </span>
															</a>
																	<a title='Hapus' href='" .  base_url('Utilitas/del_Jabatan/') . $d['id'] . "'  onclick=\"return confirm('Apakah anda yakin ingin menghapus ?');\">
															<span class=''><i class='fa big-icon fa-trash'></i> </span>
															</a></td>";
                                                            echo "<td>" . $d['nama_unit'] . "</td>";
                                                            echo "<td>" . $d['jabatan'] . "</td>";
                                                            echo "</tr>";
                                                            $no++;
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
            </div>
            <!-- Static Table End -->


        </div>