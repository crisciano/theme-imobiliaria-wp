<?php $base = get_template_directory_uri(); ?>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php 
					$copyright = get_theme_mod('set_copyright');
				?>
				<p>
					<?= $copyright ?>
				</p>
			</div>
			
		</div>
	</div>
</footer>



<script src="<?=$base?>/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?=$base?>/assets/plugins/bootstrap/tether.min.js"></script>
<script src="<?=$base?>/assets/plugins/bootstrap/bootstrap.min.js"></script>


<?php wp_footer(); ?>
</body>
</html>