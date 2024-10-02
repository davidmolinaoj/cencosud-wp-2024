<?php 

$pageInfo=get_fields( get_the_ID() );

$share_subject= array_key_exists('share_subject',$pageInfo)?$pageInfo['share_subject']:'';
$share_message= array_key_exists('share_message',$pageInfo)?$pageInfo['share_message']:'';
?>
<div class="social">
    <strong>Compártelo</strong> 
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink() ?>" target="_blank">
        <i class="fab fa-facebook"></i>
    </a>                    
    <a href="whatsapp://send?text=<?php echo get_the_permalink() ?>" data-action="share/whatsapp/share"  target="_blank">
        <?php echo get_image(THEME_IMGS.'icons/whatsapp.png','icon') ?>
    </a>
    <a href="mailto:email@destino.com?subject=<?php echo $share_subject ?>&body=<?php echo $share_message.': '.get_the_permalink() ?>"  target="_blank">
        <i class="fa fa-envelope"></i>
    </a>
</div>