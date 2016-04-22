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
      Video Today<?php echo $videoToday; ?>
      <br>
      Total Uploaded Video <?php echo $totalVideo; ?>
      <br>
      Accepted Video <?php echo $accVideo; ?>
      <br>
      Declined Video<?php echo $decVideo; ?>
    </main>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pasienCustom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mainCustom.js"></script>
  </body>
</html>
