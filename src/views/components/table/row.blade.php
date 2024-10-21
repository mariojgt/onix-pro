@props([
    'item',
    'mode' => 'page', // block, page
    'templates'
])

<div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
    <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
        <div class="flex items-center flex-1 min-w-0">
            @if ($item->media)
                <div class="flex-shrink-0 object-cover rounded-full btn- w-10 h-10 text-primary"> {!! $item->media !!}
                </div>
            @else
                <img src="https://i.pinimg.com/originals/96/02/08/9602083f42463bb813399310d72233c5.png"
                    class="flex-shrink-0 object-cover rounded-full btn- w-10 h-10">
            @endif
            <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
                <p class="text-lg font-bold truncate">{{ $item->title }}</p>
                <p class="text-md">{{ $item->slug }}</p>
            </div>
        </div>
        <div
            class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:justify-end
      sm:mt-0">
      @if ($item->deployed == 1)
            <div class="badge badge-info gap-2">
                Deployed
            </div>
        @else
            <div class="badge badge-error gap-2">
                Not Deployed
            </div>
        @endif
            @if ($item->status == 1)
                <div class="badge badge-success gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-4 h-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                    Active
                </div>
            @else
                <div class="badge badge-error gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-4 h-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                    Inactive
                </div>
            @endif
            @if ($mode == 'page')
                <a class="btn btn-square" target="_blank" href="{{ route('onix.page', $item->slug) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>
                <a class="btn btn-square" href="{{ route('onix.pages.editor', $item->slug) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                    </svg>
                </a>
                <x-onix::modal.addEditPageModal :modalId="'edit-' . $item->id" :title="$item->title" :slug="$item->slug" :status="$item->status"
                    :action="route('onix.pages.edit', $item->id)" :templates="$templates" :edit="true" />
                <x-onix::modal.modalDelete :modalId="'delete-' . $item->id" :action="route('onix.pages.delete', $item->id)" />
            @elseif ($mode == 'block')
                <a class="btn btn-square" href="{{ route('onix.block.editor', $item->slug) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                    </svg>
                </a>
                <x-onix::modal.addEditBlockModal :modalId="'edit-' . $item->id" :action="route('onix.block.edit', $item->id)" :componentId="$item->componentId"
                    :label="$item->label" :slug="$item->slug" :media="$item->media" :status="$item->status" :category="$item->category"
                    :sync="$item->component_sync" :edit="true" :templates="$templates" />
                <x-onix::modal.modalDelete :modalId="'delete-' . $item->id" :action="route('onix.block.delete', $item->id)" />
            @endif
        </div>
    </div>
</div>
