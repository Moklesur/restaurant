<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeTim_WordPress_Framework
 */

if ( is_single() ) {
	$margin[] = 'single-post';
}else{
	$margin[] = 'margin-bottom-30 overflow col-md-6 col-xs-12 col-sm-6';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($margin); ?>>
	<div class="entry-content blog-bg">
		<?php
		if(has_post_thumbnail()):
			if(is_single()) { ?>
				<img src="<?php echo $post_thumbnail_id = get_the_post_thumbnail_url(); ?>"
					 class="img-responsive margin-bottom-20" alt=""/>
			<?php } else { ?>
				<a href="<?php the_permalink(); ?>"><img
						src="<?php echo $post_thumbnail_id = get_the_post_thumbnail_url(); ?>"
						class="img-responsive margin-bottom-20" alt=""/></a>
				<?php
			}
		endif;
		?><div class="blog-details position-relative"><?php
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta  meta-fix">
					<?php themetim_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
			endif;
			if ( is_single() ) {
				the_title( '<h3 class="entry-title text-capitalize margin-null margin-bottom-20">', '</h3>' );
			} else {
				the_title( '<h3 class="entry-title margin-null text-capitalize margin-bottom-20"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			}
			if(is_single()) :
				the_content();
			else:
				$excerpt = get_theme_mod('excerpt_lenght', '13');
				//return $excerpt;
				the_excerpt();
			endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'themetim' ),
				'after'  => '</div>',
			) );
			?>
			<footer class="entry-footer overflow">
				<?php if(!is_single()) : ?>
					<div class="pull-left">
						<a href="<?php the_permalink(); ?>" class="btn btn-default margin-top-10 text-capitalize">read more</a>
					</div>
				<?php endif; ?>
				<?php if (get_theme_mod('blog_social_sharing_enable', '1')) : ?>
					<div class="pull-right margin-top-10 social-sharing">
						<?php themetim_social_sharing(); ?>
					</div>
				<?php endif; ?>
			</footer><!-- .entry-footer -->
		</div><!-- .blog-details -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->
