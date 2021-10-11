<?php 
/*
Plugin Name: CAS Auto seller listing
Plugin URI: 
Description: This plugin has the purpose to show listing products of the sellers
Author:
Author URI:
Version: 0.1
*/


defined ('ABSPATH') or die ('Hey, you can\t access this file');

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use CasautoSellerListing\shortCode\ShortCode;

if(!class_exists('CasautoSellerListing')){
    class  CasautoSellerListing{
        private static $instance = null;
        
      
        function __construct()
        {
              
           $this->register();
        
        }
        function register(){
           $shortCode = new ShortCode();
           
        }  
        public static function getInstance()
        {
            if (self::$instance == null) {
                
                self::$instance = new CasautoSellerListing();
            }

            return self::$instance;
        }
        function activate()
        {

            //Flush rewrite rules
            flush_rewrite_rules();
        }

        function deactivate()
        {
            //Flush rewrite rules

            flush_rewrite_rules();
        }
        static function uninstall()
        {
            flush_rewrite_rules();
        }  
    }
}

if(class_exists('CasautoSellerListing')){
    
    $casautoSellerListing =CasautoSellerListing::getInstance();
}
//activation
register_activation_hook(__FILE__, array($casautoSellerListing, 'activate'));

//deactivate
register_deactivation_hook(__FILE__, array($casautoSellerListing, 'deactivate'));

//uninstall

register_uninstall_hook(__FILE__, 'CasautoSellerListing::uninstall');