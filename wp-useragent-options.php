<!--Begin: Options file for WP-UserAgent-->
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2>WP-UserAgent</h2>
	<form method="post" action="options.php">
		<?php 
			wp_nonce_field('update-options');
			$ua_doctype=get_option('ua_doctype');
			$ua_comment_size=get_option('ua_comment_size');
			$ua_track_size=get_option('ua_track_size');
			$ua_show_text=get_option('ua_show_text');
			$ua_image_style=get_option('ua_image_style');
			$ua_image_css=get_option('ua_image_css');
			$ua_text_surfing=get_option('ua_text_surfing');
			$ua_text_on=get_option('ua_text_on');
			$ua_text_via=get_option('ua_text_via');
			$ua_text_links=get_option('ua_text_links');
			$ua_show_au_bool=get_option('ua_show_ua_bool');
			$ua_output_location=get_option('ua_output_location');
		?>

		<div class="metabox-holder">
			<div class="meta-box-sortables">
				<script type="text/javascript">
					<!--
					jQuery(document).ready(function($) {
						$('.postbox').children('h3, .handlediv').click(function(){
							$(this).siblings('.inside').toggle();
						});
					});
					//-->
				</script>

				<!-- DocType Box -->
				<div class="postbox">
					<div title="Click to toggle" class="handlediv"><br /></div>
					<h3 class="hndl"><span>DocType</span></h3>
					<div class="inside">
						<p style="padding-left:10px;padding-right:10px;">This field is optional and generally will not affect the way that this plugin appears. However, if you wish to control
						the <a href="http://www.w3schools.com/tags/tag_DOCTYPE.asp">DocType</a> in order to generate validly coded pages and validate your pages with <a href="http://www.w3.org/">W3.org</a>
						then you can specify the DocType here.</p>
						
						<table class="form-table" style="margin-top: 0">
							<tbody>
								<tr valign='top'>
									<th scope='row'>DocType</th>
									<td><div style="overflow:auto;max-height:100px;">
										<select id="ua_doctype" name="ua_doctype" onchange="preview();">
											<option value="html" <?php if($ua_doctype=="html") echo 'selected="selected"' ?>>html</option>
											<option value="xhtml" <?php if($ua_doctype=="xhtml") echo 'selected="selected"' ?>>xhtml</option>
										</select>
									</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- User Agent icons Box -->
				<div class="postbox">
					<div title="Click to toggle" class="handlediv"><br /></div>
					<h3 class="hndl"><span>User Agent icons</span></h3>
					<div class="inside">
						<p style="padding-left:10px;padding-right:10px;">You can change the size of the icons as well as whether or not to display text with the icons.</p>
						
						<table class="form-table" style="margin-top: 0">
							<tbody>
								<tr valign='top'>
									<th scope='row'>Size of icons for comments:</th>
									<td><div style="overflow:auto;max-height:100px;">
										<select id="ua_comment_size" name="ua_comment_size" onchange="preview();">
											<option value="24" <?php if($ua_comment_size==24) echo 'selected="selected"' ?>>24</option>
											<option value="16" <?php if($ua_comment_size==16) echo 'selected="selected"' ?>>16</option>
										</select> pixels
									</div></td>
								</tr>
								<tr valign='top'>
									<th scope='row'>Size of icons for trackbacks:</th>
									<td><div style="overflow:auto;max-height:100px;">
										<select id="ua_track_size" name="ua_track_size" onchange="preview();">
											<option value="24" <?php if($ua_track_size==24) echo 'selected="selected"' ?>>24</option>
											<option value="16" <?php if($ua_track_size==16) echo 'selected="selected"' ?>>16</option>
										</select> pixels
									</div></td>
								</tr>
								<tr valign='top'>
									<th scope='row'>Icons and text, icons or text only:</th>
									<td><div style="overflow:auto;max-height:100px;">
										<select id="ua_show_text" name="ua_show_text" onchange="preview();">
											<option value="1" <?php if($ua_show_text==1) echo 'selected="selected"' ?>>Icons and text</option>
											<option value="2" <?php if($ua_show_text==2) echo 'selected="selected"' ?>>Icons only</option>
											<option value="3" <?php if($ua_show_text==3) echo 'selected="selected"' ?>>Text only</option>
										</select>
									</div></td>
								</tr>
								<tr valign='top'>
									<th scope='row'>Inline style or class for images:</th>
									<td><div style="overflow:auto;max-height:100px;">
										<select id="ua_image_style" name="ua_image_style" onchange="preview();">
											<option value="1" <?php if($ua_image_style==1) echo 'selected="selected"' ?>>Default</option>
											<option value="2" <?php if($ua_image_style==2) echo 'selected="selected"' ?>>Inline Style</option>
											<option value="3" <?php if($ua_image_style==3) echo 'selected="selected"' ?>>Class</option>		
										</select>
										
										<p>If you're not sure what this is, please leave it as &quot;Default&quot; which applies a no-border style.<br />
											The Comment Preview will not be updated with these changes.</p>
									</div></td>
								</tr>
								<tr valign='top'>
									<th scope='row'>&nbsp;</th>
									<td><div style="overflow:auto;max-height:100px;">
										<input type="text" id="ua_image_css" name="ua_image_css" value="<?php echo $ua_image_css; ?>" onkeyup="preview();" />
									</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Display text Box -->
				<div class="postbox">
					<div title="Click to toggle" class="handlediv"><br /></div>
					<h3 class="hndl"><span>Display text</span></h3>
					<div class="inside">
						<p style="padding-left:10px;padding-right:10px;">You can change the text between the Web Browser and the Operating System in the following options.</p>
						
						<table class="form-table" style="margin-top: 0">
							<tbody>
								<tr valign='top'>
									<th scope='row'>Word for "<em>Surfing</em>":</th>
									<td><div style="overflow:auto;max-height:100px;">
										<input type="text" id="ua_text_surfing" name="ua_text_surfing" onkeyup="preview();" />
										<span id="ua_text_surfing_hdn" style="display:none;"><?php echo $ua_text_surfing; ?></span>
									</div></td>
								</tr>
								<tr valign='top'>
									<th scope='row'>Word for "<em>on</em>":</th>
									<td><div style="overflow:auto;max-height:100px;">
										<input type="text" id="ua_text_on" name="ua_text_on" onkeyup="preview();" />
										<span id="ua_text_on_hdn" style="display:none;"><?php echo $ua_text_on; ?></span>
									</div></td>
								</tr>
								<tr valign='top'>
									<th scope='row'>
										Word for "<em>via</em>":<br />
										<small><em>* Displayed for Trackbacks and Pingbacks. Default value is empty.</em></small>
									</th>
									<td><div style="overflow:auto;max-height:100px;">
										<input type="text" id="ua_text_via" name="ua_text_via" onkeyup="preview();" />
										<span id="ua_text_via_hdn" style="display:none;"><?php echo $ua_text_via; ?></span>
									</div></td>
								</tr>
								<tr valign='top'>
									<th scope='row'>Use links on text:</th>
									<td><div style="overflow:auto;max-height:100px;">
										<select id="ua_text_links" name="ua_text_links" onchange="preview();">
											<option value="1" <?php if($ua_text_links!=0) echo 'selected="selected"'; ?>>Yes</option>
											<option value="0" <?php if($ua_text_links==0) echo 'selected="selected"' ?>>No</option>
										</select>
									</div></td>
								</tr>
								<tr valign='top'>
									<th scope='row'>Display complete User-Agent:</th>
									<td><div style="overflow:auto;max-height:100px;">
										<select id="ua_show_ua_bool" name="ua_show_ua_bool" onchange="preview();">
											<option value="true" <?php if($ua_show_ua_bool=="true") echo 'selected="selected"' ?>>True</option>
											<option value="false"<?php if($ua_show_ua_bool=="false") echo 'selected="selected"' ?>>False</option>
										</select>
									</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Display location Box -->
				<div class="postbox">
					<div title="Click to toggle" class="handlediv"><br /></div>
					<h3 class="hndl"><span>Display location</span></h3>
					<div class="inside">
						<p style="padding-left:10px;padding-right:10px;">You can change the location that the User Agent output will appear (explanation below).</p>
						
						<table class="form-table" style="margin-top: 0">
							<tbody>
								<tr valign='top'>
									<th scope='row'>UserAgent Output Location:</th>
									<td><div style="overflow:auto;max-height:100px;">
										<select id="ua_output_location" name="ua_output_location" onchange="preview();">
											<option value="before" <?php if($ua_output_location=="before") echo 'selected="selected"' ?>>Before comment text</option>
											<option value="after" <?php if($ua_output_location=="after") echo 'selected="selected"' ?>>After comment text</option>
											<option value="custom" <?php if($ua_output_location=="custom") echo 'selected="selected"' ?>>Custom (Advanced)</option>
										</select>
									</div></td>
								</tr>
								<tr valign='top'>
									<th scope='row'>&nbsp;</th>
									<td><div id="ua_output_custom_location" style="overflow:auto;max-height:100px;display:none;">
										<strong>Usage:</strong> There are 3 options available for you to display the commenter's <em>browser</em> and <em>operating system</em>. The default option is &quot;Before comment text&quot;.<br /><br />
										<ol>
											<li style="background-color:#eee;"><strong><em>Before comment text.</em></strong> Web browser and operating system details appear before comment text.</li>
											<li style="background-color:#fff;"><strong><em>After comment text.</em></strong> Web browser and operating system details appear after comment text.</li>
											<li style="background-color:#eee;"><strong><em>Custom (Advanced).</em></strong> You can specify the location using the useragent_output_custom() function
											inside the comments loop in your template (generally in the &quot;<em>comments.php</em>&quot; template file).<br /><br />
											<em>Example:</em><br /><br />
												<div style="padding-left:20px;">
												<code>
													&lt;?php foreach ($comments as $comment) : ?&gt;<br />
													&lt;cite&gt;&lt;?php comment_author_link() ?&gt;&lt;/cite&gt; <span style="background-color:#fff;"><strong>&lt;?php useragent_output_custom(); ?&gt;</strong></span> says:&lt;br /&gt;<br />
													&lt;?php comment_text() ?&gt;
												</code><br /><br />
												<em>CAUTION:</em> If you select "Custom" and don't use <code><span style="background-color:#fff;"><strong>&lt;?php useragent_output_custom(); ?&gt;</strong></span></code> in your template, 
												the browser and operating system details will not be displayed. With this option, they are only displayed where and when this function is called.</div></li>
										</ol>
									</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Comment Preview Box -->
				<div class="postbox">
					<div title="Click to toggle" class="handlediv"><br /></div>
					<h3 class="hndl"><span>Comment Preview</span></h3>
					<div class="inside">
						<table class="form-table" style="margin-top: 0">
							<tbody>
								<tr valign='top'>
									<td><div id="ua_preview" style="overflow:auto;max-height:100px;">
										<div style="position:relative;background-color:#eee;font-family:'Lucida Grande','Lucida Sans Unicode','Verdana [microsoft]','Helvetica [Adobe]','Arial [monotype]',sans-serif;padding:10px;padding-top:50px;text-align:left;width:450px;">
											<div style="position:absolute;top:10px;left:10px;color:#777;font-size:10px;">
												<a href="#" style="font-family:'Lucida Grande','Lucida Sans Unicode','Verdana [microsoft]','Helvetica [Adobe]','Arial [monotype]',sans-serif;font-size:16px;font-weight:bold;text-decoration:none;">kyleabaker</a><br />
												<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAANWSURBVHjaYvz//z8DJQAggFjQBQ6s7HZiZ/5Szc7xy4CZlZn375//DN+/fn/39QvDie9/ODv901qPI6sHCCBGZBccXt0+TUDgU7KgfAAbO58oAzuXIMP///8Yvnx4xvDuyTWGZzf2f/34mbUzrGByM0wPQADBDTi4sm2ijIpQnpC8F8Prb7wMl+9+ZHj1/hvDn7//GQR5ORi0lXkYBP/fY7h+aBHDy1d/yhKqZneD9AEEENiAXUs6bYQF3uxTMMtmvfaMneHNh58MeipCDAJ8TAz/GRgZ3n38y3DqxmsGHnYmBk2+mwxntiz89p1ZyCalcup5gABiApnC/O99Fb+MM+vr73wML979YAh0UGAQ4v3P8O7LFwYePm4GOVk+hgAXZYaXn/8xvGHSYhBXlOb6++19EUgvQACBDWBi/GbILSTDcPbmOwYdNWGGb8CAY2VlZdi9cwfDp48fGX7//Mmwa/d+Bi01EYbj1z4wSKiZMTD//2UD0gsQQGADgN4Q4OAWZHj25huDsDAnw0+gv9m4uBiePHrEsHvfQYbW9k4GXl5uBkExLobnQBfyiyowMDMwioP0AgQQ2IDfP38z/Pv3k+H7r39AzUD+PwaGVx8/M3Dz8DBcvniBwTsgkMHQ1Izh5x+gHFDy/78fQAwJfIAAAqeDr1++P//48pYiP7cUw/0X3xhUZfiB/uJgMDKxYNDQ1WHg4udj+PKTgeHxi68MfNxMDO+fXmT48efvG5BegAACu+Dzd4aDj68dZDBT52Q4fv4lAys7AwM3ByuDja0Vg4ggHwOQy8DDwcBw+vwrBjttJoaHl44x/P7PcgKkFyCAwAb8ZeKd+Ojm/e9Cv08wyPJ+YZi35ibDw6cfGBiBXmP8/pvh0eMPDLNW3WCQ43zFIPp9O8Pju19/MLLzgdMBQADBE9LspqQKHvYv7QYOjgwvmcwYjl/9w/Dh81+Gv0C/8nIxMFhq/WcQ+bmL4fSuUwzfGYQbCzqWNoD0AQQQSlKeVhtXy/rnc5m4PBePrJo2g4CkPDCK/jC8fXKb4cHlKwwvn/37+puFp6+gc1kdTA9AADGi58ZpdUlmf358KmT6+9uKhem/KEjszz/G13+ZWE4wsvH05bUuPImsHiCAGCnNzgABBgBEV02Y8mpPdAAAAABJRU5ErkJggg==" alt="Posted:" /> July 5, 1986 at 12:01 pm
											</div>
											<div style="position:absolute;top:10px;left:430px;"><img src="data:image/png;base64,/9j/4AAQSkZJRgABAQAAAQABAAD//gA7Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2NjIpLCBxdWFsaXR5ID0gOTAK/9sAQwADAgIDAgIDAwMDBAMDBAUIBQUEBAUKBwcGCAwKDAwLCgsLDQ4SEA0OEQ4LCxAWEBETFBUVFQwPFxgWFBgSFBUU/9sAQwEDBAQFBAUJBQUJFA0LDRQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQU/8AAEQgAIAAgAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A/VOuC8T6rquv2N/aabrlj4UguJZNLs9Ru4/MnmucMp8lS6AEMrAA7ixUkDGCe9r5g/aO+Nd78Fteg0jwwLPUtRv92oNZ6lB5sVlIxIV4yGUhnfc20kgcnIyBTSbdkcWMxdDA0XXxMuWK6+unTU6P9nfWfGHg+x13w58Qbu61S4tdZe3stWluluN8TLGq7suZQhkPBZeC4UngV75XwZ4a/aMj0jxFoX/CSKtzp09wW1HUVtFW+Uecs3+saNS0Il2sVABwvTgZ+74J47mGOaJ1kikUOjqchgRkEVzYev8AWaaqqLjfo1Z/cXQeHhfDUKqqclk2pc260u+unfXvqfOn7Wf7P3jr4syaXrPgHxbLoWq2EDwvYPdS28Vz825WDp0YHI+YEEEdMV8TfEI/E5PH17P8T9IfQfFqWluqXSyI8V2kaGLzUcbl+baM4/iycDoP1V1S+v7Z8WtiLhMff3/0r52+IXw68UfGPxzHH4o8MWT6LpN0sltM1uWWeE7WMZ5y+eQVPyggkdq3qYp0eRcrlrbRd+77Lz+R5ebZKs4w06MaihLR3d7aNdOra0+Z8GXsk3jK6GnpK7TXBS2gSWQu0cjsBvPyLgA4GcdjX69+FtEXw14Y0jSEcyJp9nDaBz1YIgXP6V86/Er4IPLrWj+JvCngfSLTVdKO4Q21iIfNIYMhKAhH2ndw2DzkHIAr3jwBf+I7/wAOWD+J7CGy1ZoFa4WBvlDn+HHqO/bIOKJYj2lR03Fq3Xo/R/pv8rHNkeQ/2NCpN1FLna20tZdvxP/Z" style="border:none;height:32px;width:32px;" alt="gravatar" /></div>
											<div id="wp_ua_content_top"></div><div id="wp_ua_string_top" style="color:#777;font-size:10px;padding-bottom:5px;padding-top:5px;"></div>
											<div>
												This preview is intended to give you a general idea of how comments will appear with your current settings and is updated as you make changes.
												<br /><br />
												If you're happy with the changes that you've made, then make sure that you click the &quot;Save Changes&quot; button below.
											</div>
											<div id="wp_ua_content_bottom" style="padding-bottom:5px;padding-top:15px;"></div><div id="wp_ua_string_bottom" style="color:#777;font-size:10px;"></div>
										</div>
									</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Help Box -->
				<div class="postbox">
					<div title="Click to toggle" class="handlediv"><br /></div>
					<h3 class="hndl"><span>Help</span></h3>
					<div class="inside">
						<p style="padding-left:10px;padding-right:10px;">You can change the location that the User Agent output will appear (explanation below).</p>
						
						<table class="form-table" style="margin-top: 0">
							<tbody>
								<tr valign='top'>
									<td><div style="overflow:auto;max-height:100px;">
										<p>If you have <em>any</em> problems, questions, comments or suggestions regarding <a href="http://kyleabaker.com/goodies/coding/wp-useragent/">WP-UserAgent</a> please don't hesitate to contact me.</p>
										<p><strong>Author:</strong> Kyle Baker (kyleabaker) - <a href="http://twitter.com/kyleabaker">Twitter</a><br />
										<strong>Plugin Homepage:</strong> <a href="http://kyleabaker.com/goodies/coding/wp-useragent/">http://kyleabaker.com/goodies/coding/wp-useragent/</a><br />
										Help me afford the cost of maintaining this plugin and the work that goes into it! <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=kyleabaker@gmail.com&item_name=Wordpress%20Plugin%20(WP-UserAgent)&no_shipping=1&no_note=1&tax=0&currency_code=USD&bn=PP%2dDonationsBF&charset=UTF%2d8&lc=US" target="_new"><img src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" name="submit" alt="Donate to Kyle Baker (kyleabaker.com) for this plugin via PayPal" title="Donate to Kyle Baker (kyleabaker.com) for this plugin via PayPal" style="float:right" /></a>
										</p>
									</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>

		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="ua_doctype, ua_comment_size, ua_track_size, ua_show_text, ua_image_style, ua_image_css, ua_text_surfing, ua_text_on, ua_text_via, ua_text_links, ua_show_ua_bool, ua_output_location" />
		<p class="submit">
			<input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
	<script type="text/javascript">
		<!--
		//16 pixel images
			var net_16="iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9gHHRY3KJ/zsLwAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAADDElEQVQ4y62TTWhcVQCFz73v3vczbzKZTF9mJulvmv4wzYSorVKCJRGRgoui1I2uFVGkK9HoRnBlwepOpEjB/02pJmoQIoHaRCFtTWm1sZ3G2sRkmmQmvunMm3k/993rqi4au/NsD+dbHM4huI9Gd3ZjSzLlJCy7yBjLMNMUpuNUnWee/Z3Z7VXy5BMAAHY/QNbJH9ZN+1ik5MMl389I3xXbQ79a/+LjWWfHzpMAxgCA3Bs8Xixoj2/tOdpp2Z+LMGDznP95/Ldrr61VVpZfyaffHbD0g6adVJt37Xl5U1fuFL0XMDiwf/eOfX0jmzrzrM3JouFWv6IMX8/Vmz9dagWfKKXgew1SKS+/eqfR6t8AyA0eeqp96LEH7IEi7KwDv7I6OnH11yiKPPVtzR+vCQkAaNZqvQ0hn9sASBIyxDgnal8fokwaScu+cde73fCWXCkjQihkLBG3/Ec3lNicOV/0SyVomQzE8qKydWPlrheGnpAaX2fczGkaA9arBQYAp8cucKppBzlne1dOvO7QyioopWBEydZbHw6PSTV75HB/FQDMRLtv2QmAENBYJdmZ8UsvEtA3DYNvM019yXXXIpNIU8kYHbnNmsb0CUaImJy+8Y3B6WfGB+/QHICg6UHzmy1GCH1bKZWNhAAXhHsEXhQ025SSgGmACvFLIMlDKpZPE8WG08W+RFpJhAt/oXV7qUwZo9cBgjiWiCKZJY8M5cM4QhwLKBWjZ3r8mK7Tj8IYqlprdfCEZZD9B6Dv6QVsc5IyTXufUrJKAAShgNj1IOpWClAKgbuOnvL1rZZlvMEZm6iXF9HV9KAMHWEm43pKjmvPvzQyxzVMxbHqA5RD0g7/mzBY81cgvTo6+ge6u9ZuzVy5PHs+NXfxUEHTOpRGZXnh5nsXvx899e+UJ34sbYsiMSylfCEM/AP1H86Yqenv0JtKipSV/KNSXb+TSHcWuncXiNtmf3p5anLkyNlzLvmvI52bWWwPAn+wvHBzb+30ye32rVK6jRvcTDslP7/lyxNTZ0s/z19T+D/0DxVhV1WuGa7rAAAAAElFTkSuQmCC";
			var os_16="iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9gHHRY6HXzuCtIAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAB6ElEQVQ4y33TT2jPcRzH8cfn9/1uMxsbWmsi1jS05cJuyFr7g4t22QgnWg6Sw5aLGwdJymFFTZKk0JTFKIkLByItsvIvSi2HsZ/N2n77OuxbfrF51/vw+fR5vnt/3q/XO/hPjLUKIShHlMwY+3RfCy5hBNvr+RjPB2fbbEUHahHhJjZjaZotuPBPganT1qNq8oEq7MMiCBmhqMytye824SceQfgLLsFdrJge1pz77Bw2YgwVyYyBHx88jorFpcu9TxKDcR5chBPYAnGtXbkvOpIZ2UX3yLapChldZTXOYiHehaAzk9fAmvRf8A0DhY2zMJQO+oqT6MMMqrEjZNu0YGco8bywQZPIfhwv6HZinuGux0Wsw4sYvahJfnqT++JMtEonXv9H3fc4jCWYiDGOBJNiEWIsno/+OKgMe1J5P8c4iMZMueGoSicy2JkaZq7YgL2owO2Qp0IlLucNcneSuFbYM3sYmjVTLa6jDlkc+GOkxIigF80IEhPDPdqHKE190JB2VpcSj/AwzOHEo1j7tlsfrqbywkSI9C9r8nB6TDT6VH99YmSuXTiPIhzC6rz7Zyu7PC2udgy/Kts90T1HgYJu4xgf4hRupFZeECIvi6sdQU36dBtezbuN9eQwnCY5priCVoziDvwGNw6PMb/zL+4AAAAASUVORK5CYII=";
		//24 pixel images
			var net_24="iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAFJ0lEQVR4Xt2VW2xU1R6Hf2vty8zsuXSGXmnpMC2tMG0pNW2Aogcsl3gCpEDBIM0BqRjBBBOMPkiIh+QkgvIgGPUByoPyAAQKyk0PF4lQICktESitkWs77diWaaft3Dv7stzTCcYgRXzwxW/v385a2Wv/v7X2elj4uyF4Ro7lZ/O5FtsKo1FaSTk6nef4LCrwEd5o8hgzs1oci5Yc480px8nCBcpfFpwqnlSR48jYJ4omt6oqGCEE53w+ML09y2yAiQCiaEB6cemdLJdrA7flv+efWXDk+anzpma7Tggcb5LjMYgOB3Z4frm7t7llIwBfVart3c3j7bUmkizlyMpR84qL1gk7dn2FP+PjEndu56r/+IfWvsm8r9SyB9XL2PlXVykLikqKkQSCYBb+V5h3t6m8iCVTzO4vWxxnW96bDh2KpzCnfMZHzmmlDsu4cTCbLbDlOuG7037mbPutNiSBLIflWzH5S1VjAMMo/V0dwlAg8tlTBRvLynOemzN3JZwucK4JsGZmQOQp5NjIaTxGc1S5EFQ1MDyCoL+zYzrbf6ByTEH1S3OX2svKOOZ2A5PdoIX5GCEMJpP5Oh7DGwi29SoaCABCiB6KQF8v5Hh86ZgCZ1rqC6T1JojHA2azgZWWQdYUSILwAI8Rj4f9AU0LEUpBCAdCOYBQhNvbZ/IYA/l+xxQ1EACVJBCbFUhPhzbgh8jxD/EENEIHCOUtlPKghCIhU3q8k8YU+Pt6Mn3hEDjKgeN5CAYDSDCkzLt0KYYnQDgxJAgmUMohuRICFo1m/CZoON5i0a2z9QEVosAVBLdvSh+Wf1+LwWoysVPn2t5XFLWZ44Uri+e7o0gCo2SNS1Z7cmTyASIrAt9wokWilN9GKX2D53mz0SDCYBCGekeiWjSmAIzptzYaq71A4Hhxu2gg0K9o49XOk4FA+PNF84supmfmwGGzJTYWqqpA01QQJR4jR7+9foSA1IARgAB2u4RIZORg/zsrprqNQjESxTUNGmNwlVTg2prN0DSCBDynwZ4igePoqejB+pLZknGi7PMjFgkjrovoUH83Tym3MPExiAaAIBiMwWYRl3dkTOhWB7rAwJKr0EMddqRQdWcA4iZFt2gaw/Cw3jMYFpG0NBCXE6K3C8LDAcjDQQQH++5QnqetSMAoEh5V0RIzFAyVVXmqpoLp0bTkL9IbcO76YI/FaniL55iqMCCu8QhFVJBgAKywEHDmgeSOh5iRikhw6Ao1GcWdFEkoCAhhGA5GkDZzLno0jM4cowHUgB8Oi61kzkzXbotFWsNTTmWMwOfrwQR5BCQUBstzAfp+RPV+j7/vMJ33YuEBSTLWJwoDDAwEjFBo1IyusqpRAUPyXbDfB/M46WXo6JL9ZotxA08pIvd/QjalgLcbIAQsOxu9926fmdF27waFjmAwrbdapK0cxyuJgoSpCQ0yltSh3ZKGR/i9HqipqbWqx+uCTlVl3l5BIF+ktDZBjMYBfz9Ibx8GfmwO3bjZ/PYfzoOLTZ2lkUh0WzwuL1RVjTAAg73dUHdvhTvsByEU6bkTUVD7eoe34fCHZ2+3e4KCWPvv3PzXnNkTYcrPxaDRFL309aGa6guN/x/zwGm86pkSjcbqZEWt0VS1IDg8iN6GeuTfuowMnofZZIZdsiASiYBJVphtqbBnZcOXYmttbGmqq/v+7DU8I7qsK//85XurT//w8yf1e46e/HT1uuu7Z1V27ZtWHDpUUa5986/Z3d9V1xw+unb98spJkzn84/gV88c3kvtVaNkAAAAASUVORK5CYII=";
			var os_24="iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9gHHQIYGcceg0cAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAC5klEQVRIx63VT2hcVRQG8N+dzJ8ak1WtxCrWilK1A1YDrlSwQTuoRaTWohsVxNaFiwoTgiiCqGAGurJG6cr6h7RFxBplorbYLsQ/BcFOwdSiVFPUWkRMsE0myXMxN/IYJ8kUPfDgve+e9933zj3n+/gfosbNNcZqTNcYrtE5vxbOh2hig3wIrsYKzODHH6rGAydxWSr12SLPQbYd4smSXjyN23FhaukEenFp0yvXzN9kFiOuV6ysV3ThHO5uIodVq0sK+LQJf2/JDeoVRXyFp7qqjuGVFmk57Ogo2IxB7MMD2LPoGdQrLsERrMQU1k4d8DuOYy6WJofr4l8dwhBO4yasTRIPd4+ay7Ygh9ciORSwo6vqnsmS65PEz92jEpjcYJlgC17EcJonBF9gZ2ixwS043AS/kSQeyvc3iFs0QQ8+RjEF/4YrWp3BY03P3+DRhcihq+oX3IuzKXgFNoWJOwgZt+JaHCz0WYX3sSwm3pcre6fNdh7CthT0diZkPBMP6VUcnTpgBpWYMIPqeczintgcX8crEyZL/kR3KundQp+X8Dl+zZX1/BcZycYhSm9wDvl43z09qCPfb7ZNTVqDrSnoVBZl7Ip9fTq23OMxoTMEvfiyzQ/ehO2p5w8zXVWv40qsx1WFPsWmg9p+9vmlmY82FHRrE3w4G9tsHONQ79PZJCFbsgUf4M1FyEPgZVyegmcw/O85SLyF79NDiYHpwdayUqMnNDTokaal3UVOLqRF6/EROiJU+rbsk8AIfsJ3sRFuwJ24oIniFNYVOdPSD3JlB+sVT2An9s/NGg2N+pYWqNIhjRKdwo34rMiZJR2tXnE/joyV/YExXNQibd/qAdvyyw1EoxlJErvmpWVRR8uV7Y113izls6mYw5P55XbjrohtDEEmKkP7nlxrDONtWIeLMYsTayqGosilP3YkV7axbU/W0OEJ7I/XPzGVkAmOR/OZj2NteXI7UegHD0Zx+wt78cL8+t+YhsdFSTORbAAAAABJRU5ErkJggg==";

		function preview(){
			var wp_ua_content="", wp_ua_string="", ua_text_surfing="", ua_text_on="", ua_browser="", ua_system="";

			document.getElementById('ua_text_surfing_hdn').innerHTML=document.getElementById('ua_text_surfing').value;
			document.getElementById('ua_text_on_hdn').innerHTML=document.getElementById('ua_text_on').value;
			document.getElementById('ua_text_via_hdn').innerHTML=document.getElementById('ua_text_via').value;

			//wp_ua_image_style
			if(document.getElementById('ua_image_style').value=="1")
				document.getElementById('ua_image_css').style.display="none";
			else
				document.getElementById('ua_image_css').style.display="inline";

			//wp_ua_content
			if(document.getElementById('ua_show_text').value=="1" || document.getElementById('ua_show_text').value=="3"){
				ua_text_surfing=document.getElementById('ua_text_surfing').value+" ";
				ua_text_on=" "+document.getElementById('ua_text_on').value+" ";
				if (document.getElementById('ua_text_links').value!="0") {
					ua_browser=" <a href='http://www.opera.com/' style='text-decoration:none'>Opera 10.00</a> ";
					ua_system=" <a href='http://www.ubuntu.com/' style='text-decoration:none'>Ubuntu 9.10</a>";
				} else {
					ua_browser=" Opera 10.00 ";
					ua_system=" Ubuntu 9.10";
				}
			}

			if(document.getElementById('ua_show_text').value=="1" || document.getElementById('ua_show_text').value=="2"){
				if(document.getElementById('ua_comment_size').value=="16"){
					wp_ua_content=ua_text_surfing+"<img src='data:image/png;base64,"+net_16+"' alt='Browser:' style='border:0px;vertical-align:middle;' />"+ua_browser+ua_text_on+" <img src='data:image/png;base64,"+os_16+"' alt='System:' style='border:0px;vertical-align:middle;' />"+ua_system;
				}else if(document.getElementById('ua_comment_size').value=="24"){
					wp_ua_content=ua_text_surfing+"<img src='data:image/png;base64,"+net_24+"' alt='Browser:' style='border:0px;vertical-align:middle;' />"+ua_browser+ua_text_on+" <img src='data:image/png;base64,"+os_24+"' alt='System:' style='border:0px;vertical-align:middle;' />"+ua_system;
				}
			} else if (document.getElementById('ua_show_text').value=="3") {
				wp_ua_content=ua_text_surfing+ua_browser+ua_text_on+ua_system;
			}

			//wp_ua_string
			if(document.getElementById('ua_show_ua_bool').value=="true"){
				wp_ua_string="Opera/9.80 (X11; Ubuntu/9.10 x86_64; U; en) Presto/2.2.15 Version/10.00";
			}

			//toggle preview and custom output location directions
			if(document.getElementById('ua_output_location').value=="custom"){
				document.getElementById('ua_output_custom_location').style.display="table-row";
				document.getElementById('ua_preview').style.display="none";
			}else{
				document.getElementById('ua_preview').style.display="table-row";
				document.getElementById('ua_output_custom_location').style.display="none";
				if(document.getElementById('ua_output_location').value=="before"){
					document.getElementById('wp_ua_content_bottom').innerHTML="";
					document.getElementById('wp_ua_string_bottom').innerHTML="";
					document.getElementById('wp_ua_content_top').innerHTML=wp_ua_content;
					document.getElementById('wp_ua_string_top').innerHTML=wp_ua_string;
				}else if(document.getElementById('ua_output_location').value=="after"){
					document.getElementById('wp_ua_content_top').innerHTML="";
					document.getElementById('wp_ua_string_top').innerHTML="";
					document.getElementById('wp_ua_content_bottom').innerHTML=wp_ua_content;
					document.getElementById('wp_ua_string_bottom').innerHTML=wp_ua_string;
				}
			}
		}

		//set initially stored values for 'Surfing' and 'On'
		document.getElementById('ua_text_surfing').value=document.getElementById('ua_text_surfing_hdn').innerHTML;
		document.getElementById('ua_text_on').value=document.getElementById('ua_text_on_hdn').innerHTML;
		document.getElementById('ua_text_via').value=document.getElementById('ua_text_via_hdn').innerHTML;

		//initiate preview
		preview();
		//-->
	</script>
</div>
<!--End: Options file for WP-UserAgent-->
