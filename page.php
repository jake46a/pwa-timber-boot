<?php


use Timber\Timber;

$context         = Timber::get_context();
$context['post'] = Timber::query_post();
$context['dynamic_sidebar1'] = Timber::get_widgets('footersidebar1');
$context['dynamic_sidebar2'] = Timber::get_widgets('footersidebar2');
$context['dynamic_sidebarc1'] = Timber::get_widgets('topsidebarc1');
$context['dynamic_sidebarc2'] = Timber::get_widgets('topsidebarc2');
Timber::render( 'pages/page.twig', $context );
