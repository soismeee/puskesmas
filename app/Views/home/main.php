<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Klinik Dharma Mulia</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/assets2/images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets2/images/logo.png">
    <link rel="stylesheet" href="<?= base_url() ?>/assets2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets2/css/style.css" />
</head>

<body>
    <!-- Topbar -->
    <?= $this->include('home/components/topbar') ?>

    <!--  ************************* About Us Starts Here ************************** -->
    <?= $this->renderSection('content'); ?>
</body>

<script src="<?= base_url() ?>/assets2/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url() ?>/assets2/js/popper.min.js"></script>
<script src="<?= base_url() ?>/assets2/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets2/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="<?= base_url() ?>/assets2/js/script.js"></script>

</html>