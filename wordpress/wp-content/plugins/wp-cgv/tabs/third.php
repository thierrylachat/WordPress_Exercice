<div class="container">
    
    <part v-for="(part, index) in parts" ref="part" :name="part.name" :key="part.id" 
          :id="part.id" 
          :original-text="part.text" 
          :exp="part.exp" 
          :fields="fields"  
          :tags="tags" 
          :current-text="part.currentText" 
          :edit-string="strings.edit" 
          :saved-string="strings.saved" 
          :exp-string="strings.exp" 
          :edit-title="strings.edit_title" 
          :first="index == 0" 
          :last="index == parts.length - 1" 
          :ajax="doing_ajax" 
          :spinner-url="spinnerUrl" 
          @textupdated="partUpdated" 
          @cachedtextupdated="cachedPartUpdated"
          @nameupdated="nameUpdated">
    </part>
        
</div>