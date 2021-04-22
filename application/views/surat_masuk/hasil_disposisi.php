<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title></title>
        <!-- <link rel="stylesheet" href="<?= base_url() ?>themes/css/own_style.css" /> -->
        <style>
            body {}

            h1,
            h2,
            h3,
            h4,
            h5 {
                margin: 0;
                padding: 0;
                line-height: 0;
            }

            table {
                font-size: 11px;
                border-collapse: collapse;
                width: 100%;

            }

            tr {}

            td {
                border: 1px solid black;
                padding: 5px;
            }

            .size11 {
                font-size: 11px;
            }

            .los td {
                border: 0;
            }

            .noborder {
                border: 0px;
            }

            .border {
                border: 1px solid black;
            }

            .mg-t-10 {
                margin-top: 10px;
            }

            .mg-b-10 {
                margin-bottom: 10px;
            }
        </style>
    </head>

    <body>
<!--         <div class="mg-b-10" align="center"><img width="100px" height="100px" src="<?= base_url('assets/img/garuda.png') ?>" /></div>
 -->
        <div>
            <h4 align="center">MENTERI PEMUDA DAN OLAHRAGA</h4>
        </div>
        <div class="mg-b-10">
            <h4 align="center">REPUBLIK INDONESIA</h4>
        </div>


        <div class="mg-b-10" align="center">Lembar Disposisi</div>

        <table class="mg-b-10">
            <tr>
                <td width="20%">No Agenda</td>
                <td><?= $data[0]['no_agenda_disposisi'] ?></td>
            </tr>
            <tr>
                <td>No Surat</td>
                <td><?= $data[0]['no_surat'] ?></td>
            </tr>
            <tr>
                <td>Tgl Surat</td>
                <td><?= date("d-m-Y", strtotime($data[0]['tgl_surat'])) ?></td>
            </tr>
            <tr>
                <td>Asal Surat</td>
                <td><?= $surat[0]['pengirim'] ?></td>
            </tr>
            <tr>
                <td>Isi Singkat</td>
                <td><?= $data[0]['perihal'] ?></td>
            </tr>
        </table>
        <table class="los mg-b-10">
            <tr class="border">
                <td><b>Diteruskan Kepada Yth.</b></td>

            </tr>
            <tr class="border">
                <td valign="top">
                    <?php
                    $no = 1;
                    foreach ($tujuan as $d) {
                        echo $no . ". " . strtoupper($d['nama_penerima']) . " (";
                        echo strtoupper($d['jabatan']);
                        echo " " . strtoupper($d['nama_unit']) . ")<br>";
                        $no++;
                    }

                    ?>
                </td>

            </tr>

        </table>
        <table class="los mg-b-10">
            <tr class="border">
                <td><b>Untuk</b></td>
                <td></td>
            </tr>
            <tr class="border">
                <td valign="top" width="50%">
                    <?php
                    echo ($data[0]['dijawab'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Dijawab <br>";
                    echo ($data[0]['ditindak_lanjuti'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Ditindak lanjuti <br>";
                    echo ($data[0]['ditanggapi_tertulis'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Ditanggapi tertulis <br>";
                    echo ($data[0]['disiapkan_makalah'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Disiapkan makalah/sambutan atau presentasi sesuai tema <br>";
                    echo ($data[0]['koordinasikan'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Koordinasikan dengan <br>";
                    echo ($data[0]['diwakili'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Diwakili & laporkan hasilnya <br>";
                    echo ($data[0]['dihadiri'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Dihadiri & laporkan hasilnya <br>";
                    echo ($data[0]['disiapkan_surat'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Disiapkan surat/memo dinas(internal) <br>";
                    echo ($data[0]['arsip'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Arsip <br>";

                    ?>


                </td>

                <td valign="top">
                    <?php
                    echo ($data[0]['agendakan'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Agendakan/jadwalkan <br> ";
                    echo ($data[0]['diperhatikan'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Diperhatikan <br>";
                    echo ($data[0]['dijelaskan'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Diberikan penjelasan <br>";
                    echo ($data[0]['diperbaiki'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Diperbaiki <br>";
                    echo ($data[0]['diproses'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Diproses sesuai ketentuan, Peraturan dan UU yang berlaku <br>";
                    echo ($data[0]['diketahui'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Diketahui <br>";
                    echo ($data[0]['dibicarakan'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Dibicarakan dengan saya <br>";
                    echo ($data[0]['lainlain'] == '1') ? "<input type='checkbox' checked='yes' />" : "<input type='checkbox' />";
                    echo " Lain-lain <br>";

                    ?>
                </td>
            </tr>

        </table>
        <table class="los mg-b-10">
            <tr class="border">
                <td><b>Disposisi</b></td>
            </tr>
            <tr class="border">
                <td valign="top">
                    <p><?= $data[0]['pesan'] ?></p>

                </td>
            </tr>

        </table>


        <div class="mg-b-10 size11" align="right">........, <?= date("d-m-Y", strtotime($data[0]['tgl_disposisi'])) ?></div>
        <br><br><br>
        <div class="mg-b-10 size11" align="right"><?= strtoupper($data[0]['nama_lengkap']) ?></div>

    </body>