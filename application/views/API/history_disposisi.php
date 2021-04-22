<head>
  <style type="text/css">
    body{background:white;}
    
  </style>
</head>
 <div class="sparkline13-graph">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <h4><b>Histori Disposisi</b></h4>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="project-details-mg">
                                                        <div class="row col-lg-12">
                                                            <table align="center" style="text-align:left;">
                                                                <?php
                                                                $tgl = '';
                                                                $pengirim = '';
                                                                foreach ($histori as $d) { ?>


                                                                    <tr>
                                                                        <?php

                                                                            if ($tgl != date("d-m-Y H:m", strtotime($d['tgl_disposisi']))) {
                                                                                echo "<td style='padding:5px 20px'>
                                                                                <div class='label label-default'>" . date('d-m-Y H:m', strtotime($d['tgl_disposisi'])) . "</div>
                                                                                </td>";
                                                                            } else {
                                                                                echo "<td></td>";
                                                                            }
                                                                            if ($pengirim != $d['pengirim']) {
                                                                                echo  "<td style='padding:5px 20px'>" . $d['pengirim'] . " (" . $d['jabatan_pengirim'] . " " . $d['unit_pengirim'] . ")</td>";
                                                                            } else {
                                                                                echo "<td></td>";
                                                                            }
                                                                            ?>

                                                                        <td style="padding:5px 10px"> <span class="fa big-icon fa-arrow-right"></span> </td>
                                                                        <td style="padding:5px 20px"><?= $d['penerima'] . " (" . $d['jabatan_penerima'] . " " . $d['unit_penerima'] . ")" ?></td>
                                                                        <?php

                                                                            $tgl = date("d-m-Y H:m", strtotime($d['tgl_disposisi']));
                                                                            $pengirim = $d['pengirim'];
                                                                            ?>
                                                                    </tr>

                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
