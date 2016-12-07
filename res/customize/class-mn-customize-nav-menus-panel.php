<?php
/**
 * Customize API: MN_Customize_Nav_Menus_Panel class
 *
 * @package Mtaandao
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize Nav Menus Panel Class
 *
 * Needed to add screen options.
 *
 * @since 4.3.0
 *
 * @see MN_Customize_Panel
 */
class MN_Customize_Nav_Menus_Panel extends MN_Customize_Panel {

	/**
	 * Control type.
	 *
	 * @since 4.3.0
	 * @access public
	 * @var string
	 */
	public $type = 'nav_menus';

	/**
	 * Render screen options for Menus.
	 *
	 * @since 4.3.0
	 * @access public
	 */
	public function render_screen_options() {
		// Adds the screen options.
		require_once ABSPATH . 'admin/includes/nav-menu.php';
		add_filter( 'manage_nav-menus_columns', 'mn_nav_menu_manage_columns' );

		// Display screen options.
		$screen = MN_Screen::get( 'nav-menus.php' );
		$screen->render_screen_options( array( 'wrap' => false ) );
	}

	/**
	 * Returns the advanced options for the nav menus page.
	 *
	 * Link title attribute added as it's a relatively advanced concept for new users.
	 *
	 * @since 4.3.0
	 * @deprecated 4.5.0 Deprecated in favor of mn_nav_menu_manage_columns().
	 */
	public function mn_nav_menu_manage_columns() {
		_deprecated_function( __METHOD__, '4.5.0', 'mn_nav_menu_manage_columns' );
		require_once ABSPATH . 'admin/includes/nav-menu.php';
		return mn_nav_menu_manage_columns();
	}

	/**
	 * An Underscore (JS) template for this panel's content (but not its container).
	 *
	 * Class variables for this panel class are available in the `data` JS object;
	 * export custom variables by overriding MN_Customize_Panel::json().
	 *
	 * @since 4.3.0
	 * @access protected
	 *
	 * @see MN_Customize_Panel::print_template()
	 */
	protected function content_template() {
		?>
		<li class="panel-meta customize-info accordion-section <# if ( ! data.description ) { #> cannot-expand<# } #>">
			<button type="button" class="customize-panel-back" tabindex="-1">
				<span class="screen-reader-text"><?php _e( 'Back' ); ?></span>
			</button>
			<div class="accordion-section-title">
				<span class="preview-notice">
					<?php
					/* translators: %s: the site/panel title in the Customizer */
					printf( __( 'You are customizing %s' ), '<strong class="panel-title">{{ data.title }}</strong>' );
					?>
				</span>
				<button type="button" class="customize-help-toggle dashicons dashicons-editor-help" aria-expanded="false">
					<span class="screen-reader-text"><?php _e( 'Help' ); ?></span>
				</button>
				<button type="button" class="customize-screen-options-toggle" aria-expanded="false">
					<span class="screen-reader-text"><?php _e( 'Menu Options' ); ?></span>
				</button>
			</div>
			<# if ( data.description ) { #>
			<div class="description customize-panel-description">{{{ data.description }}}</div>
			<# } #>
			<div id="screen-options-wrap">
				<?php $this->render_screen_options(); ?>
			</div>
		</li>
	<?php
	}
}