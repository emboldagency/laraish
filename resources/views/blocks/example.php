<?php
/**
 * Title: Example Block
 * Name: example-block
 * Description: An example block.
 * Icon: admin-generic
 * Keywords: example
 *
 */

 // store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables

?>

<div>
    <p>
      <?php _e('This is an example block.', 'onallcylinders'); ?>
    </p>
</div>