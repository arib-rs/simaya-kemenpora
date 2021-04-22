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
                                        <h1>Struktur Organisasi</h1>

                                    </div>
                                </div>

                                <div class="sparkline13-graph" style="text-align:left;">

                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="login-bg">

                                                <form id="adminpro-order-form" class="adminpro-form" method="POST" enctype="multipart/form-data" action="
                                                                                                                <?php
                                                                                                                if (empty($edit)) {
                                                                                                                    echo "add_SatuanKerja";
                                                                                                                } else {
                                                                                                                    echo "../add_SatuanKerja";
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
                                                                Struktur Organisasi</h4>

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
													  <label for="">Nama Struktur Organisasi<a style="color:red;font-size:12px">*</a></label>
													  <div class="login-input-area ">
                                                          <input class="col-lg-10" type="text" name="nama_unit" value="<?php echo (empty($edit)) ? '' : $edit[0]['nama_unit']; ?>" />
                                                      </div>
													</div>	
													<div class="form-group">
													  <label for="">Nama Singkat Struktur Organisasi<a style="color:red;font-size:12px">*</a></label>
													  <div class="login-input-area ">
                                                         <input class="col-lg-10" type="text" name="nama_unit_singkat" value="<?php echo (empty($edit)) ? '' : $edit[0]['nama_unit_singkat']; ?>" />
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
                                                                
                                                                <a href='" . base_url('Utilitas/satuan_kerja') . "'>
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

                                        <div class="datatable-dashv1-list custom-datatable-overright animated zoomIn">


                                            <table id="table"  data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-show-export="true" data-show-columns="true">
                                                <thead>
                                                    <tr>
                                                        <th data-sortable="true">No</th>                                                        
														<th>*</th>
                                                        <th data-sortable="true">Struktur Organisasi</th>
                                                        <th data-sortable="true">Nama Singkat</th>



                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($data as $d) {
                                                        if ($d['id'] != 1 || $d['nama_unit'] <> 'TU Persuratan') {
                                                            echo "<tr>";

                                                            echo "<td>" . $no . "</td>";
															echo "<td><center>
                                                    
															<a title='Tampilkan Bagan' href='#' onclick='bagan(" . $d['id'] . ")' data-toggle='modal' data-target='#PrimaryModalalert3'>
															<span class=''><i class='fa big-icon fa-sitemap'></i> </span>
															</a>    

															<a title='Edit' href='" .  base_url('Utilitas/edit_satuan_kerja/') . $d['id'] . "'>
															<span class=''><i class='fa big-icon fa-pencil-square-o '></i> </span>
															</a>
															
															<a title='Hapus' href='" .  base_url('Utilitas/del_SatuanKerja/') . $d['id'] . "'  onclick=\"return confirm('Apakah anda yakin ingin menghapus ?');\">
															<span class=''><i class='fa big-icon fa-trash'></i> </span>
															</a></center></td>";

                                                            echo "<td>" . $d['nama_unit'] . "</td>";
                                                            echo "<td>" . $d['nama_unit_singkat'] . "</td>";
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
            </div>


            <!-- Static Table End -->


        </div>


        <div id="PrimaryModalalert3" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog modal-lg" style="width:76%">
                <div class="modal-content ">
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>

                    <div class="modal-body" style="text-align:left;">

                        <div class='adminpro-content res-tree-ov'>
                            <div id='jstree1' style="text-align:center;">

                            </div>
                        </div>

                        <input type="hidden" id="id_satkerr" name="id_satkerr" value="" />

                    </div>
                    <div class="modal-footer">
                        <div class="login-button-pro" style="text-align:center;padding:0 0 20px 0;">


                            <!-- <button type="submit" class="login-button login-button-lg">Approve</button> -->
                            <!-- <button data-dismiss="modal" class="login-button login-button-lg">Batal</button> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>