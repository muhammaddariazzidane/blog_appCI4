<header class="w-full px-4 h-16 fixed top-0  bg-slate-900">
  <nav class="flex justify-end">
    <div class="absolute left-6 top-4 transition-all duration-500 lg:translate-x-72" id="toggleSide">
      <div onclick="toggleSidebar()" as='button' class="text-white pr-4">
        <i data-feather="menu" class="mt-1 hover:cursor-pointer"></i>
      </div>
    </div>
    <div class="flex items-center space-x-1 lg:space-x-4">
      <a href="#" class="my-4 px-4  text-white"><?= session()->get('name') ?></a>
      <div as='button' class="text-white pr-4 relative" onclick="toggleNavMenu()">
        <i data-feather="chevrons-down" class="mt-1 hover:cursor-pointer" id="arrow"></i>
        <div id="navMenu" class="absolute bg-slate-800 rounded-lg w-32 min-h-full -scale-y-0  transition-all duration-300 hover:rounded-tr-lg rounded-tr-none top-8 right-7 z-[9999] shadow hover:shadow-xl">
          <ul class="flex flex-col  text-center ">
            <li class="p-2 hover:bg-primary transition-all rounded-t-lg duration-300"><a href="/">Home</a></li>
            </li>
            <li class="p-2 hover:bg-primary transition-all rounded-b-lg duration-300">
              <a href="/logout" class="block pb-1">Logout</a>
            </li>

          </ul>
        </div>
      </div>

    </div>
  </nav>
</header>