<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class AccommodationContent extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-accommodation',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'fluxContetData' => $this->fluxContetData(),
        ];
    }

    public function fluxContetData()
    {
        $data = [];
        $flexible_content = get_field('accommodation_content');
        if($flexible_content){
            foreach($flexible_content as $content) {
                if($content['acf_fc_layout']=='banner'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'banner_style' => $content['banner_style'],
                        'banner_height' => 'half',
                        'scroll_to_discover' => 'no',
                        'background_image' => $content['background_image'],
                        'pre_heading' => $content['pre_heading'],
                        'heading' => $content['heading'],                        
                        'id' => $content['id'],                                         
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='simple_content'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'content_style' => 'full',
                        'icon_style' => 'top',
                        'heading' => $content['heading'],                          
                        'button' => $content['button'], 
                        'icon_image' => $content['icon_image'],                                           
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],                        
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='image_slider'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'images' => $content['images'],     
                        'scrollbar' => $content['scrollbar'],    
                        'image_size_auto' => $content['image_size_auto'],                                                        
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }                   
                elseif($content['acf_fc_layout']=='image_with_content'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image_position' => $content['image_position'],
                        'contact' => 'no',
                        'background_color' => $content['background_color'],                    
                        'image' =>$content['image'],
                        'map_iframe' => 'no',
                        'icon_image' => '',
                        'readmore_link' =>$content['download_link'], 
                        'button' =>$content['readmore_link'], 
                        'pre_heading' =>$content['pre_heading'],     
                        'heading' =>$content['heading'], 
                        'content' =>$content['content'],                        
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }  
                elseif($content['acf_fc_layout']=='page_grid'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'background_style' => 'no',
                        'heading' =>$content['heading'],     
                        'content' =>$content['content'], 
                        'grid' =>$content['grid'],                                                
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }   
                elseif($content['acf_fc_layout']=='related_stay'){                   
                    
                    $args = array(
                        'post_type' => array( 'accommodation' ),
                        'orderby' => 'ASC',
                        'post__in' => $content['select_stay']
                    );

                    $loop = new \WP_Query( $args );
                    if($loop->have_posts()) :                         
                        while ( $loop->have_posts() ) : $loop->the_post(); 
                        $post_data[] = array(
                            'id' => get_the_ID(),
                            'pre_heading' => get_field('pre_heading'),
                            'stay_guest' => get_field('stay_guest'),
                            'stay_beds' => get_field('stay_beds'),
                            'stay_person' => get_field('stay_person'),
                            'title' => get_the_title(),                               
                            'content' => get_the_content(),  
                            'image' => get_the_post_thumbnail(),                            
                            'url' => get_the_permalink(),
                        );
                        endwhile; //end the while loop
                    endif; // end of the loop. 


                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],                        
                        'select_stay' => $post_data,   
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                } 
                elseif($content['acf_fc_layout']=='testimonials'){
                    $all_testimonial = array();
                    $usp_args = array(
                        'post_type' => 'testimonial',
                        'posts_per_page' => '-1',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'testimonial_category', //double check your taxonomy name in you dd 
                                'field'    => 'id',
                                'terms'    => $content['testimonial_category'],
                            ),
                        ),

                    );
                    $usp_query = new \WP_Query(  $usp_args );

                    if($usp_query->have_posts()) {
                        while ( $usp_query->have_posts() ) : $usp_query->the_post();                            
                            $all_testimonial[] = array(
                                'id' => get_the_ID(),
                                'title' => get_the_title(),                               
                                'content' => get_the_content(),                             
                                'url' => get_the_permalink(),
                            );
                        endwhile;
                        wp_reset_postdata();
                    }

                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'bg_image' => '',
                        'bg_color_style' => $content['bg_color_style'], 
                        'testimonial_category' => $content['testimonial_category'],
                        'testimonial_data' => $all_testimonial,                                     
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                } 
               

            }
        }         
        
        return $data;
    }
}
