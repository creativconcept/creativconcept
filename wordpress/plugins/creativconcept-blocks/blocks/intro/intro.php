<?php

// Name of the block
$blockName = 'intro';
 
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
$group = get_field( 'block_intro' );
$elements = $group['elements'];
$navigation = $group['navigation'];

// Create instance for the block
$theBlock = new CcComponents();

?>

<div class="page-container come-in">

    <?php

    // Create markup
    if( $group && $elements ): ?>
        <?php if( in_array( 'headline', $elements ) ):
            echo $theBlock->headline( $group['headline']['comp_headline'] );                
        endif; ?>
        <?php if( in_array( 'subheadline', $elements ) ):
            echo $theBlock->subheadline( $group['subheadline']['comp_subheadline'] );                
        endif; ?>
        <?php if( in_array( 'sectionheading', $elements ) ):
            echo $theBlock->sectionheading( $group['sectionheading']['comp_sectionheading'] );                
        endif; ?>
        <div class="<?php echo $id;?>-container">
            <div class="<?php echo $id;?>-description">
                <?php if( in_array( 'paragraph', $elements ) ):
                    echo $theBlock->paragraph( $group['paragraph']['comp_paragraph'] );                
                endif; ?>
                <?php if( in_array( 'button', $elements ) ):
                    switch( $group['button']['comp_button']['type'] ):
                        case 'page': $button_link = $group['button']['comp_button']['pagelink']; break;
                        case 'url': $button_link = $group['button']['comp_button']['url']; break;
                    endswitch;
                    echo $theBlock->button( $group['button']['comp_button']['text'], esc_url( $button_link ) );               
                endif; ?>
            </div>

            <?php if( $navigation ): ?>
                <div class="<?php echo $id;?>-anchors">
                    <?php foreach( $navigation as $item ):
                        $titel = $item['titel'] ?: 'Titel';
                        $link = $item['link'] ?: null; ?>
                        
                        <?php if( isset( $link ) ): ?>
                            <a href="<?php echo $link; ?>"><?php echo $titel; ?></a>
                        <?php else: ?>
                            <span style="font-weight: 700;"><?php echo $titel; ?></span>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>

<style>
    .<?php echo $id; ?>-container {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }

    @media screen and (max-width: 1199px) {
        .<?php echo $id; ?>-container {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    }

    .<?php echo $id; ?>-description {
        -ms-flex-preferred-size: 66.66%;
        flex-basis: 66.66%;
        -webkit-box-ordinal-group: 2;
    }

    @media screen and (max-width: 1199px) {
        .<?php echo $id; ?>-description {
            -webkit-box-ordinal-group: 3;
        }
    }

    .<?php echo $id; ?>-anchors {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-ordinal-group: 3;
        border-top: 1px solid #ff4539;
        color: #ff4539;
        padding: 0.5rem 0rem;
    }

    @media screen and (max-width: 1199px) {
        .<?php echo $id; ?>-anchors {
            -webkit-box-ordinal-group: 2;
            margin-bottom: 1.6666666666666667rem;
        }
    }

    .<?php echo $id; ?>-anchors > * {
        padding: 0.25rem 0rem;
        font-size: 0.8888888888888888rem;
    }

    @media screen and (max-width: 1199px) {
        .<?php echo $id; ?>-anchors > * {
            padding: 0.5rem 0rem;
            font-size: 1rem;
        }
    }

</style>
