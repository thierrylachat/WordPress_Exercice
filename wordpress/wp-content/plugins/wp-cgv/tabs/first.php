<div class="container">
    
    <div class="row">
        
        <div class="col col-6">
            <label class="label" for="wp-cgv-company-name"><?php _e( 'Le nom de votre entreprise', 'wp-cgv' ); ?></label>
            <input name="company_name" id="wp-cgv-company-name" type="text" v-model="company_name" placeholder="<?php _e( 'Entrez le nom de votre entreprise', 'wp-cgv' ); ?>">
        </div>
        
        <div class="col col-3">
            <label class="label" for="wp-cgv-capital"><?php _e( 'Capital social', 'wp-cgv' ); ?></label>
            <input name="capital" id="wp-cgv-capital" type="text" v-model="capital" placeholder="<?php _e( 'Entrez le capital social', 'wp-cgv' ); ?>">
        </div>
        
    </div>
    
    <div class="row">
        
        <div class="col col-6">
            <label class="label" for="wp-cgv-address"><?php _e( 'L’adresse de votre entreprise', 'wp-cgv' ); ?></label>
            <input name="address" id="wp-cgv-address" type="text" v-model="address" placeholder="<?php _e( 'Entrez son adresse', 'wp-cgv' ); ?>">
        </div>
        
        <div class="col col-3">
            <label class="label" for="wp-cgv-postal"><?php _e( 'Code postal', 'wp-cgv' ); ?></label>
            <input name="postal" id="wp-cgv-postal" type="text" v-model="postal" placeholder="<?php _e( 'Entrez son code postal', 'wp-cgv' ); ?>">
        </div>
        
        <div class="col col-3">
            <label class="label" for="wp-cgv-city"><?php _e( 'Ville', 'wp-cgv' ); ?></label>
            <input name="city" id="wp-cgv-city" type="text" v-model="city" placeholder="<?php _e( 'Entrez sa ville', 'wp-cgv' ); ?>">
        </div>
        
    </div>
    
    <div class="row">
        
        <div class="col col-6">
            <label class="label" for="wp-cgv-siret"><?php _e( 'SIRET/SIREN', 'wp-cgv' ); ?></label>
            <input name="siret" id="wp-cgv-siret" type="text" v-model="siret" placeholder="<?php _e( 'Entrez son numéro SIREN/SIRET', 'wp-cgv' ); ?>">
        </div>
        
    </div>
    
    <div class="row">
        
        <div class="col col-6">
            <label class="label" for="wp-cgv-branch"><?php _e( 'Nom du représentant de l’entreprise', 'wp-cgv' ); ?></label>
            <input name="branch" id="wp-cgv-branch" type="text" v-model="branch" placeholder="<?php _e( 'Entrez le nom du représentant de l’entreprise', 'wp-cgv' ); ?>">
        </div>
        
        <div class="col col-6">
            <label class="label" for="wp-cgv-kind"><?php _e( 'Qualité du représentant (ex : gérant, président)', 'wp-cgv' ); ?></label>
            <input name="kind" id="wp-cgv-kind" type="text" v-model="kind" placeholder="<?php _e( 'La fonction du représentant de l’entreprise', 'wp-cgv' ); ?>">
        </div>
        
    </div>
    
    <div class="row">
        
        <div class="col col-6">
            <label class="label" for="wp-cgv-email"><?php _e( 'Point de contact email', 'wp-cgv' ); ?></label>
            <input name="email" id="wp-cgv-email" type="email" v-model="email" placeholder="<?php _e( 'Entrez l’email du point de contact', 'wp-cgv' ); ?>">
        </div>
        
        <div class="col col-6">
            <label class="label" for="wp-cgv-phone"><?php _e( 'Point de contact téléphonique ', 'wp-cgv' ); ?></label>
            <input name="phone" id="wp-cgv-phone" type="tel" v-model="phone" placeholder="<?php _e( 'Entrez un numéro de téléphone', 'wp-cgv' ); ?>">
        </div>
        
    </div>
    
</div>
