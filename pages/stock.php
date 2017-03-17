<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>SContact Us</title>
    <meta charset='utf-8'>
    <meta name='description' content='Welcome to Sweet Tats Tattoo. Browse our gallery to see which tattoo is for you.'>
    <meta name='keywords' content='tattoo, body art, tribal, portrait, ink, tattoo shop, tattoo parlors, tattoo artists'>
    <meta name='author' content='Katie Griffiths'>

    <link href='../css/style.css' rel='stylesheet' type='text/css'>
    
  </head>
  <body>
    <div id="wrapper">
      <div id="header">
        <h3>51 Sweet Field Avenue<br>Dublin Box 1<br>021 957863</h3>
        <h2>Sweet Tats Tattoo</h2>
        <div id="menu">
          <a href="../index.html">Home</a><a href="artists.html">Artists</a><a href="gallery.html">Gallery</a><a href="contact_us.html" class="this_page">Contact Us</a>
        </div>
      </div>
      
      <div id="content">
        <p class="contact_text">Please feel free to contact us at any time to discuss any ideas you have for tattoos, or if you want to book an appointment. If you would prefer, you can email us directly on <a href="mailto:katie.griffiths@students.ittralee.ie">katie.griffiths@students.ittralee.ie</a></p>
        <div id="form"> 
         <form method="post" enctype="text/plain" action="mailto:katie.griffiths@students.ittralee.ie?subject=Website">
         <label>First Name</label>
         <input name="cust-name" type="text" class="contactForm">
         <br>
         <label>Last Name</label>
         <input name="cust_surname" type="text" class="contactForm">
         <br>
         <label>Email Address</label>
         <input name="email" type="text" class="contactForm">
         <br>
         <label>Phone No.</label>
         <input type="text" name="phonenumber" maxlength="14" class="contactForm">
         <br>
         <label>Have you visited our studio before?</label>
         <select name="beenbefore" class="contactForm">
            <option>Yes</option>
            <option>No</option>
         </select>
         <br>       
         <label>Have you been tattooed before?</label>
         <input type="radio" name="beenTattooed" value="yes"> Yes<br>
         <input type="radio" name="beenTattooed" value="no"> No
         <br>       
         <label>Questions</label>
         <textarea name="questions" rows="8" cols="40" class="contactForm"></textarea>
         <br>
         <input name="submit" type="submit">
         <input name="startover" type="reset">   
         </form>
       </div>
        <div id="buttons">  <!--Taken from google search images http://iconion.com/images/icon_sets/data2/images/social_media_icons.jpg -->
           <img src="../images/social_media_icons.png" alt="Social Media Icons">       
      </div>
      </div>
      
      <div id="footer">
        <span id="copy">&copy; Sweet Tats Tattoo 2014</span>
        <span id="to_top"><a href="#header">Back to Top</a></span>
        <span id="site_map"><a href="site_map.html">Site Map</a></span>
      </div>
    </div>
  </body>
</html>