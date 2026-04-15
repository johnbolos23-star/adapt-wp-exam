<?php get_header(); ?>

<?php 

/* BANNER */
if( get_field('heading') ){
    get_template_part('./sections/banner');
}

/* VIDEO */
if( get_field('video_source_oembed') ){
    get_template_part('./sections/video_oembed');
}


/* Events */
if( get_field('events') || get_field('events_section_heading') ){
    get_template_part('./sections/events_calendar');
}

/* TESTIMONIALS  */
if( get_field('testimonial_heading') || get_field('testimonials') ){
    get_template_part('./sections/testimonials');
}
?>

<?php get_footer(); ?>