<?php 
$sectionID = 'testimonials-'. get_row_index();
?>


<section class="testimonials-section" id="<?= $sectionID; ?>">
    <div class="container">
        <?php if( get_field('testimonial_heading') || get_field('testimonial_description') ) : ?>
        <div class="testimonial-section-header text-center mx-auto">
            <?php if( get_field('testimonial_heading') ) : ?>
            <h2 class="h1 heading mb-4 text-light"><?= get_field('testimonial_heading'); ?></h2>
            <?php endif; ?>

            <?php if( get_field('testimonial_description') ) : ?>
            <div class="testimonial-description fs-5"><?= get_field('testimonial_description'); ?></div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if( get_field('testimonials') ) : ?>
        <div class="d-flex gap-4 align-items-start">
            <div class="testimonial-items-container">
                <?php foreach( get_field('testimonials') as $index => $testimonial ) : ?>
                <div class="testimonial-item">
                    <?php if( $testimonial['testimonial_logo'] ) : ?>
                        <?= wp_get_attachment_image($testimonial['testimonial_logo']['id'], 'full'); ?>
                    <?php endif; ?>

                    <?php if( $testimonial['testimonial_message'] ) : ?>
                    <div class="testimonial-message text-light fs-5 mt-4"><?= $testimonial['testimonial_message']; ?></div>
                    <?php endif; ?>

                    <?php if( $testimonial['testimonial_author'] || $testimonial['testimonial_position'] ) : ?>
                    <div class="testimonial-author-position d-flex gap-2 mt-4 pt-4 border-top">
                        <?php if( $testimonial['testimonial_author'] ) : ?>
                        <span class="text-light testimonial-author"><?= $testimonial['testimonial_author']; ?></span>
                        <?php endif; ?>

                        <?php if( $testimonial['testimonial_position'] ) : ?>
                        <span class="testimonial-position fw-medium"><?= $testimonial['testimonial_position']; ?></span>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <?php if( $testimonial['testimonial_link'] ) : ?>
                    <div class="testimonial-read-link mt-5">
                        <a class="fs-6 fw-medium text-decoration-none" target="<?= $testimonial['testimonial_link']['target'] ? '_blank' : '_self'; ?>" href="<?= $testimonial['testimonial_link']['url']; ?>">
                            <span class="py-2 border-bottom"><?= $testimonial['testimonial_link']['title']; ?></span>
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_21691_13-<?= $index; ?>)">
                            <path d="M4.99266 4.75736V6.25289L10.9164 6.25819L4.46233 12.7123L5.52299 13.773L11.9771 7.31885L11.9824 13.2426H13.4779V4.75736H4.99266Z" fill="#E7534F"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_21691_13-<?= $index; ?>">
                            <rect width="18" height="18" fill="white"/>
                            </clipPath>
                            </defs>
                            </svg>

                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php if( get_field('video') ) : ?>
            <div class="testimonial-items-video-wrapper position-relative overflow-hidden ps-2">
                <video <?php if( get_field('video_poster') ) : ?>poster="<?= get_field('video_poster')['url']; ?>"<?php endif; ?> loop playsinline  style="width:100%; height:auto;" class="rounded-3 video-el d-block">
                    <source src="<?php echo esc_url(get_field('video')['url']); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <svg id="video-play" class="cursor-pointer position-absolute top-50 start-50 translate-middle z-2" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_19614_597)">
                <mask id="mask0_19614_597" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="80" height="80">
                <path d="M80 0H0V80H80V0Z" fill="white"/>
                </mask>
                <g mask="url(#mask0_19614_597)">
                <path d="M40 0C17.92 0 0 17.92 0 40C0 62.08 17.92 80 40 80C62.08 80 80 62.08 80 40C80 17.92 62.08 0 40 0ZM32 58V22L56 40L32 58Z" fill="white"/>
                </g>
                </g>
                <defs>
                <clipPath id="clip0_19614_597">
                <rect width="80" height="80" fill="white"/>
                </clipPath>
                </defs>
                </svg>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<style>
#<?= $sectionID; ?>{
    padding: var(--adapt-section-space) 0;
    background-color: var(--adapt-secondary-black);
}
#<?= $sectionID; ?> .testimonial-section-header{
    max-width: 564px;
    margin-bottom: 80px;
}
#<?= $sectionID; ?> .testimonial-description{
    color: var(--adapt-secondary-medium-grey);
}

#<?= $sectionID; ?> .testimonial-position{
    color: var(--adapt-secondary-medium-grey);
}
#<?= $sectionID; ?> .testimonial-author-position{
    font-size: var(--adapt-paragraph-xsmall);
    border-color: #313131 !important;
}
#<?= $sectionID; ?> .testimonial-read-link a{
    color: var(--adapt-red);
}
#<?= $sectionID; ?> .testimonial-read-link a span{
    border-color: var(--adapt-red) !important;
}
#<?= $sectionID; ?> .testimonial-items-container {
  position: relative;
  overflow: hidden;
  min-height: 420px;
  min-width: 523px;
}

#<?= $sectionID; ?> .testimonial-item {
  position: absolute;
  inset: 0;
  background: var(--adapt-secondary-black-three);
  border-radius: 4px;
  padding: 56px 48px;
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
}

#<?= $sectionID; ?> .testimonial-item img{
    max-height: 40px;
    object-fit: contain;
    object-position: left;
}

#<?= $sectionID; ?> .testimonial-item.is-active {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}

#<?= $sectionID; ?> .testimonial-dots {
  position: absolute;
  right: 48px;
  bottom: 64px;
  display: flex;
  align-items: center;
  gap: 8px;
  z-index: 20;
}

#<?= $sectionID; ?> .testimonial-dot {
  width: 8px;
  height: 8px;
  border-radius: 999px;
  background: rgba(255,255,255,0.28);
  cursor: pointer;
  transition: all 640ms cubic-bezier(0.23, 1, 0.32, 1);
  padding: 0;
  overflow: hidden;
  position: relative;
}

#<?= $sectionID; ?> .testimonial-dot:before{
    position: absolute;
    content: '';
    background: var(--adapt-white);
    width: 0%;
    top: 0;
    left: 0;
    height: 100%;
}

#<?= $sectionID; ?> .testimonial-dot.is-active {
    width: 20px;
}
#<?= $sectionID; ?> .testimonial-dot.is-active:before{
    width: 100%;
    transition: all 5s linear;
}

#<?= $sectionID; ?> .testimonial-items-video-wrapper video{
    aspect-ratio: 16/9;
    border-radius: 4px;
}
#<?= $sectionID; ?> .testimonial-items-video-wrapper:not(.is-playing):before{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);
}
#<?= $sectionID; ?> .testimonial-items-video-wrapper svg{
    cursor: pointer;
}
</style>