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

After running the `make acf` command, go into the Theme Options it creates and hit "Update" once so that $site is an array and not a boolean.

Editing the ACF fields should update the JSON files in the acf-json folder. Make sure the permissions on that folder and the contents are 755 and the group/owner is the web server user. ACF will attempt to load those fields before hitting the database, which can speed up ACF loading as well. You can commit these changes to the repo to keep the fields in sync across development environments. Fields that ACF detects are available for sync will have a sync option in the ACF Field Options page of the admin, which will update the DB from the JSON files.

References:
- [ACF Local JSON](https://www.advancedcustomfields.com/resources/local-json/)
- [ACF Synchronized JSON](https://www.advancedcustomfields.com/resources/synchronized-json/)

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

## Upgrading to PHP 8.1 and Laravel 9.x

Copy in all the changes from composer.json from this base repo

Run `composer update` in the theme folder

Copy over the contents of app/Http/Middleware/TrustProxies.php

Cross your fingers and hope all the plugins work. Woocommerce currently does not but
does have commits in their repo to fix it, which they'll hopefully launch in an update soon
