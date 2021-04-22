<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title>Tanda Terima</title>
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
                font-size: 18px;
                border-collapse: collapse;
                /* width: 100%; */

            }

            tr {}

            td {
                padding: 5px 5px 20px 5px;

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

            .mg-b-20 {
                margin-bottom: 20px;
            }

            .mg-b-50 {
                margin-bottom: 50px;
            }

            .mg-b-100 {
                margin-bottom: 100px;
            }

            .mg-b-10 {
                margin-bottom: 10px;
            }
        </style>
    </head>

    <body>
<!--         <div class="mg-b-10" align="center"><img width="150px" height="150px" src="<?= base_url('assets/img/kemenpora_logo.png') ?>" /></div>
 -->
        <div>
            <h2 align="center">KEMENTERIAN PEMUDA DAN OLAHRAGA RI</h2>
        </div>


        <div class="mg-b-10" align="center">Jl. Gerbang Pemuda No.3 Senayan, Jakarta Pusat 10270</div>
        <hr style="color:black" class="mg-b-20">
        <div class="mg-b-50">
            <h2 align="center">TANDA TERIMA</h2>
        </div>
        <table class="mg-b-100" align="center">
            <tr>
                <td width="150px">Asal Surat </td>
                <td width="30px">:</td>
                <td><?= $data[0]['pengirim'] ?></td>
            </tr>
            <tr>
                <td>Nomor Surat</td>
                <td>:</td>
                <td><?= $data[0]['no_surat'] ?></td>
            </tr>
            <tr>
                <td>Nomor Agenda</td>
                <td>:</td>
                <td><?= $data[0]['no_agenda'] ?></td>
            </tr>
            <tr>
                <td>Asal Surat</td>
                <td>:</td>
                <td><?= $data[0]['pengirim'] ?></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>:</td>
                <td>1500 928</td>
            </tr>
        </table>



        <div class="mg-b-20 " style="font-size:18px" align="right">Jakarta, <?= date("d-m-Y", strtotime($data[0]['tgl_terima_surat'])) ?></div>
        <br><br><br><br>
        <div class="mg-b-20 " style="font-size:18px" align="right"><?= strtoupper($data[0]['nama_registrator']) ?></div>

    </body>