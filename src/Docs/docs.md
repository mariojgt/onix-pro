# Onix is a Laravel page builder that use GrapeJs as a main engine.

### This is how you can use grape js page builder

#### Some variables that you can pass true,

- **pushLocationCss**::This variable is not required but i strong recommended to use this will inject the css code need for the grape js to work.
- **pushLocationJs**::This variable is not required but i strong recommended to use this will inject the js code need for the grape js to work.
- **saveUrl**: This is where your route that you want to save the html code.
- **loadUrl**:This is where you define the route that you load your html page.
- ***mainBackgroudColor***: This variable is not required but will change the editor color this is a variable exemple:\#f6081c
- ***textColor***:this variable is not required bet will change the text color for the ditor
- **:*plugin***: this varaible you will use to pass your custom plugin name
- you have also a slot called pluginJs that you can you to pass the plugins script

by default each 3 changes will save the page, below there is a example that how you can use the code, just one note you will need to publish the package before use.

```php+HTML
		<x-onix::grape-builder
            {{-- required --}}
            pushLocationCss="css"
            {{-- required --}}
            pushLocationJs="scripts"
            {{-- not required --}}
            imageLoadApi="{{ route('admin.page.builder.images') }}"
            {{-- not required --}}
            imageSaveApi="{{ route('admin.page.builder.images.save') }}"
            {{-- not required this is the place where you will save and load you url--}}
            saveUrl="{{ '/page/save/'.$page->id }}"
            {{-- not required this is the place where you will save and load you url--}}
            loadUrl="{{ '/page/load/'.$page->id }}"
            {{-- chagne the backgour not required --}}
            mainBackgroudColor="{{ $mainBackgroudColor }}"
            {{-- change the editor text color not required --}}
            textColor="{{ $textColor }}"
            {{-- select you plugin for this page or leave the onix as default --}}
            :plugin="'youpluginname'"
        >
            <x-slot name="pluginJs">
	    <!-- path to your js plugin -->
                <script src="{{ asset('youpluginname.js') }}"></script>
            </x-slot>
            <div class="container" >
                {{-- set you style in here in here this is jsut a exemple --}}
                {{ <link href="'.asset('mycss.css').'" rel="stylesheet"/> }}
            </div>
        </x-onix::grape-builder>
```

### Some javascript functions that you can use.

For saving the content you can use this example

```html
<button onclick="saveContent()" >Save example</button>
```

The Function saveContent() will trigger the request to save the html code.

```html
<button onclick="loadContent()" >Load example</button>
```

The Function loadContent() will trigger the even to load the html code from.

# The php api to save or load your html text.

Follow the route example

```php
// This is how you can save you need a post route and they in the saveUrl="{{'/blog/category/save/'.$blogCategory->id}}"
// You pass the model id with the route
Route::post('blog/category/save/{id}', 'BlogCategoryController@builderSave')->name('blog.category.save');
// This is how you can load your post save thing you need the loadUrl="{{'/blog/category/load/'.$blogCategory->id}}"
// You pass the model id with the route
Route::get('blog/category/load/{id}', 'BlogCategoryController@builderLoad')->name('blog.category.load');

```

# The controller method to save or load.

The way it works is you first save in the database them you get that content and using use Mariojgt\Onix\Helpers\OnixBuilder::savePageFile($pathToSave, $contents, $fileName) you will later use that view create with this function to render the html, and the content you saved in the database will be used to load in the grapeJs Builder.

```php
use Mariojgt\Onix\Helpers\OnixBuilder;

public function builderSave(Request $request, $id)
    {
        // Clear the assets because they are called in page load
        $dataToSave = [
            'gjs-html'       => Request('data')['gjs-html'],
            'gjs-assets'     => null,
            'gjs-components' => Request('data')['gjs-components'],
            'gjs-css'        => Request('data')['gjs-css'],
            'gjs-styles'     => Request('data')['gjs-styles'],
        ];

        // Find the page and save the content
        $page          = Page::findOrFail($id);
        $page->content = json_encode($dataToSave);
        $page->save();
    	
	    // this part is not required is just a example if oyu want to generate a fisical page
        // Path to save the file
        $pathToSave = resource_path('views/pages/pages/');

        // Create the fileName we need the same file name to load this page
        $fileName   = $page->slug.'.blade.php';
        OnixBuilder::savePageFile($dataToSave['gjs-html'], $fileName, $pathToSave);

        return response()->json([
            'meta'  => [
                'status'  => true,
                'message' => 'Contend saved'
            ]
        ]);
    }
// how to load the page
public function builderLoad($id)
    {
        $page = Page::find($id);

        return response()->json([
            'data' => json_decode($page->content),
        ]);
    }

// how load upload images using the grapejs editor
// Image api here
    public function imagePageBuilderLoader()
    {
        // Path where to save the image
        $path = public_path('builder_images');
        // If dont exist create one
        if(!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        // get all the folder from the path
        $files = File::allFiles($path);

        $dataReturn = [];
        // Return array with the image paths
        foreach ($files as $key => $value) {
            $dataReturn[] = url('builder_images/'.$value->getFilename());
        }

        return $dataReturn;
    }

// example how to save the images using the grape editor not that i am using image intervention
public function imagePageBuilderSaver(Request $request)
    {
        // Path to move the file
        $path = public_path('builder_images');
        // Get the files
        foreach (Request('files') as $key => $file) {
            // Prepare the image to convert to a webp
            // Turn image into object and ensure orientation is reset
            $img  = Image::make($file->getRealPath())
            ->orientate();

            // Resize image, with no upsizing, at the same aspect ratio
            $img->resize(intval(1400), intval(2000), function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Prepare the file to get the raw file name
            $fileRaw = $file->getClientOriginalName();
            $filename = pathinfo($fileRaw, PATHINFO_FILENAME);
            $img->save($path.'/'.$filename.'.webp');
        }

        return true;
    }
```

# The function savePageFile this is not required is just a extra if you want to generate a fisical page.

By default will create a folder named pages in the resources/view/pages, inside this folder you will files called onix_file.balde.php, you will need those to render the html.

```php
//$pathToSave by default will be used resource_path('views/pages/')
//$contents you html content
//$fileName your file name
OnixBuilder::savePageFile($contents, $fileName, $pathToSave)
```



# Ck editor

to use the ck editor you need the following, note that you can define the url where to upload the images imageUploadUrl is not required

```php+HTML
 <textarea id="editor" name="content">{{ $blog->content }}</textarea>
{{-- you can you a push in the componente if need to stack your css or js --}}
 <x-onix::ckeditor-builder-js imageUploadUrl="/blog/image/upload" />
```

### Simple example how you can upload the image in your php function

```php
public function imageUpload(Request $request)
    {
        // Path to move the file
        $path = public_path('builder_images');

        // CHeck if the path exist
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path, 0775, true); //creates directory
        }

        // Upload the file with the original name
        Request('upload')->move($path, Request('upload')->getClientOriginalName());
		// you need to return like this other wise ckeditor will not be able to process your image
        return response()->json([
            'url' => url('builder_images'.'/'.Request('upload')->getClientOriginalName()),
        ]);
    }
```

