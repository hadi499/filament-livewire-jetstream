<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Detail Post
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex flex-col gap-3">
        <div class="text-2xl font-semibold">
          {{$post->title}}

        </div>

        <img src="{{ asset('storage/' . $post->image) }}" class="w-[600px]" alt="...">
        <div class="">

          <span><strong>{{$post->category->name}}, </strong></span>
          <span>{{$post->created_at}}</span>

        </div>

        <div class="text-lg">
          {!! $post->body !!}
        </div>
      </div>

    </div>
  </div>
</x-app-layout>