export default (editor, config) => {
  const bm = editor.BlockManager;
  const toAdd = name => config.blocks.indexOf(name) >= 0;

  toAdd('link-block') && bm.add('link-block', {
    category: 'Tailwind',
    label: 'Link Block',
    attributes: { class: 'fa fa-link' },
    content: {
      type:'link',
      editable: false,
      droppable: true,
      style:{
        display: 'inline-block',
        padding: '5px',
        'min-height': '50px',
        'min-width': '50px'
      }
    },
  });

  toAdd('quote') && bm.add('quote', {
    label: 'Landing-page',
    category: 'Tailwind',
    attributes: { class: 'fa fa-quote-right' },
    content: `
        <style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
    <div class="min-w-screen min-h-screen bg-blue-100 flex items-center p-5 lg:p-20 overflow-hidden relative">
        <div class="flex-1 min-h-full min-w-full rounded-3xl bg-white shadow-xl p-10 lg:p-20 text-gray-800 relative md:flex items-center text-center md:text-left">
            <div class="w-full md:w-1/2">
                <div class="mb-10 lg:mb-20">
                    <svg id='logoipsum' xmlns='http://www.w3.org/2000/svg' viewBox='15 30 147.778 40' class="w-48"><path d='M41.419,48.371A3.656,3.656,0,0,0,40.373,51.3l-.018-.018a4.344,4.344,0,0,1-4.694,4.694l.018.018A3.678,3.678,0,1,0,39,59.312l.019.018a4.344,4.344,0,0,1,4.694-4.694l-.019-.018a3.671,3.671,0,1,0-2.272-6.247Z' fill='#0582C1'/><path d='M34.042,53.636l-.019-.018A3.631,3.631,0,0,0,38,49.644l.019.018a4.344,4.344,0,0,1,4.694-4.694l-.019-.018a3.678,3.678,0,1,0-3.318-3.318l-.018-.019a4.343,4.343,0,0,1-4.694,4.694l.018.019A3.631,3.631,0,0,0,30.705,50.3l-.018-.018a4.345,4.345,0,0,1-4.694,4.694l.018.018a3.678,3.678,0,1,0,3.318,3.318l.019.018A4.344,4.344,0,0,1,34.042,53.636Z' fill='#0582C1'/><path d='M27.34,51.629A3.652,3.652,0,0,0,28.385,48.7l.019.018A4.344,4.344,0,0,1,33.1,44.024l-.019-.018a3.677,3.677,0,1,0-3.318-3.318l-.018-.018a4.344,4.344,0,0,1-4.694,4.694l.018.018a3.671,3.671,0,1,0,2.273,6.247Z' fill='#0582C1'/><path d='M58.317,41.655h2.97V56.108h-2.97Z' fill='#0582C1'/><path d='M62.969,51.159a5.247,5.247,0,1,1,5.247,5.226A5.188,5.188,0,0,1,62.969,51.159Zm7.524,0A2.278,2.278,0,1,0,68.216,53.5,2.221,2.221,0,0,0,70.493,51.159Z' fill='#0582C1'/><path d='M85.3,46.209v9.4c0,3.326-2.594,4.732-5.227,4.732a5.062,5.062,0,0,1-4.692-2.4l2.534-1.465a2.262,2.262,0,0,0,2.257,1.247,1.973,1.973,0,0,0,2.237-2.118V54.7a3.516,3.516,0,0,1-2.891,1.287,5.031,5.031,0,0,1,0-10.057,3.516,3.516,0,0,1,2.891,1.287v-1.01ZM82.41,50.96a2.4,2.4,0,1,0-2.395,2.3A2.24,2.24,0,0,0,82.41,50.96Z' fill='#0582C1'/><path d='M86.982,51.159a5.247,5.247,0,1,1,5.247,5.226A5.188,5.188,0,0,1,86.982,51.159Zm7.524,0A2.278,2.278,0,1,0,92.229,53.5,2.221,2.221,0,0,0,94.506,51.159Z' fill='#0582C1'/><path d='M98.861,43.556a1.782,1.782,0,1,1,1.782,1.782A1.8,1.8,0,0,1,98.861,43.556Zm.3,2.653h2.971v9.9H99.157Z' fill='#0582C1'/><path d='M114.956,51.159a4.971,4.971,0,0,1-4.732,5.226,3.715,3.715,0,0,1-2.949-1.208v4.891h-2.97V46.209h2.97v.93a3.717,3.717,0,0,1,2.949-1.207A4.97,4.97,0,0,1,114.956,51.159Zm-2.97,0a2.356,2.356,0,1,0-2.355,2.415A2.26,2.26,0,0,0,111.986,51.159Z' fill='#0582C1'/><path d='M124.121,53.138c0,2.277-1.979,3.247-4.117,3.247a4.335,4.335,0,0,1-4.257-2.356l2.573-1.465A1.627,1.627,0,0,0,120,53.732c.712,0,1.069-.218,1.069-.613,0-1.09-4.871-.515-4.871-3.94,0-2.159,1.822-3.247,3.881-3.247a4.329,4.329,0,0,1,3.86,2.118l-2.534,1.366a1.437,1.437,0,0,0-1.326-.871c-.515,0-.832.2-.832.554C119.251,50.228,124.121,49.475,124.121,53.138Z' fill='#0582C1'/><path d='M134.97,46.209v9.9H132v-.931a3.382,3.382,0,0,1-2.83,1.208c-2,0-3.7-1.425-3.7-4.1V46.209h2.97v5.642a1.632,1.632,0,0,0,1.722,1.8c1.089,0,1.841-.633,1.841-2.039v-5.4Z' fill='#0582C1'/><path d='M152,50.03v6.078h-2.97V50.287c0-.99-.475-1.623-1.425-1.623-.99,0-1.545.693-1.545,1.861v5.583h-2.969V50.287c0-.99-.475-1.623-1.426-1.623-.99,0-1.544.693-1.544,1.861v5.583h-2.97v-9.9h2.97v.91a3.039,3.039,0,0,1,2.653-1.187,2.945,2.945,0,0,1,2.593,1.306,3.262,3.262,0,0,1,2.871-1.306C150.511,45.932,152,47.555,152,50.03Z' fill='#0582C1'/><circle cx='154.512' cy='43.944' r='2.204' fill='#0582C1'/></svg>
                </div>
                <div class="mb-10 md:mb-20 text-gray-600 font-light">
                    <h1 class="font-black uppercase text-3xl lg:text-5xl text-yellow-500 mb-10">You seem to be lost!</h1>
                    <p>The page you're looking for isn't available.</p>
                    <p>Try searching again or use the Go Back button below.</p>
                </div>
                <div class="mb-20 md:mb-0">
                    <button class="text-lg font-light outline-none focus:outline-none transform transition-all hover:scale-110 text-yellow-500 hover:text-yellow-600"><i class="mdi mdi-arrow-left mr-2"></i>Go Back</button>
                </div>
            </div>
            <div class="w-full md:w-1/2 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 441.85 285.44" class="w-full max-w-lg lg:max-w-full mx-auto"><style>.st0{fill:#fff}.st1{fill:#b5dfea}.st2{opacity:.55;fill:#90cedd}.st3{fill:#d7f0f9}.st4{fill:#0582c1}.st5{fill:#79c9e8}.st6{fill:#ffbf4d}.st7{fill:#00668e}.st8{fill:#05556d}.st9{fill:#f98d3d}.st10{fill:#ed701b}.st11{fill:none}.st12{fill:#efaa3a}.st13{opacity:.29;fill:#f98d2b}.st14{fill:#49b4d6}.st15{fill:#ff9f50}.st16{fill:#f77e2d}.st17{opacity:.55;fill:url(#SVGID_1_)}</style><path class="st0" d="M0 0h500v500H0z" id="BACKGROUND"/><g id="OBJECTS"><path class="st1" d="M423.72 280.45c6.95 0 12.62-5.57 12.73-12.52.53-34.64 3.32-85.75-61.92-99.88-52.8-11.44-21.49-105.27-163.69-99.21-102.07 4.35-74.96 90.39-154.32 97.55-52.81 4.77-53.27 71.56-51.24 102.16.44 6.69 6 11.89 12.71 11.89h405.73z"/><path class="st2" d="M374.53 168.04c-52.8-11.44-21.49-105.27-163.69-99.21-24.28 1.03-41.24 6.7-54.07 14.81 4.32-.57 8.91-.97 13.8-1.17 142.19-6.06 110.89 87.77 163.69 99.21 64.55 13.98 62.51 64.15 61.94 98.76h27.52c6.95 0 12.62-5.57 12.73-12.52.53-34.64 3.32-85.74-61.92-99.88z"/><path class="st3" d="M311.43 64.84L144.49 45.35c-7.13-.83-13.59 4.28-14.43 11.41L117.6 163.52c-.83 7.13 4.28 13.59 11.41 14.43l166.95 19.49c7.13.83 13.59-4.28 14.43-11.41l12.46-106.75c.83-7.15-4.28-13.61-11.42-14.44z"/><path class="st4" d="M321.61 89.83l1.23-10.57c.83-7.13-4.28-13.59-11.41-14.43L144.49 45.35c-7.13-.83-13.59 4.28-14.43 11.41l-1.23 10.57 192.78 22.5z"/><path class="st5" d="M155.84 131.97L177 94.68a6.857 6.857 0 0 1 6.74-3.42c3.75.44 6.44 3.83 6 7.58l-4.4 37.72.19.02c2.6.3 4.46 2.66 4.16 5.25a4.74 4.74 0 0 1-5.25 4.16l-.19-.02-.8 6.87c-.33 2.81-2.87 4.82-5.67 4.49-2.81-.33-4.82-2.87-4.49-5.67l.8-6.87-15.24-1.78c-2.6-.3-4.47-2.66-4.16-5.26l.4-3.46c.09-.82.34-1.61.75-2.32zm19.4 2.79l2.73-23.39c.02-.16-.2-.23-.28-.09l-12.5 22.06c-.22.39.03.88.47.93l8.89 1.04c.34.04.65-.21.69-.55zM249.23 142.87l21.16-37.29a6.857 6.857 0 0 1 6.74-3.42c3.75.44 6.44 3.83 6 7.58l-4.4 37.72.19.02c2.6.3 4.46 2.66 4.16 5.25a4.74 4.74 0 0 1-5.25 4.16l-.19-.02-.8 6.87c-.33 2.81-2.87 4.82-5.67 4.49-2.81-.33-4.82-2.87-4.49-5.67l.8-6.87-15.24-1.78c-2.6-.3-4.47-2.66-4.16-5.26l.4-3.46c.09-.82.35-1.6.75-2.32zm19.41 2.79l2.73-23.39c.02-.16-.2-.23-.28-.09l-12.5 22.06c-.22.39.03.88.47.93l8.89 1.04c.34.04.65-.21.69-.55zM207.25 110.04c1.23-10.54 7.48-15.91 17.65-14.73 10.16 1.19 15.01 7.86 13.78 18.39l-4 34.25c-1.23 10.54-7.48 15.91-17.65 14.73-10.16-1.19-15.01-7.86-13.78-18.39l4-34.25zm6.27 36.11c-.55 4.7 1.31 6.73 4.61 7.12 3.29.38 5.57-1.16 6.12-5.87l4.15-35.57c.55-4.7-1.31-6.73-4.61-7.12-3.29-.38-5.57 1.16-6.12 5.87l-4.15 35.57z"/><path class="st0" d="M148.51 60.1a3.498 3.498 0 1 1-6.95-.81 3.498 3.498 0 0 1 3.88-3.07 3.51 3.51 0 0 1 3.07 3.88z"/><path class="st5" d="M165.25 62.06a3.498 3.498 0 1 1-6.95-.81 3.498 3.498 0 0 1 3.88-3.07 3.49 3.49 0 0 1 3.07 3.88z"/><path class="st6" d="M182.61 64.08a3.498 3.498 0 1 1-6.95-.81 3.498 3.498 0 0 1 3.88-3.07c1.92.23 3.3 1.97 3.07 3.88z"/><g><path class="st7" d="M115.45 185.68s-2.26 10-1.88 20.22c.34 9.15-.75 69.31-.75 69.31h7.35s10.46-47.12 10.85-50.84c.39-3.72 5.65-40.93 5.65-40.93l-21.22 2.24z"/><path class="st4" d="M120.34 182.94s1.69 12.85 4.57 21.99c2.88 9.13 17.01 70.29 17.01 70.29h7.35s-1.35-47.12-1.86-50.84c-.51-3.72-4.23-40.93-4.23-40.93l-22.84-.51z"/><path class="st4" d="M142.51 275.2v5.13h13.99c.79 0 1.11-1.03.44-1.47-2.05-1.36-5.32-3.24-8.37-3.66h-6.06zM113.2 275.2v5.13h13.99c.79 0 1.11-1.03.44-1.47-2.05-1.36-5.32-3.24-8.37-3.66h-6.06z"/><path class="st7" d="M138.43 123.15s4.81-7.31-.71-8.02c-4.24-.55-5.99.72-5.99.72s-4.88-.54-7.56 1.78c-1.83 1.59-8.55 13.9 2.32 18.35s8.55-6.95 8.55-6.95l3.39-5.88z"/><path class="st8" d="M137.72 115.13c-4.24-.55-5.99.72-5.99.72s-4.88-.54-7.56 1.78c-1.83 1.59-8.55 13.9 2.32 18.35 5.11 2.09 7.3.68 8.2-1.4-10.31 2.9-11.43-9.53-9.73-13.06 1.73-3.59 5.87-1.94 5.87-1.94 1.62-4.08 6.91-3.64 9.09-3.32-.39-.57-1.08-.99-2.2-1.13z"/><path class="st9" d="M131.66 126.71s-1.43-1.43-2.49 0c-1.07 1.43-.36 4.63 1.43 4.81 0 0-.53 4.63-4.1 4.45v3.74h8.37v-2.85s5.17-2.14 4.99-6.41c-.18-4.28-1.43-7.31-1.43-7.31s-2.85 3.21-6.77 3.57z"/><path class="st10" d="M132.95 138.06c.83.35.68.87.72 1.65h1.2v-2.85s-2.03.64-5-1.05c0 .01 1.73 1.69 3.08 2.25z"/><path class="st9" d="M134.66 119.89s-4.34-1.73-4.85-.43c-.33.85.51 1.58 1.67 2.32l-1.02.17c-.23.04-.31.33-.13.47.28.23 1.07.38 2.71.44l1.62-2.97z"/><path class="st11" d="M108.84 166.97l5.82 18.74-.11-.95.11.95 1.96-27.3z"/><path class="st6" d="M165.66 130.76c-8.28-6.13-30.88-11.04-30.88-11.04l-1.86 3.39s20.52 7.95 19.17 9.14c-.8.7-10.82 5.29-14.22 6.84-.73.33-1.52.49-2.33.48l-10.39-.06s-7.5-.89-13.39 5.88c-5.27 6.07-14.23 20.12-14.23 20.12l15.1 22.2 1.67 2.45.01-.03-.01.21s.54.06 1.49.15c4.85.45 20.41 1.68 28.64-.07l.23-.05-.39-36.42c13.14-10.4 19.42-18.44 21.66-20.96.56-.67.45-1.69-.27-2.23zM115 180.43l-1.47-3.22-4.69-10.25 7.78-8.72-1.4 19.13-.22 3.06z"/><path class="st12" d="M113.53 177.21l1.47 3.22-.71 9.71-.02.03-1.67-2.45z"/><path class="st13" d="M140.72 152.65c-1.4 1.02-1.04 10.02-1.39 15.65-.58 9.43-1.14 17.59-.73 22.85 2.13-.14 4.11-.37 5.79-.73l.23-.05-.39-36.42c13.14-10.4 19.42-18.44 21.66-20.96.59-.67.48-1.69-.24-2.23.01 0-10.38 11.33-24.93 21.89z"/><path class="st7" d="M147.4 224.38c-.37-2.68-2.41-22.8-3.51-33.8l-5.28.58s7.7 63.33 8.21 84.06h2.44c0-.01-1.35-47.12-1.86-50.84z"/><g><path class="st4" d="M113.54 127.75l-1.59-2.85c.8-1.5 1.25-3.22 1.25-5.04 0-5.95-4.83-10.78-10.78-10.78s-10.78 4.83-10.78 10.78c0 5.95 4.83 10.78 10.78 10.78 3 0 5.71-1.23 7.66-3.2l3.46.31z"/><path class="st0" d="M96.81 118.88h.42v1.5c0 .46.14.66.46.66.25 0 .43-.13.66-.41v-1.75h.41v2.46h-.34l-.04-.38h-.02c-.23.27-.47.45-.81.45-.52 0-.75-.33-.75-.96v-1.57zM100.52 121.55v.83h-.42v-3.5h.34l.03.28h.02c.22-.19.5-.34.78-.34.63 0 .97.49.97 1.25 0 .83-.5 1.33-1.06 1.33-.23 0-.46-.11-.68-.28l.02.43zm.6-.5c.4 0 .7-.37.7-.98 0-.54-.18-.91-.65-.91-.21 0-.42.12-.66.33v1.29c.23.2.45.27.61.27zM103.35 120.78c.21.17.43.29.72.29.32 0 .49-.17.49-.38 0-.25-.29-.36-.56-.47-.35-.13-.73-.29-.73-.71 0-.39.31-.7.84-.7.31 0 .58.13.76.28l-.2.26c-.17-.13-.34-.22-.56-.22-.31 0-.45.17-.45.35 0 .23.27.32.55.43.35.13.75.28.75.74 0 .4-.32.73-.9.73-.35 0-.68-.15-.92-.34l.21-.26zM106.26 120.76c.16 0 .3.13.3.32 0 .18-.14.31-.3.31-.17 0-.3-.13-.3-.31 0-.19.14-.32.3-.32zM108.03 120.76c.16 0 .3.13.3.32 0 .18-.14.31-.3.31-.17 0-.3-.13-.3-.31-.01-.19.13-.32.3-.32z"/></g></g><g><path class="st5" d="M72.21 257.39s-2.26-2.12-.74-10.14c1.52-8.02 5.38-15.73 3.48-24.43-1.89-8.71-16.73-30.65-16.77-32.11-.05-1.46-4.58 25.53 3.09 36.17 7.67 10.63 8.59 14.32 8.25 19.92-.34 5.59.08 10.1.92 11.4l1.77-.81z"/><path class="st14" d="M70.8 241.25c-.89 3.58-1.43 12.55-.01 14.7.13.2.32.09.56-.28-.43-1.48-.72-4.08.1-8.42 1.52-8.02 5.38-15.73 3.48-24.43-1.89-8.71-16.73-30.65-16.77-32.11 0 0 2.24 18.29 9.76 30.87 5.4 9 3.77 16.09 2.88 19.67z"/><path class="st5" d="M74.91 256.83s-4.36-10.88 3.03-20.3c7.39-9.42 19.2-21.52 19.43-26.31 0 0 3.04 22.75-6.58 29.19-9.61 6.44-16.35 7.47-14.69 17.38l-1.19.04z"/><path class="st14" d="M85.29 234.84c-10.72 7.8-11.59 16.79-9.93 20.96.13.32.37.52.7.63-1.44-9.56 5.25-10.65 14.74-17.01 9.61-6.44 6.58-29.19 6.58-29.19S96 227.04 85.29 234.84z"/><g><path class="st5" d="M67.74 257.07s1.4-5.76.65-11.98c-.74-6.22-7.24-9.72-13.31-16.29-3.12-3.38-4.05-21.25-2.11-22.91 0 0-10.72 12.99-9.06 22.5 1.65 9.51 19.14 15.69 20.76 20.29 1.62 4.6 1.48 8.45 1.48 8.45l1.59-.06z"/><path class="st14" d="M49.35 211c-3.54 9.59.09 21.21 11.86 28.43 8.66 5.31 5.9 16.36 5.9 16.36l1.42-4.36c.13-1.88.14-4.08-.13-6.34-.74-6.22-7.24-9.72-13.31-16.29-3.01-3.26-3.98-20-2.31-22.67-.49.62-1.88 2.42-3.43 4.87zM52.78 206.13l.19-.24c-.06.06-.13.14-.19.24z"/></g><g><path class="st5" d="M77.15 256.35s2.51-9.32 8.73-10.58c6.21-1.25 13.35-10.44 13.73-12.24 0 .01-1.05 17.33-22.46 22.82z"/><path class="st14" d="M85.52 248.86c-3.81 1.9-5.39 4.46-5.95 6.79 19.06-6.13 20.04-22.11 20.04-22.11-.08.36-.42 1.01-.97 1.82-1.87 3.28-6.39 10.14-13.12 13.5z"/></g><path class="st6" d="M90.6 252.92H58.1l3.86 24.27c.29 1.84 1.88 3.2 3.74 3.2h17.29c1.86 0 3.45-1.35 3.74-3.2l3.87-24.27z"/><path class="st15" d="M89.96 256.94l.64-4.02H58.1l.64 4.02z"/><path class="st15" d="M82.73 252.92l-3.86 24.27a3.792 3.792 0 0 1-3.74 3.2H83c1.86 0 3.45-1.35 3.74-3.2l3.86-24.27h-7.87z"/></g><g><path class="st6" d="M167.86 209.64h146.86v29.86H167.86z"/><path class="st13" d="M167.86 209.64h146.86v7.25H167.86z"/><path class="st16" d="M180.63 209.64h13.41l-3.6 7.25h-13.41zM210.83 209.64h13.41l-3.6 7.25h-13.4zM241.03 209.64h13.4l-3.59 7.25h-13.4zM271.23 209.64h13.4l-3.6 7.25h-13.39zM314.73 209.64v.2l-3.5 7.05h-13.39l3.59-7.25z"/><path class="st5" d="M186.14 239.5h10.35v40.83h-10.35z"/><path class="st14" d="M194.15 239.5h2.35v40.83h-2.35z"/><path class="st5" d="M286.9 239.5h10.35v40.83H286.9z"/><path class="st14" d="M294.19 239.5h3.06v40.83h-3.06zM186.14 239.47h10.35v5.14h-10.35z"/><path class="st14" d="M286.9 239.47h10.35v5.14H286.9z"/><path class="st5" d="M186.14 204.97h10.35v4.64h-10.35z"/><path class="st14" d="M194.15 204.97h2.35v4.64h-2.35z"/><path class="st5" d="M286.9 204.97h10.35v4.64H286.9z"/><path class="st14" d="M294.19 204.97h3.06v4.64h-3.06zM186.14 209.03h10.35v.58h-10.35z"/><path class="st14" d="M286.9 209.03h10.35v.58H286.9z"/><path class="st4" d="M194.04 209.64l-14.81 29.86h-11.37v-4.12l12.77-25.74zM210.83 209.64l-14.81 29.86h13.4l14.82-29.86zM254.43 209.64l-14.81 29.86h-13.4l14.81-29.86zM284.63 209.64l-14.81 29.86h-13.4l14.81-29.86zM301.43 209.64l-14.81 29.86h13.4l14.71-29.66z"/><path class="st7" d="M194.04 209.64l-3.6 7.25h-13.41l3.6-7.25zM224.24 209.64l-3.6 7.25h-13.4l3.59-7.25zM254.43 209.64l-3.59 7.25h-13.4l3.59-7.25zM284.63 209.64l-3.6 7.25h-13.39l3.59-7.25zM314.73 209.84l-3.5 7.05h-13.39l3.59-7.25z"/><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="242.075" y1="248.234" x2="242.075" y2="224.179"><stop offset="0" stop-color="#fff"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient><path class="st17" d="M171.96 222.56H312.2v14.94H171.96z"/><ellipse transform="rotate(-9.249 191.082 198.565)" class="st6" cx="191.05" cy="198.49" rx="9.23" ry="9.23"/><path class="st4" d="M195.23 198.49c0-2.31-1.87-4.18-4.18-4.18-2.31 0-4.18 1.87-4.18 4.18 0 2.31 1.87 4.18 4.18 4.18 2.31.01 4.18-1.87 4.18-4.18z"/><ellipse transform="rotate(-9.249 292.07 198.575)" class="st6" cx="292.01" cy="198.49" rx="9.23" ry="9.23"/><path class="st4" d="M296.19 198.49c0-2.31-1.87-4.18-4.18-4.18-2.31 0-4.18 1.87-4.18 4.18 0 2.31 1.87 4.18 4.18 4.18 2.31.01 4.18-1.87 4.18-4.18z"/></g><g><path class="st6" d="M370.37 277.17H323.6l7.15-17.34v-.01l2.88-7 .79-1.92 1.29-3.12.26-.64 2.88-7 .53-1.27 5.1-12.38c.92-2.23 4.08-2.23 5 0l5.1 12.38.53 1.27 2.88 7 .26.64 1.29 3.12.79 1.92 2.88 7v.01l7.16 17.34z"/><path class="st13" d="M326.66 269.73l-3.07 7.43h46.78l-3.06-7.43z"/><path class="st5" d="M319.85 272.72h53.57v7.57h-53.57z"/><path class="st14" d="M361.85 272.72h11.57v7.57h-11.57z"/><path class="st13" d="M368.53 272.72h-6.62l-5.31-12.89v-.01l-2.88-7-.79-1.92-1.29-3.12-.26-.64-2.88-7-.53-1.27-4.29-10.42.8-1.96c.92-2.23 4.08-2.23 5 0l5.1 12.38.53 1.27 2.88 7 .26.64 1.29 3.12.79 1.92 2.88 7v.01l5.32 12.89z"/><path class="st4" d="M357.98 247.14h-22.01l2.88-7h16.26zM363.21 259.81v.01h-32.46v-.01l2.87-7h26.71z"/><path class="st7" d="M357.98 247.14h-6.61l-2.88-7h6.62zM363.21 259.81v.01h-6.62v-.01l-2.87-7h6.61z"/></g><g><path class="st3" d="M72.22 107.1c3.49 0 6.53-2.54 7.01-6 .08-.62.13-1.25.13-1.9 0-7.71-6.25-13.96-13.96-13.96-.32 0-.63.01-.94.03-.64-7.6-7.01-13.57-14.77-13.57-8.19 0-14.83 6.64-14.83 14.83 0 .36.02.72.04 1.08-2.32-1.3-5.03-1.99-7.91-1.86-7.45.34-13.57 6.3-14.1 13.74 0 .06-.01.12-.01.18-.24 4.04 3.03 7.44 7.08 7.44h52.26zM405.35 118.06c11.04 0 11.65-16.61.62-17.15-.3-.01-.6-.02-.91-.02-1.97 0-3.86.31-5.64.88-1.48-8.99-9.28-15.85-18.69-15.85-9.62 0-17.55 7.17-18.77 16.45a17.45 17.45 0 0 0-7.54-1.71c-1.51 0-2.97.19-4.37.55-9.65 2.49-7.63 16.85 2.34 16.85h52.96zM272.8 36.21c11.03 0 11.65-16.61.62-17.14-.3-.01-.6-.02-.91-.02-1.97 0-3.86.31-5.64.88-1.48-8.99-9.28-15.85-18.68-15.85-9.61 0-17.55 7.17-18.77 16.45a17.501 17.501 0 0 0-11.9-1.16c-9.65 2.48-7.62 16.84 2.34 16.84h52.94z"/><circle class="st6" cx="97.11" cy="40.45" r="26.45"/><path class="st15" d="M97.32 14c7.19 4.73 11.95 12.87 11.95 22.12 0 14.61-11.84 26.45-26.45 26.45-.07 0-.14 0-.22-.01 4.17 2.74 9.15 4.34 14.51 4.34 14.61 0 26.45-11.84 26.45-26.45 0-14.53-11.73-26.33-26.24-26.45z"/></g></g></svg>
                <a href="https://www.freepik.com/vectors/business" target="_blank" class="text-xs text-gray-300">Business vector created by pikisuperstar - www.freepik.com</a>
            </div>
        </div>
        <div class="w-64 md:w-96 h-96 md:h-full bg-blue-200 bg-opacity-30 absolute -top-64 md:-top-96 right-20 md:right-32 rounded-full pointer-events-none -rotate-45 transform"></div>
        <div class="w-96 h-full bg-yellow-200 bg-opacity-20 absolute -bottom-96 right-64 rounded-full pointer-events-none -rotate-45 transform"></div>
    </div>

    <!-- BUY ME A BEER AND HELP SUPPORT OPEN-SOURCE RESOURCES -->
    <div class="flex items-end justify-end fixed bottom-0 right-0 mb-4 mr-4 z-10">
        <div>
            <a title="Buy me a beer" href="https://www.buymeacoffee.com/scottwindon" target="_blank" class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
                <img class="object-cover object-center w-full h-full rounded-full" src="https://i.pinimg.com/originals/60/fd/e8/60fde811b6be57094e0abc69d9c2622a.jpg"/>
            </a>
        </div>
    </div>

    `
  });

  toAdd('text-basic') && bm.add('text-basic', {
    category: 'Tailwind',
    label: 'Tables',
    attributes: { class: 'gjs-fonts gjs-f-h1p' },
    content: `
        <div class="bg-white shadow-md rounded my-6 wp-full">
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Project</th>
                        <th class="py-3 px-6 text-left">Client</th>
                        <th class="py-3 px-6 text-center">Users</th>
                        <th class="py-3 px-6 text-center">Status</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">

                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6" src="https://img.icons8.com/color/48/000000/javascript.png"/>
                                </div>
                                <span class="font-medium">JavaScript Project</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/women/7.jpg"/>
                                </div>
                                <span>Cora Key</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Pending</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </div>
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6" src="https://img.icons8.com/color/48/000000/php.png"/>
                                </div>
                                <span class="font-medium">PHP Project</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/8.jpg"/>
                                </div>
                                <span>Kylan Dorsey</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Completed</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </div>
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    `
  });
}
