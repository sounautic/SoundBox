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
        <!--navigation bar-->
        <nav>
            <div class="nav-wrapper container">
                <!--a href="#" class="brand-logo" id="icon-container">
                    <img src="/assets/images/logo.png" />
                </a-->
                <a href="/" class="brand-logo" id="icon-container">
                    SoundBox
                    <img src="/assets/images/logo.png" class="brand-logo" />
                </a>
                <ul id="nav-mobile" class="right side-nav">
                    <!--this will eventually link to the 
                    logged in user's profile.
                    profile id 1 is used for the time being-->
                    <li><a href="/profile/1">Profile</a></li>
                    <li>
                        <a href="/play">
                            Playlists
                        </a>
                    </li>
                    <li><a href="/rankings">Rankings</a></li>
                </ul>
            </div>
        </nav>

        <!--container for the content of the page-->
        <div class="container">
                <div class="fill-parent">
                    <div class="inner-body fill-page">
                        {content}
                    </div>
                </div>

        </div>

        <!--footer-->
        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                   Copyright &copy; 2015,  <a href="mailto:someone@somewhere.com">sounautic</a>.
                    <a class="grey-text text-lighten-4 right" href="about">About us</a>
                </div>
            </div>
        </footer>

        <script src="/assets/js/jquery-1.11.1.min.js"></script>
        <script src="/assets/js/materialize.min.js"></script>
        <script src="/assets/js/materialize.js"></script>
        <script src="/assets/js/soundbox.js"></script>
    </body>
</html>
