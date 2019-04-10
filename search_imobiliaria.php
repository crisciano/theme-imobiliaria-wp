<?php 
	if ($_GET) { 

		$query = $_GET['cidade'];
		if ( $_GET['cidade'] && $query === '') {
			wp_redirect( home_url() );
		}

		$taxQuery = array(
			array(
				'taxonomy' => 'localizacao', 
				'field' => 'slug',
				'terms' => $query
			)
		);
	}
 ?>

<div class="mt-5">
 	<?php  
 		$taxonomys = get_terms('localizacao');
 		// echo $taxonomys[0]->count;
 	?>
 	<div class="container">
 		<div class="row">
 			<div class="col-12 text-center">
			 	<form action="#" method="GET" class="form-inline" >
			 		<div class="form-group">
				 		<select name="cidade" class="form-control" >
			 				<option value="">Selecione alguma cidade</option>
				 			<?php foreach ($taxonomys as $taxonomy) { ?>
					 			<option value="<?= $taxonomy->slug ?>" class="list-group-item d-flex justify-content-between align-items-center">
					 				<?= $taxonomy->name; ?>
					 				<span class="badge badge-primary badge-pill">
					 					<?= $taxonomy->count;  ?>
					 				</span>
					 			</option>
				 			<?php } ?>
				 		</select>
				 	</div>
				 	<div class="form-group">
				 		<button type="submit" class="btn btn-primary">buscar </button>
				 	</div>
			 	</form>
			 	
			 	<!-- <?php get_search_form(); ?> -->
 			</div>
 		</div>
 	</div>
</div>