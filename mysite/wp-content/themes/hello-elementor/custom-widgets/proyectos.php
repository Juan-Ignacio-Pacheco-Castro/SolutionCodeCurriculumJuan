<?php
namespace Elementor;

class Proyectos_Widget extends Widget_Base {
    public function get_name(){
        return 'proyectos';
    }

    public function get_title(){
        return 'Proyectos';
    }

    public function get_icon() {
        return 'eicon-folder-o';
    }

    public function get_categories(){
        return ['basic'];
    }

    protected function _register_controls(){
        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Título & Subtítulo', 'elementor'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Título', 'elementor'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Ingrese su título', 'elementor'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Descripción', 'elementor'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Ingrese su descripción', 'elementor'),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __('Link', 'elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://ejemplo.com', 'elementor'),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){        
        $settings = $this->get_settings_for_display();
		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'link', $settings['link'] );
		}
		?>
		<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
            <div class='proyect'>
                <div class='title'>
                    <?php echo $this->get_settings_for_display()['title'] ?>
                </div>
                <div class='description'>
                    <?php echo $this->get_settings_for_display()['description'] ?>
                </div>
            </div>
		</a>
		<?php
    } 
}