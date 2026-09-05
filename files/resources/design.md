# Tempo — design system

## Atmosphere
A precision instrument in paper and carbon. The page is a soft grey ground with
white cards laid on it, hairlines instead of boxes, and one blue that is allowed
to appear about twice a screen. Colour is deliberately withheld so that
function reads first — even a confirmed booking is marked in blue, never green.
Headlines are geometric and set slightly open; body copy runs light and tightly
tracked, which is the pairing that keeps the page technical without being cold.
Product interfaces are drawn in markup rather than screenshotted, so they stay
razor sharp at any width and restyle for free when a token changes.

## Colors
| Token | Value | Role |
|---|---|---|
| canvas | `#f4f4f4` | the page ground |
| surface | `#ffffff` | every card, the hero band, the booking stage |
| raised | `#ededed` | inset tiles, the active duration pill, quiet chips |
| well | `#e2e2e2` | tracks and pressed states |
| ink | `#242424` | headings and primary text (14.1:1 on canvas) |
| muted | `#5f636b` | secondary copy and descriptions (5.5:1 canvas, 6.0:1 white) |
| faint | `#6f727a` | meta, disabled slots, axis labels — **white surfaces only** (4.8:1) |
| line / line-strong | carbon at 9% / 16% | hairlines, dividers, button rings |
| carbon | `#101010` | the filled button, the dark band, the mark |
| carbon-lift / -ink / -muted / -line | `#2b2b2b` / `#fff` / `#a7a9ad` / white 14% | the dark band's own tiers |
| accent | `#006ac9` | links, the selected date, one focal moment (5.4:1 white) |
| accent-lift | `#0057a8` | accent hover |
| accent-bright | `#0099ff` | **never text** — availability pips, bars, fills |
| accent-wash | `#eaf5ff` | the announcement chip, a hovered slot |

Two actions exist and no third: `.btn-solid` (carbon pill) and `.btn-ghost`
(white pill in a hairline ring). `.btn-rect` gives the header button the
reference's 8px radius; `.btn-invert` is the same pair inverted for the dark
band. No outline button, no gradient, no second accent.

## Typography
- **Outfit** for every heading — geometric, wide, open apertures. 600 for
  headings, 500 for buttons and labels.
- **Inter** for body — 300 for a lede, 400 for copy, 500 for emphasis. Feature
  settings `cv02 cv03 cv04 cv11`.
- The signature inversion: display sizes track slightly **open** (`+0.005em`)
  while body copy tracks **tight** (`-0.012em`). Do not "fix" this to the usual
  tight-display default; it is what makes the headlines friendly rather than
  compressed.
- Hero `clamp(2.75rem, 5.2vw, 4rem)`/1.08. Page title `clamp(2.375rem, 4.4vw,
  3.25rem)`. Section heading `clamp(2rem, 3.2vw, 3rem)`/1.1. Card title
  `1.25rem`/1.3. Lede `1.125rem`/1.5 at weight 300. Body `1rem`/1.6.
- Headings `text-balance`, paragraphs `text-pretty`, measure capped in `ch`.
- **No eyebrow or kicker above a heading.** The heading carries itself.

## Spacing & radius
Container `max-w-page` (75rem / 1200px) with `px-6`. Sections `py-20 md:py-28`.
Every multi-column section uses `gap-6`. Radius: page CTAs are pills; the header
button and inputs are `rounded-lg` (8px); cards are `rounded-xl` (12px); full
panels, the booking stage and the dark band are `rounded-3xl` (24px).

## Components
The header is a white pill floating over every page, with the mark, a Solutions
menu that opens on hover and on focus, page links, sign in, and one rectangular
carbon button. Cards are white with `shadow-card` and no border — a shadow and
a solid border are never paired; where separation is all that's needed, a
hairline divider does it instead of a card. Feature lists are `<dl>`/`<dt>`/`<dd>`.
Tables carry horizontal row rules only: no container, no vertical lines, no
uppercase headings. Icons are Heroicons paths inline at their native viewBox,
never in a coloured container and never an emoji.

## The signature
The booking stage: a working booking card drawn entirely in markup. Durations,
a real month grid whose available dates carry a blue pip, a slot column that
appears when a date is picked, and a confirmation face the card flips to when a
slot is chosen. It sits in the hero and returns on the Features page, and every
part of it is an editable field. It is the page's only click-driven motion.

## Voice
Plain, precise, unhurried — a tool that respects other people's time. Short
declaratives; say what happens rather than how it feels. "Pick a time. It lands
in both calendars." Testimonial names are unisex because the avatars are random.

## Anti-patterns
- An eyebrow pill above a section heading.
- A second accent colour, a gradient, or a green confirmation state.
- A screenshot where markup could draw the interface.
- Identical icon-plus-title cards used as the answer to every section.
- A shadow paired with a solid grey border.
- Six centered sections in a row — the closing CTA is the only centered one.
- `text-white`, `bg-zinc-*` or a raw hex anywhere outside this file's tokens.

## Tokens
```css
@theme {
    --color-canvas: #f4f4f4;
    --color-surface: #ffffff;
    --color-raised: #ededed;
    --color-well: #e2e2e2;
    --color-ink: #242424;
    --color-muted: #5f636b;
    --color-faint: #6f727a;
    --color-line: rgb(16 16 16 / 0.09);
    --color-line-strong: rgb(16 16 16 / 0.16);
    --color-carbon: #101010;
    --color-carbon-lift: #2b2b2b;
    --color-carbon-ink: #ffffff;
    --color-carbon-muted: #a7a9ad;
    --color-carbon-line: rgb(255 255 255 / 0.14);
    --color-accent: #006ac9;
    --color-accent-lift: #0057a8;
    --color-accent-ink: #ffffff;
    --color-accent-bright: #0099ff;
    --color-accent-wash: #eaf5ff;
    --font-display: "Outfit", ui-sans-serif, system-ui, -apple-system, sans-serif;
    --font-sans: "Inter", ui-sans-serif, system-ui, -apple-system, sans-serif;
    --container-page: 75rem;
    --shadow-card: rgb(36 36 36 / 0.05) 0 4px 8px 0;
    --shadow-raise: rgb(36 36 36 / 0.06) 0 1px 2px 0, rgb(36 36 36 / 0.06) 0 6px 14px -4px;
    --shadow-pop: rgb(16 16 16 / 0.08) 0 2px 6px -2px, rgb(16 16 16 / 0.1) 0 12px 28px -8px;
    --ease-glide: cubic-bezier(0.22, 1, 0.36, 1);
}
```
