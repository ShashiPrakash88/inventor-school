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
    public static function includes() {
        require_once INVENTOR_SCHOOLS_DIR . 'includes/customizations/class-inventor-schools-customizations-schools.php';
    }
}

Inventor_Schools_Customizations::init();
