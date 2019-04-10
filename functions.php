<?php 

// exibir imagens de tumbnail
add_theme_support('post-thumbnails');


/********************************************
*
* post type -> add novos tipos de postes,
* postes personalizados que podem ser 
* customizados
*
********************************************/
// adicionar um tipo de post imoveis
function add_post_type_imoveis(){
	$imovelNameSingular = "Imóvel";
	$imovelNamePlural = "Imóveis";
	$description = "Imóveis da imobiliaria";

	$supports = array(
		'title',
		'editor',
		'author',
		'thumbnail'
	);

	$labelsImoveis = array(
		'name' =>  $imovelNamePlural,
		'name_singular' => $imovelNameSingular,
		'add_new_item' => 'Adicionar novo ' . $imovelNameSingular,
		'edit_item' => 'Editar '. $imovelNameSingular
	);

	$imoveis = array(
		'labels' => $labelsImoveis,
		'public' => true,
		'description' => $description,
		'menu_icon' => 'dashicons-admin-home',
		'supports' => $supports
	);

	register_post_type('imovel', $imoveis);
}
add_action('init','add_post_type_imoveis');

// adicionar um tipo de post empreendimento
function add_post_type_empreendimento(){
	$empreendimentoNameSingular = "Empreendimento";
	$empreendimentoNamePlural = "Empreendimentos";
	$description = "Empreendimento da imobiliaria";

	$supports = array(
		'title',
		'editor',
		'author',
		'thumbnail'
	);

	$labelsEmpreendimento = array(
		'name' =>  $empreendimentoNamePlural,
		'name_singular' => $empreendimentoNameSingular,
		'add_new_item' => 'Adicionar novo ' . $empreendimentoNameSingular,
		'edit_item' => 'Editar '. $empreendimentoNameSingular
	);

	$empreendimentos = array(
		'labels' => $labelsEmpreendimento,
		'public' => true,
		'description' => $description,
		'menu_icon' => 'dashicons-admin-multisite',
		'supports' => $supports
	);

	register_post_type('empreendimento', $empreendimentos);
}
add_action('init','add_post_type_empreendimento');


// ativa o menu para edição
function add_menu_header(){
	register_nav_menu('header-menu', 'main-menu');
}
add_action('init','add_menu_header');

function add_taxonomy_localizacao(){

	$nameSingular = 'Localização';
	$namePlural = 'Localizações';

	$labels = array(
		'name' => $namePlural , 
		'singular_name' => $nameSingular, 
		'edit_item' => 'Editar '.$nomeSingular,
		'add_new_item' => 'Adicionar nova '. $nameSingular
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => true
	);
	register_taxonomy('localizacao', 'imovel', $args);
}

add_action('init','add_taxonomy_localizacao');

function menu_custom(){
	$args = array(
		'menu'            => '',
        'container'       => 'nav',
        'container_class' => 'navbar navbar-expand-lg navbar-light',
        'container_id'    => 'nav',
        'menu_class'      => 'navbar-nav d-flex align-items-center justify-content-around',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<div class="collapse navbar-collapse" id="navbarNav"><ul id="%1$s" class="%2$s">%3$s</ul></div>',
        'item_spacing'    => 'preserve',
        'depth'           => 0,
        'walker'          => '',
        'theme_location'  => 'header-menu',
	);

	wp_nav_menu($args);
}


// campos novos no post
function add_new_campos_imoveis( $post_id ){
	if (isset($_POST['preco'])) {
		update_post_meta($post_id, 'preco', sanitize_text_field($_POST['preco']));
	}
	if (isset($_POST['vagas'])) {
		update_post_meta($post_id, 'vagas', sanitize_text_field($_POST['vagas']));
	}
	if (isset($_POST['area'])) {
		update_post_meta($post_id, 'area', sanitize_text_field($_POST['area']));
	}
	if (isset($_POST['opcionais'])) {
		update_post_meta($post_id, 'opcionais', sanitize_text_field($_POST['opcionais']));
	}
	if (isset($_POST['dormitorio'])) {
		update_post_meta($post_id, 'dormitorio', sanitize_text_field($_POST['dormitorio']));
	}
}
add_action('save_post','add_new_campos_imoveis');

