<?php
/**
 * Support for bbPress user roles and capabilities
 * 
 * Project: Role Manager Mtaandao plugin
 * Author: Mtaandao
 * Author email: dev@mtaandao.co.ke
 * Author URI: http://mtaandao.co.ke
 * 
 **/

class RM_bbPress {

    public static $instance = null;
    
    protected $lib = null;
    
    
    protected function __construct(RM_Lib $lib) {
        
        $this->lib = $lib;
        
    }
    // end of __construct()
    
    
    static public function get_instance(RM_Lib $lib) {
        if (!function_exists('bbp_filter_blog_editable_roles')) {  // bbPress plugin is not active
            return null;            
        }
        
        if (self::$instance!==null) {
            return self::$instance;
        }
        
        if ($lib->is_pro()) {
            self::$instance = new RM_bbPress_Mn($lib);
        } else {
            self::$instance = new RM_bbPress($lib);
        }
        
        return self::$instance;
    }
    // end of get_instance()
    

    /**
     * Exclude roles created by bbPress
     * 
     * @global array $mn_roles
     * @return array
     */
    public function get_roles() {
        
        global $mn_roles;
                        
        $roles = bbp_filter_blog_editable_roles($mn_roles->roles);  // exclude bbPress roles	         
        
        return $roles;
    }
    // end of get_roles()
    
    
    /**
     * Get full list user capabilities created by bbPress
     * 
     * @return array
     */   
    public function get_caps() {
        $caps = array_keys(bbp_get_caps_for_role(bbp_get_keymaster_role()));
        
        return $caps;
    }
    // end of get_caps()
    
}
// end of RM_bbPress class