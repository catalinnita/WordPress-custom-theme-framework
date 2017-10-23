				</div>
			</div>
		</section>
		<!-- Main Wrap End -->
		
		<?php
		global $page;
		if ($page == 'blog') {
			get_template_part('template_parts/blog-faves');	
		}
		?>
		
		<!-- Footer Start -->
		<footer>
			<div id="FooterContainer">
				<div id="Footer" class="WebsiteWidth">
					<div id="Copyright"><?php echo of_get_option("copyright"); ?></div>
					<?php 
					if ( has_nav_menu('footer_menu') ) {
						wp_nav_menu(array("theme_location"=>'footer_menu',"depth"=>1,'container' => false,"menu_id"=>"BottomMenu", 'walker' => new custom_nav_walker));
					}
					?>				
					
					<?php if(of_get_option("footerlogo")) { ?>
						<a id="FooterLogo" href="<?php echo site_url(); ?>"><img src="<?php echo of_get_option("footerlogo"); ?>" alt="<?php bloginfo('name'); ?> Homepage" /></a>
					<?php } ?>
				</div>
				<div class="cleaner"></div>
			</div>
		</footer>
		<!-- Footer End -->
	
	</div>	
	<!-- WebsiteWrap End -->

	<?php wp_footer(); ?>	
		
</body>
</html>