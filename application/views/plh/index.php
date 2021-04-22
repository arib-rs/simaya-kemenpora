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
                                        <h1>PILIH Pelaksana Tugas Harian</h1>

                                    </div>
                                </div>

                                <div class="sparkline13-graph" style="text-align:left;">

                                    <div class="row">
                                        
                                            <div class="login-bg">
												
                                                    
                                              
                                            <form id="adminpro-order-form" class="adminpro-form" method="POST" enctype="multipart/form-data" action="
												<?php
                                                if (empty($edit)) {
                                                    echo "edit_plh";
                                                } else {
                                                    echo "../edit_plh";
                                                }
                                                ?>">
											<div class="datatable-dashv1-list custom-datatable-overright animated zoomIn">
													<div class="row">
                                                        <div class="col-lg-12">

                                                            <?php if ($this->session->flashdata('flash')) {
                                                                echo $this->session->flashdata('flash');
                                                            }  ?>
                                                        </div>
														
                                                    </div>
													<!-- <div class="row">
                                                        <div class="col-lg-12">

                                                            <?php 
															$idplh=$this->session->userdata('idplh');
															if ($idplh==0){
																echo "<div class='alert alert-danger' role='alert'><b>Belum memilih PLH</b></div>";
															}
															else{
																
															}
														?>
                                                        </div>
														
                                                    </div> -->
													
													<button type='submit' name='simpan' class='btn btn-primary'><i class="fa fa-save"></i> Simpan</button>
													<button type='submit' name='reset' class='btn btn-warning'><i class="fa fa-refresh"></i> Atur Ulang PLH</button>
													<table id="table"  data-toggle="table" data-pagination="true" data-search="true" data-toolbar="#toolbar" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-show-export="true" data-show-columns="true">
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
																if ($idplh==$d['id']){	
																	echo "<tr class='alert alert-info'>";
																}else{
																	echo "<tr>";
																}
																echo "<td>" . $no . "</td>";
																if ($idplh==$d['id']){
																  echo "<td><input type='radio' value='".$d['id']."' name='idplh' checked/></td>";	
																}
																else{
																  echo "<td><input type='radio' value='".$d['id']."' name='idplh'/></td>";
																}
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
												
                                                </form>


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