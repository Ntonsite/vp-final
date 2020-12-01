<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">  
    <script type="text/javascript" src="<?php echo base_url('assets/DataTables/js/jquery.dataTables.min.js')?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/css/dataTables.bootstrap.min.css') ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/css/jquery.dataTables.min.css') ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/css/dataTables.semanticui.min.css') ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/css/dataTables.foundation.min.css') ?>">

    <title>Vendor Management Portal</title>
    <style type="text/css">
      body{
        background-color: #E8EFF2; 
      }
  </style>
  </head>
  <body>
    <div class="container-fluid">
      <!-- NAVIGATION -->
      <nav class="navbar navbar-expand-md navbar-light bg-light">
          <a class="navbar-brand" href="#">Contract & License Portal</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbarNavDropdown" class="navbar-collapse collapse">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('group') ?>">Groups</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('role') ?>">Roles</a>
                  </li>
              </ul>
              <ul class="navbar-nav">
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Other Settings
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a onClick="javascript: return confirm('Are you sure, you want to logout?');" class="dropdown-item" href="<?php echo site_url('admin/logout') ?>">Logout<i class="fas fa-out"></i></a>
                  </div>
                </div>
              </ul>
          </div>
      </nav>
      <!-- Container DIV end here -->
      <!-- Modal for Change Password here -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action="<?php echo site_url('user/changePassword') ?>" enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Old Password</label>
                              <input required="" type="password" class="form-control" name="old_pass" aria-describedby="emailHelp" placeholder="Old password">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">New Password</label>
                              <input required="" type="password" class="form-control" name="new_pass" aria-describedby="emailHelp" placeholder="New password">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Confirm new Password</label>
                              <input required="" type="password" class="form-control" name="conf_pass" aria-describedby="emailHelp" placeholder="Confirm new Password">
                          </div>
                          <button type="submit" class="btn btn-primary" value="save">Submit</button>
                           <a href="<?php echo site_url('dashboard')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
                      </form>
                  </div>
              </div>
          </div>
</div>


   
