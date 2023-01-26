<div class="navbar dark:bg-transparent dark:shadow-primary/30 dark:backdrop-blur-md transition-all duration-300 bg-transparent dark:text-white backdrop-blur-md fixed z-[999] top-0">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost btn-circle">

        <i data-feather='menu'></i>
      </label>
      <ul tabindex="0" class="mt-3 p-2 shadow-violet-800 shadow-sm dark:bg-slate-900 dark:shadow-violet-800/80 menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
        <!-- @auth -->
        <li class="lg:hidden block">
          <a href="/">
            Home
          </a>
        </li>
        <li>
          <a href="/dashboard">
            Dashboard
          </a>
        </li>
        <li>
          <a>
            <label for="my-modal-4">Create post</label>
          </a>
        <li>
          <form method="POST" action="/logout">
            <?= csrf_field() ?>
            <button type="submit">Logout</button>
          </form>
        </li>
        <!-- @else -->
        <li><a href="/login">Login</a></li>
        <!-- @endauth -->
      </ul>
    </div>
  </div>
  <div class="navbar-center">
    <a class="btn btn-ghost normal-case text-xl text-transparent bg-clip-text bg-gradient-to-r from-red-600  to-purple-700 "><?= $title ?></a>
  </div>
  <div class="navbar-end ">


    <ul class="menu menu-horizontal font-semibold px-1">
      <li><a href="/" class="lg:block hidden">Home</a></li>

      <li><a href="/about">About</a></li>

    </ul>
  </div>
</div>