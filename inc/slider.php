<?php //pr(get_post_meta( get_the_ID(), 'extra_metabox', true )); ?>
<?php
$slider_id = get_post_meta( get_the_ID(), 'extra_slider', true  );
$args = array(
'post_type' => 'slide',
'tax_query' => array(
    array(
        'taxonomy' => 'slider',
        'field' => 'term_id',
        'terms' => $slider_id
    )
  )
);
$slider_query = new WP_Query( $args );
echo '<div>';
if( $slider_query->have_posts() ): while( $slider_query->have_posts() ) : $slider_query->the_post();
    $slider_props = get_term_meta($slider_id);
    echo sprintf('<div style="%s">', 'width:'.$slider_props['slider_term_w'][0].';height:'.$slider_props['slider_term_h'][0]);
        echo '<div class="grid">';
        echo get_the_content(get_the_ID());
        //get_template_part('loop');
        echo '</div>';
    echo '</div>';
endwhile; endif;
echo '</div>';
?>
<?php //pr(get_post_meta( get_the_ID(), 'extra_image_position', true )); ?>
<?php //pr(get_post_meta( get_the_ID())); ?>
<?php //pr(get_the_id()); ?>
