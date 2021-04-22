<div class="left-sidebar-pro">
    <nav id="sidebar">
        <div class="sidebar-header">
            <a href="#"><img src="<?= base_url('assets/'); ?>img/kemenpora_logo.png" alt="" style="height:100px;width:100px;" />
            </a>
            <h3>siMAYA</h3>
            <p>E - Arsip</p>
            <!-- <strong>AP+</strong> -->
        </div>

        <?php
        if ($this->session->userdata('grup') == '1') {


        ?>
            <div class="left-custom-menu-adp-wrap">
                <ul class="nav navbar-nav left-sidebar-menu-pro mg-b-10">
                    <li class="nav-item">
                        <a href="#"> <strong>Utilitas Admin</strong></a>
                    </li>
                    <?php if ($this->session->userdata('grup') == '1') { ?>
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-user" style="margin-right:5px;"></i> <span class="mini-dn">Master User</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated bounceInLeft">
                                <!-- <a href="dashboard.html" class="dropdown-item">Grup</a>
                                <a href="dashboard-2.html" class="dropdown-item">Role</a> -->
                                <a href="<?= base_url('Utilitas/user'); ?>" class="dropdown-item">User</a>

                            </div>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-envelope-square  " style="margin-right:5px;"></i> <span class="mini-dn">Master Surat</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                        <div role="menu" class="dropdown-menu left-menu-dropdown animated  bounceInLeft">
                            <a href="<?= base_url('Utilitas/jenis_surat'); ?>" class="dropdown-item">Jenis Surat</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-users " style="margin-right:3px;"></i> <span class="mini-dn">Master Pegawai</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                        <div role="menu" class="dropdown-menu left-menu-dropdown animated  bounceInLeft">
                            <a href="<?= base_url('Utilitas/satuan_kerja'); ?>" class="dropdown-item">Struktur Organisasi</a>
                            <a href="<?= base_url('Utilitas/jabatan'); ?>" class="dropdown-item">Jabatan</a>
                            <a href="<?= base_url('Utilitas/pegawai'); ?>" class="dropdown-item">Pegawai</a>
                        </div>
                    </li>
                </ul>
            </div>
        <?php } ?>
        <div class="left-custom-menu-adp-wrap">
            <ul class="nav navbar-nav left-sidebar-menu-pro">
                <li class="nav-item">
                    <a href="#"> <strong>Navigasi</strong></a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Dashboard'); ?>" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home" style="margin-right:3px;"></i> <span class="mini-dn">Dashboard</span></a>
                </li>
				 <?php
                if ($this->session->userdata('grup') == '4' && $this->session->userdata('jabatan') <> 'MENTERI') {


                ?>
				<li class="nav-item">
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa fa-users" style="margin-right:5px;"></i> <span class="mini-dn">PLH</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                        <div role="menu" class="dropdown-menu left-menu-dropdown animated  bounceInLeft">
                            <a href="<?= base_url('Plh/index'); ?>" class="dropdown-item">Setting PLH</a>
                        </div>
                    </li>
				<?php } ?>
				
				<?php
                if ($this->session->userdata('grup') <> '2') {


                ?>
                
				<li class="nav-item">
                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-envelope " style="margin-right:3px;"></i> <span class="mini-dn">Surat</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    <div role="menu" class="dropdown-menu left-menu-dropdown animated  bounceInLeft">
                        <a href="<?= base_url('Surat_masuk'); ?>" class="dropdown-item">Surat Masuk</a>


                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-share-square" style="margin-right:5px;"></i> <span class="mini-dn">Disposisi</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    <div role="menu" class="dropdown-menu left-menu-dropdown animated  bounceInLeft">
						<?php
						if ($this->session->userdata('grup') == '4' && $this->session->userdata('jabatan') <> 'MENTERI') {
							?>
                        <a href="<?= base_url('Disposisi_masuk'); ?>" class="dropdown-item">Disposisi Masuk</a>
						<?php } ?>
                        <a href="<?= base_url('Disposisi_keluar'); ?>" class="dropdown-item">Disposisi Keluar</a>

                    </div>
                </li>
				<?php } ?>
                 
                <!-- <li class="nav-item">
                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-paper-plane"></i> <span class="mini-dn">Surat Keluar</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    <div role="menu" class="dropdown-menu left-menu-dropdown animated zoomInLeft">
                        <a href="dashboard.html" class="dropdown-item">Surat Keluar</a>
                        <a href="dashboard-2.html" class="dropdown-item">Buat Surat</a>
                        <a href="dashboard-2.html" class="dropdown-item">Disposisi Keluar</a>

                    </div>
                </li> -->
				
                <?php
                if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2' || $this->session->userdata('grup') == '3') {


                ?>
					
                    <li class="nav-item">
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-file-text" style="margin-right:5px;"></i> <span class="mini-dn">Surat Fisik</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                        <div role="menu" class="dropdown-menu left-menu-dropdown animated  bounceInLeft">
                            <a href="<?= base_url('Surat_fisik/entri'); ?>" class="dropdown-item">Entri Surat Fisik</a>
                            <a href="<?= base_url('Surat_fisik/'); ?>" class=" dropdown-item">Kelola</a>

                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</div>