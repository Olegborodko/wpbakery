<?php
$args = array(
  'name' => '',
  'photo' => '',
  'content' => '',
  'fb' => '',
  'tw' => '',
  'inst' => '',
);

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);
?>

<div class="text-center mb-5" data-aos="fade-up">
  <img src="<?=esc_attr(wp_get_attachment_url($photo))?>" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
  <h2 class="text-black font-weight-light mb-4"><?=esc_attr($name)?></h2>
  <p class="mb-4"><?=$content?></p>
  <p>
    <?php if ($tw){ ?><a href="<?=esc_url($tw)?>" class="pl-0 pr-3"><span class="icon-twitter"></span></a> <?php } ?>
    <?php if ($inst){ ?><a href="<?=esc_url($inst)?>" class="pl-3 pr-3"><span class="icon-instagram"></span></a> <?php } ?>
    <?php if ($fb){ ?> <a href="<?=esc_url($fb)?>" class="pl-3 pr-3"><span class="icon-facebook"></span></a> <?php } ?>
  </p>
</div>