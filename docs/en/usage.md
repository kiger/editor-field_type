# Usage

- [Setting Values](#mutator)
- [Basic Output](#output)
- [Presenter Output](#presenter)

<hr>

<a name="mutator"></a>
## Setting Values

You can set the editor field type value with a string.

    $entry->example = $html;

<hr>

<a name="output"></a>
## Basic Output

The editor field type always returns the storage file content.

    $entry->example; // Contents of storage::example/input/file.js

<hr>

<a name="presenter"></a>
## Presenter Output

When accessing the value from a decorated entry, like one in a view, the country field type presenter is returned instead.

#### Storage Path

The storage path is the hinted path string for the field type's storage file. The path hint is shown instead of the full system path.

    $entry->example->path(); // storage::example/input/file.js

#### Render

Return the storage file rendered through the view system. An optional argument of view payload data can also be passed.

    $entry->example->render();                          // The rendered content.
    $entry->example->render(['products' => $products]); // The rendered content with extra data.

#### Parse

Return the storage file parsed through the view layer. Again, optional data payload can also be passed.

<div class="alert alert-primary">
<strong>Note:</strong> This is very different from loading the file as a view. For example, a JS storage file can be parsed but not loaded as a view.
</div>

    $entry->example->parse();                          // The rendered content.
    $entry->example->parse(['products' => $products]); // The rendered content with extra data.

#### Content

Return the storage file contents. If there is newer information in the database, it will be synced first.

    $entry->example->content(); // The storage file content
