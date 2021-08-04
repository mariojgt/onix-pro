// Example how you can load you blocks
export default (editor, config) => {
    const bm = editor.BlockManager;
    //const toAdd = name => config.blocks.indexOf(name) >= 0;

    bm.add("landing-page-v2").set({
        label: "landing-page-v2",
        category: "Tailwind",
        attributes: { class: "fa fa-cubes" },
        content: `
        <section class="bg-black ">
            <div class="container px-5 py-12 mx-auto lg:px-20">
                <div class="flex flex-col flex-wrap pb-6 mb-12 text-white ">
                    <h1 class="mb-12 text-3xl font-medium text-white">
                        Pricing Cards
                    </h1>
                    <p class="text-base leading-relaxed">
                        Wide + Double.</p>
                </div>
                <div
                    class="flex flex-wrap items-end justify-start w-full transition duration-500 ease-in-out transform bg-black border-2 border-gray-600 rounded-lg hover:border-white ">
                    <div class="w-full xl:w-1/4 md:w-1/4">
                        <div class="relative flex flex-col h-full p-8 ">
                            <h2 class="mb-4 font-semibold tracking-widest text-white uppercase title-font">
                                Sponsorships
                            </h2>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                        </div>
                    </div>
                    <div class="w-full xl:w-1/4 md:w-1/4">
                        <div class="relative flex flex-col h-full p-8 ">
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-gray-400">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-gray-400 rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-gray-400">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-gray-400 rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </span>Feature.
                            </p>
                        </div>
                    </div>
                    <div class="w-full xl:w-1/4 md:w-1/4">
                        <div class="relative flex flex-col h-full p-8 ">
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-gray-400">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-gray-400 rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-gray-400">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-gray-400 rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-gray-400">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-gray-400 rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </span>Feature.
                            </p>
                        </div>
                    </div>
                    <div class="w-full xl:w-1/4 md:w-1/4 lg:ml-auto">
                        <div class="relative flex flex-col h-full p-8">
                            <h1 class="flex items-end mx-auto text-3xl font-black leading-none text-white ">
                                <span>$10 </span>
                            </h1>
                            <button
                                class="w-full px-4 py-2 mx-auto mt-3 text-white transition duration-500 ease-in-out transform border border-gray-900 rounded-lg text-md hover:bg-gray-900 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 focus:border-gray-700 focus:bg-gray-800 ">Buy
                                Now
                            </button>
                            <p class="mx-auto mt-6 text-xs text-white">Only once within 6 months</p>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-wrap items-end justify-start w-full mt-10 transition duration-500 ease-in-out transform bg-black border-2 border-gray-600 rounded-lg hover:border-white ">
                    <div class="w-full xl:w-1/4 md:w-1/4">
                        <div class="relative flex flex-col h-full p-8 ">
                            <h2 class="mb-4 font-semibold tracking-widest text-white uppercase title-font">
                                Sponsorships
                            </h2>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                        </div>
                    </div>
                    <div class="w-full xl:w-1/4 md:w-1/4">
                        <div class="relative flex flex-col h-full p-8 ">
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                        </div>
                    </div>
                    <div class="w-full xl:w-1/4 md:w-1/4">
                        <div class="relative flex flex-col h-full p-8 ">
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                            <p class="flex items-center mb-2 text-lg font-normal tracking-wide text-white">
                                <span
                                    class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 mr-2 text-white rounded-full bg-blue-1300">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2.5" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M20 6L9 17l-5-5"></path>
                                    </svg>
                                </span>Feature.
                            </p>
                        </div>
                    </div>
                    <div class="w-full xl:w-1/4 md:w-1/4 lg:ml-auto">
                        <div class="relative flex flex-col h-full p-8">
                            <h1 class="flex items-end mx-auto text-3xl font-black leading-none text-white ">
                                <span>$50 </span>
                            </h1>
                            <button
                                class="w-full px-4 py-2 mx-auto mt-3 text-blue-100 transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md items-centerw-full text-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">Buy
                                Now
                            </button>
                            <p class="mx-auto mt-6 text-xs text-white">Only once within 6 months</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    `,
    });

    bm.add("blog-page").set({
        label: "blog-page",
        category: "Tailwind",
        attributes: { class: "fa fa-cubes" },
        content: `
        <div class="max-w-screen-lg mx-auto">
        <!-- header -->
        <header class="flex items-center justify-between py-2">
        <a href="#" class="px-2 lg:px-0 font-bold capitalize">
            Tech Blog
        </a>
        <button class="block md:hidden px-2 text-3xl">
            <i class='bx bx-menu'></i>
        </button>
        <ul class="hidden md:inline-flex items-center">
            <li class="px-2 md:px-4">
            <a href="" class="text-green-800 font-semibold hover:text-green-600"> Home </a>
            </li>
            <li class="px-2 md:px-4">
            <a href="" class="text-gray-500 font-semibold hover:text-green-600"> About </a>
            </li>
            <li class="px-2 md:px-4">
            <a href="" class="text-gray-500 font-semibold hover:text-green-600"> Press </a>
            </li>
            <li class="px-2 md:px-4">
            <a href="" class="text-gray-500 font-semibold hover:text-green-600"> Contact </a>
            </li>
            <li class="px-2 md:px-4 hidden md:block">
            <a href="" class="text-gray-500 font-semibold hover:text-green-600"> Login </a>
            </li>
            <li class="px-2 md:px-4 hidden md:block">
            <a href="" class="text-gray-500 font-semibold hover:text-green-600"> Register </a>
            </li>
        </ul>

        </header>
        <!-- header ends here -->

        <main class="mt-12">
        <!-- featured section -->
        <div class="flex flex-wrap md:flex-no-wrap space-x-0 md:space-x-6 mb-16">
            <!-- main post -->
            <div class="mb-4 lg:mb-0  p-4 lg:p-0 w-full md:w-4/7 relative rounded block">
            <img src="https://images.unsplash.com/photo-1427751840561-9852520f8ce8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="rounded-md object-cover w-full h-64">
            <span class="text-green-700 text-sm hidden md:block mt-4"> Technology </span>
            <h1 class="text-gray-800 text-4xl font-bold mt-2 mb-2 leading-tight">
                Ignorant branched humanity led now marianne too.
            </h1>
            <p class="text-gray-600 mb-4">
                Necessary ye contented newspaper zealously breakfast he prevailed. Melancholy middletons yet understood
                decisively boy law she. Answer him easily are its barton little. Oh no though mother be things simple
                itself.
                Oh be me, sure wise sons, no. Piqued ye of am spirit regret. Stimulated discretion impossible admiration in particular conviction up.
            </p>
            <a href="./blog.html" class="inline-block px-6 py-3 mt-2 rounded-md bg-green-700 text-gray-100">
                Read more
            </a>
            </div>

            <!-- sub-main posts -->
            <div class="w-full md:w-4/7">
            <!-- post 1 -->
            <div class="rounded w-full flex flex-col md:flex-row mb-10">
                <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="block md:hidden lg:block rounded-md h-64 md:h-32 m-4 md:m-0" />
                <div class="bg-white rounded px-4">
                <span class="text-green-700 text-sm hidden md:block"> Gadgets </span>
                <div class="md:mt-0 text-gray-800 font-semibold text-xl mb-2">
                    At every tiled on ye defer do. No attention suspected oh difficult.
                </div>
                <p class="block md:hidden p-2 pl-0 pt-1 text-sm text-gray-600">
                    Wonder matter now can estate esteem assure fat roused. Am performed on existence as discourse is. Pleasure friendly at marriage blessing or
                </p>
                </div>
            </div>

            <!-- post 2 -->
            <div class="rounded w-full flex flex-col md:flex-row mb-10">
                <img src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="block md:hidden lg:block rounded-md h-64 md:h-32 m-4 md:m-0" />
                <div class="bg-white rounded px-4">
                <span class="text-green-700 text-sm hidden md:block"> Bitcoin </span>
                <div class="md:mt-0 text-gray-800 font-semibold text-xl mb-2">
                    Fond his say old meet cold find come whom. The sir park sake bred.
                </div>
                <p class="block md:hidden p-2 pl-0 pt-1 text-sm text-gray-600">
                    Integer commodo, sapien ut vulputate viverra, Integer commodo
                    Integer commodo, sapien ut vulputate viverra, Integer commodo
                </p>
                </div>
            </div>
            <!-- post 3 -->
            <div class="rounded w-full flex flex-col md:flex-row mb-10">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="block md:hidden lg:block rounded-md h-64 md:h-32 m-4 md:m-0" />
                <div class="bg-white rounded px-4">
                <span class="text-green-700 text-sm hidden md:block"> Insights </span>
                <div class="md:mt-0 text-gray-800 font-semibold text-xl mb-2">
                    Advice me cousin an spring of needed. Tell use paid law ever yet new.
                </div>
                <p class="block md:hidden p-2 pl-0 pt-1 text-sm text-gray-600">
                    Meant to learn of vexed if style allow he there. Tiled man stand tears ten joy there terms any widen.
                </p>
                </div>
            </div>
            <!-- post 4 -->
            <div class="rounded w-full flex flex-col md:flex-row mb-10">
                <img src="https://images.unsplash.com/photo-1489844097929-c8d5b91c456e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="block md:hidden lg:block rounded-md h-64 md:h-32 m-4 md:m-0" />
                <div class="bg-white rounded px-4">
                <span class="text-green-700 text-sm hidden md:block"> Cryptocurrency </span>
                <div class="md:mt-0 text-gray-800 font-semibold text-xl mb-2">
                    Advice me cousin an spring of needed. Tell use paid law ever yet new.
                </div>
                <p class="block md:hidden p-2 pl-0 pt-1 text-sm text-gray-600">
                    Meant to learn of vexed if style allow he there. Tiled man stand tears ten joy there terms any widen.
                </p>
                </div>
            </div>

            </div>

        </div>
        <!-- end featured section -->


        <!-- recent posts -->
        <div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
            <h2 class="font-bold text-3xl">Latest news</h2>
            <a class="bg-gray-200 hover:bg-green-200 text-gray-800 px-3 py-1 rounded cursor-pointer">
            View all
            </a>
        </div>
        <div class="block space-x-0 lg:flex lg:space-x-6">

            <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
            <img src="https://images.unsplash.com/photo-1526666923127-b2970f64b422?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="rounded" alt="technology" />
            <div class="p-4 pl-0">
                <h2 class="font-bold text-2xl text-gray-800">Put all speaking her delicate recurred possible.</h2>
                <p class="text-gray-700 mt-2">
                Set indulgence inquietude discretion insensible bed why announcing. Middleton fat two satisfied additions.
                So continued he or commanded household smallness delivered. Door poor on do walk in half. Roof his head the what.
                </p>

                <a href="#" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
            </div>
            </div>

            <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
            <img src="https://images.unsplash.com/photo-1504384764586-bb4cdc1707b0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="rounded" alt="technology" />
            <div class="p-4 pl-0">
                <h2 class="font-bold text-2xl text-gray-800">Is at purse tried jokes china ready decay an. </h2>
                <p class="text-gray-700 mt-2">
                Small its shy way had woody downs power. To denoting admitted speaking learning my exercise so in.
                Procured shutters mr it feelings. To or three offer house begin taken am at.
                </p>

                <a href="#" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
            </div>
            </div>

            <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
            <img src="https://images.unsplash.com/photo-1483058712412-4245e9b90334?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80" class="rounded" alt="technology" />
            <div class="p-4 pl-0">
                <h2 class="font-bold text-2xl text-gray-800">As dissuade cheerful overcame so of friendly he indulged unpacked.</h2>
                <p class="text-gray-700 mt-2">
                Alteration connection to so as collecting me.
                Difficult in delivered extensive at direction allowance.
                Alteration put use diminution can considered sentiments interested discretion.
                </p>

                <a href="#" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
            </div>
            </div>

        </div>
        <!-- end recent posts -->

        <!-- subscribe -->
        <div class="rounded flex md:shadow mt-12">
            <img src="https://images.unsplash.com/photo-1579275542618-a1dfed5f54ba?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="w-0 md:w-1/4 object-cover rounded-l" />
            <div class="px-4 py-2">
            <h3 class="text-3xl text-gray-800 font-bold">Subscribe to newsletter</h3>
            <p class="text-xl text-gray-700">We sent latest news and posts once in every week, fresh from the oven</p>
            <form class="mt-4 mb-10">
                <input type="email" class="rounded bg-gray-100 px-4 py-2 border focus:border-green-400" placeholder="john@tech.com"/>
                <button class="px-4 py-2 rounded bg-green-800 text-gray-100">
                Subscribe
                <i class='bx bx-right-arrow-alt' ></i>
                </button>
                <p class="text-green-900 opacity-50 text-sm mt-1">No spam. We promise</p>
            </form>
            </div>
        </div>
        <!-- ens subscribe section -->



        <!-- popular posts -->
        <div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
            <h2 class="font-bold text-3xl">Popular news</h2>
            <a class="bg-gray-200 hover:bg-green-200 text-gray-800 px-3 py-1 rounded cursor-pointer">
            View all
            </a>
        </div>
        <div class="block space-x-0 lg:flex lg:space-x-6">

            <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
            <img src="https://images.unsplash.com/photo-1526666923127-b2970f64b422?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="rounded" alt="technology" />
            <div class="p-4 pl-0">
                <h2 class="font-bold text-2xl text-gray-800">Put all speaking her delicate recurred possible.</h2>
                <p class="text-gray-700 mt-2">
                Set indulgence inquietude discretion insensible bed why announcing. Middleton fat two satisfied additions.
                So continued he or commanded household smallness delivered. Door poor on do walk in half. Roof his head the what.
                </p>

                <a href="#" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
            </div>
            </div>

            <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
            <img src="https://images.unsplash.com/photo-1504384764586-bb4cdc1707b0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="rounded" alt="technology" />
            <div class="p-4 pl-0">
                <h2 class="font-bold text-2xl text-gray-800">Is at purse tried jokes china ready decay an. </h2>
                <p class="text-gray-700 mt-2">
                Small its shy way had woody downs power. To denoting admitted speaking learning my exercise so in.
                Procured shutters mr it feelings. To or three offer house begin taken am at.
                </p>

                <a href="#" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
            </div>
            </div>

            <div class="rounded w-full lg:w-1/2 lg:w-1/3 p-4 lg:p-0">
            <img src="https://images.unsplash.com/photo-1483058712412-4245e9b90334?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80" class="rounded" alt="technology" />
            <div class="p-4 pl-0">
                <h2 class="font-bold text-2xl text-gray-800">As dissuade cheerful overcame so of friendly he indulged unpacked.</h2>
                <p class="text-gray-700 mt-2">
                Alteration connection to so as collecting me.
                Difficult in delivered extensive at direction allowance.
                Alteration put use diminution can considered sentiments interested discretion.
                </p>

                <a href="#" class="inline-block py-2 rounded text-green-900 mt-2 ml-auto"> Read more </a>
            </div>
            </div>

        </div>
        <!-- end popular posts -->

        </main>
        <!-- main ends here -->

        <!-- footer -->
        <footer class="border-t mt-12 pt-12 pb-32 px-4 lg:px-0">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-2/5">
            <p class="text-gray-600 hidden lg:block p-0 lg:pr-12">
                Boisterous he on understood attachment as entreaties ye devonshire.
                In mile an form snug were been sell.
                Extremely ham any his departure for contained curiosity defective.
                Way now instrument had eat diminution melancholy expression sentiments stimulated.
            </p>
            </div>

            <div class="w-full mt-6 lg:mt-0 md:w-1/2 lg:w-1/5">
            <h6 class="font-semibold text-gray-700 mb-4">Company</h6>
            <ul>
                <li> <a href="" class="block text-gray-600 py-2">Team</a> </li>
                <li> <a href="" class="block text-gray-600 py-2">About us</a> </li>
                <li> <a href="" class="block text-gray-600 py-2">Press</a> </li>
            </ul>
            </div>

            <div class="w-full mt-6 lg:mt-0 md:w-1/2 lg:w-1/5">
            <h6 class="font-semibold text-gray-700 mb-4">Content</h6>
            <ul>
                <li> <a href="" class="block text-gray-600 py-2">Blog</a> </li>
                <li> <a href="" class="block text-gray-600 py-2">Privacy Policy</a> </li>
                <li> <a href="" class="block text-gray-600 py-2">Terms & Conditions</a> </li>
                <li> <a href="" class="block text-gray-600 py-2">Documentation</a> </li>
            </ul>
            </div>

            <div class="w-full mt-6 lg:mt-0 md:w-1/2 lg:w-1/5">
            <h6 class="font-semibold text-gray-700 mb-4">Company</h6>
            <ul>
                <li> <a href="" class="block text-gray-600 py-2">Team</a> </li>
                <li> <a href="" class="block text-gray-600 py-2">About us</a> </li>
                <li> <a href="" class="block text-gray-600 py-2">Press</a> </li>
            </ul>
            </div>

        </div>
        </footer>
    </div>
    `,
    });

    bm.add("footer").set({
        label: "footer",
        category: "Tailwind",
        attributes: { class: "fa fa-cubes" },
        content: `
        <footer class="bg-gray-800 pt-10 sm:mt-10 pt-10">
            <div class="max-w-6xl m-auto text-gray-800 flex flex-wrap justify-left">
                <!-- Col-1 -->
                <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
                    <!-- Col Title -->
                    <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                        Getting Started
                    </div>

                    <!-- Links -->
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Installation
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Release Notes
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Upgrade Guide
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Using with Preprocessors
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Optimizing for Production
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Browser Support
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        IntelliSense
                    </a>
                </div>

                <!-- Col-2 -->
                <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
                    <!-- Col Title -->
                    <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                        Core Concepts
                    </div>

                    <!-- Links -->
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Utility-First
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Responsive Design
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Hover, Focus, & Other States
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Dark Mode
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Adding Base Styles
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Extracting Components
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Adding New Utilities
                    </a>
                </div>

                <!-- Col-3 -->
                <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
                    <!-- Col Title -->
                    <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                        Customization
                    </div>

                    <!-- Links -->
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Configuration
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Theme Configuration
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Breakpoints
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Customizing Colors
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Customizing Spacing
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Configuring Variants
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Plugins
                    </a>
                </div>

                <!-- Col-3 -->
                <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
                    <!-- Col Title -->
                    <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                        Community
                    </div>

                    <!-- Links -->
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        GitHub
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Discord
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Twitter
                    </a>
                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        YouTube
                    </a>
                </div>
            </div>

            <!-- Copyright Bar -->
            <div class="pt-2">
                <div class="flex pb-5 px-3 m-auto pt-5
                    border-t border-gray-500 text-gray-400 text-sm
                    flex-col md:flex-row max-w-6xl">
                    <div class="mt-2">
                        © Copyright 1998-year. All Rights Reserved.
                    </div>

                    <!-- Required Unicons (if you want) -->
                    <div class="md:flex-auto md:flex-row-reverse mt-2 flex-row flex">
                        <a href="#" class="w-6 mx-1">
                            <i class="uil uil-facebook-f"></i>
                        </a>
                        <a href="#" class="w-6 mx-1">
                            <i class="uil uil-twitter-alt"></i>
                        </a>
                        <a href="#" class="w-6 mx-1">
                            <i class="uil uil-youtube"></i>
                        </a>
                        <a href="#" class="w-6 mx-1">
                            <i class="uil uil-linkedin"></i>
                        </a>
                        <a href="#" class="w-6 mx-1">
                            <i class="uil uil-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    `,
    });

    bm.add("navbar").set({
        label: "navbar",
        category: "Tailwind",
        attributes: { class: "fa fa-cubes" },
        content: `
        <nav class="flex justify-between w-full bg-purple-500 text-white p-4">
            <a href="/"><span class="font-semibold text-xl tracking-tight">Title</span></a>
            <div class="md:items-center md:w-auto flex">
                <div class="md:flex hidden">
                <a class="block md:text-white mr-4" href="/link">Link 1</a>
                <a class="block md:text-white mr-4" href="/link">Link 2</a>
                <a class="block md:text-white mr-4" href="/link">Link 3</a>
                <a class="block md:text-white mr-4" href="/link">Link 4</a>
                </div>
                <div class="flex text-sm" v-else>
                    <a class="p-2 ml-2 bg-white text-teal-500 font-semibold leading-none border border-gray-100 rounded hover:border-transparent hover:bg-gray-100" href="/auth/signin">Login</a>
                <a class="p-2 ml-2 bg-teal-500 text-gray-100 font-semibold leading-none border border-teal-600 rounded hover:border-transparent hover:bg-teal-600" href="/auth/signup">Sign up</a>
                </div>
            </div>
        </nav>
        </header>
        <main class="flex justify-center items-center">
        <h1 class="text-3xl text-center">Welcome</h1>
        </main>
        <div class="bottomNav fixed bottom-0 w-full">
        <nav style="border:1px solid blue" class="md:hidden bottom-0 w-full bg-gray-700 text-xs">
            <ul class="flex justify-around items-center text-white text-center opacity-75 text-lg font-bold">
            <li class="p-4 hover:bg-gray-500">
                <a href="/link">
                <span>Link 1</span>
                <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                    <path d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z" fill-rule="evenodd" />
                </svg>
                </a>
            </li>
            <li class="p-4 hover:bg-gray-500">
                <a href="/link">
                <span>Link 2</span>
                <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                    <path d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z" fill-rule="evenodd" />
                </svg>
                </a>
            </li>
            <li class="p-4 hover:bg-gray-500">
                <a href="/link">
                <span>Link 3</span>
                <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                    <path d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z" fill-rule="evenodd" />
                </svg>
                </a>
            </li>
            <li class="p-4 hover:bg-gray-500">
                <a href="/link">
                <span>Link 4</span>
                <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                    <path d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z" fill-rule="evenodd" />
                </svg>
                </a>
            </li>
            </ul>
        </nav>
    `,
    });
};
