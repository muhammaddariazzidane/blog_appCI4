<?= $this->extend('layouts/dashboard') ?>
<?= $this->section('dashboard') ?>

<?php if ($users) : ?>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="max-w-xs lg:max-w-md mx-auto my-5">

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
  <!-- <div class="flex justify-end  w-full"> -->
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
  <!-- </div> -->
  <div>
    <div class="mx-2 px-4 sm:px-8 py-4 overflow-x-auto">
      <div class="inline-block min-w-full  shadow-lg rounded-lg bg-slate-800 overflow-hidden">
        <table class="min-w-full leading-normal ">
          <thead>
            <tr>
              <th class="px-5 py-3 border-b  text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                No
              </th>
              <th class="px-5 py-3 border-b  text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                Name
              </th>
              <th class="px-5 py-3 border-b  text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                Email
              </th>
              <th class="px-5 py-3 border-b  text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                Created at
              </th>

              <th class="px-5 py-3 border-b  text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $u) : ?>
              <?php if (!$u->is_admin) : ?>
                <tr>
                  <td class="px-5 py-5 border-b border-gray-500 bg-slate-700 text-sm">
                    <p class="text-white whitespace-no-wrap">no</p>
                  </td>
                  <td class="px-5 py-5 border-b border-gray-500 bg-slate-700 text-sm">
                    <div class="flex items-center">
                      <!-- <div class="flex-shrink-0 w-10 h-10">
                        <img class="w-full h-full rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80" alt="" />
                      </div> -->
                      <div class="">
                        <p class="text-white whitespace-no-wrap">
                          <?= $u->name ?>
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-5 py-5 border-b border-gray-500 bg-slate-700 text-sm">
                    <p class="text-white whitespace-no-wrap"> <?= $u->email ?></p>
                  </td>
                  <td class="px-5 py-5 border-b border-gray-500 bg-slate-700 text-sm">
                    <p class="text-white whitespace-no-wrap">
                      <?= $u->created_at ?>
                    </p>
                  </td>

                  <td class="px-5 py-5 border-b border-gray-500 bg-slate-700 text-sm">
                    <div class="flex items-center gap-4">

                      <form action="/dashboard/users/<?= $u->id ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('are you sure to delete ?')">
                          <i data-feather="trash-2" class="text-red-600"></i>
                        </button>
                      </form>
                      <a href="/dashboard/posts/{{ $u->id }}/edit" class="text-primary">
                        <i data-feather="edit"></i>

                      </a>

                    </div>
                  </td>
                </tr>

              <?php endif ?>
            <?php endforeach ?>

            <!-- @endforeach -->

          </tbody>
        </table>

      </div>
    </div>
    <div class="w-full py-8 mx-auto">
      <div class="flex justify-around ">
        <?= ($pager->links('users', 'categoryPaginate')) ?>
        <!-- {{-- pagination components --}}
                    {{ $users->links('components.dashboard.dashboard-pagination') }} -->

      </div>
    </div>
  </div>






<?php else : ?>
  <h1 class="text-3xl py-16 text-white text-center">Users Not Found</h1>

<?php endif ?>

<?= $this->endSection() ?>