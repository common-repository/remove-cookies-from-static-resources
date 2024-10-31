=== Remove Cookies From Static Resources ===
Contributors: giuse
Donate link: buymeacoffee.com/josem
Requires at least: 4.6
Tested up to: 6.1
Stable tag: 0.0.1
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags:  cleanup, performance

It removes cookies from the requests to static resources for the modern browsers.


== Description ==

It removes cookies from the requests to static resources for modern browsers.

When the browser requests a static resource such as an image, a stylesheet, or a script, it sends to the server all the cookies, and it does it at every request.
If your page requests 10 scripts, then it sends 10 times the cookies.
As you have probably heard, a way to solve this issue is to serve the static resources from a cookies-free subdomain.
This is an excellent solution, but sometimes you have no wish to create a subdomain only for the static assets and give instructions to WordPress for fetching them from the subdomain.
Let's be honest, who does that? A few maniacs of performance.

Moreover, why isn't the browser that doesn't send its cookies to the server?
This is exactly what Remove Cookies From Static Resources does. It instructs the browser to don't send its cookies when it requests static resources.
But it can do it only with a modern browser that supports the crossorigin attribute.
The plugin simply adds crossorigin="anonymous" to all the requested scripts, links, and images. Nothing else.
This plugin will not work for old browsers. It will also not work for all those resources that are added with JavaScript, or CSS.

This plugin has no settings. No additional HTTP requests, no additional database queries. It consumes practically zero.

You should see an improvement in performance if It improves the performance if yor website requests many HTTP requests due to static resources and it writes many data to the browser through the cookies.
In all other cases you don't need this plugin, as you would not need to serve static resources from a cookies-free domain.
Removing cookies from static resources is not always the performance saver that some people think. This is totally not true in many cases.
In most cases the cookies aren't the cause of bad peformance, but the resources itselves. In those cases, it would be more effective totally removing the resources that you don't need everywhere with <a href="https://wordpress.org/plugins/freesoul-deactivate-plugins/">Freesoul Deactivate Plugins</a>.

Of course, removing cookies from static resources improves also the privacy of your visitors.


== How to remove cookies from static resources ==
* Install Remove Cookies From Static Resources
* Done!

== How to understand if I really need to remove cookies form static resources ==
* Go to your website
* Right-click => Ispect => Console => write document.cookie.length and press enter
* If you see a number higher than 5000 you probably need this plugin to save bandwidth due to big data transfers through the cookies. For lower numbers you will probably not need this plugin.

== Does removing cookies from static resources always improve the performance? ==
Absolutely not! It improves the performance only if yor website requests many HTTP requests due to static resources and it writes many data to the browser through the cookies.


== Limits ==
* This plugin doesn't work for old browsers that don't support the crossorigin attribute
* This plugin doesn't work for all those resources that are added with JavaScript or CSS, and probably it will never work in those cases, neither with future versions of the plugin.

== Changelog ==

= 0.0.1 =
*Initial release