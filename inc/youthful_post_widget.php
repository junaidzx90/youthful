<?php
    $post = array(
        "post_type" => "post"
    );

    $query = new WP_Query($post);
    
if ( $query->have_posts() ) { ?>
    <div id="widget-slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
                $x = "";
                $data = 0;
                while ( $query->have_posts() ) {
                    $query->the_post();
                    echo '<li data-target="#widget-slider" data-slide-to="'.$data.'" class="active'.$x.'"></li>';
                    $data++;
                    $x++;
                }
            ?>
        </ol>
        <div class="carousel-inner widget-carousel" role="listbox">
        <?php
        $i = "";
        while ( $query->have_posts() ) {
            $query->the_post(); 
            ?>
            <!-- slider item -->
            <div class="carousel-item active<?php echo $i ?>">
            <div class="card text-left widget-card">
                <?php echo get_the_post_thumbnail(); ?>
                <div class="p-0 card-body">
                <a href="<?php the_permalink(); ?>"><?php echo $args["before_title"] .get_the_title(). $args["after_title"]; ?></a>
                
                <p class="card-text">
                    <?php the_excerpt(  ); ?>
                </p>
                </div>
            </div>
            </div>
            <?php
            $i=1;
        }
        ?>
        </div>
        <a class="carousel-control-prev" href="#widget-slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon widget-btn" aria-hidden="true"></span>
        <span class="sr-only"><?php __("Previous","youthful") ?></span>
        </a>
        <a class="carousel-control-next" href="#widget-slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon widget-btn" aria-hidden="true"></span>
        <span class="sr-only"><?php __("Next","youthful") ?></span>
        </a>
    </div>
<?php 
}