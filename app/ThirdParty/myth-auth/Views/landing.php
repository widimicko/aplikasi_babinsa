<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="w-100 background">


	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="<?= base_url('image/background_login/login1.jpg') ?>" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="<?= base_url('image/background_login/login2.jpg') ?>" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="<?= base_url('image/background_login/login3.jpg') ?>" class="d-block w-100" alt="...">
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

	<div class="container">
		<div class="login-card">
			<a href="<?= base_url('login') ?>" class="btn btn-block" style="width: 100px; 20px; background-color: #0B6623; color: white;"><?= lang('Auth.loginAction') ?></a>
		</div>
	</div>
</div>

</div>

<?= $this->endSection() ?>