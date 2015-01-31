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
                    <li><a href="profile">Profile</a></li>
                    <li>
                        <a href="javascript:$('.button-collapse').sideNav('show');">
                            Playlists
                        </a>
                    </li>
                    <li><a href="rankings">Rankings</a></li>
                </ul>
            </div>
        </nav>


        <ul id="slide-out" class="side-nav full">
            <li><a href="#!">Playlist 1</a></li>
            <li><a href="#!">Playlist 2</a></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <div class="collapsible-header">
                            Playlist 3
                            <i class="mdi-navigation-arrow-drop-down"></i></div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#!">Video 1</a></li>
                                <li><a href="#!">Video 2</a></li>
                                <li><a href="#!">Video 3</a></li>
                                <li><a href="#!">Video 4<span class="badge">playing</span></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>


        <!--container for the content of the page-->
        <div class="container">
            <div id="content" class='content-container'>

                <div class="fill-parent">
                    <div class="inner-body">
                        {content}
                    </div>
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
