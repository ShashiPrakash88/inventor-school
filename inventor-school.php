<?php

/**
 * Plugin Name: Inventor School
 * Version: 1.3.0
 * Description: School listing support.
 * Author: Tarun Kumar
 * Author URI: http://www.edugorilla.com
 * Plugin URI: http://www.edugorilla.com/plugins/inventor-properties/
 * Text Domain: inventor-school
 * Domain Path: /languages/
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! class_exists('Inventor_Schools') && class_exists( 'Inventor' ) ) {
    /**
     * Class Inventor_Properties
     *
     * @class Inventor_Properties
     * @package Inventor_Properties
     * @author Pragmatic Mates
     */
    final class Inventor_Schools {
        const DOMAIN = 'inventor-school';

        /**
         * Initialize Inventor_Properties plugin
         */
        public function __construct() {
            $this->constants();
            $this->includes();
            if ( class_exists( 'Inventor_Utilities' ) ) {
                Inventor_Utilities::load_plugin_textdomain( self::DOMAIN, __FILE__ );
            }
        }

        /**
         * Defines constants
         *
         * @access public
         * @return void
         */
        public function constants() {
            define( 'INVENTOR_SCHOOLS_DIR', plugin_dir_path( __FILE__ ) );
            define( 'INVENTOR_School_PREFIX', 'school' );
        }

        /**
         * Include classes
         *
         * @access public
         * @return void
         */
        public function includes() {
            require_once INVENTOR_PROPERTIES_DIR . 'includes/class-inventor-schools-post-types.php';
            require_once INVENTOR_PROPERTIES_DIR . 'includes/class-inventor-schools-taxonomies.php';
            require_once INVENTOR_PROPERTIES_DIR . 'includes/class-inventor-schools-customizations.php';
            require_once INVENTOR_PROPERTIES_DIR . 'includes/class-inventor-schools-logic.php';
        }
    }

    new Inventor_Properties();
}
