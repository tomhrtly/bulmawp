## BulmaWP

A free WordPress starter theme based on the Bulma CSS framework.

### Install

* Clone the repo inside your WordPress installation (/wp-content/themes/my-theme/).
* Run `npm install' on the command line.
* Go to to Appearance > Themes within your WordPress dashboard.
* Click "Activate" under "BulmaWP".

### About

As a development foundation, BulmaWP comes with only a few features built into the core theme. 

First off, you can use the npm scripts within `package.json` to manage all asset files for your theme. There are also many scripts such as watching file changes, minifying assets etc. For those wanting to use Bulma out of the box, feel free to enqueue the latest Bulma version from [cdnjs](https://cdnjs.com/libraries/bulma).

Font Awesome 5 is also included as a dependency for your project, but feel free to replace this with any icon set.

Since WordPress already loads a local hosted and outdated version of jQuery onto a fresh WordPress install, we have replaced this with the latest jQuery version. The only JavaScript that is included with BulmaWP is a simple jQuery script to toggle the `is-active` class on both the `navbar-burger` and `navbar-menu` class.

Two custom walkers have been created for BulmaWP, one for the navbar markup and the other to utilise the [media object component](https://bulma.io/documentation/layout/media-object/) for the comments. Feel free to edit these walkers to add additional functionality if needed for your project.

Lastly, the Bulma components that require functionality such as the [breadcrumbs](https://bulma.io/documentation/components/breadcrumb) and [pagination](https://bulma.io/documentation/components/pagination) are found within BulmaWP, you can simply add the modifiers you need such as is-small by editing the files under `inc/`.

### Contributing

Feel free to submit a pull request with any changes that will help make this project better!