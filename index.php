

<?php
include 'header.php';
 ?>

<section id="contendio_p">
  <div class="contendio_p_login">
  <div class="container">
    <div class="col-md-12 acomodocentrado">
      <h1>Cuenta</h1>
        <div id="inicio_log">




<form name="loginform" id="loginform" action="<?php echo home_url(); ?>/wp-login.php" method="post">
 <div class="form-group row">
    <div class="col-md-2 text-center sinb ">
    <i class="fa fa-user-o fa-3x" aria-hidden="true"></i>
    </div>
     <div class="col-md-10 izqi">
<input type="text" class="form-control newd textm inputt" name="log" id="user_login" value="" size="20"  placeholder="Usuario">
  </div>

 </div>

 <div class="form-group row ">
      <div class="col-md-2 text-center sinb ">
      <i class="fa fa-key fa-3x" aria-hidden="true"></i>
     </div>
     <div class="col-md-10 izqi">
    <input type="password" class="form-control newd textm inputt" type="password" name="pwd" id="user_pass" value="" size="20" placeholder="Password">
  </div>

 </div>




      <div class="row text-center">
              <div class="col-md-12">
                   <input type="submit" name="wp-submit" id="wp-submit" class="buser_t" value="Iniciar" />
                  <input type="hidden" name="redirect_to" value="<?php echo home_url(); ?>" />

              </div>

      </div>

    </form>

        </div>
      </div>
    </div>
  </div>
  </section>

<?php include 'footer.php'; ?>
