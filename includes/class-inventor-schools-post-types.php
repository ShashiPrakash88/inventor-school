<?php
    if ( ! defined( 'ABSPATH' ) ) 
	{
	  exit;
	}
/**
 * Class Inventor_Schools_Post_Types
 *
 * @class Inventor_Schools_Post_Types
 * @package Inventor/Classes/Post_Types
 * @author Pragmatic Mates
 */
    class Inventor_Schools_Post_Types
    {
    /**
     * Initialize listing types
     *
     * @access public
     * @return void
     */
      public static function init() 
	  {
		 self::includes();
      }
/**
     * Loads listing types
     *
     * @access public
     * @return void
     */
      public static function includes()
	  {
        require_once INVENTOR_SCHOOLS_DIR . 'includes/post/post-type-school.php';
      }
    }
Inventor_Schools_Post_Types::init();
?>