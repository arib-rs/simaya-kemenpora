<div class="header-top-area mg-b-15">
    <div class="fixed-header-top">
        <div class="container-fluid">
            <div class="row">


                <div class="col-lg-12">
                    <div class="header-right-info">
                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                        <?php
                        if ($this->session->userdata('grup') == '4' || $this->session->userdata('grup') == '3') {
                        ?>
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="fa fa-bell-o"></span>
                                    <?php
                                    if (count($notifsurat) != 0 || count($notifdisposisi) != 0) {
                                        $count = count($notifsurat) + count($notifdisposisi);
                                        echo "<span class='indicator-ms'></span><span>" .  $count . "</span>";
                                    }
                                    ?>

                                </a>
                                <div role="menu" class="author-message-top dropdown-menu animated flipInX" style="z-index:9999999;">
                                    <div class="message-single-top">
                                        <h1>Notifikasi</h1>
                                    </div>
                                    <ul class="message-menu">
                                        <?php
                                        if (count($notifsurat) == 0 && count($notifdisposisi) == 0) {
                                            echo " 
                                            <li style='display:block;width:100%; text-align:center; margin-top:10px;'>

                                                <h5 style='color:white;display:block; margin-bottom:0px;'>Tidak ada notifikasi</h5>

                                            </li>";
                                        }
                                        if (count($notifsurat) != 0) {
                                            ?>
                                            <li style="display:block;width:100%; text-align:center; margin-top:10px;">

                                                <h5 style="color:white;display:block; margin-bottom:0px;">Surat Masuk</h5>

                                            </li>
                                            <?php

                                                foreach ($notifsurat as $d) {

                                                    ?>
                                                <li class="col-lg-11" style="margin-top:-10px;">
                                                    <a href="<?= base_url('Surat_masuk/detail/') . $d['id'] ?>">
                                                        <!-- <div class="message-img">
                                                    <img src="img/message/1.jpg" alt="">
                                                </div> -->
                                                        <div class="message-content" style="margin-top:-10px; padding-top:0px;">

                                                            <small><?= date("d-m-Y", strtotime($d["tgl_terima_surat"])) ?></small>
                                                            <p><strong><?= $d['pengirim'] ?></strong></p>
                                                            <p><?= $d['perihal'] ?></p>
                                                        </div>
                                                    </a>
                                                    <hr />
                                                </li>
                                            <?php  }
                                            }
                                            if (count($notifdisposisi) != 0) {
                                                ?>
                                            <li style="display:block;width:100%; text-align:center; margin-top:10px;">

                                                <h5 style="color:white;display:block; margin-bottom:0px;">Disposisi</h5>

                                            </li>
                                            <?php

                                                foreach ($notifdisposisi as $d) {
                                                    ?>
                                                <li class="col-lg-11" style="margin-top:-10px;">
                                                    <a href="<?= base_url('Disposisi_masuk/detail/') . $d['id_disposisi'] ?>">
                                                        <!-- <div class="message-img">
                                                    <img src="img/message/1.jpg" alt="">
                                                </div> -->
                                                        <div class="message-content" style="margin-top:-10px; padding-top:0px;">

                                                            <small><?= date("d-m-Y", strtotime($d["tgl_disposisi"])) ?></small>
                                                            <p><strong><?= $d['nama_lengkap'] ?></strong></p>
                                                            <p><?= $d['perihal'] ?></p>

                                                        </div>
                                                    </a>
                                                    <hr />
                                                </li>

                                        <?php  }
                                        }
                                        ?>
                                    </ul>
                                    <!-- <div class="message-view">
                                        <a href="#">View All Messages</a>
                                    </div> -->
                                </div>
                            </li>
                            <?php } ?>

                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                    <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                    <span class="admin-name"><?= $user ?></span>
                                    <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                </a>
                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                    <li><a class="Primary" href="#" data-toggle="modal" data-target="#ViewProfile"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>Profil</a>
                                    </li>
                                    <li><a class="Primary" href="#" data-toggle="modal" data-target="#UbahPassword"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>Ubah Password</a>
                                    </li>

                                    <li><a href="<?= base_url('Auth/logout'); ?>"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>



            </div>

        </div>

    </div>

