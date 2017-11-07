<?php
  include('header.php');
  include('controllers/student-login.php');
?>

    <div class="container"> <!-- close at footer.php -->

      <div class="row content-margin-top">
          <div class="col-xs-12 main-container">
            <!-- Content -->

            <div class="row">
              <div class="col-xs-6 col-xs-offset-3">
                <h2>Login as Student</h2>

                <form method="POST" action="./student-login.php">

                  <div class="form-group has-feedback "">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          </div>
                  <div class="form-group has-feedback "">
                    <input type="password" name="password" class="form-control" placeholder="Password">        
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                  <div class="row">
                    <div class="col-xs-8">
                      <div class="checkbox icheck">
                        <label>
                          <input type="checkbox" name="remember"> Remember Me
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In as Student</button>
                    </div>
                    <!-- /.col -->
                  </div>

                </form>
              </div>
            </div>

          </div>
      </div>

      <hr>

<?php
  include('footer.php');
?>