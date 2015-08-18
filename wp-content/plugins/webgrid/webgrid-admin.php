<?php

// Register stylesheets & scripts.
add_action( 'admin_init', 'register_admin_styles' );
function register_admin_styles() {
    wp_register_style( 'imageuploader', plugins_url( 'css/html5imageupload.css', __FILE__ ), false, '1.0.0' );
    wp_enqueue_style( 'imageuploader' );
    wp_register_style( 'adminstyle', plugins_url( 'css/admin.css', __FILE__ ), false, '1.0.0' );
    wp_enqueue_style( 'adminstyle' );

    wp_enqueue_script( 'imageupload', plugins_url( 'js/html5imageupload.js', __FILE__ ), array() ); 
    wp_enqueue_script( 'adminscript', plugins_url( 'js/admin.js', __FILE__ ), array() );
}


// add page on menu
add_action( 'admin_menu', 'register_webgrid_menu_page' );
function register_webgrid_menu_page() {

	add_menu_page( 'Web Grid', 'Web Grid', 'manage_options', 'web-grid', 'web_grid_settings', 'dashicons-grid-view', 6 ); 

}
function web_grid_settings(){
?>
<!--link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"-->
<?php
if(isset($_POST['grid'])){
	update_option('grid_template', $_POST['table-grid']);
}

if(isset($_POST['title-submit'])){
	update_option('thumb-text', $_POST['thumb-postid']);
}
?>
<!--link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"-->
<div class="inner-webgrid bt-wrapper">

<?php
	$table = get_option('grid_template');
	if(empty($table)){
		echo "<div id='new-grid'>";
			echo "Наразі не створено основного шаблону<br>Створіть новий шаблон для Сітки:<br>";
			newgrid_template();
		echo "</div>";
	} else {
		newgrid_template();
		echo "<form method=post id='ids'>";
		echo '<div id="grid-template">'.$table.'</div>';
		?><input type='submit' class='btn btn-success' value="Зберегти id поста" name='title-submit'><?php
		echo "</form>";
	}
?>
<style type="text/css">
	#adminmenumain {
		position: relative;
		z-index: 0;
	}
</style>
	<!--div class="col-xs-6">
		<div class="dropzone" data-width="960" data-height="540" data-resize="true" data-url="canvas.php" style="width: 100%;" data-image="<?php echo bloginfo('template_url'); ?>/../../1.jpg">
		  <input type="file" name="thumb" />
		</div>
	</div-->
</div>
<?php
}

function newgrid_template() {
?>

<button id="create-new-grid" class="btn btn-warning">Create new grid</button>

<pre id="help">
* Картинки зберігаються та видаляються автоматично
* Щоб зберегти прив'язку до поста, натисніть "Зберегти id поста"
</pre>

	<div class="task-window">
		<form method="post">
			<textarea class="grid-base" name="table-grid" placeholder=
"<table>
	// content
</table>"
></textarea>
			<pre>
			<?php
			_e('
* Використовуйте HTML-розмітку для створення сітки, що вам потрібна.
* Використовуйте тільки одну таблицю
* Використовуйте атрибути colspan, rowspan для створення комбінованих елементів
', 'webgrid');
			?>
			</pre>
			<input name="grid" type="submit" value="<?php _e('Зберегти', 'webgrid'); ?>" />
			<input type="button" id="cancel-grid" value="<?php _e('Відмінити', 'webgrid'); ?>" />
		</form>
	</div>

<?php
}

?>