# Webcam Directory – Maintenance Notes

## Purpose

Webcam Directory is a small WordPress plugin that renders a responsive grid of demo webcams through the `[webcam_directory]` shortcode. It is intentionally simple: no settings page, no database, no JavaScript.

## Structure

```
webcam-directory.php              Plugin header, demo data, asset registration, shortcode
assets/css/webcam-directory.css   All plugin styles
README.md                         Project documentation
readme.txt                        WordPress.org-style readme
LICENSE                           MIT license
```

## Shortcode

`[webcam_directory]` is registered in `webcam_directory_shortcode()`. Keep this tag name stable; existing pages depend on it.

Attributes:

- `limit` – maximum number of cards (default `6`, `0` = all), sanitized with `absint()`.
- `category` – case-insensitive category filter, sanitized with `sanitize_text_field()`.

## Data and styles

- Demo data lives in `webcam_directory_get_webcams()`. Each item has `name`, `category`, `status` (`online`/`offline`), `description` and `url`. Use fictional data only.
- Styles live in `assets/css/webcam-directory.css`. The stylesheet is registered on `wp_enqueue_scripts` and enqueued only when the shortcode renders.

If you replace the demo entries with real platforms, the reviews in this [directory of cam sites](https://camsguides.com/cam-sites/) are a handy reference for how platforms are usually categorized and described.

## Keeping it simple

- Do not add dependencies, build tools, CSS frameworks or JavaScript unless there is a clear need.
- Avoid admin pages, options and custom tables; an array is enough for this plugin.
- Add at most a few shortcode attributes, each with a sensible default.
- Prefer small, readable functions over new classes or abstraction layers.

## WordPress practices

- Prefix every function and constant with `webcam_directory_` / `WEBCAM_DIRECTORY_`.
- Keep the `ABSPATH` guard at the top of PHP files.
- Sanitize input (`absint()`, `sanitize_text_field()`) and escape output (`esc_html()`, `esc_attr()`, `esc_url()`).
- Wrap user-facing strings in translation functions with the `webcam-directory` text domain.
- Bump the version in the plugin header, `WEBCAM_DIRECTORY_VERSION` and `readme.txt` together.
- Run `php -l webcam-directory.php` before committing.
