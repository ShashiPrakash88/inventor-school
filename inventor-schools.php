<?php

/**
 * Plugin Name: Inventor Schools
 * Version: 1.2.0
 * Description: Schools listing support.
 * Author: Pragmatic Mates
 * Author URI: http://inventorwp.com
 * Plugin URI: http://inventorwp.com/plugins/inventor-schools/
 * Text Domain: inventor-schools
 * Domain Path: /languages/
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! class_exists( 'Inventor_Schools' ) && class_exists( 'Inventor' ) ) {
    /**
     * Class Inventor_Schools
     *
     * @class Inventor_Schools
     * @package Inventor_Schools
     * @author Pragmatic Mates
     */
    final class Inventor_Schools {
        const DOMAIN = 'inventor-schools';

        /**
         * Initialize Inventor_Schools plugin
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
            define( 'INVENTOR_SCHOOL_PREFIX', 'school_' );
        }

        /**
         * Include classes
         *
         * @access public
         * @return void
         */
        public function includes() 
        {
            require_once INVENTOR_SCHOOLS_DIR . 'includes/class-inventor-schools-post-types.php';
            require_once INVENTOR_SCHOOLS_DIR . 'includes/class-inventor-schools-customizations.php';
            require_once INVENTOR_SCHOOLS_DIR . 'includes/class-inventor-schools-logic.php';
        }
    }

    new Inventor_Schools();
}
