# YOURLS UI Components

Atomic-design layout, all anonymous Blade components (no PHP class).

| Layer | Path | Tag prefix |
|---|---|---|
| Atoms | `atoms/` | `<x-atoms::name>` |
| Molecules | `molecules/` | `<x-molecules::name>` |
| Organisms | `organisms/` | `<x-organisms::name>` |
| Forms | `forms/` | `<x-forms::name>` |

## Conventions

- Declare every prop with `@props([...])` and a sensible default.
- Merge external classes with `{{ $attributes->merge(['class' => '...']) }}`
  so callers can extend styles without re-declaring everything.
- Escape every dynamic value (`{{ }}` does it; use `{!! !!}` only when the
  caller is responsible for the trust boundary, e.g. SVG icon strings).
- Use semantic tokens (`bg-surface`, `text-primary`, `border-default`)
  rather than raw scale steps when possible — keeps dark mode automatic.
- ARIA: every interactive control sets `aria-label` (or relies on its
  slot text), and modal/dialog organisms manage `aria-modal`+focus trap.
- Sizes follow `sm | md | lg` consistently across components.
- Tones follow `neutral | primary | success | warning | danger | info`.
