=== WP-UserAgent ===
Contributors: kyleabaker
Donate Link: http://kyleabaker.com/goodies/coding/wp-useragent/
Tags: useragent, user-agent, user agent, web, browser, web browser, operating system, platform, os, mac, apple, windows, win, linux, phone
Requires at least: 2.0
Tested up to: 3.8
Stable tag: 1.0.3

== Description ==

*WP-UserAgent* is a simple plugin that allows you to display details about a computer's [operating system](http://en.wikipedia.org/wiki/Operating_system) or [web browser](http://en.wikipedia.org/wiki/Web_browser) that your visitors comment from.

It uses the comment-&gt;agent property to access the [User-Agent string](http://en.wikipedia.org/wiki/User_agent). Through a series of regular expresions, this plugin is able to detect the operating system and browser which can be integrated in comments or placed in custom places through your template(s).

I’m adding new web browsers and operating systems frequently, as well as updating and optimizing the source code. Your feedback is very important, new features have been added by request, so if there’s something you would like to see in *WP-UserAgent*, [leave a comment](http://kyleabaker.com/goodies/coding/wp-useragent/), and I’ll see what I can do.

*WP-UserAgent* was written with Geany - [http://www.geany.org/](http://www.geany.org/)
Images created with The Gimp - [http://www.gimp.org/](http://www.gimp.org/)

== Installation ==

1. **Upload** the "wp-useragent" folder to /wp-contents/plugins/
1. **Login** to your WordPress Admin menu, go to Plugins, and activate it.
1. In your WordPress Admin menu, you will find a new menu under **Settings** called WP-UserAgent. There you can choose the displayed icons size, and select where to display the plugin. There are three options for displaying the plugin:
	
	* Before the comment text. User's WebBrowser and OS will be displayed before comment text.
	* After the comment text.User's WebBrowser and OS will be displayed after comment text.
	* Custom (Advanced). You can specify the location using the useragent_output_custom() function inside the comments loop in your template (Generally in comments.php).
		
		Example:
		&lt;?php foreach ($comments as $comment) : ?&gt;
		<cite>&lt;?php comment_author_link() ?&gt;</cite> &lt;?php useragent_output_custom(); ?&gt; says:
		&lt;?php comment_text() ?&gt;
		
	*CAUTION*: If you select "Custom" and don't use &lt;?php useragent_output_custom(); ?&gt; in your template, you won't get the information displayed.

Other options include the text to use when displaying the user's web browser and operating system as well as whether or not to show the full User-Agent string.

== Frequently Asked Questions ==

None so far. ;)

If you have any questions, please don't hesitate to ask me! The easiest way to ask me a question, comment or suggest something is to post it in the comments on the [plugin homepage](http://kyleabaker.com/goodies/coding/wp-useragent/).

== Screenshots ==

Screenshots are available at the plugin [home page](http://kyleabaker.com/goodies/coding/wp-useragent/).

== Features ==

* Detects most web browsers and popular operative systems (if you find one missing, please [let me know](http://kyleabaker.com/goodies/coding/wp-useragent/)!)
* Shows web browser and operating system icons, names, and a link to their homepages (this will be customizable in future versions).
* Shows web browser and operating system in the Admin comments management page (unless you're using “custom” option).
* Customizable, has its own Options Page where you can change the size of the web browser and operating system icons, where you want it to be displayed, and a few other options.
* Updated frequently to further extend web browser and operating system detection as well as source code improvements.
* Published under GPLv3


Some of you may compare this to another well-known plugin named browsersniff. WP-UserAgent is a heavily modified and improved version of UserAgent-Spy, with several improvements over browsersniff also:

* Easy standard installation, just upload to wp-plugins and activate it.
* Customizable options.
* No basic knowledge of PHP or editing WordPress templates required.
* Published under GPLv3.


== Changelog ==

= v1.0.3 =
* Fixed detection of IE11 (props: G's)
* Fixed detection of Windows 8.1 (props: JayXon)
* Fixed detection of Opera 14 for Android and Opera 15+ for Desktop (props: Rafae)
* Fixed an issue with Ubuntu version detection.
* Added detection for Amigo, Coast, CoRom, DPlus, ONE Browser, Otter, Perk, PS4 Web Browser and Ubuntu Web Browser.
* Added detection for PlayStation 4, Ubuntu Touch (Mobile and Tablet).


= v1.0.2 =
* Fixed incorrect Rekonq browser icon.
* Added detection for Nintendo Wii U.
* Added detection for Nintendo Browser.
* Fixed missing IE10 icons (props: Ray)


= v1.0.1 =
* Added detection for D+ browser, Internet Explorer 10, Amazon Silk, QQbrowser, Yandex.Browser, Beamrise.
* Added detection for x64 version of Windows Server 2003.
* Added detection for the Playstation Vita.


= v1.0.0 =
* Added detection for Barca, SubStream, SlimBoat, zBrowser, Ryouko browsers.
* Fixed Chrome detection on Android (props: JayXon)
* Refactored code for easier maintenance.
* Release v1.0.0!!!! (w00t!)


= v0.10.15 =
* Added detection for Atomic Web Browser.
* Fixed issue where the Links browser was incorrectly detected for the UA "online link validator (http://www.dead-links.com/)" and cause a warning to appear.
* Added detection for Windows 8.
* Added detection for the Wordpress App for BlackBerry, Windows Phone, Nokia, WebOS.


= v0.10.14 =
* Added detection for Crunchbang, Mageia, Pardus and Rosa Linux (props: KZKG^Gaara)
* Fixed detection of SRWare Iron browser (props: KZKG^Gaara)


= v0.10.13 =
* Fixed detection of Windows x64 from the Chrome user agent.
* Added detection for TenFourFox, Classilla, EnigmaFox, Podkicker, Maple Browser.
* Added detection for Samsung Smart TV, Wordpress app for iPhone, Wordpress app for Android.
* Fixed Android version detection.


= v0.10.12 =
* Added detection for Alienforce Browser, Patriott, Qupzilla, Baidu Browser and ZipZap.
* Added detection for Chrome Mobile and Tizen.
* Added detection for Motorola Xoom, Galaxy Nexus.
* Added detection for Chakra Linux (props: KZKG^Gaara)


= v0.10.11 =
* Added detection for Columbus Browser, CoolNovo, Sundial, Usejump, WebRender.
* Added detection for Nova Linux and WP7 (props: jako)


= v0.10.10 =
* Fixed Opera Next detection since the ua string has changed.
* Added detection for Opera Labs, Fireweb Navigator, Kylo, Sundance, Charon, Sylera, Dorothy Browser, and Webian Shell.
* Added detection for x64 versions of Unix/Linux.
* Added detection for the Inferno operating system.
* Added detection for Nokia Browser (props: Yomi)


= v0.10.9 =
* Fixed Mac OS X version detection so its more flexible.
* Fixed icon used for Red Hat linux (props: Third Eye)


= v0.10.8 =
* Added detection for Opera Next, Android Webkit and MiniBrowser.


= v0.10.7 =
* Added detection for Kindle.
* Added detection for moonOS.


= v0.10.6 =
* Added detection for BlackHawk, Gtk+ WebCore, Tencent Traveler and Vimprobable.
* Added a quick fix for Arch Linux improperly being detected when IE users have SearchToolbar installed (since it improperly matched seARCHtoolbar).
* Added new feature to hide "Unknown" output. This is disabled by default (props: Cahya)


= v0.10.5 =
* Added detection for 360Safe Explorer, Saayaa Explorer and Sogou Explorer (props: Buzz)
* Added detection for BrowseX, Conkeror, Element Browser, Espial TV Browser, GO Browser, InternetSurfboard, SkipStone, Surf, UltraBrowser, Weltweitimnetz Browser.
* Corrected detection for Multi-Browser XP (was only Multi-Browser) and My Internet Browser.
* Added unique icons for different versions of Microsoft Internet Explorer (props: Buzz)
* Correctly escape for detection of Google Wireless Transcoder.


= v0.10.4 =
* Added missing IRIX OS images. The quality isn't great, but they're the best I could find and produce myself. Submissions are welcome.
* Adjusted Nokia Series60 browser detection so the output is less redundant (props: Yomi)
* Added detection for the Chromium web browser (props: Terry Wang)
* Added detection for the RockMelt social web browser.
* Reorganized detection for Google Chrome since so many derivatives are beginning to use it as a base and leave it in their user agent string.


= v0.10.3 =
* Corrected detection of Motorola Droid to eliminate false positives for Android devices (props: Yomi)
* Added an option to specify a prepended word for Trackbacks and Pingbacks like the current "using" option. This is blank by default (props: dani)
* Adjusted vertical alignment of icons in the settings page to properly reflect the middle alignment they use in comments.
* Replaced poor quality WordPress icon with a better looking icon.


= v0.10.2 =
* Optimized all packaged images to minimize filesizes without reducing quality. Images were reduced by approximately 50.33kb in total via PNGGauntlet. While this saves only a few extra kilobytes of bandwidth, it helps sites that are striving to perfect network performance with Page Speed for Firefox or Speed Tracer for Chrome (optimizing images).


= v0.10.1 =
* Fix version detection for Maemo Browser, TencentTraveler, NetCaptor, SiteKiosk, Tablet browser, Tjusig.
* Removed extra icons from OS folder that were supposed to be moved to devices folder (reduces plugin file size).
* Split Trackback icons out into separate trackback folder (including a copy of null.png).
* Dramatically improved performance and simplified the detect_browser_version() method using RegEx instead of substr() which reduces 18 lines of code to only 2. This means 16 less lines of code are run per comment on your site!
* Fixed error in HTC Touch Pro2 detection (Props: Yomi)
* Added detection for Dell Streak, Dell Mini 5 and generic Dell devices.
* Modified generic HTC detection regex to catch strings that also match "USCCHTC6175" and "HTC_XX_XX".
* Added detection for Mobile Safari.
* Added updated Edubuntu, Kubuntu, Lubuntu and Xubuntu icons for versions 10.04+ (the same as Ubuntu now). The updated Xubuntu icon has not been officially released yet, so the included icon may change later.
* Added detection for generic XML-RPC trackbacks.
* Cleaned several regex detectors so they all follow the same scheme/pattern now to add some consistency to the code.
* Corrected title of IceApe to Iceape.
* Updated regex for Ubuntu and other derivatives' detection to match "Ubuntu/10.10" as well as "Ubuntu 10.10" so versions are properly parsed for both.


= v0.10.0 =
* Rewrote a large portion of the code to separate Device detection from the OS detection function for easier updating and management.
* Improved mobile detection for a wider range of LG phones.
* Improved regex to merge IRIX 32/64 detection into one conditional for simplicity.
* Improved regex to merge SymbianOS and SymbOS detection into one conditional for simplicity.
* Improved regex to for Playstation 3 and Portable detection for simplicity and added generic Playstation detection.
* Improved detection for Nintendo DSi and Wii for simplicity and organization and added generic Nintendo detection.
* Added detection for BenQ-Siemens mobile devices.
* Added detection for Google Nexus One mobile devices (the Android OS was already supported).
* Added detection for HTC mobile devices: HTC Desire, HTC Touch Pro2, HTC Startrek, HTC Hero, HTC Legend, HTC Magic, HTC Touch, HTC Touch Pro (props: Yomi), HTC Polaris, HTC S710, HTC Tattoo and generics or undefined.
* Improved regex detection for a wider range of Nokia mobile devices.
* Added detection for Palm Pre and Pixi (generics were already supported).
* Added model detection to Samsung devices.
* Added model detection to SonyEricsson devices.
* Added model detection to Motorola devices: Motorola Droid, Motorola XT720, unspecified model numbers and generic Motorola devices.
* Fixed several instances of regex that were not case insensitive (to improve match success).
* Fix for IE8 Compatibility Mode detection.
* Simplified regex for Safari browser detection.
* Re-enabled fix for Maemo Browser version detection.
* Cleaned comments throughout code to simplify them and remove useless ones.
* Corrected displayed name of the Pale Moon web browser (from Palemoon).
* Removed browser version detection for TheWorld Browser since it doesn't appear to ever include it.
* Changed icon for retawq from null to a terminal icon.
* Added detection for Abolimba.
* Added detection for Amiga Aweb.
* Added detection for Blackbird.
* Added detection for Browzar.
* Added detection for Bunjalloo.
* Added detection for Comodo Dragon.
* Added detection for Demeter.
* Added detection for DocZilla.
* Added detection for Dooble.
* Added detection for Doris.
* Added detection for Edbrowse.
* Added detection for Epic Browser.
* Added detection for GlobalMojo.
* Added detection for Hv3.
* Added detection for Hydra Browser.
* Added detection for Ice Browser.
* Added detection for Kirix Strata.
* Added detection for LBrowser.
* Added detection for MicroB.
* Added detection for Multi-Browser XP.
* Added detection for My Internet Browser.
* Added detection for NetBox.
* Added detection for NetCaptor.
* Added detection for Off By One.
* Added detection for OWB.
* Added detection for Phaseout.
* Added detection for rekonq.
* Added detection for SiteKiosk.
* Added detection for Swiftweasel.
* Added detection for TheWorld Browser.
* Added detection for Tjusig.
* Added detection for TT Explorer.
* Added detection for wKiosk.
* Added detection for X-Smiles.
* Added detection for MorphOS.
* Added detection for AmigaOS.


= v0.9.11 =
* Fix a regression where the Ubuntu version stopped being printed.
* Fixed support for detecting PCLinuxOS version.
* Added detection for ChromePlus.
* Added detection for DeskBrowse.
* Added detection for iNet Browser.
* Added detection for iRider.
* Added detection for LeechCraft.
* Added detection for Madfox.
* Added detection for Palemoon.
* Added detection for Pogo.
* Added detection for Prism.
* Added detection for uZard Web.
* Added detection for uzbl.
* Added detection for Vonkeror.
* Fixed detection for Opera Mobile and version number (props: Cahya)
* Added detection of Nokia S60 devices (previously only the S60 web browser was detected).
* Added detection support for alternate SymbianOS identifiers.
* Added detection for the HTC Touch Pro2 smartphone (props: Yomi)
* Modified image vertical alignment, so the images are now more inline with the sentence.
* Added detection for libwww-perl trackbacks.
* Added detection for Peach trackbacks.
* Added detection for Python-urllib trackbacks.
* Added detection for Snoopy trackbacks.


= v0.9.10 =
* Added detection for the Tear mobile browser (props: Jake)
* Added detection for PCLinuxOS (props: dani)
* Added detection for the Mozilla Developer Preview builds.
* Moved detection of Safari further down the chain since its being used commonly as a fallback detection for several browsers.
* Consolidated Firefox BonEcho, GranParadiso, Lorentz, Namoroka, Shiretoko and future development icons into the firefoxdevpre.png icon, reducing the current count from 3 to 1, cleaning the code and removing duplicates.
* Added the new Ubuntu icon for Ubuntu 10.04+, with a fallback to the old icon for previous versions of Ubuntu.
* Made changes to reflect the new naming change for iOS on the iPad, iPhone and iPod.


= v0.9.9 =
* Added detection for Foresight Linux (props: Tomas Forsman)
* Added detection for the SRWare Iron web browser (props: dani)
* Added a workaround for using special characters in the 'Surfing' and 'on' text fields in the options page. You can now include html styling and/or quotes (props: NomikOS)
* Removed a faulty Maemo Browser detection rule.
* Added a donations link at the bottom of the settings page for those who feel generous enough to reward me for the time and effort I share. ;)


= v0.9.8 =
* Added detection for the UC Browser.
* Added detection for the Maemo Browser.
* Added detection for the UP.Link browser.
* Added detection for the Nokia S60 browser.
* Added detection for the J2ME/MIDP Device platform.
* Fixed detection of Safari browsers for detection Version or those without a version Listed.
* Fixed generic Nokia Web Browser detection.
* Fixed missing Nokia Web Browser image (props: Yomi)


= v0.9.7 =
* Fixed version detection for the Links browser (props: dani)
* Added detection for the Google Chrome Frame (props: dani)
* Added detection for the Apple iPad.
* Added detection for Typepad trackbacks.
* Added detection for Drupal trackbacks.
* Added detection for the DoCoMo web browser.
* Added detection for the Xiino web browser.
* Added detection for Xandros Linux.
* Added detection for IRIX Linux.
* Added detection for Unix.


= v0.9.6 =
* Added detection for Firefox Lorentz (with a temporary related link page until I find an official or article)
* Added detection for Flock Sulfer.
* Added detection for Google Wireless Transcoder.
* -------------(props: dani - above suggestions)
* Added trackback detection for SOAP (Simple Object Access Protocol) ex. SOAP::Lite/Perl/0.710.08
* Added settings option to enable/disable links for web browsers and platforms (with a live preview example).
* Fixed some settings page validation errors.
* Updated the settings page from the Wordpress 2.5 style to a Wordpress 2.9 style to make it feel more friendly. Major aesthetic improvement, too!


= v0.9.5 =
* Added browser version detection for BlackBerry web browsers (with a mod/hack fix).
* Added detection for the (now discontinued) Iris mobile browser.
* Updated MSIE Mobile icon.
* Added detection for the Jasmine mobile web browser from Samsung.
* Added detection for the Dolfin mobile web browser from Samsung.
* Added detection for the Teleca (Obigo derivative) mobile web browser.
* Added detection for the Java edition of the SEMC browser.
* Added detection for LG mobile devices.
* Added detection for Samsung mobile devices.
* Added detection for SonyEricsson mobile devices.
* Added two other Windows Mobile device strings.
* -------------(props: Yomi - above suggestions and code)
* Added detection for Namoroka web browser (props: Cahya).
* Modified detection for Nokia devices to include a wider range.
* Added detection for Lubuntu in anticipation of a platform specific string eventually (as other Ubuntu derivatives have done).
* Fix for UC Web browser version detection.


= v0.9.4 =
* Added detection for Novarra Vision Browser for mobile phones.
* Corrected a misspelled image filename for 24x24 seamonkey.png
* Corrected image used for Opera Mini.


= v0.9.3 =
* Added support for BlackBerry device and model detection.
* Corrected the BlackBerry browser detection to simply register as BlackBerry since the device model number doesn't have anything to do with the browser.
* Added detection for vBSEO (vBulletin).
* Added detection for Opera 10+ so the new Opera icon is used properly.
* Purged unused Mac icons.


= v0.9.2 =
* Added support for iPod detection so an iPod Touch doesn't appear as an iPhone.
* Added detection for Google Chrome OS.
* Fixed format and syntax of the readme.txt file that's included.


= v0.9.1 =
* Added a quick fix for Opera Mini detection.


= v0.9 =
* Added detection for Venenux GNU Linux and Oracle Linux.
* Added detection for Laconica and MovableType trackbacks.
* Cleaned some of the code for trackback detections.


= v0.8.9 =
* Added detection for TheWorld Browser (props: mecal)


= v0.8.8 =
* Corrected a layout bug on the Settings page with the Comment Preview section.
* Added option to display only text. Options are now Display icons and text, icons only or text only. You may need to check your settings if you were previously using the Icon only mode as it will most likely be reset with this update.
* Added option to specify css styling of image via Default (no-border), Inline Style for custom css, or Class for using a stylesheet (props: Zim)


= v0.8.7 =
* Added detection for the Bolt Browser (mobile).
* Fixed bug where Browser and Operating System names were not passed along to the title and alt attributes in the image tags (props: cimddwc)


= v0.8.6 =
* Added detection for more web browsers: BlackBerry Web Browser, Blazer, IEMobile, MIB (Motorola Internet Browser), NetFront, NetPositive, Obigo, Palm Pre Web Browser, Polaris, SEMC Browser, UCWEB, UP.Browser
* Added detection for more operating systems: Android, BeOS, Darwin (Mac), DragonFly BSD, Kanotix, Knoppix, LindowsOS, Linspire, Mandriva, Motorola, NetBSD, Nintendo DSi, Palm, VectorLinux, webOS
* Updates to detection of some rare sub-string instances: Win16 (Windows 3.11), Win95, Win98 (Windows 98 SE), Windows ME, Windows XP, Mac OSX, and Darwin (as Mac).
* Moved detection point of Firefox near end (along with Mozilla and MSIE) so other browsers that include Firefox in the User-Agent string are properly detected (example: Swiftfox is occassionally listed after Firefox in the string, causing improper detection).
* Corrected detection of Safari. Now Opera (starting with v10) and Safari are both versioned based on the Version/x.y string.
* Corrected detection of Nokia. Minor detection change included forward slash to further narrow results.
* Corrected links to Fedora and Mosaic's homepage.
* Added icons for TeaShark (mobile web browser).
* Added new detection for Mozilla versioning.
* Added new Windows icons so a properly styled Windows icon is shown with the correct operating system version.
* Minor code cleaning.


= v0.8.5 =
* Added detection for Sabayon Linux (props: Ian "Thev00d00" Whyman)
* Updated readme.txt to take advantage of the [new changelog tab](http://weblogtoolscollection.com/archives/2009/06/20/attention-all-plugin-authors/).


= v0.8.4 =
* Links: rel=&quot;nofollow&quot; is applied to all web browser and operating system links. (props: Alter Ego Blog)
* Added detection for Arch Linux (props: Terry Wang)
* Added detection for KMail (Kontact Mail) since it has a unique and detectable user agent string.
* Icon change: Macintosh (generic/old Mac) uses multi-color Apple icon, Mac OS X now uses gray Apple icon.


= v0.8.3 =
* Adjusted readme.txt to appear better on the plugin page and pass validation from: http://wordpress.org/extend/plugins/about/validator/
* Initial submission to the the WP-UserAgent SVN Plugin Repository


= v0.8.2 =
* Added detection for Windows 3.11, Windows NT 3.11, Windows NT 4.0 and fallback check for Windows Me.
* Added detection for Nintendo Wii, Playstation 3 and Playstation Portable.
* Added detection for Thunderbird (the e-mail client) since it has a unique and detectable user agent string.
* Debian is now shown as Debian GNU/Linux (props: Terry Wang)


= v0.8.1 =
* Added missing ./img/16/net/arora.png file.
* Corrected typo of Maxthon 16px and 24px icons. maxton.png -> maxthon.png
* Added a quick fix for detecting and trimming Maxthon when no version is provided.


= v0.8 =
* Added a "Settings" quick link to the plugin listing in the plugins page.
* Worked on description wording for plugin in plugins page.
* Added a "Comment Preview" section to the WP-UserAgent settings page that displays an example of the options that you choose in real time.


= v0.7 =
* All images were optimized to reduce file sizes (PNGGauntlet) which reduced the overall package size from 308.4kb to 288.1kb!
* Also, WP-UserAgent has now been cleaned and extended far enough to reach the 1.0 milestone soon. I will be checking for possible problems and cleanups, but feel free to point them out to me at any time!


= v0.6.2 =
* 90 total web browsers detectable.
* 35 total operating systems detectable.
* Code cleanup (removed extra whitespace to reduce size a little) and simplification (replaced switch with if..else).
* Most of the remaining icons for web browsers have been added.
* Linux Mint support added.
* A list of detectable operating systems that now also detect versions when available: CentOS, Edubuntu, Fedora, iPhone OS, Kubuntu, Mac, Ubuntu, Windows.
* Also, generic Linux will now specify if it is detected to be x86_64 (64-bit or x64). Others may be included later.
* Appearance adjustments made (settings icon by title and styling of "Save Changes" button) to WP-UserAgent Options page as well as adding a Help section with Author and Plugin Homepage to bottom of Options page for convenience.
* Known Issues:
* Some web browser icons have not been found/added as of yet. Those include: Chimera, KMLite, retawq, TeaShark, WorldWideWeb.
* Output location "custom" is still highly untested.
* *Note: Please suggest web browsers and/or operating systems that I am missing so I can include them to be detected.
* Also, WP-UserAgent has now been cleaned and extended far enough to reach the 1.0 milestone soon. I will be checking for possible problems and cleanups, but feel free to point them out to me at any time!


= v0.6.1 =
* 90 total web browsers detectable.
* 34 total operating systems detectable.
* Implemented a fix for Opera's new versioning system, which started in version 10 snapshots, to correctly display the browser version.
* Cleaned code more and removed unnecessary global variable references.
* Fixed detection of CentOS.
* Debian and Ubuntu based distros (that are supported) now fetch version numbers also. Generic GNU/Linux now also specifies x64 when detected. Fedora version fetching is in the works as well as Mac OS X. Maybe these will be added in the next release. Mac versions are a little tricky since it seems they are optionally provided and formated differently per browser.I need to add fall back checks in case an odd UA string is created without version numbers for these so they are still detected. And parse pingbacks such as "XML-RPC for PHP 2.2" in the future as something other than unknown.
* Known Issue: Some web browser icons have not been found/added as of yet. Those include: Amiga Voyager, Cheshire, Chimera, Elinks, IBrowse, Kapiko, KMLite, Minimo, Mosaic, MultiZilla, retawq, TeaShark, WorldWideWeb. Several of these listed browsers never had an icon to begin with, however, all listed will use the "unknown" icon (which is generic).Output location "custom" is still highly untested.
* *Note: Please suggest web browsers and/or operating systems that I am missing so I can include them to be detected.


= v0.6 =
* Added over 40 more web browsers that are detected.
* Added a couple more operating systems that are detected
* Fixed a bug in previous versions that caused errors to occur when users who were not logged in attempted to post a comment.
* Cleaned code and simplified several naming systems used.
* Added option to select DocType. Options include html and xhtml (strict for both).
* Known Issue: Most of the newly detected web browsers are still missing icons. I will try to add them as soon as I possibly can.
* *Note: The original author seems to like the additions that I made since I started extending this plugin and has incorporated many of the changes that I made into the other plugin.


= 0.5.3.4 =
* Added Windows 7 and Windows 7 x64 to detectable OS versions.


= 0.5.3.3 =
* Added Pre-2.6 compatibility for determining and defining Plugin and Content Directories constants. WordPress documentation here: http://codex.wordpress.org/Determining_Plugin_and_Content_Directories
* Replaced sloppy code for image paths with more dynamic code.
* Renamed the function "useragent_spy_custom()" in "wp-useragent.php" to "useragent_output_custom()" to make it more generic and move away from the UserAgent-Spy naming system.
* Removed text attributes that were improperly added to option tags in "wp-useragent-options.php" to correct html validation errors.
* Adjusted the "UserAgent Output Location" section in "wp-useragent-options.php" and added the options to an ordered list, adjusting the use of the "small" tag.
* "wp-useragent-options.php" is now 100% XHTML 1.0 Transitional standards compliant. This is the default DTD used in the WordPress administration panel. I will eventually work towards compliance for XHTML 1.0 Strict.
* Fixed regex for OLPC so it's case insensitive.
* Removed "target" attribute from browser links to improve XHTML 1.0 Strict compliance.
* Gave WP-UserAgent settings page a header title to make the location more recognizable.
* Cleaned up appearance of "wp-useragent-options.php" settings page by categorizing the content.


= 0.5.3.2 =
* Updated string names: $size =&gt; $uasize, $location =&gt;$ualocation.
* Updated Google Chrome logo images with logo images added to UserAgent-Spy 0.5.3.2 (Images already added in my version of 0.5.2, but replaced for consistency).


= 0.5.2 =
* Official release of WP-UserAgent


= 0.5.1 =
* Added Google Chrome (the day of its release!)


= 0.5 =
* Option to show complete useragent string.
* Went back to useragent_spy_custom() for custom display.
* Several code fixes (W3C valid XHTML, more order, etc).
* Saved settings are displayed correctly on the settings page.
* Added option to display icons only, with no text or link.
* Fixed bugs:
* Epiphany, when built against WebKit would display Safari.
* Major bug which would show ua-spy in your comment management page, instead of comment text when using custom.


= 0.4.2 =
* Browser added: Lynx, Links.
* Fixed bug where the comments would show without filters.
* Changed Konqueror icon for new 4.0 version.


= 0.4.1 =
* OS added: OLPC XO, SuSE.
* Browser added: W3M, Lobo, Amaya, Maxthon, Camino, NetSurf, Minefield, IceApe, SeaMonkey.
* Fixed some code (includes a bug where OLPC was detected for certain os's).


= 0.4 =
* Made "browsing with" and "on" words in "Browsing with browser on OS" customizable in the Options page.
* Allow logged in user to see the full user-agent string (easier debugging).
* Fixed string for unidentified browser.
* OS's added: FreeBSD, OpenBSD, Solaris.


= 0.3.1 =
* Added &lt;p&gt; tags for correct formatting
* Added if in options page so that current values are selected on load.


= 0.3 =
* More web-browsers: Epiphany, Galeon, Opera, IE.
* O.S.'s: Xubuntu, Kubuntu, Ubuntu, Slackware.
* Added option to choose displaying useragent_spy before or after the comment text, or using useragent_spy() function in template.


= 0.2 =
* Detects Firefox, Epiphany.
* Detects Debian, Fedora, Gentoo
* Options menu under Settings Panel, allows 16x16 or 24x24 pixel images for icon size.
* Integrates into Wordpress before comments text.


= 0.1 =
* Detects Mozilla, IceWeasel, IceCat, Arora, Safari, Konqueror.
* Detects Windows, GNU/Linux, iPhone and MacOS


= TO-DO: =
* Refactor codebase to simplify maintaince of this plugin and reduce duplicate code.
* Reach a stable and solid 1.0 release where the plugin is mostly finalized and updates will generally be additional browsers and/or systems.
* New web browsers, devices and operating systems are always welcome.
* Add detection for PSVita when its released.

== Upgrade Notice ==

= v1.0.3 =
* Fixed detection of IE11 (props: G's)
* Fixed detection of Windows 8.1 (props: JayXon)
* Fixed detection of Opera 14 for Android and Opera 15+ for Desktop (props: Rafae)
* Fixed an issue with Ubuntu version detection.
* Added detection for Amigo, Coast, CoRom, DPlus, ONE Browser, Otter, Perk, PS4 Web Browser and Ubuntu Web Browser.
* Added detection for PlayStation 4, Ubuntu Touch (Mobile and Tablet).
