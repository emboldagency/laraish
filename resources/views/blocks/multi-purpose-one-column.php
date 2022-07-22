<?php
/**
 * Title: Multi Purpose One Column
 * Name: multi-purpose-one-column
 * Description: A custom multi-purpose one column block that displays text and has the option of adding an image and/or video(s).
 * Icon: html
 * Keywords: multi purpose image text video one column
 */

// store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables
$background_color = $fields['background_color'];
$content = $fields['content'];
?>

<?php if ($content) : ?>

<section class="<?php echo $background_color; ?>">
  <div class="container py-8 md:py-12">
    <div class="flex flex-col w-full p-5">
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

        <?php if ($single->acf_fc_layout === 'image') : ?>
          <?php
            $image = $single->image;
            $sizes = $image->sizes;

            if (!$image || !$sizes) continue;
          ?>

          <figure class="mb-6">
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
          </figure>
        <?php endif; ?>

        <?php if ($single->acf_fc_layout === 'video') : ?>
          <?php
            $vimeo_ids = $single->vimeo_ids;
            $display_full_width = $single->display_full_width;
            $i = 1;

            if ($display_full_width) {
              $video_width = 'w-full';'';
            } else {
              $video_width = 'w-full md:w-1/2';
            }
          ?>

          <div class="flex flex-wrap justify-center mb-6">
            <?php foreach ($vimeo_ids as $id) : ?>
              <?php
                if (count($vimeo_ids) > 1) {
                  $i+=1;
                  if ($i % 2 == 0) {
                    $px = 'md:pl-0 md:pr-4';
                  } else {
                    $px = 'md:pl-4 md:pr-0';
                  }
                }
              ?>
              <div class="w-full py-4 <?php echo $px; ?> <?php echo $video_width; ?>">
                <div class="w-full relative h-0 pt-[calc(56.25%)] box-border">
                  <iframe
                    src="https://player.vimeo.com/video/<?php echo $id->vimeo_id; ?>"
                    width="640"
                    height="360"
                    frameborder="0"
                    allow="autoplay; fullscreen"
                    allowfullscreen
                    class="absolute inset-0 w-full h-full"
                  >
                  </iframe>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if ($single->acf_fc_layout === 'before_and_after_images') : ?>
          <?php get_template_part('resources/views/partials/before-and-after-images', null, [
            'images' => $single->before_and_after_images,
          ]); ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php endif; ?>