 <?php
/**
 * Title: Simple Info Banner
 * Name: simple-info-banner
 * Description: A custom block that displays a simple info banner.
 * Icon: info
 * Keywords: info banner
 */

// store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables
$info = $fields['info'];
?>

<section class="bg-primary-500">
  <div class="container flex flex-wrap items-center justify-center py-8">
    <?php foreach ($info as $single) : ?>
      <div class="flex items-center justify-center w-full p-4 text-center text-white md:w-1/3">
        <img
          src="<?php echo $single->image->url ?>"
          alt="<?php echo $single->image->alt ?>"
          width="<?php echo $single->image->width ?>"
          height="<?php echo $single->image->height ?>"
          class="h-auto mr-4 max-w-12"
        />
        <h2 class="text-4xl"><?php echo $single->title ?></h2>
      </div>
    <?php endforeach; ?>
  </div>
</section>