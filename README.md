# Grav Random Quote Plugin

The **randomquote plugin** for [Grav](http://github.com/getgrav/grav) selects a random quote from the configured collection and displays it:

![](assets/screenshot.png)

# Installation

Copy contents into `user/plugins/randomquote/`

# Configuration

Simply copy the `user/plugins/randomquote/randomquote.yaml` into `user/config/plugins/randomquote.yaml` and make your modifications. 

If you enable `built_in_css`, you can also define/change the style the quotes in `user/plugins/randomquote/templates/partials/randomquote.html.twig` and `user/plugins/randomquote/assets/randomquote.css`

## Usage

### Adding Quotes

Quotes can be added on the [Grav Admin Panel](https://github.com/getgrav/grav-plugin-admin) or directly to `randomquote.yaml`:

* **quote-text**: Technology is a word that describes something that doesn’t work yet.
* **quote-name**: Douglas Adams

### Inserting Random Quote Into Page

This plugin exports the `randomquote.text` and `randomquote.name` Twig variables that can be used on any page:

`"{{ randomquote.text }}" said {{ randomquote.name }}.`

or you can include a complete quote box in your templates:

`{% include 'partials/randomquote.html.twig' %}`

The latter option uses the pre-configured `user/plugins/randomquote/templates/partials/randomquote.html.twig` and `user/plugins/randomquote/assets/randomquote.css` style.

# Acknowledgements

This plugin was inspired by the [Fortune](https://github.com/Perlkonig/grav-plugin-fortune) plugin.