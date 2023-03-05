import type grapesjs from "grapesjs";
import { RequiredPluginOptions } from ".";

/*
|--------------------------------------------------------------------------
| Block Component
|--------------------------------------------------------------------------
| Think about this resaublock components that you can create with plain HTML
| or use the components.ts to create modals and other components examples
*/

export default (editor: grapesjs.Editor, opts: RequiredPluginOptions) => {

    /*
    |--------------------------------------------------------------------------
    | COMPONENTS STARTED
    |--------------------------------------------------------------------------
    */
    // Add the input component to the block manager
    editor.BlockManager.add('input', {
        label: 'Input',
        media: '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2zm-1 16H6V6h12v13z"/><path d="M8 9h8v2H8zM8 13h8v2H8z"/></svg>',
        category: 'onix-basics',
        content: {
            type: 'input',
        }
    });

    // Add the form component to the block manager
    editor.BlockManager.add('form', {
        label: 'Form',
        media: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>`,
        category: 'onix-basics',
        content: {
            type: 'form',
            // content is a form with tailwind classes
            components: `
            <div class="flex flex-col gap-4 w-full items-center">
                <div class="form-control w-full">
                    <label class="label">
                    <span class="label-text">What is your name?</span>
                    <span class="label-text-alt">Top Right label</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered input-lg w-full">
                    <label class="label">
                    <span class="label-text-alt">Bottom Left label</span>
                    <span class="label-text-alt">Bottom Right label</span>
                    </label>
                </div>
            </div>
            `,
        },
    });
    /*
    |--------------------------------------------------------------------------
    | COMPONENTS ENDED
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | BLOCK WITH PLAIN HTML (example)
    |--------------------------------------------------------------------------
    */
    // editor.BlockManager.add("list-example", {
    //     label: "List Example",
    //     media: `<svg viewBox="0 0 24 24">
    //         <path fill="currentColor" d="M21,6V8H3V6H21M3,18H12V16H3V18M3,13H21V11H3V13Z" />
    //     </svg>`,
    //     content: `<div class="flex items-center justify-center h-screen bg-yellow-200">
    //     <!-- component -->
    //     <div class="bg-white pt-12 pr-0 pb-12 pl-0 mt-0 mr-auto mb-0 ml-auto sm:py-16 lg:py-20">
    //     <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto max-w-7xl sm:px-6 lg:px-8">
    //         <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto max-w-4xl sm:px-6 lg:px-8">
    //         <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto sm:flex sm:items-center sm:justify-between">
    //             <div>
    //             <p class="text-xl font-bold text-gray-900">Open Positions</p>
    //             <p class="text-sm mt-1 mr-0 mb-0 ml-0 font-semi-bold text-gray-500">Lorem ipsum dolor sit amet, consectetur
    //                 adipis</p>
    //             </div>
    //             <div class="mt-4 mr-0 mb-0 ml-0 sm:mt-0">
    //             <p class="sr-only">Search Position</p>
    //             <div class="relative">
    //                 <div class="flex items-center pt-0 pr-0 pb-0 pl-3 absolute inset-y-0 left-0 pointer-events-none">
    //                 <p>
    //                     <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
    //                         stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21
    //                         21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
    //                 </p>
    //                 </div>
    //                 <input placeholder="Search Positions " type="search" class="border block pt-2 pr-0 pb-2 pl-10 w-full py-2
    //                     pl-10 border border-gray-300 rounded-lg focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm"/>
    //             </div>
    //             </div>
    //         </div>
    //         <div class="shadow-xl mt-8 mr-0 mb-0 ml-0 pt-4 pr-10 pb-4 pl-10 flow-root rounded-lg sm:py-2">
    //             <div class="pt--10 pr-0 pb-10 pl-0">
    //             <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
    //                 <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
    //                 <div class="flex items-center flex-1 min-w-0">
    //                     <img
    //                         src="https://d34u8crftukxnk.cloudfront.net/slackpress/prod/sites/6/SlackLogo_CompanyNews_SecondaryAubergine_Hero.jpg?d=500x500&amp;f=fill" class="flex-shrink-0 object-cover rounded-full btn- w-10 h-10"/>
    //                     <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
    //                     <p class="text-lg font-bold text-gray-800 truncate">Engineering Manager</p>
    //                     <p class="text-gray-600 text-md">Slack</p>
    //                     </div>
    //                 </div>
    //                 <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:mt-0">
    //                     <a href="" class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
    //                         duration-200 hover:bg-gray-700 rounded-lg">Apply</a>
    //                 </div>
    //                 </div>
    //             </div>
    //             <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
    //                 <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
    //                 <div class="flex items-center flex-1 min-w-0">
    //                     <img src="https://www.growthmarketingpro.com/wp-content/uploads/2019/10/basecamp-logo.png"
    //                         class="flex-shrink-0 object-cover rounded-full btn- w-10 h-10"/>
    //                     <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
    //                     <p class="text-lg font-bold text-gray-800 truncate">Senior Software Engineer</p>
    //                     <p class="text-gray-600 text-md">Basecamp</p>
    //                     </div>
    //                 </div>
    //                 <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:justify-end
    //                     sm:mt-0">
    //                     <a href="" class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
    //                         duration-200 hover:bg-gray-700 rounded-lg">Apply</a>
    //                 </div>
    //                 </div>
    //             </div>
    //             <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
    //                 <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
    //                 <div class="flex items-center flex-1 min-w-0">
    //                     <img src="https://djmag.com/sites/default/files/article/image/Spotify.png" class="flex-shrink-0
    //                         object-cover rounded-full btn- w-10 h-10"/>
    //                     <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
    //                     <p class="text-lg font-bold text-gray-800 truncate">Frontend Developer</p>
    //                     <p class="text-gray-600 text-md">Spotify</p>
    //                     </div>
    //                 </div>
    //                 <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:justify-end
    //                     sm:mt-0">
    //                     <a href="" class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
    //                         duration-200 hover:bg-gray-700 rounded-lg">Apply</a>
    //                 </div>
    //                 </div>
    //             </div>
    //             <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
    //                 <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
    //                 <div class="flex items-center flex-1 min-w-0">
    //                     <img src="https://miro.medium.com/max/512/1*n81Kr3UGUVsF0LLRgRQrJw.jpeg" class="flex-shrink-0
    //                         object-cover rounded-full btn- w-10 h-10"/>
    //                     <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
    //                     <p class="text-lg font-bold text-gray-800 truncate">Lead Software Engineer</p>
    //                     <p class="text-gray-600 text-md">Figma</p>
    //                     </div>
    //                 </div>
    //                 <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:justify-end
    //                     sm:mt-0">
    //                     <a href="" class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
    //                         duration-200 hover:bg-gray-700 rounded-lg">Apply</a>
    //                 </div>
    //                 </div>
    //             </div>
    //             <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
    //                 <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
    //                 <div class="flex items-center flex-1 min-w-0">
    //                     <img src="https://i.pinimg.com/originals/96/02/08/9602083f42463bb813399310d72233c5.png"
    //                         class="flex-shrink-0 object-cover rounded-full btn- w-10 h-10"/>
    //                     <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
    //                     <p class="text-lg font-bold text-gray-800 truncate">Software Engineeer</p>
    //                     <p class="text-gray-600 text-md">Pinterest</p>
    //                     </div>
    //                 </div>
    //                 <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:justify-end
    //                     sm:mt-0">
    //                     <a href="" class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
    //                         duration-200 hover:bg-gray-700 rounded-lg">Apply</a>
    //                 </div>
    //                 </div>
    //             </div>
    //             </div>
    //         </div>
    //         </div>
    //     </div>
    //     </div>`,
    // });
};
