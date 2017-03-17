<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Oh So Shiny Jewelry Store</title>
    <meta charset='utf-8'>
    <meta name='description' content='Welcome to Oh So Shiny jewelry store. Browse our Jewelry to see which best suits you.'>
    <meta name='keywords' content='Jewelry,jewelry store,Necklaces,Gold,Silver,Bracelet,Rings'>
    <meta name='author' content='Katie Griffiths'>

    <link href='css/style.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    
  </head>
  <body>
    <div id="wrapper">
      <div id="header">
        <h3>69 Long Street<br>Tralee Box 1<br>021 957863</h3> 
        <h2>Oh So Shiny</h2>
        <div id="menu">
          <a <?php if($current == 'home') {echo 'class="current"';} ?> href="index.php">Home</a><a <?php if($current == 'customer') {echo 'class ="this_page"';} ?> href="customer.list.php">Customers</a><a <?php if($current == 'stock') {echo 'class ="this_page"';} ?> href="stock.list.php">Stock</a><a <?php if($current == 'orders') {echo 'class="this_page"';} ?> href="orders.list.php">Orders</a>
        </div>
      </div>
      
      <div id="content"> 