<?php
$args = array(
  'title' => '',
  'photo' => '',
  'quote' => '',
  'author' => '',
);

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);
?>

<div class="site-section">
  <div class="row">
    <div class="col-lg-6 mb-5">
      <div class="mb-5">
        <img src="<?= esc_attr(wp_get_attachment_url($photo)) ?>" alt="Image" class="img-md-fluid">
      </div>
      <div class="col-lg-6 bg-white p-md-5 align-self-center">
        <h2 class="display-1 text-black line-height-1 site-section-heading mb-4 pb-3">
          <?= esc_attr($title) ?>
        </h2>
        <p class="text-black lead"><em>&ldquo;
            <?= esc_attr($quote) ?>&rdquo;
          </em></p>
        <p class="lead text-black">&mdash; <em>
            <?= esc_attr($author) ?>
          </em></p>
      </div>
    </div>
  </div>
</div>