</div>
<!-- Mobile Menu start -->
<div class="mobile-menu-area" style="margin-top:-15px; padding-top:10px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <?php
                            if ($this->session->userdata('grup') == '1') {


                                ?>
                                <?php if ($this->session->userdata('grup') == '1') { ?>
                                    <li>
                                        <a data-toggle="collapse" data-target="#Charts" href="#">Master User<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul class="collapse dropdown-header-top">
                                            <li><a href="<?= base_url('Utilitas/user'); ?>">User</a>
                                            </li>

                                        </ul>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a data-toggle="collapse" data-target="#Charts" href="#">Master Surat<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url('Utilitas/jenis_surat'); ?>">Jenis Surat</a>
                                        </li>

                                    </ul>
                                </li>
                                <li>
                                    <a data-toggle="collapse" data-target="#Charts" href="#">Master Pegawai<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url('Utilitas/satuan_kerja'); ?>">Satuan Unit Kerja</a>
                                        </li>
                                        <li><a href="<?= base_url('Utilitas/pegawai'); ?>">Pegawai</a>
                                        </li>

                                    </ul>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="<?= base_url('Dashboard'); ?>">Dashboard</a>


                            </li>
                            <?php
                            if ($this->session->userdata('grup') == '4') {
                                ?>
                                <li>
                                    <a data-toggle="collapse" data-target="#Charts" href="#">PLH<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url('Plh/index'); ?>">Setting PLH</a>
                                        </li>

                                    </ul>
                                </li>

                            <?php } ?>
                            <li>
                                <a data-toggle="collapse" data-target="#Charts" href="#">Surat<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="<?= base_url('Surat_masuk'); ?>">Surat Masuk</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a data-toggle="collapse" data-target="#Charts" href="#">Disposisi<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="<?= base_url('Disposisi_masuk'); ?>">Disposisi Masuk</a>
                                    </li>
                                    <li><a href="<?= base_url('Disposisi_keluar'); ?>">Disposisi Keluar</a>
                                    </li>

                                </ul>
                            </li>
                            <?php
                            if ($this->session->userdata('grup') == '1' || $this->session->userdata('grup') == '2' || $this->session->userdata('grup') == '3') {


                                ?>
                                <li>
                                    <a data-toggle="collapse" data-target="#Charts" href="#">Surat Fisik<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url('Surat_fisik/entri'); ?>">Entri</a>
                                        </li>
                                        <li><a href="<?= base_url('Surat_fisik/'); ?>">Kelola</a>
                                        </li>

                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->

<!-- modal ubah password -->
<div id="UbahPassword" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <form id="adminpro-order-form" class="adminpro-form" method="POST" enctype="multipart/form-data" action="<?= base_url('Utilitas/ubah_PassUser/' . $this->session->userdata['iduser']) ?>">

                <div class="modal-body" style="text-align:left;">
                    <h2>Ubah Password</h2>
                    <?php if ($this->session->flashdata('flash')) {
                        echo $this->session->flashdata('flash');
                    }  ?>
                    <div class="row">

                        <div class="col-lg-5">
                            <div class="login-input-head">
                                <p>Password sekarang </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="login-input-area ">
                                <input class="col-lg-10" type="password" name="oldpassword" />

                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-5">
                            <div class="login-input-head">
                                <p>Password baru </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="login-input-area ">
                                <input class="col-lg-10" type="password" name="newpassword" />

                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-5">
                            <div class="login-input-head">
                                <p>Ulangi password baru </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="login-input-area ">
                                <input class="col-lg-10" type="password" name="newpasswordconf" />

                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="url" value="<?= current_url() ?>" />

                </div>
                <div class="modal-footer">
                    <div class="login-button-pro" style="text-align:center;padding:0 0 20px 0;">


                        <button type="submit" class="login-button login-button-lg">Simpan</button>
                        <!-- <button data-dismiss="modal" class="login-button login-button-lg">Batal</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="ViewProfile" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body" style="text-align:left;">
                <h2>Profil</h2>
                <?php if ($this->session->flashdata('flash')) {
                    echo $this->session->flashdata('flash');
                }  ?>
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-lg-5">
                        <p>NIP</p>
                    </div>
                    <div class="col-lg-1">
                        <p>: </p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $this->session->userdata('nip')  ?></p>
                    </div>
                </div>
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-lg-5">
                        <p>Nama</p>
                    </div>
                    <div class="col-lg-1">
                        <p>: </p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $this->session->userdata('nama')  ?></p>
                    </div>
                </div>
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-lg-5">
                        <p>Tempat & Tanggal Lahir</p>
                    </div>
                    <div class="col-lg-1">
                        <p>: </p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $this->session->userdata('tempatlahir') . ', ' . date("d-m-Y", strtotime($this->session->userdata('tgllahir'))) ?></p>
                    </div>
                </div>
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-lg-5">
                        <p>Alamat</p>
                    </div>
                    <div class="col-lg-1">
                        <p>: </p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $this->session->userdata('alamat')  ?></p>
                    </div>
                </div>
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-lg-5">
                        <p>Telp.</p>
                    </div>
                    <div class="col-lg-1">
                        <p>: </p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $this->session->userdata('telp')  ?></p>
                    </div>
                </div>
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-lg-5">
                        <p>Golongan</p>
                    </div>
                    <div class="col-lg-1">
                        <p>: </p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $this->session->userdata('golongan')  ?></p>
                    </div>
                </div>
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-lg-5">
                        <p>Jabatan</p>
                    </div>
                    <div class="col-lg-1">
                        <p>: </p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $this->session->userdata('jabatan')  ?></p>
                    </div>
                </div>
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-lg-5">
                        <p>Struktur Organisasi</p>
                    </div>
                    <div class="col-lg-1">
                        <p>: </p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $this->session->userdata('struktur')  ?></p>
                    </div>
                </div>
                <?php
                $lvl = array('-', 'TU Persuratan', 'Menteri', 'Eselon 1', 'Eselon 2', 'Eselon 3', 'Eselon 4');
                ?>
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-lg-5">
                        <p>Level</p>
                    </div>
                    <div class="col-lg-1">
                        <p>: </p>
                    </div>
                    <div class="col-lg-6">
                        <p><?= $lvl[$this->session->userdata('level')]  ?></p>
                    </div>
                </div>




                <input type="hidden" name="url" value="<?= current_url() ?>" />

            </div>

            <div class="login-button-pro" style="text-align:center;padding:0 0 20px 0;">


                <a href="<?= base_url('Utilitas/edit_pegawai/' . $this->session->userdata['id']) ?>" class="btn btn-warning">Ubah Profil</a>
            </div>

        </div>
    </div>
</div>