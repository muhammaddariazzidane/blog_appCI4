<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('dashboard') ?>

<div class="mx-6">

  <label for="my-modal-4" class="btn btn-primary">Add Category</label>

</div>
<!-- search -->
<div class="form-control mt-5 mx-6">
  <form action="" method="get">
    <div class="input-group">
      <input type="text" placeholder="Search... " name="keyword" class="input  focus:border-primary focus:border  min-w-[17.8rem]  input-bordered" />
      <button class="btn focus:bg-primary btn-square bg-black" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </button>
    </div>
  </form>
</div>
<?php if (session()->getFlashdata('message')) : ?>

  <div class="max-w-xs mx-7 mt-5">

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
<?php if (session()->getFlashdata('success')) : ?>

  <div class="max-w-xs mx-7 mt-5">

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


<input type="checkbox" id="my-modal-4" class="modal-toggle" />

<label for="my-modal-4" class="modal  cursor-pointer">
  <label class="modal-box relative  bg-slate-900 scrollbar-hide" for="">
    <h1 class="mb-5 text-center text-white text-2xl">Create New Category</h1>

    <form action="/dashboard/categories" method="post" class=" w-full">
      <?= csrf_field() ?>
      <!-- @csrf -->
      <label for="title" class="label">
        <span class="label-text text-white">Name</span>
      </label>
      <input type="text" name="name" placeholder="Type here" class="input mb-3 border-primary focus:outline-primary w-full max-w-full " value="<?= old('name')  ?>" />



      <div class="mt-5">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
  </label>
</label>

<?php if ($categories) : ?>

  <div>
    <div class="mt-3  px-7 sm:px-8 py-4 overflow-x-auto">
      <div class="inline-block lg:max-w-full  mx-auto shadow-lg rounded-lg bg-slate-800 overflow-hidden">
        <table class="lg:max-w-full leading-normal ">
          <thead>
            <tr>
              <th class="px-5 py-3 border-b  text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                No
              </th>
              <th class="px-5 py-3 border-b  text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                Name
              </th>

              <th class="px-5 py-3 border-b  text-center text-xs font-semibold text-gray-400 uppercase tracking-wider">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($categories as $c) : ?>
              <!-- @foreach ($category as $c) -->
              <tr>
                <td class="px-7 py-5 border-b border-gray-500 bg-slate-700 text-sm">
                  <p class="text-white whitespace-no-wrap"><?= $i++ ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-500 bg-slate-700 text-sm">
                  <div class="flex items-center">
                    <!-- {{-- <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-full h-full rounded-full"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                    alt="" />
                            </div> --}} -->
                    <div class="">
                      <p class="text-white whitespace-no-wrap">
                        <!-- {{ $c->name }} -->
                        <?= $c->name ?>
                      </p>
                    </div>
                  </div>
                </td>


                <td class="px-5 py-5 border-b border-gray-500 bg-slate-700 text-sm">
                  <div class="flex items-center gap-4">

                    <form action="/dashboard/categories/<?= $c->id ?>" method="post">

                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" onclick="return confirm('are you sure to delete ?')">
                        <i data-feather="trash-2" class="text-red-600"></i>
                      </button>
                    </form>
                    <a href="/dashboard/categories/<?= $c->id ?>" class="text-primary">
                      <i data-feather="edit"></i>

                    </a>

                  </div>
                </td>
              </tr>
              <!-- @endforeach -->
            <?php endforeach ?>

          </tbody>
        </table>
        <!-- {{-- <div
                        class="px-5 pb-3 py-2 bg-slate-800  flex flex-col xs:flex-row items-center xs:justify-between          ">
                    </div> --}} -->
      </div>
      <div class="lg:max-w-[36.7%] max-w-xs bg-slate-700 py-8 ">
        <div class="flex px-1 justify-around ">
          <?= $pager->links('categories', 'categoryPaginate') ?>
        </div>
      </div>
    </div>

  </div>
<?php else : ?>
  <!-- @else -->
  <h1 class="text-3xl py-16 text-white text-center">Category Not Found</h1>
<?php endif ?>
<!-- @endif
@endsection -->


<?= $this->endSection() ?>