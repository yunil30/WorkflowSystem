<?php
    define('BASE_URL', 'http://localhost:8020/');

    if (!function_exists('host_url')) {
        function host_url() {
            return BASE_URL;
        }
    }

    if (!function_exists('hashPassword')) {
        function hashPassword($password) {
            return sha1(md5($password));
        }
    }

    if (!function_exists('ShowHeader')) {
        function ShowHeader() {
            return view('Components/HeaderContainer');
        }
    }

    if (!function_exists('ShowFooter')) {
        function ShowFooter() {
            return view('Components/FooterContainer');
        }
    }

    if (!function_exists('css_container')) {
        function css_container() {
            return view('Components/StyleContainer');
        }
    }

    if (!function_exists('js_container')) {
        function js_container() {
            return view('Components/JavascriptContainer');
        }
    }

    if (!function_exists('create_folder')) {
        function create_folder() {
            $Year = date('Y');
            $Num = rand(1,100).time();
   
            return $Year.'-'.$Num;
        }
    }

    if (!function_exists('upload_url')) {
        function upload_url() {
            return BASE_URL . 'public/WfsUploads/';
        }    
    }
?>