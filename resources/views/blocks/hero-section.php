<?php
/**
 * Title: Hero Section
 * Name: hero-section
 * Description: A custom hero image slider block.
 * Icon: slides
 * Keywords: hero slider
 * Enqueue Script: public/js/blocks/slider.js
 */

// store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables
$first_block = $fields['first_block'];
$hero_slider = $fields['hero_slider'];
?>

<?php if ($hero_slider) : ?>

<section id="<?php $block['id']; ?>" class="hero-slider swiper">
  <!--
    If the hero section is the first section on the page and there is more than one slide,
    we want to add an invisible H1 above the slider, and make all the slide titles H2. This is for accessibility.
  -->
  <?php if ($first_block && count($hero_slider) > 1) : ?>
    <h1 class="sr-only"><?php the_title(); ?></h1>
  <?php endif; ?>

  <div class="swiper-wrapper">
    <?php foreach ($hero_slider as $slide) : ?>
      <?php
        $title = $slide->title;
        $copy = $slide->copy;
        $bg_image = $slide->background_image;
        $button = $slide->button;
        $alt_button = $slide->alt_button;
        $has_overlay = $slide->has_overlay;
      ?>
      <div
        class="box-border relative flex items-center justify-center bg-center bg-cover md:p-20 swiper-slide"
        style="background-image: url(<?php echo $bg_image->url; ?>);"
      >
        <div class="pt-[35%]"></div>
        <div class="flex flex-col items-center justify-center max-w-5xl p-10 m-auto text-white md:p-20 <?php if ($has_overlay) : ?> bg-black/[60%] md:border-2 md:border-white <?php endif; ?>">
          <h2 class="mb-6 text-4xl leading-snug text-center uppercase md:text-6xl"><?php echo $title; ?></h2>
          <div class="mb-12 text-xl text-center md:text-2xl">
            <?php echo $copy; ?>
          </div>
          <?php if ($button || $alt_button) : ?>
            <div class="flex flex-col items-center justify-center w-full md:flex-row">
              <?php if ($button) : ?>
                <div class="w-full p-4 md:w-1/2">
                  <a
                    href="<?php echo $button->url; ?>"
                    target="<?php echo $button->target === '_blank' ? '_blank' : '_self'; ?>"
                    class="w-full text-lg text-center text-black border-2 border-white hover:text-white btn btn-secondary"
                  >
                    <?php echo $button->title; ?>
                  </a>
                </div>
              <?php endif; ?>
              <?php if ($alt_button) : ?>
                <div class="w-full p-4 md:w-1/2">
                  <a
                    href="<?php echo $alt_button->url; ?>"
                    target="<?php echo $alt_button->target === '_blank' ? '_blank' : '_self'; ?>"
                    class="w-full text-lg text-center text-black border-2 border-white hover:text-white btn btn-secondary"
                  >
                    <?php echo $alt_button->title; ?>
                  </a>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="p-4 !text-gray-500 !h-16 !w-16 bg-white rounded-r-sm swiper-button-prev"></div>
  <div class="p-4 !text-gray-500 !h-16 !w-16 bg-white rounded-r-sm swiper-button-next"></div>
</section>

<?php endif; ?>