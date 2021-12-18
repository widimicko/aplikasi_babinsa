<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('image/logo_tniad.png') ?>">
    

    <title>Aplikasi Koramil 0827/18 Kangean</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('library/bootstrap-5.1.3/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/auth.css') ?>" rel="stylesheet">
    <style>
        body {
            padding-top: 5rem;
        }
    </style>
    
    <?= $this->renderSection('pageStyles') ?>
</head>

<body>

<?= view('Myth\Auth\Views\_navbar') ?>

<main role="main">
	<?= $this->renderSection('main') ?>
</main><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= base_url('library/bootstrap-5.1.3/bootstrap.bundle.min.js') ?>"></script>

<?= $this->renderSection('pageScripts') ?>
</body>
</html>
