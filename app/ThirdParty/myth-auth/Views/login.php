<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="https://source.unsplash.com/random/400x150" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="https://source.unsplash.com/random/400x150" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="https://source.unsplash.com/random/400x150" class="d-block w-100" alt="...">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
	<div class="mt-5 mb-5 row">
		<div class="col-sm-6 offset-sm-3">

			<div class="card">
				<h2 class="card-header"><?= lang('Auth.loginTitle') ?></h2>
				<div class="card-body">

					<?= view('Myth\Auth\Views\_message_block') ?>

					<form action="<?= route_to('login') ?>" method="post">
						<?= csrf_field() ?>

						<?php if ($config->validFields === ['email']) : ?>
							<div class="mb-3 form-group">
								<label for="login"><?= lang('Auth.email') ?></label>
								<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
								<div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
						<?php else : ?>
							<div class="mb-3 form-group">
								<label for="login"><?= lang('Auth.emailOrUsername') ?></label>
								<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
								<div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
						<?php endif; ?>

						<div class="mb-3 form-group">
							<label for="password"><?= lang('Auth.password') ?></label>
							<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
						</div>

						<?php if ($config->allowRemembering) : ?>
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
									<?= lang('Auth.rememberMe') ?>
								</label>
							</div>
						<?php endif; ?>

						<br>

						<button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
					</form>

					<hr>
					<?php if ($config->activeResetter) : ?>
						<p><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</div>

<?= $this->endSection() ?>