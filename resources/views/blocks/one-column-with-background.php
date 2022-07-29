<?php
/**
 * Title: One Column w/ Background
 * Name: one-column-with-background
 * Description: A custom two column block that displays one column of content on top of a background image.
 * Icon: info
 * Keywords: one column background
 */

// store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables
$title = $fields['title'];
$copy = $fields['copy'];
$bg_image = $fields['background_image'] ?? '';
?>

<section
  class="relative flex items-center justify-center md:px-20"
  style="background-image: url(<?php echo $bg_image ? $bg_image->url : ''; ?>); background-size: 100% 100%;"
>
  <div class="pt-[35%]"></div>
  <div class="max-w-5xl flex flex-col items-center justify-center m-auto p-10 md:p-20 bg-gray-500/[90%] text-white">
    <h2 class="mb-6 text-4xl leading-snug text-center uppercase md:text-6xl"><?php echo $title; ?></h2>
    <div class="text-xl">
      <?php echo $copy; ?>
    </div>
  </div>
</section>