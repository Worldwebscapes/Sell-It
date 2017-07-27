<?php

/*



  Plugin Name: PageLines Section Sell It

  Description: A flip content section.



  Author:      World Word Webscapes

  Version:     3.9



  PageLines:   PL_Section_Sell_It

  Tags:        starter



  Category:     framework, sections

  Filter:       component



*/



 require 'plugin-update-checker/plugin-update-checker.php';

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(

    'https://github.com/Worldwebscapes/Sell-It',

    __FILE__,

    'pl-section-sell-it'

);



//Optional: If you're using a private repository, specify the access token like this:

$myUpdateChecker->setAuthentication('');



//Optional: Set the branch that contains the stable release.

$myUpdateChecker->setBranch('');







/** A guard to prevent the section from being loaded if platform isn't installed or at the wrong time */

if( ! class_exists('PL_Section') ){

  return;

}



class PL_Section_Sell_It extends PL_Section {



  function section_persistent(){



  }



  function section_styles(){



    /** Include the sample script */

    pl_script('flip',      $this->base_url . '/js/jquery.flip.js' );

    pl_script( $this->id, $this->base_url . '/script.js' );



  }



  /**

   * Return the option array for the section.

   */

  function section_opts(){



   $options = array();



   $options[] = array(



   'title' => 'Section Configuration',

   'type'  => 'multi',

   'opts'  => array(

     array(

       'key'      => 'ibox_cols',

       'type'       => 'select',

       'opts'    => array(

         '2'       => array( 'name' => __( '2 of 12 Columns', 'pl-section-sellit' ) ),

         '3'       => array( 'name' => __( '3 of 12 Columns', 'pl-section-sellit' ) ),

         '4'       => array( 'name' => __( '4 of 12 Columns', 'pl-section-sellit' ) ),

         '6'       => array( 'name' => __( '6 of 12 Columns', 'pl-section-sellit' ) ),

         '12'      => array( 'name' => __( '12 of 12 Columns', 'pl-section-sellit' ) )

       ),

       'count_start'   => 2,

       'count_number'  => 6,

       'default'       => 4,

       'label'         => __( 'Columns Per Box (12 Col Grid)', 'pl-section-sellit' ),



     ),

     array(

       'key'      => 'ibox_cols_mobile',

       'type'       => 'select',

       'opts'    => array(

         '2'       => array( 'name' => __( '2 of 12 Columns', 'pl-section-sellit' ) ),

         '3'       => array( 'name' => __( '3 of 12 Columns', 'pl-section-sellit' ) ),

         '4'       => array( 'name' => __( '4 of 12 Columns', 'pl-section-sellit' ) ),

         '6'       => array( 'name' => __( '6 of 12 Columns', 'pl-section-sellit' ) ),

         '12'      => array( 'name' => __( '12 of 12 Columns', 'pl-section-sellit' ) )

       ),

       'count_start'   => 2,

       'count_number'  => 6,

       'default'       => 6,

       'label'         => __( 'Columns On Mobile (12 Col Grid)', 'pl-section-sellit' ),



     ),

     array(

       'key'      => 'ibox_cols_desktop',

       'type'       => 'select',

       'opts'    => array(

         '2'       => array( 'name' => __( '2 of 12 Columns', 'pl-section-sellit' ) ),

         '3'       => array( 'name' => __( '3 of 12 Columns', 'pl-section-sellit' ) ),

         '4'       => array( 'name' => __( '4 of 12 Columns', 'pl-section-sellit' ) ),

         '6'       => array( 'name' => __( '6 of 12 Columns', 'pl-section-sellit' ) ),

         '12'      => array( 'name' => __( '12 of 12 Columns', 'pl-section-sellit' ) )

       ),

       'count_start'   => 2,

       'count_number'  => 6,

       'default'       => 4,

       'label'         => __( 'Columns On Desktop (12 Col Grid)', 'pl-section-sellit' ),

     ),

     array(

        'type'    => 'dragger',

        'label'   => __( 'Height of Sell It Image Item ', 'pl-section-sellit' ),

        'opts'    => array(

          array(

            'key'  => 'min_height',

            'min'  => 100,

            'max'  => 400,

            'default'  => 300,

            'unit' => 'Base (px)'

          ),

        ),

      ),

      

      

   ),

 );



         $options[] = array(

			'title' => __( 'Sell It Title Configuration', 'pl-section-sellit' ),

			'type' => 'multi',

			'opts' => array(

				array(

					'key' => 'headline',

					'type' => 'text',

					'height' => '50px',

					'controls' => false,

					'default' => 'Sell It',

					'label' => __( 'Main headline.', 'pl-section-sellit' ),

				),

				array(

					'key' => 'subheadline',

					'label' => __( 'Sub Headline', 'pl-section-sellit' ),

					'height' => '100px',

					'type' => 'richtext',

					'default' => 'Lets Sell Something Quick And Easy Right Now!'

				),

			),

		);



		$options[] = array(

			'title' => __( 'Sell It Items', 'pl-section-sellit' ),

			'type' => 'accordion',

			'key' => 'flippy_array',

			'opts' => array(

				array(

					'title' => __( 'Sell It Box Configuration', 'pl-section-sellit' ),

					'type' => 'multi',

					'opts' => array(

			          pl_std_opt( 'background_color', array( 'key' => 'box_color', 'label' => 'Sell It Box Background Color' ) ),

			pl_std_opt('scheme', array(

            'key'     => 'box_scheme',

            'default' => 'pl-scheme-default',

            'label'   => __( 'Sell It Box Color Scheme', 'pl-section-sellit' ),

            

          )),

						array(

							'key' => 'product_title',

							'type' => 'text',

							'height' => '50px',

							'controls' => false,

							'default' => 'Product Title',

							'label' => __( 'Product Title.', 'pl-section-sellit' ),

						),

			

			

			pl_std_opt('background_color', array(

            'key'     => 'title_background',

            'default' => '',

            'label'   => 'Title Background Color',

            

          )),

          pl_std_opt('scheme', array(

            'key'     => 'title_scheme',

            'default' => 'pl-scheme-default',

            'label'   => __( 'Title Color Scheme', 'pl-section-sellit' ),

            

          )),

						array(

							'key' => 'product_description',

							'label' => __( 'Product Description', 'pl-section-sellit' ),

							'height' => '100px',

							'type' => 'richtext',

							'default' => 'Product Description'

						),

						pl_std_opt('background_color', array(

            'key'     => 'caption_background',

            'default' => '#ccc',

            'label'   => 'Description Background Color',

            

          )),

          pl_std_opt('scheme', array(

            'key'     => 'caption_scheme',

            'default' => 'pl-scheme-default',

            'label'   => __( 'Description Color Scheme', 'pl-section-sellit' ),

            

          )),

			array(

         'key'      => 'pre_price',

         'default'    => '$',

         'type'       => 'text',

         'label'     => __( 'Pre-Price', 'pl-section-sellit' ),

          ),

			array(

         'key'      => 'price',

         'default'    => '25',

         'type'       => 'text',

         'label'     => __( 'Price', 'pl-section-sellit' ),

          ),

			array(

         'key'      => 'post_price',

         'default'    => '00',

         'type'       => 'text',

         'label'     => __( 'Post Price', 'pl-section-sellit' ),

          ),

			array(

         'key'      => 'more_price',

         'default'    => 'Additional Information Here',

         'type'       => 'text',

         'label'     => __( 'Addtional Info', 'pl-section-sellit' ),

          ),

		

          

			 

			

array(

        'title'     => __( 'Button Setup', 'pl-platform' ),

        'type'      => 'multi',

        'stylize'   => 'button-config',

			

        'opts'      => pl_button_link_options( 'button', array( 'button_text' => __( 'Buy Now', 'pl-platform' ), 'button' => '#' ) ),

      ),

			



					),

				),

				array(

					'title' => __( 'Sell It Front', 'pl-section-sellit' ),

					'type' => 'multi',

					'opts' => array(

						pl_std_opt( 'title', array( 'key' => "front_title", 'label' => 'Front Title' ) ),

						pl_std_opt( 'background_color', array( 'key' => 'front_color', 'label' => 'Background Color' ) ),

						pl_std_opt( 'background_image', array( 'key' => 'front_image', 'label' => 'Background Image' ) ),

			pl_std_opt( 'scheme', array( 'key' => 'front_scheme', 'label' => 'Front Scheme' ) ),

					),

				),

				array(

					'title' => __( 'Sell It Back', 'pl-section-sellit' ),

					'type' => 'multi',

					'opts' => array(

						pl_std_opt( 'title', array( 'key' => 'back_title', 'label' => 'Back Title' ) ),

						pl_std_opt( 'text', array( 'key' => 'back_text', 'label' => 'Back Content' ) ),

						pl_std_opt( 'background_color', array( 'key' => 'back_color', 'label' => 'Background Color' ) ),

						pl_std_opt( 'background_image', array( 'key' => 'back_image', 'label' => 'Background Image' ) ),

			            pl_std_opt( 'scheme', array( 'key' => 'back_scheme', 'label' => 'Back Scheme' ) ),

					),

				),





			),

			'default'   => array(

              array(

                'front_title' => 'Front Image',

                'back_title'  => 'Back Image',

                'back_text'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia eu lectus sit amet fringilla.',

                'front_image'         => $this->base_url . '/images/photo-1.jpg',

			    'back_image'         => $this->base_url . '/images/photo-2.jpg',

              ),

               array(

                'front_title' => 'Front Image',

                'back_title'  => 'Back Image',

                'back_text'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia eu lectus sit amet fringilla.',

                'front_image'         => $this->base_url . '/images/photo-1.jpg',

			    'back_image'         => $this->base_url . '/images/photo-2.jpg',

              ),

			 array(

                'front_title' => 'Front Image',

                'back_title'  => 'Back Image',

                'back_text'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia eu lectus sit amet fringilla.',

                'front_image'         => $this->base_url . '/images/photo-1.jpg',

			    'back_image'         => $this->base_url . '/images/photo-2.jpg',

              ),

			 array(

                'front_title' => 'Front Image',

                'back_title'  => 'Back Image',

                'back_text'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia eu lectus sit amet fringilla.',

                'front_image'         => $this->base_url . '/images/photo-1.jpg',

			    'back_image'         => $this->base_url . '/images/photo-2.jpg',

              ),

			 array(

                'front_title' => 'Front Image',

                'back_title'  => 'Back Image',

                'back_text'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia eu lectus sit amet fringilla.',

                'front_image'         => $this->base_url . '/images/photo-1.jpg',

			    'back_image'         => $this->base_url . '/images/photo-2.jpg',

              ),

			 array(

                'front_title' => 'Front Image',

                'back_title'  => 'Back Image',

                'back_text'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia eu lectus sit amet fringilla.',

                'front_image'         => $this->base_url . '/images/photo-1.jpg',

			    'back_image'         => $this->base_url . '/images/photo-2.jpg',

              ),

            )



		);



		return $options;

  }



