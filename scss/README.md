# **** ENGLISH ****

# SCSS Project Structure

This project is organized using the 7-1 methodology to efficiently manage SCSS files and maintain clean, modular code. Below is the structure and purpose of each SCSS directory and file within the project.

## Folder Structure

- **abstracts/**: This contains global mixins and variables. These files don't generate CSS directly but hold reusable SCSS pieces.
  - `-mixins`: Contains mixins used across the project.
    - `_mixins.scss`: General mixins.
    - `_mixins-effects.scss`: Specific mixins for effects.
  - `-variables`: Global variables for colors, typography, layout, etc.
    - `_colors.scss`: Project's color palette.
    - `_fonts.scss`: Fonts used throughout the project.
    - `_layout.scss`: Layout-related variables (spacing, grid, etc.).
    - `_tables.scss`: Variables related to table styling.

- **base/**: Basic styles applied globally, such as resets, typography, and generic HTML elements.
  - `_resets.scss`: CSS reset to normalize styles across browsers.
  - `_fields.scss`: Styles for form fields.
  - `_fonts.scss`: Typography styles.
  - `_font-face.scss`: `@font-face` definitions for external fonts.
  - `_effects.scss`: Basic effects.
  - `_tables.scss`: Base styles for tables.

- **components/**: Reusable components that can be used throughout the site.
  - `_accordions.scss`: Styles for accordion components.
  - `_animations.scss`: Styles for animations.
  - `_grid-layout.scss`: Grid layout definitions.
  - `_grid-posts-col.scss`: Styles for post grids in column format.
  - `_grid-posts-full.scss`: Styles for post grids in full width.
  - `_modals.scss`: Styles for modals.
  - `_see-more.scss`: Styles for "see more" buttons or links.
  
  **components/nav/**: Navigation components.
  - `_nav-main.scss`: Main navigation styles.
  - `_nav-footer.scss`: Footer navigation styles.
  - `_nav-float.scss`: Floating navigation styles.
  - `_nav-mobile.scss`: Mobile navigation styles.
  - `_nav-megamenu.scss`: Mega menu styles.
  - `_links.scss`: Styles for links.
  - `_buttons.scss`: Button styles.
  - `_pagination.scss`: Pagination styles.
  - `_social.scss`: Styles for social media links.

- **pages/**: Page-specific styles.
  - `_pages.scss`: General styles for all pages.
  - `_pages-archives.scss`: Styles for archive pages.
  - `_pages-singles.scss`: Styles for single post pages.
  - `_front-page.scss`: Styles specific to the front page.

- **responsive/**: Media queries for responsive design.
  - `_media-queries.scss`: Breakpoints and responsive rules.

- **vendors/**: Third-party styles or external libraries that can be modified.
  - `_plugins.scss`: General plugin styles.
  - `_woocommerce.scss`: Custom WooCommerce styles (optional).

- **wp-core/**: Styles related to WordPress components.
  - `_gutenberg.scss`: Styles for Gutenberg blocks.
  - `_media.scss`: Styles for media management.
  - `_search.scss`: Styles for the search bar.
  - `_login.scss`: Styles for the login page.
  - `_header.scss`: Header styles.
  - `_sidebar.scss`: Sidebar styles.
  - `_footer.scss`: Footer styles.

## How to Use

To compile the SCSS files, make sure you have a build tool in place (such as Sass, Koala, or any other tool).

1. Ensure your environment is set up correctly.
2. The SCSS files are organized modularly to maintain clean, scalable code.
3. `main.scss` imports all necessary SCSS files to generate the final CSS.

## Breakpoints

Responsive breakpoints are defined in `responsive/_media-queries.scss`. You can adjust them based on your needs:

```scss
// Example breakpoints
@media (max-width: 1200px) { ... }
@media (max-width: 992px) { ... }
@media (max-width: 768px) { ... }
@media (max-width: 576px) { ... }
```
________________________________________________________________________________________

# **** ENGLISH ****

# SCSS Estructura del proyecto

Este proyecto está organizado usando la metodología 7-1 para gestionar de manera eficiente los archivos SCSS y mantener un código limpio y modular. A continuación se presenta la estructura y el propósito de cada directorio y archivo SCSS dentro del proyecto.

## Estructura de carpetas

- **abstracts/**: Aquí se definen los mixins y variables globales. Estos archivos no generan CSS directamente, pero contienen las piezas reutilizables de código SCSS.
  - `-mixins`: Contiene los mixins utilizados en todo el proyecto.
    - `_mixins.scss`: Mixins generales.
    - `_mixins-effects.scss`: Mixins específicos para efectos.
  - `-variables`: Variables globales para colores, tipografías, layout, etc.
    - `_colors.scss`: Paleta de colores del tema.
    - `_fonts.scss`: Tipografías usadas en el proyecto.
    - `_layout.scss`: Variables relacionadas con el layout (espaciado, grid, etc.).
    - `_tables.scss`: Variables relacionadas con la tabla.

- **base/**: Estilos base que se aplican en toda la web, como resets, tipografías y elementos HTML generales.
  - `_resets.scss`: Reset CSS para normalizar los estilos entre navegadores.
  - `_fields.scss`: Estilos para campos de formulario.
  - `_fonts.scss`: Estilos de fuentes.
  - `_font-face.scss`: Definiciones de `@font-face` para cargar fuentes externas.
  - `_effects.scss`: Efectos básicos.
  - `_tables.scss`: Estilos base para tablas.

- **components/**: Componentes reutilizables que se pueden usar en varias partes del sitio.
  - `_accordions.scss`: Estilos para los componentes de acordeón.
  - `_animations.scss`: Estilos para animaciones.
  - `_grid-layout.scss`: Definición de layout en grid.
  - `_grid-posts-col.scss`: Estilos para posts en formato columna.
  - `_grid-posts-full.scss`: Estilos para posts en formato completo.
  - `_modals.scss`: Estilos para los modales.
  - `_see-more.scss`: Estilos para botones o enlaces "ver más".
  
  **components/nav/**: Componentes de navegación.
  - `_nav-main.scss`: Navegación principal.
  - `_nav-footer.scss`: Navegación en el pie de página.
  - `_nav-float.scss`: Navegación flotante.
  - `_nav-mobile.scss`: Navegación para dispositivos móviles.
  - `_nav-megamenu.scss`: Estilos para mega menú.
  - `_links.scss`: Estilos para enlaces.
  - `_buttons.scss`: Estilos para botones.
  - `_pagination.scss`: Estilos de paginación.
  - `_social.scss`: Estilos para los enlaces a redes sociales.

- **pages/**: Estilos específicos para páginas.
  - `_pages.scss`: Estilos generales para todas las páginas.
  - `_pages-archives.scss`: Estilos para las páginas de archivo.
  - `_pages-singles.scss`: Estilos para páginas individuales de posts.
  - `_front-page.scss`: Estilos específicos para la página principal.

- **responsive/**: Media queries para estilos responsivos.
  - `_media-queries.scss`: Definiciones para diferentes breakpoints.

- **vendors/**: Estilos de terceros o librerías externas que pueden ser modificados.
  - `_plugins.scss`: Estilos para plugins generales.
  - `_woocommerce.scss`: Estilos personalizados para WooCommerce (opcional).

- **wp-core/**: Estilos relacionados con componentes de WordPress.
  - `_gutenberg.scss`: Estilos para bloques de Gutenberg.
  - `_media.scss`: Estilos para la gestión de medios.
  - `_search.scss`: Estilos para la barra de búsqueda.
  - `_login.scss`: Estilos para la página de login.
  - `_header.scss`: Estilos para el header.
  - `_sidebar.scss`: Estilos para la barra lateral.
  - `_footer.scss`: Estilos para el footer.

## Cómo usar

Para compilar los archivos SCSS, asegúrate de tener una herramienta que gestione la compilación (como Sass, Koala o cualquier otra).

1. Asegúrate de que tu entorno esté configurado correctamente.
2. Los archivos SCSS están organizados de manera modular para facilitar el mantenimiento.
3. `main.scss` importa todos los demás archivos SCSS necesarios para generar el CSS final.

## Breakpoints

Los puntos de ruptura responsivos están definidos en `responsive/_media-queries.scss`. Puedes ajustarlos según tus necesidades:

```scss
// Ejemplo de breakpoints
@media (max-width: 1200px) { ... }
@media (max-width: 992px) { ... }
@media (max-width: 768px) { ... }
@media (max-width: 576px) { ... }
