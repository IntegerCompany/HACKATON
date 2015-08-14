(function($){

		function post_id_edit(count, curr){
			curr.prepend('<input type="number" placeholder="id поста" min=1 name="thumb-postid[' + count + ']">');
			$.ajax({
				url: "../wp-content/plugins/webgrid/get-title.php",
				method: "POST",
				data: {
					'currIndex' : count
				}
			}).done(function(data){
				curr.find('input[type="number"]').val(data);
				console.log(data);
			});
		}

 		$(document).ready(function(){
 				var count = 0;
 			$('#grid-template table td').each(function(){

 				$(this).append('<input type="file" name="thumb-'+ ++count +'">');

 				var name = $(this).find('input[type="file"]').attr('name');
 				var curr = $(this);

 				$.ajax({
 					url: "../wp-content/plugins/webgrid/get-image.php",
 					method: "POST",
 					async: false,
 					data: {
 						'name' : name
 					}
 				}).done(function(data){
 					//console.log(data);
 					if(data != '') {
 						curr.attr('data-image', '../wp-content/uploads/greed/' + data);
 					}
 				});

 				$(this).addClass('dropzone').addClass('smalltext');

 				var w = $(this).width();
 				var h = $(this).height();

 				$(this).attr({
 					"data-width"  : w,
 					'data-height' : h,
 					'data-resize' : "false",
 					'data-save'   : "false",
 					"data-ghost"  : "false"
 				});


 				$(this).html5imageupload({
 					onSave: function(image) {
 						$.ajax({
 							url: "../wp-content/plugins/webgrid/save-image.php",
 							method: "POST",
 							data: {
 								'image' : image,
 								'name'	: name
 							}
 						}).done(function(data){
 							console.log('image saved');
 						});
 						
 					},
 					onAfterCancel: function(){
 						$.ajax({
 							url: "../wp-content/plugins/webgrid/remove-image.php",
 							method: "POST",
 							data: {
 								'name'	: name
 							}
 						}).done(function(data){
 							console.log('image deleted');
 							post_id_edit(count, curr);
 						});
 					}
 				});

 				post_id_edit(count, curr);
 				console.log('post_id_edit');

 			});
 			$("#create-new-grid").on("click", function(){
 				$('.task-window').slideToggle(300);
 			});
 			$("#cancel-grid").on("click", function(){
 				$('.task-window').slideUp(300);
 			});
 		});
})(window.jQuery);