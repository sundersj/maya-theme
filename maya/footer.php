<?php
/*
This is a template for footer
@package mayatheme

*/
 ?>

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="foot-content"><?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-1'); } ?></div>
					</div>
					<div class="col-sm-3">
						<div class="foot-content"><?php if(is_active_sidebar('footer-2')) { dynamic_sidebar('footer-2'); } ?></div>
					</div>
					<div class="col-sm-3">
						<div class="foot-content"><?php if(is_active_sidebar('footer-3')) { dynamic_sidebar('footer-3'); } ?></div>
					</div>
                    <div class="col-sm-3">
						<div class="foot-content"><?php if(is_active_sidebar('footer-4')) { dynamic_sidebar('footer-4'); } ?></div>
					</div>
				</div>
			</div>
		</footer>
        <div class="maya-typo-footer">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
                            <div class="maya-copyright">
                                <?php maya_theme_get_copyright(); ?>
                            </div>
						</div>
					</div>
				</div>
			</div>
		<?php wp_footer(); ?>
	</body>
</html>
