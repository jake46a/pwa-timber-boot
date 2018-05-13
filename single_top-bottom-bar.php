<?php
/* Template Name: Post Top and Bottom Bar
Template Post Type: post*/
use Timber\Timber;

$context         = Timber::get_context();
$context['post'] = Timber::query_post();
$context['dynamic_sidebar1'] = Timber::get_widgets('footersidebar1');
$context['dynamic_sidebar2'] = Timber::get_widgets('footersidebar2');
$context['dynamic_sidebar5'] = Timber::get_widgets('topsidebar1');
$context['dynamic_sidebar6'] = Timber::get_widgets('topsidebar2');
Timber::render( 'pages/single2b.twig', $context );
