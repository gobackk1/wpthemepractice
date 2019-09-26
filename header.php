<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header">
  <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
</header>
<?php if(has_nav_menu('primary')): ?>
<nav class="nav">
  <?php wp_nav_menu(array(
    'theme_location'=>'primary',
  )); ?>
</nav>
<?php endif ?>
