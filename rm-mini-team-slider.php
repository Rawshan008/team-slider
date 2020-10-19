<?php
/**
 * Test Module Register
 */
class RM_Mini_Team_Slider_Module extends FLBuilderModule {
    public function __construct() {
        parent::__construct( [
            'name'            => __( 'Mini Team Slider', 'rm' ),
            'description'     => __( 'Mini Team Module for R and M', 'rm' ),
            'category'        => __( 'R&M Team Modules', 'rm' ),
            'dir'             => RM_MODULE_DIR . 'modules/rm-mini-team-slider/',
            'url'             => RM_MODULE_URL . 'modules/rm-mini-team-slider/',
            'editor_export'   => true, // Defaults to true and can be omitted.
            'enabled'         => true, // Defaults to true and can be omitted.
            'partial_refresh' => true,
        ] );

        $this->add_css('slick');
        $this->add_js('slick');
        $this->add_css('magnific-popup');
        $this->add_js('magnific-popup');
    }
}

FLBuilder::register_module( 'RM_Mini_Team_Slider_Module', [
    'general' => [ // For Tab Section
        'title'    => __( 'General', 'rm' ),
        'sections' => [
            'general' => [ // tab ar modde akta group korer jonno
                'title'  => __( 'Content', 'rm' ),
                'fields' => [
                    'mini_team_slider_title' => [
                        'type'  => 'textarea',
                        'label' => __( 'Team Slider Title', 'rm' ),
                        'placeholder' => __('Speak to our institutional team', 'rm'),
                        'preview'  => [
                            'type' => 'text',
                            'selector' => 'h2.rm-mini-team-slider-title'
                        ],
                    ],
                    'single_team' => [
                        'type'  => 'suggest',
                        'label' => __( 'Select Team Member', 'rm' ),
                        'action' => 'fl_as_posts',
                        'data'   => 'rm_people',
                        'limit'  => 30
                    ],
                    'active_slider' => [
                        'type'  => 'select',
                        'label' => __( 'Active Slider on Mobile?', 'rm' ),
                        'default' => 'no',
                        'options' => [
                            'yes' => __('Yes','rm'),
                            'no' => __('No','rm'),
                        ],
                        'toggle' => [
                            'yes' => [
                                'fields' => ['slider_number', 'autoplay', 'prev_icon', 'next_icon']
                            ]
                        ]
                    ],
                    'slider_number' => [
                        'type'  => 'text',
                        'label' => __( 'Slider Number', 'rm' ),
                        'default' => '2',
                    ],
                    'autoplay' => [
                        'type'  => 'select',
                        'label' => __( 'Autoplay', 'rm' ),
                        'default' => 'false',
                        'options' => [
                            'true' => __('Yes','rm'),
                            'false' => __('No','rm'),
                        ],
                    ],
                    'prev_icon' => [
                        'type'  => 'icon',
                        'label' => __( 'Previous Icon', 'rm' ),
                        'default' => 'fa fas-arrow-left',
                        'show_remove' => true
                    ],
                    'next_icon' => [
                        'type'  => 'icon',
                        'label' => __( 'Next Icon', 'rm' ),
                        'default' => 'fa fas-arrow-right',
                        'show_remove' => true
                    ],
                ],
            ],
        ],
    ],
    'style' => [ // For Tab Section
        'title'    => __( 'Style', 'rm' ),
        'sections' => [
            'general' => [ // tab ar modde akta group korer jonno
                'title'  => __( 'Style', 'rm' ),
                'fields' => [
                    'title_typography' => [
                        'type'  => 'typography',
                        'label' => __( 'Title Typography', 'rm' ),
                        'preview' => [
                            'type' => 'css',
                            'selector' => 'h2.rm-mini-team-slider-title',
                        ],
                        'responsive' => true
                    ],
                    'title_color' => [
                        'type'  => 'color',
                        'label' => __( 'Title Color', 'rm' ),
                        'preview' => [
                            'type' => 'css',
                            'selector' => 'h2.rm-mini-team-slider-title',
                            'property' => 'color'
                        ],
                    ],
                    'name_typography' => [
                        'type'  => 'typography',
                        'label' => __( 'Name Typography', 'rm' ),
                        'preview' => [
                            'type' => 'css',
                            'selector' => '.rm-mini-team-content h3',
                        ],
                        'responsive' => true
                    ],
                    'name_color' => [
                        'type'  => 'color',
                        'label' => __( 'Name Color', 'rm' ),
                        'preview' => [
                            'type' => 'css',
                            'selector' => '.rm-mini-team-content h3',
                            'property' => 'color'
                        ]
                    ],
                    'des_typography' => [
                        'type'  => 'typography',
                        'label' => __( 'Designation Typography', 'rm' ),
                        'preview' => [
                            'type' => 'css',
                            'selector' => '.rm-mini-team-content',
                        ],
                        'responsive' => true
                    ],
                    'des_color' => [
                        'type'  => 'color',
                        'label' => __( 'Designation Color', 'rm' ),
                        'preview' => [
                            'type' => 'css',
                            'selector' => '.rm-mini-team-content',
                            'property' => 'color'
                        ]
                    ],
                    'image_height' => [
                        'type'  => 'unit',
                        'label' => __( 'Image Height', 'rm' ),
                        'units'  => ['px'],
                        'preview' => [
                            'type' => 'css',
                            'selector' => '.rm-mini-team-img',
                            'property' => 'height',
                        ],
                        'responsive' => true
                    ],
                    'image_width' => [
                        'type'  => 'unit',
                        'label' => __( 'Image Width', 'rm' ),
                        'units'  => ['px'],
                        'preview' => [
                            'type' => 'css',
                            'selector' => '.rm-mini-team-img',
                            'property' => 'width',
                        ],
                        'responsive' => true
                    ],
                    'team_padding_left' => [
                        'type'  => 'unit',
                        'label' => __( 'Content Margin left', 'rm' ),
                        'units'  => ['px'],
                        'default' => '20',
                        'preview' => [
                            'type' => 'css',
                            'selector' => '.rm-mini-team-content',
                            'property' => 'padding-left'
                        ],
                        'responsive' => true
                    ],
                ],
            ],
        ],
    ],
] );
