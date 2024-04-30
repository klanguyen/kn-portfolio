<?php
if(get_post_type() === \KN\ProjectsPlugin\ProjectPostType::POST_TYPE){
    echo '</div>
        </div>
    </section>';
}
?>

</main>

<?php do_action( 'kn_portfolio_content_end' ); ?>

</div>

<?php do_action( 'kn_portfolio_content_after' ); ?>
<section class="text-gray-50 bg-primary">
    <div class="container mx-auto">
        <div class="py-16 px-12">
            <div class="mx-auto max-w-screen-md md:grid md:grid-cols-3 md:gap-10">
                <div class="col-span-2 text-xl lg:text-2xl font-bold">
                    <p>Interested in working together?</p>
                    <p>We should queue up a time to chat.</p>
                    <p>Coffee is on me.</p>
                </div>
                <div class="flex items-center justify-self-end">
                    <a href="mailto:kaylang.dev@gmail.com" class="secondary-button mt-4 md:mt-0">Let's do this <i class="fa-solid fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="colophon" class="site-footer bg-white" role="contentinfo">
	<?php do_action( 'kn_portfolio_footer' ); ?>
    <div class="container mx-auto py-12 border-b-[1px] border-gray-300">
        <?php dynamic_sidebar( 'kn-portfolio-footer' ); ?>
    </div>
	<div class="container mx-auto py-6">
        <p class="text-center text-sm text-gray-500">
            Copyright &copy; <?php echo date_i18n( 'Y' );?> Kayla Nguyen  |  All Rights Reserved
        </p>
	</div>
</footer>

</div>

<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>
