<html>
  <head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>TB Smart | Pasien</title>
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
                <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
              </ul>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
            </ul>
          </div>
        </nav>
      </div>

    </header>
    <main>
      <!--<input type="file" accept="video/*;capture=camcorder">-->
      <div class="fixed-action-btn horizontal" style="bottom: 15px; right: 15px;">
        <a class="btn-floating btn-large teal">
          <i class="large material-icons">menu</i>
        </a>
        <ul>
          <li><a href="#modalVideo" class="modal-trigger btn-floating yellow darken-1"><i class="material-icons">videocam</i></a></li>
        </ul>
      </div>
      <div id="modalVideo" class="modal bottom-sheet">
        <form action="Pasien/submitVideo" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="row">
              <h4 class="center">Upload Video</h4>
              <div class="input-field col l10 s10">
                <input type="file" name="video">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="row">
              <div class="col l12 s12">
                <button type="submit" name="action" class="btn modal-action modal-close waves-effect waves-green">Upload</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pasienCustom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mainCustom.js"></script>
  </body>
</html>
