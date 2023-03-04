@props([
    'item',
    'mode' => 'page',  // block, page
])

<div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
    <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
        <div class="flex items-center flex-1 min-w-0">
            @if ($item->media)
                    <div class="flex-shrink-0 object-cover rounded-full btn- w-10 h-10 text-primary"> {!! $item->media !!} </div>
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
            @if ($mode == 'page')
                <a class="btn btn-square" href="{{ route('onix.pages.editor', $item->slug) }}" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                    </svg>
                </a>
                <x-onix::modal.addEditPageModal
                    :modalId="'edit-' . $item->id"
                    :title="$item->title"
                    :slug="$item->slug"
                    :action="route('onix.pages.edit', $item->id)"
                    :edit="true"
                />
                <x-onix::modal.modalDelete
                    :modalId="'delete-' . $item->id"
                    :action="route('onix.pages.delete', $item->id)"
                />
            @elseif ($mode == 'block')
                <a class="btn btn-square" href="{{ route('onix.block.editor', $item->slug) }}" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                    </svg>
                </a>
                <x-onix::modal.addEditBlockModal
                    :modalId="'edit-' . $item->id"
                    :action="route('onix.block.edit', $item->id)"
                    :componentId="$item->componentId"
                    :label="$item->label"
                    :slug="$item->slug"
                    :media="$item->media"
                    :category="$item->category"
                    :sync="$item->component_sync"
                    :edit="true"
                />
                <x-onix::modal.modalDelete
                    :modalId="'delete-' . $item->id"
                    :action="route('onix.block.delete', $item->id)"
                />
            @endif
        </div>
    </div>
</div>
