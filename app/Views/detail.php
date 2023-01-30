<?= $this->extend('layouts/main') ?>

<?= $this->section('main') ?>
<?= $this->include('components/navbar') ?>
<!-- form create -->
<input type="checkbox" id="my-modal-4" class="modal-toggle" />

<label for="my-modal-4" class="modal  cursor-pointer">
  <label class="modal-box relative  dark:bg-black scrollbar-hide" for="">
    <h1 class="mb-5 text-center dark:text-white text-2xl">Create New Post</h1>

    <form action="/posts" method="post" class=" w-full" enctype="multipart/form-data">
      <?= csrf_field() ?>
      <label for="title" class="label">
        <span class="label-text dark:text-white">Title</span>
      </label>
      <input type="text" name="title" placeholder="Type here" class="input mb-3 border-primary  focus:outline-primary w-full max-w-full " value="<?= old('title') ?>" />
      <label for="" class="label">
        <span class="label-text dark:text-white">Category</span>
      </label>
      <select class="select select-bordered border-primary focus:outline-primary w-full max-w-full" name='category_id'>
        <?php if ($category) : ?>
          <?php foreach ($category as $c) : ?>

            <option value="<?= $c->id ?>"><?= $c->name ?></option>
          <?php endforeach ?>
        <?php else : ?>
          <option>Category Not Found</option>
        <?php endif ?>

      </select>
      <div class="form-control  w-full max-w-full">
        <label class="label">
          <span class="label-text dark:text-white">Image</span>
        </label>
        <input type="file" id="image" name="image" class="file-input  file-input-bordered w-full max-w-full" />

      </div>
      <label for="body" class="label">
        <span class="label-text dark:text-white">Body</span>
      </label>
      <textarea name="body" id="body" class="textarea textarea-primary w-full" required></textarea>

      <div class="mt-5">
        <button type="submit" class="btn btn-primary">Create Post</button>
      </div>
    </form>
  </label>
</label>

<div class="min-h-screen max-w-[740px] dark:text-white pt-32 mx-auto">
  <div class="px-6 lg:px-0">
    <div class="mb-4 max-w-[740px] relative mx-auto " style="height: 24em;">
      <img src="/img/<?= $post->image ?>" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />

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