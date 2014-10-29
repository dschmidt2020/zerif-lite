<?php/** * zerif Theme Customizer * * @package zerif *//** * Add postMessage support for site title and description for the Theme Customizer. * * @param WP_Customize_Manager $wp_customize Theme Customizer object. */function zerif_customize_register( $wp_customize ) {	class Zerif_Customizer_Number_Control extends WP_Customize_Control {		public $type = 'number';		public function render_content() {		?>			<label>				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>				<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />			</label>		<?php		}	}	class Zerif_Theme_Support extends WP_Customize_Control	{		public function render_content()		{			echo 'Check out the <a href="https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> for full control over the frontpage sections order!';		}	} 		class Zerif_Theme_Support_Colors extends WP_Customize_Control	{		public function render_content()		{			echo 'Check out the <a href="https://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> for full control over the color scheme !';		}	} 	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';	$wp_customize->remove_section('colors');	/**********************************************/	/*************** ORDER ************************/	/**********************************************/		$wp_customize->add_section( 'zerif_order_section' , array(					'title'       => __( 'Sections order', 'zerif-lite' ),					'priority'    => 28	));		$wp_customize->add_setting(        'zerif_order_section'	);		$wp_customize->add_control( new Zerif_Theme_Support( $wp_customize, 'zerif_order_section',	    array(	        'section' => 'zerif_order_section',	   )	));		/**********************************************/	/*************** COLORS ************************/	/**********************************************/		$wp_customize->add_section( 'zerif_colors_section' , array(					'title'       => __( 'Colors', 'zerif-lite' ),					'priority'    => 29	));		$wp_customize->add_setting(        'zerif_colors_section'	);		$wp_customize->add_control( new Zerif_Theme_Support_Colors( $wp_customize, 'zerif_colors_section',	    array(	        'section' => 'zerif_colors_section',	   )	));	/***********************************************/	/************** GENERAL OPTIONS  ***************/	/***********************************************/	$wp_customize->add_section( 'zerif_general_section' , array(			'title'       => __( 'General options', 'zerif-lite' ),    	  	'priority'    => 30,    	  	'description' => __('Zerif theme general options','zerif-lite'),	));	/* LOGO	*/	$wp_customize->add_setting( 'zerif_logo', array('sanitize_callback' => 'esc_url_raw'));	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(	      	'label'    => __( 'Logo', 'zerif-lite' ),	      	'section'  => 'zerif_general_section',	      	'settings' => 'zerif_logo',			'priority'    => 1,	)));	/* COPYRIGHT */	$wp_customize->add_setting( 'zerif_copyright', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_copyright', array(			'label'    => __( 'Copyright', 'zerif-lite' ),	      	'section'  => 'zerif_general_section',	      	'settings' => 'zerif_copyright',			'priority'    => 2,	));	/* facebook */	$wp_customize->add_setting( 'zerif_socials_facebook', array('sanitize_callback' => 'esc_url_raw'));	$wp_customize->add_control( 'zerif_socials_facebook', array(			'label'    => __( 'Facebook link', 'zerif-lite' ),	      	'section'  => 'zerif_general_section',	      	'settings' => 'zerif_socials_facebook',			'priority'    => 3,	));	/* twitter */	$wp_customize->add_setting( 'zerif_socials_twitter', array('sanitize_callback' => 'esc_url_raw'));	$wp_customize->add_control( 'zerif_socials_twitter', array(			'label'    => __( 'Twitter link', 'zerif-lite' ),	      	'section'  => 'zerif_general_section',	      	'settings' => 'zerif_socials_twitter',			'priority'    => 4,	));	/* linkedin */	$wp_customize->add_setting( 'zerif_socials_linkedin', array('sanitize_callback' => 'esc_url_raw'));	$wp_customize->add_control( 'zerif_socials_linkedin', array(			'label'    => __( 'Linkedin link', 'zerif-lite' ),	      	'section'  => 'zerif_general_section',	      	'settings' => 'zerif_socials_linkedin',			'priority'    => 5,	));	/* behance */	$wp_customize->add_setting( 'zerif_socials_behance', array('sanitize_callback' => 'esc_url_raw'));	$wp_customize->add_control( 'zerif_socials_behance', array(			'label'    => __( 'Behance link', 'zerif-lite' ),	      	'section'  => 'zerif_general_section',	      	'settings' => 'zerif_socials_behance',			'priority'    => 6,	));	/* dribbble */	$wp_customize->add_setting( 'zerif_socials_dribbble', array('sanitize_callback' => 'esc_url_raw'));	$wp_customize->add_control( 'zerif_socials_dribbble', array(			'label'    => __( 'Dribbble link', 'zerif-lite' ),	      	'section'  => 'zerif_general_section',	      	'settings' => 'zerif_socials_dribbble',			'priority'    => 7,	));	/* email */	$wp_customize->add_setting( 'zerif_email', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_email', array(			'label'    => __( 'Email', 'zerif-lite' ),	      	'section'  => 'zerif_general_section',	      	'settings' => 'zerif_email',			'priority'    => 8,	));	/* phone number */	$wp_customize->add_setting( 'zerif_phone', array('sanitize_callback' => 'zerif_sanitize_number'));	$wp_customize->add_control( 'zerif_phone', array(			'label'    => __( 'Phone number', 'zerif-lite' ),	      	'section'  => 'zerif_general_section',	      	'settings' => 'zerif_phone',			'priority'    => 9,	));	/* address */	$wp_customize->add_setting( 'zerif_address', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_address', array(			'label'    => __( 'Address', 'zerif-lite' ),	      	'section'  => 'zerif_general_section',	      	'settings' => 'zerif_address',			'priority'    => 10,	));	/*****************************************************/    /**************	BIG TITLE SECTION *******************/	/****************************************************/	$wp_customize->add_section( 'zerif_bigtitle_section' , array(			'title'       => __( 'Big title section', 'zerif-lite' ),    	  	'priority'    => 31	));	/* show/hide */	$wp_customize->add_setting( 'zerif_bigtitle_show', array('sanitize_callback' => 'zerif_sanitize_text'));    $wp_customize->add_control(		'zerif_bigtitle_show',		array(			'type' => 'checkbox',			'label' => 'Hide big title section?',			'section' => 'zerif_bigtitle_section',			'priority'    => 1,		)	);	/* title */	$wp_customize->add_setting( 'zerif_bigtitle_title', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_bigtitle_title', array(			'label'    => __( 'Title', 'zerif-lite' ),	      	'section'  => 'zerif_bigtitle_section',	      	'settings' => 'zerif_bigtitle_title',			'priority'    => 2,	));	/* red button */	$wp_customize->add_setting( 'zerif_bigtitle_redbutton_label', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_bigtitle_redbutton_label', array(			'label'    => __( 'Red button label', 'zerif-lite' ),	      	'section'  => 'zerif_bigtitle_section',	      	'settings' => 'zerif_bigtitle_redbutton_label',			'priority'    => 3,	));	$wp_customize->add_setting( 'zerif_bigtitle_redbutton_url', array('sanitize_callback' => 'esc_url_raw'));	$wp_customize->add_control( 'zerif_bigtitle_redbutton_url', array(			'label'    => __( 'Red button link', 'zerif-lite' ),	      	'section'  => 'zerif_bigtitle_section',	      	'settings' => 'zerif_bigtitle_redbutton_url',			'priority'    => 4,	));	/* green button */	$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_label', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_bigtitle_greenbutton_label', array(			'label'    => __( 'Red button label', 'zerif-lite' ),	      	'section'  => 'zerif_bigtitle_section',	      	'settings' => 'zerif_bigtitle_greenbutton_label',			'priority'    => 5,	));	$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_url', array('sanitize_callback' => 'esc_url_raw'));	$wp_customize->add_control( 'zerif_bigtitle_greenbutton_url', array(			'label'    => __( 'Green button link', 'zerif-lite' ),	      	'section'  => 'zerif_bigtitle_section',	      	'settings' => 'zerif_bigtitle_greenbutton_url',			'priority'    => 6,	));	/********************************************************************/	/*************  OUR FOCUS SECTION **********************************/	/********************************************************************/	$wp_customize->add_section( 'zerif_ourfocus_section' , array(			'title'       => __( 'Our focus section', 'zerif-lite' ),    	  	'priority'    => 32	));	/* show/hide */	$wp_customize->add_setting( 'zerif_ourfocus_show', array('sanitize_callback' => 'zerif_sanitize_text'));    $wp_customize->add_control(		'zerif_ourfocus_show',		array(			'type' => 'checkbox',			'label' => 'Hide our focus section?',			'section' => 'zerif_ourfocus_section',			'priority'    => 1,		)	);	/* our focus subtitle */	$wp_customize->add_setting( 'zerif_ourfocus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_ourfocus_subtitle', array(			'label'    => __( 'Our focus subtitle', 'zerif-lite' ),	      	'section'  => 'zerif_ourfocus_section',	      	'settings' => 'zerif_ourfocus_subtitle',			'priority'    => 2,	));	/************************************/	/******* ABOUT US SECTION ***********/	/************************************/	$wp_customize->add_section( 'zerif_aboutus_section' , array(			'title'       => __( 'About us section', 'zerif-lite' ),    	  	'priority'    => 34	));	/* about us show/hide */	$wp_customize->add_setting( 'zerif_aboutus_show', array('sanitize_callback' => 'zerif_sanitize_text'));    $wp_customize->add_control(		'zerif_aboutus_show',		array(			'type' => 'checkbox',			'label' => 'Hide about us section?',			'section' => 'zerif_aboutus_section',			'priority'    => 1,		)	);	/* subtitle */	$wp_customize->add_setting( 'zerif_aboutus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_aboutus_subtitle', array(			'label'    => __( 'Subtitle', 'zerif-lite' ),	      	'section'  => 'zerif_aboutus_section',	      	'settings' => 'zerif_aboutus_subtitle',			'priority'    => 2,	));	/* big left title */	$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_aboutus_biglefttitle', array(			'label'    => __( 'Big left side title', 'zerif-lite' ),	      	'section'  => 'zerif_aboutus_section',	      	'settings' => 'zerif_aboutus_biglefttitle',			'priority'    => 3,	));	/* text */	$wp_customize->add_setting( 'zerif_aboutus_text', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_aboutus_text', array(			'label'    => __( 'Text', 'zerif-lite' ),	      	'section'  => 'zerif_aboutus_section',	      	'settings' => 'zerif_aboutus_text',			'priority'    => 4,	));	/* feature no#1 */	$wp_customize->add_setting( 'zerif_aboutus_feature1_title', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_aboutus_feature1_title', array(			'label'    => __( 'Feature no1 title', 'zerif-lite' ),	      	'section'  => 'zerif_aboutus_section',	      	'settings' => 'zerif_aboutus_feature1_title',			'priority'    => 5,	));	$wp_customize->add_setting( 'zerif_aboutus_feature1_text', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_aboutus_feature1_text', array(			'label'    => __( 'Feature no1 text', 'zerif-lite' ),	      	'section'  => 'zerif_aboutus_section',	      	'settings' => 'zerif_aboutus_feature1_text',			'priority'    => 6,	));	$wp_customize->add_setting( 'zerif_aboutus_feature1_nr', array('sanitize_callback' => 'zerif_sanitize_number'));	$wp_customize->add_control(		new Zerif_Customizer_Number_Control(			$wp_customize,			'zerif_aboutus_feature1_nr',			array(				'type' => 'number',				'label' => __( 'Feature no1 percentage', 'zerif-lite' ),				'section' => 'zerif_aboutus_section',				'settings' => 'zerif_aboutus_feature1_nr',				'priority'    => 7			)		)	);	/* feature no#2 */	$wp_customize->add_setting( 'zerif_aboutus_feature2_title', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_aboutus_feature2_title', array(			'label'    => __( 'Feature no2 title', 'zerif-lite' ),	      	'section'  => 'zerif_aboutus_section',	      	'settings' => 'zerif_aboutus_feature2_title',			'priority'    => 8,	));	$wp_customize->add_setting( 'zerif_aboutus_feature2_text', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_aboutus_feature2_text', array(			'label'    => __( 'Feature no2 text', 'zerif-lite' ),	      	'section'  => 'zerif_aboutus_section',	      	'settings' => 'zerif_aboutus_feature2_text',			'priority'    => 9,	));	$wp_customize->add_setting( 'zerif_aboutus_feature2_nr', array('sanitize_callback' => 'zerif_sanitize_number'));	$wp_customize->add_control(		new Zerif_Customizer_Number_Control(			$wp_customize,			'zerif_aboutus_feature2_nr',			array(				'type' => 'number',				'label' => __( 'Feature no2 percentage', 'zerif-lite' ),				'section' => 'zerif_aboutus_section',				'settings' => 'zerif_aboutus_feature2_nr',				'priority'    => 10			)		)	);	/* feature no#3 */	$wp_customize->add_setting( 'zerif_aboutus_feature3_title', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_aboutus_feature3_title', array(			'label'    => __( 'Feature no3 title', 'zerif-lite' ),	      	'section'  => 'zerif_aboutus_section',	      	'settings' => 'zerif_aboutus_feature3_title',			'priority'    => 11,	));	$wp_customize->add_setting( 'zerif_aboutus_feature3_text', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_aboutus_feature3_text', array(			'label'    => __( 'Feature no3 text', 'zerif-lite' ),	      	'section'  => 'zerif_aboutus_section',	      	'settings' => 'zerif_aboutus_feature3_text',			'priority'    => 12,	));	$wp_customize->add_setting( 'zerif_aboutus_feature3_nr', array('sanitize_callback' => 'zerif_sanitize_number'));	$wp_customize->add_control(		new Zerif_Customizer_Number_Control(			$wp_customize,			'zerif_aboutus_feature3_nr',			array(				'type' => 'number',				'label' => __( 'Feature no3 percentage', 'zerif-lite' ),				'section' => 'zerif_aboutus_section',				'settings' => 'zerif_aboutus_feature3_nr',				'priority'    => 13			)		)	);	/* feature no#4 */	$wp_customize->add_setting( 'zerif_aboutus_feature4_title', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_aboutus_feature4_title', array(			'label'    => __( 'Feature no4 title', 'zerif-lite' ),	      	'section'  => 'zerif_aboutus_section',	      	'settings' => 'zerif_aboutus_feature4_title',			'priority'    => 14,	));	$wp_customize->add_setting( 'zerif_aboutus_feature4_text', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_aboutus_feature4_text', array(			'label'    => __( 'Feature no4 text', 'zerif-lite' ),	      	'section'  => 'zerif_aboutus_section',	      	'settings' => 'zerif_aboutus_feature4_text',			'priority'    => 15,	));	$wp_customize->add_setting( 'zerif_aboutus_feature4_nr', array('sanitize_callback' => 'zerif_sanitize_number'));	$wp_customize->add_control(		new Zerif_Customizer_Number_Control(			$wp_customize,			'zerif_aboutus_feature4_nr',			array(				'type' => 'number',				'label' => __( 'Feature no4 percentage', 'zerif-lite' ),				'section' => 'zerif_aboutus_section',				'settings' => 'zerif_aboutus_feature4_nr',				'priority'    => 16			)		)	);	/******************************************/    /**********	OUR TEAM SECTION **************/	/******************************************/	$wp_customize->add_section( 'zerif_ourteam_section' , array(			'title'       => __( 'Our team section', 'zerif-lite' ),    	  	'priority'    => 35	));	/* our team show/hide */	$wp_customize->add_setting( 'zerif_ourteam_show', array('sanitize_callback' => 'zerif_sanitize_text'));    $wp_customize->add_control(		'zerif_ourteam_show',		array(			'type' => 'checkbox',			'label' => 'Hide our team section?',			'section' => 'zerif_ourteam_section',			'priority'    => 1,		)	);	/* our team subtitle */	$wp_customize->add_setting( 'zerif_ourteam_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_ourteam_subtitle', array(			'label'    => __( 'Our team subtitle', 'zerif-lite' ),	      	'section'  => 'zerif_ourteam_section',	      	'settings' => 'zerif_ourteam_subtitle',			'priority'    => 2,	));	/**********************************************/    /**********	TESTIMONIALS SECTION **************/	/**********************************************/	$wp_customize->add_section( 'zerif_testimonials_section' , array(			'title'       => __( 'Testimonials section', 'zerif-lite' ),    	  	'priority'    => 36	));	/* testimonials show/hide */	$wp_customize->add_setting( 'zerif_testimonials_show', array('sanitize_callback' => 'zerif_sanitize_text'));    $wp_customize->add_control(		'zerif_testimonials_show',		array(			'type' => 'checkbox',			'label' => 'Hide testimonials section?',			'section' => 'zerif_testimonials_section',			'priority'    => 1,		)	);	/* testimonials subtitle */	$wp_customize->add_setting( 'zerif_testimonials_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_testimonials_subtitle', array(			'label'    => __( 'Testimonials subtitle', 'zerif-lite' ),	      	'section'  => 'zerif_testimonials_section',	      	'settings' => 'zerif_testimonials_subtitle',			'priority'    => 2,	));	/***********************************************************/	/********* RIBBONS ****************************************/	/**********************************************************/	$wp_customize->add_section( 'zerif_ribbon_section' , array(			'title'       => __( 'Ribbon sections', 'zerif-lite' ),    	  	'priority'    => 37	));	/* RIBBON SECTION WITH BOTTOM BUTTON */	/* text */	$wp_customize->add_setting( 'zerif_bottomribbon_text', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_bottomribbon_text', array(			'label'    => __( 'Ribbon section with bottom button - Text', 'zerif-lite' ),	      	'section'  => 'zerif_ribbon_section',	      	'settings' => 'zerif_bottomribbon_text',			'priority'    => 1,	));	/* button label */	$wp_customize->add_setting( 'zerif_bottomribbon_buttonlabel', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_bottomribbon_buttonlabel', array(			'label'    => __( 'Ribbon section with bottom button - Button label', 'zerif-lite' ),	      	'section'  => 'zerif_ribbon_section',	      	'settings' => 'zerif_bottomribbon_buttonlabel',			'priority'    => 2,	));	/* button link */	$wp_customize->add_setting( 'zerif_bottomribbon_buttonlink', array('sanitize_callback' => 'esc_url_raw'));	$wp_customize->add_control( 'zerif_bottomribbon_buttonlink', array(			'label'    => __( 'Ribbon section with bottom button - Button link', 'zerif-lite' ),	      	'section'  => 'zerif_ribbon_section',	      	'settings' => 'zerif_bottomribbon_buttonlink',			'priority'    => 3,	));	/* RIBBON SECTION WITH BUTTON IN THE RIGHT SIDE */	/* text */	$wp_customize->add_setting( 'zerif_ribbonright_text', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_ribbonright_text', array(			'label'    => __( 'Ribbon section with button in the right side - Text', 'zerif-lite' ),	      	'section'  => 'zerif_ribbon_section',	      	'settings' => 'zerif_ribbonright_text',			'priority'    => 4,	));	/* button label */	$wp_customize->add_setting( 'zerif_ribbonright_buttonlabel', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_ribbonright_buttonlabel', array(			'label'    => __( 'Ribbon section with button in the right side - Button label', 'zerif-lite' ),	      	'section'  => 'zerif_ribbon_section',	      	'settings' => 'zerif_ribbonright_buttonlabel',			'priority'    => 5,	));	/* button link */	$wp_customize->add_setting( 'zerif_ribbonright_buttonlink', array('sanitize_callback' => 'esc_url_raw'));	$wp_customize->add_control( 'zerif_ribbonright_buttonlink', array(			'label'    => __( 'Ribbon section with button in the right side - Button link', 'zerif-lite' ),	      	'section'  => 'zerif_ribbon_section',	      	'settings' => 'zerif_ribbonright_buttonlink',			'priority'    => 6,	));	/*******************************************************/    /************	CONTACT US SECTION *********************/	/*******************************************************/	$wp_customize->add_section( 'zerif_contactus_section' , array(			'title'       => __( 'Contact us section', 'zerif-lite' ),    	  	'priority'    => 38	));	/* contact us show/hide */	$wp_customize->add_setting( 'zerif_contactus_show', array('sanitize_callback' => 'zerif_sanitize_text'));    $wp_customize->add_control(		'zerif_contactus_show',		array(			'type' => 'checkbox',			'label' => 'Hide contact us section?',			'section' => 'zerif_contactus_section',			'priority'    => 1,		)	);	/* contactus subtitle */	$wp_customize->add_setting( 'zerif_contactus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));	$wp_customize->add_control( 'zerif_contactus_subtitle', array(			'label'    => __( 'Contact us section subtitle', 'zerif-lite' ),	      	'section'  => 'zerif_contactus_section',	      	'settings' => 'zerif_contactus_subtitle',			'priority'    => 2,	));		/* contactus email */	$wp_customize->add_setting( 'zerif_contactus_email', array('sanitize_callback' => 'zerif_sanitize_text'));				$wp_customize->add_control( 'zerif_contactus_email', array(				'label'    => __( 'Email address', 'zerif-lite' ),				'section'  => 'zerif_contactus_section',				'settings' => 'zerif_contactus_email',				'priority'    => 3,	));			/* contactus button label */	$wp_customize->add_setting( 'zerif_contactus_button_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => 'Send Message'));				$wp_customize->add_control( 'zerif_contactus_button_label', array(				'label'    => __( 'Button label', 'zerif-lite' ),				'section'  => 'zerif_contactus_section',				'settings' => 'zerif_contactus_button_label',				'priority'    => 4,	));}add_action( 'customize_register', 'zerif_customize_register' );/** * Binds JS handlers to make Theme Customizer preview reload changes asynchronously. */function zerif_customize_preview_js() {	wp_enqueue_script( 'zerif_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );}add_action( 'customize_preview_init', 'zerif_customize_preview_js' );function zerif_sanitize_text( $input ) {    return wp_kses_post( force_balance_tags( $input ) );}function zerif_sanitize_number( $input ) {    return force_balance_tags( $input );}function zerif_registers() {    wp_register_script( 'zerif_jquery_ui', '//code.jquery.com/ui/1.10.4/jquery-ui.js', array("jquery"), '20120206', true  );	wp_enqueue_script( 'zerif_jquery_ui' );	wp_register_style( 'zerif_jquery_ui_css', '//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css');	wp_enqueue_style( 'zerif_jquery_ui_css' );	wp_register_script( 'zerif_customizer_script', get_template_directory_uri() . '/js/zerif_customizer.js', array("jquery","zerif_jquery_ui"), '20120206', true  );	wp_enqueue_script( 'zerif_customizer_script' );}add_action( 'customize_controls_enqueue_scripts', 'zerif_registers' );