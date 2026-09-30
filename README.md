# Resume Page

The code behind the resume dashboard at bolu.info/resume/.

I wanted my resume to feel like a live system readout instead of a static PDF, so I built it as a full-screen HUD: a CV.EXE header with a live clock, a biography card with my typing loop video, skill bars, an experience timeline, education, certifications with company logos, a tools grid with real product logos, an activity feed, and a fixed status bar along the bottom.

## How it works

It is a single PHP snippet (Code Snippets plugin) scoped to one WordPress page. On `template_redirect` it takes over the request completely and exits before the theme loads, so nothing from the theme leaks into the layout. Everything is one self-contained file: HTML, CSS, and JavaScript.

The layout takes cues from terminal and HUD style dashboards, rebuilt in white and green with the Martian Mono typeface. All the content is mine: my roles, my education, my certifications, my projects.

Details worth knowing:

- The biography card reuses my typing loop video (autoplay, muted, loop).
- Skill levels render as 18-segment bars built by JavaScript.
- Certification, school, and company logos are small images inserted next to each row by short scripts at the end of the file. They are hotlinked to the uploads on my own site, so the image files themselves are not in this repo.
- The tools grid uses an auto-fit layout so every tile stays visible on narrow screens.
- The page carries its own desktop site toggle that shares the `bolu_desktop` cookie with the rest of the site. The standalone version of that toggle lives in my desktop-site-toggle repo.

## Files

- `src/resume-page.php` — the whole page. Drop it into Code Snippets as a PHP snippet set to run everywhere; the snippet scopes itself to the resume page.
