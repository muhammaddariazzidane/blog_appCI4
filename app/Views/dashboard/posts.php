<?= $this->extend('layouts/dashboard') ?> <?= $this->section('dashboard') ?>

<?php if ($posts) : ?>

  <?php if (session()->getFlashdata('success')) : ?>

    <div class="max-w-xs mx-7 my-5">

      <div class="alert alert-success shadow-lg mt-4 transition-all duration-300" id='message'>
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>
            <?= session()->getFlashdata('success') ?>

          </span>
        </div>
      </div>
    </div>
  <?php endif ?>
  <div class="overflow-auto rounded-lg shadow-md  mx-5">
    <table class="w-full  bg-slate-800 text-left text-sm text-white">
      <thead class="bg-slate-900">
        <tr>
          <th scope="col" class="px-6 py-4 font-medium text-white">No</th>
          <th scope="col" class="px-6 py-4 font-medium text-white">Title</th>
          <th scope="col" class="px-6 py-4 font-medium text-white">Body</th>
          <th scope="col" class="px-6 py-4 font-medium text-white">Category</th>
          <th scope="col" class="px-6 py-4 font-medium text-white">Image</th>
          <th scope="col" class="px-6 py-4 font-medium text-white">Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- @foreach ($posts as $p) -->
        <?php $i = 1 ?>
        <?php foreach ($posts as $p) : ?>
          <tr class="hover:bg-slate-900 transition-all duration-300">
            <td class="px-6 py-4 whitespace-pre-line">
              <h1><?= $i++ ?></h1>
            </td>
            <td class="px-6 py-4 whitespace-pre-line">
              <h1><?= $p->title ?></h1>
            </td>
            <td class="px-6 py-4 whitespace-pre-line"><?= substr($p->body, 0, 80) ?></td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                <?= $p->name_category ?>
              </span>

            </td>
            <td class="px-6 py-4">
              <div class="w-20 min-h-12">

                <img class="h-full w-full  object-cover object-center" src="/img/<?= $p->image ?>" alt="" />
              </div>
            </td>
            <td class="px-6 py-4">
              <div class="flex justify-start gap-4">
                <form action="/posts/<?= $p->postId ?>" method="post">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" onclick="return confirm('are you sure to delete ?')">
                    <i data-feather="trash-2" class="text-red-600"></i>
                  </button>
                </form>
                <a href="/posts/<?= $p->postId ?>/edit" class="text-primary">
                  <i data-feather="edit"></i>

                </a>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
        <!-- @endforeach -->


      </tbody>
    </table>

  </div>

<?php else : ?>
  <h1 class="text-3xl py-16 text-white text-center">Post Not Found</h1>
<?php endif ?>
<?= $this->endSection() ?>