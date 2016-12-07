<?php
include( __DIR__ . '/variables.php' );
include( __DIR__ . '/colors.php' );
?>

<div class="wrap slate-settings">

	<?php
	if ( is_multisite() && is_plugin_active_for_network( 'custom-branding-admin/custom-branding-admin.php' ) ) {
		$custom_branding_license = get_site_option( 'custom_branding_license' );
	} else {
		$custom_branding_license = get_option( 'custom_branding_license' );
	}
	$statuses = array( '', 'removed', 'failed', 'used', 'invalid', 'oops' );
	if ( in_array( $custom_branding_license['licenseStatus'], $statuses ) ) {
		date_default_timezone_set( 'America/Los_Angeles' );
		$expire_date = time() - ( 60 * 60 * 24 * 3 );
		if ( $expire_date > strtotime( $custom_branding_settings['licenseDate'] ) ) { ?>
		
		<?php }
	} ?>

	<?php if ( isset( $_GET['settings-updated'] ) || isset( $_GET['updated'] ) ) { ?>
		<div class="updated">
			<p><strong><?php _e( 'Settings saved.' ) ?></strong></p>
		</div>
		<div class="wrap"><h2 style="display:none;"></h2></div><!-- Mtaandao Hack to show Update Notice -->

	<?php } ?>
	<form method="post" action="<?php if ( is_multisite() && is_plugin_active_for_network( 'custom-branding-admin/custom-branding-admin.php' ) ) { ?>edit.php?action=custom_branding_network<?php } else { ?>options.php<?php } ?>">

		<?php if ( is_multisite() && is_plugin_active_for_network('custom-branding-admin/custom-branding-admin.php') ) { } else { settings_fields( 'custom_branding_settings' ); } ?>

		<div id="slate__colorSchemes" class="pageSection <?php if ( 'custom_branding_color_schemes' !== $page ) { echo 'hide'; } ?>">

			<h2><?php _e( 'Color Schemes', 'custom-branding' ); ?></h2>

			<section class="premadeColors">
				<div class="colorDefault">
					<label <?php if ( 'default' == $custom_branding_settings['colorScheme'] ) { ?> class="selected"<?php } ?>>
						<input type="radio" name="custom_branding_settings[colorScheme]" value="default" <?php if ( 'default' == $custom_branding_settings['colorScheme'] ) { ?> checked="checked"<?php } ?>> <?php _e( 'Default', 'custom-branding' ); ?>
						<div><span style="background:<?php echo custom_branding_sanitize_hex( $colorDefault['adminMenuBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorDefault['adminBarBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorDefault['adminTopLevelSelectedTextColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorDefault['adminTopLevelTextHoverColor'] ) ?>;"></span></div>
					</label>
				</div>
				<div class="colorLight">
					<label <?php if ( 'light' == $custom_branding_settings['colorScheme'] ) { ?> class="selected"<?php } ?>>
						<input type="radio" name="custom_branding_settings[colorScheme]" value="light" <?php if ( 'light' == $custom_branding_settings['colorScheme'] ) { ?> checked="checked"<?php } ?>> <?php _e( 'Light', 'custom-branding' ); ?>
						<div><span style="background:<?php echo custom_branding_sanitize_hex( $colorLight['adminMenuBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorLight['adminBarBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorLight['adminTopLevelSelectedTextColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorLight['adminTopLevelTextHoverColor'] ) ?>;"></span></div>
					</label>
				</div>
				<div class="colorBlue">
					<label <?php if ( 'blue' == $custom_branding_settings['colorScheme'] ) { ?> class="selected"<?php } ?>>
						<input type="radio" name="custom_branding_settings[colorScheme]" value="blue" <?php if ( 'blue' == $custom_branding_settings['colorScheme'] ) { ?> checked="checked"<?php } ?>> <?php _e( 'Blue', 'custom-branding' ); ?>
						<div><span style="background:<?php echo custom_branding_sanitize_hex( $colorBlue['adminMenuBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorBlue['adminBarBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorBlue['adminTopLevelSelectedTextColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorBlue['adminTopLevelTextHoverColor'] ) ?>;"></span></div>
					</label>
				</div>
				<div class="colorCoffee">
					<label <?php if ( 'coffee' == $custom_branding_settings['colorScheme'] ) { ?> class="selected"<?php } ?>>
						<input type="radio" name="custom_branding_settings[colorScheme]" value="coffee" <?php if ( 'coffee' == $custom_branding_settings['colorScheme'] ) { ?> checked="checked"<?php } ?>> <?php _e( 'Coffee', 'custom-branding' ); ?>
						<div><span style="background:<?php echo custom_branding_sanitize_hex( $colorCoffee['adminMenuBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorCoffee['adminBarBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorCoffee['adminTopLevelSelectedTextColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorCoffee['adminTopLevelTextHoverColor'] ) ?>;"></span></div>
					</label>
				</div>
				<div class="colorEctoplasm">
					<label <?php if ( 'ectoplasm' == $custom_branding_settings['colorScheme'] ) { ?> class="selected"<?php } ?>>
						<input type="radio" name="custom_branding_settings[colorScheme]" value="ectoplasm" <?php if ( 'ectoplasm' == $custom_branding_settings['colorScheme'] ) { ?> checked="checked"<?php } ?>> <?php _e( 'Ectoplasm', 'custom-branding' ); ?>
						<div><span style="background:<?php echo custom_branding_sanitize_hex( $colorEctoplasm['adminMenuBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorEctoplasm['adminBarBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorEctoplasm['adminTopLevelSelectedTextColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorEctoplasm['adminTopLevelTextHoverColor'] ) ?>;"></span></div>
					</label>
				</div>
				<div class="colorMidnight">
					<label <?php if ( 'midnight' == $custom_branding_settings['colorScheme'] ) { ?> class="selected"<?php } ?>>
						<input type="radio" name="custom_branding_settings[colorScheme]" value="midnight" <?php if ( 'midnight' == $custom_branding_settings['colorScheme'] ) { ?> checked="checked"<?php } ?>> <?php _e( 'Midnight', 'custom-branding' ); ?>
						<div><span style="background:<?php echo custom_branding_sanitize_hex( $colorMidnight['adminMenuBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorMidnight['adminBarBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorMidnight['adminTopLevelSelectedTextColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorMidnight['adminTopLevelTextHoverColor'] ) ?>;"></span></div>
					</label>
				</div>
				<div class="colorOcean">
					<label <?php if ( 'ocean' == $custom_branding_settings['colorScheme'] ) { ?> class="selected"<?php } ?>>
						<input type="radio" name="custom_branding_settings[colorScheme]" value="ocean" <?php if ( 'ocean' == $custom_branding_settings['colorScheme'] ) { ?> checked="checked"<?php } ?>> <?php _e( 'Ocean', 'custom-branding' ); ?>
						<div><span style="background:<?php echo custom_branding_sanitize_hex( $colorOcean['adminMenuBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorOcean['adminBarBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorOcean['adminTopLevelSelectedTextColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorOcean['adminTopLevelTextHoverColor'] ) ?>;"></span></div>
					</label>
				</div>
				<div class="colorSunrise">
					<label <?php if ( 'sunrise' == $custom_branding_settings['colorScheme'] ) { ?> class="selected"<?php } ?>>
						<input type="radio" name="custom_branding_settings[colorScheme]" value="sunrise" <?php if ( 'sunrise' == $custom_branding_settings['colorScheme'] ) { ?> checked="checked"<?php } ?>> <?php _e( 'Sunrise', 'custom-branding' ); ?>
						<div><span style="background:<?php echo custom_branding_sanitize_hex( $colorSunrise['adminMenuBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorSunrise['adminBarBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorSunrise['adminTopLevelSelectedTextColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorSunrise['adminTopLevelTextHoverColor'] ) ?>;"></span></div>
					</label>
				</div>
				<div class="colorCustom">
					<label <?php if ( 'custom' == $custom_branding_settings['colorScheme'] ) { ?> class="selected"<?php } ?>>
						<input type="radio" name="custom_branding_settings[colorScheme]" value="custom" <?php if ( 'custom' == $custom_branding_settings['colorScheme'] ) { ?> checked="checked"<?php } ?>> <?php _e( 'Custom', 'custom-branding' ); ?>
						<div><span style="background:<?php echo custom_branding_sanitize_hex( $colorCustom['adminMenuBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorCustom['adminBarBgColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorCustom['adminTopLevelSelectedTextColor'] ) ?>;"></span><span style="background: <?php echo custom_branding_sanitize_hex( $colorCustom['adminTopLevelTextHoverColor'] ) ?>;"></span></div>
					</label>
				</div>
			</section>

			<!-- Color Nav -->
			<div class="colorNav">
				<h3><?php _e( 'Custom Color Options', 'custom-branding' ); ?></h3>
				<ul>
					<li class="loginPageColors"><a class="nav-tab selected" href="#"><?php _e( 'Login Page', 'custom-branding' ); ?></a></li>
					<li class="adminMenuColors"><a class="nav-tab" href="#"><?php _e( 'Admin Menu', 'custom-branding' ); ?></a></li>
					<li class="adminBarColors"><a class="nav-tab" href="#"><?php _e( 'Admin Bar', 'custom-branding' ); ?></a></li>
					<li class="adminFooterColors"><a class="nav-tab" href="#"><?php _e( 'Admin Footer', 'custom-branding' ); ?></a></li>
					<li class="adminContentColors"><a class="nav-tab" href="#"><?php _e( 'Content', 'custom-branding' ); ?></a></li>
					<li class="adminSidebarColors"><a class="nav-tab" href="#"><?php _e( 'Sidebar/Sortables', 'custom-branding' ); ?></a></li>
				</ul>
			</div>
			<!-- Login Page -->
			<section class="colorSection loginPageColors" <?php if ( 'custom' == $custom_branding_settings['colorScheme'] ) { ?> style="display: block;"<?php } ?>>
				<?php colorSection( $colorSectionLoginPage, $colorCustom ) ?>
			</section>

			<!-- Admin Menu -->
			<section class="colorSection adminMenuColors">
				<?php colorSection( $colorSectionAdminMenu, $colorCustom ) ?>
			</section>

			<!-- Admin Bar -->
			<section class="colorSection adminBarColors">
				<?php colorSection( $colorSectionAdminBar, $colorCustom ) ?>
			</section>

			<!-- Footer -->
			<section class="colorSection adminFooterColors">
				<?php colorSection( $colorSectionAdminFooter, $colorCustom ) ?>
			</section>

			<!-- Content -->
			<section class="colorSection adminContentColors">
				<?php colorSection( $colorSectionContent, $colorCustom ) ?>
			</section>

			<!-- Sidebar -->
			<section class="colorSection adminSidebarColors">
				<?php colorSection( $colorSectionSidebar, $colorCustom ) ?>
			</section>

			<section>
				<ul>
					<li>
						<label>
							<input name="custom_branding_settings[colorsHideUserProfileColors]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['colorsHideUserProfileColors'] ), 'on' ); ?>>
							<?php _e( 'Hide “Admin Color Scheme” Options on User Profile Pages', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input name="custom_branding_settings[colorsHideShadows]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['colorsHideShadows'] ), 'on' ); ?>>
							<?php _e( 'Hide Admin Menu and Sidebar Shadows', 'custom-branding' ); ?>
						</label>
					</li>
				</ul>
			</section>

			<?php submit_button(); ?>

		</div>

		<div id="slate__branding" class="pageSection <?php if ( 'custom_branding_branding' !== $page ) { echo 'hide'; } ?>">
			<h2><?php _e( 'Branding', 'custom-branding' ); ?></h2>

			<section>
				<h3><?php _e( 'Login Page Logo Link Title and Address', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<label><?php _e( 'Link Title', 'custom-branding' ); ?> <input type="text" name="custom_branding_settings[loginLinkTitle]" value="<?php echo esc_attr( $loginLinkTitle ); ?>"></label>
					</li>
					<li>
						<label><?php _e( 'Link Address', 'custom-branding' ); ?> <input type="text" name="custom_branding_settings[loginLinkUrl]" value="<?php echo esc_attr( $loginLinkUrl ); ?>"></label>
					</li>
				</ul>
			</section>

			<section>
				<h3><?php _e( 'Login Page Logo', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<div id="slate__loginLogoImage" class="imageContainer">
							<?php echo mn_kses_post( $loginLogo ); ?>
						</div>
						<input type="text" class="imageValue" id="slate__loginLogo" name="custom_branding_settings[loginLogo]" value="<?php echo esc_url( $custom_branding_settings['loginLogo'] ); ?>" placeholder="Image Address" />
					</li>
					<li class="slate__selectLoginLogo">
						<a href="#" class="button imageSelect"><?php _e( 'Select Image', 'custom-branding' ); ?></a>
						<a href="#" class="imageDelete" <?php echo mn_kses_post( $loginLogoDelete ); ?>><?php _e( 'Delete Image', 'custom-branding' ); ?></a>
					</li>
					<li class="slate__description">
						<?php _e( 'Make sure the image is no greater than 320 pixels wide by 80 pixels high.', 'custom-branding' ); ?>
					</li>
					<li>
						<label>
							<input name="custom_branding_settings[loginLogoHide]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['loginLogoHide'] ), 'on' ); ?>>
							<?php _e( 'Hide the Login Logo', 'custom-branding' ); ?>
						</label>
					</li>
				</ul>
			</section>

			<section>
				<h3><?php _e( 'Login Page Background Image', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<div id="slate__loginBgImage" class="imageContainer">
							<?php echo mn_kses_post( $loginBgImage ); ?>
						</div>
						<input type="text" class="imageValue" id="slate__loginBg" name="custom_branding_settings[loginBgImage]" value="<?php echo esc_url( $custom_branding_settings['loginBgImage'] ); ?>" placeholder="Image Address" />
					</li>
					<li class="slate__selectLoginBg">
						<a href="#" class="button imageSelect"><?php _e( 'Select Image', 'custom-branding' ); ?></a>
						<a href="#" class="imageDelete" <?php echo mn_kses_post( $loginBgImageDelete ); ?>><?php _e( 'Delete Image', 'custom-branding' ); ?></a>
					</li>
					<li>
						<!-- <p class="slate__description"><?php _e( 'Your logo should be no larger than 320px by 80px or else it will be resized on the login screen.', 'custom-branding' ); ?></p> -->
					</li>
					<li>
						<label>
							<select name="custom_branding_settings[loginBgPosition]">
								<?php
								$lbp = array(
									'left top' => 'Left Top',
									'left center' => 'Left Center',
									'left bottom' => 'Left Bottom',
									'center top' => 'Center Top',
									'center center' => 'Center Center',
									'center bottom' => 'Center Bottom',
									'right top' => 'Right Top',
									'right center' => 'Right Center',
									'right bottom' => 'Right Bottom',
									);
								foreach ( $lbp as $key => $value ) {
									?>
									<option value="<?php echo esc_attr( $key ); ?>"<?php if ( ( $loginBgPosition ) == $key ) { ?> selected="selected"<?php } ?>><?php echo esc_attr( $value ); ?></option>
									<?php
								}
								?>
							</select>
							<?php _e( 'Background Position', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<select name="custom_branding_settings[loginBgRepeat]">
								<?php
								$lbr = array(
									'no-repeat' => 'No Repeat',
									'repeat' => 'Repeat',
									'repeat-x' => 'Repeat Only Horizontally',
									'repeat-y' => 'Repeat Only Vertically',
									);
								foreach ( $lbr as $key => $value ) {
									?>
									<option value="<?php echo esc_attr( $key ); ?>"<?php if ( $loginBgRepeat == $key ) { ?> selected="selected"<?php } ?>><?php echo esc_attr( $value ); ?></option>
									<?php
								}
								?>
							</select>
							<?php _e( 'Background Repeat', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input name="custom_branding_settings[loginBgFull]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['loginBgFull'] ), 'on' ); ?>>
							<?php _e( 'Make the Background Image Fill the Page', 'custom-branding' ); ?>
						</label>
					</li>
				</ul>
			</section>

			<section>
				<h3><?php _e( 'Full Width Menu Logo', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<div id="slate__adminLogoImage" class="imageContainer">
							<?php echo mn_kses_post( $adminLogo ); ?>
						</div>
						<input type="text" class="imageValue" id="slate__adminLogo" name="custom_branding_settings[adminLogo]" value="<?php echo esc_url( $custom_branding_settings['adminLogo'] ); ?>" placeholder="Image Address" />
					</li>
					<li class="slate__selectAdminLogo">
						<a href="#" class="button imageSelect"><?php _e( 'Select Image', 'custom-branding' ); ?></a>
						<a href="#" class="imageDelete" <?php echo mn_kses_post( $adminLogoDelete ); ?>><?php _e( 'Delete Image', 'custom-branding' ); ?></a>
					</li>
					<li class="slate__description">
						<?php _e( 'Make sure the image is no wider than 200 pixels. Double it for high resolution.', 'custom-branding' ); ?>
					</li>
				</ul>
			</section>

			<section>
				<h3><?php _e( 'Collapsed Menu Logo', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<div id="slate__adminLogoFoldedImage" class="imageContainer">
							<?php echo mn_kses_post( $adminLogoFolded ); ?>
						</div>
						<input type="text" class="imageValue" id="slate__adminLogoFolded" name="custom_branding_settings[adminLogoFolded]" value="<?php echo esc_url( $custom_branding_settings['adminLogoFolded'] ); ?>" placeholder="Image Address" />
					</li>
					<li class="slate__selectAdminLogoFolded">
						<a href="#" class="button imageSelect"><?php _e( 'Select Image', 'custom-branding' ); ?></a>
						<a href="#" class="imageDelete" <?php echo mn_kses_post( $adminLogoFoldedDelete ); ?>><?php _e( 'Delete Image', 'custom-branding' ); ?></a>
					</li>
					<li class="slate__description">
						<?php _e( 'Make sure the image is no wider than 36 pixels. Double it for high resolution.', 'custom-branding' ); ?>
					</li>
				</ul>
			</section>

			<section>
				<h3><?php _e( 'Favicon', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<div id="slate__adminFaviconImage" class="imageContainer">
							<?php echo mn_kses_post( $adminFavicon ); ?>
						</div>
						<input type="hidden" class="imageValue" id="slate__adminFavicon" name="custom_branding_settings[adminFavicon]" value="<?php echo esc_url( $custom_branding_settings['adminFavicon'] ); ?>" placeholder="Image Address" />
					</li>
					<li class="slate__selectAdminFavicon">
						<a href="#" class="button imageSelect"><?php _e( 'Select Image', 'custom-branding' ); ?></a>
						<a href="#" class="imageDelete" <?php echo mn_kses_post( $adminFaviconDelete ); ?>><?php _e( 'Delete Image', 'custom-branding' ); ?></a>
					</li>
					<li class="slate__description">
						<?php _e( 'Make sure the image exactly 16 pixels high and 16 pixels wide.', 'custom-branding' ); ?>
					</li>
				</ul>
			</section>
			<?php submit_button(); ?>

		</div>

		<div id="slate__dashboard" class="pageSection <?php if ( 'custom_branding_dashboard' !== $page ) { echo 'hide'; } ?>">

			<h2><?php _e( 'Dashboard', 'custom-branding' ); ?></h2>

			<section>
				<h3><?php _e( 'Welcome Message', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<label>
							<input name="custom_branding_settings[dashboardHideWelcome]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['dashboardHideWelcome'] ), 'on' ); ?>>
							<?php _e( 'Hide the Dashboard Welcome Message', 'custom-branding' ); ?>
						</label>
					</li>
				</ul>
			</section>

			<section>
				<h3><?php _e( 'Custom Widget', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<label>
							<input name="custom_branding_settings[dashboardCustomWidget]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['dashboardCustomWidget'] ), 'on' ); ?>>
							<?php _e( 'Show a Custom Widget on the Dashboard', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label><?php _e( 'Widget Title', 'custom-branding' ); ?> <input type="text" name="custom_branding_settings[dashboardCustomWidgetTitle]" value="<?php echo esc_attr( $dashboardCustomWidgetTitle ); ?>"></label>
					</li>
					<li>
						<label><?php _e( 'Widget Content (HTML Allowed)', 'custom-branding' ); ?>
							<textarea name="custom_branding_settings[dashboardCustomWidgetText]"><?php echo mn_kses_post( force_balance_tags( $dashboardCustomWidgetText ) ); ?></textarea>
						</label>
					</li>
				</ul>
			</section>

			<section>
				<h3><?php _e( 'Hide Widgets', 'custom-branding' ); ?> <span class="slate__select"><a href="#" class="slate__selectAll"><?php _e( 'Select All', 'custom-branding' ); ?></a> / <a href="#" class="slate__selectNone"><?php _e( 'Select None', 'custom-branding' ); ?></a></span></h3>
				<ul>
					<li>
						<label>
							<input type="hidden" name="custom_branding_settings[dashboardWidgets][dashboardHideActivity]" value="0">
							<input name="custom_branding_settings[dashboardWidgets][dashboardHideActivity]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['dashboardWidgets']['dashboardHideActivity'] ), 'on' ); ?>>
							<?php _e( 'Activity', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input type="hidden" name="custom_branding_settings[dashboardWidgets][dashboardHideNews]" value="0">
							<input name="custom_branding_settings[dashboardWidgets][dashboardHideNews]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['dashboardWidgets']['dashboardHideNews'] ), 'on' ); ?>>
							<?php _e( 'Mtaandao News', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input type="hidden" name="custom_branding_settings[dashboardWidgets][dashboardRightNow]" value="0">
							<input name="custom_branding_settings[dashboardWidgets][dashboardRightNow]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['dashboardWidgets']['dashboardRightNow'] ), 'on' ); ?>>
							<?php _e( 'At a Glance', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input type="hidden" name="custom_branding_settings[dashboardWidgets][dashboardRecentComments]" value="0">
							<input name="custom_branding_settings[dashboardWidgets][dashboardRecentComments]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['dashboardWidgets']['dashboardRecentComments'] ), 'on' ); ?>>
							<?php _e( 'Recent Comments', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input type="hidden" name="custom_branding_settings[dashboardWidgets][dashboardQuickPress]" value="0">
							<input name="custom_branding_settings[dashboardWidgets][dashboardQuickPress]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['dashboardWidgets']['dashboardQuickPress'] ), 'on' ); ?>>
							<?php _e( 'Quick Press', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input type="hidden" name="custom_branding_settings[dashboardWidgets][dashboardRecentDrafts]" value="0">
							<input name="custom_branding_settings[dashboardWidgets][dashboardRecentDrafts]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['dashboardWidgets']['dashboardRecentDrafts'] ), 'on' ); ?>>
							<?php _e( 'Recent Drafts', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input type="hidden" name="custom_branding_settings[dashboardWidgets][dashboardIncomingLinks]" value="0">
							<input name="custom_branding_settings[dashboardWidgets][dashboardIncomingLinks]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['dashboardWidgets']['dashboardIncomingLinks'] ), 'on' ); ?>>
							<?php _e( 'Incoming Links', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input type="hidden" name="custom_branding_settings[dashboardWidgets][dashboardPlugins]" value="0">
							<input name="custom_branding_settings[dashboardWidgets][dashboardPlugins]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['dashboardWidgets']['dashboardPlugins'] ), 'on' ); ?>>
							<?php _e( 'Plugins', 'custom-branding' ); ?>
						</label>
					</li>
				</ul>
			</section>

			<?php submit_button(); ?>

		</div>

		<div id="slate__adminMenu" class="pageSection <?php if ( 'custom_branding_admin_menu' !== $page ) { echo 'hide'; } ?>">

			<h2><?php _e( 'Admin Menu', 'custom-branding' ); ?></h2>

			<section>
				<h3><?php _e( 'Hide the following Menu Items', 'custom-branding' ); ?> <span class="slate__select"><a href="#" class="slate__selectAll"><?php _e( 'Select All', 'custom-branding' ); ?></a> / <a href="#" class="slate__selectNone"><?php _e( 'Select None', 'custom-branding' ); ?></a></span></h3>

				<ul>
					<?php

					$theMenu = custom_branding_admin_menus();

					if ( isset( $custom_branding_settings['adminMenu'] ) && '' !== $custom_branding_settings['adminMenu'] ) {
						foreach ( $custom_branding_settings['adminMenu'] as $menuItem => $menuHide ) {

							$menuItem = unserialize( base64_decode( $menuItem ) );

							if ( 'on' == $menuHide ) {
								$savedMenu[] = array(
									'Sort' => $menuItem['Sort'],
									'Title' => $menuItem['Title'],
									'Slug' => $menuItem['Slug'],
									);
							}
						}
					}
					if ( ! isset( $savedMenu ) ) {
						$savedMenu = array();
					}

					foreach ( $custom_branding_settings['adminMenuPermissions'] as $userName => $userHide ) {
						if ( 'on' == $userHide ) {
							$adminMenuActive = true;
						}
					}

					if ( isset( $adminMenuActive ) && true == $adminMenuActive ) {
						$theMenu = array_merge( $theMenu, $savedMenu );

						function compare_sort( $a, $b ) {
							if ( $a['Sort'] == $b['Sort'] ) {
								return 0;
							}

							return ( $a['Sort'] < $b['Sort'] ) ? - 1 : 1;
						}

						usort( $theMenu, 'compare_sort' );
					}

					foreach ( $theMenu as $key => $menuItem ) {
						$theMenuItem = base64_encode( serialize( array(
							'Sort' => esc_attr( $menuItem['Sort'] ),
							'Title' => esc_attr( $menuItem['Title'] ),
							'Slug' => esc_attr( $menuItem['Slug'] )
							) ) ); ?>
						<li>
							<label>
								<input name="custom_branding_settings[adminMenu][<?php echo $theMenuItem; ?>]" type="checkbox" <?php if ( isset( $custom_branding_settings['adminMenu'][ $theMenuItem ] ) ) { checked( esc_attr( $custom_branding_settings['adminMenu'][ $theMenuItem ] ), 'on' ); } ?>> <?php echo esc_attr( $menuItem['Title'] ); ?>
							</label>
						</li> <?php
					} ?>
				</ul>

			</section>

			<section>
				<h3><?php _e( 'Apply to the following Users', 'custom-branding' ); ?> <span class="slate__select"><a href="#" class="slate__selectAll"><?php _e( 'Select All', 'custom-branding' ); ?></a> / <a href="#" class="slate__selectNone"><?php _e( 'Select None', 'custom-branding' ); ?></a></span></h3>
				<?php $users = get_users();
				if ( ! ( $users[0] instanceof MN_User) ) {
					return;
				} ?>
				<ul>
					<?php foreach ( $users as $key => $value ) {
						$user_role = $users[$key]->roles;
						$user_id = $users[$key]->ID;
						$username = $users[$key]->user_login;
						$user_first_name = $users[$key]->first_name;
						$user_last_name = $users[$key]->last_name;
						if ( user_can( $user_id, 'edit_posts' ) ) { ?>
						<li>
							<label>
								<input type="hidden" name="custom_branding_settings[adminMenuPermissions][<?php echo $username ?>]" value="0">
								<input name="custom_branding_settings[adminMenuPermissions][<?php echo $username ?>]" type="checkbox" <?php if ( isset($custom_branding_settings['adminMenuPermissions'][ $username ] ) ) { checked( esc_attr( $custom_branding_settings['adminMenuPermissions'][ $username ] ), 'on' ); } ?>> <?php echo $user_first_name ?> <?php echo $user_last_name ?> <?php if ( !empty( $user_first_name ) || !empty( $user_last_name ) ) { ?>(<?php } ?><?php echo $username ?><?php if ( !empty( $user_first_name ) || !empty( $user_last_name ) ) { ?>)<?php } ?>
							</label>
						</li> <?php	}
					} ?>
				</ul>
			</section>

			<?php submit_button(); ?>

		</div>

		<div id="slate__adminBar" class="pageSection <?php if ( $page !== 'custom_branding_admin_bar_footer' ) { echo 'hide'; } ?>">

			<h2><?php _e( 'Admin Bar &amp; Footer', 'custom-branding' ); ?></h2>

			<section>
				<h3><?php _e( 'Admin Bar', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<label>
							<input name="custom_branding_settings[adminBarHideMN]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['adminBarHideMN'] ), 'on' ); ?>>
							<?php _e( 'Hide the Mtaandao Logo', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input name="custom_branding_settings[adminBarHide]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['adminBarHide'] ), 'on' ); ?>>
							<?php _e( 'Hide the Admin Bar', 'custom-branding' ); ?>
						</label>
					</li>
				</ul>
			</section>

			<section>
				<h3><?php _e( 'Admin Footer', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<label>
							<input name="custom_branding_settings[footerTextShow]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['footerTextShow'] ), 'on' ); ?>>
							<?php _e( 'Display Custom Footer Text', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label><?php _e( 'Footer Text (HTML Allowed)', 'custom-branding' ); ?>
							<textarea class="customFooterText" name="custom_branding_settings[footerText]"><?php echo mn_kses_post( force_balance_tags( $footerText ) ); ?></textarea>
						</label>
					</li>
					<li>
						<label>
							<input name="custom_branding_settings[footerVersionHide]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['footerVersionHide'] ), 'on' ); ?>>
							<?php _e( 'Hide Version Number', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input name="custom_branding_settings[footerHide]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['footerHide'] ), 'on' ); ?>>
							<?php _e( 'Hide the Admin Footer', 'custom-branding' ); ?>
						</label>
					</li>
				</ul>
			</section>

			<?php submit_button(); ?>

		</div>

		<div id="slate__contentNotices" class="pageSection <?php if ( $page !== 'custom_branding_content_notices' ) { echo 'hide'; } ?>">

			<h2><?php _e( 'Content &amp; Notices', 'custom-branding' ); ?></h2>

			<section>
				<h3><?php _e( 'Title', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<label>
							<input name="custom_branding_settings[contentHideMNTitle]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['contentHideMNTitle'] ), 'on' ); ?>>
							<?php _e( 'Hide "Mtaandao" in Page Titles', 'custom-branding' ); ?>
						</label>
					</li>
				</ul>
			</section>

			<section>
				<h3><?php _e( 'Tabs', 'custom-branding' ); ?></h3>
				<ul>
					<li>
						<label>
							<input name="custom_branding_settings[contentHideHelp]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['contentHideHelp'] ), 'on' ); ?>>
							<?php _e( 'Hide the Help Tab', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input name="custom_branding_settings[contentHideScreenOptions]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['contentHideScreenOptions'] ), 'on' ); ?>>
							<?php _e( 'Hide the Screen Options Tab', 'custom-branding' ); ?>
						</label>
					</li>
				</ul>
			</section>

			<section>
				<h3><?php _e( 'Disable Notices', 'custom-branding' ); ?></h3>
				<p><?php _e( 'Depending on the number of themes and plugins you have installed, the options below may slow down the Mtaandao admin. If you’re concerned about speed, see the “Hide Notices” option below.', 'custom-branding' ); ?></p>
				<ul>
					<li>
						<label>
							<input name="custom_branding_settings[noticeMNUpdate]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['noticeMNUpdate'] ), 'on' ); ?>>
							<?php _e( 'Disable Mtaandao Core Update Notices', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input name="custom_branding_settings[noticeThemeUpdate]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['noticeThemeUpdate'] ), 'on' ); ?>>
							<?php _e( 'Disable Mtaandao Theme Update Notices', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input name="custom_branding_settings[noticePluginUpdate]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['noticePluginUpdate'] ), 'on' ); ?>>
							<?php _e( 'Disable Mtaandao Plugin Update Notices', 'custom-branding' ); ?>
						</label>
					</li>
				</ul>
			</section>

			<section>
				<h3><?php _e( 'Hide Notices', 'custom-branding' ); ?></h3>
				<p><?php _e( 'This is an alternative to completely disabling the notices. This option won’t slow down the admin, but if the user has access to the following pages, they may still see updates are available: /admin/update-core.php, /admin/themes.php, and /admin/plugins.php.', 'custom-branding' ); ?></p>
				<ul>
					<li>
						<label>
							<input name="custom_branding_settings[noticeHideAllUpdates]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['noticeHideAllUpdates'] ), 'on' ); ?>>
							<?php _e( 'Hide All Mtaandao Update Notices', 'custom-branding' ); ?>
						</label>
					</li>
				</ul>
			</section>

			<?php submit_button(); ?>

		</div>

		<div id="slate__permissions" class="pageSection <?php if ( $page !== 'custom_branding_permissions' ) { echo 'hide'; } ?>">

			<h2><?php _e( 'Permissions', 'custom-branding' ); ?></h2>
			<section>
				<p><?php _e( 'Below you can choose which users will see the', 'custom-branding' ); ?> Custom Branding <?php _e( 'plugin. Keep in mind that if you', 'custom-branding' ); ?> <span style='color: #c00;'><?php _e( 'check your own name, you’ll no longer be able to access these settings', 'custom-branding' ); ?></span>.<?php _e( 'If that happens, you’ll need to', 'custom-branding' ); ?> <a href="admin.php?page=custom_branding_permissions"><?php _e( 'bookmark this page', 'custom-branding' ); ?></a> <?php _e( 'or deactivate and reactivate the plugin. Make sure to keep an up-to-date', 'custom-branding' ); ?> <a href="admin.php?page=custom_branding_import_export"><?php _e( 'backup of your settings', 'custom-branding' ); ?></a>. <?php _e( 'Only users who already have permission to access plugins are shown below.', 'custom-branding' ); ?></p>
			</section>
			<?php
			$users = get_users();
			if ( !($users[0] instanceof MN_User) ) {
				return;
			} ?>
			<section>
				<h3><?php _e( 'Hide', 'custom-branding' ); ?> Custom Branding <?php _e( 'from the following Users', 'custom-branding' ); ?></h3>
				<ul>
					<?php foreach ($users as $key => $value) {
						$user_role = $users[$key]->roles;
						$user_id = $users[$key]->ID;
						$username = $users[$key]->user_login;
						$user_first_name = $users[$key]->first_name;
						$user_last_name = $users[$key]->last_name;
						if ( user_can( $user_id, 'activate_plugins' ) ) { ?>
						<li>
							<label>
								<input type="hidden" name="custom_branding_settings[userPermissions][<?php echo $username ?>]" value="0">
								<input name="custom_branding_settings[userPermissions][<?php echo $username ?>]" type="checkbox" <?php if ( isset($custom_branding_settings['userPermissions'][$username] ) ) { checked( esc_attr( $custom_branding_settings['userPermissions'][$username] ), 'on' ); } ?>> <?php echo $user_first_name ?> <?php echo $user_last_name ?> <?php if ( !empty( $user_first_name ) || !empty( $user_last_name ) ) { ?>(<?php } ?><?php echo $username ?><?php if ( !empty( $user_first_name ) || !empty( $user_last_name ) ) { ?>)<?php } ?>
							</label>
						</li>
						<?php	}
					} ?>
				</ul>
			</section>

			<?php submit_button(); ?>

		</div>

		<div id="slate__settings" class="pageSection <?php if ( $page !== 'custom_branding_settings' ) { echo 'hide'; } ?>">

			<h2><?php _e( 'Settings', 'custom-branding' ); ?></h2>

			<section>
				<h3><?php _e( 'Custom Login Address', 'custom-branding' ); ?></h3>

				<p><?php _e( 'If you use a third party plugin that changes the Mtaandao Login page from /login.php to something else, you may need to enter your custom login page address below so that Custom Branding can work on the Login page.', 'custom-branding' ); ?></p>

				<p><?php _e( 'The Login Page Address should be what comes after your domain name. If your login page was at http://yourdomain.com/mycustomlogin, you would enter "/mycustomlogin". If it was at http://yourdomain.com/subdirectory/mycustomlogin, you would enter "/subdirectory/mycustomLogincustomlogin".', 'custom-branding' ); ?></p>

				<ul>
					<li>
						<label>
							<input name="custom_branding_settings[customLogin]" type="checkbox" <?php checked( esc_attr( $custom_branding_settings['customLogin'] ), 'on' ); ?>>
							<?php _e( 'Enable Custom Branding on a Custom Login Page', 'custom-branding' ); ?>
						</label>
					</li>
					<li>
						<label><?php _e( 'Login Page Address', 'custom-branding' ); ?> <input type="text" name="custom_branding_settings[customLoginURL]" value="<?php echo esc_attr( $customLoginURL ); ?>"></label>
					</li>
				</ul>
			</section>

			<?php submit_button(); ?>

		</div>

		<!-- Misc Hidden Inputs -->
		<input type="hidden" name="custom_branding_settings[licenseDate]" value="<?php echo esc_attr( $custom_branding_settings['licenseDate'] ); ?>" />
		<input type="hidden" name="custom_branding_settings[currentPage]" value="<?php echo $page; ?>" />

	</form>

	<div id="slate__importExport" class="pageSection <?php if ( $page !== 'custom_branding_import_export' ) { echo 'hide'; } ?>">
		<form action="" method="post">

			<h2><?php _e( 'Import / Export', 'custom-branding' ); ?></h2>

			<section>
				<h3><?php _e( 'Import', 'custom-branding' ); ?></h3>
				<?php
				global $custom_branding_import_success;
				if ( isset( $custom_branding_import_success ) && true == $custom_branding_import_success ) { ?>
				<!-- <script type="text/javascript">location.reload();</script> -->
				<div class="importSuccess"><?php _e( 'The Import was Successful!', 'custom-branding' ); ?></div>
				<?php } else if ( isset( $custom_branding_import_success ) && false == $custom_branding_import_success ) { ?>
				<div class="importFail"><?php _e( 'Oops, the import didn’t work.', 'custom-branding' ); ?></div>
				<?php } ?>
				<textarea class="slateProImportExport" name="custom_branding_import_settings"></textarea>
				<p class="slate__description">
					<?php _e( 'Paste your settings above and click “Save Changes” to import. It should look like the text in the Export field below.', 'custom-branding' ); ?>
				</p>

				<input type="submit" name="custom_branding_import" class="button button-primary" value="Import Settings">
			</section>


			<section>
				<h3><?php _e( 'Export', 'custom-branding' ); ?></h3>
				<textarea class="slateProImportExport"><?php echo serialize($custom_branding_settings); ?></textarea>
				<p class="slate__description">
					<?php _e( 'Copy and save the text above to backup your', 'custom-branding' ); ?> Custom Branding <?php _e( 'settings.', 'custom-branding' ); ?>
				</p>
			</section>


		</form>
	</div>

	<div id="slate__about" class="pageSection <?php if ( $page !== 'custom_branding_about' ) { echo 'hide'; } ?>">

		<h2><?php _e( 'About', 'custom-branding' ); ?> Custom Branding</h2>
		<section>
			<p><?php _e( 'If you need product support, please leave a comment on the', 'custom-branding' ); ?> <a href="http://codecanyon.net/item/custom-branding-a-white-label-mtaandao-admin-theme/9722528?ref=sevenbold" target="_blank"><?php _e( 'CodeCanyon product page', 'custom-branding' ); ?></a>. <?php _e( 'Remember that we’re not able to support third party plugins that might conflict with', 'custom-branding' ); ?> Custom Branding.</p>
			<p>Custom Branding <?php _e( 'was made by', 'custom-branding' ); ?> <a href="http://sevenbold.com" target="_blank">Seven Bold</a>. <?php _e( 'If you’re interested in customizing', 'custom-branding' ); ?> Custom Branding <?php _e( 'or any other web design and development projects, please contact us through the', 'custom-branding' ); ?> <a href="http://sevenbold.com" target="_blank">Seven Bold <?php _e( 'website.', 'custom-branding' ); ?></a></p>
		</section>
		<section>
			<h3><?php _e( 'Email Opt-in', 'custom-branding' ); ?></h3>
			<ul>
				<li><p><?php _e( 'Stay up to date regarding', 'custom-branding' ); ?> Custom Branding <?php _e( 'and other', 'custom-branding' ); ?> Seven Bold <?php _e( 'products.', 'custom-branding' ); ?></p></li>
				<li>
					<!-- Begin MailChimp Signup Form -->
					<div id="mc_embed_signup">
						<form action="//sevenbold.us9.list-manage.com/subscribe/post?u=fb6f314c3674cc509e4e1fcf5&amp;id=e2a990023d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

							<div class="wrapper">
								<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter Your Email Address">
								<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
								<div style="position: absolute; left: -5000px;"><input type="text" name="b_fb6f314c3674cc509e4e1fcf5_e2a990023d" tabindex="-1" value=""></div>
								<input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe" class="button">
							</div>

						</form>
					</div>
					<!--End mc_embed_signup-->
				</li>
			</ul>
		</section>

	</div>

	<div id="slate__license" class="pageSection <?php if ( $page !== 'custom_branding_license' ) { echo 'hide'; } ?>">
		<?php
		if ( isset( $_POST['custom_branding_license']['licenseKey'] ) && !(empty ( $_POST['custom_branding_license']['licenseKey'] ) ) ) {
			$licenseKey = esc_attr( $_POST['custom_branding_license']['licenseKey'] );

			if ( isset( $_POST['licenseKeyActivate'] ) ) {
				$licenseReply = custom_branding_licensing( esc_attr( $licenseKey ), '0' );
				$licenseReply = $licenseReply['body'];
				if ( is_multisite() && is_plugin_active_for_network('custom-branding-admin/custom-branding-admin.php') ) {
					update_site_option( 'custom_branding_license', array(
						'licenseKey' => esc_attr( $licenseKey ),
						'licenseStatus' => esc_attr( $licenseReply )
						)
					);
				} else {
					update_option( 'custom_branding_license', array(
						'licenseKey' => esc_attr( $licenseKey ),
						'licenseStatus' => esc_attr( $licenseReply )
						)
					);
				}
			} else if ( isset( $_POST['licenseKeyDeactivate'] )  ) {
				$licenseReply = custom_branding_licensing( esc_attr( $licenseKey ), '1' );
				$licenseReply = $licenseReply['body'];
				if ( is_multisite() && is_plugin_active_for_network('custom-branding-admin/custom-branding-admin.php') ) {
					update_site_option( 'custom_branding_license', array(
						'licenseKey' => esc_attr( $licenseKey ),
						'licenseStatus' => esc_attr( $licenseReply )
						)
					);
				} else {
					update_option( 'custom_branding_license', array(
						'licenseKey' => esc_attr( $licenseKey ),
						'licenseStatus' => esc_attr( $licenseReply )
						)
					);
				}
			}
		} else {
			$licenseReply = '';
		}

		if ( is_multisite() && is_plugin_active_for_network('custom-branding-admin/custom-branding-admin.php') ) {
			$custom_branding_license = get_site_option( 'custom_branding_license' );
		} else {
			$custom_branding_license = get_option( 'custom_branding_license' );
		}
		$licenseStatus = esc_attr( $custom_branding_license['licenseStatus'] );
		if ('success' == $licenseStatus || 'active' == $licenseStatus ) {
			$licenseState = 'active';
		} else {
			$licenseState = 'inactive';
		}
		?>
		<form action="" method="post">

			<h2><?php _e( 'License', 'custom-branding' ); ?></h2>
			<p><?php _e( 'Enter your license key to qualify for premium customer support, receive updates via the Mtaandao Plugins page, access future updates, and other added benefits. Your license key is the same as the “Purchase Code” you received in your CodeCanyon.net purchase receipt email.', 'custom-branding' ); ?></p>
			<?php if ( isset($expire_date) && $expire_date > strtotime( $custom_branding_settings['licenseDate'] ) ) { ?>
			<p><?php _e( 'If you need a license key,', 'custom-branding' ); ?> <a href="http://sevenbold.com/mtaandao/custom-branding/" target="_blank"><?php _e( 'please visit', 'custom-branding' ); ?> Seven Bold <?php _e( 'for info on how to buy', 'custom-branding' ); ?> Custom Branding</a>.</p>
			<?php } ?>
			<section>
				<ul>
					<li>
						<label><?php _e( 'License Key', 'custom-branding' ); ?> <input type="text" name="custom_branding_license[licenseKey]" value="<?php if ( 'active' == $licenseState ) { echo esc_attr( $custom_branding_license['licenseKey'] ); } ?>" <?php if ( 'active' == $licenseState ) {?> readonly="readonly"<?php } ?>></label>
						<div class="slate__licenseStatus">
							<?php if ( 'success' == $licenseReply ) { ?>
							<span class="slate__licenseSuccess"><?php _e( 'Your License Key was successfully activated!', 'custom-branding' ); ?></span>
							<?php	} else if ( 'current' == $licenseReply ) { ?>
							<span class="slate__licenseSuccess"><?php _e( 'Awesome, your license is valid and active!', 'custom-branding' ); ?></span>
							<?php	} else if ( 'invalid' == $licenseReply ) { ?>
							<span class="slate__licenseInvalid"><?php _e( 'Shoot, it looks like your License Key isn’t valid.', 'custom-branding' ); ?></span>
							<?php	} else if ( 'used' == $licenseReply ) { ?>
							<span class="slate__licenseActive"><?php _e( 'Looks like this key is already activated. It needs to be deactivated before you can use it.', 'custom-branding' ); ?></span>
							<?php	} else if ( 'removed' == $licenseReply ) { ?>
							<span class="slate__licenseRemoved"><?php _e( 'Your license key was successfully removed.', 'custom-branding' ); ?></span>
							<?php	} else if ( 'failed' == $licenseReply ) { ?>
							<span class="slate__licenseFailed"><?php _e( 'The license key you’re deactivating doesn’t match the website its activated on. Please deactivate from the proper website.', 'custom-branding' ); ?></span>
							<?php	} else if ( 'server' == $licenseReply ) { ?>
							<span class="slate__licenseServer"><?php _e( 'Oops, we couldn’t connect to the licensing server.', 'custom-branding' ); ?></span>
							<?php } ?>
						</div>
					</li>
					<?php if ( 'active' !== $licenseState ) { ?>
					<li>
						<input type="submit" name="licenseKeyActivate" id="licenseKeyActivate" class="button button-primary" value="Activate License Key">
					</li>
					<?php } else { ?>
					<li>
						<input type="submit" name="licenseKeyDeactivate" id="licenseKeyDeactivate" class="button" value="Deactivate License Key">
					</li>
					<?php } ?>
				</ul>
			</section>

		</form>

	</div>

</div>

<?php
// Setup each section of colors
function colorSection( $theSection, $colorCustom ) { ?>
<?php foreach ( $theSection as $section => $names ) { ?>
<h4><?php _e( $section, 'custom-branding' ); ?></h4>
<ul>
	<?php foreach ( $names as $field => $name ) { ?>
	<?php if ( is_array( $name ) ) { ?>
	<li><h5><?php _e( $field, 'custom-branding' ); ?></h5></li>
	<?php foreach ( $name as $field => $name ) { ?>
	<li>
		<label class="colorpickerToggle">
			<input type="text" class="slate__colorpicker" value="<?php echo custom_branding_sanitize_hex( $colorCustom[$field] ) ?>">
			<?php _e( $name, 'custom-branding' ); ?>
		</label>
		<input class="customColorsInput" type="hidden" name="custom_branding_settings[colorSchemeCustomColors][<?php echo $field;?>]" value="<?php echo custom_branding_sanitize_hex( $colorCustom[$field] ) ?>">
	</li>
	<?php } ?>
	<?php } else { ?>
	<li>
		<label class="colorpickerToggle">
			<input type="text" class="slate__colorpicker" value="<?php echo custom_branding_sanitize_hex( $colorCustom[$field] ) ?>">
			<?php _e( $name, 'custom-branding' ); ?>
		</label>
		<input class="customColorsInput" type="hidden" name="custom_branding_settings[colorSchemeCustomColors][<?php echo $field;?>]" value="<?php echo custom_branding_sanitize_hex( $colorCustom[$field] ) ?>">
	</li>
	<?php } ?>
	<?php } ?>
</ul>
<?php }
}