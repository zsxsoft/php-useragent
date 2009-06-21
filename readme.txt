=== WP-UserAgent ===
Contributors: kyleabaker
Donate Link: http://kyleabaker.com/goodies/coding/wp-useragent/
Tags: useragent, user-agent, user agent, web, browser, web browser, operating system, os
Requires at least: 2.0
Tested up to: 2.8
Stable tag: 0.8.5

== Description ==

<em>WP-UserAgent</em> is a simple plugin that allows you to display details about a computer's <a href="http://en.wikipedia.org/wiki/Operating_system">operating system</a> or <a href="http://en.wikipedia.org/wiki/Web_browser">web browser</a> that your visitors comment from.

It uses the comment-&gt;agent property to access the <a href="http://en.wikipedia.org/wiki/User_agent">User-Agent string</a>. Through a series of regular expresions, this plugin is able to detect the operating system and browser which can be integrated in comments or placed in custom places through your template(s).

I’m adding new web browsers and operating systems frequently, as well as updating and optimizing the source code. Your feedback is very important, new features have been added by request, so if there’s something you would like to see in <em>WP-UserAgent</em>, <a href="http://kyleabaker.com/goodies/coding/wp-useragent/">leave a comment</a>, and I’ll see what I can do.

<em>WP-UserAgent</em> was written with Geany - <a href="http://www.geany.org/">http://www.geany.org/</a><br />
Images created with The Gimp - <a href="http://www.gimp.org/">http://www.gimp.org/</a>

== Installation ==
<ol>
<li><strong>Upload</strong> the "wp-useragent" folder to /wp-contents/plugins/</li>
<li><strong>Login</strong> to your WordPress Admin menu, go to Plugins, and activate it.</li>
<li>In your WordPress Admin menu, you will find a new menu under <strong>Settings</strong> called WP-UserAgent. There you can choose the displayed icons size, and select where to display the plugin. There are three options for displaying the plugin:<br /><br />
	<ul>
		<li>Before the comment text. User's WebBrowser and OS will be displayed before comment text.</li>
		<li>After the comment text.User's WebBrowser and OS will be displayed after comment text.</li>
		<li>Custom (Advanced). You can specify the location using the useragent_output_custom() function inside the comments loop in your template (Generally in comments.php).<br /><br />
		
		Example:<br />
		&lt;?php foreach ($comments as $comment) : ?&gt;<br />
		<cite>&lt;?php comment_author_link() ?&gt;</cite> &lt;?php useragent_output_custom(); ?&gt; says:<br />
		&lt;?php comment_text() ?&gt;<br /><br />
		<em>CAUTION</em>: If you select "Custom" and don't use &lt;?php useragent_output_custom(); ?&gt; in your template, you won't get the information displayed.</li>
	</ul>
</ol>
Other options include the text to use when displaying the user's web browser and operating system as well as whether or not to show the full User-Agent string.

== Frequently Asked Questions ==
None so far. ;)

If you have any questions, please don't hesitate to ask me! The easiest way to ask me a question, comment or suggest something is to post it in the comments on the <a href="http://kyleabaker.com/goodies/coding/wp-useragent/">plugin homepage</a>.

== Screenshots ==
Screenshots are available at the plugin <a href="http://kyleabaker.com/goodies/coding/wp-useragent/">home page</a>.

