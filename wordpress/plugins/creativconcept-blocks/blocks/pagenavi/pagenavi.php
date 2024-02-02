<?php

// Name of the block
$blockName = 'pagenavi';
 
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
$group = get_field( 'block_pagenavi' );
$navigation = $group['items'];

?>

<div class="page-container come-in">

    <?php

    // Create markup
    if( $group && $navigation ): ?>

        <ul class="onpage_navigation">

            <?php foreach( $navigation as $item ): ?>
                <li>
                    <a href="<?php echo $item['link'] ?: '#'; ?>"><?php echo $item['titel'] ?: 'Titel'; ?></a>
                </li>
            <?php endforeach; ?>

        </ul>

    <?php endif; ?>

</div>
