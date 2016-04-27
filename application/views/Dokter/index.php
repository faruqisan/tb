<!DOCTYPE html>
<html>
  <head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>TB Smart | Dokter</title>
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
            </ul>
            <ul id="dropdownProfile" class="dropdown-content">
              <li><a href="<?php echo base_url('Dokter'); ?>/newVideo">Video Baru</a></li>
              <li><a href="<?php echo base_url('Dokter'); ?>/acceptedVideo">Video Diterima</a></li>
              <li><a href="<?php echo base_url('Dokter'); ?>/declinedVideo">Video Ditolak</a></li>
              <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="<?php echo base_url('Dokter'); ?>/newVideo">Video Baru</a></li>
              <li><a href="<?php echo base_url('Dokter'); ?>/acceptedVideo">Video Diterima</a></li>
              <li><a href="<?php echo base_url('Dokter'); ?>/declinedVideo">Video Ditolak</a></li>
              <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <main>
      <div class="row">
        <div class="col s12" style="padding:0px">
          <ul class="tabs">
            <li class="tab col s3"><a class="active" href="#tabVideo">Video</a></li>
            <li class="tab col s3"><a href="#tabPasien">Pasien</a></li>
          </ul>
        </div>
        <div id="tabVideo" class="col s12">
          <div class="container">
            <div class="row">
              <div class="col l12 s12">
                <h5 class="center-align">Informasi Video</h5>
                <div class="divider"></div>
                <table class="bordered striped">
                  <tbody>
                    <tr>
                      <td>Hari Ini</td>
                      <td><?php echo $videoToday; ?></td>
                    </tr>
                    <tr>
                      <td>Baru</td>
                      <td><a href="<?php echo base_url('Dokter'); ?>/newVideo"><?php echo $newVideo; ?></a></td>
                    </tr>
                    <tr>
                      <td>Diterima</td>
                      <td><a href="<?php echo base_url('Dokter'); ?>/acceptedVideo"><?php echo $accVideo; ?></a></td>
                    </tr>
                    <tr>
                      <td>Ditolak</td>
                      <td><a href="<?php echo base_url('Dokter'); ?>/declinedVideo"><?php echo $decVideo; ?></a></td>
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
        </div>
        <div id="tabPasien" class="col s12">
          <div class="container">
            <div class="row">
              <div class="col l12 s12">
                <h5 class="center-align">Informasi Pasien</h5>
                <div class="divider"></div>
                <table class="bordered striped">
                  <tbody>
                    <tr>
                      <td>Jumlah Pasien</td>
                      <td><b><?php echo $totalPasien." "; ?></b>Orang</tr>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col l12 s12">
                <table class="bordered striped responsive-table">
                  <thead>
                    <tr>
                      <th>Email</th>
                      <th>Nama</th>
                      <th>Tanggal Lahir</th>
                      <th>No. HP</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listPasien as $row) { ?>
                      <tr>
                        <td><?php echo $row->email ?></td>
                        <td><?php echo $row->firstname." ".$row->lastname ?></td>
                        <td><?php echo $row->dob ?></td>
                        <td><?php echo $row->phone ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/adminCustom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dokterCustom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mainCustom.js"></script>
  </body>
</html>
