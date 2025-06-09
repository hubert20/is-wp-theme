<?php
$banner_cnt = get_field('banner_cnt');
$bg_hero = get_field('bg_hero');
?>

<div class="container-fluid text-center hero_wrap position-relative" style="background-image: url('<?php echo $bg_hero; ?>')">
    <?php echo $banner_cnt; ?>
</div>