<div class="row w-100">
  <div class="col-md-3.5 w-50" id="lg">
    <a href="index.php" class="btn btn-link ml-2 mt-2"><span id="titl" class="text-primary">MATJARI</span>
      <span class="text-danger" id="titl2">.com</span>
    </a>
  </div>
  <div class="mt-1 float-right w-50">
    <div class="float-right">
      <div class="dropdown">
        <a class="btn btn-link dropdown-toggle" id="drop" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-shopping-cart"></i>Card
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size:12px ; min-width:8px;">
          <a class="dropdown-item" href="cart.php"><?php echo !empty($_SESSION['count']) ? $_SESSION['count'] : "" ?> Product(s)</a>
        </div>
      </div>
    </div>
    <div class="float-right mr-3">
      <div class="dropdown">
        <a class="btn btn-link dropdown-toggle" id="drop" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <?php
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) :
        ?>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size:12px ; min-width:8px;">
            <a class="dropdown-item"><i class="fa fa-user"></i>
              <?php echo $_SESSION['nom']; ?>
            </a>
            <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> logout</a>
          </div>
        <?php
        else :
        ?>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size:12px ; min-width:8px;">
            <a class="dropdown-item" href="register.php"><i class="fa fa-user-plus"></i> Register</a>
            <a class="dropdown-item" href="login.php"><i class="fa fa-sign-in"></i> Login</a>
          </div>
        <?php
        endif;
        ?>
      </div>
    </div>
  </div>
</div>