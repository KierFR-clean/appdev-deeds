<?php
session_start();

    if(!isset($_SESSION['item-inventory'])) {
        $_SESSION['item-inventory'] = array();
    }

    $inventory = $_SESSION['item-inventory'];

    $item_name;
    $item_quantity;
    $msg = '';
    $search = '';


    function validateItemBeforeAdding($item_name, $item_quantity) {
        return (strlen(trim($item_name)) == 0) || empty($item_name) || empty($item_quantity) || $item_quantity <= 0;
    }

    function searchItemInInventory($item_name) {
        if (empty($item_name)) return $_SESSION['item-inventory'];
        
        $result = array_filter($_SESSION['item-inventory'], function($item, $key) use ($item_name) {
            return stripos($key, $item_name) !== false;
        }, ARRAY_FILTER_USE_BOTH);
        
        if (empty($result)) {
            global $msg;
            $msg = "Product Not Found";
        }
        
        return $result;
    }

    function addItemToInventory($item_name, $item_quantity) {
        if (validateItemBeforeAdding($item_name, $item_quantity)) {
            return " Invalid Data ";
        }

        if (array_key_exists($item_name,$_SESSION['item-inventory'])) {
            return " Item Already Exists ";
        }

        $_SESSION['item-inventory'][$item_name] = $item_quantity;
        return "Typed Item Added!";

    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['item-add'])) {
            $msg = addItemToInventory($_POST['item-name'], $_POST['item-quantity']);
        }
    }
    
    if (isset($_GET['item-search'])) {
        $msg = ''; 
        $inventory = searchItemInInventory($_GET['search-name']);  
    }
?>
    

    

