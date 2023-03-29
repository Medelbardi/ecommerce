<?php include('includes/header.php'); ?>
<?php include('includes/logo.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="max-width">
  <div class="row">
    <div class="col-md-4 mx-auto mt-5 mb-5">
      <div class="card mt-4">
        <div class="card-body">
          <h5 class="card-header bg-primary text-white text-center"><i class="fa fa-sign-in"></i> Login</h5>
          <?php
          if (isset($_POST['send'])) {
            $email = escape_string($_POST['email']);
            $password = escape_string(sha1($_POST['password']));
            $sql = "SELECT * FROM users WHERE email='$email' AND password = '$password' LIMIT 1";
            $result = query($sql);
            $user = fetch_array($result);
            if ($user != null) {
              $_SESSION['logged'] = true;
              $_SESSION['nom'] = $user['username'];
              $_SESSION['user_id'] = $user['user_id'];
              header("Location: index.php");
            } else {
              echo '<div class="alert alert-danger mt-2">Email ou mot de password est incorrect.</div>';
            }
          }
          ?>

          <form action="login.php" method="POST">

            <div class="form-group mt-2">
              <label for="email">Email *</label>
              <input type="email" required name="email" class="form-control" placeholder="Enter Your E-mail">
            </div>
            <div class="form-group">
              <label for="password">Password *</label>
              <input type="password" required name="password" class="form-control" placeholder="Enter Your Password">
            </div>
            <div class="form-group">
              <button type="submit" name="send" class="btn btn-success">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>




</div>



<?php include('includes/footer.php'); ?>