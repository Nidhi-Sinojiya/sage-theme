<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page-header',
        'partials.content',
        'partials.content-*',
        'index',
        'search',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'title' => $this->title(),
            'blog_post' => $this->blog_post(),
        ];
    }

    public function blog_post() {        
        $data = [];
        $flexible_content = get_field('blog_content', get_option('page_for_posts'));
        if($flexible_content){
            foreach($flexible_content as $content) {
                if($content['acf_fc_layout']=='banner'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'banner_style' => 'simple',
                        'banner_height' => '',
                        'scroll_to_discover' => 'no',
                        'background_image' => $content['background_image'],
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
                        'icon_style' => 'left',
                        'heading' => $content['heading'],
                        'content' => $content['content'],   
                        'button' => '', 
                        'icon_image' => $content['icon_image'],                                           
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                        'section_color' => '',
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='post_with_tab'){

                    $all_post = array();
                    $cat_post = array();
                    
                    foreach ( $content['select_category']  as $category) {
                        $usp_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => '-1',
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category', //double check your taxonomy name in you dd 
                                    'field'    => 'name',
                                    'terms'    => $category->name,
                                ),
                            ),
                        );
                        $usp_query = new \WP_Query(  $usp_args );
                        if($usp_query->have_posts()) {
                            while ( $usp_query->have_posts() ) : $usp_query->the_post();        
                                $fea_img = get_template_directory_uri().'/resources/images/blog-single.jpg';
                                if(get_the_post_thumbnail_url()){
                                    $fea_img = get_the_post_thumbnail_url();
                                }

                                $all_post[] = $cat_post[$category->slug][] = array(
                                    'id' => get_the_ID(),
                                    'title' => get_the_title(),                               
                                    'content' => get_the_excerpt(),                             
                                    'url' => get_the_permalink(),
                                    'img' => $fea_img,
                                );
                            endwhile;
                            wp_reset_postdata();
                        }
                    }
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],                        
                        'select_category' => $content['select_category'],  
                        'all_post' => $all_post,
                        'cat_post' => $cat_post,
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                        'section_color' => '',
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='page_grid'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'background_style' => $content['background_style'],
                        'heading' =>$content['heading'],     
                        'content' =>$content['content'], 
                        'grid' =>$content['grid'],                                                
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
                        'bg_image' => $content['bg_image'],
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

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function title()
    {
        if ($this->view->name() !== 'partials.page-header') {
            return get_the_title();
        }

        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }

            return __('Latest Posts', 'sage');
        }

        if (is_archive()) {
            return get_the_archive_title();
        }

        if (is_search()) {
            return sprintf(
                /* translators: %s is replaced with the search query */
                __('Search Results for %s', 'sage'),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_the_title();
    }
}
