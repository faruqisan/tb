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
            </ul>
            <ul id="dropdownProfile" class="dropdown-content">
              <li><a href="<?php echo base_url('Admin'); ?>/newVideo">Video Baru</a></li>
              <li><a href="<?php echo base_url('Admin'); ?>/acceptedVideo">Video Diterima</a></li>
              <li><a href="<?php echo base_url('Admin'); ?>/declinedVideo">Video Ditolak</a></li>
              <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
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
    <section id="main">
      <div class="row">
        <div class="col s12" style="padding:0px">
          <ul class="tabs">
            <li class="tab col s3"><a href="#tabVideo">Video</a></li>
            <li class="tab col s3"><a class="active" href="#tabPasien">Pasien</a></li>
            <li class="tab col s3"><a href="#tabDokter">Dokter</a></li>
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
        <div id="tabDokter" class="col s12">
          <div class="container">
            <div class="row">
              <div class="col l12 s12">
                <h5 class="center-align">Informasi Dokter</h5>
                <div class="divider"></div>
                <table class="bordered striped">
                  <tbody>
                    <tr>
                      <td>Jumlah Dokter</td>
                      <td><b><?php echo $totalDokter." "; ?></b>Orang</tr>
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
                    <?php foreach ($listDokter as $row) { ?>
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
      <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large blue lighten-2">
          <i class="large material-icons">menu</i>
        </a>
        <ul>
          <li><a href="#modalRegisterUser" class="modal-trigger btn-floating red"><i class="material-icons">person_add</i></a></li>
        </ul>
      </div>
      <div id="modalRegisterUser" class="modal bottom-sheet">
        <form action="Admin/registerUser" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="row">
              <h4 class="center">Pendaftaran User</h4>
              <div class="input-field col l12 s12">
                <label class="active">Tipe User</label>
                <select class="browser-default" name="privilage">
                  <option value="" disabled selected>Pilih Tipe User</option>
                  <option value="1">Pasien</option>
                  <option value="3">Dokter</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="input-field col l12 s12">
                <input type="email" id="email" name="email" class="validate" required="">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col l12 s12">
                <input type="password" id="password" name="password" class="validate" required="">
                <label for="password">Password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col l6 s6">
                <input type="text" id="firstname" name="firstname" required="">
                <label for="firstname">Nama Depan</label>
              </div>
              <div class="input-field col l6 s6">
                <input type="text" id="lastname" name="lastname" required="">
                <label for="lastname">Nama Belakang</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col l12 s12">
                <input type="text" id="phone" name="phone" required="">
                <label for="phone">Nomor Handphone</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col l12 s12">
                <input type="date" name="dob" id="dob">
                <label class="active" for="dob">Tanggal Lahir</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col l12 s12">
                <textarea id="address" name="address" class="materialize-textarea"></textarea>
                <label for="address">Alamat</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="row">
              <div class="col l12 s12">
                <button type="submit" name="action" class="btn modal-action modal-close waves-effect waves-green">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pasienCustom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mainCustom.js"></script>
    <?php $registerResult=$this->session->flashdata('registerResult'); ?>
    <?php if(isset($registerResult)) {?>
      <script type="text/javascript">
        Materialize.toast('<?php echo $this->session->flashdata('registerResult'); ?>', 4000);
      </script>
    <?php } ?>
  </body>
</html>
