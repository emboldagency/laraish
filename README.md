# emBold Starter Laraish Theme

You can find documentation for the base laraish theme here: [github.com/laraish/laraish](https://github.com/laraish/laraish).

## Setting up the theme

You can run the following commands in the root of the theme directory:

`make dev` to set up the theme for development.

`make prod` to set up the theme for production.

`make git` to restore the theme's git history. This get's removed during make dev, to avoid overwriting the theme's starter files.

Note that `make dev` will fill out the .env for you, but you will still need to fill it out manually when running `make prod`.

## ACF blocks and importing fields

The ACF fields for the starter blocks will be added programmatically. These fields will not be displayed with the rest of the field groups. They will only appear where the location rules are set for.

To modify you will need to import the ACF fields into the database. To do this you can run `make acf` from the root of the theme directory. You will want to make sure that these fields haven't already been imported before running this command. If the fields have already been imported, you will end up duplicating fields.

## JS files for ACF blocks

If you need to add JavaScript to a block, you can add it to the `resources/js/blocks` directory. Any file in that directory will automatically be compiled and saved in `public/js/blocks`. You can then enqueue the file at the top of the block's file, using the `Enqueue Script` comment.

## Adding functions

If you need to add any custom server-side functionality, you can create a PHP file in the `functions` folder and add your functions there.

## Search results page slug

Add this snippet to the website's .htaccess file (not the .htaccess file in the theme folder) to forward the search results from `/?s=` to `/search/`:

```
RewriteCond %{QUERY_STRING} \\?s=([^&]+) [NC]
RewriteRule ^$ /search/%1/? [NC,R,L]
```
