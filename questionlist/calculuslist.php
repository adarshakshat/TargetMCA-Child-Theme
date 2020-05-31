<div class="article-list">
    <div class="container">
        <?php  ?>
        <div class="intro">
            <h2 class="text-center">Questions from Algebra</h2>
            <p class="text-center">contains all the questions from Calculus for MCA entrances like NIMCET, BHUPGCET, MAH MCA CET</p>
        </div>
        <div class="row articles">
            <?php $args = array(
                    'post_type' => 'question',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => 'calculus',
                        ),
                    ),
                );
                $loop = new WP_Query( $args ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="col-sm-6 col-md-4 item"><a href="<?php echo get_the_permalink( ); ?>"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($post->ID, 'squaresm'); ?>" /></a>
                    <h3 class="name"><?php the_title(); ?></h3>
                    <p class="description"> <?php the_excerpt(); ?></p><a class="action" href=" <?php echo get_the_permalink( ); ?>"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <?php wp_reset_postdata(); ?>
            <?php endwhile ?>
        </div>
    </div>
</div>
