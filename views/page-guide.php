<?php
/**
 * Meta Data guide
 *
 * @package    Meta Data
 * @subpackage Views
 * @category   Guides
 * @since      1.0.0
 */

// Access namespaced functions.
use function Meta_Data\{
	plugin,
	site,
	lang,
	themes_compat
};

// Form page URL.
$form_page = DOMAIN_ADMIN . 'configure-plugin/' . plugin()->className();

?>
<style>
pre {
	user-select: all;
	cursor: pointer;
}
</style>

<h1><span class="page-title-icon fa fa-book"></span> <span class="page-title-text"><?php lang()->p( 'Meta Data Guide' ) ?></span></h1>

<div class="alert alert-primary alert-cats-list" role="alert">
	<p class="m-0"><?php lang()->p( "Go to the <a href='{$form_page}'>Meta Data options</a> page." ); ?></p>
</div>

<nav class="mb-3">
	<div class="nav nav-tabs" id="nav-tab" role="tablist">

		<a class="nav-item nav-link active" id="tab-one" data-toggle="tab" href="#meta" role="tab" aria-controls="tab-one" aria-selected="false"><?php lang()->p( 'Meta Tags' ); ?></a>

		<a class="nav-item nav-link" id="tab-two" data-toggle="tab" href="#title" role="tab" aria-controls="tab-two" aria-selected="false"><?php lang()->p( 'Title Tag' ); ?></a>
	</div>
</nav>

<div class="tab-content" id="nav-tabContent">

	<div id="meta" class="tab-pane fade show mt-4 active" role="tabpanel" aria-labelledby="tab-one">
		<h2 class="form-heading mt-3"><?php lang()->p( 'Meta Tag Options & Hooks' ); ?></h2>
		<p><?php lang()->p( 'Meta tags can be printed to the head section by enabling them on the settings page, provided the active theme has the standard Bludit head hook, which is likely.' ); ?></p>

		<h3 class="form-heading"><?php lang()->p( 'Blog Text Options' ); ?></h3>

		<p><?php lang()->p( 'When a static page is chosen in the Bludit settings to display blog pages, the metadata has a a page title, and perhaps a description, to use for the title & description meta tags. But when blog posts are displayed on the site home there is no page to use for this.' ); ?></p>

		<p><?php lang()->p( 'There is some basic text hard-coded into the Meta Data plugin for this case but you can override this with your own custom text. There are also placeholders available that pull text from other settings.' ); ?></p>
	</div>

	<div id="title" class="tab-pane fade show mt-4" role="tabpanel" aria-labelledby="tab-two">
		<h2 class="form-heading mt-3"><?php lang()->p( 'A Better Title Tag' ); ?></h2>
		<p><?php lang()->p( 'The Meta Data plugin offers a much better, more accurate title tag (used by search engines as well as browser tabs) than the default Bludit title tag. However it requires the active theme to employ the <code>meta_tags_title</code> hook in its head section.' ); ?></p>

		<?php if ( in_array( site()->theme(), themes_compat() ) ) : ?>
		<p><?php lang()->p( '<strong>The active theme is compatible with this plugin.</strong> There is no need to add the title tag code.' ); ?></p>
		<?php endif; ?>

		<p><?php lang()->p( 'One of the following code snippets will print the title tag, with a fallback to the Bludit tag if this plugin is deactivated. Paste into the <code>&lt;head&gt;</code> section.' ); ?></p>

		<p><?php lang()->p( 'For Bludit Versions Before 4.0' ); ?></p>
		<pre lang="php">
&lt;?php
if ( getPlugin( 'Meta_Data' ) ) {
	Theme::plugins( 'meta_tags_title' );
} else {
	echo Theme::metaTagTitle();
} ?&gt;
		</pre>

		<p><?php lang()->p( 'For Bludit Version 4.0+' ); ?></p>
		<pre lang="php">
&lt;?php
if ( getPlugin( 'Meta_Data' ) ) {
	execPluginsByHook( 'meta_tags_title' );
} else {
	echo HTML::metaTagTitle();
} ?&gt;
		</pre>
	</div>
</div>

<script>
// Open current tab after refresh page.
$( function() {
	$( 'a[data-toggle="tab"]' ).on( 'click', function(e) {
		window.localStorage.setItem( 'activeTab', $( e.target ).attr( 'href' ) );
	});
	var activeTab = window.localStorage.getItem( 'activeTab' );
	if ( activeTab ) {
		$( '#nav-tab a[href="' + activeTab + '"]' ).tab( 'show' );
		window.localStorage.removeItem( 'activeTab' );
	}
});
</script>
