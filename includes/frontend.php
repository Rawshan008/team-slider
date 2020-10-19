<?php
  $mini_team_slider_title = $settings->mini_team_slider_title;
  $name = $settings->name;
  $designation = $settings->designation;
  $prev_icon = $settings->prev_icon;
  $next_icon = $settings->next_icon;

  $mini_team_sliders = $settings->mini_team_sliders;

  $single_team = $settings->single_team;
  $single_team_ = explode(",", $single_team);

  $t_arga = [
      'post_type' => 'rm_people',
      'posts_per_page' => -1,
      'ignore_sticky_posts' => true,
      'post__in' => $single_team_,
      'orderby' => 'post__in'
  ];

  $query = new WP_Query($t_arga);

  if ($query->post_count > 1) {
      $active_class = "rm-mini-team-{$id}";
  } else {
      $active_class = "";
  }
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="rm-mini-team-slider-title"><?php echo esc_html($mini_team_slider_title);?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="rm-mini-team-wrapper" id="<?php echo $active_class;?>">
                <?php
                if ($query->have_posts()):
                    $count = 1;
                    while ($query->have_posts()): $query->the_post();
                    $feature_img_url = get_the_post_thumbnail_url(get_the_ID());
                    $designation = get_post_meta(get_the_ID(), 'designation', true);
                    $linkedin = get_post_meta(get_the_ID(), 'linkedin', true);
                    $twitter = get_post_meta(get_the_ID(), 'twitter', true);
                    $phone = get_post_meta(get_the_ID(), 'phone', true);
                    $website = get_post_meta(get_the_ID(), 'website', true);
                ?>
                        <div class="mini-team-slider-img <?php if ('yes' == $settings->active_slider) {echo 'slider-active';}?>">
                            <a href="#rm-people-popup-<?php echo $count;?>" class="rm-mini-team-slider">
                                <div class="rm-mini-team-img" style="background-image: url(<?php echo esc_url($feature_img_url);?>)"></div>
                                <div class="rm-mini-team-content">
                                    <?php
                                    printf(
                                        '<h3>%1$s</h3>',
                                        esc_html(get_the_title(get_the_ID()))
                                    );
                                    ?>

                                    <?php
                                    printf(
                                        '<p>%1$s</p>',
                                        esc_html($designation)
                                    );
                                    ?>
                                </div>
                            </a>
                            <div id="rm-people-popup-<?php echo $count;?>" class="rm-single-people-popup mfp-hide">

                                <div class="rm-people-popup-img">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full');
                                    }
                                    ?>
                                </div>

                                <div class="rm-people-popup-content">
                                    <?php
                                    printf(
                                        '<h3>%1$s</h3>',
                                        wp_kses_post(get_the_title())
                                    );

                                    printf(
                                        '<p>%1$s</p>',
                                        wp_kses_post($designation)
                                    );
                                    ?>
                                    <div class="rm-people-social-link">
                                        <a href="<?php echo esc_url($linkedin);?>"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="<?php echo esc_url($twitter);?>"><i class="fab fa-twitter"></i></a>
                                    </div>
                                    <div class="rm-people-contact">
                                        <a href="tel:<?php echo esc_attr($phone);?>"><?php echo esc_html($phone);?></a>
                                        <a href="<?php echo esc_url($website);?>"><?php echo esc_html($website);?></a>
                                    </div>
                                    <div class="rm-people-p-content">
                                        <?php
                                        printf(
                                            '<p>%1$s</p>',
                                            wp_kses_post(get_the_content())
                                        );
                                        ?>
                                    </div>
                                </div>

                            </div>


                        </div>

                    <?php
                        $count++;
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>

            </div>

            <?php if ('yes' == $settings->active_slider):?>
                <div class="rm-mini-team-slider-next-previous d-md-none">
                    <ul>
                        <li class="previous"><i class="<?php echo esc_attr($prev_icon);?>"></i>
                        <li class="next"><i class="<?php echo esc_attr($next_icon);?>"></i>
                    </ul>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>