<?php

if (!defined('ABSPATH')) {
    exit;
}
require get_template_directory() . '/inc/customizer.php';
/**
 * Configuração do tema
 */
function vantil_luz_setup() {

    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 220,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support('custom-logo');

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    register_nav_menus(array(
        'primary' => __('Menu Principal', 'vantil-luz'),
    ));


}

add_action('after_setup_theme', 'vantil_luz_setup');

function vantil_luz_get_home_field($field, $fallback = '') {
    $post_id = get_the_ID();

    if (!$post_id) {
        return $fallback;
    }

    if (function_exists('get_field')) {
        $value = get_field($field, $post_id);

        if ($value !== false && $value !== null && $value !== '') {
            return $value;
        }
    }

    $meta_value = get_post_meta($post_id, $field, true);

    return $meta_value !== '' ? $meta_value : $fallback;
}

function vantil_luz_register_home_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    $sections = array(
        'hero' => array(
            'label' => 'Hero',
            'fields' => array(
                array('name' => 'hero_subtitle', 'label' => 'Hero - subtítulo', 'type' => 'text', 'default_value' => 'Energia Solar para Residências e Empresas'),
                array('name' => 'hero_title', 'label' => 'Hero - título', 'type' => 'text', 'default_value' => 'Sua <span class="text-secondary">conta de luz</span> está cada vez <span class="text-secondary">mais barata</span>'),
                array('name' => 'hero_description', 'label' => 'Hero - descrição', 'type' => 'textarea', 'default_value' => 'Instale energia solar com quem entende. Projeto personalizado, instalação profissional e economia garantida por mais de 25 anos.'),
                array('name' => 'hero_primary_button_text', 'label' => 'Hero - botão principal', 'type' => 'text', 'default_value' => 'Quero economizar agora'),
                array('name' => 'hero_secondary_button_text', 'label' => 'Hero - botão secundário', 'type' => 'text', 'default_value' => 'Como funciona'),
                array('name' => 'hero_stat_1_number', 'label' => 'Hero - estatística 1 (número)', 'type' => 'text', 'default_value' => '+2.500'),
                array('name' => 'hero_stat_1_text', 'label' => 'Hero - estatística 1 (texto)', 'type' => 'text', 'default_value' => 'Projetos instalados'),
                array('name' => 'hero_stat_2_number', 'label' => 'Hero - estatística 2 (número)', 'type' => 'text', 'default_value' => '25 anos'),
                array('name' => 'hero_stat_2_text', 'label' => 'Hero - estatística 2 (texto)', 'type' => 'text', 'default_value' => 'Garantia dos painéis'),
                array('name' => 'hero_stat_3_number', 'label' => 'Hero - estatística 3 (número)', 'type' => 'text', 'default_value' => '95%'),
                array('name' => 'hero_stat_3_text', 'label' => 'Hero - estatística 3 (texto)', 'type' => 'text', 'default_value' => 'Economia na conta de energia'),
            ),
        ),
        'benefits' => array(
            'label' => 'Benefícios',
            'fields' => array(
                array('name' => 'benefits_title', 'label' => 'Benefícios - título', 'type' => 'text', 'default_value' => 'Pare de pagar caro pela energia elétrica'),
                array('name' => 'benefits_description', 'label' => 'Benefícios - descrição', 'type' => 'textarea', 'default_value' => 'Descubra como a energia solar pode reduzir seus custos, valorizar seu imóvel e trazer mais segurança para o seu futuro.'),
                array('name' => 'benefit_1_title', 'label' => 'Benefício 1 - título', 'type' => 'text', 'default_value' => 'Economia imediata'),
                array('name' => 'benefit_1_text', 'label' => 'Benefício 1 - texto', 'type' => 'textarea', 'default_value' => 'Reduza significativamente sua conta de energia e tenha retorno do investimento em poucos anos.'),
                array('name' => 'benefit_2_title', 'label' => 'Benefício 2 - título', 'type' => 'text', 'default_value' => 'Valorização do imóvel'),
                array('name' => 'benefit_2_text', 'label' => 'Benefício 2 - texto', 'type' => 'textarea', 'default_value' => 'Um sistema fotovoltaico aumenta o valor de mercado da sua residência ou empresa.'),
                array('name' => 'benefit_3_title', 'label' => 'Benefício 3 - título', 'type' => 'text', 'default_value' => 'Sustentabilidade'),
                array('name' => 'benefit_3_text', 'label' => 'Benefício 3 - texto', 'type' => 'textarea', 'default_value' => 'Produza energia limpa, reduza a emissão de CO₂ e contribua para um futuro mais sustentável.'),
                array('name' => 'benefit_4_title', 'label' => 'Benefício 4 - título', 'type' => 'text', 'default_value' => 'Baixa manutenção'),
                array('name' => 'benefit_4_text', 'label' => 'Benefício 4 - texto', 'type' => 'textarea', 'default_value' => 'Os painéis solares possuem longa vida útil e exigem pouca manutenção ao longo dos anos.'),
            ),
        ),
        'how' => array(
            'label' => 'Como funciona',
            'fields' => array(
                array('name' => 'how_image', 'label' => 'Como funciona - imagem', 'type' => 'image', 'return_format' => 'array'),
                array('name' => 'how_badge_number', 'label' => 'Como funciona - número do badge', 'type' => 'text', 'default_value' => '+50.000 kWh'),
                array('name' => 'how_badge_text', 'label' => 'Como funciona - texto do badge', 'type' => 'text', 'default_value' => 'gerados por nossos clientes'),
                array('name' => 'how_title', 'label' => 'Como funciona - título', 'type' => 'text', 'default_value' => 'Você continua usando energia normalmente. A diferença é que começa a pagar muito menos.'),
                array('name' => 'how_description', 'label' => 'Como funciona - descrição', 'type' => 'textarea', 'default_value' => 'Nós cuidamos de todo o processo, desde o projeto até a homologação junto à concessionária.'),
                array('name' => 'step_1_title', 'label' => 'Passo 1 - título', 'type' => 'text', 'default_value' => 'Solicitação de orçamento'),
                array('name' => 'step_1_text', 'label' => 'Passo 1 - texto', 'type' => 'textarea', 'default_value' => 'Analisamos seu consumo de energia e identificamos a melhor solução para seu imóvel.'),
                array('name' => 'step_2_title', 'label' => 'Passo 2 - título', 'type' => 'text', 'default_value' => 'Projeto e instalação'),
                array('name' => 'step_2_text', 'label' => 'Passo 2 - texto', 'type' => 'textarea', 'default_value' => 'Nossa equipe realiza o projeto completo e instala seu sistema fotovoltaico.'),
                array('name' => 'step_3_title', 'label' => 'Passo 3 - título', 'type' => 'text', 'default_value' => 'Economia garantida'),
                array('name' => 'step_3_text', 'label' => 'Passo 3 - texto', 'type' => 'textarea', 'default_value' => 'Após a homologação, você começa a gerar sua própria energia.'),
            ),
        ),
        'services' => array(
            'label' => 'Serviços',
            'fields' => array(
                array('name' => 'services_title', 'label' => 'Serviços - título', 'type' => 'text', 'default_value' => 'Soluções completas para quem quer economizar energia'),
                array('name' => 'services_description', 'label' => 'Serviços - descrição', 'type' => 'textarea', 'default_value' => 'Atendemos desde residências até grandes empresas, oferecendo projetos personalizados para cada necessidade.'),
                array('name' => 'service_1_title', 'label' => 'Serviço 1 - título', 'type' => 'text', 'default_value' => 'Energia Solar Residencial'),
                array('name' => 'service_1_text', 'label' => 'Serviço 1 - texto', 'type' => 'textarea', 'default_value' => 'Reduza sua conta de energia e gere sua própria eletricidade com um sistema personalizado.'),
                array('name' => 'service_2_title', 'label' => 'Serviço 2 - título', 'type' => 'text', 'default_value' => 'Energia Solar Comercial'),
                array('name' => 'service_2_text', 'label' => 'Serviço 2 - texto', 'type' => 'textarea', 'default_value' => 'Soluções para empresas que desejam reduzir custos operacionais.'),
                array('name' => 'service_3_title', 'label' => 'Serviço 3 - título', 'type' => 'text', 'default_value' => 'Projetos Fotovoltaicos'),
                array('name' => 'service_3_text', 'label' => 'Serviço 3 - texto', 'type' => 'textarea', 'default_value' => 'Projetos completos desenvolvidos de acordo com sua necessidade.'),
                array('name' => 'service_4_title', 'label' => 'Serviço 4 - título', 'type' => 'text', 'default_value' => 'Manutenção Solar'),
                array('name' => 'service_4_text', 'label' => 'Serviço 4 - texto', 'type' => 'textarea', 'default_value' => 'Garantimos o melhor desempenho e vida útil do seu sistema.'),
            ),
        ),
        'testimonials' => array(
            'label' => 'Depoimentos',
            'fields' => array(
                array('name' => 'testimonials_title', 'label' => 'Depoimentos - título', 'type' => 'text', 'default_value' => 'Veja o que nossos clientes dizem depois de instalar energia solar.'),
                array('name' => 'testimonial_1_name', 'label' => 'Depoimento 1 - nome', 'type' => 'text', 'default_value' => 'João Silva'),
                array('name' => 'testimonial_1_role', 'label' => 'Depoimento 1 - função', 'type' => 'text', 'default_value' => 'Cliente residencial'),
                array('name' => 'testimonial_1_text', 'label' => 'Depoimento 1 - texto', 'type' => 'textarea', 'default_value' => 'Excelente atendimento e economia desde o primeiro mês. O sistema solar superou nossas expectativas.'),
                array('name' => 'testimonial_2_name', 'label' => 'Depoimento 2 - nome', 'type' => 'text', 'default_value' => 'Maria Oliveira'),
                array('name' => 'testimonial_2_role', 'label' => 'Depoimento 2 - função', 'type' => 'text', 'default_value' => 'Empresária'),
                array('name' => 'testimonial_2_text', 'label' => 'Depoimento 2 - texto', 'type' => 'textarea', 'default_value' => 'A instalação foi rápida e profissional. Hoje temos uma grande redução na conta de energia.'),
                array('name' => 'testimonial_3_name', 'label' => 'Depoimento 3 - nome', 'type' => 'text', 'default_value' => 'Pedro Santos'),
                array('name' => 'testimonial_3_role', 'label' => 'Depoimento 3 - função', 'type' => 'text', 'default_value' => 'Cliente comercial'),
                array('name' => 'testimonial_3_text', 'label' => 'Depoimento 3 - texto', 'type' => 'textarea', 'default_value' => 'Equipe muito competente. Todo o processo foi explicado de forma clara e transparente.'),
            ),
        ),
        'faq' => array(
            'label' => 'FAQ',
            'fields' => array(
                array('name' => 'faq_image', 'label' => 'FAQ - imagem', 'type' => 'image', 'return_format' => 'array'),
                array('name' => 'faq_badge_title', 'label' => 'FAQ - título do badge', 'type' => 'text', 'default_value' => 'Atendimento especializado'),
                array('name' => 'faq_badge_text', 'label' => 'FAQ - texto do badge', 'type' => 'text', 'default_value' => 'Garantia dos equipamentos'),
                array('name' => 'faq_title', 'label' => 'FAQ - título', 'type' => 'text', 'default_value' => 'Ainda tem dúvidas?'),
                array('name' => 'faq_description', 'label' => 'FAQ - descrição', 'type' => 'textarea', 'default_value' => 'Respondemos as perguntas mais comuns para que você tome sua decisão com total segurança.'),
                array('name' => 'faq_1_question', 'label' => 'FAQ 1 - pergunta', 'type' => 'text', 'default_value' => 'Quanto posso economizar na conta de energia?'),
                array('name' => 'faq_1_answer', 'label' => 'FAQ 1 - resposta', 'type' => 'textarea', 'default_value' => 'A economia pode chegar a até 95%, dependendo do seu consumo e do sistema instalado.'),
                array('name' => 'faq_2_question', 'label' => 'FAQ 2 - pergunta', 'type' => 'text', 'default_value' => 'Quanto tempo dura um sistema fotovoltaico?'),
                array('name' => 'faq_2_answer', 'label' => 'FAQ 2 - resposta', 'type' => 'textarea', 'default_value' => 'Os painéis solares possuem vida útil superior a 25 anos, com baixa necessidade de manutenção.'),
                array('name' => 'faq_3_question', 'label' => 'FAQ 3 - pergunta', 'type' => 'text', 'default_value' => 'Funciona em dias nublados?'),
                array('name' => 'faq_3_answer', 'label' => 'FAQ 3 - resposta', 'type' => 'textarea', 'default_value' => 'Sim. Mesmo em dias nublados os painéis continuam gerando energia, apenas com menor eficiência.'),
                array('name' => 'faq_4_question', 'label' => 'FAQ 4 - pergunta', 'type' => 'text', 'default_value' => 'Existe garantia?'),
                array('name' => 'faq_4_answer', 'label' => 'FAQ 4 - resposta', 'type' => 'textarea', 'default_value' => 'Sim. Trabalhamos com equipamentos certificados e garantia de fabricação.'),
            ),
        ),
        'contact' => array(
            'label' => 'Contato',
            'fields' => array(
                array('name' => 'contact_title', 'label' => 'Contato - título', 'type' => 'text', 'default_value' => 'Descubra quanto você pode economizar na sua conta de luz.'),
                array('name' => 'contact_description', 'label' => 'Contato - descrição', 'type' => 'textarea', 'default_value' => 'Nossa equipe fará uma análise gratuita do seu consumo de energia e apresentará um projeto personalizado para o seu imóvel. Sem compromisso, sem custos e com uma simulação real da economia que você pode alcançar.'),
                array('name' => 'contact_benefit_1', 'label' => 'Contato - benefício 1', 'type' => 'text', 'default_value' => 'Análise gratuita da sua conta de energia'),
                array('name' => 'contact_benefit_2', 'label' => 'Contato - benefício 2', 'type' => 'text', 'default_value' => 'Projeto personalizado para sua residência ou empresa'),
                array('name' => 'contact_benefit_3', 'label' => 'Contato - benefício 3', 'type' => 'text', 'default_value' => 'Simulação detalhada da economia mês a mês'),
                array('name' => 'contact_benefit_4', 'label' => 'Contato - benefício 4', 'type' => 'text', 'default_value' => 'Opções de financiamento facilitado'),
                array('name' => 'contact_form_title', 'label' => 'Contato - título do formulário', 'type' => 'text', 'default_value' => 'Solicite uma análise gratuita'),
                array('name' => 'contact_form_description', 'label' => 'Contato - descrição do formulário', 'type' => 'textarea', 'default_value' => 'Preencha seus dados e nossa equipe entrará em contato em até <strong>24 horas</strong>.'),
            ),
        ),
    );

    $fields = array();

    foreach ($sections as $section_key => $section) {
        $fields[] = array(
            'key' => 'field_' . $section_key . '_tab',
            'label' => $section['label'],
            'name' => '',
            'type' => 'tab',
            'placement' => 'top',
        );

        foreach ($section['fields'] as $field_definition) {
            $field = array(
                'key' => 'field_' . $field_definition['name'],
                'label' => $field_definition['label'],
                'name' => $field_definition['name'],
                'type' => $field_definition['type'],
            );

            if (isset($field_definition['default_value']) && !in_array($field_definition['type'], array('image', 'file', 'gallery'), true)) {
                $field['default_value'] = $field_definition['default_value'];
            }

            if (isset($field_definition['return_format'])) {
                $field['return_format'] = $field_definition['return_format'];
            }

            $fields[] = $field;
        }
    }

    acf_add_local_field_group(array(
        'key' => 'group_vantil_luz_homepage',
        'title' => 'Conteúdo da página inicial',
        'fields' => $fields,
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
        'show_in_rest' => 0,
    ));
}
add_action('acf/init', 'vantil_luz_register_home_acf_fields');

/**
 * Carregar CSS e JS
 */
function vantil_luz_assets() {

    $version = wp_get_theme()->get('Version');

    $styles = [
        'global',
        'header',
        'hero',
        'about',
        'benefits',
        'how it works',
        'services',
        'testimonials',
        'faq',
        'cta',
        'contact',
        'footer',
    ];
     foreach ($styles as $style) {
        wp_enqueue_style(
            "vantil-{$style}",
            get_template_directory_uri() . "/assets/css/{$style}.css",
            [],
            $version
        );
    }

    wp_enqueue_style(
        'vantil-style',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        $version,
        true
    );

    wp_enqueue_script(
        'vantil-main',
        get_template_directory_uri() . '/assets/js/main.js',
       [],
        $version,
        true
    );

    wp_enqueue_style(
    'aos',
    'https://unpkg.com/aos@2.3.1/dist/aos.css',
    [],
    '2.3.4'
    );

    wp_enqueue_script(
        'aos',
        'https://unpkg.com/aos@2.3.1/dist/aos.js',
        [],
        '2.3.4',
        true
    );
}

add_action('wp_enqueue_scripts', 'vantil_luz_assets');