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
<x-onix::grapeBuilder
    pushLocationCss="css"
    pushLocationJs="scripts"                      
    {{-- not required --}}
    imageLoadApi="{{ route('admin.page.builder.images') }}"
    {{-- not required --}}
    imageSaveApi="{{ route('page.builder.images.save') }}"
    saveUrl="{{'/blog/category/save/'.$blogCategory->id}}"
    loadUrl="{{'/blog/category/load/'.$blogCategory->id}}"
	:plugin="'homePlugins'"
    >
    {{ this slot is not required but the defult will be uses }}	
    <x-slot name="pluginJs">
        <script src="{{ asset('vendor/Onix/onixGrape/homePlugins.js') }}"></script>                                   
    </x-slot>
    
    {{-- set your style like boostrap or this case tailwind so the brower can render inside the componente --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</x-onix::grapeBuilder>
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

// This is a exempla that how you can load the html text
public function builderLoad($id)
    {
        $blogCategory          = BlogCategory::find($id);
        return response()->json([
            'data' => $blog->content,
        ]);
    }

// This is a exemple that how can save 
public function builderSave(Request $request, $id)
    {
	    $page          = Page::find($id);
        $page->content = json_encode(Request('data'));
        $page->save();

        // prepare to get the html
        $contentToSave = (array)json_decode($page->content);
        // Get the style
        $contentStyleToSave = $contentToSave['gjs-css'];// Get the css
        // Get the html
        $contentToSave = $contentToSave['gjs-html'];// get the html
	    // Get the page ready
        $contents = "
            <style>".$contentStyleToSave."</style>
                ".$contentToSave."
        ";

        // path to save the file
        $pathToSave = resource_path('views/pages/pages/');
        // create the fileName
        $fileName   = $page->slug.'.blade.php';
	    // Save the page into a file
        OnixBuilder::savePageFile($contents, $fileName, $pathToSave);

        return response()->json([
            'meta'  => [
                'status'  => true,
                'message' => 'Contend saved'
            ]
        ]);
    }
// example how to load that view once saved
public function builderPreview($id)
    {
        $blog     = Blog::find($id);
    	//where is pages you can replace to your path and you file name following laravel view struture
        return view('pages.'.'onix_'.$blog->title);
    }
```

# The function savePageFile

By default will create a folder named pages in the resources/view/pages, inside this folder you will files called onix_file.balde.php, you will need those to render the html.

```php
//$pathToSave by default will be used resource_path('views/pages/')
//$contents you html content
//$fileName your file name
OnixBuilder::savePageFile($contents, $fileName, $pathToSave)
```

