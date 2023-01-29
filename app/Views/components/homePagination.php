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
  <button class="btn-sm btn-active">
    <a href=""><?= $posts[0]->getCurrentPage() ?></a>
  </button>



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