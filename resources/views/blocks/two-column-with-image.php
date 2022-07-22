<?php
/**
 * Title: Two Column w/ Image
 * Name: two-column-with-image
 * Description: A custom two column block that displays text in one column and an image in the other.
 * Icon: align-pull-left
 * Keywords: two column image
 */

// store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables
$background_color = $fields['background_color'];
$content = $fields['content'];
$image = $fields['image'];

// set up image, including image classes
if ($image->image) {
  $image = $fields['image'];
  $image_position = $image->position;
  $image_size = $image->size ?? 'half';
  $image_obj = $image->image ?? 'half';

  switch($image_size) {
    case 'half':
      $image_width = 'w-full md:w-1/2';
      $copy_width = 'w-full md:w-1/2';
      break;
    case 'third':
      $image_width = 'w-full md:w-1/3';
      $copy_width = 'w-full md:w-2/3';
      break;
    case 'fourth':
      $image_width = 'w-full md:w-1/4';
      $copy_width = 'w-full md:w-3/4';
      break;
    default:
      $image_width = 'w-full md:w-1/2';
      $copy_width = 'w-full md:w-1/2';
      break;
  }

  if ($image_position === 1) {
    $image_margins = 'mb-8 md:mb-0';
  } else {
    $image_margins = 'mt-8 md:mt-0';
  }

  $image_class = "$image_width $image_margins";
} else {
  $copy_width = "w-full";
}
?>

<section class="<?php echo $background_color; ?>">
  <div class="container flex flex-wrap py-8 md:py-12">
    <?php if ($image_obj) : ?>
      <div class="p-5 flex justify-center items-center order-<?php echo $image_position; ?> <?php echo trim($image_class); ?>">
        <?php $sizes = $image_obj->sizes; ?>
        <img
          srcset="<?php echo $sizes->medium; ?> <?php echo $sizes->medium_width; ?>w,
                    <?php echo $sizes->medium_large; ?> <?php echo $sizes->medium_large_width; ?>w,
                    <?php echo $sizes->large; ?> <?php echo $sizes->large_width; ?>w"
          sizes="(max-width: <?php echo $sizes->medium_width; ?>px) <?php echo $sizes->medium_width; ?>px,
                (max-width: <?php echo $sizes->medium_large_width; ?>px) <?php echo $sizes->medium_large_width; ?>px,
                <?php echo $sizes->large_width; ?>px"
          src="<?php echo $image_obj->url; ?>"
          alt="<?php echo $image_obj->alt; ?>"
          width="<?php echo $image_obj->width; ?>"
          height="<?php echo $image_obj->height; ?>"
          class="w-full h-auto"
        />
      </div>
    <?php endif; ?>

    <?php if ($content) : ?>
      <div class="order-2 p-5 <?php echo $copy_width; ?>">
        <?php foreach ($content as $single) : ?>
          <?php if ($single->acf_fc_layout === 'title') : ?>
            <?php
              $heading_level = $single->heading_level ?? 'h2';
              $center_align = $single->center_align ?? false;
              $large_title = $single->large_title ?? false;

              $classes = '';

              if ($center_align) $classes .= 'text-center ';

              if ($large_title) {
                $classes .= 'text-4xl md:text-6xl ';
              }

              $classes = trim($classes);
            ?>
            <<?php echo $heading_level; ?> class="mb-4 leading-normal uppercase <?php echo $classes; ?>">
              <?php echo $single->title; ?>
            </<?php echo $heading_level; ?>>
          <?php endif; ?>

          <?php if ($single->acf_fc_layout === 'copy') : ?>
            <div class="mb-2 text-xl md:text-2xl">
              <?php echo $single->copy; ?>
            </div>
          <?php endif; ?>

          <?php if ($single->acf_fc_layout === 'button') : ?>
            <?php
              $center_align = $single->center_align ?? false;
            ?>
            <a
              href="<?php echo $single->button->url; ?>"
              target="<?php echo $single->button->target === '_blank' ? '_blank' : '_self'; ?>"
              class="mb-6 text-lg text-black border-2 border-white hover:text-white btn btn-secondary <?php if ($center_align) : ?>mx-auto<?php endif; ?>"
            >
              <?php echo $single->button->title; ?>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>