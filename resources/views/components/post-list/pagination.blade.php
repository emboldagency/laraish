@props(['posts'])

<div class="col-span-2 mx-auto my-4">
  {{ $posts->getPagination() }}
</div>