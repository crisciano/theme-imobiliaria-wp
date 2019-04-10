<?php get_header(); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Blog</h2>
				
			</div>
		</div>
		<div class="row">
			<?php 
			if (have_posts()) {
				while(have_posts()){
					the_post();
			?>
			<div class="col-lg-4 mb-5">
				<div class="card">
				  <img class="card-img-top img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				  <div class="card-body">
				    <h5 class="card-title"><?php the_title(); ?></h5>
				    <p class="card-text"><?php the_content(); ?></p>
				    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Go somewhere</a>
				  </div>
				</div>
				
			</div>



			<?php } } ?>
		</div>
	</div>
</section>



<?php include('imoveis.php') ?>



<?php get_footer(); ?>