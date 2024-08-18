<div>

    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

        @foreach ($this->posts as $post)
        <div class="bg-white overflow-hidden border shadow-md rounded-lg p-4">

            <a wire:navigate href="{{ route('show', $post->slug) }}">
                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-48 object-cover rounded-md mb-4" alt="{{ $post->title }}">

            </a>
            <h2 class="text-xl font-semibold ">{{ $post->title }}</h2>
            <p class="hover:text-blue-300 text-sm"># {{$post->category->name}}</p>
            <p>{!! $post->getExcerpt() !!}</p>
        </div>
        @endforeach
    </div>

</div>

</div>