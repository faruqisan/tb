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
                <li><a href="<?php echo base_url('Admin'); ?>/newVideo">Video Baru</a></li>
                <li><a href="<?php echo base_url('Admin'); ?>/acceptedVideo">Video Diterima</a></li>
                <li><a href="<?php echo base_url('Admin'); ?>/declinedVideo">Video Ditolak</a></li>
                <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
              </ul>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="<?php echo base_url('Admin'); ?>/newVideo">Video Baru</a></li>
              <li><a href="<?php echo base_url('Admin'); ?>/acceptedVideo">Video Diterima</a></li>
              <li><a href="<?php echo base_url('Admin'); ?>/declinedVideo">Video Ditolak</a></li>
              <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <main>
      <div class="container">
        <div class="row">
          <div class="col l12 s12">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Video</span>
              </div>
              <div class="card-action grey lighten-2">
                <div class="row" style="margin-top:-50px;height:5px">
                  <div class="col l12 s12">
                    <a href="#modalVideoInformation" class="modal-trigger btn-floating btn-large waves-effect waves-light right"><i class="material-icons">more_vert</i></a>
                    <div id="modalVideoInformation" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <div class="row">
                          <div class="col l12 s12">
                            <h5>Informasi Video</h5>
                            <div class="divider"></div>
                            <table>
                              <tbody>
                                <tr>
                                  <td>Hari Ini</td>
                                  <td><?php echo $videoToday; ?></td>
                                </tr>
                                <tr>
                                  <td>Baru</td>
                                  <td><a href="<?php echo base_url('Admin'); ?>/newVideo"><?php echo $newVideo; ?></a></td>
                                </tr>
                                <tr>
                                  <td>Diterima</td>
                                  <td><a href="<?php echo base_url('Admin'); ?>/acceptedVideo"><?php echo $accVideo; ?></a></td>
                                </tr>
                                <tr>
                                  <td>Ditolak</td>
                                  <td><a href="<?php echo base_url('Admin'); ?>/declinedVideo"><?php echo $decVideo; ?></a></td>
                                </tr>
                                <tr>
                                  <td>Total</td>
                                  <td><?php echo $totalVideo; ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col l12 s12">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Pasien</span>
              </div>
              <div class="card-action grey lighten-2">
                <div class="row" style="margin-top:-50px;height:5px">
                  <div class="col l12 s12">
                    <a href="#modalPasienInformation" class="modal-trigger btn-floating btn-large waves-effect waves-light right"><i class="material-icons">more_vert</i></a>
                    <div id="modalPasienInformation" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <div class="row">
                          <div class="col l12 s12">
                            <h5>Informasi Pasien</h5>
                            <div class="divider"></div>
                            <table>
                              <tbody>
                                <tr>
                                  <td>Pasien</td>
                                  <td><?php echo $totalPasien; ?></tr>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col l12 s12">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Dokter</span>
              </div>
              <div class="card-action grey lighten-2">
                <div class="row" style="margin-top:-50px;height:5px">
                  <div class="col l12 s12">
                    <a href="#modalDokterInformation" class="modal-trigger btn-floating btn-large waves-effect waves-light right"><i class="material-icons">more_vert</i></a>
                    <div id="modalDokterInformation" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <div class="row">
                          <div class="col l12 s12">
                            <h5>Informasi Dokter</h5>
                            <div class="divider"></div>
                            <table>
                              <tbody>
                                <tr>
                                  <td>Pasien</td>
                                  <td><?php echo $totalPasien; ?></tr>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pasienCustom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mainCustom.js"></script>
  </body>
</html>
