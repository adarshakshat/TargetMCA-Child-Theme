<?php
/*
*Template Name: CheatCode

*/ ?>

<?php get_header(  ); ?>

    <div class=" container questionlistcontainer">
        <?php $loop = new WP_Query( array( 'post_type' => 'formula', 'posts_per_page' => 10 ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="row">
                <div>
                    <?php the_title( '<h2 class=" text-center display-4"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
                </div>
                <div>
                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
                </div>        

            </div>
        <?php endwhile ?>
    </div>


    
<?php get_footer(  ); ?>