<?php
/**
 * My New Widget Addon
 */

class My_New_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'my-new-widget';
    }

    public function get_title()
    {
        return __('Team Member', 'wpac');
    }

    public function get_icon()
    {
        return 'eicon-your-icon';
    }

    public function get_categories()
    {
        return ['wpac'];
    }

    protected function register_controls()
    {

        // Team Members section
        $this->start_controls_section(
            'section_team',
            [
                'label' => __('Team Members', 'wpac'),
            ]
        );

        $this->add_control(
            'team_members',
            [
                'label' => __('Add Team Members', 'wpac'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'member_name',
                        'label' => __('Name', 'wpac'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('John Doe'),
                    ],
                    [
                        'name' => 'member_position',
                        'label' => __('Position', 'wpac'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('Web Developer'),
                    ],
                    [
                        'name' => 'member_photo',
                        'label' => __('Photo', 'wpac'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'member_email',
                        'label' => __('Email', 'wpac'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('john@doe.com'),
                    ],
                    [
                        'name' => 'member_phone',
                        'label' => __('Phone', 'wpac'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('+1 234 567 890'),
                    ],
                ],
                'title_field' => '{{{ member_name }}}',
            ]
        );

        $this->end_controls_section();


    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        echo '<div class="my-new-widget">';

        // Team Members 
        echo '<div class="container">';



        echo '<div class="row">';

        foreach ($settings['team_members'] as $member) {

            echo '<div class="card">';

            echo '<img src="' . esc_url($member['member_photo']['url']) . '">';

            echo '<h4>' . esc_html($member['member_name']) . '</h4>';

            echo '<p class="role">' . esc_html($member['member_position']) . '</p>';

            echo '<p>' . esc_html($member['member_email']) . '</p>';

            echo '<a href="tel:' . esc_attr($member['member_phone']) . '">Call</a>';

            echo '</div>';

        }

        echo '</div>';

        echo '</div>';



        echo '</div>';

    }

}