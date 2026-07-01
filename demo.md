# Button Hover Effects (Global)

Gold sweep + text flip is automatically applied to all buttons with `tw-from-indigo-600 tw-to-blue-500` classes.

No per-page edits needed — handled globally in:

- `resources/views/layouts/partials/css.blade.php` (CSS for `.gold-sweep-btn`)
- `resources/views/layouts/partials/javascripts.blade.php` (JS auto-adds `gold-sweep-btn` class + `<span>` wrapper)

## Usage on any new button

Just use `gold-sweep-btn` class and wrap text in `<span>`:

```html
<a class="gold-sweep-btn tw-dw-btn tw-font-bold tw-text-white tw-border-none tw-rounded-full" href="...">
    <span>Button Text</span>
</a>
```

## Customize

- `#15803d` → default bg
- `#DFB86B` → hover sweep
- `0.4s` → speed
