<?php
/**
 * Template Name: Front Page
 * Description: The Site Homepage
 */

$context = Timber::context();
$context['post'] = new Timber\Post();
Timber::render('front-page.twig', $context);
