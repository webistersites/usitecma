<?php
/**
 * The template for displaying Comments.
 *
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required())
    return;
?>
<div class="comments-article">
    <?php if (have_comments()) : ?>
        <div class="comments-article">
            <div class="home-title">
                <h2><span><?php
                        printf(_n('1 Comment', '%1$s Comments', get_comments_number(), 'legal'), number_format_i18n(get_comments_number()), get_the_title());
                        ?></span></h2>
            </div>                                
        </div>
        <ol class="comment-list">
            <?php wp_list_comments(array('avatar_size' => 80, 'style' => 'ol', 'short_ping' => true,)); ?>
        </ol>
        <?php paginate_comments_links(); ?> 
    <?php endif; ?>
    <div class="reply-box">
        <?php comment_form(); ?>
    </div>
</div>

