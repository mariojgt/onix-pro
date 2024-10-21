@props([
    'modalId' => 'create-page',
    'title',
    'slug',
    'status',
    'action' => 'onix.pages.create',
    'edit'   => false,
    'status' => true,
    'templates'
])

<!-- The button to open modal -->
<label for="{{ $modalId }}" class="btn">
    @if ($edit)
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
        </svg>
    @else
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    @endif
</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="{{ $modalId }}" class="modal-toggle" />
<div class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        @if ($edit)
            <h3 class="font-bold text-lg">Edit new page</h3>
        @else
            <h3 class="font-bold text-lg">Create new page</h3>
        @endif
        <form action="{{ $action }}" method="POST">
            @csrf
            <div class="flex flex-col gap-4 w-full items-center pt-4">
                <input type="text" placeholder="Page Name" name="title" value="{{ $title ?? null }}" required
                    class="input input-bordered input-primary w-full" />
                <input type="text" placeholder="Page Slug" name="slug" value="{{ $slug ?? null }}" required
                    class="input input-bordered input-primary w-full" />
                <div class="form-control w-full">
                    <label class="label">Select you template</label>
                    <select class="select select-bordered w-full" name="template_id">
                        @foreach ($templates as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control w-full">
                    <label class="label cursor-pointer">
                        <span class="label-text">Is active?</span>
                        <input type="checkbox" class="toggle toggle-primary" name="status" {{ $status == 1 ? "checked" : null }} />
                    </label>
                </div>
            </div>
            <div class="modal-action">
                <label for="{{ $modalId }}" class="btn btn-error">Close</label>
                <button class="btn btn-success">Confirm</button>
            </div>
        </form>
    </div>
</div>