  /**

   * The section HTML output

   */

  function section_template(){ ?>



  <link href="style.css" rel="stylesheet">

		<div class="flippy-wrp">

			<div class="flippy-heading pl-content-area pl-content-area-wide pl-alignment-center">

				<h2 class="flip-heading" data-bind="pltext: headline"></h2>

				<h3 class="flip-subheading" data-bind="pltext: subheadline"></h3>

			</div>

    <div class="flippy-items pl-row pl-content-area" data-bind="foreach: flippy_array">

      <div class="ihp-flip-item" data-bind="plclassname:['pl-col-lg-' + $root.ibox_cols_desktop(), 'pl-col-sm-' + $root.ibox_cols(), 'pl-col-xs-' + $root.ibox_cols_mobile()]">

<div class="box_color " data-bind="style: { 'background-color': box_color },}">

<div class="flippybox">

<div data-bind="style: { 'background-color': title_background }, plclassname: [title_scheme() ]">

	<span class="h3 flippytext" data-bind="pltext: product_title">Product Title</span>

</div>

        <div id="card" class="flip-card">

            <!-- front -->

          <div class="front flippy-front" data-bind="plclassname: [front_scheme()], plbg: front_image, style: { 'background-color': front_color }, plstyle: {'min-height': $root.min_height() ? $root.min_height() + 'px' : ''}">

            <div class="flippy-inner">

              <h3 class="front-title" data-bind="pltext: front_title"></h3>

            </div>

          </div>

          <!-- back -->

          <div class="back flippy-back" data-bind="plclassname: [back_scheme()], plbg: back_image, style: { 'background-color': back_color }, plstyle: {'min-height': $root.min_height() ? $root.min_height() + 'px' : ''}">

            <div class="flippy-inner">

              <h4 class="back-title" data-bind="pltext: back_title"></h4>

              <p class="back-content" data-bind="pltext: back_text"></p>

            </div>

          </div>

        </div>

	<div data-bind="style: { 'background-color': caption_background }, plclassname: [caption_scheme() ]">

	<span class="flippybox" data-bind="pltext: product_description" style="padding-left:10px; padding-right:10px;">Product Description</span>

</div>

      

      <div data-bind="plclassname: [box_scheme() ]">

			<span class="pre_price h4" data-bind="pltext: pre_price">$</span>

			<span class="price h1" data-bind="pltext: price">25</span>

			<span class="post_price h5" data-bind="pltext: post_price">00</span>

			<div class="more_price" data-bind="pltext: more_price">Additional Information Here</div>

	</div>

      

      <div class="pl-btn-wrap flippytext"><a class="pl-btn" href="#" data-bind="plbtn: 'button'" ></a></div>

      

      

      

      

      

      </div>



      </div>

    </div>

  </div>

</link>





    <?php

  }



}

