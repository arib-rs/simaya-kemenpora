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
                                        <h1>Jenis Surat</h1>

                                    </div>
                                </div>

                                <div class="sparkline13-graph" style="text-align:left;">

                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="login-bg">

                                                <form id="adminpro-order-form" class="adminpro-form" method="POST" enctype="multipart/form-data" action="
                                                                                                                <?php
                                                                                                                if (empty($edit)) {
                                                                                                                    echo "add_JenisSurat";
                                                                                                                } else {
                                                                                                                    echo "../add_JenisSurat";
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
                                                                Jenis Surat</h4>

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
													  <label for="">Jenis Surat<a style="color:red;font-size:12px">*</a></label>
													  <div class="login-input-area ">
                                                                <input class="col-lg-10" type="text" name="jenis_surat" value="<?php echo (empty($edit)) ? '' : $edit[0]['jenis_surat']; ?>" />

                                                      </div>
													</div>
                                                    <div class="form-group">
													  <label for="">Keterangan<a style="color:red;font-size:12px">*</a></label>
													  <div class="login-textarea-area">
                                                                <textarea class="contact-message" cols="30" rows="10" name="keterangan"><?php echo (empty($edit)) ? '' : $edit[0]['keterangan']; ?></textarea>

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
                                                                
                                                                <a href='" . base_url('Utilitas/jenis_surat') . "'>
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
                                                        <th data-sortable="true">*</th>
														<th data-sortable="true">Jenis Surat</th>
                                                        <th data-sortable="true">Keterangan</th>
                                                        

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($data as $d) {
                                                        echo "<tr>";

                                                        echo "<td>" . $no . "</td>";
														echo "<td>
                                                        <a title='Edit' href='" .  base_url('Utilitas/edit_jenis_surat/') . $d['id'] . "'>
														<span class=''><i class='fa big-icon fa-pencil-square-o '></i></span>
														</a>
															
															<a title='Hapus' href='" .  base_url('Utilitas/del_JenisSurat/') . $d['id'] . "' onclick=\"return confirm('Apakah anda yakin ingin menghapus ?');\">
														<span class=''><i class='fa big-icon fa-trash'></i></span>
														</a></td>";
                                                        echo "<td>" . $d['jenis_surat'] . "</td>";
                                                        echo "<td>" . $d['keterangan'] . "</td>";
                                                        echo "</tr>";
                                                        $no++;
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