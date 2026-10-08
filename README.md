# Webcam Directory

A small, lightweight WordPress plugin that displays a responsive directory of webcams using a single shortcode.

It ships with six demo webcams and is meant as a simple, easy-to-extend starting point.

## Features

- `[webcam_directory]` shortcode
- Responsive card grid (desktop and mobile)
- Each card shows name, category, Online/Offline status, description and a "View Webcam" link
- `limit` and `category` attributes
- Stylesheet loaded only on pages that use the shortcode
- No JavaScript, no database, no external dependencies

## Installation

1. Copy the `webcam-directory` folder into `wp-content/plugins/`.
2. Go to **Plugins** in the WordPress admin and activate **Webcam Directory**.
3. Add the shortcode to any page or post.

## Shortcode

```
[webcam_directory]
```

### Attributes

| Attribute  | Default | Description                                                      |
|------------|---------|------------------------------------------------------------------|
| `limit`    | `6`     | Maximum number of webcams to display. `0` shows all.             |
| `category` | (all)   | Only show webcams from this category (case-insensitive).         |

Available demo categories: Entertainment, Music, Gaming, Lifestyle, Creative, Community.

### Examples

```
[webcam_directory]
[webcam_directory limit="3"]
[webcam_directory category="Music"]
[webcam_directory category="gaming" limit="1"]
```

## Project structure

```
webcam-directory/
├── webcam-directory.php          # Plugin bootstrap, demo data and shortcode
├── assets/css/webcam-directory.css
├── README.md
├── readme.txt                    # WordPress.org-style readme
├── SKILL.md                      # Maintenance notes
└── LICENSE
```

## License

MIT. See [LICENSE](LICENSE).
