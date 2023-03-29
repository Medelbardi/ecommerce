<?php include('includes/header.php'); ?>
<?php include('includes/logo.php'); ?>
<?php include('includes/navbar.php'); ?>




<div class="poduct-list">
  <h5 class="card-header bg-primary text-white"><i class="fa fa-list"></i>Product</h5>
  <?php
  $search = escape_string($_POST['search']);
  $sql = "SELECT *FROM products WHERE	product_title LIKE  '%$search%' OR
                product_description LIKE '%$search%'";
  $result = query($sql);
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
</div>





</div>



<?php include('includes/footer.php'); ?>