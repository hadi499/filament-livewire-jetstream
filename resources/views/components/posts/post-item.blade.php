@props(['post'])
<article class="[&:not(:last-child)]:border-b border-gray-100 pb-10">
  <div class="grid items-start grid-cols-12 gap-3 mt-5 article-body">
    <h2 class="text-xl font-bold text-gray-900">
      <a wire:navigate href="#">
        {{ $post->title }}
      </a>
    </h2>
  </div>
</article>