== Features ==
<ul>
	<li>Detects most web browsers and popular operative systems (if you find one missing, please <a href="http://kyleabaker.com/goodies/coding/wp-useragent/">let me know</a>!)</li>
	<li>Shows web browser and operating system icons, names, and a link to their homepages (this will be customizable in future versions).</li>
	<li>Shows web browser and operating system in the Admin comments management page (unless you're using “custom” option).</li>
	<li>Customizable, has its own Options Page where you can change the size of the web browser and operating system icons, where you want it to be displayed, and a few other options.</li>
	<li>Updated frequently to further extend web browser and operating system detection as well as source code improvements.</li>
	<li>Published under GPLv3</li>
</ul>

Some of you may compare this to another well-known plugin named browsersniff. UserAgent-Spy is a heavily modified and improved version of UserAgent-Spy, with several improvements over browsersniff also:
<ul>
	<li>Easy standard installation, just upload to wp-plugins and activate it.</li>
	<li>Customizable options.</li>
	<li>No basic knowledge of PHP or editing WordPress templates required.</li>
	<li>Published under GPLv3.</li>
</ul>

== Changelog ==
v0.8.5
<ul>
	<li>Added detection for Sabayon Linux (props: Ian "Thev00d00" Whyman)</li>
	<li>Updated readme.txt to take advantage of the <a href="http://weblogtoolscollection.com/archives/2009/06/20/attention-all-plugin-authors/">new changelog tab</a>.</li>
</ul>

v0.8.4
<ul>
	<li>Links: rel=&quot;nofollow&quot; is applied to all web browser and operating system links. (props: Alter Ego Blog)</li>
	<li>Added detection for Arch Linux (props: Terry Wang)</li>
	<li>Added detection for KMail (Kontact Mail) since it has a unique and detectable user agent string.</li>
	<li>Icon change: Macintosh (generic/old Mac) uses multi-color Apple icon, Mac OS X now uses gray Apple icon.</li>
</ul>

v0.8.3
<ul>
	<li>Adjusted readme.txt to appear better on the plugin page and pass validation from: http://wordpress.org/extend/plugins/about/validator/</li>
	<li>Initial submission to the the WP-UserAgent SVN Plugin Repository</li>
</ul>

v0.8.2
<ul>
	<li>Added detection for Windows 3.11, Windows NT 3.11, Windows NT 4.0 and fallback check for Windows Me.</li>
	<li>Added detection for Nintendo Wii, Playstation 3 and Playstation Portable.</li>
	<li>Added detection for Thunderbird (the e-mail client) since it has a unique and detectable user agent string.</li>
	<li>Debian is now shown as Debian GNU/Linux (props: Terry Wang)</li>
</ul>

v0.8.1
<ul>
	<li>Added missing ./img/16/net/arora.png file.</li>
	<li>Corrected typo of Maxthon 16px and 24px icons. maxton.png -> maxthon.png</li>
	<li>Added a quick fix for detecting and trimming Maxthon when no version is provided.</li>
</ul>

v0.8
<ul>
	<li>Added a "Settings" quick link to the plugin listing in the plugins page.</li>
	<li>Worked on description wording for plugin in plugins page.</li>
	<li>Added a "Comment Preview" section to the WP-UserAgent settings page that displays an example of the options that you choose in real time.</li>
</ul>

v0.7
<ul>
	<li>All images were optimized to reduce file sizes (PNGGauntlet) which reduced the overall package size from 308.4kb to 288.1kb!</li>
	<li>Also, WP-UserAgent has now been cleaned and extended far enough to reach the 1.0 milestone soon. I will be checking for possible problems and cleanups, but feel free to point them out to me at any time!</li>
</ul>

v0.6.2
<ul>
	<li>90 total web browsers detectable.</li>
	<li>35 total operating systems detectable.</li>
	<li>Code cleanup (removed extra whitespace to reduce size a little) and simplification (replaced switch with if..else).</li>
	<li>Most of the remaining icons for web browsers have been added.</li>
	<li>Linux Mint support added.</li>
	<li>A list of detectable operating systems that now also detect versions when available: CentOS, Edubuntu, Fedora, iPhone OS, Kubuntu, Mac, Ubuntu, Windows.</li>
	<li>Also, generic Linux will now specify if it is detected to be x86_64 (64-bit or x64). Others may be included later.</li>
	<li>Appearance adjustments made (settings icon by title and styling of "Save Changes" button) to WP-UserAgent Options page as well as adding a Help section with Author and Plugin Homepage to bottom of Options page for convenience.</li>
	<li>Known Issues:</li>
	<li>Some web browser icons have not been found/added as of yet. Those include: Chimera, KMLite, retawq, TeaShark, WorldWideWeb.</li>
	<li>Output location "custom" is still highly untested.</li>
	<li>*Note: Please suggest web browsers and/or operating systems that I am missing so I can include them to be detected.</li>
	<li>Also, WP-UserAgent has now been cleaned and extended far enough to reach the 1.0 milestone soon. I will be checking for possible problems and cleanups, but feel free to point them out to me at any time!</li>
</ul>

v0.6.1
<ul>
	<li>90 total web browsers detectable.</li>
	<li>34 total operating systems detectable.</li>
	<li>Implemented a fix for Opera's new versioning system, which started in version 10 snapshots, to correctly display the browser version.</li>
	<li>Cleaned code more and removed unnecessary global variable references.</li>
	<li>Fixed detection of CentOS.</li>
	<li>Debian and Ubuntu based distros (that are supported) now fetch version numbers also. Generic GNU/Linux now also specifies x64 when detected. Fedora version fetching is in the works as well as Mac OS X. Maybe these will be added in the next release. Mac versions are a little tricky since it seems they are optionally provided and formated differently per browser.I need to add fall back checks in case an odd UA string is created without version numbers for these so they are still detected. And parse pingbacks such as "XML-RPC for PHP 2.2" in the future as something other than unknown.</li>
	<li>Known Issue: Some web browser icons have not been found/added as of yet. Those include: Amiga Voyager, Cheshire, Chimera, Elinks, IBrowse, Kapiko, KMLite, Minimo, Mosaic, MultiZilla, retawq, TeaShark, WorldWideWeb. Several of these listed browsers never had an icon to begin with, however, all listed will use the "unknown" icon (which is generic).Output location "custom" is still highly untested.</li>
	<li>*Note: Please suggest web browsers and/or operating systems that I am missing so I can include them to be detected.</li>
</ul>

v0.6
<ul>
	<li>Added over 40 more web browsers that are detected.</li>
	<li>Added a couple more operating systems that are detected</li>
	<li>Fixed a bug in previous versions that caused errors to occur when users who were not logged in attempted to post a comment.</li>
	<li>Cleaned code and simplified several naming systems used.</li>
	<li>Added option to select DocType. Options include html and xhtml (strict for both).</li>
	<li>Known Issue: Most of the newly detected web browsers are still missing icons. I will try to add them as soon as I possibly can.</li>
	<li>*Note: The original author seems to like the additions that I made since I started extending this plugin and has incorporated many of the changes that I made into the other plugin.</li>
</ul>

0.5.3.4
<ul>
	<li>Added Windows 7 and Windows 7 x64 to detectable OS versions.</li>
</ul>

0.5.3.3
<ul>
	<li>Added Pre-2.6 compatibility for determining and defining Plugin and Content Directories constants. WordPress documentation here: http://codex.wordpress.org/Determining_Plugin_and_Content_Directories</li>
	<li>Replaced sloppy code for image paths with more dynamic code.</li>
	<li>Renamed the function "useragent_spy_custom()" in "wp-useragent.php" to "useragent_output_custom()" to make it more generic and move away from the UserAgent-Spy naming system.</li>
	<li>Removed text attributes that were improperly added to option tags in "wp-useragent-options.php" to correct html validation errors.</li>
	<li>Adjusted the "UserAgent Output Location" section in "wp-useragent-options.php" and added the options to an ordered list, adjusting the use of the "small" tag.</li>
	<li>"wp-useragent-options.php" is now 100% XHTML 1.0 Transitional standards compliant. This is the default DTD used in the WordPress administration panel. I will eventually work towards compliance for XHTML 1.0 Strict.</li>
	<li>Fixed regex for OLPC so it's case insensitive.</li>
	<li>Removed "target" attribute from browser links to improve XHTML 1.0 Strict compliance.</li>
	<li>Gave WP-UserAgent settings page a header title to make the location more recognizable.</li>
	<li>Cleaned up appearance of "wp-useragent-options.php" settings page by categorizing the content.</li>
</ul>

0.5.3.2
<ul>
	<li>Updated string names: $size =&gt; $uasize, $location =&gt;$ualocation.</li>
	<li>Updated Google Chrome logo images with logo images added to UserAgent-Spy 0.5.3.2 (Images already added in my version of 0.5.2, but replaced for consistency).</li>
</ul>

0.5.2
<ul>
	<li>Official release of WP-UserAgent</li>
</ul>

0.5.1
<ul>
	<li>Added Google Chrome (the day of its release!)</li>
</ul>

0.5
<ul>
	<li>Option to show complete useragent string.</li>
	<li>Went back to useragent_spy_custom() for custom display.</li>
	<li>Several code fixes (W3C valid XHTML, more order, etc).</li>
	<li>Saved settings are displayed correctly on the settings page.</li>
	<li>Added option to display icons only, with no text or link.</li>
	<li>Fixed bugs:</li>
	<li>Epiphany, when built against WebKit would display Safari.</li>
	<li>Major bug which would show ua-spy in your comment management page, instead of comment text when using custom.</li>
</ul>

0.4.2
<ul>
	<li>Browser added: Lynx, Links.</li>
	<li>Fixed bug where the comments would show without filters.</li>
	<li>Changed Konqueror icon for new 4.0 version.</li>
</ul>

0.4.1
<ul>
	<li>OS added: OLPC XO, SuSE.</li>
	<li>Browser added: W3M, Lobo, Amaya, Maxthon, Camino, NetSurf, Minefield, IceApe, SeaMonkey.</li>
	<li>Fixed some code (includes a bug where OLPC was detected for certain os's).</li>
</ul>

0.4
<ul>
	<li>Made "browsing with" and "on" words in "Browsing with browser on OS" customizable in the Options page.</li>
	<li>Allow logged in user to see the full user-agent string (easier debugging).</li>
	<li>Fixed string for unidentified browser.</li>
	<li>OS's added: FreeBSD, OpenBSD, Solaris.</li>
</ul>

0.3.1
<ul>
	<li>Added &lt;p&gt; tags for correct formatting</li>
	<li>Added if in options page so that current values are selected on load.</li>
</ul>

0.3
<ul>
	<li>More web-browsers: Epiphany, Galeon, Opera, IE.</li>
	<li>O.S.'s: Xubuntu, Kubuntu, Ubuntu, Slackware.</li>
	<li>Added option to choose displaying useragent_spy before or after the comment text, or using useragent_spy() function in template.</li>
</ul>

0.2
<ul>
	<li>Detects Firefox, Epiphany.</li>
	<li>Detects Debian, Fedora, Gentoo</li>
	<li>Options menu under Settings Panel, allows 16x16 or 24x24 pixel images for icon size.</li>
	<li>Integrates into Wordpress before comments text.</li>
</ul>

0.1
<ul>
	<li>Detects Mozilla, IceWeasel, IceCat, Arora, Safari, Konqueror.</li>
	<li>Detects Windows, GNU/Linux, iPhone and MacOS</li>
</ul>

TO-DO:
<ul>
	<li>Allow users to modify links for each web browser and operating system.</li>
	<li>New web browsers and operating systems are always welcome.</li>
</ul>
