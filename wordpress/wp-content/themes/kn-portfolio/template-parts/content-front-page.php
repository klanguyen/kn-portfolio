<?php
$skills = array(
    [
        'name' => 'CSS',
        'logoPath' => 'css.svg'
    ],
    [
        'name' => 'Excel',
        'logoPath' => 'excel.png'
    ],
    [
        'name' => 'Figma',
        'logoPath' => 'figma.png'
    ],
    [
        'name' => 'Firebase',
        'logoPath' => 'firebase.png'
    ],
    [
        'name' => 'Git',
        'logoPath' => 'git.png'
    ],
    [
        'name' => 'GitHub',
        'logoPath' => 'github.png'
    ],
    [
        'name' => 'HTML5',
        'logoPath' => 'html5.svg'
    ],
    [
        'name' => 'Adobe Illustrator',
        'logoPath' => 'adobe-illustrator.png'
    ],
    [
        'name' => 'Adobe Photoshop',
        'logoPath' => 'adobe-photoshop.svg'
    ],
    [
        'name' => 'Adobe XD',
        'logoPath' => 'adobe-xd.svg'
    ],
    [
        'name' => 'Bootstrap',
        'logoPath' => 'bootstrap.png'
    ],
    [
        'name' => 'JavaScript',
        'logoPath' => 'javascript.png'
    ],
    [
        'name' => 'jQuery',
        'logoPath' => 'jquery.png'
    ],
    [
        'name' => 'PHP',
        'logoPath' => 'php.svg'
    ],
    [
        'name' => 'React',
        'logoPath' => 'react.svg'
    ],
    [
        'name' => 'TailwindCSS',
        'logoPath' => 'tailwindcss.svg'
    ],
    [
        'name' => 'Vue.js',
        'logoPath' => 'vuejs.png'
    ],
)
?>

<section class="mx-auto container text-gray-800 border-b-[1px] border-gray-200" id="about">
    <div class="py-16 md:grid md:grid-cols-3 md:gap-10">
        <img src="wp-content/themes/kn-portfolio/images/portrait.jpg" class="rounded-md mb-8 md:mb-0 lg:h-80" alt="Kayla portrait">
        <div class="col-span-2">
            <span class="bg-primary/10 p-1 rounded-md border-[1px] border-primary text-sm tracking-wide">About me</span>
            <h2 class="mt-4 text-xl lg:text-3xl font-bold mb-4 text-primary">Transforming visions into exceptional websites</h2>
            <p class="lg:text-xl">Passionate and innovative Front-End Web Developer with 4+ years of experience in crafting seamless user experiences and pixel-perfect designs. Proficient in a variety of web technologies, I specialize in turning ideas into captivating and responsive websites. With a keen eye for detail and a commitment to staying updated with the latest industry trends, I thrive on creating intuitive interfaces that elevate user engagement.
            </p>
        </div>
    </div>
</section>

<section class="mx-auto container text-gray-800 border-b-[1px] border-gray-200">
    <div class="py-16 flex-col justify-center text-center">
        <div class="inline-flex w-auto bg-primary/10 p-1 rounded-md border-[1px] border-primary text-sm tracking-wide">Skills</div>
        <h2 class="mt-4 text-xl lg:text-3xl font-bold mb-4 text-primary">The skills, tools, and technologies I’m good at</h2>
        <div class="swiper skillsSwiper max-w-3xl flex justify-center mb-4">
            <div class="swiper-wrapper mb-4">
                <?php foreach($skills as $skill): ?>
                    <div class="swiper-slide">
                        <img src="wp-content/themes/kn-portfolio/images/skills-logo/<?= $skill['logoPath'] ?>" class="w-auto h-7 mr-2" alt="<?= $skill['name'] ?>">
                        <span><?= $skill['name'] ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <a href="/portfolio/skills" class="primary-outline-button">View all skills</a>
    </div>
</section>

<?php dynamic_sidebar( 'kn-featured-projects' ); ?>

<!--<section class="mx-auto container text-gray-800 border-b-[1px] border-gray-200">
    <div class="py-16 flex-col justify-center text-center">
        <div class="inline-flex w-auto bg-primary/10 p-1 rounded-md border-[1px] border-primary text-sm tracking-wide">Featured Projects</div>
        <h2 class="mt-4 text-xl lg:text-3xl font-bold mb-4">Some things I\'ve built</h2>
        <div class="lg:grid lg:grid-cols-3 lg:gap-4 lg:justify-items-center inline-flex flex-col justify-center mb-6">
            <div class="max-w-sm h-fit bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-start text-start mb-6 lg:mb-0">
                <a href="#">
                    <img class="rounded-t-lg" src="https://placehold.it/500x500" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h3 class="mb-2 text-lg lg:text-2xl font-semibold text-gray-900">'.esc_html(get_the_title()).'</h3>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">'. $briefDesc .'</p>
                    <ul class="project-technologies mb-4">'.
                        $technologiesOutput
                        .'</ul>
                    <div class="project-actions border-t-[1px] border-gray-300 pt-4">
                        <a href="#" class="inline-flex items-center font-medium text-gray-800 hover:text-primary transition-colors duration-200">
                            View Project
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div><a href="/projects" class="primary-outline-button">View all projects</a></div>
    </div>
</section>-->

<?php
$q = new WP_Query([
    'post_type' => 'testimonials',
]);
if($q->have_posts()):
?>
    <section class="mx-auto container text-gray-800">
        <div class="py-16 flex-col justify-center text-center">
            <div class="inline-flex w-auto bg-primary/10 p-1 rounded-md border-[1px] border-primary text-sm tracking-wide">Testimonials</div>
            <h2 class="mt-4 text-xl lg:text-3xl font-bold mb-4 text-primary">What they think about me</h2>
            <div class="swiper testimonialsSwiper max-w-3xl flex justify-center mb-4">
                <div class="swiper-wrapper mb-4">
                    <?php while($q->have_posts()):
                        $q->the_post();
                        $company = get_post_meta(get_the_ID(), 'testimonials_company', true);
                        $position = get_post_meta(get_the_ID(), 'testimonials_position', true);
                    ?>
                        <div class="swiper-slide px-16">
                            <i class="fa-solid fa-quote-left text-gray-400 text-5xl"></i>
                            <p class="mt-3"><?= get_the_content() ?></p>
                            <p class="mt-3 text-lg font-semibold"><?= get_the_author() ?></p>
                            <p class="font-medium text-gray-500"><?= $position ?> @ <?= $company ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
<?php
endif;
wp_reset_postdata();
?>
