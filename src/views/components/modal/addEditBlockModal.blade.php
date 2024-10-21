@props([
    'modalId' => 'create-page',
    'componentId',
    'label',
    'slug',
    'media',
    'status' => true,
    'category',
    'sync' => false,
    'action' => 'onix.pages.create',
    'edit' => false,
    'templates'
])

<!-- The button to open modal -->
<label for="{{ $modalId }}" class="btn btn-primary">
    @if ($edit)
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
        </svg>
        Edit Block
    @else
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Create Block
    @endif
</label>

<!-- Modal -->
<input type="checkbox" id="{{ $modalId }}" class="modal-toggle" />
<div class="modal">
    <div class="modal-box w-11/12 max-w-4xl p-8">
        <h3 class="text-2xl font-semibold mb-4">
            @if ($edit)
                Edit Block
            @else
                Create New Block
            @endif
        </h3>

        <form action="{{ $action }}" method="POST" class="space-y-6">
            @csrf
            <!-- Block ID -->
            <div class="form-control">
                <label for="componentId" class="label font-semibold">Block ID (for editor)</label>
                <input type="text" id="componentId" name="componentId" value="{{ $componentId ?? null }}" required
                    class="input input-bordered w-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300" placeholder="Enter block ID" />
            </div>

            <!-- Block Label -->
            <div class="form-control">
                <label for="label" class="label font-semibold">Block Label</label>
                <input type="text" id="label" name="label" value="{{ $label ?? null }}" required
                    class="input input-bordered w-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300" placeholder="Enter block label" />
            </div>

            <!-- Block Slug -->
            <div class="form-control">
                <label for="slug" class="label font-semibold">Block Slug</label>
                <input type="text" id="slug" name="slug" value="{{ $slug ?? null }}" required
                    class="input input-bordered w-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300" placeholder="Enter block slug" />
            </div>

            <!-- Block Icon (SVG) -->
            <div class="form-control">
                <label for="media" class="label font-semibold">Block Display Icon (SVG recommended)</label>
                <textarea id="media" name="media" required
                    class="textarea textarea-bordered w-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300" placeholder="Enter block icon (SVG)">{{ $media ?? null }}</textarea>
            </div>

            <!-- Block Category -->
            <div class="form-control">
                <label for="category" class="label font-semibold">Block Category</label>
                <input type="text" id="category" name="category" value="{{ $category ?? null }}" required
                    class="input input-bordered w-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300" placeholder="Enter block category" />
            </div>

            <!-- Component Replication -->
            <div class="form-control">
                <label class="label cursor-pointer">
                    <span class="label-text font-semibold">Should component replicate?</span>
                    <input type="checkbox" class="toggle toggle-primary" name="component_sync" {{ $sync ? "checked" : null }} />
                </label>
            </div>

            <!-- Template Selection -->
            <div class="form-control">
                <label for="template" class="label font-semibold">Select Template</label>
                <select id="template" class="select select-bordered w-full" name="template_id">
                    @foreach ($templates as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Is Active? -->
            <div class="form-control">
                <label class="label cursor-pointer">
                    <span class="label-text font-semibold">Is active?</span>
                    <input type="checkbox" class="toggle toggle-primary" name="status" {{ $status ? "checked" : null }} />
                </label>
            </div>

            <!-- Actions -->
            <div class="modal-action flex justify-between mt-8">
                <label for="{{ $modalId }}" class="btn btn-error">Close</label>
                <button class="btn btn-success">Confirm</button>
            </div>
        </form>
    </div>
</div>
