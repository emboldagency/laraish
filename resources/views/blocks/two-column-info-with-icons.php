<?php
/**
 * Title: Two Column Info w/ Icons
 * Name: two-column-info-with-icons
 * Description: A custom two column block that displays blocks of info with an icon to the left.
 * Icon: info
 * Keywords: two column info icons
 */

// store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables
$info_items = $fields['info'];
?>

<?php if ($info_items) : ?>

<section class="<?php echo $background_color; ?>">
  <div class="container flex flex-wrap py-8 md:py-12">
    <?php foreach ($info_items as $item) : ?>
      <div class="flex flex-wrap justify-between w-full md:w-1/2">
        <div class="items-center w-full px-2 py-5 xs:w-24">
          <img
            src="<?php echo $item->icon->url ?>"
            alt="<?php echo $item->icon->alt ?>"
            width="<?php echo $item->icon->width ?>"
            height="<?php echo $item->icon->height ?>"
            class="w-full h-auto mx-auto align-middle max-w-20"
          />
        </div>
        <div class="w-full xs:w-[calc(100%-6rem)] p-5">
          <?php if ($item->title) : ?>
            <h2 class="mb-4 text-xl leading-normal uppercase md:text-2xl"><?php echo $item->title; ?></h2>
          <?php endif; ?>

          <?php if ($item->copy) : ?>
            <div class="mb-6 text-xl md:text-2xl">
              <?php echo $item->copy; ?>
            </div>
          <?php endif; ?>

          <?php if ($item->button) : ?>
            <a
              href="<?php echo $item->button->url; ?>"
              target="<?php echo $item->button->target === '_blank' ? '_blank' : '_self'; ?>"
              class="text-lg text-black border-2 border-white hover:text-white btn btn-secondary"
            >
              <?php echo $item->button->title; ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</section>

<?php endif; ?>