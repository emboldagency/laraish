@props(['posts'])

<div class="grid grid-cols-2 gap-2 mb-8 md:gap-7 main-content">
  @while (have_posts())
    @php
        the_post();
    @endphp
    <x-post-list.post/>
  @endwhile
  <x-post-list.pagination :posts="$posts" />
</div>