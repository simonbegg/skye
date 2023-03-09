<?php
/**
 * Template Name: Password Protected
 * Description: Template for all protected pages
 */

use Timber\Timber as Timber;

$context = Timber::get_context();
$post = new TimberPost();
$context['page'] = $post;
$context['protected'] = post_password_required($post->ID); // here i am trying to check if the current page is password protected and adding the check to the context
$context['password_form'] = get_the_password_form(); // grabbing the function to display the password form and adding it to the context
Timber::render(array(
    'password-protected.twig',
), $context);