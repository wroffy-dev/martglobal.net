# MART Global — Website Redesign (Client Demo)

Demo build of the redesigned **MART Global Management Solutions LLP** website: homepage, header (mega menus + mobile nav), footer, and the full services section.

> **Demo scope:** no database. All content lives in `data/content.php`, which is structured exactly like the planned MySQL tables, so the CMS/admin panel can be added later without changing templates.

## Pages

| URL | File |
|---|---|
| `/` | `index.php` — Hero, How We Can Help, Focus Areas, Landmark Projects, About, Impact Numbers, How Else Can We Help, Testimonials, Clients, Contact |
| `/corporate`, `/social` | `category.php` |
| `/corporate/{slug}`, `/social/{slug}` | `service.php` — 8 service pages with cross-category "How Else Can We Help?" |

Service pages: `research-and-strategy`, `business-model-innovation`, `strategic-activation`, `rural-immersion-program` (Corporate) and `large-scale-program-implementation`, `project-management-advisory`, `csr-solutions`, `market-linkages` (Social).

## Run locally

```bash
php -S localhost:8000 router.php
```

On Apache (cPanel/XAMPP), upload as-is — `.htaccess` handles clean URLs. Works at a domain root or in a sub-folder.

## Structure

```
config/config.php          Site info (phone, email, address, social links)
data/content.php           Categories, services, relations, focus areas, projects, testimonials, clients, stats
includes/functions.php     Data helpers (swap for PDO queries later) + icon set
includes/header.php        Sticky header, SEO/OG tags, mega menus, mobile nav
includes/footer.php
includes/components/       mega-menu, service-card, project-card, testimonial-card,
                           contact-form, focus-areas, how-else
assets/css/style.css       Design system (Navy #063563 + Yellow #FFE21C, Inter)
assets/js/main.js          Mega menu, mobile nav, focus-area tabs, project filter,
                           counters, testimonial slider, form validation
```

## Cross-category relationships

Each service has `related_services` (many-to-many, usually the other category), `related_projects` and `focus_areas`. Each focus area lists services from **both** categories. These map 1:1 to the future tables `service_relations`, `service_projects` and `service_focus_areas`.

## Before going live — replace placeholders

- **Logo:** `includes/logo.php` is a placeholder wordmark — swap in the official logo.
- **Photography:** remote placeholder images (Unsplash) — replace with MART's own photos in `assets/images/` (WebP recommended). Every image area has a navy fallback.
- **Testimonials:** placeholder quotes — replace with approved client testimonials.
- **Client logos:** shown as text wordmarks — replace with approved logo files.
- **Project impact metrics and stats:** verify figures with MART.
- **Forms:** validated client-side only in this demo; no submissions are sent or stored.
