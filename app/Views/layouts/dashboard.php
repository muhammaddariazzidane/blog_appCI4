<?= $this->extend('template/index') ?>
<?= $this->section('template') ?>
<title><?= $title ?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.2/jodit.es2018.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.2/jodit.es2018.min.js"></script>

</head>

<body class="relative">

  <?= $this->include('components/dashboard/header') ?>

  <div as="button" class=" lg:hidden absolute  bg-black/60 z-[99] min-h-screen overflow-y-scroll w-full" id="bgSidebar" onclick="toggleSidebar()">
  </div>
  <?= $this->include('components/dashboard/sidebar') ?>


  <!--  -->
  <main id="main" class="bg-slate-700 transition-all duration-300 lg:ml-[23%] min-h-screen h-full">
    <div class="pt-20 mx-6 mb-6 mt-2">
      <?php if (session()->get('is_admin')) : ?>
        <h1 class="text-white text-2xl font-semibold"><?= $title ?></h1>
      <?php else : ?>
        <h1 class="text-white text-2xl font-semibold">My Post</h1>
      <?php endif ?>
      <!-- {{-- <h1 class="text-white text-2xl font-semibold">Dashboard</h1> --}} -->

      <!-- @if (session()->has('success')) -->

      <!-- @endif -->

    </div>
    <!-- {{-- table --}} -->
    <?= $this->renderSection('dashboard') ?>
  </main>


  <script>
    var editor = Jodit.make('#editor');

    const alt = document.querySelector('#message')
    window.addEventListener('load', function() {
      const timeAlert = setTimeout(() => {
        alt.classList.add('hidden')
      }, 3000);
    })
    const toggleSide = document.querySelector('#toggleSide')
    const sidebar = document.querySelector('#sidebar')
    const bgSidebar = document.querySelector('#bgSidebar')
    const main = document.querySelector('#main')
    const navMenu = document.querySelector("#navMenu")

    const toggleNavMenu = () => {
      navMenu.classList.toggle('-scale-y-0')

    }
    const toggleSidebar = () => {
      toggleSide.classList.toggle('lg:translate-x-72')
      main.classList.toggle('lg:ml-[23%]')
      sidebar.classList.toggle('-translate-x-full')
      bgSidebar.classList.toggle('-translate-x-full')
    }

    feather.replace()
  </script>
</body>

</html>
<?= $this->endSection() ?>