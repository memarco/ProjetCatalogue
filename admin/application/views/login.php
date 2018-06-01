<?php include 'header.php' ?>


<div style="text-align: center"><img height="101px" width="auto" src="<?php echo base_url();?>assets/img/logoUpec.png" />
<br/>
<h1>SCUIO-BAIP - <small> Catalogue Stage/Alternance</small></h1>
<div class="container" style="width: 600px">


      <div class="span4 offset4 well" >

        <legend>Authentification</legend>

        <?php if (isset($error) && $error): ?>
        <div class="alert alert-error" style="color: red">
            <a class="close" data-dismiss="alert" href="#">×</a>Login ou mot de passe incorrect !
          </div>
        <?php endif; ?>

        <?php echo form_open('login/login_user') ?>
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Login</label>
            <div class="col-sm-8">
              <input type="text" id="email" class="form-control" name="email" placeholder="Login">
            </div>
          </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Mot de passe</label>
            <div class="col-sm-8">
        <input type="password" id="password" class="form-control" name="password" placeholder="Mot de passe">
            </div>
          </div>

        <!--<label class="checkbox">
          <input type="checkbox" name="remember" value="1"> Remember Me
        </label>-->

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-8">
        <button type="submit" name="submit" class="btn btn-info btn-block">Connexion</button>
    </div>
  </div>

        </form>
      </div>

  </div></div>

<?php include 'footer.php' ?>
