<div class="container">
    
    <p class="label">
    <?php _e( 'Indiquez une description générale des produits que vous vendez (ex : « produits de beauté », « formations en ligne sur l’entreprenariat »)', 'wp-cgv' ); ?>
    </p>
    
    <textarea name="description" class="large-text code" rows="5" v-model="description"></textarea>
    
    <p class="label">La page de vos CGV</p>

    <select name="url" class="postform" v-model="url">
    	<option v-for="option in urlOptions" class="level-0" :value="option.value">{{ option.title }}</option>
    </select> 
</div>