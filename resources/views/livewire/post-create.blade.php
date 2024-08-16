<div>

    <form wire:submit.prevent="store" class="flex flex-col gap-2 border p-4 shadow-lg bg-slate-100">
        <div class="flex flex-col gap-1">
            <label for="title">Title</label>
            <input type="text" id="title" wire:model="title" class="rounded-md">
        </div>
        <div class="flex flex-col gap-1">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" wire:model="image">
        </div>

        <div class="flex flex-col gap-1">
            <label for="category">Category</label>
            <select class="w-1/2 rounded-md" id="category_id" wire:model="category_id" name="category_id">
                <option value="" class="mb-3">Choose category</option>

                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="flex flex-col gap-1" wire:ingnore>
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body">
            <trix-editor input="body" class="bg-white rounded-md"></trix-editor>
        </div>
        <div class="ml-auto mt-3">
            <button type="submit" class="py-1 px-3 bg-blue-300 rounded-md hover:bg-blue-800 hover:text-white">Create</button>

        </div>


    </form>

</div>

@script
<script>
    let trixEditor = document.getElementById("body")
    addEventListener("trix-blur", function(event) {
        @this.set('body', trixEditor.getAttribute('value'))
    })
</script>
@endscript