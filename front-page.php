<?php
get_header();

$display_name     = esc_html(get_option('display_name'));
$intro_text       = esc_html(get_option('intro_text'));
$profile_picture  = esc_url(get_option('profile_picture'));
$background_image = esc_url(get_option('background_image'));

?>

<style>
body.miro-custom-background {
  background-image: url('<?php echo $background_image; ?>');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  font-family: system-ui, sans-serif;
  color: white;
  min-height: 100vh;
}
</style>


<div class="container">
    <div class="column">
    <?php if ($profile_picture): ?>
      <img src="<?php echo $profile_picture; ?>" alt="Profile" class="avatar avatar--rounded" />
    <?php endif; ?>

    <?php if ($display_name): ?>
      <h1><?php echo $display_name; ?></h1>
    <?php endif; ?>

    <?php if ($intro_text): ?>
      <p><?php echo $intro_text; ?></p>
    <?php endif; ?>

    <div class="button-stack">
      <?php echo do_shortcode('[mirae]'); ?>
    </div>
  </div>
</div>

<?php

get_footer();