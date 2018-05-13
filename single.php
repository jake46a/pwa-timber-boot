<?php


    $argscf = array(
        'id_form'           => 'commentform',
        'title_reply'       => __('leave a thought', 'pwasite'),
        'title_reply_to'    => __('leave a thought to %s', 'pwasite'),
        'cancel_reply_link' => __('cancel thought', 'pwasite'),
        'label_submit'      => __('post thought', 'pwasite'),
        'comment_field' =>  '<p><textarea placeholder="Start typing..." id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
        'comment_notes_after' => '<p class="form-allowed-tags">' . __('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'wp-bootstrap-starter') . '</p><div class="alert alert-info">' . allowed_tags() . '</div>',
        'class_submit' => 'submit btn btn-primary'
      );

use Timber\Timber;

$context         = Timber::get_context();
$context['argscf'] = $argscf;
$context['post'] = Timber::query_post();
$context['dynamic_sidebar1'] = Timber::get_widgets('footersidebar1');
$context['dynamic_sidebar2'] = Timber::get_widgets('footersidebar2');
$next_post = get_previous_post();
if ( is_a( $next_post , 'WP_Post' ) ) {
   $context['nextPost'] = '<a class="float-left btn btn-info" href="' . get_permalink( $next_post->ID ) . '"  role="button">Prev</a>';
}

$prev_post = get_next_post();
if ( is_a( $prev_post , 'WP_Post' ) ) {
    $context['prevPost'] = '<a class="float-right btn btn-info" href="' .  get_permalink( $prev_post->ID ) . '"  role="button">Next</a>';
}
Timber::render( 'pages/single.twig', $context );
