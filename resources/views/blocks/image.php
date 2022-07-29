<?php
/**
 * Title: Full Width Image
 * Name: full-width-image
 * Description: A custom block that displays a full width image.
 * Icon: format-image
 * Keywords: full width image
 */

// store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables
$lightbox = $fields['lightbox'];
$image = $fields['image'];
$sizes = $image->sizes;
?>

<figure class="mb-6">
  <!-- conditionally render an anchor tag if lightbox is true -->
  <?php if ($lightbox == 'true') : ?>
    <a href="<?php echo $image->url; ?>" class="w-full h-auto gallery-item" data-gallery="gallery">
  <?php endif; ?>

  <img
    srcset="<?php echo $sizes->medium;?> <?php echo $sizes->medium_width; ?>w,
              <?php echo $sizes->medium_large;?> <?php echo $sizes->medium_large_width; ?>w,
              <?php echo $sizes->large;?> <?php echo $sizes->large_width; ?>w,
              <?php echo $sizes->{'1536x1536'};?> <?php echo $sizes->{'1536x1536_width'}; ?>w,
              <?php echo $sizes->{'2048x2048'};?> <?php echo $sizes->{'2048x2048_width'}; ?>w,
              <?php echo $image->url;?> <?php echo $image->width; ?>w"
    sizes="(max-width: <?php echo $sizes->medium_width; ?>px) <?php echo $sizes->medium_width; ?>px,
          (max-width: <?php echo $sizes->medium_large_width; ?>px) <?php echo $sizes->medium_large_width; ?>px,
          (max-width: <?php echo $sizes->large_width; ?>px) <?php echo $sizes->large_width; ?>px,
          (max-width: <?php echo $sizes->{'1536x1536_width'}; ?>px) <?php echo $sizes->{'1536x1536_width'}; ?>px,
          (max-width: <?php echo $sizes->{'2048x2048_width'}; ?>px) <?php echo $sizes->{'2048x2048_width'}; ?>px,
          <?php echo $image->width; ?>px"
    src="<?php echo $image->url; ?>"
    alt="<?php echo $image->alt; ?>"
    width="<?php echo $image->width; ?>"
    height="<?php echo $image->height; ?>"
    class="w-full h-auto"
  />

  <?php if ($lightbox) : ?>
    </a>
  <?php endif; ?>
</figure>