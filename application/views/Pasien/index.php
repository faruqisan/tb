<!DOCTYPE html>
<html>
  <head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>TB Smart | Beranda</title>
  </head>
  <body class="grey lighten-3">
    <header>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper">
            <a href="#!" class="brand-logo center">Beranda</a>
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
                <li><a href="<?php echo base_url('Pasien/profile'); ?>">Profile</a></li>
                <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
              </ul>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="<?php echo base_url('Pasien/profile'); ?>">Profile</a></li>
              <li><a href="<?php echo base_url('Login'); ?>/doLogout">Logout</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <section id="main">

      <div class="container">
        <?php if($anotherUserVideo!=null){ ?>
          <?php foreach($anotherUserVideo as $row){ ?>
            <div class="row">
              <div class="col l12 s12" style="padding:0px">
                <div class="card">
                  <div class="card-content">
                    <div class="chip">
                      <img src="<?php echo base_url(); ?>assets/img/profile.jpg" alt="Contact Person">
                      <?php echo $row->firstname.$row->lastname ?>
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
                  <div class="card-action">
                    <div class="row">
                      <div class="col l6 s12">
                        <a onclick="loadComment(<?php echo $row->id ?>);" class="waves-effect waves-light btn-flat modal-trigger black-text" href="#modalViewKomentar<?php echo $row->id ?>"><i class="material-icons left">pageview</i>Lihat Komentar</a>
                        <div id="modalViewKomentar<?php echo $row->id ?>" class="modal" style="width:100%">
                          <div class="modal-content">
                            <h4>List Komentar</h4>
                            <ul class="collection" id="modalCommentContent<?php echo $row->id ?>">
                            </ul>
                          </div>
                          <div class="modal-footer">
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
                          </div>
                        </div>
                      </div>
                      <div class="col l6 s12">
                        <a class="waves-effect waves-light btn-flat modal-trigger black-text" href="#modalKomentar<?php echo $row->id ?>"><i class="material-icons left">comment</i>Tambahkan Komentar</a>
                        <div id="modalKomentar<?php echo $row->id ?>" class="modal bottom-sheet">
                          <div class="modal-content">
                            <h5>Tambahkan Komentar Anda</h5>
                            <textarea id="textarea<?php echo $row->id ?>" class="materialize-textarea" length="120"></textarea>
                            <label for="textarea<?php echo $row->id ?>">Komentar</label>
                          </div>
                          <div class="modal-footer" >
                            <button onclick="submitKomentar(<?php echo $row->id ?>)" class=" modal-action modal-close waves-effect waves-green btn-flat">Kirim</button>
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
          <h5 class="center-align">Belum Ada Video</h5>
        <?php } ?>
      </div>

      <div class="fixed-action-btn horizontal" style="bottom: 15px; right: 15px;">
        <a class="btn-floating btn-large teal">
          <i class="large material-icons">menu</i>
        </a>
        <ul>
          <li><a href="#modalChat" class="modal-trigger btn-floating blue darken-1"><i class="material-icons">chat</i></a></li>
          <li><a href="#modalVideo" class="modal-trigger btn-floating yellow darken-1"><i class="material-icons">videocam</i></a></li>
        </ul>
      </div>
      <div id="modalChat" class="modal modal-fixed-footer" style="width:100%">
        <div class="modal-content">
          <div class="row">
            <div class="col l12 s12" style="padding:0px">
              <h4>Chat Dokter</h4>
              <ul class="collection">
                <?php foreach($listDokter as $row){ ?>
                  <li class="collection-item avatar">
                    <i class="material-icons circle green">local_hospital</i>
                    <span class="title"><b><?php echo ucfirst($row->firstname).' '.ucfirst($row->lastname); ?></b></span>
                    <p>
                       <?php echo $row->email;?>
                    </p>
                    <a href="<?php echo base_url('Pasien/chat').'/'.$row->id; ?>" class="secondary-content"><i class="material-icons">chat</i></a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Tutup</a>
        </div>
      </div>

      <div id="modalVideo" class="modal bottom-sheet">
        <form action="Pasien/submitVideo" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="row" style="margin-top:-25px">
              <div class="file-field input-field col l12 s12">
                <blockquote>
                  Maksimal durasi video 10 detik<br>Upload di jam 6 - 10 pagi
                </blockquote>
                <div class="btn">
                  <span><i class="material-icons">videocam</i></span>
                  <input type="file" accept="video/*" capture="camera" name="video">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Rekam Video, atau pilih dari penyimpanan">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer" >
            <div class="row" style="margin-top:-20px">
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
        //alert("<?php echo $this->session->flashdata('uploadResult'); ?>");
        Materialize.toast('<?php echo $this->session->flashdata('uploadResult'); ?>', 4000);
      </script>
    <?php } ?>
  </body>
</html>
