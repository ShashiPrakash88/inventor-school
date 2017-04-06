<?php
if ( ! defined( 'ABSPATH' ) ) {exit;}
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
    public static function init() {self::includes();}
/**
     * Loads listing types
     *
     * @access public
     * @return void
     */
    public static function includes() 
    {
        require_once '/home/dh_xvgggh/stg6.edugorilla.com/wp-content/plugins/New/includes/post/post-type-school.php';
    }
}
Inventor_Schools_Post_Types::init();

