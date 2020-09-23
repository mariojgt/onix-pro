# Onix is a Laravel page builder that use GrapeJs as a main engine.

### This is how you can use grape js page builder

#### Some variables that you can pass true,

- **pushLocationCss**::This variable is not required but i strong recommended to use this will inject the css code need for the grape js to work.
- **pushLocationJs**::This variable is not required but i strong recommended to use this will inject the js code need for the grape js to work.
- **saveUrl**: This is where your route that you want to save the html code.
- **loadUrl**:This is where you define the route that you load your html page.

by default each 3 changes will save the page, below there is a example that how you can use the code, just one note you will need to publish the package before use.

```php+HTML
<x-onix::grapeBuilder
    pushLocationCss="css"
    pushLocationJs="scripts"
    saveUrl="{{'/blog/category/save/'.$blogCategory->id}}"
    loadUrl="{{'/blog/category/load/'.$blogCategory->id}}"
>
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

```php
// This is a exempla that how you can load the html text
public function builderLoad($id)
    {
        $blogCategory          = BlogCategory::find($id);
        return response()->json([
            'meta'  => [
                'status' => true,
                'message'     => 'loaded'
            ],
            'data' => json_decode($blogCategory->content),
        ]);
    }

// This is a exemple that how can save 
public function builderSave(Request $request, $id)
    {
	    // model exemple
        $blogCategory          = BlogCategory::find($id);
        $blogCategory->content = json_encode(Request('data'));
        $blogCategory->save();

        return response()->json([
            'meta'  => [
                'status'  => true,
                'message' => 'saved'
            ]
        ]);
    }
```

