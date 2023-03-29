<?php
include('includes/header.php');
//session_destroy();
?>
<?php include('includes/logo.php'); ?>
<?php include('includes/navbar.php'); ?>
<div class="container mt-5 mb-5">
    <div class="card main bg-light">

        <div class="row">
            <div class="col-md-12">
                <?php
                $item_name = 1;
                $item_number = 1;
                $amount = 1;
                $quantity = 1;
                if (isset($_GET['message'])) {
                    echo '<div class="alert alert-danger p-2 mt-2">' . $_GET['message'] . '</div>';
                }
                ?>
                <div class="card mt-2 mb-3 mx-2" id="tablesize">
                    <input type="hidden" name="cmd" value="_cart">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($_SESSION as $name => $product) :
                            ?>
                                <?php
                                if (substr($name, 0, 9) == "products_") :
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo !empty($product['product']) ? $product['product'] : "" ?>
                                        </td>
                                        <td>
                                            <?php echo !empty($product['price']) ? $product['price'] : "" ?>
                                        </td>
                                        <td>
                                            <?php echo !empty($product['qte']) ? $product['qte'] : "" ?>
                                        </td>
                                        <td>
                                            <?php echo !empty($product['total']) ? $product['total'] : "" ?>
                                        </td>
                                        <td>
                                            <a href="cancel_cart.php?id=<?php echo !empty($product['id']) ? $product['id'] : "" ?>&price=<?php echo !empty($product['total']) ? $product['total'] : "" ?>" class="btn btn-danger" id="btndanger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="item_name_<?php echo $item_name ?>" value="<?php echo !empty($product['product']) ? $product['product'] : "" ?>">
                                    <input type="hidden" name="item_nubmer_<?php echo $item_number ?>" value="<?php echo !empty($product['id']) ? $product['id'] : "" ?>">
                                    <input type="hidden" name="amount_<?php echo $amount ?>" value="<?php echo !empty($product['price']) ? $product['price'] : "" ?>">
                                    <input type="hidden" name="quantity_<?php echo $quantity ?>" value="<?php echo !empty($product['qte']) ? $product['qte'] : "" ?>">
                                    <?php
                                    $item_name++;
                                    $item_number++;
                                    $amount++;
                                    $quantity++;
                                    ?>
                                <?php
                                endif;
                                ?>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    <?php
                    if (isset($_SESSION['totaux']) && $_SESSION['totaux'] > 0) :
                    ?>
                    <?php
                    endif;
                    ?>

                    <div class="row">
                        <div class="col-md-4 m-auto ">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Products</th>
                                    <th>Total HTTC</th>
                                </thead>
                                <tbody>
                                    <td>
                                        <?php echo !empty($_SESSION['count']) ? $_SESSION['count'] : "" ?>
                                    </td>
                                    <td class="text-danger font-weight-bold" id="amount"><?php echo !empty($_SESSION['totaux']) ? $_SESSION['totaux'] . ' DH' : "" ?></td>
                                </tbody>

                            </table>
                        </div>

                    </div>
                    <div style="width: 200px; margin:auto; " id="paypal-button-container"></div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    let amount = document.querySelector('#amount').dataset.amount;
    paypal.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '0.01'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Commande effectuée par ' + details.payer.name.given_name);
                document.querySelector('#addOrder').submit();
            });
        }
    }).render('#paypal-button-container');
    //This function displays Smart Payment Buttons on your web page.
</script>

<?php include('includes/footer.php'); ?>