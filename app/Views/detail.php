<?= $this->extend('layouts/main') ?>

<?= $this->section('main') ?>
<?= $this->include('components/navbar') ?>
<!-- form create -->
<?= $this->include('components/formCreate') ?>


<div class="min-h-screen max-w-[740px] dark:text-white pt-32 mx-auto">
  <div class="px-6 lg:px-0">
    <div class="mb-4 max-w-[740px] relative mx-auto " style="min-height: 24em;">
      <img src="/img/<?= $post->image ?>" class="absolute left-0 top-0 w-full h-full z-0 object-contain" />

    </div>
    <h2 class="text-4xl font-semibold  text-center dark:text-gray-100 leading-tight">
      <?= $post->title ?>
    </h2>
    <div class="px-4 lg:px-0 mt-8 mb-12 text-slate-700 dark:text-slate-400  mx-auto text-lg leading-relaxed">
      <p class="indent-12"><?= $post->body ?></p>


    </div>

    <div class="mb-12">

      <?= $this->include('components/topics') ?>
    </div>
  </div>

</div>


<?= $this->endSection() ?>