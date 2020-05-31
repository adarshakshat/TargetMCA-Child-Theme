<?php get_header('question')?>

<?php the_post(); ?>

<?php 



$entry_header_classes = '';

if ( is_singular() ) {
	$entry_header_classes .= ' header-footer-group';
}

?>

<header class="entry-header has-text-align-center<?php echo esc_attr( $entry_header_classes ); ?>">

	<div class="entry-header-inner section-inner medium">

		<?php
			/**
			 * Allow child themes and plugins to filter the display of the categories in the entry header.
			 *
			 * @since Twenty Twenty 1.0
			 *
			 * @param bool   Whether to show the categories in header, Default true.
			 */
		$show_categories = apply_filters( 'twentytwenty_show_categories_in_entry_header', true );

		if ( true === $show_categories && has_category() ) {
			?>

			<div class="entry-categories">
				<span class="screen-reader-text"><?php _e( 'Categories', 'twentytwenty' ); ?></span>
				<div class="entry-categories-inner">
					<?php the_category( ' ' ); ?>
				</div><!-- .entry-categories-inner -->
			</div><!-- .entry-categories -->

			<?php
		}

		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
		}

		$intro_text_width = '';

		if ( is_singular() ) {
			$intro_text_width = ' small';
		} else {
			$intro_text_width = ' thin';
		}

		if ( has_excerpt() && is_singular() ) {
			?>

			<div class="intro-text section-inner max-percentage<?php echo $intro_text_width; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">
				<?php the_excerpt(); ?>
			</div>

			<?php
		}

		// Default to displaying the post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-top' );
		?>

	</div><!-- .entry-header-inner -->

</header><!-- .entry-header -->



<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

<div class="entry-content">

    <?php
    if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
        the_excerpt();
    } else {
        the_content( __( 'Continue reading', 'twentytwenty' ) );
    }
    ?>
    <div class="row justify-content-center">
        <div class="col-6">
            <h4 class="answer"> Answer :  <?php $answer = get_post_meta( get_the_ID(), 'answer', true ); echo $answer; ?> </h4> 
        </div>
    </div>


</div><!-- .entry-content -->

</div><!-- .post-inner -->

<div class="section-inner">
<?php
wp_link_pages(
    array(
        'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
        'after'       => '</nav>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
    )
);

edit_post_link();

// Single bottom post meta.
twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

    get_template_part( 'template-parts/entry-author-bio' );

}
?>

</div><!-- .section-inner -->






<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}
    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
?>


<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>