<?php
if(get_post_type() === \KN\ProjectsPlugin\ProjectPostType::POST_TYPE) :
    $technologies = get_the_terms(get_the_ID(), \KN\ProjectsPlugin\ProjectTechnologyTaxonomy::TAXONOMY);
    $technologiesOutput = '';
    foreach($technologies as $technology){
    $technologiesOutput .= '<li class="inline-flex w-auto bg-primary/10 p-1 rounded-[3px] text-sm tracking-wide mr-2 mb-2">'. $technology->name .'</li>';
    }
    $briefDesc = get_post_meta(get_the_ID(), 'project_brief_description', true);
    $output = '<div class="project-item max-w-sm h-fit bg-white border border-gray-200 rounded-lg shadow-sm flex flex-col justify-start text-start mb-6 lg:mb-0">
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
                            <a href="' . get_the_permalink() . '" class="inline-flex items-center font-medium text-gray-800 hover:text-primary transition-colors duration-200 hover:underline">
                                View Project
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>';
    echo $output;
else:
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-12' ); ?>>

	<header class="entry-header mb-4 text-center">
		<?php the_title( sprintf( '<h1 class="text-3xl lg:text-3xl tracking-tight font-extrabold mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<!--<time datetime="<?php /*echo get_the_date( 'c' ); */?>" itemprop="datePublished" class="text-sm text-gray-700"><?php /*echo get_the_date(); */?></time>-->
	</header>

	<?php if ( is_search() || is_archive() ) : ?>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>

	<?php else : ?>

		<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content(
				sprintf(
					__( 'Continue reading %s', 'tailpress' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);

			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
			?>
		</div>

	<?php endif; ?>

</article>

<?php
endif;
?>
