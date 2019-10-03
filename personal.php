<?php require 'top.php' ?>
	<div class="main">
		<div class="w3-quarter w3-center login-success">
			<?php 
				if( !isset($_SESSION['Username']) ){
					require 'login.php';
				}else{
					require 'loginSuccess.php';
				}
			?>
		</div>
		<div class="w3-threequarter per_content ">
			<?php 
				if( !isset($_SESSION['Username']) ){
					require 'loginResultFail.php';
				}else {
					require 'loginResult.php';
				}
			?>
		</div>
	</div>
<?php require 'bottom.php' ?>