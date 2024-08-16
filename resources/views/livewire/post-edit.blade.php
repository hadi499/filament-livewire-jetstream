<div>
    <form wire:submit.prevent="update" class="border p-4 flex flex-col gap-3 bg-slate-50 w-[750px]">
        <div class="flex flex-col gap-2">
            <label for="title">Title</label>
            <input type="text" id="title" wire:model="title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="slug">Slug</label>
            <input type="text" id="slug" wire:model="slug" class="border-gray-200 text-gray-400" readonly disabled>
            @error('slug') <span>{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col gap-2">

            @if ($oldImage)
            <img src="{{ asset('storage/' .$oldImage) }}" alt="Current Image"
                width="200">
            @endif
            <label for="image">Image</label>
            <input type="file" id="image" wire:model="image">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="category">Category</label>
            <select id="category_id" wire:model="category_id" name="category_id">
                <option value="">Choose category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span>{{ $message }}</span> @enderror
        </div>


        <div wire:ingnore>
            <label for="body">Body</label>

            <input id="body" type="hidden" name="body" value="{{$this->body}}">
            <trix-editor input="body"></trix-editor>
            @error('body') <span>{{ $message }}</span> @enderror

        </div>
        <div class="ml-auto mt-3">
            <button type="submit" class="py-1 px-3 bg-blue-300 rounded-md hover:bg-blue-800 hover:text-white">Edit</button>

        </div>

    </form>
</div>

@script
<script>
    let trixEditor = document.getElementById("body")

    addEventListener("trix-blur", function(event) {
        @this.
        set('body', trixEditor.getAttribute('value'))
    })
</script>
@endscript