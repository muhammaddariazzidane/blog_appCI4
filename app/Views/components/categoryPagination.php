<?php $pager->setSurroundCount(0) ?>
<?php if ($pager->getPrevious()) : ?>
  <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
    <span class="flex  mr-2 hover:underline text-white">

      <i data-feather="chevron-left" class="mt-[0.1rem]"></i>
      <p class="text-md font-semibold">
        Prev page
      </p>
    </span>
  </a>
<?php else : ?>
  <span class="flex  mr-2 text-slate-500">

    <i data-feather="chevron-left" class="mt-[0.1rem]"></i>
    <p class="text-md font-semibold">
      Prev page
    </p>
  </span>

<?php endif ?>

<div class="btn-group shadow-sm   text-white">
  <?php foreach ($pager->links() as $link) : ?>



    <?php if ($pager->getPreviousPageNumber()) : ?>
      <!-- <button >
        </button> -->

      <a class="btn btn-sm" href="<?= $pager->getPrevious() ?>"><?= $pager->getPreviousPageNumber() ?></a>
    <?php endif ?>
    <a href="<?= $link['uri'] ?>" class="btn btn-sm <?= $link['active'] ? 'btn-active' : '' ?>">
      <!-- <button> -->
      <?= $link['title'] ?>
      <!-- </button> -->
    </a>
    <?php if ($pager->getNextPageNumber()) : ?>

      <a class="btn btn-sm" href="<?= $pager->getNext() ?>"><?= $pager->getNextPageNumber() ?></a>

    <?php endif ?>
    <!-- @else -->




  <?php endforeach ?>
</div>

<!-- <li>
      </li> -->
<?php if ($pager->getNext()) : ?>
  <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
    <span class="flex ml-2 hover:underline text-white">
      <p class="text-md font-semibold">
        Next page
      </p>
      <i data-feather="chevron-right" class="mt-[0.1rem]"></i>
    </span>
  </a>
<?php else : ?>
  <span class="flex ml-2  text-slate-500">
    <p class="text-md font-semibold">
      Next page
    </p>
    <i data-feather="chevron-right" class="mt-[0.1rem]"></i>
  </span>


<?php endif ?>