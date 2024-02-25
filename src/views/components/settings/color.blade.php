@props([
    'fieldName'    => 'color-primary',
    'label'        => 'Primary Color',
    'colorOptions' => [
        '#0d3b66',
        '#ee964b',
        '#f7b731'
    ],
    'value' => '#ffffff'
])

<div class="pt--10 pr-0 pb-10 pl-0">
    <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
        <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
            <div class="flex items-center flex-1 min-w-0">
                <span
                    class="block p-1 border-2 border-gray-500 rounded-full transition ease-in duration-300">
                    <a href="#blue" id="{{ $fieldName }}" class="block w-6 h-6 rounded-full" style="background-color: {{ $value }}" ></a>
                </span>
                <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
                    <p class="text-lg font-bold truncate">{{ $label }}</p>
                </div>
                <input type="hidden" name="{{ $fieldName }}" value="{{ $value }}" />
            </div>
            <div
                class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:mt-0">
                <ul class="flex flex-row justify-center items-center">
                    @foreach ($colorOptions as $item)
                        <li class="mr-4 last:mr-0" onclick="colorChange('{{ $item }}', '{{ $fieldName }}')" >
                            <span
                                class="block p-1 border-2 border-gray-500 rounded-full transition ease-in duration-300">
                                <a href="#blue" class="block w-6 h-6 rounded-full" style="background-color: {{ $item }}" ></a>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@once
    @push('js')
        <script>
            function colorChange(color, id) {
                document.getElementById(id).style.backgroundColor = color;
                document.getElementsByName(id)[0].value = color;
            }
        </script>
    @endpush
@endonce
