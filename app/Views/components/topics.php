<div class="flex max-w-full items-center mt-14 justify-start">
  <div class=" py-5">

    <div class="font-semibold">
      Recommended Topics
    </div>

    <div class="mt-3 flex flex-wrap gap-3">

      <?php foreach ($category as $c) : ?>
        <a href="/category/<?= $c->id ?>" class="bg-primary hover:bg-primary/80 duration-300 rounded-full px-4 py-2 font-light text-white text-sm">
          <?= $c->name ?>
        </a>
      <?php endforeach ?>





    </div>

  </div>
</div>