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
	                session::flash('home', 'You have successfully been logged in!');
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
				swal('Error','Nonexistent username or incorrect password.  Please try again.','error');
			</script>";
	}
	if (!$validFlag && !is_null($validation) ) {
		echo "<script>
				swal('Both fields are required.','error');
			</script>";		
	}
?>

<script>
	function register() {
		swal({
			title: "Register for an account",
			text: '<p class="alert alert-warning">Demo purposes only, please dont use your real NetID/password!</p>'+
					'<input id="registerID" type="text" name="registerID" class="form-control m-t-1" placeholder="NetID" required autofocus>'+
					'<input id="registerPassword" type="password" name="registerPassword" class="form-control" placeholder="Password" required>',
			type: "info",
			showCancelButton: true,
			closeOnConfirm: false,
			animation: "pop", 
			showLoaderOnConfirm: true,
			html: true 
			},
			function(){
				var id = $("#registerID");
				var pass = $("#registerPassword"); 
				if (id.val() === false || id.val() === ""){
					swal.showInputError("Type your NetID please");
					return;
				} else if (id.val().length < 6) {
					 swal.showInputError("Invalid NetID");
					 return;
				} else if (pass.val() === false || pass.val() === "") {
					swal.showInputError("You need a password");
					return;
				} else if (pass.val().length < 6 ) {
					swal.showInputError("Your password must be more than 6 digits");
					return;
				}
				$.ajax({ 
					url: "/pages/register.php?id="+id.val()+"&pass="+pass.val(),
					dataType : 'json',
					timeout: 10000})
					.done(function(Result) {
						swal("Nice!", "You're all set!", "success");
					})
					.fail(function(data) {
		             	if (data.message == "null_inputs" || data.message == "short_inputs" || data.message == "token_failure")
							swal("Error", "You must provide valid inputs");
						else 
							swal("Sorry", "There was an unknown error.  Please try again.");
				});
			});
	}
</script>
<div class="row flex-items-xs-center m-x-1">
	<div class="col-lg-6 col-sm-9 col-xs-12">
		<div class="jumbotron row flex-items-xs-center m-t-3">
			<div class="col-sm-10 col-xs-12">
				<h1 class="text-xs-center display-4">Welcome to Better Registrar</h1>
				<form action="" method="post">
					<input type="text" name="inputID" class="form-control <?php echo($failedFlag ? 'form-control-danger' : '') ?>"" placeholder="NetID" required autofocus>
					<input type="password" name="inputPassword" class="form-control <?php echo($failedFlag ? 'form-control-danger' : '') ?>" placeholder="Password" required>
					<input type=hidden name=token value="<?php echo token::generate(); ?>"/>
					<div class=" p-y-1">
						<label class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="rememberMe">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">Remember me</span>
						</label>
					</div>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					<a href="javascript:void(0);" onclick="register()" class="m-x-auto">I don't have an account</a>
				</form>
			</div>
		</div>
	</div>
</div>