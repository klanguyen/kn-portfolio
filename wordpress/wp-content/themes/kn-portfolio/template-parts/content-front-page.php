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
)
?>

<section class="mx-auto container text-gray-800 border-b-[1px] border-gray-200">
    <div class="py-16 md:grid md:grid-cols-3 md:gap-10">
        <img src="wp-content/themes/kn-portfolio/images/portrait.jpg" class="rounded-md mb-8 md:mb-0" alt="Kayla portrait">
        <div class="col-span-2">
            <span class="bg-primary/10 p-1 rounded-md border-[1px] border-primary text-sm tracking-wide">About me</span>
            <h2 class="mt-4 text-xl lg:text-3xl font-bold mb-4">Transforming visions into exceptional websites</h2>
            <p class="lg:text-xl">Passionate and innovative Front-End Web Developer with 4+ years of experience in crafting seamless user experiences and pixel-perfect designs. Proficient in a variety of web technologies, I specialize in turning ideas into captivating and responsive websites. With a keen eye for detail and a commitment to staying updated with the latest industry trends, I thrive on creating intuitive interfaces that elevate user engagement.
            </p>
        </div>
    </div>
</section>

<section class="mx-auto container text-gray-800 border-b-[1px] border-gray-200">
    <div class="py-16 flex-col justify-center text-center">
        <div class="inline-flex w-auto bg-primary/10 p-1 rounded-md border-[1px] border-primary text-sm tracking-wide">Skills</div>
        <h2 class="mt-4 text-xl lg:text-3xl font-bold mb-4">The skills, tools, and technologies I’m good at</h2>
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
        <a href="/skills" class="primary-outline-button">View all skills</a>
    </div>
</section>
