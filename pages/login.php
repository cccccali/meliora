<<<<<<< HEAD
=======
<?php
	if((new user())->isLoggedIn()){
		redirect::to('home');
	}

	if(input::exists()){
		if(token::check(input::get('token'))){
			$validation = (new validate())->check($_POST, array(
				'inputID' => array('required' => true),
				'inputPassword' => array('required' => true)
			));

			if($validation->passed()){
				$user = new user();

				$remember = (input::get('rememberMe') === 'on') ? true : false;

				$login = $user->login(input::get('inputID'), input::get('inputPassword'), $remember);

				if($login){
					redirect::to('home');
				}
				else{
					$failedFlag = true;
				}
				$validFlag = true;
			}
			else{
				$validFlag = false;        
			}
		}
	}

?>

<?php
	if ($failedFlag == true) {
		echo "<script>
				swal('Nonexistent username or incorrect password.  Please try again.','error');
			</script>";
	}
	if (!$validFlag && !is_null($validation) ) {
		foreach($validation->errors() as $error){
			echo "<script>
					swal('Both fields are required.','error');
				</script>";		
		}
	}
?>

>>>>>>> parent of da34aa6... osx fix
<div class="row flex-items-xs-center">
	<div class="col-lg-6 col-sm-9 col-xs-12">
		<div class="jumbotron row flex-items-xs-center m-t-3">
			<div class="col-sm-10 col-xs-12">
				<h1 class="text-xs-center display-4">Welcome to Better Registrar</h1>
				<form action="" method="post">
					<input type="text" name="inputID" class="form-control <?php $failedFlag ? 'form-control-danger' : '' ?>"" placeholder="Student ID" required autofocus>
					<input type="password" name="inputPassword" class="form-control <?php $failedFlag ? 'form-control-danger' : '' ?>" placeholder="Password" required>
					<input type=hidden name=token value="<?php echo token::generate(); ?>"/>
					<div class=" p-y-1">
						<label class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="rememberMe">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">Remember me</span>
						</label>
					</div>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					<a href="" class="text-xs-center">I don't have an account</a>
				</form>
			</div>
		</div>
	</div>
</div>
