<!DOCTYPE html>
<html>
  <head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>TB Smart | Pasien | Profile</title>
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
                <li><a href="<?php echo base_url('Pasien'); ?>">Beranda</a></li>
                <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
              </ul>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="<?php echo base_url('Pasien'); ?>">Beranda</a></li>
              <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <section id="main">
      <div class="row">
        <div class="col l12 s12">
          <h4 class="center-align"><?php echo $this->session->userdata('login')['firstname'] ?>'s Profile</h4>
        </div>
      </div>
      <div class="container">

        <?php if($listUserVideo!=null){ ?>
          <?php foreach($listUserVideo as $row){ ?>
            <div class="row">
              <div class="col l12 s12">
                <div class="card">
                  <div class="card-content">
                    <div class="chip">
                      <img src="<?php echo base_url(); ?>assets/img/profile.jpg" alt="Contact Person">
                      <?php echo $this->session->userdata('login')['firstname'].$this->session->userdata('login')['lastname'] ?>
                    </div>
                    <div class="chip">
                      <?php if($row->approved_status == 'ACCEPTED'){ ?>
                        <p class="green-text"><b>DITERIMA</b></p>
                      <?php }else if($row->approved_status == 'DECLINED'){ ?>
                        <p class="red-text"><b>DITOLAK</b> Oleh : <?php echo $row->email ?></p>
                      <?php }else{ ?>
                        <p class="orange-text"><b>MENUNGGU</b></p>
                      <?php } ?>
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
                      <div class="col s12">
                        <p>Di unggah pada : <b><?php echo $row->upload_time ?></b></p>
                      </div>
                      <div class="col s12">
                        <p>Keterangan : <b><?php echo $row->keterangan ?></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="card-action grey lighten-2 center">
                    <a href="#modal<?php echo $row->id ?>delete" class="orange-text modal-trigger btn-flat waves-effect waves-light"><i class="material-icons">delete</i>Hapus Video</a>
                    <div id="modal<?php echo $row->id ?>delete" class="modal">
                      <div class="modal-content">
                        <h4>Hapus Video</h4>
                        <div class="row">
                          <div class="col l12 s12">
                            <p>Yakin Hapus Video Ini ?</p>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button onclick="deleteVideo(<?php echo $row->id ?>)" class=" modal-action modal-close waves-effect waves-red btn-flat">Hapus</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php }else{ ?>
          <h5 class="center-align">Belum Ada Video</h5>
        <?php } ?>

      </div>

      <div class="fixed-action-btn horizontal" style="bottom: 15px; right: 15px;">
        <a class="btn-floating btn-large teal">
          <i class="large material-icons">menu</i>
        </a>
        <ul>
          <li><a href="#modalVideo" class="modal-trigger btn-floating yellow darken-1"><i class="material-icons">videocam</i></a></li>
        </ul>
      </div>
      <div id="modalVideo" class="modal bottom-sheet">
        <?php $attributes = array('enctype' => 'multipart/form-data');?>
        <?php echo form_open('Pasien/submitVideo', $attributes); ?>
        <!--<form action="submitVideo" method="post" enctype="multipart/form-data">-->
          <div class="modal-content">
            <div class="row">
              <h4 class="center">Upload Video</h4>
              <div class="input-field col l10 s10">
                <input type="file" accept="video/*" capture="camera" name="video">
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
    </section>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pasienCustom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mainCustom.js"></script>
    <?php $uploadResult=$this->session->flashdata('uploadResult'); ?>
    <?php if(isset($uploadResult)) {?>
      <script type="text/javascript">
        Materialize.toast('<?php echo $this->session->flashdata('uploadResult'); ?>', 4000);
      </script>
    <?php } ?>
  </body>
</html>
