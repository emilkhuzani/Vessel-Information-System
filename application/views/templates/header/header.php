<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VIS Telkomsat | Map</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/notif/notifications.css">
  <script src="<?php echo base_url('assets');?>/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url('assets');?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets');?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets');?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets');?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url('assets');?>/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="<?php echo base_url('assets');?>/dist/js/adminlte.min.js"></script>
  <script src="<?php echo base_url('assets');?>/plugins/notif/notifications.js"></script>
  <script src="<?php echo base_url('assets');?>/dist/js/demo.js"></script>
  
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url();?>" class="navbar-brand"><b>VIS</b>Tsat</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">GPS System <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url();?>index.php/monitor">All</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url();?>index.php/monitor/idirect">iDirect</a></li>
                <li><a href="<?php echo base_url();?>index.php/monitor/tisa">TISA</a></li>
                <li><a href="<?php echo base_url();?>index.php/monitor/idp">IDP</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Vessels List<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url();?>index.php/vessels/idirect">iDirect</a></li>
                <li><a href="<?php echo base_url();?>index.php/vessels/tisa">TISA</a></li>
                <li><a href="<?php echo base_url();?>index.php/vessels/idp">IDP</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search Vessel">
            </div>
          </form>
        </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('assets')?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $this->session->userdata('ses_nama_user')?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="<?php echo base_url('assets')?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $this->session->userdata('ses_nama_user');?>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?php echo base_url();?>/index.php/login/logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  
