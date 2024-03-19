<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.header',
        'partials.footer',
        'sections.header',
        'sections.footer',        
        'index',
        '404',
        '*'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [

            //Header
            'logo' => get_field('logo', 'option'),   
            'book_now' => get_field('book_now', 'option'),
            'main_website_logo' => get_field('main_website_logo', 'option'), 

            // Footer
            'footer_logo' => get_field('footer_logo', 'option'),
            'website_logo' => get_field('website_logo', 'option'),
            'enquire_link' => get_field('enquire_link', 'option'),
            'footer_logo_tagline' => get_field('footer_logo_tagline', 'option'),
            'social_media' => get_field('social_media', 'option'),
            'micro_site_footer' => get_field('micro_site_footer', 'option'),

            'search_image' => get_field('search_image', 'option'),
            'search_description' => get_field('search_description', 'option'),
            
            // 'phone_number' => get_field('phone_number', 'option'),
            // 'email_address' => get_field('email_address', 'option'),
            'newsletter_button_text' => get_field('newsletter_button_text', 'option'),
            'newsletter_form' => get_field('newsletter_form', 'option'),
            'newsletter_form_image' => get_field('newsletter_form_image', 'option'),
            'copyright_text' => get_field('copyright_text', 'option'),
            'legal_page_list' => get_field('legal_page_list', 'option'),
            'image_404' => get_field('image_404', 'option'),
            'heading_404' => get_field('heading_404', 'option'),
            'description_404' => get_field('description_404', 'option'),
            'button_link_404' => get_field('button_link_404', 'option'),
            'thank_you_image' => get_field('thank_you_image', 'option'),
            'thank_you_heading' => get_field('thank_you_heading', 'option'),
            'thank_you_description' => get_field('thank_you_description', 'option'),
            'thank_you_button_link' => get_field('thank_you_button_link', 'option'),
        ];
    }
}
