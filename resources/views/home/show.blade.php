<x-guest-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex flex-col gap-3 border p-4 shadow-md">
        <div class="text-2xl font-semibold">
          {{$post->title}}

        </div>

        <img src="{{ asset('storage/' . $post->image) }}" class="w-[600px]" alt="...">
        <div class="">


          <span>{{$post->created_at}}</span>

        </div>

        <div class="text-lg">
          {!! $post->body !!}
        </div>
      </div>

    </div>
  </div>
</x-guest-layout>