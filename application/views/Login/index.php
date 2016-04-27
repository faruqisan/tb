<!DOCTYPE html>
<html>
  <head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>TB Smart</title>
  </head>
  <body class="grey lighten-3">
    <header>
      <?php $loginResult=$this->session->flashdata('loginResult'); ?>
      <?php if(isset($loginResult)) {?>
        <script type="text/javascript">
          alert("<?php echo $this->session->flashdata('loginResult'); ?>");
        </script>
      <?php } ?>
    </header>
    <div class="parallax-container" style="height:100vh">
        <div class="parallax" ><img src=""></div>
        <div class="row">
          <div class="col l12 s12">
            <div class="row">
              <div class="col l12 s12">
                <h1 class="center-align"><b>TB Smart</b></h1><br>
                <h4 class="center-align" style="margin-top:-25px"><b>Mari Lawan Tuberkolosis</b></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section red lighten-2">
        <div class="row"style="margin-top:-115px">
          <div class="col l4 s12 offset-l4" >
            <div class="card hoverable">
              <form action="Login/doLogin" method="post">
                <div class="card-content center">
                  <!-- go to down button -->
                  <button onclick="scroll(loginCard)" onmouseover="setOpacity(1)" onmouseout="setOpacity(0.6)" class="btn-floating btn-large waves-effect waves-light grey lighten-2" type="button" id="downArrow" style="margin-top:-65px;opacity:0.6">
                    <i class="material-icons black-text">keyboard_arrow_down</i>
                  </button>
                  <h4 class="center-align">Silahkan Masuk</h4>
                </div>
                <div class="card-content">
                  <div class="row">
                    <div class="input-field col l12 s12">
                      <i class="material-icons prefix">email</i>
                      <input type="email" id="email" name="email" class="validate" required="">
                      <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col l12 s12">
                      <i class="material-icons prefix">lock</i>
                      <input type="password" id="password" name="password" class="validate" required="">
                      <label for="password">Password</label>
                    </div>
                  </div>
                </div>
                <div class="card-action grey lighten-2">
                  <div class="row" id="loginCard">
                    <div class="col l12 s12">
                      <button class="btn waves-effect waves-light teal lighten-2" type="submit" style="width:100%">Sign in
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>


    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/loginCustom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mainCustom.js"></script>
  </body>
</html>
