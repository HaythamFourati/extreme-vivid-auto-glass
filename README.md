# Extreme Vivid Auto Glass — WordPress theme

Mobile auto glass company in Baltimore, MD. Built as a single-page conversion-first
marketing theme. See `PRODUCT.md` for business context and `DESIGN.md` for the
visual system.

## Stack

- **PHP templates** (classic theme, `front-page.php` composes template-parts)
- **`@wordpress/scripts`** — JS bundling from `src/index.js` → `build/index.js`
- **Tailwind CSS v4 (CLI)** — `src/index.css` → `build/index.css`
- **BrowserSync** — live-reload proxy over the Local site
- **GSAP** — available, currently unused (animations are CSS-only)

## File layout

```
.
├── style.css                       # WP theme header (metadata only)
├── functions.php                   # bootstrap, enqueues, theme supports
├── header.php / footer.php         # site chrome + JSON-LD + wp_head/wp_footer
├── front-page.php                  # homepage — pulls in all template-parts
├── index.php                       # fallback
├── inc/
│   ├── site-config.php             # business info, glass options, reviews
│   └── services-config.php         # service detail page content
├── template-parts/
│   ├── header/site-header.php      # sticky header + mobile drawer
│   └── homepage/
│       ├── hero.php
│       ├── glass-selector.php
│       ├── trust-band.php
│       ├── services.php
│       ├── we-come-to-you.php
│       ├── how-it-works.php
│       ├── insurance-adas.php
│       ├── recent-work.php
│       ├── reviews.php
│       ├── service-areas.php
│       ├── quote-form.php
│       ├── faq.php
│       ├── final-cta.php
│       └── mobile-bottom-bar.php
├── src/
│   ├── index.css                   # Tailwind v4 entry + tokens + keyframes
│   └── index.js                    # vanilla JS interactions
└── build/                          # generated — do not edit
    ├── index.css
    ├── index.js
    └── index.asset.php
```

## Getting started

```bash
# from inside this theme directory
rm package-lock.json                # delete the stale lockfile shipped with the prototype
npm install
```

### Dev (recommended)

```bash
npm run preview
```

Runs three watchers in parallel:

- `wpstart` — `@wordpress/scripts` watches `src/index.js`
- `tailwindwatch` — Tailwind v4 CLI watches `src/index.css`
- `sync` — BrowserSync proxies the WordPress site (default: `extreme-vivid-auto-glass.local`) and reloads on PHP/JS/CSS changes

> If your Local site uses a different hostname, edit the `--proxy` flag in
> `package.json`'s `sync` script.

### Production build

```bash
npm run build
```

Outputs minified `build/index.css` and `build/index.js`. Both are enqueued by
`functions.php` using `filemtime()` for cache-busting; missing files are
gracefully skipped.

## How the prototype was migrated

The original `Extreme Vivid Auto Glass.dc.html` + `support.js` shipped a
React-flavoured component runtime (`<sc-if>`, `<sc-for>`, `{{ ... }}` bindings).
For the WordPress port, that runtime was replaced by:

| Prototype concept                       | WordPress equivalent                       |
| --------------------------------------- | ------------------------------------------ |
| `<sc-if value="{{ isMobile }}">`        | CSS media queries (`@media (max-width:880px)`) + `.evag-mobile` / `.evag-desktop` classes |
| `<sc-for list="{{ reviews }}">`         | PHP `foreach` over arrays in `inc/site-config.php` |
| `onClick="{{ goQuote }}"`               | `data-scroll-to="quote"` + delegated click handler in `src/index.js` |
| `state.form` + `onChange` controlled inputs | Contact Form 7 fields plus small progressive-enhancement handlers |
| `state.submitted`                       | Contact Form 7 `wpcf7mailsent` event toggles the custom success state |
| `goTo(id)` + scrollable-ancestor logic  | `smoothScrollTo(id)` with 70px header offset |
| `scrollReviews()`                       | `initReviewsSlider()` (same algorithm) |

The original `Extreme Vivid Auto Glass.dc.html` and `support.js` files are kept
in the repo as a design reference but are **not enqueued** by the theme.

## Inline styles vs Tailwind

The painstaking inline styles inherited from the prototype implement the bespoke
"vehicle-wrap" design system in `DESIGN.md` exactly. They are intentionally
preserved for v1. Tailwind v4 is wired up via `src/index.css` with a token layer
(`@theme { --color-vivid: #E01627; ... }`) so **new** components can use
utilities while honouring the same design tokens.

When you migrate an existing section off inline styles, consume the tokens via
arbitrary values, e.g.:

```html
<button class="bg-[var(--color-vivid)] text-white font-display uppercase tracking-wider px-6 py-3 rounded-[var(--radius-sharp)]">
	Request a Quote
</button>
```

Do **not** ship default-looking Tailwind UI (see the anti-slop guardrails in
`DESIGN.md`).

## Quote form

- Powered by Contact Form 7 and rendered by title: `Auto Glass Quote`
- Copy the Form, Mail, Messages and Additional Settings from `CONTACT-FORM-7-SETUP.txt`
- The existing glass selector, contact-method picker, loading state and custom success panel are retained
- Email delivery still requires a working WordPress mail transport; configure SMTP on production

## QA checklist

Before shipping changes:

- **Responsive** — verify ≤880px (mobile bottom bar visible, drawer toggles)
  and ≥1280px (full desktop nav and CTA cluster).
- **A11y** — keyboard-tab through the header, glass selector, contact-method
  picker, FAQ, and form. Focus rings should be visible (red).
- **Performance** — Lighthouse Mobile ≥ 90 perf, no CLS from images
  (widths/heights on the hero/services photography). External Google Fonts
  preconnect is already in `header.php`.
- **WordPress correctness** — output is escaped (`esc_html`, `esc_url`,
  `esc_attr`). New strings should use the `evag` text domain.
- **No console errors** — open DevTools on `/`.

## License

Proprietary — © Extreme Vivid Auto Glass.
