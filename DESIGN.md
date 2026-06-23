# DESIGN.md — Visual System

## Concept
"Precision mobile auto glass." Inspired by the black/red/white branded van wrap:
high-contrast vehicle-wrap energy, glass reflections, road/lane geometry, technician
precision. NOT a generic blue local-service template.

## Signature risk (one, executed cleanly)
**Angled windshield-reflection geometry.** The hero image sits in a panel sheared at
the rake angle of a windshield (clip-path), with a diagonal glass-sheen gradient
sweeping across it. The same angle recurs as thin "edge" accents and the service-zone
strip. Restrained — the angle is the brand, not decoration everywhere.

## Color (literal values, used inline)
- Asphalt black   #0C0D0F   (primary dark bg)
- Panel           #15171B   (raised dark surfaces)
- Graphite        #23262C   (cards on dark, borders base)
- Hairline        rgba(255,255,255,.10)
- Paper           #F5F6F8   (light sections)
- White           #FFFFFF
- Muted-on-dark   #9AA1AB
- Ink-on-light    #14161A
- VIVID RED       #E01627   (primary CTA, brand accent)  hover #B5101E
- Glass blue      #5FB1D4   (cool reflection accent — sparing, technical labels/lines)

Rule: red = action. Blue = glass/technical signal only. Dark dominant; light sections
for breathing room (services, how-it-works, form). Never both accents fighting.

## Type
- Display: **Saira Condensed** 700/800, UPPERCASE, tight tracking — automotive, urgent.
- Body: **IBM Plex Sans** 400/500/600 — precise, highly readable.
- Label/mono: **IBM Plex Mono** 500 — spec-sheet microcopy, kickers, route codes.
- Scale (fluid clamp): hero clamp(44px,7vw,86px); section title clamp(30px,4vw,52px);
  body 16–18px; mono kicker 12–13px tracked 0.15em uppercase.

## Spacing & shape
- Section padding: clamp(64px,9vw,128px) vertical.
- Radius: 4px (sharp/technical) — never pill-soft cards. Buttons 4px.
- Borders: 1px hairline; on light, 1px #E4E7EB.
- Shadows: tight & directional, e.g. 0 10px 30px -12px rgba(0,0,0,.5). No glow.

## Components
- Buttons: red solid (primary), outline (secondary on dark), dark solid on light.
  Uppercase Saira Condensed. translateY(-2px) + deepen shadow on hover.
- Cards: square corners, hairline border, real photography where possible, small mono
  kicker + condensed headline + one benefit line + text CTA with arrow.
- Glass selector: large selectable tiles, red active state, pre-fills form.
- FAQ: native <details> accordion (instant, editable).

## Motion (minimal)
- Hero: single staggered load reveal.
- Hover lifts on cards/buttons only.
- Glass-sheen: one slow shimmer on hero panel.
- Smooth-scroll to quote. No scroll-jacking, no parallax soup.

## Imagery
Real brand photos (van, technicians, real damage) over stock/icons. Treatment:
slightly cool/contrasty, sit inside angled panels, dark gradient scrim for text legibility.

## Anti-slop guardrails (Impeccable detect)
No SaaS gradient hero · no glassmorphism cards · no random glowing borders · no generic
icon grid · no fake "trusted by thousands" · no fabricated testimonials/stars · no
out-of-state copy · no excessive animation · sharp corners not soft pills · specific
auto-glass language everywhere.
