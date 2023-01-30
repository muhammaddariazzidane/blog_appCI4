<?php if ($posts[0]->getPreviousPageURI()) : ?>
  <a href="<?= $posts[0]->getPreviousPageURI() ?>" aria-label="<?= lang('Pager.previous') ?>">
    <span class="flex  mr-2 hover:underline dark:text-white">

      <i data-feather="chevron-left" class="mt-[0.1rem]"></i>
      <p class="text-md font-semibold">
        Prev page
      </p>
    </span>
  </a>
<?php else : ?>
  <span class="flex  mr-2 text-slate-400  dark:text-gray-500">

    <i data-feather="chevron-left" class="mt-[0.1rem]"></i>
    <p class="text-md  font-semibold">
      Prev pages
    </p>
  </span>

<?php endif ?>


<div class="btn-group shadow-sm   dark:text-white">
  <?php if ($posts[0]->getPreviousPageURI()) : ?>
    <button class="btn-sm">
      <a href="/?page=<?= $posts[0]->getFirstPage() ?>">
        <i data-feather="chevrons-left"></i>
      </a>
    </button>
  <?php else : ?>
    <button class="btn-sm text-slate-500 dark:text-gray-500">
      <a href="/?page=<?= $posts[0]->getFirstPage() ?>">
        <i data-feather="chevrons-left"></i>
      </a>
    </button>
  <?php endif ?>

  <button class="btn-sm btn-active">
    <a href=""><?= $posts[0]->getCurrentPage() ?></a>
  </button>
  <?php if ($posts[0]->getNextPageURI()) : ?>
    <button class="btn-sm">
      <a href="/?page=<?= $posts[0]->getLastPage() ?>">
        <i data-feather="chevrons-right"></i>
      </a>
    </button>
  <?php else : ?>
    <button class="btn-sm text-slate-500 dark:text-gray-500">
      <a href="/?page=<?= $posts[0]->getLastPage() ?>">
        <i data-feather="chevrons-right"></i>
      </a>
    </button>
  <?php endif ?>



</div>

<!-- <li>
      </li> -->

<?php if ($posts[0]->getNextPageURI()) : ?>
  <a href="<?= $posts[0]->getNextPageURI() ?>" aria-label="<?= lang('Pager.next') ?>">
    <span class="flex ml-2 hover:underline dark:text-white">
      <p class="text-md font-semibold">
        Next page
      </p>
      <i data-feather="chevron-right" class="mt-[0.1rem]"></i>
    </span>
  </a>
<?php else : ?>
  <span class="flex ml-2 text-slate-400  dark:text-gray-500">
    <p class="text-md font-semibold">
      Next page
    </p>
    <i data-feather="chevron-right" class="mt-[0.1rem]"></i>
  </span>
<?php endif ?>