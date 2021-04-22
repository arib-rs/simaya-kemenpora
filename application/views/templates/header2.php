<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $title ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/'); ?>img/icon.ico">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/font-awesome.min.css">
  <!-- adminpro icon CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/adminpro-custon-icon.css">
  <!-- meanmenu icon CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/meanmenu.min.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery.mCustomScrollbar.min.css">
  <!-- animate CSS
    ============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/animate.css">
  <!-- jvectormap CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jvectormap/jquery-jvectormap-2.0.3.css">

  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/normalize.css">
  <!-- charts CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/c3.min.css">
  <!-- modals CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/modals.css">
  <!-- tabs CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/tabs.css">
  <!-- select2 CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/select2/select2.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/chosen/bootstrap-chosen.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/form.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style2.css">
  <!-- charts CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/charts.css">
  <!-- forms CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/form/all-type-forms.css">
  <!-- duallistbox CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/duallistbox/bootstrap-duallistbox.min.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/responsive.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/data-table/bootstrap-table.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/data-table/bootstrap-editable.css">
  <!-- datapicker CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/datapicker/datepicker3.css">
  <!-- modernizr JS
		============================================ -->
  <script src="<?= base_url('assets/'); ?>js/vendor/modernizr-2.8.3.min.js"></script>

  <!-- jquery
                ============================================ -->
  <script src="<?= base_url('assets/'); ?>js/vendor/jquery-1.11.3.min.js"></script>

  <!-- <script>
    $(document).ready(function() {
      $("#nondinas").hide();
      $("#satker").hide();

      $("#penerima").change(function() {
        if (this.value == 'Dinas') {
          $("#nondinas").hide();
          $("#satker").show();

        } else {
          $("#satker").hide();
          $("#nondinas").show();
        }
      });
    });
  </script> -->
  <script>
    $(document).ready(function() {
      var id_satker = $('#satuan_kerja').val();
      var id_jbtn = $('#jbtn_edit').val();
      if (id_satker != '') {
        $.ajax({
          url: "<?php echo base_url('Utilitas/select_JabatanBySatuanKerja'); ?>",
          method: "POST",
          data: {
            id_satker: id_satker,
            id_jbtn: id_jbtn
          },
          success: function(data) {
            console.log(data)
            $('#jabatan').html(data);
            $('#jabatan').trigger("chosen:updated");


            // var res = $.parseJSON(data);
            // console.log(res);


            // $.each(res, function(index, value) {
            //     console.log(value.jabatan);
            //     var newOption = new Option(value.jabatan, value.id, false, false);
            //     $('#jabatan').append(newOption);
            // })
          }
        })
      }
      $('#satuan_kerja').change(function() {
        var id_satker = $('#satuan_kerja').val();
        var id_jbtn = $('#jbtn_edit').val();
        if (id_satker != '') {
          $.ajax({
            url: "<?php echo base_url('Utilitas/select_JabatanBySatuanKerja'); ?>",
            method: "POST",
            data: {
              id_satker: id_satker,
              id_jbtn: id_jbtn
            },
            success: function(data) {
              console.log(data)
              $('#jabatan').html(data);
              $('#jabatan').trigger("chosen:updated");

            }
          })
        }
      });
    });
  </script>

  <script>
    function lampiranAktif() {
      $("#liLampiran").addClass("active");
      $("#liForm").removeClass("active");
    }

    function approve(id) {
      document.getElementById("id_surat").value = id;

    }
  </script>
</head>

<body class="materialdesign">
  <div class="wrapper-pro">