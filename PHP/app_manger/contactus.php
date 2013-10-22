<!DOCTYPE html>
<html>
<head>

<?php 
		// menu html page
		include '../includes/verifylogin.php';
		
		include '../includes/header.php';
		include 'menubar.php';
		//include '../db_manager/hoteldetailsDbManager.php';
		?>
		
	
</head>


<body>

<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="contact" class="clear">
      <div class="one_half first">
        <h1>Puruselit mauris nulla hendimentesque</h1>
        <p>Aliquatjusto quisque nam consequat doloreet vest orna partur scetur portortis nam. Metadipiscing eget facilis elit sagittis felisi eger id justo maurisus convallicitur.</p>
        <div id="respond">
          <h2>Contact Us</h2>
          <form class="rnd5" action="#" method="post">
            <div class="form-input clear">
              <label class="one_half first" for="author">Name <span class="required">*</span><br>
                <input type="text" name="author" id="author" value="" size="22">
              </label>
              <label class="one_half" for="email">Email <span class="required">*</span><br>
                <input type="text" name="email" id="email" value="" size="22">
              </label>
            </div>
            <div class="form-message">
              <textarea name="message" id="message" cols="25" rows="10"></textarea>
            </div>
            <p>
              <input type="submit" value="Submit">
              &nbsp;
              <input type="reset" value="Reset">
            </p>
          </form>
        </div>
      </div>
      <div class="one_half">
        <div class="map push50"><img src="../../images/1200x400.gif" alt=""></div>
        <section class="contact_details clear">
          <h2>Puruselit mauris nulla hendimentesque</h2>
          <p>This is a W3C standards compliant free responsive HTML5 website template from <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>. For full terms of use of this template please read our <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>.</p>
          <p>You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files. For more responsive HTML5 templates visit <a href="http://www.os-templates.com/">Free Website Templates</a>.</p>
          <div class="one_half first">
            <address>
            Company Name<br>
            Street Name &amp; Number<br>
            Town<br>
            Postcode/Zip
            </address>
          </div>
          <div class="one_half">
            <ul class="list none">
              <li>Tel: xxxxx xxxxxxxxxx</li>
              <li>Fax: xxxxx xxxxxxxxxx</li>
              <li>Email: <a href="#">contact@mydomain.com</a></li>
            </ul>
          </div>
        </section>
      </div>
    </div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>


<?php 
include '../includes/css_jsinclude.php';
include '../includes/footer.php';
?>
</body>