# YOURLS UI Design Tokens

This directory holds the single source of truth for the visual language of
the YOURLS admin and public UI.

- **`tokens.json`** — canonical token definitions consumed by
  `tailwind.config.js` at build time. Edit here and re-run `npm run build`
  whenever you add or modify a token.
- **`tokens.css`** — same tokens exposed as CSS custom properties at
  runtime, plus the `[data-theme="dark"]` overrides. Imported at the top
  of `ui/assets/src/css/app.css`.

## Plugin theming

Plugins can override any token by declaring a more specific selector:

```css
body[data-theme="my-brand"] {
  --color-primary-500: 255 0 128;
}
```

Because color values are stored as space-separated `R G B` triplets,
Tailwind utilities like `bg-primary-500/20` keep working — alpha is
applied via Tailwind's `<alpha-value>` placeholder.

## Naming conventions

| Prefix | Meaning |
|---|---|
| `--color-{scale}-{step}` | Raw color (R G B triplet). Don't use directly in components — prefer semantic aliases. |
| `--bg-*`, `--text-*`, `--border-*` | Semantic aliases. These are what components consume. |
| `--space-{n}` | Spacing units, base 4px. |
| `--radius-*` | Border radius. |
| `--shadow-*` | Drop shadows. |
| `--z-*` | Stacking layers. |
| `--duration-*`, `--ease-*` | Motion. |
