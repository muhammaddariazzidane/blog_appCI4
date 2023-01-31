<input type="checkbox" id="my-modal-4" class="modal-toggle" />

<label for="my-modal-4" class="modal  cursor-pointer">
  <label class="modal-box relative  w-11/12 max-w-5xl  dark:bg-slate-900 scrollbar-hide" for="">
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
        <div class="flex items-center ">
          <div class="shrink-0">
            <img class="h-16 w-20 object-cover mr-6 hidden img-preview" src="" alt="Current profile photo" />
          </div>
          <input name="image" type="file" id="image" onchange="PreviewImage()" class=" w-full rounded-lg bg-white text-sm text-slate-500 file:mr-4 file:py-[0.85rem] file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-primary hover:file:bg-violet-100" />
        </div>

        <!-- <input type="file" id="image" name="image" class="file-input  file-input-bordered w-full max-w-full" /> -->

      </div>
      <label for="body" class="label">
        <span class="label-text dark:text-white">Body</span>
      </label>
      <textarea name="body" id="editor" class="textarea textarea-primary w-full"></textarea>

      <div class="mt-5">
        <button type="submit" class="btn btn-primary">Create Post</button>
      </div>
    </form>
  </label>
</label>