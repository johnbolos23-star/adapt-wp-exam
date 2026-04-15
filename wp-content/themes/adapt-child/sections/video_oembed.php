<?php 
$sectionID = 'home-video-'. get_row_index();
?>

<section class="home-video" id="<?= $sectionID; ?>">
    <div class="container">
        <div class="video-oembed-wrapper position-relative text-center <?= get_field('enable_pop-up_player') ? 'with-popup' : ''; ?>">
            
        <?php $video_file = get_field('video_source_oembed'); ?>

        <?php if ($video_file && !empty($video_file['url'])): ?>
        <div class="video-inner-wrapper position-relative mx-auto transition" style="width:80%; height:auto;">
            <?php if( get_field('enable_pop-up_player') ) : ?>
            <div class="videp-popup-btn-container position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center z-2">
                <button class="video-popup-btn btn btn-outline-light z-2">
                    <?= get_field('pop-up_button_label') ?? 'Watch video'; ?>&nbsp;&nbsp;
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_21502_446)">
                            <path d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM8 14.5V5.5L14 10L8 14.5Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_21502_446">
                                <rect width="20" height="20" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>
            <?php endif; ?>
            <video autoplay muted loop playsinline  style="width:100%; height:auto;" class="rounded-3 video-el d-block">
                <source src="<?php echo esc_url($video_file['url']); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <?php endif; ?>

        
        </div>
    </div>
</section>
<style>
#<?= $sectionID; ?>{
    background-color: var(--adapt-secondary-black);
    padding-bottom: var(--adapt-section-space);
}
    
#<?= $sectionID; ?> .video-el{
    border: 1px solid;
    border-image-source: linear-gradient(180deg, var(--adapt-secondary-black-three) 0%, #3E3E3E 100%);
    box-shadow: 0px 14px 32px 0px #00000096;
    box-shadow: 0px 57px 57px 0px #00000082;
    box-shadow: 0px 129px 78px 0px #0000004D;
    box-shadow: 0px 230px 92px 0px #00000017;
    box-shadow: 0px 359px 101px 0px #00000003;
}
#<?= $sectionID; ?> .video-popup-btn{
    padding: 20px 32px;
    backdrop-filter: blur(4px);
    background: var(--adapt-black)3D;
}
#<?= $sectionID; ?> .videp-popup-btn-container:before{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--adapt-black);
    opacity: .4;
    border-radius: 8px;
}
</style>