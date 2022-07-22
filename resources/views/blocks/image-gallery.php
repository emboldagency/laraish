<?php
/**
 * Title: Image Gallery
 * Name: image-gallery
 * Description: A custom block that displays an image gallery.
 * Icon: format-gallery
 * Keywords: image gallery
 * Enqueue Script: public/js/blocks/image-gallery.js
 */

// store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables
$gallery = $fields['gallery'];
?>

<section class="container py-10 text-xl masonry" id="lightgallery">
  <?php foreach ($gallery as $image) : ?>

    <a href="<?php echo $image->url; ?>" class="flex items-center justify-center w-full p-5 masonry-item gallery-item" data-gallery="gallery">
      <?php $sizes = $image->sizes; ?>
      <img
        srcset="<?php echo $sizes->medium; ?> <?php echo $sizes->medium_width; ?>w,
                  <?php echo $sizes->medium_large; ?> <?php echo $sizes->medium_large_width; ?>w,
                  <?php echo $sizes->large; ?> <?php echo $sizes->large_width; ?>w"
        sizes="(max-width: <?php echo $sizes->medium_width; ?>px) <?php echo $sizes->medium_width; ?>px,
              (max-width: <?php echo $sizes->medium_large_width; ?>px) <?php echo $sizes->medium_large_width; ?>px,
              <?php echo $sizes->large_width; ?>px"
        src="<?php echo $image->sizes->large; ?>"
        alt="<?php echo $image->alt; ?>"
        width="<?php echo $image->width; ?>"
        height="<?php echo $image->height; ?>"
        class="w-full h-auto"
      />
    </a>
  <?php endforeach; ?>
</section>