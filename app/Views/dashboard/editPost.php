<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('dashboard') ?>

<?php if (session()->getFlashdata('message')) : ?>

  <div class="max-w-sm mx-7 my-5">

    <div class="alert alert-warning shadow-lg " id="message">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
        <span><?= session()->getFlashdata('message') ?></span>
      </div>
    </div>
  </div>
<?php endif ?>
<div class="mx-6 max-w-full">
  <div class="card  w-full  shadow-2xl bg-slate-900 ">
    <form method="post" enctype="multipart/form-data" action="/posts/<?= $post->postId ?>" class="card-body">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="oldImage" value="<?= $post->image ?>">

      <!-- <input type="hidden" name="id" value=""> -->
      <div class="form-control">
        <label class="label">
          <span class="label-text text-white mb-1">Title</span>
        </label>
        <input value="<?= $post->title ?>  " type="text" placeholder="Title" name="title" class="input border-primary input-bordered" />
      </div>
      <label for="" class="label">
        <span class="label-text text-white">Category</span>
      </label>
      <div class="form-control">
        <select class="select select-bordered border-primary focus:outline-primary w-full max-w-full" name='category_id'>
          <?php if ($category) : ?>
            <?php foreach ($category as $c) : ?>
              <?php if (old('category_id', $post->category_id == $c->id)) : ?>
                <option value="<?= $c->id ?>" selected><?= $c->name ?></option>
              <?php else : ?>
                <option value="<?= $c->id ?>"><?= $c->name ?></option>
              <?php endif ?>
            <?php endforeach ?>
          <?php else : ?>
            <option>Category Not Found</option>
          <?php endif ?>
        </select>
      </div>
      <div class="form-control  w-full max-w-full ">
        <label class="label">
          <span class="label-text text-white">Image</span>
        </label>
        <div class="flex items-center gap-6">
          <div class="shrink-0">
            <img class="h-16 w-20 object-cover img-preview" src="/img/<?= $post->image ?>" alt="Current profile photo" />
          </div>
          <!-- <span class="sr-only">Choose profile photo</span> -->
          <input name="image" type="file" id="image" onchange="PreviewImage()" class=" w-full rounded-lg bg-white text-sm text-slate-500 file:mr-4 file:py-3 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-primary hover:file:bg-violet-100" />
        </div>
      </div>
      <div class="form-control">
        <label class="label">
          <span class="label-text text-white mb-1">Body</span>
        </label>
        <textarea type="text" id="editor" name="body" class="textarea textarea-bordered">
        <?= $post->body ?>
        </textarea>
      </div>
      <div class="form-control mt-6">
        <button class="btn btn-primary" type="submit">Update</button>
      </div>
    </form>
  </div>

  <?= $this->endSection() ?>