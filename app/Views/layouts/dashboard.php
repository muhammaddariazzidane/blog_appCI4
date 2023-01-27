<?= $this->extend('template/index') ?>
<?= $this->section('template') ?>
<title><?= $title ?></title>
</head>

<body class="relative">

  <?= $this->include('components/dashboard/header') ?>

  <div as="button" class=" lg:hidden absolute  bg-black/60 min-h-screen overflow-y-scroll w-full" id="bgSidebar" onclick="toggleSidebar()">
  </div>
  <?= $this->include('components/dashboard/sidebar') ?>


  <!--  -->
  <main id="main" class="bg-slate-700 transition-all duration-300 lg:ml-[23%] min-h-screen h-full">
    <div class="pt-20 mx-6 mb-8 mt-2">

      <h1 class="text-white text-2xl font-semibold"><?= $title ?> </h1>
      <!-- {{-- <h1 class="text-white text-2xl font-semibold">Dashboard</h1> --}} -->

      <!-- @if (session()->has('success')) -->
      <?php if (session()->getFlashdata('success')) : ?>
        <div class="w-[50%] ">

          <div class="alert alert-success shadow-lg mt-4 transition-all duration-300" id='message'>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>
                <?= session()->getFlashdata('success') ?>

                <!-- {{ session('success') }} -->
              </span>
            </div>
          </div>
        </div>
      <?php else : ?>
      <?php endif ?>
      <!-- @endif -->

    </div>
    <!-- {{-- table --}} -->
    <?= $this->renderSection('dashboard') ?>
  </main>


  <script>
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