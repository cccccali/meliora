<<<<<<< HEAD
=======

>>>>>>> da34aa657b9bd6e177fc2fcfd049ea77497b7b0d
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