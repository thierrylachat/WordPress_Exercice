<?php        
$parts = array();
    	        
$parts[] = array(
    'name' => __( 'DEFINITION DES PARTIES', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/DEFINITION-DES-PARTIES.html'),
//    'exp' => 'Test' /* Custom Explications */
);

$parts[] = array(
    'name' => __( 'PREAMBULE', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/PREAMBULE.html'),
);      

$parts[] = array(
    'name' => __( 'ARTICLE 1 - OBJET', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-1.html'),
);  

$parts[] = array(
    'name' => __( 'ARTICLE 2 - DISPOSITIONS  GENERALES', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-2.html'),
);   

$parts[] = array(
    'name' => __( 'ARTICLE 3 - PRIX', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-3.html'),
);  

$parts[] = array(
    'name' => __( 'ARTICLE 4 - CONCLUSION DU CONTRAT EN LIGNE', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-4.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 5 - PRODUITS ET SERVICES', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-5.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 6 - CLAUSE DE RESERVE DE PROPRIETE', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-6.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 7 - MODALITES DE LIVRAISON', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-7.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 8 - DISPONIBILITE ET PRESENTATION', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-8.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 9 - PAIMENT', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-9.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 10 - DELAI DE RETRACTATION', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-10.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 11 - GARANTIES', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-11.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 12 - RECLAMATIONS', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-12.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 13 - DROITS DE PROPRIETE INTELLECTUELLE', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-13.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 14 - FORCE MAJEURE', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-14.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 15 - NULLITE ET MODIFICATION DU CONTRAT', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-15.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 16 - RGPD ET PROTECTION DES DONNEES PERSONNELLES', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-16.html'),
);

$parts[] = array(
    'name' => __( 'ARTICLE 17 - DROIT APPLICABLE', 'wp-cgv' ),
    'text' => file_get_contents(WP_CGW_DIR . 'parts/ARTICLE-17.html'),
);

return $parts;
?>