<!-- @extends('layouts.index') -->
<?= $this->extend('layouts/main') ?>
<?= $this->section('main') ?>
<div class=" flex flex-col min-h-screen ">
  <div class=" flex flex-1 justify-center items-center">
    <div class="rounded-xl px-4 lg:px-12 py-12 lg:max-w-md  w-full shadow-sm dark:shadow-primary">

      <form action="/login" method="post" class="text-center">
        <h1 class="font-bold tracking-wider text-3xl mb-4 w-full dark:text-white">
          Login
        </h1>
        <?php if (session()->getFlashdata('error')) : ?>
          <div class="alert alert-warning shadow-lg" id='message'>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>

              <span><?= session()->getFlashdata('error') ?></span>
            </div>
          </div>
        <?php endif ?>
        <?php if (session()->getFlashdata('message')) : ?>
          <div class="alert alert-success shadow-lg" id="message">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span><?= session()->getFlashdata('message') ?></span>
            </div>
          </div>
        <?php endif ?>
        <?= csrf_field() ?>
        <div class="py-2">
          <label for="" class=" label">
            <span class="label-text dark:text-white text-md">
              Email
            </span>
          </label>
          <input required class="bg-white border-2 border-primary focus:outline-none  block w-full py-2 px-4 rounded-full" type="email" name="email" id="" placeholder="nama@mm.com">
        </div>
        <div class="py-2">
          <label for="" class=" label">
            <span class="label-text dark:text-white text-md">
              Password
            </span>
          </label>
          <input required class="bg-white border-2 border-primary focus:outline-none  block w-full py-2 px-4 rounded-full" type="password" name="password" id="" placeholder="passsword kamu">
        </div>
        <button type="submit" class="bg-violet-600 p-3 rounded-full w-full my-5 px-5 text-white">Login</button>
      </form>
      <span class="dark:text-white text-center my-3 text-sm block">Dont have an account? <a href="/register" class='underline'>Register</a>
      </span>
    </div>
  </div>
</div>
<?= $this->endSection() ?>