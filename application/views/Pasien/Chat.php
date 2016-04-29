<!DOCTYPE html>
<html>
  <head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>TB Smart | Chat</title>
  </head>
  <body class="grey lighten-3" style="display: flex;min-height: 100vh;;flex-direction: column;">
    <header>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper">
            <a href="#!" class="brand-logo center">Chat</a>
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
                <?php if($this->session->userdata('login')['privilage']=='Pasien'){ ?>
                  <li><a href="<?php echo base_url('Pasien'); ?>">Beranda</a></li>
                  <li><a href="<?php echo base_url('Pasien/profile'); ?>">Profile</a></li>
                <?php }else{ ?>
                  <li><a href="<?php echo base_url('Dokter'); ?>">Beranda</a></li>
                <?php } ?>
                <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
              </ul>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <?php if($this->session->userdata('login')['privilage']=='Pasien'){ ?>
                <li><a href="<?php echo base_url('Pasien'); ?>">Beranda</a></li>
                <li><a href="<?php echo base_url('Pasien/profile'); ?>">Profile</a></li>
              <?php }else{ ?>
                <li><a href="<?php echo base_url('Dokter'); ?>">Beranda</a></li>
              <?php } ?>
              <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <main id="main" style="flex: 1 0 auto;height:300px;overflow-y:scroll;overflow-x:hidden">
      <div class="container">
        <div class="row">
          <div class="col l12 s12" style="width:100%">
            <?php if($chat!=false){ ?>
              <ul class="collection" id="chatContainer">
                <?php foreach($chat as $row){ ?>
                  <?php if($row->sender_id == $this->session->userdata('login')['id']&&$row->receiver_id==$idPasien){ ?>
                      <li class="collection-item right-align" style="margin-top:5px;">
                        <!--<span class="title"><?php echo ucfirst($this->session->userdata('login')['firstname']).' '.ucfirst($this->session->userdata('login')['lastname']) ?></span>-->
                        <p class="right-align">
                           <?php echo $row->chat; ?>
                        </p>
                      </li>
                  <?php }else if($row->sender_id == $idPasien&&$row->receiver_id==$this->session->userdata('login')['id']){ ?>
                      <li class="collection-item grey darken-1 white-text" style="margin-top:5px">
                        <!--<span class="title "><?php echo ucfirst($dataDokter[0]->firstname).' '.ucfirst($dataDokter[0]->lastname) ?></span>-->
                        <p class="left-align">
                           <?php echo $row->chat; ?>
                        </p>
                      </li>
                  <?php } ?>
                <?php } ?>
              </ul>
            <?php }?>
          </div>
        </div>
      </div>

    </main>
    <footer class="page-footer white" style="margin-top:0px;">
      <div class="container">
        <div class="row" style="padding:0px">
          <div class="input-field col s10">
            <input id="chatText" type="text">
            <label for="chatText white-text">Pesan ke <?php echo ucfirst($dataDokter[0]->firstname).' '.ucfirst($dataDokter[0]->lastname) ?></label>
          </div>
          <div class="input-field col s2" style="padding:0px;">
            <i onclick="sendChat(<?php echo $dataDokter[0]->id ?>)" class="material-icons teal-text" style="margin-top:18px;margin-left:10px">send</i>
          </div>
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chatCustom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mainCustom.js"></script>
    <?php if($chat==false){ ?>
      <script type="text/javascript">
        Materialize.toast('Belum ada chat dengan <?php echo $dataDokter[0]->firstname.' '.$dataDokter[0]->lastname; ?>', 4000);
      </script>
    <?php }?>
  </body>
</html>
