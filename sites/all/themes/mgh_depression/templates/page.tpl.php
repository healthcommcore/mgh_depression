<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<header class="white-wrapper" role="banner">
		<div class="container">
			<?php if ($logo): ?>
				<div class="row">
					<div class="col-sm-4">
					  <div class="mgh-gradient header-padding clearfix">
						<a class="mgh-logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
							<img class="img-responsive" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
						</a>
					</div>
					</div>
					<div class="col-sm-8">
            <div class="header-padding">
						<a class="dept-logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
							<img class="img-responsive hidden-xs" src="/sites/default/files/images/depression_clinical_header.gif" alt="<?php print t('Home'); ?>" />
							<img class="img-responsive visible-xs" src="/sites/default/files/images/depression_clinical_header_phone.gif" alt="<?php print t('Home'); ?>" />
						</a>
					</div>
					</div>
				</div><!-- row -->
			<?php endif; ?>
		</div><!-- container -->
</header>
<div class="nav-wrapper navbar-color nav-font">
	<div class="container">
		<div id="navbar" role="navigation" class="<?php print $navbar_classes; ?>">


						<?php if (!empty($site_name)): ?>
						<a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
						<?php endif; ?>

						<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

				<?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
					<div class="navbar-collapse collapse pull-left">
						<nav>
							<?php if (!empty($primary_nav)): ?>
								<?php print render($primary_nav); ?>
							<?php endif; ?>
							<?php if (!empty($secondary_nav)): ?>
								<?php print render($secondary_nav); ?>
							<?php endif; ?>
							<?php if (!empty($page['navigation'])): ?>
								<?php print render($page['navigation']); ?>
							<?php endif; ?>
						</nav>
					</div>
				<?php endif; ?>
				<?php if (!empty($page['search'])): ?>
					<div class="pull-right col-sm-2 col-md-2 col-lg-3">
						<?php print render($page['search']); ?>
					</div>
				<?php endif; ?>
		</div><!-- navbar -->
	</div><!-- container -->
</div><!-- nav-wrapper -->
<div class="white-wrapper">
	<div class="container">
    <?php if( !empty($page['home_images']) ) : ?>
      <div class="home-images">
        <?php print render($page['home_images']); ?>
      </div>
	  <?php endif; ?>
  </div>
	<?php if( !empty($page['home_feature']) ) : ?>
		<div class="container">
		<div class="home-feature-center">
				<?php print render($page['home_feature']); ?>
		</div>
		</div>
	<?php endif; ?>

	<?php if( !drupal_is_front_page()) : ?>
<?php
  $studies = '';
  if ( isset($node) && $node->type == 'studies') {
    $studies = ' reduced';
  }
?>
		<?php if (!empty($title)): ?>
			<header class="title-bkgrd">
				<div class="container">
          <h1 class="col-md-offset-3<?php echo $studies; ?>"><?php print $title; ?></h1>
				</div>
			</header>
		<?php endif; ?>
	<?php endif; ?>

	<div class="container">

		<header role="banner" id="page-header">
			<?php if (!empty($site_slogan)): ?>
				<p class="lead"><?php print $site_slogan; ?></p>
			<?php endif; ?>

			<?php print render($page['header']); ?>
		</header> <!-- /#page-header -->

		<div class="row">

			<?php if (!empty($page['sidebar_first'])): ?>
				<div class="col-sm-3 hidden-xs" >
					<aside id="sidebar" class="sidebar" role="complementary">
						<?php print render($page['sidebar_first']); ?>
					</aside>  <!-- /#sidebar-first -->
				</div>
			<?php endif; ?>

				<section id="main-content"<?php print $content_column_class; ?>>
					<?php if (!empty($page['landing_img'])) : ?>
						<div class="row">
							<?php print render($page['landing_img']); ?>
						</div>
					<?php endif; ?>
          <?php $padding = $is_front ? '' : 'main-content-padding'; ?>
          <div class="<?php print $padding; ?>">
					<?php if (!empty($page['highlighted'])): ?>
						<div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
					<?php endif; ?>
					<?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
					<a id="main-content"></a>
					<?php print render($title_prefix); ?>
					<?php print render($title_suffix); ?>
					<?php print $messages; ?>
					<?php if (!empty($tabs)): ?>
						<?php print render($tabs); ?>
					<?php endif; ?>
					<?php if (!empty($page['help'])): ?>
						<?php print render($page['help']); ?>
					<?php endif; ?>
					<?php if (!empty($action_links)): ?>
						<ul class="action-links"><?php print render($action_links); ?></ul>
					<?php endif; ?>
					<?php if (!empty($page['page_lead_in'])): ?>
						<div class="lead-in">
							<?php print render($page['page_lead_in']); ?>
						</div>
					<?php endif; ?>
					<?php print render($page['content']); ?>
					</div>
				</section>

			<?php if (!empty($page['sidebar_second'])): ?>
				<aside class="col-sm-3" role="complementary">
					<?php print render($page['sidebar_second']); ?>
				</aside>  <!-- /#sidebar-second -->
			<?php endif; ?>

		</div>
	</div>
</div><!-- white-wrapper -->
<footer class="footer container">
  <?php if( !empty($page['footer_logos']) ) : ?>
    <div class="footer-logos">
      <div class="row">
        <?php print render($page['footer_logos']); ?>
      </div>
    </div>
  <?php endif; ?>
  <?php if( !empty($page['footer_links']) ) : ?>
    <div class="footer-links">
      <div class="row">
        <?php print render($page['footer_links']); ?>
      </div>
    </div>
  <?php endif; ?>
</footer>