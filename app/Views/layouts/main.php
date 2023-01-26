<?= $this->extend('template/index') ?>

<?= $this->section('template') ?>
<title><?= $title ?></title>
</head>

<body>
  <?= $this->renderSection('main') ?>
</body>

</html>

<?= $this->endSection() ?>