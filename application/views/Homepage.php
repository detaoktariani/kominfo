<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - P2JN Provinsi Bengkulu</title>

    <!-- Bootstrap Core CSS -->
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('/assets/img/pu.png')?>"/>
    <script src="<?php echo base_url('asset/js/jquery.min.js')?>"></script>
    <link href="<?php echo base_url('asset/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/css/sb-admin.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/css/creative.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/css/dataTables.bootstrap.css')?>" rel="stylesheet" >
    <script src="<?php echo base_url('asset/js/jquery-ui-1.9.2.custom.min.js')?>"></script>
    <script src="<?php echo base_url('asset/tinymce/js/tinymce/tinymce.dev.js')?>"></script>
    <script src="<?php echo base_url('asset/tinymce/js/tinymce/plugins/table/plugin.dev.js')?>"></script>
    <script src="<?php echo base_url('asset/tinymce/js/tinymce/plugins/paste/plugin.dev.js')?>"></script>
    <script src="<?php echo base_url('asset/tinymce/js/tinymce/plugins/wordcount/plugin.js')?>"></script>
    <script src="<?php echo base_url('asset/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js')?>"></script>

  
</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand">Kehadiran Kominfo Provinsi Bengkulu</a>
            </div>
           
      
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white" ><i class="fa fa-2x fa-user" style="color:white" ></i>  Administrator <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li><a href="<?php echo base_url('Clogin/logout') ?>"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                    </ul>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo base_url('Homepage/index') ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('Homepage/grafik') ?>"><i class="fa fa-fw fa-dashboard"></i> Grafik</a>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <b><h2 class="page-header">
                            Form kehadiran KOMINFO BENGKULU
                        </h2></b>
                    </div>
                </div>
                <div class="wrapper">
            <?php $this->load->view($isi);?>
        </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>    
    <script src="<?php echo base_url('asset/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/dataTables.bootstrap.js');?>"></script>
    <script src="<?php echo base_url('asset/js/creative.js');?>"></script>
    <script src="<?php echo base_url('asset/js/scripts.js');?>"></script>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
             $('#dataTable').dataTable();
        } );
    </script>

</body>

</html>
