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
    <div id="gallery">
      <section>
        <figure>
          <h2>Menu</h2>
          <ul class="clear">
            <li class="one_fifth first"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth first"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth first"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
            <li class="one_fifth"><a href="#"><img src="../../images/gallery.gif" alt=""></a></li>
          </ul>
          <figcaption>
            <p>This is a W3C standards compliant free responsive HTML5 website template from <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>. For full terms of use of this template please read our <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>.</p>
            <p>You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files. For more responsive HTML5 templates visit <a href="http://www.os-templates.com/">Free Website Templates</a>.</p>
          </figcaption>
        </figure>
      </section>
      <!-- ####################################################################################################### -->
      <nav class="pagination">
        <ul>
          <li class="prev"><a href="#">&laquo; Previous</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li class="splitter"><strong>&hellip;</strong></li>
          <li><a href="#">6</a></li>
          <li class="current"><strong>7</strong></li>
          <li><a href="#">8</a></li>
          <li class="splitter"><strong>&hellip;</strong></li>
          <li><a href="#">14</a></li>
          <li><a href="#">15</a></li>
          <li class="next"><a href="#">Next &raquo;</a></li>
        </ul>
      </nav>
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


<script type="text/javascript">
jQuery(document).ready( Menu_page.onReady($) );
</script>

</html>