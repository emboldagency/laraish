# emBold Starter Laraish Theme

You can find documentation for the theme here: [github.com/laraish/laraish](https://github.com/laraish/laraish).

## Setting up the theme

Run one of the following commands in the root of the theme directory:

`make dev` to set up the theme for development.

`make prod` to set up the theme for production.

`make git` to restore the theme's git history. This get's removed during make dev, to avoid overwriting the theme's starter files.

Note that `make dev` will fill out the .env for you, but you will still need to fill it out manually when running `make prod`.

## ACF blocks and importing fields

acf-fields.json

These fields will not be displayed with the rest of the field groups. They will only appear where the location rules are set for.

## Adding functions

## Search results page slug

Add this snippet to the website's .htaccess file (not the .htaccess file in the theme folder) to forward the search results from /?s= to /search/:

```
RewriteCond %{QUERY_STRING} \\?s=([^&]+) [NC]
RewriteRule ^$ /search/%1/? [NC,R,L]
```
