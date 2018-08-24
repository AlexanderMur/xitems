<?

// Check if user has previously commented the post.

global $product;

add_action( 'pre_comment_on_post', 'checking_comment' );

function checking_comment($comment_post_ID) {

    $usercomment = get_comments( array (
        'user_id' => get_current_user_id(),
        'post_id' => $comment_post_ID,
    ) );

    if ( $usercomment ) {
        wp_safe_redirect($_SERVER['HTTP_REFERER']);
        exit();
    } else {
        return;
    }

}