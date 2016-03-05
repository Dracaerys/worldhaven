<?php include("../inc/header.php") ?>
<html>
<head>
</head>
<body>
	<div id="worldBox" class="box formBox">
		<?php include_once("../inc/newWorld.php"); ?>
	</div>

	<script>
			// auto adjust the height of
			$('#desc').on( 'keydown', 'textarea', function (e){
				$(this).css('height', 'auto' );
				$(this).height( this.scrollHeight );
				console.log('no way')
			});
			$('#desc').find( 'textarea' ).keydown();
	</script>
</body>
</html>