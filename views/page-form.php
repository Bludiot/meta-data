<?php
/**
 * Meta Data options
 *
 * @package    Meta Data
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

// Access namespaced functions.
use function Meta_Data\{
	plugin,
	lang,
	can_search,
	is_rtl
};

// Guide page URL.
$guide_page = DOMAIN_ADMIN . 'plugin/' . plugin()->className();

?>
<style>
.screen-reader-text {
	border: 0;
	clip: rect( 1px, 1px, 1px, 1px );
	-webkit-clip-path: inset(50%);
	        clip-path: inset(50%);
	height: 1px;
	margin: -1px;
	overflow: hidden;
	padding: 0;
	position: absolute !important;
	width: 1px;
	word-wrap: normal !important;
}
code.select {
	user-select: all;
	cursor: pointer;
}
</style>

<p><?php lang()->p( "Include detailed information about the website for search engines and for embedding URLs. Go to the <a href='{$guide_page}'>Meta Data guide</a> page." ); ?></p>

<nav id="nav-tabs">
	<ul class="nav nav-tabs" id="nav-tab" role="tablist">
		<li class="nav-item">
			<a id="nav-meta-tags-tab" href="#meta-tags" class="nav-link active" data-toggle="tab" role="tab" aria-controls="nav-meta-tags" aria-selected="false">
				<?php lang()->p( 'Meta Tags' ); ?>
			</a>
		</li>
		<li class="nav-item">
			<a id="nav-title-tags-tab" href="#title-tags" class="nav-link" data-toggle="tab" role="tab" aria-controls="title-tags" aria-selected="false">
				<?php lang()->p( 'Title Tags' ); ?>
			</a>
		</li>
	</ul>
</nav>

<div id="tab-content" class="tab-content">

	<div id="meta-tags" class="tab-pane fade show active" role="tabpanel" aria-labelledby="meta-tags-tab">

		<h3 class="form-heading"><?php lang()->p( 'Meta Tag Options' ); ?></h3>

		<p><?php lang()->p( 'Select which types of meta tags are enabled.' ); ?></p>

		<fieldset>
			<legend class="screen-reader-text"><?php lang()->p( 'Meta Tags' ); ?>	</legend>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="meta_noindex"><?php lang()->p( 'No Index' ); ?></label>
				<div class="col-sm-10">
					<select class="form-select" id="meta_noindex" name="meta_noindex">
						<option value="true" <?php echo ( plugin()->getValue( 'meta_noindex' ) === true ? 'selected' : '' ); ?>><?php lang()->p( 'Enabled' ); ?></option>
						<option value="false" <?php echo ( plugin()->getValue( 'meta_noindex' ) === false ? 'selected' : '' ); ?>><?php lang()->p( 'Disabled' ); ?></option>
					</select>
					<small class="form-text"><?php lang()->p( 'Add tag to discourage search engines indexing this site.' ); ?></small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="meta_use_std"><?php lang()->p( 'Standard Tags' ); ?></label>
				<div class="col-sm-10">
					<select class="form-select" id="meta_use_std" name="meta_use_std">
						<option value="true" <?php echo ( plugin()->getValue( 'meta_use_std' ) === true ? 'selected' : '' ); ?>><?php lang()->p( 'Enabled' ); ?></option>
						<option value="false" <?php echo ( plugin()->getValue( 'meta_use_std' ) === false ? 'selected' : '' ); ?>><?php lang()->p( 'Disabled' ); ?></option>
					</select>
					<small class="form-text"><?php lang()->p( 'Basic website meta.' ); ?></small>
				</div>
			</div>

			<div id="std-wrap" style="display: <?php echo ( plugin()->getValue( 'meta_use_std' ) === true ? 'block' : 'none' ); ?>;">
				<div class="form-field form-group row">
					<label class="form-label col-sm-2 col-form-label" for="meta_keywords"><?php lang()->p( 'Keywords' ); ?></label>
					<div class="col-sm-10">
						<p><small class="form-text"><?php lang()->p( 'Add one keyword or phrase per line.' ); ?></small></p>
						<textarea id="meta_keywords" name="meta_keywords" placeholder="" cols="60" rows="4"><?php echo plugin()->getValue( 'meta_keywords' ) ?></textarea>
					</div>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="meta_use_schema"><?php lang()->p( 'Schema Data' ); ?></label>
				<div class="col-sm-10">
					<select class="form-select" id="meta_use_schema" name="meta_use_schema">
						<option value="true" <?php echo ( plugin()->getValue( 'meta_use_schema' ) === true ? 'selected' : '' ); ?>><?php lang()->p( 'Enabled' ); ?></option>
						<option value="false" <?php echo ( plugin()->getValue( 'meta_use_schema' ) === false ? 'selected' : '' ); ?>><?php lang()->p( 'Disabled' ); ?></option>
					</select>
					<small class="form-text"><?php lang()->p( 'Used in conjunction with other Schema data throughout the theme.' ); ?></small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="meta_use_og"><?php lang()->p( 'Open Graph' ); ?></label>
				<div class="col-sm-10">
					<select class="form-select" id="meta_use_og" name="meta_use_og">
						<option value="true" <?php echo ( plugin()->getValue( 'meta_use_og' ) === true ? 'selected' : '' ); ?>><?php lang()->p( 'Enabled' ); ?></option>
						<option value="false" <?php echo ( plugin()->getValue( 'meta_use_og' ) === false ? 'selected' : '' ); ?>><?php lang()->p( 'Disabled' ); ?></option>
					</select>
					<small class="form-text"><?php lang()->p( 'Used primarily for embedding URLs; includes Facebook.' ); ?></small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="meta_use_twitter"><?php lang()->p( 'X/Twitter Cards' ); ?></label>
				<div class="col-sm-10">
					<select class="form-select" id="meta_use_twitter" name="meta_use_twitter">
						<option value="true" <?php echo ( plugin()->getValue( 'meta_use_twitter' ) === true ? 'selected' : '' ); ?>><?php lang()->p( 'Enabled' ); ?></option>
						<option value="false" <?php echo ( plugin()->getValue( 'meta_use_twitter' ) === false ? 'selected' : '' ); ?>><?php lang()->p( 'Disabled' ); ?></option>
					</select>
					<small class="form-text"><?php lang()->p( 'Used specifically for embedding URLs in X/Twitter.' ); ?></small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="meta_use_dublin"><?php lang()->p( 'Dublin Core' ); ?></label>
				<div class="col-sm-10">
					<select class="form-select" id="meta_use_dublin" name="meta_use_dublin">
						<option value="true" <?php echo ( plugin()->getValue( 'meta_use_dublin' ) === true ? 'selected' : '' ); ?>><?php lang()->p( 'Enabled' ); ?></option>
						<option value="false" <?php echo ( plugin()->getValue( 'meta_use_dublin' ) === false ? 'selected' : '' ); ?>><?php lang()->p( 'Disabled' ); ?></option>
					</select>
				</div>
			</div>

			<h3 class="form-heading"><?php lang()->p( 'Custom Code' ); ?></h3>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="meta_custom"><?php lang()->p( 'Custom Tags' ); ?></label>
				<div class="col-sm-10">
					<p><small class="form-text"><?php lang()->p( 'Prints to the <code>&lt;head&gt;</code> with other meta tags.' ); ?></small></p>
					<textarea class="code-field" id="meta_custom" name="meta_custom" placeholder="" cols="60" rows="4"><?php echo plugin()->getValue( 'meta_custom' ) ?></textarea>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="footer_scripts"><?php lang()->p( 'Footer Scripts' ); ?></label>
				<div class="col-sm-10">
					<p><small class="form-text"><?php lang()->p( 'Useful for analytics code.' ); ?></small></p>
					<textarea class="code-field" id="footer_scripts" name="footer_scripts" placeholder="" cols="60" rows="4"><?php echo plugin()->getValue( 'footer_scripts' ) ?></textarea>
				</div>
			</div>
		</fieldset>
	</div>

	<div id="title-tags" class="tab-pane fade show" role="tabpanel" aria-labelledby="title-tags-tab">

		<h3 class="form-heading"><?php lang()->p( 'Title Tag Options' ); ?></h3>

		<p><?php lang()->p( 'Used by search engines as well as browser tabs.' ); ?></p>

		<fieldset>

			<legend class="screen-reader-text"><?php lang()->p( 'Title Tags' ); ?></legend>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="title_sep"><?php lang()->p( 'Title Separator' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<select class="form-select" id="title_sep" name="title_sep">

							<option value="|" <?php echo ( plugin()->getValue( 'title_sep' ) === '|' ? 'selected' : '' ); ?>><?php lang()->p( 'Pipe' ); ?> ( | )</option>

							<option value="—" <?php echo ( plugin()->getValue( 'title_sep' ) === '—' ? 'selected' : '' ); ?>><?php lang()->p( 'Dash' ); ?> ( — )</option>

							<option value="&gt;" <?php echo ( plugin()->getValue( 'title_sep' ) === '&gt;' ? 'selected' : '' ); ?>><?php lang()->p( 'Angle' ); ?> ( &gt; )</option>

							<option value="≫" <?php echo ( plugin()->getValue( 'title_sep' ) === '≫' ? 'selected' : '' ); ?>><?php lang()->p( 'Double' ); ?> ( &#8811; )</option>

							<option value="→" <?php echo ( plugin()->getValue( 'title_sep' ) === '→' ? 'selected' : '' ); ?>><?php lang()->p( 'Arrow' ); ?> ( <?php echo ( is_rtl() ? '←' : '→' ); ?> )</option>

							<option value="custom" <?php echo ( plugin()->getValue( 'title_sep' ) === 'custom' ? 'selected' : '' ); ?>><?php lang()->p( 'Custom' ); ?></option>
						</select>
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#title_sep').val('<?php echo plugin()->dbFields['title_sep']; ?>');$( '#custom_sep' ).val('');$( '#custom_sep_wrap' ).fadeOut( 250 );"><?php lang()->p( 'Default' ); ?></span>
					</div>
					<small class="form-text"><?php lang()->p( 'Directional characters are adjusted for language direction.' ); ?></small>
				</div>
			</div>

			<div id="custom_sep_wrap" style="display: <?php echo ( plugin()->getValue( 'title_sep' ) === 'custom' ? 'block' : 'none' ); ?>;">
				<div class="form-field form-group row">
					<label class="form-label col-sm-2 col-form-label" for="custom_sep"><?php lang()->p( 'Custom Separator' ); ?></label>
					<div class="col-sm-10">
						<input type="text" id="custom_sep" name="custom_sep" value="<?php echo plugin()->getValue( 'custom_sep' ); ?>" placeholder="<?php echo plugin()->dbFields['custom_sep']; ?>" />
						<small class="form-text"><?php lang()->p( 'Paste or type in the custom separator character.' ); ?></small>
					</div>
				</div>
			</div>

			<h3 class="form-heading"><?php lang()->p( 'Left-to-Right Titles' ); ?></h3>

			<p><?php lang()->p( 'Title formats for left-to-right languages.' ); ?></p>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="default_ttag"><?php lang()->p( 'LTR Default Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="default_ttag" name="default_ttag" value="<?php echo plugin()->getValue( 'default_ttag' ); ?>" placeholder="{{site-title}} {{separator}} {{site-slogan}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#default_ttag').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
					</small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="loop_ttag"><?php lang()->p( 'LTR Loop Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="loop_ttag" name="loop_ttag" value="<?php echo plugin()->getValue( 'loop_ttag' ); ?>" placeholder="{{loop-type}} {{page-number}} {{separator}} {{site-title}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#loop_ttag').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{loop-type}}</code>
						<code class="select">{{page-number}}</code>
					</small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="post_ttag"><?php lang()->p( 'LTR Post Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="post_ttag" name="post_ttag" value="<?php echo plugin()->getValue( 'post_ttag' ); ?>" placeholder="{{page-title}} {{separator}} {{published}} {{separator}} {{site-title}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#post_ttag').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{page-title}}</code>
						<code class="select">{{page-description}}</code>
						<code class="select">{{published}}</code>
					</small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="page_ttag"><?php lang()->p( 'LTR Page Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="page_ttag" name="page_ttag" value="<?php echo plugin()->getValue( 'page_ttag' ); ?>" placeholder="{{page-title}} {{separator}} {{site-title}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#page_ttag').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{page-title}}</code>
						<code class="select">{{page-description}}</code>
					</small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="cat_ttag"><?php lang()->p( 'LTR Category Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="cat_ttag" name="cat_ttag" value="<?php echo plugin()->getValue( 'cat_ttag' ); ?>" placeholder="{{category-name}} {{separator}} {{site-title}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#cat_ttag').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{category-name}}</code>
						<code class="select">{{page-number}}</code>
					</small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="tag_ttag"><?php lang()->p( 'LTR Tag Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="tag_ttag" name="tag_ttag" value="<?php echo plugin()->getValue( 'tag_ttag' ); ?>" placeholder="{{tag-name}} {{separator}} {{site-title}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#tag_ttag').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{tag-name}}</code>
						<code class="select">{{page-number}}</code>
					</small>
				</div>
			</div>

			<?php if ( can_search() ) : ?>
			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="search_ttag"><?php lang()->p( 'LTR Search Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="search_ttag" name="search_ttag" value="<?php echo plugin()->getValue( 'search_ttag' ); ?>" placeholder="<?php lang()->p( 'Searching' ); ?> {{search-terms}} {{separator}} {{site-title}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#search_ttag').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{search-terms}}</code>
						<code class="select">{{page-number}}</code>
					</small>
				</div>
			</div>
			<?php endif; ?>

			<?php if ( ! $site->pageNotFound() ) : ?>
			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="error_ttag"><?php lang()->p( 'LTR 404 Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="error_ttag" name="error_ttag" value="<?php echo plugin()->getValue( 'error_ttag' ); ?>" placeholder="<?php lang()->p( 'URL Not Found' ); ?> {{separator}} {{site-title}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#error_ttag').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
					</small>
				</div>
			</div>
			<?php endif; ?>

			<h3 class="form-heading"><?php lang()->p( 'Right-to-Left Titles' ); ?></h3>

			<p><?php lang()->p( 'Title formats for right-to-left languages.' ); ?></p>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="default_ttag_rtl"><?php lang()->p( 'RTL Default Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="default_ttag_rtl" name="default_ttag_rtl" value="<?php echo plugin()->getValue( 'default_ttag_rtl' ); ?>" placeholder="{{site-slogan}} {{separator}} {{site-title}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#default_ttag_rtl').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
					</small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="loop_ttag_rtl"><?php lang()->p( 'RTL Loop Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="loop_ttag_rtl" name="loop_ttag_rtl" value="<?php echo plugin()->getValue( 'loop_ttag_rtl' ); ?>" placeholder="{{site-title}} {{separator}} {{page-number}} {{loop-type}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#loop_ttag_rtl').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{loop-type}}</code>
						<code class="select">{{page-number}}</code>
					</small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="post_ttag_rtl"><?php lang()->p( 'RTL Post Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="post_ttag_rtl" name="post_ttag_rtl" value="<?php echo plugin()->getValue( 'post_ttag_rtl' ); ?>" placeholder="{{site-title}} {{separator}} {{published}} {{separator}} {{page-title}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#post_ttag_rtl').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{page-title}}</code>
						<code class="select">{{page-description}}</code>
						<code class="select">{{published}}</code>
					</small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="page_ttag_rtl"><?php lang()->p( 'RTL Page Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="page_ttag_rtl" name="page_ttag_rtl" value="<?php echo plugin()->getValue( 'page_ttag_rtl' ); ?>" placeholder="{{site-title}} {{separator}} {{page-title}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#page_ttag_rtl').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{page-title}}</code>
						<code class="select">{{page-description}}</code>
					</small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="cat_ttag_rtl"><?php lang()->p( 'RTL Category Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="cat_ttag_rtl" name="cat_ttag_rtl" value="<?php echo plugin()->getValue( 'cat_ttag_rtl' ); ?>" placeholder="{{site-title}} {{separator}} {{category-name}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#cat_ttag_rtl').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{category-name}}</code>
						<code class="select">{{page-number}}</code>
					</small>
				</div>
			</div>

			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="tag_ttag_rtl"><?php lang()->p( 'RTL Tag Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="tag_ttag_rtl" name="tag_ttag_rtl" value="<?php echo plugin()->getValue( 'tag_ttag_rtl' ); ?>" placeholder="{{site-title}} {{separator}} {{tag-name}}" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#tag_ttag_rtl').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{tag-name}}</code>
						<code class="select">{{page-number}}</code>
					</small>
				</div>
			</div>

			<?php if ( can_search() ) : ?>
			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="search_ttag_rtl"><?php lang()->p( 'RTL Search Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="search_ttag_rtl" name="search_ttag_rtl" value="<?php echo plugin()->getValue( 'search_ttag_rtl' ); ?>" placeholder="{{site-title}} {{separator}} {{search-terms}} <?php lang()->p( 'Searching' ); ?>" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#search_ttag_rtl').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
						<code class="select">{{search-terms}}</code>
						<code class="select">{{page-number}}</code>
					</small>
				</div>
			</div>
			<?php endif; ?>

			<?php if ( ! $site->pageNotFound() ) : ?>
			<div class="form-field form-group row">
				<label class="form-label col-sm-2 col-form-label" for="error_ttag_rtl"><?php lang()->p( 'RTL 404 Title' ); ?></label>
				<div class="col-sm-10">
					<div class="field-has-buttons">
						<input type="text" id="error_ttag_rtl" name="error_ttag_rtl" value="<?php echo plugin()->getValue( 'error_ttag_rtl' ); ?>" placeholder="{{site-title}} {{separator}} <?php lang()->p( 'URL Not Found' ); ?>" />
						<span class="btn btn-secondary btn-md form-range-button hide-if-no-js" onClick="$('#error_ttag_rtl').val('');"><?php lang()->p( 'Clear' ); ?></span>
					</div>
					<small class="form-text">
						<span class=""><?php lang()->p( 'Placeholders:' ); ?> </span>
						<code class="select">{{separator}}</code>
						<code class="select">{{site-title}}</code>
						<code class="select">{{site-slogan}}</code>
						<code class="select">{{site-description}}</code>
					</small>
				</div>
			</div>
			<?php endif; ?>
		</fieldset>
	</div>
</div>

<script>
// Open current tab after refresh page
$(function() {
	$('a[data-toggle="tab"]').on('click', function(e) {
		window.localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = window.localStorage.getItem('activeTab');
	if (activeTab) {
		$('#nav-tabs a[href="' + activeTab + '"]').tab('show');
		//window.localStorage.removeItem("activeTab");
	}
});

jQuery(document).ready( function($) {
	$( '#meta_use_std' ).on( 'change', function() {
		var show = $(this).val();
		if ( show == 'true' ) {
			$( "#std-wrap" ).fadeIn( 250 );
		} else if ( show == 'false' ) {
			$( "#std-wrap" ).fadeOut( 250 );
		}
	});
	$( '#title_sep' ).on( 'change', function() {
		var show = $(this).val();
		if ( show == 'custom' ) {
			$( "#custom_sep_wrap" ).fadeIn( 250 );
		} else if ( show != 'custom' ) {
			$( "#custom_sep_wrap" ).fadeOut( 250 );
		}
	});
});
</script>
