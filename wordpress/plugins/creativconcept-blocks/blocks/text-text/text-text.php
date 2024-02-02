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

// get ACF values
$headline = '';
$text_l = '';
$text_r = '';


if( function_exists( get_field() ) ) {
    $headline = get_field('block_tt_headline') : 'das ist ein Beispieltext' ;
    $text_l = get_field('block_tt_text_l') : 'lorem' ;
    $text_r = get_field('block_tt_text_r') : 'ipsum' ;
}




?>

<div class="come-in">

    <div id="" class="">

        <section class="w-full max-w-[920px] mx-auto pt-20 pb-[96px]">
            <div class="">
        
                <h2>
         asdf
                </h2>
                
                <div class="flex flex-col md:space-x-6 md:flex-row">

                    <div class="flex-1">
                        <p>
                     asdfsadfdsaf
                        </p>
                    </div>

                    <div class="flex-1">
                        <p> 
                          asdfdsaf
                        </p>
                    </div>

                </div>

            </div>
        </section>

    </div> 

</div>


<style>

.flex{display:flex}
.flex-col{flex-direction:column}
.flex-col-reverse{flex-direction:column-reverse}
.flex-1{flex:1 1 0%}
.md\:flex-row{flex-direction:row}
@media (min-width:768px){.md\:flex-row{flex-direction:row}.md\:space-x-6>:not([hidden])~:not([hidden]){--tw-space-x-reverse:0;margin-right:calc(1.5rem*var(--tw-space-x-reverse));margin-left:calc(1.5rem*(1 - var(--tw-space-x-reverse)))}}
</style>