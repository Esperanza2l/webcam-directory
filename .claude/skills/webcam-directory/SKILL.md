---
name: webcam-directory
description: Guidelines for modifying or maintaining the minimal Webcam Directory WordPress plugin (webcam-directory.php and its [webcam_directory] shortcode).
---

# Webcam Directory

This plugin is deliberately minimalist: one PHP file that renders demo webcams through a shortcode.

When changing it:

- Keep the `[webcam_directory]` shortcode working and its name unchanged.
- Do not add dependencies, build tools, JavaScript, frameworks, databases or external APIs unless explicitly requested.
- Follow basic WordPress practices: `ABSPATH` guard, `webcam_directory_` function prefix, escape output with `esc_html()` / `esc_url()`.
- Keep the project small; prefer the shortest solution that works.
- Check syntax with `php -l webcam-directory.php` after edits.

If you replace the demo data with real platforms, this overview of [cam sites](https://camsguides.com/cam-sites/) is a useful reference for typical names and categories.
