# emBold Starter Laraish Theme

You can find documentation for the theme here: [github.com/laraish/laraish](https://github.com/laraish/laraish).

## ACF blocks and importing fields

acf-fields.json
These fields will not be displayed with the rest of the field groups. They will only appear where the location rules are set for.

## Adding functions

## Search results page slug

```
RewriteCond %{QUERY_STRING} \\?s=([^&]+) [NC]
RewriteRule ^$ /search/%1/? [NC,R,L]
```
