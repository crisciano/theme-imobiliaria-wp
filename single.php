<?php get_header(); ?>

<?php 
if (have_posts()) {
	while(have_posts()){
		the_post();
?>

<style>
	#header{
		background-image: url('<?php the_post_thumbnail_url();?>');
	}
</style>
<section id="header" class="d-flex align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="card-title"><?php the_title(); ?></h2>
			</div>
		</div>
	</div>
	
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mb-5">
			    <h2 class="card-title"><?php the_title(); ?></h2>
			</div>
			<div class="col-6 mb-5 mb-lg-0">
				<h3><b>Descrição</b></h3>
			    <p class="card-text"><?php the_content(); ?></p>
				
			</div>
			<div class="col-6">
				<ul class="list-group">
					<?php $detail = get_post_meta($post->ID) ?>
				  		<li class="list-group-item">
				  			<b>Preço: </b>
				  			<?= $detail['preco'][0] ?></li>
				  		<li class="list-group-item">
				  			<b>Dormitorios: </b>
				  			<?= $detail['dormitorio'][0] ?></li>
				  		<li class="list-group-item">
				  			<b>Vagas: </b>
				  			<?= $detail['vagas'][0] ?></li>
				  		<li class="list-group-item">
				  			<b>Área: </b>
				  			<?= $detail['area'][0] ?></li>
				  		<li class="list-group-item">
				  			<b>Opcionais: </b>
				  			<?= $detail['opcionais'][0] ?></li>
				</ul>
			</div>
			
		</div>
	</div>
</section>


<?php } } ?>


<?php get_footer(); ?>