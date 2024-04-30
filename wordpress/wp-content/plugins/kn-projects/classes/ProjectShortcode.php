<?php

namespace KN\ProjectsPlugin;

class ProjectShortcode extends Singleton
{
    /**
     * @var static $instance Hold the single instance
     */
    protected static $instance;

    /**
     * Project Shortcode constructor
     */
    protected function __construct()
    {
        add_shortcode('kn-featured-projects-block', [$this, 'featuredProjectsShortCode']);
    }

    /**
     * @return void Prevent cloning (PHP specific)
     */
    protected function __clone(){}

    /**
     * @return string A featured projects block
     */
    public function featuredProjectsShortCode() {
        $output = '<section class="mx-auto container text-gray-800 border-b-[1px] border-gray-200">
                        <div class="py-16 flex-col justify-center text-center">
                            <div class="inline-flex w-auto bg-primary/10 p-1 rounded-md border-[1px] border-primary text-sm tracking-wide">Featured Projects</div>
                            <h2 class="mt-4 text-xl lg:text-3xl font-bold mb-4">Some things I\'ve built</h2>';
        $query = new \WP_Query([
            'post_type' => ProjectPostType::POST_TYPE,
            'meta_query' => [
                array(
                    [
                        'key' => 'is_featured_on_home_page',
                        'value' => true,
                        'compare' => 'LIKE'
                    ]
                )
            ],
            'posts_per_page' => 3,
        ]);

        if($query->have_posts()){
            $output .= '<div class="lg:grid lg:grid-cols-3 lg:gap-4 lg:justify-items-center inline-flex flex-col justify-center mb-6">';
            while($query->have_posts()) {
                $query->the_post();
                $technologies = get_the_terms(get_the_ID(), ProjectTechnologyTaxonomy::TAXONOMY);
                $technologiesOutput = '';
                foreach($technologies as $technology){
                    $technologiesOutput .= '<li class="inline-flex w-auto bg-primary/10 p-1 rounded-[3px] text-sm tracking-wide mr-2 mb-2">'. $technology->name .'</li>';
                }
                $briefDesc = get_post_meta(get_the_ID(), 'project_brief_description', true);
                $output .= '<div class="max-w-sm h-fit bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-start text-start mb-6 lg:mb-0">
                                <a href="' . get_the_permalink() . '">
                                    <img class="rounded-t-lg" src="' . get_the_post_thumbnail_url() . '" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="' . get_the_permalink() . '">
                                        <h3 class="mb-2 text-lg lg:text-2xl font-semibold text-gray-900">'.esc_html(get_the_title()).'</h3>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700">'. $briefDesc .'</p>
                                    <ul class="project-technologies mb-4">'.
                                        $technologiesOutput
                                    .'</ul>
                                    <div class="project-actions border-t-[1px] border-gray-300 pt-4">
                                        <a href="' . get_the_permalink() . '" class="inline-flex items-center font-medium text-gray-800 hover:text-primary transition-colors duration-200">
                                            View Project
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>';
            }
            $output .= '</div>
                    <div><a href="/projects" class="primary-outline-button">View all projects</a></div>
                </div>
            </section>';
        }

        wp_reset_postdata();

        return $output;
    }
}
