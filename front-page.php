<?php
get_header();

$display_name     = esc_html(get_option('display_name'));
$intro_text       = esc_html(get_option('intro_text'));
$profile_picture  = esc_url(get_option('profile_picture'));
$background_image = esc_url(get_option('background_image'));

$pattern         = esc_url(get_option('overlay_pattern'));
$container_color = esc_attr(get_option('container_bg_color'));
$text_color      = esc_attr(get_option('text_color'));

function hex_to_rgba($hex, $alpha = 0.8) {
    $hex = str_replace('#', '', $hex);

    if (strlen($hex) === 3) {
        $r = hexdec(str_repeat($hex[0], 2));
        $g = hexdec(str_repeat($hex[1], 2));
        $b = hexdec(str_repeat($hex[2], 2));
    } elseif (strlen($hex) === 6) {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    } else {
        return 'rgba(0,0,0,' . $alpha . ')';
    }

    return "rgba($r, $g, $b, $alpha)";
}


?>

<?php if ($pattern): ?>
    <div style="
      position: fixed;
      inset: 0;
      background-image: url('<?php echo $pattern; ?>');
      background-repeat: repeat;
      pointer-events: none;
      z-index: 0;
      opacity: 0.4;
    "></div>
<?php endif; ?>

<?php if ($background_image): ?>
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
<?php endif; ?>


<div class="container" style="
      <?php
        $bg_color = get_option('container_bg_color');
        $alpha = floatval(get_option('container_bg_alpha')) ?: 0.8;
      ?>
      background-color: <?php echo hex_to_rgba($bg_color, $alpha); ?>;
      color: <?php echo $text_color ?: '#ffffff'; ?>;
      position: relative;
      z-index: 1;
      padding: 2rem;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    ">
    <div class="column">
		<?php if ($profile_picture): ?>
		<img src="<?php echo $profile_picture; ?>" alt="Profile" class="avatar avatar--rounded" />
		<?php endif; ?>

		<?php if ($display_name): ?>
			<h1 style="color: <?php echo esc_attr($text_color ?: '#ffffff'); ?>;"><?php echo $display_name; ?></h1>
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