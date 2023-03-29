<?php include('includes/header.php'); ?>
<?php include('includes/logo.php'); ?>
<?php include('includes/navbar.php'); ?>



<div class="w-auto m-2">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block mx-auto" src="images/1.jpg" alt="Slider-1" />
      </div>
      <div class="carousel-item">
        <img class="d-block mx-auto" src="images/2.jpg" alt="Slider-2" />
      </div>
      <div class="carousel-item">
        <img class="d-block mx-auto" src="images/3.jpg" alt="Slider-3" />
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div class="poduct-list">
  <h5 class="card-header bg-primary text-white"><i class="fa fa-list"></i>Product</h5>
  <?php
  $query = "SELECT *FROM products";
  $result = query($query);
  while ($row = fetch_array($result)) :
  ?>
    <div class="card">

      <img src="<?php echo $row['product_image'] ?>" id="imgpr" class="img-fluid mx-auto d-block" alt="">
      <p class="card-title"><?php echo $row['product_title'] ?></p>
      <span class="badge badge-success" id="pricepr"><?php echo $row['product_price'] . 'dh' ?></span> <span class="text-danger" id="pricepr"><strike><?php echo $row['old_price'] . 'dh' ?></strike></span>
      <p id="short" class="text-truncate"><?php echo $row['short_desc'] ?></p>
      <p><a href="product.php?id=<?php echo $row['product_id'] ?>" class="btn btn-outline-primary" id="voir">Buy</a></p>
    </div>

  <?php
  endwhile;
  ?>
</div>






<?php include('includes/footer.php'); ?>