<?php

function webgrid_out( $atts ) {

?>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<?php
	$table = get_option('grid_template');
	echo "<div id='grid-template' class='frontend'>".$table."</div>";
?>

<script type="text/javascript">
(function($){

 	$(document).ready(function(){

 		var count = 0;
 		$('#grid-template table td').each(function(){
 			var curr = $(this);
 			$.ajax({
 				url: "<?php echo plugins_url();  ?>/webgrid/get-image-link.php",
 				method: "post",
 				data: {
 					'count' : ++count
 				}
 			}).done(function(data){
				curr.append('<a>' + data + '</a>');
				$('#grid-template table td img').each(function(){
					var pId = $(this).data('page');
					$(this).parent().attr('href', "/<?php bloginfo(); ?>/?p=" + pId);
				});
 			});
 		});
 	});
 				
})(window.jQuery);
</script>

<?php
	
}

add_shortcode( 'webgrid', 'webgrid_out' );

?>