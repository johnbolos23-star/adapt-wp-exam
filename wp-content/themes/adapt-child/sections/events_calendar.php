<?php 
$sectionID = 'events_calendar-'. get_row_index();
?>

<section class="events-calendar-section position-relative" id="<?= $sectionID; ?>">
    <div class="container">
        <?php if( get_field('events_section_heading') ) : ?>
        <h2 class="h1 heading text-center"><?= get_field('events_section_heading'); ?></h2>
        <?php endif; ?>


        <?php if( get_field('events') ) : $theEvents = get_field('events'); ?>
        <div class="events-calendar-items d-flex align-items-centesr position-relative">
            <div class="events-calendar-item-counts position-relative">
                <div class="position-sticky top-50 translate-middle-y">
                <?php foreach( $theEvents as $index => $event ) : ?>
                <div class="event-calendar-item-count p-1 rounded-1 fw-medium text-center <?= $index == 0 ? 'active' : ''; ?>" data-counter="<?= $index + 1; ?>"><?= $index + 1 >= 10 ? $index + 1 : '0' . $index + 1;?></div>
                <?php endforeach; ?>
                </div>
            </div>

            <div class="events-calendar-item-content">
                <?php foreach( $theEvents as $index => $event ) : ?>
                <div class="events-calendar-item <?= $index == 0 ? 'active' : ''; ?>" data-content="<?= $index; ?>">
                    <?php if( $event['event_date'] ) : ?>
                    <div class="event-date fs-3"><?= $event['event_date']; ?></div>
                    <?php endif; ?>
                    <?php if( $event['event_name'] ) : ?>
                    <div class="event-name fs-3 "><?= $event['event_name']; ?></div>
                    <?php endif; ?>

                    <?php if( $event['event_location'] ) : ?>
                    <div class="event-location fw-medium"><?= $event['event_location']; ?></div>
                    <?php endif; ?>

                    <?php if( $event['event_description'] ) : ?>
                    <div class="event-description mt-3"><?= $event['event_description']; ?></div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="events-calendar-item-content-image overflow-hidden">
                <?php foreach( $theEvents as $index => $event ) : ?>
                <div class="events-calendar-item-image  transition <?= $index == 0 ? 'active' : ''; ?>" data-content="<?= $index; ?>">
                    <?php if( $event['event_image'] ) : ?>
                    <?= wp_get_attachment_image($event['event_image']['id'], 'full'); ?>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
#<?= $sectionID; ?> {
    padding: var(--adapt-section-space) 0;
}
#<?= $sectionID; ?>:before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 1px;
    background-color: #E4E4E4;
    height: 100%;
    left: calc(((100vw - 1320px) / 2) + 80px);
    pointer-events: none;
}
#<?= $sectionID; ?> .events-calendar-items{
    margin-top: 80px;
}
#<?= $sectionID; ?> .event-location{
    font-size: 14px;
    color: var(--adapt-secondary-medium-grey);
}
#<?= $sectionID; ?> .event-description{
    font-size: 14px;
    color: var(--adapt-secondary-black-three);
    width: 301px;
}
#<?= $sectionID; ?> .event-date{
    color: var(--adapt-red);
    line-height: 36px;
}
#<?= $sectionID; ?> .event-name{
    color: var(--adapt-black);
    line-height: 36px;
    max-width: 240px;
    margin-bottom: 12px;
}
#<?= $sectionID; ?> .events-calendar-item-image:not(.active){
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
}
#<?= $sectionID; ?> .events-calendar-item-image img {
    aspect-ratio: 12/8;
    object-fit: cover;
}
#<?= $sectionID; ?> .events-calendar-item-counts {
    padding-top: 295px;
    padding-right: 57px;
    padding-bottom: 150px;
}
#<?= $sectionID; ?> .event-calendar-item-count{
    font-size: var(--adapt-label-xsmall);
    color: var(--adapt-secondary-medium-grey);
    width: 22px;
    height: 23px;
    background-color: transparent;
    transition: all .3s ease;
    line-height: 17px;
}
#<?= $sectionID; ?> .event-calendar-item-count:not(:last-child){
    margin-bottom: 12px;
}
#<?= $sectionID; ?> .event-calendar-item-count.active{
    color: var(--adapt-white);
    background-color: var(--adapt-secondary-black-three);
}

#<?= $sectionID; ?> .events-calendar-item-content{
    padding: 0 32px;
}
#<?= $sectionID; ?> .events-calendar-item {
    /* padding-top: 18vh;
    padding-bottom: 18vh; */
    aspect-ratio: 3 / 6;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
#<?= $sectionID; ?> .events-calendar-item *{
    transition: all 0.3s ease;
}
#<?= $sectionID; ?> .events-calendar-item:not(.active) *{
    color: var(--adapt-secondary-medium-grey);
}
#<?= $sectionID; ?> .events-calendar-item-content-image {
    align-self: self-start;
    position: sticky !important;
    top: 20%;
}


#<?= $sectionID; ?> .pin-spacer {
    padding: 0 !important;
}

#<?= $sectionID; ?> .events-calendar-items {
    top: 0 !important;
    left: 0 !important;
    box-sizing: border-box!important;
    transform: translate(0px, 0px)!important;
}
</style>