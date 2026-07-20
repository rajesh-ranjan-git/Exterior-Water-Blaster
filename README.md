# Exterior-Water-Blaster

Welcome to Exterior-Water-Blaster! This is a static multi-page business site built with HTML, CSS, and Bootstrap for an exterior water blasting/washing company, including a working PHP contact form.

## Live URL : https://exterior-water-blaster.netlify.app

```bash
https://exterior-water-blaster.netlify.app
```

## Table of Contents

- [Project Overview](#project-overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Folder Structure](#folder-structure)
- [Installation Guide](#installation-guide)
- [Usage Instructions](#usage-instructions)
- [Author](#author)

## Project Overview

Exterior-Water-Blaster is a static marketing site for an exterior washing/water blasting company. It includes a home page and a contact page, with a PHP-based mail handler for processing contact form submissions.

## Features

- **Multi-Page Layout:** Home (`index.html`) and contact (`contact.html`) pages.
- **Contact Form Backend:** `mailform.php` / `action.php` handle contact form submissions server-side.
- **Bootstrap Components:** Responsive grid and UI components from Bootstrap.
- **Icon Support:** Font Awesome icons used throughout the site.

## Tech Stack

- **Frontend:** HTML5, CSS3, Bootstrap
- **Backend:** PHP (contact form processing)
- **Icons:** Font Awesome

## Folder Structure

```bash
Exterior-Water-Blaster/
├── css/              # Stylesheets (Bootstrap + custom)
├── font-awesome/      # Font Awesome icon library
├── js/                # JavaScript used by Bootstrap/UI components
├── media/             # Media assets used across the site
├── index.html         # Home page markup
├── contact.html        # Contact page markup
├── mailform.php        # PHP handler for the contact form
├── action.php          # PHP form action endpoint
└── style.css          # Custom page styling
```

## Installation Guide

### Prerequisites

- A modern web browser
- A PHP-capable local server (e.g. PHP's built-in server) to exercise the contact form

### Steps

1. Clone the repository:

   ```bash
   git clone https://github.com/rajesh-ranjan-git/Exterior-Water-Blaster.git
   cd Exterior-Water-Blaster
   ```

2. To just view the pages, open `index.html` directly in your browser.

3. To test the contact form, serve the folder with PHP's built-in server:

   ```bash
   php -S localhost:8000
   ```

## Usage Instructions

1. Open `index.html` in your browser to view the home page.
2. Navigate to the contact page and submit the form to trigger the PHP mail handler.

## Author

- **Rajesh Ranjan** — [GitHub @rajesh-ranjan-git](https://github.com/rajesh-ranjan-git)

---
