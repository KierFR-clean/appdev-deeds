<?php
require_once 'inventory.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KierPiled -- Inventory Management System</title>
    
</head>
<section style="  margin: 0px 21rem 0px;   padding: 10px 20px 23px; font-size:24px; 
    display: flex; justify-content: center;
     align-items: center;  font-family: 'Satoshi', sans-serif; font-weight: 800;
    background-color: #EEEDEB;  border: 5px solid #EEEDEB; border-radius: 15px; box-shadow:0px 4px 10px #00000057;">
    Inventory Management System📦💰📈
</section>

<body style="font-family: 'Satoshi', sans-serif; font-weight: 800;">
    <section style=" margin: 10px 19rem 0px ;
background-color: #EEEDEB; border-radius: 15px; padding: 20px 25px 28px; box-shadow:0px 4px 10px #00000057;">
        <form action="" id="form-inventory" method="post" style="line-height: 15px; margin: 1rem 20px 32px;">
            <input type="text" id="item-name-tag" placeholder="Add Your Item" name="item-name" required
            style="font-family: 'Satoshi', sans-serif; font-weight: 700; border-radius: 15px; display: block; margin: 10px; padding: 5px; ">
            <input type="number" id="item-quantity-tag" placeholder="Quantity of the Item" name="item-quantity" required
             style="font-family: 'Satoshi', sans-serif; font-weight: 700; border-radius: 15px; margin: 10px; padding: 5px; -moz-appearance: textfield;">
            <button type="submit" name="item-add" style=" text-align: center;
            font-family: 'Satoshi', sans-serif;
            border-radius: 15px;
            background-color: #A02334;
            width: 5rem;
            color: #fff; cursor: pointer;">ADD</button>
        </form>
        <hr style="color: #EEEDEB;">
        <form action="" id="form-inventory" method="get" style="line-height: 15px; margin: 1rem 20px 32px;">
            <input type="text" id=search-name-tag" placeholder="Search Item" name="search-name" 
            style="font-family: 'Satoshi', sans-serif; font-weight: 700; border-radius: 15px; margin: 10px; padding: 5px; ">
           
            <button type="submit" name="item-search" style=" text-align: center;
            font-family: 'Satoshi', sans-serif;
            border-radius: 15px;
            background-color: #96CEB4;
            width: 5rem;
            color: #fff; cursor: pointer;">SEARCH</button>
        </form>

        <?php if (!empty($msg)):?>
        <h3 style="background-color: #96CEB4; border-radius: 12px; color: white; margin: 0px 170px 0px; text-align: center;"><?php echo htmlspecialchars($msg); ?></h3>
         <?php endif; ?>

        <hr style="color: #EEEDEB;">

        Inventory
        <table style="background-color: #fff; border-radius: 14px; border: 5px solid #fff; margin: 2px; width: 100%; box-shadow:0px 4px 10px #00000057;">
            <tr>
                <th style="background-color: #FFEEAD; color: #fff; text-shadow: 0px 4px 10px #00000057; border-radius: 8px;  box-shadow:0px 4px 10px #00000057;">
                    Item Name</th>
                <th style="background-color: #FFEEAD; color: #fff; text-shadow: 0px 4px 10px #00000057; border-radius: 8px; box-shadow:0px 4px 10px #00000057;">Quantity</th>
            </tr>
            <?php if (empty($inventory)): ?>
                <tr>
                    <td colspan="2"><?php echo htmlspecialchars($msg); ?></td>
                </tr>
            <?php else:?>
            <?php  foreach($inventory as $item_name => $item_quantity): ?>
            <tr style="text-align: center;">
                <td><?php echo htmlspecialchars($item_name); ?></td>
                <td><?php echo htmlspecialchars($item_quantity); ?></td>
            </tr>
            <?php endforeach; ?>
        <?php endif;?>
        </table>

    </section>


</body>

</html>