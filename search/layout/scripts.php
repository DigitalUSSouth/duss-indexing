<?php
/**
 * @file scripts.php
 * This file writes all sources to JavaScript files needed and closes out the HTML structure.
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="<?php print $ROOTURL;?>js/jquery.ui.touch-punch.min.js"></script>
<!--<script src="js/jquery.min.js"></script>-->
<script src="js/bootstrap.min.js"></script>

<script src="js/sticky.js"></script>
<script src="js/slick.js"></script>
 <!--Slick Carousel Scripts
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="slick/slick.min.js"></script>-->
		


<?php // All pre-defined JavaScript libraries above this line. ?>
<script src="js/duss.js"></script>
<script src="js/duss-search.js"></script>

<?php	if ($isMapPage==true):?>
<script src="js/map.js"></script>
<?php endif;?>


</body>
</html>
