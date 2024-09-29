<?php
session_start();
    //init inventory when it doesn't exist
    $_SESSION['item-inventory'] = $_SESSION['item-inventory'] ?? [];

    $inventory = $_SESSION['item-inventory'];
    $msg = '';
    $search = '';

    //function that validate the item if user request even the fields are empty or quantity is lower than 1
   function validateItemBeforeAdding( string $item_name, int $item_quantity): bool {
        return empty(trim($item_name)) || $item_quantity <= 0;
   }

   // search items and use array_filter to find matching and also I use stripos in order of it to ignore case
    function searchItemInInventory($item_name) {
        if (empty(trim($item_name))) return $_SESSION['item-inventory'];
        
        $result = array_filter($_SESSION['item-inventory'], function($item, $key) use ($item_name) {
            return stripos($key, $item_name) !== false;
        }, ARRAY_FILTER_USE_BOTH);
        
        if (empty($result)) {
            global $msg;
            $msg = "Product Not Found";
        }
        
        return $result;
    }

    //adds new item but returns error msgs if provided validity functions fails
    function addItemToInventory($item_name, $item_quantity) {
        if (validateItemBeforeAdding($item_name, $item_quantity)) {
            return " Please fill all fields and make sure quantity is greater than 0 ";
        }

        if (isset($_SESSION['item-inventory'][$item_name])) {
            return " Typed Item Already Exists ";
        }

        $_SESSION['item-inventory'][$item_name] = $item_quantity;
        return "Typed Item Successfully Added!";

    }

    // handles the POST request or the form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['item-add'])) {
            $msg = addItemToInventory($_POST['item-name'], $_POST['item-quantity']);
        }
    }
    // for search, also clear msg and stored the searched item in the session
    if (isset($_GET['item-search'])) {
        $msg = ''; 
        $inventory = searchItemInInventory($_GET['search-name']);  
    }

    //var_dump($_SESSION['item-inventory']);
?>
    

    

