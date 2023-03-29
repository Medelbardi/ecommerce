<?php
require('config.php');


function redirect($location)
{
    header("location" . $location);
}

function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}

function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}
function query_prepare($query)
{
    global $connection;
    return mysqli_prepare($connection, $query);
}

function get_error()
{
    global $connection;
    return mysqli_error($connection);
}

function logout()
{
    unset($_SESSION['user_id']);
    unset($_SESSION['nom']);
    $_SESSION['logged'] = false;
    session_destroy();
    redirect("index.php");
}

function empty_cart($id, $price)
{
    unset($_SESSION['products_' . $id]);
    $_SESSION['count'] -= 1;
    $_SESSION['totaux'] -= $price;
    header("Location: cart.php");
}
