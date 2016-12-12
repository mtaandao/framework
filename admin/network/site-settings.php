<?php
/**
 * Edit Site Settings Administration Screen
 *
 * @package Mtaandao
 * @subpackage Multisite
 * @since 3.1.0
 */

/** Load Mtaandao Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

if ( ! current_user_can( 'manage_sites' ) )
	mn_die( __( 'Sorry, you are not allowed to edit this site.' ) );

get_current_screen()->add_help_tab( array(
	'id'      => 'overview',
	'title'   => __('Overview'),
	'content' =>
		'<p>' . __('The menu is for editing information specific to individual sites, particularly if the admin area of a site is unavailable.') . '</p>' .
		'<p>' . __('<strong>Info</strong> &mdash; The site URL is rarely edited as this can cause the site to not work properly. The Registered date and Last Updated date are displayed. Network admins can mark a site as archived, spam, deleted and mature, to remove from public listings or disable.') . '</p>' .
		'<p>' . __('<strong>Users</strong> &mdash; This displays the users associated with this site. You can also change their role, reset their password, or remove them from the site. Removing the user from the site does not remove the user from the network.') . '</p>' .
		'<p>' . sprintf( __('<strong>Themes</strong> &mdash; This area shows themes that are not already enabled across the network. Enabling a theme in this menu makes it accessible to this site. It does not activate the theme, but allows it to show in the site&#8217;s Appearance menu. To enable a theme for the entire network, see the <a href="%s">Network Themes</a> screen.' ), network_admin_url( 'themes.php' ) ) . '</p>' .
		'<p>' . __('<strong>Settings</strong> &mdash; This page shows a list of all settings associated with this site. Some are created by Mtaandao and others are created by plugins you activate. Note that some fields are grayed out and say Serialized Data. You cannot modify these values due to the way the setting is stored in the database.') . '</p>'
) );

get_current_screen()->set_help_sidebar(
	'<p><strong>' . __('For more information:') . '</strong></p>' .
	'<p>' . __('<a href="https://mtaandao.github.io/Network_Admin_Sites_Screen">Documentation on Site Management</a>') . '</p>' .
	'<p>' . __('<a href="https://mtaandao.co.ke/support/forum/multisite/">Support Forums</a>') . '</p>'
);

$id = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;

if ( ! $id )
	mn_die( __('Invalid site ID.') );

$details = get_site( $id );
if ( ! $details ) {
	mn_die( __( 'The requested site does not exist.' ) );
}

if ( !can_edit_network( $details->site_id ) )
	mn_die( __( 'Sorry, you are not allowed to access this page.' ), 403 );

$is_main_site = is_main_site( $id );

if ( isset($_REQUEST['action']) && 'update-site' == $_REQUEST['action'] && is_array( $_POST['option'] ) ) {
	check_admin_referer( 'edit-site' );

	switch_to_blog( $id );

	$skip_options = array( 'allowedthemes' ); // Don't update these options since they are handled elsewhere in the form.
	foreach ( (array) $_POST['option'] as $key => $val ) {
		$key = mn_unslash( $key );
		$val = mn_unslash( $val );
		if ( $key === 0 || is_array( $val ) || in_array($key, $skip_options) )
			continue; // Avoids "0 is a protected MN option and may not be modified" error when edit blog options
		update_option( $key, $val );
	}

	/**
	 * Fires after the site options are updated.
	 *
	 * @since 3.0.0
	 * @since 4.4.0 Added `$id` parameter.
	 *
	 * @param int $id The ID of the site being updated.
	 */
	do_action( 'mnmu_update_blog_options', $id );

	restore_current_blog();
	mn_redirect( add_query_arg( array( 'update' => 'updated', 'id' => $id ), 'site-settings.php') );
	exit;
}

if ( isset($_GET['update']) ) {
	$messages = array();
	if ( 'updated' == $_GET['update'] )
		$messages[] = __('Site options updated.');
}

/* translators: %s: site name */
$title = sprintf( __( 'Edit Site: %s' ), esc_html( $details->blogname ) );

