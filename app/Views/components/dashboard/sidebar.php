<aside class=" transition-all duration-300 absolute bg-slate-900 min-h-screen h-full z-[999] scrollbar-hide overflow-y-scroll w-[40%] lg:w-[23%]" id="sidebar">
  <div class="absolute w-full text-white lg:shadow-none shadow-sm shadow-slate-800 h-16">
    <h1 class="my-4 text-lg lg:text-2xl lg:px-0 px-4 lg:text-center">Dashboard</h1>
    <div onclick="toggleSidebar()" as="button" class="hover:cursor-pointer absolute z-[99999] lg:hidden dark:bg-white bg-slate-900 rounded-full p-[0.4rem] top-3 right-2">
      <i data-feather="x" class="text-white  dark:text-red-600"></i>
    </div>
  </div>
  <div class="absolute top-16 min-h-screen h-full w-full  text-white">
    <div class="py-3">

      <a href="/" class="p-2 py-4 flex items-center  px-4 duration-300 cursor-pointer hover:bg-primary my-3 text-white">
        <i data-feather="home"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
      </a>
      <a href="/dashboard" class="p-2 py-4 flex items-center  px-4 duration-300 cursor-pointer <?= ($title == 'Dashboard' or $title == 'Edit Post') ? "bg-primary" : "" ?>  hover:bg-primary my-3 text-white">
        <i data-feather="grid"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Dashboard</span>
      </a>
      <?php if (session()->get('is_admin') == 1) : ?>
        <a href="/dashboard/users" class="p-2 py-4 flex items-center  px-4 duration-300 cursor-pointer <?= ($title == 'Lists User' or $title == 'Edit User') ? "bg-primary" : "" ?>  hover:bg-primary my-3  text-white">
          <i data-feather="users"></i>
          <span class="text-[15px] ml-4 text-gray-200 font-bold">Users</span>
        </a>
        <a href="/dashboard/categories" class="p-2 py-4 flex items-center  px-4 duration-300 cursor-pointer <?= ($title == 'Lists Category' or $title == 'Edit Category') ? "bg-primary" : "" ?> hover:bg-primary my-3 text-white">
          <i data-feather="folder"></i>
          <span class="text-[15px] ml-4 text-gray-200 font-bold">Category</span>
        </a>
        <!-- @endcan -->
      <?php else : ?>
      <?php endif ?>
      <!-- @can('admin') -->
    </div>
  </div>
</aside>