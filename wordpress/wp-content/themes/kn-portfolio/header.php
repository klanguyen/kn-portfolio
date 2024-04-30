<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'kn_portfolio_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'kn_portfolio_header' ); ?>

	<header class="sticky top-0 z-10 bg-white/80 backdrop-blur-md">

		<div class="mx-auto container">
			<div class="lg:flex lg:justify-between lg:items-center py-6">
				<div class="flex justify-between items-center">
					<div>
						<?php if ( has_custom_logo() ) { ?>
                            <?php the_custom_logo(); ?>
						<?php } else { ?>
							<a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-extrabold text-lg uppercase">
								<?php echo get_bloginfo( 'name' ); ?>
							</a>

							<p class="text-sm font-light text-gray-600">
								<?php echo get_bloginfo( 'description' ); ?>
							</p>

						<?php } ?>
					</div>

					<div class="lg:hidden">
						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
							<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
									<g id="icon-shape">
										<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
											  id="Combined-Shape"></path>
									</g>
								</g>
							</svg>
						</a>
					</div>
				</div>

				<?php
				wp_nav_menu(
					array(
						'container_id'    => 'primary-menu',
						'container_class' => 'hidden bg-transparent mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block lg:items-center',
						'menu_class'      => 'lg:flex lg:-mx-4',
						'theme_location'  => 'primary',
						'li_class'        => 'lg:mx-4 py-2',
						'fallback_cb'     => false,
					)
				);
				?>
			</div>
		</div>
	</header>

	<div id="content" class="site-content flex-grow">

		<?php if ( is_front_page() ) { ?>
			<!-- Start introduction -->
            <section class="bg-gradient-to-r from-blue-50 from-10% via-sky-100 via-30% to-blue-200 to-90%">
                <div class="container mx-auto">
                    <div class="px-12 py-16 rounded-xl">
                        <div class="mx-auto max-w-screen-md text-gray-800">
                            <h1 class="text-3xl lg:text-6xl tracking-tight font-extrabold mb-3">Hi, I'm Kayla Nguyen</h1>
                            <h2 class="text-xl lg:text-3xl font-bold mb-4">Web Developer & UI/UX Designer</h2>
                            <p class="text-gray-600 lg:text-xl font-medium mb-8">Passionate and innovative Front-End Web Developer with 4+ years of experience in crafting seamless user experiences and pixel-perfect designs. Proficient in a variety of web technologies, I specialize in turning ideas into captivating and responsive websites. With a keen eye for detail and a commitment to staying updated with the latest industry trends, I thrive on creating intuitive interfaces that elevate user engagement.</p>
                            <div class="w-full sm:w-auto">
                                <a href="https://linkedin.com/in/nguyen-hp-nguyen/"
                                    class="primary-outline-button mr-2 mb-2" target="_blank"><i class="fa-brands fa-linkedin-in fa-lg mr-2"></i>LinkedIn</a>
                                <a href="https://github.com/klanguyen"
                                   class="primary-outline-button mr-2 mb-2" target="_blank"><i class="fa-brands fa-github fa-lg mr-2"></i>GitHub</a>
                                <a href="mailto:kaylang.dev@gmail.com"
                                   class="primary-outline-button mb-2" target="_blank"><i class="fa-solid fa-envelope fa-lg mr-2"></i>Email</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<!-- End introduction -->
		<?php } ?>

		<?php do_action( 'kn_portfolio_content_start' ); ?>

		<main>
            <?php
            if ( is_front_page() ) {
                get_template_part('template-parts/content', 'front-page');
            }
            elseif (is_post_type_archive()) {
                get_template_part('template-parts/archive', get_post_type());
            }
            ?>
