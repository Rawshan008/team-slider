<?php
/**
* Title
 */
    FLBuilderCSS::typography_field_rule( [
        'settings'     => $settings,
        'setting_name' => 'title_typography',
        'selector'     => ".fl-builder-content .fl-node-$id h2.rm-mini-team-slider-title",
    ] );
    if ( !empty( $settings->title_color ) ) {
        ?>
        .fl-builder-content .fl-node-<?php echo $id; ?> h2.rm-mini-team-slider-title {
            color:<?php echo FLBuilderColor::hex_or_rgb( $settings->title_color ); ?>;
        }
        <?php
    }
    FLBuilderCSS::typography_field_rule( [
        'settings'     => $settings,
        'setting_name' => 'name_typography',
        'selector'     => ".fl-builder-content .fl-node-$id .rm-mini-team-content h3",
    ] );

    if ( !empty( $settings->name_color ) ) {
        ?>
            .fl-builder-content .fl-node-<?php echo $id; ?> .rm-mini-team-content h3 {
                color:<?php echo FLBuilderColor::hex_or_rgb( $settings->name_color ); ?>;
            }
        <?php
    }

?>

<?php
/**
* Content
 */
    FLBuilderCSS::typography_field_rule( [
        'settings'     => $settings,
        'setting_name' => 'des_typography',
        'selector'     => ".fl-builder-content .fl-node-$id .rm-mini-team-content",
    ] );

    if ( !empty( $settings->des_color ) ) {
        ?>
            .fl-builder-content .fl-node-<?php echo $id; ?> .rm-mini-team-content {
                color:<?php echo FLBuilderColor::hex_or_rgb( $settings->des_color ); ?>;
            }
         <?php
    }

    FLBuilderCSS::responsive_rule( [
        'settings'     => $settings,
        'setting_name' => 'team_padding_left',
        'selector'     => ".fl-node-$id .rm-mini-team-content",
        'prop'         => 'margin-left',
        'unit' => 'px'
    ] );
?>

<?php
  /**
* Image
 */
  if ( !empty( $settings->image ) ) {
      ?>
        .fl-builder-content .fl-node-<?php echo $id; ?> .rm-mini-team-img {
            background-image:url(<?php echo esc_url($settings->image_src); ?>);
        }
      <?php
  }
  FLBuilderCSS::responsive_rule( array(
    'settings'     => $settings,
    'setting_name' => 'image_height',
    'selector'     => ".fl-node-$id .rm-mini-team-img",
    'prop'         => 'height',
    'unit' => 'px'
  ) );

  FLBuilderCSS::responsive_rule( array(
    'settings'     => $settings,
    'setting_name' => 'image_width',
    'selector'     => ".fl-node-$id .rm-mini-team-img",
    'prop'         => 'width',
    'unit' => 'px'
  ) );
?>

