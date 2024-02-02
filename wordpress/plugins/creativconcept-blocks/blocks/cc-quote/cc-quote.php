<?php

// Name of the block
$blockName = 'cc-quote';
 
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
$text = '';
if( function_exists( get_field() ) ) {
    $text = get_field('block_cc_quote') : 'das ist ein Beispieltext' ;
}




?>

<div class="come-in">

    <div id="" class="">

        <section class="w-full max-w-[920px] mx-auto pt-20 pb-[96px]">
        
            <p class="text-[28px] leading-9 desktop:leading-14 desktop:text-[45px] text-center text-[#595959]" style="font-family: 'Martel', serif !important;">
               <?php echo $text; ?>
              
            </p>
        
        </section>

    </div> 

</div>


<style>


.text-\[28px\]{font-size:28px}
.before\:hover\:text-center:hover:before,.hover\:before\:text-center:hover:before{content:var(--tw-content);text-align:center}.focus\:hover\:text-center:hover:focus,.hover\:focus\:text-center:focus:hover{text-align:center}
.w-full{width:100%}
.mx-auto{margin-left:auto;margin-right:auto}
.pt-20{padding-top:5rem}.pb-\[96px\]{padding-bottom:96px}
.text-\[\#595959\]{--tw-text-opacity:1;color:rgb(89 89 89/var(--tw-text-opacity))}
.leading-9{line-height:2.25rem}
.leading-14{line-height:56px}
.max-w-\[920px\]{max-width:920px}
.text-center{text-align:center}
@media (min-width:1300px){.desktop\:text-\[45px\]{font-size:45px}.desktop\:leading-14{line-height:56px}}



</style>
