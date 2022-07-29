<article class="relative pb-24 shadow-lg md:pb-32 post">
  <div class="thumbnail-container">
    <a href="{{ get_the_permalink() }}" class="post-image-link relative">
      {!! get_the_post_thumbnail() !!}
    </a>
  </div>
  <div class="px-2 md:px-8">
      <a href="{{ get_the_permalink() }}">
        <h2 class="mt-4 mb-2 text-sm font-bold leading-tight lg:text-lg lg:leading-snug">{!! get_the_title() !!}</h2>
      </a>
      <div class="hidden md:text-ellipses--3">{!! get_the_excerpt() !!}</div>
      <div class="absolute bottom-0 w-full h-16 pb-2 md:h-24 md:pb-8 md:text-center">
          <a href="{{ get_the_permalink() }}" class="font-bold text-red-500 md:btn md:btn-red md:text-white">Read More</a>
      </div>
  </div>
</article>