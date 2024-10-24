<?php
    define('BASE_URL', 'http://localhost:8020/');
    

    if (!function_exists('host_url')) {
        function host_url() {
            return BASE_URL;
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

    if (!function_exists('js_container')) {
        function js_container() {
            return view('Components/JavascriptContainer');
        }
    }
?>