function details_imovel( $post ){
	include_once('form-metabox-imovel.php');
}

function add_meta_box_details_imovel(){
	add_meta_box(
		'informacoes-imoveis',
		'Informações do Imóvel',
		'details_imovel',
		'imovel',
		'normal',
		'default'
	);
}

add_action('add_meta_boxes', 'add_meta_box_details_imovel');

/********************************************
*
* widgets -> cria widgets novos no painel
* administrativo
*
********************************************/
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	 
	wp_add_dashboard_widget('custom_help_widget', 'Theme Mariachi', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {

	$mariachi = '<h3>A mariachi</h3>';
	$mariachi .= '<p>Nosotros somos uma agência de publicidade com DNA digital e compromisso total con la visibilidad de nuestros clientes. Acreditamos que a união entre a inspiração criativa e lo planejamento metódico és lo mejor caminho para trazer resultados e cativar un cliente bigode grosso.</p>';
	$mariachi .= '<a href="http://mariachi.com.br" target="_blank" > Saber mais </a>';
	echo $mariachi;
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 

/********************************************
*
* customizer -> cria seções novas na area
* de personalizar, da para ver o resultado
* avivo
*
********************************************/

function map_customizer( $wp_customize ){
	// cria a section copyright
	$wp_customize->add_section(
		'sec_copyright', array(
			'title' => 'Copyright',
			'description' => 'Copyright Section'
		)
	);
	// set input section copyright
	$wp_customize->add_setting(
		'set_copyright', array(
			'type' => 'theme_mod', 
			'default' => '', 
			'sanitize_callback' => 'wp_filter_nohtml_kses', 
		)
	);
	// inclui o input na section copyright
	$wp_customize->add_control(
		'set_copyright', array(
			'label' => 'Copyright', 
			'description' => 'Alterar Copyright', 
			'section' => 'sec_copyright', 
			'type'=> 'text'
		)
	);

	// //mapa
	$wp_customize->add_section(
		'sec_map', array(
			'title' => 'Configurações do Mapa', 
			'description' => 'Configurações do mapa.'
		)
	);

	// input apikey google maps
	$wp_customize->add_setting(
		'set_map_api', array(
			'type' => 'theme_mod', 
			'default' => '', 
			'sanitize_callback' => 'wp_filter_nohtml_kses', 
		)
	);

	$wp_customize->add_control(
		'set_map_api', array(
			'label' => 'Google maps', 
			'description' => 'Criar uma APIKEY <a target="_blank" href="https://console.developers.google.com/flows/enableapi?apiid=maps_backend"> clique aqui </a> ', 
			'section' => 'sec_map', 
			'type'=> 'text'
		)
	);

	// input endereço 
	$wp_customize->add_setting(
		'set_map_address', array(
			'type' => 'theme_mod', 
			'default' => '', 
			'sanitize_callback' => 'wp_filter_nohtml_kses', 
		)
	);

	$wp_customize->add_control(
		'set_map_address', array(
			'label' => 'Insira o endereço', 
			'description' => 'Não colocar caracteres específicos.', 
			'section' => 'sec_map', 
			'type'=> 'textarea'
		)
	);
}
add_action('customize_register', 'map_customizer' );

add_theme_support(
	'html5',
	array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	)
);


// function my_search_form($form) {
// 	return '
// 	<form method="get" id="searchform" action="#" >
// 		<div><label for="s">' . __('Procura por:') . '</label>
// 		<input type="text" value="' . attribute_escape(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />
// 		<input type="submit" id="searchsubmit" value="'.attribute_escape(__('Search')).'" />
// 		</div>
// 	</form>';
// }

// add_filter('get_search_form', 'my_search_form');