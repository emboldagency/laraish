<?php
/**
 * Title: Accordion
 * Name: accordion
 * Description: Accordion Block
 * Icon: admin-generic
 * Keywords: accordion
 * Enqueue Script: public/js/blocks/accordion.js
 */

 // store values for all acf fields for this block in an array
$fields = get_fields();
// assign variables
$accordion = $fields['accordion'];
?>

<?php if ($accordion) : ?>

<section>
  <div class="container py-8 md:py-12">
    <?php foreach ($accordion as $single) : ?>
      <div class="relative p-5 accordion-wrapper content-hidden">
        <div class="relative flex pr-12 accordion-title">
          <h2 class="mb-4 text-brown-300"><?php echo $single->title; ?></h2>
          <button type="button" class="toggleAccordion">
            <span class="vertical"></span>
            <span class="horizontal"></span>
          </button>
        </div>
        <div class="overflow-hidden text-xl accordion-content-wrapper" style="height: 0px">
          <div class="accordion-content"><?php echo $single->content; ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php endif; ?>