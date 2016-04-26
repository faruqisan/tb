<!DOCTYPE html>
<html>
  <head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>TB Smart | Admin</title>
  </head>
  <body class="grey lighten-3">
    <header>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper">
            <a href="#!" class="brand-logo center">TB Smart</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li>
                <a class="dropdown-button" href="#!" data-activates="dropdownProfile">
                  <i class="material-icons left">account_circle</i>
                  <?php echo $this->session->userdata('login')['firstname']; ?>
                  <?php echo $this->session->userdata('login')['lastname']; ?>
                  <i class="material-icons right">arrow_drop_down</i>
                </a>
              </li>
              <ul id="dropdownProfile" class="dropdown-content">
                <li><a href="<?php echo base_url('Admin'); ?>">Beranda</a></li>
                <li><a href="<?php echo base_url('Admin'); ?>/acceptedVideo">Video Diterima</a></li>
                <li><a href="<?php echo base_url('Admin'); ?>/declinedVideo">Video Ditolak</a></li>
                <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
              </ul>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="<?php echo base_url('Admin'); ?>">Beranda</a></li>
              <li><a href="<?php echo base_url('Admin'); ?>/acceptedVideo">Video Diterima</a></li>
              <li><a href="<?php echo base_url('Admin'); ?>/declinedVideo">Video Ditolak</a></li>
              <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <main>
      <div class="row">
        <div class="col l12 s12">
          <h4 class="center-align">Video Baru</h4>
        </div>
      </div>
      <div class="container">
        <?php if($unApprovedVideo!=null){ ?>
          <?php foreach($unApprovedVideo as $row){ ?>
            <div class="row" style="max-height:200px">
              <div class="col l12 s12">
                <div class="card">
                  <div class="card-content">
                    <div class="chip">
                      <img src="<?php echo base_url(); ?>assets/img/profile.jpg" alt="Contact Person">
                      <?php echo ucfirst($row->firstname).' '.ucfirst($row->lastname) ?>
                    </div>
                    <i class="material-icons right activator">more_vert</i>
                  </div>
                  <div class="card-image">
                    <video class="responsive-video" controls>
                      <source src="<?php echo base_url().$row->video_link; ?>">
                    </video>
                  </div>
                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Informasi<i class="material-icons right">close</i></span>
                    <div class="row">
                      <div class="col l12 s12">
                        <p>Di unggah pada : <b><?php echo $row->upload_time ?></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="card-action grey lighten-2">
                    <div class="row">
                      <div class="col l6 s12">
                        <a style="width:100%" href="#modal<?php echo $row->id ?>terima" class="white-text modal-trigger waves-effect waves-light btn"><i class="material-icons left">check</i>Terima</a>
                        <div id="modal<?php echo $row->id ?>terima" class="modal">
                          <div class="modal-content">
                            <h4>Terima Video</h4>
                            <div class="row">
                              <div class="input-field col l12 s12">
                                <input type="text" id="keteranganTerima<?php echo $row->id ?>"></input>
                                <label for="keteranganTerima<?php echo $row->id ?>">Keterangan</label>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button onclick="acceptVideo(<?php echo $row->id ?>)" class=" modal-action modal-close waves-effect waves-green btn-flat">Terima</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col l6 s12">
                        <a style="width:100%" href="#modal<?php echo $row->id ?>tolak" class="white-text modal-trigger waves-effect waves-light btn red lighten-2"><i class="material-icons left">close</i>Tolak</a>
                        <div id="modal<?php echo $row->id ?>tolak" class="modal">
                          <div class="modal-content">
                            <h4>Tolak Video</h4>
                            <div class="row">
                              <div class="input-field col l12 s12">
                                <input type="text" id="keteranganTolak<?php echo $row->id ?>"></input>
                                <label for="keteranganTolak<?php echo $row->id ?>">Keterangan</label>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button onclick="declineVideo(<?php echo $row->id ?>)" class=" modal-action modal-close waves-effect waves-red btn-flat">Tolak</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php }else{ ?>
          <h5 class="center-align">Belum Ada Video Baru</h5>
        <?php } ?>
      </div>
    </main>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/adminCustom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mainCustom.js"></script>
  </body>
</html>
