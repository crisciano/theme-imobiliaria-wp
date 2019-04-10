<?php get_header(); ?>

<?php 
if (have_posts()) {
	while(have_posts()){
		the_post();
?>

<style>
	#header{
		<?php if (has_post_thumbnail()): ?>
			background-image: url("<?php the_post_thumbnail_url() ?>");
		<?php else: ?>
			background: #ccc;
		<?php endif ?>		
	}
</style>

<section id="header" class="d-flex align-items-center">
	<div class="container">
		<div class="row">
			<h1><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>
		</div>
	</div>
</section>



<?php
	}
}
?>

<?php if (is_page('blog')): ?>

	<section>
		<div class="container">
			<div class="row">
				<?php 
				$args = array(
					'post_type' => 'post',
					'tax_query' =>  $taxQuery
				);
				$loop =  new WP_Query($args);

				if ($loop->have_posts()) {
					while($loop->have_posts()){
						$loop->the_post();
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
	
<?php endif ?>

<?php if(is_page('contact')) { ?>
	<section>
		
		<div class="container">
			<div class="row">

				<div class="col-lg-6">

					<?php 
						$key = get_theme_mod('set_map_api');
						$address = urlencode(get_theme_mod('set_map_address'));
					?>
					<!-- AIzaSyDBaj8fb-bsMHg33CRGlLkGdBZ_JYUcqXo -->
					<!-- Space+Needle,Seattle+WA -->

					<iframe 
						width="100%"
						height="350" 
						frameborder="0"
						src="https://www.google.com/maps/embed/v1/place?key=<?=$key?>&q=<?=$address?>&zoom=15" 
						></iframe>
				</div>

				<div class="col-lg-6">

					<form>
						<div class="form-group">
							<label>Nome</label>
							<input type="text" class="form-control" placeholder="Nome">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" placeholder="E-mail">
						</div>
						<div class="form-group">
							<label>Telefone</label>
							<input type="tel" class="form-control" placeholder="Telefone">
						</div>
						<div class="form-group">
							<label>Mensagem</label>
							<textarea name="msg" class="form-control" rows="10"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					
				</div>
				
			</div>
		</div>
	</section>
<?php } ?>



<?php get_footer(); ?>