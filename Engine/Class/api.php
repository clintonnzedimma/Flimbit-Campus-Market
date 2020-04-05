<?php
/**
*	@author Clinton Nzedimma
*	@package API
*   @static  This is the api generation
*/

class API {
    public static $DB;
    function __construct()
    {
        self::$DB = new DB();
    }

    public static function keyExists($api_key) {
        return (self::$DB->query("SELECT * FROM api WHERE api_key = '$api_key' ")->num_rows> 0 ) ? true : false;
    }


}

new API();

?>