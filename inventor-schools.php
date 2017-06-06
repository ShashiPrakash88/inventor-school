<?php
 /* Introduction
 * Plugin Name: Inventor Schools
 * Version: 1.2.0
 * Description: Schools listing support.
 * Author: Bhaargavi Agrawal
 * Text Domain: inventor-schools
 * Domain Path: /languages/
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! class_exists( 'Inventor_Schools' ) && class_exists( 'Inventor' ) ) 
    {
     /*
     * Class Inventor_Schools
     * declaring global constant
     * @class Inventor_Schools
     * @package Inventor_Schools
     * @author Bhaargavi Agrawal
     */
    final class Inventor_Schools
	  {
        const DOMAIN = 'inventor-schools';
        /**
         * Initialize Inventor_Schools plugin
         */
        public function __construct() 
		{
            $this->constants();
            $this->includes();
            Inventor_Utilities::load_plugin_textdomain( self::DOMAIN, __FILE__ );
        }
        /** Defining the above mentioned functions includes and constants
  
         * Global constants declared. These are used in all files
         * @access public
         * @return void
         */
        public function constants() 
		{
            define( 'INVENTOR_SCHOOLS_DIR', plugin_dir_path( __FILE__ ) );
            define( 'INVENTOR_SCHOOL_PREFIX', 'school_' );
        } 

        /**
         * Including files 
         *
         * @access public
         * @return void
         */
        public function includes() 
        {
            require_once INVENTOR_SCHOOLS_DIR . 'includes/class-inventor-schools-post-types.php';
            require_once INVENTOR_SCHOOLS_DIR . 'includes/class-inventor-schools-customizations.php';
            require_once INVENTOR_SCHOOLS_DIR . 'includes/class-inventor-school-field-types.php';
			require_once INVENTOR_SCHOOLS_DIR . 'includes/class-inventor-school-logics.php';
        }
      }
     new Inventor_Schools();
    }
?>
