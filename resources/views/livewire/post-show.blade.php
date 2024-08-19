<div>
    <div class="flex flex-col gap-3">
        <div class="text-2xl font-semibold">
            {{$post->title}}

        </div>

        <img src="{{ asset('storage/' . $post->image) }}" class="w-[600px]" alt="...">
        <div class="">

            <span><strong>{{$post->category->name}}, </strong></span>
            <span>{{$post->created_at}}</span>

        </div>


        {!! $post->body !!}

        <div class="mt-5">

            <livewire:comment :post="$post">

        </div>
    </div>

</div>