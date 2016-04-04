<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>ServerManagement</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/pikaday.css"/>
   
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/pikaday.js"></script>

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>">ServerManagement</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url(). 'racks'; ?>">Racks</a></li>
        <li><a href="<?php echo base_url(). 'devices'; ?>">Devices</a></li>
        <li><a href="<?php echo base_url(). 'hdd'; ?>">HDD</a></li>
        <li><a href="<?php echo base_url(). 'ipmi'; ?>">IPMI</a></li>
      <!-- not functional <li><a href="<?php echo base_url(). 'network'; ?>">Network</a></li> -->
        <li><a href="<?php echo base_url(). 'events'; ?>">Events</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">