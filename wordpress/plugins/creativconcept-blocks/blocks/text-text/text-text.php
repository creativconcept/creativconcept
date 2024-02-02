<?php

// Name of the block
$blockName = 'text-text';
 
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


?>

<div class="come-in">

    <div id="" class="">

        <section class="w-full mx-auto max-w-screen-xl px-6">
            <div class="">
        
                <h2>bla bla bb</h2>
                
                <div class="flex flex-col space-x-0 md:space-x-6 md:flex-row">
                    <div class="flex-1">
                        <p>das ist ein Test</p>
                    </div>
                    <div class="flex-1">
                        <p>Lorem dolor dolor amet sit!</p>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </div> 

</div>
