<?= $this->extend('template/index') ?>

<?= $this->section('template') ?>
<title><?= $title ?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.2/jodit.es2018.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.2/jodit.es2018.min.js"></script>


<style>
  * {
    font-family: 'Poppins', sans-serif !important;
  }



  .lds-dual-ring {
    display: inline-block;
    width: 80px;
    height: 80px;
  }

  .lds-dual-ring:after {
    content: " ";
    display: block;
    width: 64px;
    height: 64px;
    margin: 8px;
    border-radius: 50%;
    z-index: 9999999;
    border: 6px solid orangered;
    border-color: orangered transparent orangered transparent;
    animation: lds-dual-ring 1.2s linear infinite;
  }

  @keyframes lds-dual-ring {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }
</style>

<script>
  if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
      '(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark')
  } else {
    document.documentElement.classList.remove('dark')
  }
</script>
</head>

<body onload="hide()" class="relative dark:bg-slate-900 h-full min-h-screen transition-all duration-300 scrollbar-hide">

  <div class="fixed z-[9999]  w-full backdrop-blur-sm min-h-screen " id='loading'>
    <div class="fixed top-[40%] right-0 left-0 text-center">
      <div class="lds-dual-ring"></div>
    </div>
  </div>
  <!-- darkmode -->
  <div class="fixed lg:top-[5.5rem] top-[6rem] z-[9999] lg:right-24 right-7">
    <div id="dark-toggle" class="hover:shadow-xl bg-black text-white group transition-all duration-300 overflow-hidden dark:text-yellow-500 h-12  p-3 rounded-full hover:cursor-pointer">
      <i data-feather="moon" id="moon" class="group-hover:rotate-[360deg] rotate-[250deg] transition-all duration-700"></i>
      <i data-feather="sun" id='sun' class="translate-y-32 -mt-6 group-hover:rotate-[360deg] rotate-[250deg] transition-all duration-700"></i>
    </div>
  </div>
  <!-- end -->
  <?= $this->renderSection('main') ?>

  <footer class="w-full  p-4">
    <p class="text-center dark:text-slate-300 text-sm font-semibold">@ copyright 2023 <span class="uppercase">dariazzidane-blog</span>. All right reserved</p>
  </footer>




  <!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->



  <script>
    // 
    var editor = Jodit.make('#editor');

    let target = document.querySelector('#loading')

    function hide() {
      target.classList.add('hidden')
    }

    function show() {
      target.classList.remove('hidden')
    }
    const alt = document.querySelector('#message')
    window.addEventListener('load', function() {
      const timeAlert = setTimeout(() => {
        alt.classList.toggle('hidden')
      }, 5000);
    })
    const nav = document.querySelector('.navbar')
    window.addEventListener('scroll', function() {
      if (window.scrollY > 0) {
        nav.classList.add('shadow-md')
      } else {
        nav.classList.remove('shadow-md')
      }
    })

    feather.replace()

    const darkToggle = document.querySelector('#dark-toggle')
    const html = document.querySelector('html')
    const moon = document.querySelector('#moon')
    const sun = document.querySelector('#sun')
    darkToggle.addEventListener('click', () => {
      html.classList.toggle('dark')
      if (html.classList.value == 'dark') {
        sun.classList.remove('translate-y-32')
        moon.classList.add('translate-y-32')
        localStorage.theme = 'dark'
      } else {
        localStorage.theme = 'light'
        sun.classList.add('translate-y-32')
        moon.classList.remove('translate-y-32')
      }
    })
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
        '(prefers-color-scheme: dark)').matches)) {
      moon.classList.add('translate-y-32')
      sun.classList.remove('translate-y-32')
      // document.documentElement.classList.add('dark')
    } else {
      // document.documentElement.classList.remove('dark')
    }
    // document.addEventListener('trix-file-accept', function(e) {
    //     e.preventDefault()
    // })
    const alert = document.querySelector('#alert')
    const myFunction = () => {
      alert.classList.toggle('hidden')
    }
  </script>
</body>

</html>

<?= $this->endSection() ?>