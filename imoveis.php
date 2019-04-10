
<?php 
	include_once('search_imobiliaria.php');
	$args = array(
		'post_type' => 'imovel',
		'tax_query' =>  $taxQuery
	);
	$loop =  new WP_Query($args);
?>

<section class="mt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Imoveis</h2>
			</div>
		</div>
		<div class="row">
			<?php 

			if ($loop->have_posts()) {
				while($loop->have_posts()){
					$loop->the_post();
			?>
			<div class="col-lg-3">
				<div class="card">
				  <img class="card-img-top img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				  <div class="card-body">
				    <h5 class="card-title"><?php the_title(); ?></h5>
				    <p class="card-text"><?php the_content(); ?></p>
				    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Saiba mais</a>
				  </div>
				</div>
			</div>

			<?php } } ?>
		</div>
	</div>
</section>