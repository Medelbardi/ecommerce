<?php include('includes/header.php'); ?>
<?php include('includes/logo.php'); ?>
<?php include('includes/navbar.php'); ?>


<div class="container" style="margin-bottom: 50px;">
  <div class="card" id="cardproduct">
    <div class="container-fliud">
      <div class="wrapper row">
        <div class="preview col-md-6">

          <?php
          $id = escape_string($_GET['id']);
          $query = "SELECT * FROM products WHERE product_id = '$id'";
          $result = query($query);
          $row = fetch_array($result);
          ?>

          <div class="preview-pic tab-content">
            <div class="tab-pane active" id="pic"><img src=" <?php echo $row['product_image']; ?>" /></div>
            <div class="tab-pane" id="pic"><img src=" <?php echo $row['product_image']; ?>" /></div>
            <div class="tab-pane" id="pic"><img src=" <?php echo $row['product_image']; ?>" /></div>
            <div class="tab-pane" id="pic"><img src=" <?php echo $row['product_image']; ?>" /></div>
            <div class="tab-pane" id="pic"><img src=" <?php echo $row['product_image']; ?>" /></div>
          </div>
          <ul class="preview-thumbnail nav nav-tabs">
            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src=" <?php echo $row['product_image']; ?>" /></a></li>
            <li><a data-target="#pic-2" data-toggle="tab"><img src=" <?php echo $row['product_image']; ?>" /></a></li>
            <li><a data-target="#pic-3" data-toggle="tab"><img src=" <?php echo $row['product_image']; ?>" /></a></li>
            <li><a data-target="#pic-4" data-toggle="tab"><img src=" <?php echo $row['product_image']; ?>" /></a></li>
            <li><a data-target="#pic-5" data-toggle="tab"><img src=" <?php echo $row['product_image']; ?>" /></a></li>
          </ul>

        </div>
        <div class="details col-md-6">
          <h3 class="product-title"><?php echo $row['product_title'] ?></h3>
          <div class="rating">
            <div class="stars">
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
            </div>
            <span class="review-no">41 reviews</span>
          </div>
          <p class="product-description"><?php echo $row['product_description'] ?></p>
          <h4 class="price">current price: <span><?php echo $row['product_price'] . 'dh' ?></span></h4>
          <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>

          <form action="checkout.php" method="POST">
            <div class="form-group w-auto">
              <input type="number" name="qte" style="width: 82%;" class="form-control" value="1">
              <input type="hidden" name="product" value="<?php echo $row['product_title'] ?>">
              <input type="hidden" name="id" value="<?php echo $row['product_id'] ?>">
            </div>
            <div class="form-group" style="margin-bottom: 160px;">
              <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add To Card</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<?php include('includes/footer.php'); ?>