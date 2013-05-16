<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Daemon Master</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=base_url();?>css/bootstrap.css" rel="stylesheet" rel="stylesheet">
    <link href="<?=base_url();?>css/style.css" rel="stylesheet" rel="stylesheet">
    <link href="<?=base_url();?>css/bootstrap-responsive.css" rel="stylesheet"> 
    

  </head>
  <body>
  
      <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?=site_url();?>">Daemon Master</a>
          <div class="nav-collapse collapse">
           <ul class="nav pull-right">
                    <li id="fat-menu" class="dropdown">
                      <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">Logged in as <?=$un?><b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Profile and Settings</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('scenario/create');?>">Create scenario</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('install/overview');?>">Module management</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('install');?>">Install Module</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('auth/logout');?>">Logout</a></li>
                      </ul>
                    </li>
                  </ul>
            <ul class="nav">
              <li class="active"><a href="<?=site_url();?>">Home</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
       
    <div class="container">