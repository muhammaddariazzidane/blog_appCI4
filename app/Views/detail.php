<?= $this->extend('layouts/main') ?>

<?= $this->section('main') ?>
<?= $this->include('components/navbar') ?>
<!-- form create -->
<?= $this->include('components/formCreate') ?>


<div class="min-h-screen max-w-[740px] dark:text-white pt-32 mx-auto">

  <div class="px-6 lg:px-0">
    <div class="mb-4 max-w-[740px] relative mx-auto " style="min-height: 24em;">
      <img src="/img/<?= $post->postImg ?>" class="absolute left-0 top-0 w-full h-full z-0 object-contain" />

    </div>
    <h2 class="text-4xl font-semibold  text-center dark:text-gray-100 leading-tight">
      <?= $post->title ?>
    </h2>
    <h5 class="text-center dark:text-gray-300 text-base mt-3">post by : <?= $post->name_user ?></h5>
    <div class="px-4 lg:px-0 mt-8 mb-6 text-slate-700 dark:text-slate-400  mx-auto text-lg leading-relaxed">
      <p class="indent-12">
        <?= $post->body ?>
      </p>


    </div>
    <div class=" flex w-full justify-end dark:text-slate-500">
      <p>
        post at : <?= date('d F Y', $post->ct) ?>
      </p>
    </div>



    <form action="/comment" method="post" class="mt-8 scroll-mt-24" id="comment">
      <?= csrf_field() ?>
      <input type="hidden" name="post_id" value="<?= $post->postId ?>">
      <h1 class="dark:text-white mb-3">Comments</h1>
      <textarea name="value" class="textarea text-primary dark:bg-slate-200 textarea-primary w-full " placeholder="Bio"></textarea>
      <div class="flex justify-end my-2">
        <button type="submit" class="btn btn-primary">
          Send
        </button>
      </div>
    </form>
    <div class="mb-6 mt-12">
      <?php foreach ($comment as $c) : ?>
        <div class="flex-1 my-2 border rounded-lg relative border-primary px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
          <strong><?= $c->name ?></strong> <span class="text-xs text-gray-400 italic"><?= date('d F Y', $c->ct) ?></span>
          <p class="text-sm">
            <?= $c->value ?>
          </p>
          <div class="mt-4 flex items-center">

          </div>
          <!-- <div class="absolute top-0 right-0">
            <span class="text-red-600">lorem</span>
          </div> -->
        </div>
      <?php endforeach ?>

    </div>
    <div class="flex justify-end space-x-1 dark:text-white opacity-80">
      <a href="#comment" class=" text-sm underline mt-1 ">Add comment

        <i data-feather="corner-right-up" class="dark:text-white inline-flex"></i>
      </a>
    </div>
    <div class="mb-12">


      <?= $this->include('components/topics') ?>
    </div>
  </div>

</div>


<?= $this->endSection() ?>