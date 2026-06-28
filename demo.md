# 🎨 Global Design System & Style Guide

This document serves as the single source of truth for the visual style of the entire application. It defines the core color palette, typography, components, and interaction patterns derived from our current implementation.

---

## 1. Color Palette

Use these hex codes strictly. Do not introduce new arbitrary colors unless approved.

| Role               | Hex Code  | Usage                                            |
| :----------------- | :-------- | :----------------------------------------------- |
| **Primary**        | `#008000` | Brand Core, Active States, Success, Main Buttons |
| **Secondary**      | `#E58E24` | Accents, Hovers, CTAs, Highlights, Warning       |
| **Neutral Dark**   | `#1F2937` | Headings, Main Text (High Contrast)              |
| **Neutral Medium** | `#4B5563` | Body Paragraphs, Standard Links                  |
| **Neutral Light**  | `#6B7280` | Subtitles, Placeholders, Small Meta-text         |
| **Background**     | `#FFFFFF` | White Space, Card Backgrounds                    |
| **Surface Alt**    | `#F5F3FF` | Section Backgrounds (Light Purple Tint)          |
| **Surface Alt 2**  | `#FFF7ED` | Section Backgrounds (Light Orange Tint)          |

### Gradient Standards

- **Primary Flow:** `linear-gradient(90deg, #008000 0%, #E58E24 100%)`
- **Diagonal Accent:** `linear-gradient(135deg, #008000 0%, #E58E24 100%)`
- **Tri-tone Base:** `linear-gradient(90deg, #008000 0%, #728712 50%, #E58E24 100%)`

---

## 2. Typography

All text follows the sizing hierarchy below. Ensure font-weight adjustments match the specified levels.

| Element           | Class Name Suggestion  | Size          | Weight | Line Height | Color     | Notes                           |
| :---------------- | :--------------------- | :------------ | :----- | :---------- | :-------- | :------------------------------ |
| **Page Title**    | `h1`, `.title-main`    | `24px - 32px` | 700    | 1.2         | `#1F2937` | Bold, Centered usually          |
| **Section Title** | `h2`, `.section-title` | `16px`        | 700    | Normal      | `#1F2937` | UPPERCASE, Letter-spacing 1.2px |
| **Card Header**   | `h3`, `.card-title`    | `18px`        | 600    | 1.4         | `#1F2937` | Semi-bold                       |
| **Body Text**     | `p`, `.text-body`      | `14px`        | 400    | 1.6 - 1.8   | `#4B5563` | Readable paragraph text         |
| **Subtitle**      | `.subtitle`            | `13px`        | 400    | 1.4         | `#6B7280` | Used under titles or lists      |
| **Small Text**    | `.small-text`          | `12px`        | 400    | 1.4         | `#6B7280` | Captions, disclaimers           |
| **White Text**    | `.text-white`          | Varied        | 400+   | Varied      | `#FFFFFF` | Always use on dark backgrounds  |

---

## 3. Component Library

### A. Buttons & Actions

Buttons utilize the gradient flow for visual consistency.

| Type          | Background            | Text Color | Hover Effect                                        | Border Radius           |
| :------------ | :-------------------- | :--------- | :-------------------------------------------------- | :---------------------- |
| **Primary**   | `#008000`             | `#FFFFFF`  | Change to Gradient (`#008000` → `#E58E24`) + Shadow | `25px` (Pill) or `10px` |
| **Secondary** | Transparent / Outline | `#E58E24`  | Fill `#E58E24`, Text `#FFFFFF`                      | `25px` (Pill)           |
| **Gradient**  | `135deg Green→Orange` | `#FFFFFF`  | Scale down slightly (`0.95`)                        | `50%` (Circular)        |
| **Link**      | None                  | `#4B5563`  | Color `#E58E24` + Underline                         | None                    |

**CSS Snippet for Primary Button:**

```css
.btn-primary {
    background: linear-gradient(135deg, #008000 0%, #e58e24 100%);
    color: white;
    padding: 10px 24px;
    border-radius: 50px;
    transition: all 0.3s ease;
}
.btn-primary:hover {
    box-shadow: 0 4px 15px rgba(0, 128, 0, 0.4);
    transform: translateY(-2px);
}
```
