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
<div class="flex gap-3 mx-6  lg:flex-row flex-col ">

  <div class="w-full m">
    <div class="card card-side bg-slate-900 flex  text-white items-center shadow-xl">
      <figure class="h-full  w-36">
        <img src="/img/<?= $user->user_image ?>" alt="user_image" />
      </figure>
      <div class="card-body">
        <h2 class="card-title"><?= $user->name ?></h2>
        <p><?= $user->email ?></p>
        <div class="card-actions justify-end">
          <button class="btn btn-primary" onclick="toggleEdit()">Edit</button>
        </div>
      </div>
    </div>

  </div>
  <!-- <div> -->
  <div id="formEdit" class=" scale-y-0 w-full lg:-mt-8 mt-3 transition-all duration-300">
    <div class="card  w-full  shadow-2xl bg-slate-900 ">
      <h1 class="text-white mt-6 font-semibold text-2xl text-center">
        Edit Your Profile
      </h1>
      <form method="post" action="/dashboard/profile/<?= $user->id ?>" class="card-body" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <!-- <input type="hidden" name="_method" value="PUT"> -->
        <input type="hidden" name="oldImage" value="<?= $user->user_image ?>">

        <!-- <input type="hidden" name="id" value=""> -->
        <div class="form-control">
          <label class="label">
            <span class="label-text text-white mb-1">Your Name</span>
          </label>
          <input value="<?= $user->name ?>" type="text" placeholder="name " name="name" class="input input-bordered" />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text text-white mb-1">Your email</span>
          </label>
          <input value="<?= $user->email ?>" readonly type="text" placeholder="name " name="email" class="input input-bordered" />
        </div>
        <div class="form-control  w-full max-w-full">
          <label class="label">
            <span class="label-text text-white">Your image</span>
          </label>
          <div class="flex lg:items-center lg:flex-row flex-col ">
            <div class="shrink-0">
              <img class="h-16 w-20 object-cover mr-4 mb-2  img-preview" src="/img/<?= $user->user_image ?>" alt="Current profile photo" />
            </div>
            <input name="user_image" type="file" id="image" onchange="PreviewImage()" class=" w-full rounded-lg bg-white text-sm text-slate-500 file:mr-4 file:py-[0.85rem] file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-primary hover:file:bg-violet-100" />
          </div>
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
      </form>
    </div>
  </div>
  <!-- </div> -->
</div>
<script>
  const formEdit = document.querySelector('#formEdit')
  const toggleEdit = () => {
    formEdit.classList.toggle('scale-y-0')
  }
</script>
<?= $this->endSection() ?>