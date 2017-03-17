<?php
  $current ='home';
  include('header.php'); 
?>    <!--http://www.tutorialspoint.com/php/php_file_inclusion.htm -->
  <div id="home_page_top">
    <img src="images/woman.jpg" alt="woman" />      <!--Image taken from google image search http://blogs-images.forbes.com/aliciaadamczyk/files/2014/12/JH_MODEL_3-1940x1166.jpg-->
    <div id="header_text">
      <h1>Oh So Shiny Jewelry Store</h1>   <!--Paragraph taken and sligthly alterd from http://www.fields.ie/about-->    
      <p>Gratefully celebrating over thirty years in jewellery retailing, Oh So Shiny is a wholly Irish owned company who has been a market leader since 1979.
       With a name synonymous with fine jewellery in beautiful designs, 
       quality watches, giftware and above all unquestioning commitment to customer service, Oh So Shiny have a reputation richly deserved. </p>
    </div>          
  </div>
  <div id="home_page_bottom">
      <h2> Our Products</h2>  <!--Slide show images taken from google jewelry search -->
      <div class="our-work">
        <div><img src="images/slide_show/thumbs/image1.jpg" alt="Image 1" width="150" height="100" /></div>
        <div><img src="images/slide_show/thumbs/image2.jpg" alt="Image 2" width="150" height="100" /></div>
        <div><img src="images/slide_show/thumbs/image3.jpg" alt="Image 3" width="150" height="100" /></div>
        <div><img src="images/slide_show/thumbs/image4.jpg" alt="Image 4" width="150" height="100" /></div>
        <div><img src="images/slide_show/thumbs/image5.jpg" alt="Image 5" width="150" height="100" /></div>
        <div><img src="images/slide_show/thumbs/image6.jpg" alt="Image 6" width="150" height="100" /></div>
        <div><img src="images/slide_show/thumbs/image7.jpg" alt="Image 7" width="150" height="100" /></div>
        <div><img src="images/slide_show/thumbs/image8.jpg" alt="Image 8" width="150" height="100" /></div>
      </div>
    </div>
  <div id="buttons">  <!--Taken from google search images http://iconion.com/images/icon_sets/data2/images/social_media_icons.jpg -->
     <img src="images/social_media_icons.png" alt="Social Media Icons">       
  </div>    
<?php include('footer.php'); ?>