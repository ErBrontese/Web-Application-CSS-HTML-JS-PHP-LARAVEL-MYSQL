<?php
/**
 * config.php
 *
 * Author: pixelcave
 *
 * Configuration php file. It contains variables used in the template
 *
 */

// Template variables
$template = array(
    'name'        => 'uAdmin',
    'version'     => '2.1',
    'author'      => 'pixelcave',
    'title'       => 'uAdmin - Professional, Responsive and Flat Admin Template',
    'description' => 'uAdmin is a Professional, Responsive and Flat Admin Template created by pixelcave and published on Themeforest',
    'header'      => '', // 'fixed-top', 'fixed-bottom'
    'layout'      => '', // 'fixed'
    'theme'       => '', // 'deepblue', 'deepwood', 'deeppurple', 'deepgreen', '' empty for default
    'active_page' => basename($_SERVER['PHP_SELF'])
);

// Primary navigation array (the primary navigation will be created automatically based on this array)
$primary_nav = array();