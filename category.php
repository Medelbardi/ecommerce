<?php include('includes/header.php');
$id = escape_string($_GET['id']);
$sql = "SELECT *FROM products WHERE product_category_id = '$id'";
$result = query($sql);
$product = fetch_array($result);
?>

<?php include('includes/logo.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="max-width">

  <?php if ($product != null) : ?>

    <div class="poduct-list">

      <h5 class="card-header bg-primary text-white"><i class="fa fa-list"></i> Boutique</h5>

      <?php
      $query = "SELECT *FROM products WHERE product_category_id = '$id'";
      $result = query($query);
      while ($row = fetch_array($result)) :
      ?>
        <div class="card">

          <img src="<?php echo $row['product_image'] ?>" id="imgpr" class="img-fluid mx-auto d-block" alt="">
          <p class="card-title"><?php echo $row['product_title'] ?></p>
          <span class="badge badge-success" id="pricepr"><?php echo $row['product_price'] . 'dh' ?></span> <span class="text-danger" id="pricepr"><strike><?php echo $row['old_price'] . 'dh' ?></strike></span>
          <p id="short" class="text-truncate"><?php echo $row['short_desc'] ?></p>
          <p><a href="product.php?id=<?php echo $row['product_id'] ?>" class="btn btn-outline-primary" id="voir">Voir</a></p>
        </div>


      <?php
      endwhile;
      ?>


    </div>
</div>
<?php
  else :
?>
  <div class="alert alert-info mt-2">Aucun produit trouvé.</div>
<?php
  endif;
?>
</div>

</div>


<?php include('includes/footer.php'); ?>