$parent_file = 'sites.php';
$submenu_file = 'sites.php';

require( ABSPATH . 'admin/admin-header.php' );

?>

<div class="wrap">
<h1 id="edit-site"><?php echo $title; ?></h1>
<p class="edit-site-actions"><a href="<?php echo esc_url( get_home_url( $id, '/' ) ); ?>"><?php _e( 'Visit' ); ?></a> | <a href="<?php echo esc_url( get_admin_url( $id ) ); ?>"><?php _e( 'Dashboard' ); ?></a></p>

<?php

network_edit_site_nav( array(
	'blog_id'  => $id,
	'selected' => 'site-settings'
) );

if ( ! empty( $messages ) ) {
	foreach ( $messages as $msg )
		echo '<div id="message" class="updated notice is-dismissible"><p>' . $msg . '</p></div>';
} ?>
<form method="post" action="site-settings.php?action=update-site">
	<?php mn_nonce_field( 'edit-site' ); ?>
	<input type="hidden" name="id" value="<?php echo esc_attr( $id ) ?>" />
	<table class="form-table">
		<?php
		$blog_prefix = $mndb->get_blog_prefix( $id );
		$sql = "SELECT * FROM {$blog_prefix}options
			WHERE option_name NOT LIKE %s
			AND option_name NOT LIKE %s";
		$query = $mndb->prepare( $sql,
			$mndb->esc_like( '_' ) . '%',
			'%' . $mndb->esc_like( 'user_roles' )
		);
		$options = $mndb->get_results( $query );
		foreach ( $options as $option ) {
			if ( $option->option_name == 'default_role' )
				$editblog_default_role = $option->option_value;
			$disabled = false;
			$class = 'all-options';
			if ( is_serialized( $option->option_value ) ) {
				if ( is_serialized_string( $option->option_value ) ) {
					$option->option_value = esc_html( maybe_unserialize( $option->option_value ) );
				} else {
					$option->option_value = 'SERIALIZED DATA';
					$disabled = true;
					$class = 'all-options disabled';
				}
			}
			if ( strpos( $option->option_value, "\n" ) !== false ) {
			?>
				<tr class="form-field">
					<th scope="row"><label for="<?php echo esc_attr( $option->option_name ) ?>"><?php echo ucwords( str_replace( "_", " ", $option->option_name ) ) ?></label></th>
					<td><textarea class="<?php echo $class; ?>" rows="5" cols="40" name="option[<?php echo esc_attr( $option->option_name ) ?>]" id="<?php echo esc_attr( $option->option_name ) ?>"<?php disabled( $disabled ) ?>><?php echo esc_textarea( $option->option_value ) ?></textarea></td>
				</tr>
			<?php
			} else {
			?>
				<tr class="form-field">
					<th scope="row"><label for="<?php echo esc_attr( $option->option_name ) ?>"><?php echo esc_html( ucwords( str_replace( "_", " ", $option->option_name ) ) ); ?></label></th>
					<?php if ( $is_main_site && in_array( $option->option_name, array( 'siteurl', 'home' ) ) ) { ?>
					<td><code><?php echo esc_html( $option->option_value ) ?></code></td>
					<?php } else { ?>
					<td><input class="<?php echo $class; ?>" name="option[<?php echo esc_attr( $option->option_name ) ?>]" type="text" id="<?php echo esc_attr( $option->option_name ) ?>" value="<?php echo esc_attr( $option->option_value ) ?>" size="40" <?php disabled( $disabled ) ?> /></td>
					<?php } ?>
				</tr>
			<?php
			}
		} // End foreach
		/**
		 * Fires at the end of the Edit Site form, before the submit button.
		 *
		 * @since 3.0.0
		 *
		 * @param int $id Site ID.
		 */
		do_action( 'mnmueditblogaction', $id );
		?>
	</table>
	<?php submit_button(); ?>
</form>

</div>
<?php
require( ABSPATH . 'admin/admin-footer.php' );
