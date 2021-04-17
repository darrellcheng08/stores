const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// const VueAutoRoutingPlugin = require("./vue.routing");

mix.webpackConfig({
  output: {
    filename: "[name].js",
    chunkFilename: "js/chunks/[name].js",
  },
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "resources"),
      "@js": path.resolve(__dirname, "resources/js"),
      "@vue": path.resolve(__dirname, "resources/vue"),
      "@style": path.resolve(__dirname, "resources/sass"),
      "@auth": path.resolve(__dirname, "resources/vue/auth"),
      "@plugin": path.resolve(__dirname, "resources/js/plugin"),
      "@dashboard": path.resolve(__dirname, "resources/vue/dashboard"),
      "@components": path.resolve(__dirname, "resources/vue/components"),
      // "@routes": path.resolve(__dirname, "resources/js/router"),
    },
  },
  // plugins: [
  //   new VueAutoRoutingPlugin({
  //     pages: "resources/vue/dashboard/",
  //     importPrefix: "@dashboard/",
  //     output: "resources/js/router/dashboard/routes.js",
  //   }),
  //   new VueAutoRoutingPlugin({
  //     pages: "resources/vue/auth/",
  //     importPrefix: "@auth/",
  //     output: "resources/js/router/auth/routes.js",
  //   }),
  // ],
});

mix
  .js("resources/js/login.js", "public/js")
  .js("resources/js/dashboard.js", "public/js")
  .sass("resources/sass/app.scss", "public/css")
  .copyDirectory("resources/font", "public/font");