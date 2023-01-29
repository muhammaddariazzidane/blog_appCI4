<?= $this->extend('layouts/dashboard') ?> <?= $this->section('dashboard') ?>

<?php if ($posts) : ?>
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
            <td class="px-6 py-4 whitespace-pre-line"><?= substr($p->body, 0, 10) ?></td>
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
                <form action="/dashboard/posts/<?= $p->postId ?>" method="post">

                  <button type="submit" onclick="return confirm('are you sure to delete ?')">
                    <i data-feather="trash-2" class="text-red-600"></i>
                  </button>
                </form>
                <a href="/dashboard/posts/{{ $p->id }}/edit" class="text-primary">
                  <i data-feather="edit"></i>

                </a>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
        <!-- @endforeach -->


      </tbody>
    </table>
    <div class="w-full py-8 mx-auto">
      <div class="flex justify-around ">

      </div>
    </div>
  </div>

<?php else : ?>
  <h1 class="text-3xl py-16 text-white text-center">Post Not Found</h1>
<?php endif ?>
<?= $this->endSection() ?>