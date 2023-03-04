<aside class="flex flex-col justify-start border-r border-base-200 bg-base-100 text-base-content w-80">
    <div
        class="sticky inset-x-0 top-0 z-50 hidden w-full py-1 transition duration-200 ease-in-out border-b lg:block border-base-200 bg-base-100">
        <div class="mx-auto space-x-1 navbar max-w-none">
            <div class="flex items-center flex-none">
                <a href="#" aria-label="Homepage"
                    class="px-2 flex-0 btn btn-ghost md:px-4 nuxt-link-active">
                    <div class="inline-block text-3xl font-title text-primary"><span
                            class="lowercase">Onix</span><span class="uppercase text-base-content">V3</span></div>
                </a>
            </div>
        </div>
    </div>
    <div>
        <ul class="menu flex flex-col p-4 pt-2">
            <li class="mt-4 menu-title"><span>
                    New
                </span>
            </li>
            <li>
                <a href="{{ route('onix.pages.index') }}" class="capitalize">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('onix.block.index') }}" class="capitalize">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-6 h-6 mr-2 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20">
                        </path>
                    </svg>
                    Blocks
                </a>
            </li>
        </ul>
    </div>
</aside>
