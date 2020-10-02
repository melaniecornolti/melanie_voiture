<?php

/**C'est un template 
TEMPLATE NAME: voiture*/

get_header();

// $args = array(
//     'date_query' => array(
//         array(
//             'after'     => '1949',
//             'before'    => array(
//                 'year'  => 2021,
//                 'month' => 12,
//                 'day'   => 31,
//             ),
//             'inclusive' => true,
//         ),
//     ),
// );
// $query = new WP_Query( $args );

$args = array(
    'post_type' => 'voiture'
    // 'meta_key' => 'cylindree', // nom du champ personnalisé
    // 'meta_value_num' => 500, // ou meta_value pour tester un texte
    // 'meta_compare' => '>' // < > != >= <=
);
$query = new WP_Query( $args );

// print_r($query);

?>

<div class="voitures">
    
    <?php while ($query->have_posts()) : $query->the_post();?>
    <article class="voiture">
        <?php the_post_thumbnail( 'thumbnail' ); ?>
        <h1 class="title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h1>
        <div class="content">
            <?php the_content(); ?>
        </div>
        <div class="caracteristiques">
            <p>Couleur : <?php the_field( 'couleur' ); ?> • Cylindrée en cm3 : <?php the_field( 'cylindree' ); ?> • Poids : <?php the_field( 'poids' ); ?></p>
        </div>
        <div>
            <?php the_terms( $post->ID, 'marque', 'Marque : ' ); ?>
        </div>

    </article>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>



