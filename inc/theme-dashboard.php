<?php

/**
 * Plugin Name: Replace WordPress Dashboard
 * Description: Replaces the default WordPress dashboard with a custom one.
 * Author: Micah Wood
 * Author URI: http://micahwood.me
 * Version: 0.1
 * License: GPL3
 */

/**
 * This plugin offers a starting point for replacing the WordPress dashboard.  If you are familiar with object oriented
 * programming, just subclass and overwrite the set_title() and page_content() methods. Otherwise, just alter the
 * set_title() and page_content() functions as needed.
 *
 * Customize which users are redirected to the custom dashboard by changing the capability property.
 *
 * If you don't want this plugin to be deactivated, just drop this file in the mu-plugins folder in the wp-content
 * directory.  If you don't have an mu-plugins folder, just create one.
 */

class Replace_WP_Dashboard {

    protected $capability = 'read';

    protected $title;

    final public function __construct() {
        if( is_admin() ) {
            add_action( 'init', array( $this, 'init' ) );
        }
    }

    final public function init() {
        if( current_user_can( $this->capability ) ) {
            $this->set_title();
            add_filter( 'admin_title', array( $this, 'admin_title' ), 10, 2 );
            add_action( 'admin_menu', array( $this, 'admin_menu' ) );
            add_action( 'current_screen', array( $this, 'current_screen' ) );
        }
    }

    /**
     * Sets the page title for your custom dashboard
     */
    function set_title() {
        if( ! isset( $this->title ) ) {
            $this->title = __( 'Dashboard' );
        }
    }

    /**
     * Output the content for your custom dashboard
     */
    function page_content() {
?>

<h2><?php echo $this->title; ?></h2>
<div class="wrap">
  <div id="welcome-panel" class="welcome-panel">
    <!-- first column -->
    <div class="welcome-panel-content">
      <h3>UKM Twenty Fifteen</h3>
      <p>Anda sedang menggunakan theme versi <?php echo wp_get_theme()->get( 'Version' ); ?>. Pastikan anda sentiasa menyemak dan kemaskini ke versi terkini untuk WordPres core, plugin, theme dan lain-lain</p>
      <div class="welcome-panel-column">
			<h4>Templat SVG</h4>
      <p>Muat turun fail-fail yang diperlukan untuk memudahkan tugasan anda.</p>
      <a class="button button-primary button-hero load-customize hide-if-no-customize" href="<?php echo get_template_directory_uri() .'/img/logo-new.svg'; ?>">Muat Turun</a><p></p>
			</div>
    </div>
    <!-- second column -->
    <div class="welcome-panel-column">
		<h4>Seterusnya</h4>
		<ul>
      <li><a href="<?php echo admin_url(); ?>/post-new.php?post_type=news" class="welcome-icon welcome-write-blog">Tulis Berita Baru</a></li>
      <li><a href="<?php echo admin_url(); ?>/post-new.php?post_type=page" class="welcome-icon welcome-add-page">Tambah Halaman</a></li>
      <li><a href="<?php echo bloginfo( 'url' ); ?>" class="welcome-icon welcome-view-site">Papar Web</a></li>
		</ul>
	</div>
  <!-- third column -->
  <div class="welcome-panel-column welcome-panel-last">
  <h4>Lagi Tindakan</h4>
  <ul>
<li><div class="welcome-icon welcome-widgets-menus">Urus <a href="<?php echo admin_url(); ?>/widgets.php">widgets</a> atau <a href="<?php echo admin_url(); ?>/nav-menus.php">menus</a></div></li>
<li><a href="https://codex.wordpress.org/First_Steps_With_WordPress" class="welcome-icon welcome-learn-more">Learn more about getting started</a></li>
  </ul>
</div>
  </div>
</div>
<div class="wrap">
  <div id="welcome-panel" class="welcome-panel">
    <div class="welcome-panel-content">
      <h3>UKM Twenty Fifteen Child Theme</h3>
      Bagi pengguna yang inginkan kelainan dari segi kedudukan kotak dan lain-lain boleh menggunakan child theme. Pastikan ukm-twentyfifteen dipasang terlebih dahulu. Muat turun child theme di sini: <a href="https://github.com/mmUKM/ukm-twentyfifteen-child/archive/master.zip">ukm-twentyfifteen-child-master.zip</a><p></p>
    </div>
  </div>
</div>
<?php
    }

    /**
     * Fixes the page title in the browser.
     *
     * @param string $admin_title
     * @param string $title
     * @return string $admin_title
     */
    final public function admin_title( $admin_title, $title ) {
        global $pagenow;
        if( 'admin.php' == $pagenow && isset( $_GET['page'] ) && 'custom-page' == $_GET['page'] ) {
            $admin_title = $this->title . $admin_title;
        }
        return $admin_title;
    }

    final public function admin_menu() {

        /**
         * Adds a custom page to WordPress
         */
        add_menu_page( $this->title, '', 'manage_options', 'custom-page', array( $this, 'page_content' ) );

        /**
         * Remove the custom page from the admin menu
         */
        remove_menu_page('custom-page');

        /**
         * Make dashboard menu item the active item
         */
        global $parent_file, $submenu_file;
        $parent_file = 'index.php';
        $submenu_file = 'index.php';

        /**
         * Rename the dashboard menu item
         */
        global $menu;
        $menu[2][0] = $this->title;

        /**
         * Rename the dashboard submenu item
         */
        global $submenu;
        $submenu['index.php'][0][0] = $this->title;

    }

    /**
     * Redirect users from the normal dashboard to your custom dashboard
     */
    final public function current_screen( $screen ) {
        if( 'dashboard' == $screen->id ) {
            wp_safe_redirect( admin_url('admin.php?page=custom-page') );
            exit;
        }
    }

}

new Replace_WP_Dashboard();