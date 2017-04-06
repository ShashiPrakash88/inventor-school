<?php

if ( ! defined( 'ABSPATH' ) ) {exit;}

/**
 * Class Inventor_Schools_Customizations
 *
 * @access public
 * @package Inventor_Schools/Classes/Customizations
 * @return void
 */
class Inventor_Schools_Customizations 
{
    
/**
     * Initialize customizations
     *
     * @access public
     * @return void
     */
    public static function init() {self::includes();}
/**
     * Include all customizations
     *
     * @access public
     * @return void
     */
    public static function includes() 
    {
    require_once '/home/dh_xvgggh/stg6.edugorilla.com/wp-content/plugins/New/includes/customizations/class-inventor-schools-customizations-schools.php';
    }
}

Inventor_Schools_Customizations::init();
