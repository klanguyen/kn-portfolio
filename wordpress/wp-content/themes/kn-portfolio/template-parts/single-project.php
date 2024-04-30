<?php
$briefDesc = get_post_meta(get_the_ID(), 'project_brief_description', true);
$githubUrl = get_post_meta(get_the_ID(), 'project_github_link', true);
$demoUrl = get_post_meta(get_the_ID(), 'project_demo_link', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header mb-4">
        <?php the_title( sprintf( '<h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-2"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
        <p class="mb-2"><?= $briefDesc ?></p>
        <div class="action-links inline-flex">
            <?php
                if(!empty($githubUrl)){
                    echo "<a class='primary-button mr-3' href='$githubUrl' target='_blank_'>
                            <i class='fa-brands fa-github text-xl'></i>
                          </a>";
                }
                if(!empty($demoUrl)){
                    echo "<a class='primary-outline-button' href='$demoUrl' target='_blank'>
                            Live Demo
                          </a>";
                }
            ?>
        </div>
    </header>

    <div class="entry-content">
        <?php the_post_thumbnail('post-thumbnail', ['class' => 'w-full']); ?>
        <h2 class="mt-4 text-xl lg:text-3xl font-bold mb-4">Description</h2>
        <?php the_content(); ?>
        <h2 class="mt-4 text-xl lg:text-3xl font-bold mb-4">Technologies</h2>
        <?php $technologies = get_the_terms(get_the_ID(), \KN\ProjectsPlugin\ProjectTechnologyTaxonomy::TAXONOMY);
        $technologiesOutput = '';
        foreach($technologies as $technology){
            $technologiesOutput .= '<li class="inline-flex w-auto bg-primary/10 p-1 rounded-[3px] text-sm tracking-wide mr-4 mb-2">'. $technology->name .'</li>';
        } ?>
        <ul class="project-technologies"> <?= $technologiesOutput ?> </ul>
        <h2 class="mt-4 text-xl lg:text-3xl font-bold mb-4">Screenshots</h2>
        <div class="flex flex-wrap">
        <?php
        $images = acf_photo_gallery('project_screenshots', get_the_ID());
        if(count($images)):
            $i = 0;
            foreach($images as $image):
                $i = $i + 1;
                $id = $image['id'];
                $title = $image['title'];
                $caption = $image['caption'];
                $full_image_url= $image['full_image_url']; //Full size image url
                $medium_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
                $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                $url= $image['url']; //Goto any link when clicked
                $target= $image['target']; //Open normal or new tab
                echo "<a data-modal-target='popup-image-$i' data-modal-toggle='popup-image-$i' class='hover:scale-110 mr-4 mb-4 cursor-pointer rounded-md border-[1px] border-primary'>
								<img class='project-screenshot rounded-md' src='$medium_image_url' alt='$title'>
							  </a>
							  <div id='popup-image-$i' tabindex='-1' class='hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-4rem)] max-h-full'>
							  	<div class='relative p-4 w-full max-w-6xl max-h-[calc(100%-4rem)]'>
                                    <div class='relative bg-white rounded-lg shadow'>
                                        <button type='button' class='absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center' data-modal-hide='popup-image-$i'>
                                            <svg class='w-4 h-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 14 14'>
                                                <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6'/>
                                            </svg>
                                            <span class='sr-only'>Close modal</span>
                                        </button>
                                        <div class='p-4 md:p-5 text-center'>
                                            <img src='$full_image_url' alt='$title' class='p-8' />
                                            <h3 class='mb-5 text-lg font-normal text-gray-500 dark:text-gray-400'>$caption</h3>
                                        </div>
									</div>
								</div>
							  </div>";

            endforeach;
        endif;
        ?>
        </div>

        <?php
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

</article>
