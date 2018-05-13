<?php
/* Template Name: Post Loaded with Bars
Template Post Type: post */
use Timber\Timber;

$context         = Timber::get_context();
$context['post'] = Timber::query_post();
$context['dynamic_sidebar1'] = Timber::get_widgets('footersidebar1');
$context['dynamic_sidebar2'] = Timber::get_widgets('footersidebar2');
$context['dynamic_sidebar3'] = Timber::get_widgets('footersidebar3');
$context['dynamic_sidebar4'] = Timber::get_widgets('footersidebar4');
$context['dynamic_sidebar5'] = Timber::get_widgets('topsidebar1');
$context['dynamic_sidebar6'] = Timber::get_widgets('topsidebar2');
$context['dynamic_sidebar7'] = Timber::get_widgets('topsidebar3');
$context['dynamic_sidebar8'] = Timber::get_widgets('topsidebar4');
Timber::render( 'pages/singlelb.twig', $context );
