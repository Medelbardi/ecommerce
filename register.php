<?php include('includes/header.php'); ?>
<?php include('includes/logo.php'); ?>
<?php include('includes/navbar.php'); ?>


<div class="max-width">
    <div class="row">
        <div class="col-md-4 mx-auto mb-5">
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-header bg-primary text-white text-center"><i class="fa fa-user-plus"></i> Register</h5>
                    <?php
                    if (isset($_POST['send'])) {
                        $nom = escape_string($_POST['nom'] . ' ' . $_POST['prenom']);
                        $email = escape_string($_POST['email']);
                        $password = escape_string(sha1($_POST['pasd']));
                        $preparedQuery = query_prepare("INSERT INTO users(username,email,password) VALUES (?,?,?)");
                        $preparedQuery->bind_param('sss', $nom, $email, $password);
                        $query = $preparedQuery->execute();

                        if ($query) {
                            echo '<div class="alert alert-success mt-2">Account Created.</div>';
                        } else {
                            //var_dump(get_error());
                            echo '<div class="alert alert-danger mt-2">Error Try Again.</div>';
                        }
                    }
                    ?>
                    <form action="register.php" method="POST">
                        <div class="form-group mt-3">
                            <label for="nom">First Name *</label>
                            <input type="text" required name="nom" class="form-control" placeholder="Enter Your First Name">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Last Name *</label>
                            <input type="text" required name="prenom" class="form-control" placeholder="Enter Your Last Name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" required name="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password *</label>
                            <input type="password" required name="pasd" class="form-control" placeholder="Enter Your Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="send" class="btn btn-primary">Validate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>




</div>



<?php include('includes/footer.php'); ?>