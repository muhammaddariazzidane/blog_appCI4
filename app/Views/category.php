<?= $this->extend('layouts/main') ?>
<?= $this->section('main') ?>

<?= $this->include('components/navbar') ?>

<div class="min-h-screen max-w-[740px] dark:text-white pt-32 mx-auto">
  <?php if ($posts) : ?>
    <div class="w-full lg:px-0 px-6">
      <?php foreach ($posts as $p) : ?>
        <div class="my-6">

          <a href="/detail/<?= $p->postId ?>">
            <h1 class="text-3xl font-semibold mb-3 "><?= $p->title ?>
            </h1>
          </a>
          <div class="flex lg:flex-row flex-col mb-3">
            <div class="lg:w-[70%] w-full lg:pr-4">
              <p class="text-slate-600  dark:text-slate-400"><?= substr($p->body, 0, 350) ?>...<em class="hover:cursor-pointer hover:underline text-primary "><a href="/detail/<?= $p->postId ?>">Read more</a></em>
              </p>
            </div>
            <div class="w-full h-60 lg:mt-0 mt-4 lg:max-w-[30%] lg:max-h-36">
              <img src="/img/<?= $p->image ?>" class="inline-flex w-full h-full object-contain" alt="">
            </div>
          </div>
          <div class="w-full mt-5 flex justify-between lg:flex-row flex-col">
            <div>

              <a href="/category/<?= $p->category_id ?>" class="max-w-20 text-white lg:mt-4 mt-5 hover:bg-indigo-400 transition-all duration-300 bg-indigo-500 p-2 rounded-md"># <?= $p->name_category ?></a>
            </div>
            <div class="lg:mt-5 mt-4">
              <p class="dark:text-slate-300 text-slate-500">Post By : <?= $p->name_user  ?></p>
            </div>
          </div>
          <div class="mt-5">
            <div class="border border-dotted border-black dark:border-white"></div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="lg:px-0 px-6 my-12">
      <?= $this->include('components/topics') ?>
    </div>
  <?php else : ?>
    <h1 class="text-3xl py-32 text-black dark:text-white text-center">Post Not Found</h1>

  <?php endif ?>
</div>


<?= $this->endSection() ?>