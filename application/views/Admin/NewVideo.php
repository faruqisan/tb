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
                    <div class="row">
                      <div class="col s12">
                        <a href="<?php echo $row->id_user ?>"><?php echo ucfirst($row->firstname).' '.ucfirst($row->lastname) ?></a>
                      </div>
                      <div class="col s12">
                        <p><?php echo $row->upload_time ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col l12 s12">
                        <video controls style="width:100% !important;height:auto !important;">
                          <source src="<?php echo base_url().$row->video_link; ?>" type="video/mp4">
                        </video>
                      </div>
                    </div>
                  </div>
                  <div class="card-action grey lighten-2">
                    <div class="row" style="margin-top:-50px">
                      <div class="col l6 s6">
                        <a href="#modal<?php echo $row->id ?>tolak" class="modal-trigger btn-floating btn-large waves-effect waves-light red"><i class="material-icons">close</i></a>
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
                      <div class="col l6 s6">
                        <a href="#modal<?php echo $row->id ?>terima" class="modal-trigger btn-floating btn-large waves-effect waves-light teal right"><i class="material-icons">check</i></a>
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