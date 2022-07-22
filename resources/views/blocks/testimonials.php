<?php
/**
 * Title: Testimonials
 * Name: testimonials
 * Description: A custom block that displays testimonials.
 * Icon: testimonial
 * Keywords: testimonials
 * Enqueue Script: public/js/blocks/slider.js
 */

// store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables
$testimonials = $fields['testimonials'];
?>

<?php if ($testimonials) : ?>

<section id="<?php $block['id']; ?>" class="testimonials-slider swiper md:!p-20">
  <h2 class="mb-4 text-4xl text-center uppercase md:text-6xl">Testimonials</h2>
  <div class="swiper-wrapper">
      <?php foreach ($testimonials as $testimonial) : ?>
        <?php
          $testimonial = $testimonial->testimonial;
          $post_link = get_the_permalink($testimonial->ID);
          $excerpt = strip_shortcodes($testimonial->post_content);
          $excerpt = strip_tags($excerpt);
          $better_excerpt = substr($excerpt, 0, 200);
          $better_excerpt = "{$better_excerpt}";

          if (strlen($excerpt) > 200) {
            $better_excerpt .= "... <a class='text-brown-500' href='{$post_link}'>Read More</a>";
          }
        ?>

        <div
          class="box-border relative flex items-center justify-center md:px-4 md:pt-4 swiper-slide"
        >
          <div class="flex flex-col items-center justify-center max-w-5xl m-auto">
            <div class="text-xl text-center md:text-2xl">
              <?php echo $better_excerpt; ?>
              <p class="mt-6 mb-0 leading-snug text-center uppercase"><?php echo $testimonial->post_title; ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
  </div>

  <div class="p-4 !text-brown-500 !h-16 !w-16 rounded-r-sm swiper-button-prev"></div>
  <div class="p-4 !text-brown-500 !h-16 !w-16 rounded-r-sm swiper-button-next"></div>
</section>

<?php endif; ?>