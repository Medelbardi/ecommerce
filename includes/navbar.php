<?php
$sql = "SELECT *FROM categories";
$result = query($sql);
?>
<div>
  <nav id="nav1" class="navbar  navbar-expand-lg text-white mt-4   navbar-dark bg-primary ">
    <a id="nav1" class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li id="nav1" class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="font-size:14px ; min-width:8px;">
            <?php while ($categorie = fetch_array($result)) : ?>
              <a class="dropdown-item bg-light" href="category.php?id=<?php echo $categorie['cat_id']; ?>"><?php echo $categorie['cat_title']; ?></a><?php endwhile; ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Product <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
      <form action="search.php" method="post" class="form-inline my-2 my-lg-0 ml-auto">
        <input type="text" name="search" placeholder="Search" class="mr-sm-2 form-control" id="sera">
        <button class="btn btn-light"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </nav>
</div>
</div>