<?php 

if(!function_exists("base_urll")){
function base_urll($port="90",$atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = getHostByName(getHostName());
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
         
            $roi=explode('\\', __DIR__);
            $fruit = array_pop($roi);
            $end = ":$port/".end($roi)."/";
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }

}



 if (!defined('BASE_URL')) {
     define('BASE_URL', base_urll()); 
}

 if (!defined('API_LINK')) {
     define('API_LINK', base_urll().'API/');
    //echo API_LINK;
 }
 if (!defined('RASSPATH')) {
     define('RASSPATH', 'c:/xampp/php/php.exe'); 
 }


// define('BASE_URL', "localhost/rxclaim_client");
// define('API_LINK', "lcoalhost/rxclaim_client/v3ClientAPI/");
// define('RASSPATH', 'c:/xampp/php/php.exe');

?>
