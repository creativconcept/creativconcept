<?php

// Name of the block
$blockName = 'imageslider';
 
// Create id attribute allowing for custom "anchor" value.
$id = $blockName . '-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$className = $blockName;
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Get values
$group = get_field( 'block_imageslider' );
$slider = $group['images'];
$link = $group['link'];

?>

<div>

    <?php

    // Create markup
    if( $group && $slider ): ?>

        <?php if( $link && !empty($link) ) echo '<a href="'.$link.'">'; ?>
            <div id="<?php echo $id.'-slick'; ?>">

                <?php foreach( $slider as $slide ): ?>
                    <?php $image = $slide['image']; ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                <?php endforeach; ?>

            </div>
        <?php if( $link && !empty($link) ) echo '</a>'; ?>

    <?php else: ?>
    
        <p><br>Bitte Bilder hinzufügen, um den Slider zu befüllen.</p>

    <?php endif; ?>

</div>

<script>
    ( function( $ ) {
        $(document).ready(function(){
            $("#<?php echo $id.'-slick'; ?>").slick({
                autoplay: true,
                autoplaySpeed: 0,
                speed: 7500,
                cssEase:'linear',
                infinite: true,
                dots: false,
                arrows: false,
                pauseOnHover: false,
                pauseOnFocus: false,
                slidesToShow: 2,
                centerMode: true,
                variableWidth: true
            });
        });
    }( jQuery ) );
</script>

<style>

    #<?php echo $id.'-slick'; ?> {
        padding-bottom: 5rem;
    }
    @media screen and (max-width: 1199px) {
        #<?php echo $id.'-slick'; ?> {
            padding-bottom: 1.5rem;
        }
    }

    #<?php echo $id.'-slick'; ?> img {
        max-height: 600px;
    }
    @media screen and (max-width: 1199px) {
        #<?php echo $id.'-slick'; ?> img {
            max-height: 400px;
        }
    }

</style>
