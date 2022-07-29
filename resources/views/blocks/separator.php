<?php
/**
 * Title: Separator
 * Name: separator
 * Description: A custom block that displays a simple separator.
 * Icon: editor-insertmore
 * Keywords: separator
 */

// store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables
$size = $fields['size'];
$custom_top_margin = $fields['custom_top_margin'];
$custom_bottom_margin = $fields['custom_bottom_margin'];
$custom_margin = '';

// make sure these classes are added to the safelist
switch ($size) {
  case 'small':
    $margin = 'my-4';
    break;
  case 'medium':
    $margin = 'my-8';
    break;
  case 'large':
    $margin = 'my-12';
    break;
  case 'xl':
    $margin = 'my-16';
    break;
  case 'custom':
    $custom_margin = "margin-top: {$custom_top_margin}px; margin-bottom: {$custom_bottom_margin}px";
    break;
  default:
    $margin = '';
    break;
}

// create id attribute allowing for custom "anchor" value.
$id = 'separator-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
?>

<div id="<?php echo $id; ?>" class="<?php echo $margin; ?> separator w-full" style="<?php echo $custom_padding; ?>">
  <?php if (is_admin()) : ?>
    <p>Separator - background color only visible in admin.</p>
  <?php endif; ?>
</div>

<?php if (is_admin()) : ?>
<style>
  #<?php echo $id; ?> {
    box-sizing: border-box;
    background: #d4d4d4;
    padding: 0 10px;
  }
</style>
<?php endif; ?>