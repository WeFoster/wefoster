<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">

  <div class="media comment-wrap">
      <div class="media-body">
        <a href="<?php comment_author_url(); ?>">
              <figure class="media-object pull-left"><?php echo get_avatar( $comment, 120, '', 'Author gravatar' ); ?></figure>
        </a>
      <h4 class="media-heading">
        <a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author">
          <?php comment_author(); ?>
        </a>
      <time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time>
      </h4>

      <div class="comment-content">
          <?php comment_text() ?>

          <?php if ($comment->comment_approved == '0') : ?>
            <p class="comment-meta-item"><?php _e('Your comment is awaiting moderation.', 'wefoster'); ?>  </p>
          <?php endif; ?>

      </div>


      <div class="comment-reply">
        <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>

      </div>
  </div>
