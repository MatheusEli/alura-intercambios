<?php

function alura_intercambios_registrando_taxonomia()
{
    register_taxonomy('paises', 'destinos', array('labels' => array('name' => 'Países', 'hierarchical' => true)));
}

add_action('init', 'alura_intercambios_registrando_taxonomia');

function alura_intercambios_registrando_post_customizado()
{
    register_post_type('destinos', array(
        'labels' => array('name' => 'Destinos'),
        'public' => true,
        'menu-position' => 0,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-admin-site'
    ));
}

add_action('init', 'alura_intercambios_registrando_post_customizado');

function alura_intercambios_adicionando_recursos_aot()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}


add_action('after_setup_theme', 'alura_intercambios_adicionando_recursos_aot');

function alura_intercambios_registrando_menu()
{
    register_nav_menu(
        'menu-navegacao',
        'Menu Navegação'
    );
}


add_action('init', 'alura_intercambios_registrando_menu');

function alura_intercambios_registrando_post_customizado_banner()
{
    register_post_type(
        'banners',
        array(
            'labels' => array('name' => 'Banner'),
            'public' => true,
            'menu_position' => 1,
            'menu_icon' => 'dashicons-format-image',
            'supports' => array('title', 'thumbnail')
        )
    );
}

add_action('init', 'alura_intercambios_registrando_post_customizado_banner');

function alura_intercambios_registrando_metabox()
{
    add_meta_box(
        'ai_registrando_metabox',
        'Texto para a home',
        'ai_funcao_callback',
        'banners'
    );
}

add_action('add_meta_boxes', 'alura_intercambios_registrando_metabox');

function ai_funcao_callback($post)
{
    $texto_home_1 = get_post_meta($post->ID, '_texto_home_1', true);
    $texto_home_2 = get_post_meta($post->ID, '_texto_home_2', true);
    ?>
    <label for="texto_home_1">Texto 1</label>
    <input value="<?= $texto_home_1 ?>" type="text" name="texto_home_1" style="width: 100%"/>
    <br>
    <br>
    <label for="texto_home_2">Texto 2</label>
    <input value="<?= $texto_home_2 ?>" type="text" name="texto_home_2" style="width: 100%"/>
    <br>
    <br>
    <?php
}

function alura_intercambios_salvando_dados_metabox($post_id)
{
    foreach ($_POST as $key => $value) {
        if ($key !== 'texto_home_1' && $key !== 'texto_home_2') {
            continue;
        }

        update_post_meta(
            $post_id,
            '_' . $key,
            $_POST[$key]
        );
    }
}

add_action('save_post', 'alura_intercambios_salvando_dados_metabox');

function pegandoTextosParaBanner()
{
    $args = array(
        'post_type' => 'banners',
        'post_status' => 'publish',
        'posts_per_page' => 1
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()): $query->the_post();
            $texto1 = get_post_meta(get_the_ID(), '_texto_home_1', true);
            $texto2 = get_post_meta(get_the_ID(), '_texto_home_2', true);

            return array('texto_1' => $texto1,
                'texto_2' => $texto2);
        endwhile;
    }
}

function alura_intercambios_adicionando_scripts()
{

    $textosBanner = pegandoTextosParaBanner();

    if (is_front_page()) {
        wp_enqueue_script('typed-js', get_template_directory_uri() . '/js/typed.min.js', array(), false, true);
        wp_enqueue_script('texto-banner-js', get_template_directory_uri() . '/js/texto_banner.js', array('typed-js'), false, true);
        wp_localize_script('texto-banner-js', 'data',$textosBanner);
    }
}

add_action('wp_enqueue_scripts', 'alura_intercambios_adicionando_scripts');
?>