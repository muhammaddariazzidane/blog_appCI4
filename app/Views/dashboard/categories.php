<?= $this->extend('layouts/dashboard') ?> <?= $this->section('dashboard') ?>


<div class="mx-6">

  <label for="my-modal-4" class="btn btn-primary">Add Category</label>
</div>

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
      <!-- @error('name') -->
      <!-- <label for="" class="label mb-2">
        <span class="label-text-alt text-red-600">{{ $message }}</span>

      </label>
      @enderror -->


      <div class="mt-5">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
  </label>
</label>
<!-- {{--  --}} -->
<!-- @if ($category->count()) -->
<?php if ($categories) : ?>

  <div>
    <div class="mt-3  px-4 sm:px-8 py-4 overflow-x-auto">
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
                      <!-- @method('delete')
                  @csrf -->
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" onclick="return confirm('are you sure to delete ?')">
                        <i data-feather="trash-2" class="text-red-600"></i>
                      </button>
                    </form>
                    <a href="/dashboard/posts/{{ $c->id }}/edit" class="text-primary">
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
      <div class="lg:max-w-full   bg-slate-700 py-8 mx-auto">
        <div class="flex px-1 justify-around ">
          <!-- {{-- pagination components --}}
                        {{ $category->links('components.dashboard.dashboard-pagination') }} -->

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