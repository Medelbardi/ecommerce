<?php include('includes/header.php'); ?>
<?php include('includes/logo.php'); ?>
<?php include('includes/navbar.php'); ?>


<div class="max-width">
  <div class="row">


    <div class="col-md-4 mx-auto mb-5">
      <div class="card mt-4">
        <div class="card-body">
          <h5 class="card-header bg-primary text-white text-center"><i class="fa fa-envelope"></i> Contact</h5>
          <?php
          if (isset($_POST['send'])) {
            $emal = escape_string($_POST['email']);
            $mesge = escape_string($_POST['message']);
            $preparedQuery = query_prepare("INSERT INTO contacts(email,message) VALUES (?,?)");
            $preparedQuery->bind_param('ss', $emal, $mesge);

            if ($preparedQuery->execute()) {
              echo '<div class="alert alert-success mt-2">Email Submitted.</div>';
            } else {
              var_dump(get_error());
              echo '<div class="alert alert-danger mt-2">Error Try Again.</div>';
            }
          }
          ?>
          <form action="contact.php" method="POST">

            <div class="form-group">
              <label for="email">Email *</label>
              <input type="email" name="email" class="form-control" placeholder="Entrer Votre E-mail">
            </div>
            <div class="form-group">
              <label for="message">Message *</label>
              <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" name="send" class="btn btn-success">Envoyer</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>





</div>



<?php include('includes/footer.php'); ?>