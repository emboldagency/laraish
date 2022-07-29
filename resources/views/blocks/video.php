<?php
/**
 * Title: Video
 * Name: video
 * Description: A custom block that displays a video(s).
 * Icon: format-video
 * Keywords: video
 */

// store values for all acf fields for this block in an array
$fields = get_fields();

// assign variables
$videos = $fields['videos'];
$display_full_width = $fields['display_full_width'];
$i = 1;

if ($display_full_width) {
  $video_width = 'w-full';'';
} else {
  $video_width = 'w-full md:w-1/2';
}

if (count($videos) > 1) {
  $i+=1;
  if ($i % 2 == 0) {
    $px = 'md:pl-0 md:pr-4';
  } else {
    $px = 'md:pl-4 md:pr-0';
  }
}
?>

<?php if ($videos) : ?>

<section class="container">
  <div class="flex flex-wrap justify-center px-5">
    <?php foreach ($videos as $video) : ?>
      <?php
        if ($video->source === 'youtube') {
          $video_src = "https://www.youtube.com/embed/$video->youtube_id?playsinline=1&enablejsapi=1&autoplay=0&widgetid=1&rel=0";
        } else {
          $video_src = "https://player.vimeo.com/video/$video->vimeo_id";
        }

      ?>
      <div class="w-full py-4 <?php echo $px; ?> <?php echo $video_width; ?>">
        <div class="w-full relative h-0 pt-[calc(56.25%)] box-border">
          <iframe
            src="<?php echo $video_src; ?>"
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
</section>

<?php endif; ?>