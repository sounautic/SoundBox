<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * view/template.php
 *
 * Pass in $pagetitle (which will in turn be passed along)
 * and $pagebody, the name of the content view.
 *
 * ------------------------------------------------------------------------
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{title}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link type="text/css" href="/assets/css/materialize.css" rel="stylesheet"/>
        <link type="text/css" href="/assets/css/materialize.min.css" rel="stylesheet"/>
        <link type="text/css" href="/assets/css/style.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="container">
            <a id="icon-container" href="/">
                <img src="/assets/images/logo.png" />
            </a>
        </div>
        <div class="container">
            <!--
            <div class="navbar">
                <div class="navbar-inner">
                    {menubar} 
                </div>
            </div>           
            -->
            <div id="content" class='content-container'>

                <div class="fill-parent">
                    <div class="inner-body">
                        {content}
                    </div>
                </div>
            </div>
            <div id="footer" class="span12">
                Copyright &copy; 2014,  <a href="mailto:someone@somewhere.com">Me</a>.
            </div>
        </div>
        <script src="/assets/js/jquery-1.11.1.min.js"></script>
        <script src="/assets/js/materialize.js"></script>
    </body>
</html>
