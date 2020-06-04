var $ = jQuery.noConflict();

var bus = new Vue();

Vue.component('tabs', {
    template: `
    <div>
        <div class="nav-tab-wrapper hide-if-no-js">
            <a v-for="tab in tabs" class="nav-tab" :class="{ 'nav-tab-active' : tab.isActive }" @click="selectTab(tab)" href="javascript:void(0);">{{ tab.name }}</a>
        </div>
        <div class="tabs" style="padding-top: 1rem;">
            <slot></slot>
        </div>
    </div>
    `,
    data: function() {
        return {
            tabs: []
        }
    },
    created: function() {
        this.tabs = this.$children;
    },
    mounted: function() {
        this.$emit( 'currentTab', 0 );
    },
    methods: {
        selectTab: function( selectedTab ) {
            var self = this;
            bus.$emit( 'off_edit' );
            this.tabs.forEach( function( tab, index ) {
                tab.isActive = ( tab.name == selectedTab.name );
                if ( tab.name == selectedTab.name ) bus.$emit( 'tab_changed', index );
            });
        }
    }
});
   
Vue.component('tab', {
    template: '<div v-show="isActive"><slot></slot></div>',
    props: {
        name: { reguired: true },
        selected: { default: false }
    },
    data: function() {
        return {
            isActive: false
        }
    },
    mounted: function() {
        this.isActive = this.selected;
    }
});         
       
Vue.component('part', {
    template: `
        <div class="part">
            <div class="part-header"><div class="editable-title" :contenteditable="editName" :class="editName ? 'active' : ''" style="display:inline" v-html="name" @input="inputTitle($event.target.innerHTML)" @keydown="keyDown"></div> <a :class="editName ? 'icon-check' : 'icon-edit'" href="javascript:void(0);" :title="editTitle" @click="editTheName"></a>
            </div>
            <editable ref="editable" @focused="focus" @blured="blur" @newtext="input" :content="currentText" :edit="edit"></editable>
            <div class="part-footer">
                <a v-if="exp" class="desc" data-fancybox :data-src="'#' + expID" href="javascript:void(0);">{{ expString }}</a>
                <a class="edit" href="javascript:void(0);" @click="editText"><img v-if="ajax && saving" style="position:relative;top:5px;right:5px" :src="spinnerUrl">{{ textLink }}</a>
                <div class="clear"></div>
            </div>
            <div v-if="exp" :id="expID" style="display:none">{{ exp }}</div>
        </div>
    `,
    props: {
        id: { reguired: true },
        name: { reguired: true },
        originalText: String,
        exp: String,
        fields: { type: Array, default: function () { return [] } },
        tags: { type: Array, default: function () { return [] } },
        editString: String,
        savedString: String,
        expString: String,
        editTitle: String,
        spinnerUrl: String,
        currentText: String,
        ajax: Boolean,
        first: { type: Boolean, default: false },
        last: { type: Boolean, default: false }
    },
    data: function() {
        return {
            text: '',
            cachedText: '',
            title: '',
            cachedTitle: '',
            cachedParts: [],
            edit: false,
            editName: false,
            saving: false,
            textLink: this.editString,
        }
    },
    computed: {
        expID: function() {
            return this.name.replace(/\s/g, '_').toLowerCase();
        },
    },
    watch: {
        text: function( val ) {
            var save = this.saving ? true : false; 
            this.$emit( 'textupdated', { 'id' : this.id, 'text' : val, 'save' : save } );
        },
        cachedText: function( val ) {
             this.$emit( 'cachedtextupdated', { 'id' : this.id, 'text' : val } );           
        },
        title: function( val ) {
            this.$emit( 'nameupdated', { 'id' : this.id, 'text' : val } );
        },
        ajax: function( val ) {
            var self = this;
            if ( ! val ) {
                if ( this.saving ) {
                    this.textLink = this.savedString;
                    setTimeout(function() {
                        self.textLink = self.editString;
                    }, 1000 );
                }
                this.saving = false;
            }
        }
    },
    mounted: function() {
        var self = this;
        
        this.cachedTitle = this.name;
        // Cache original text
        this.text = this.originalText;
        this.cachedText = this.originalText;
        
        // Register Events
        this.fields.forEach(function( field ) {
            bus.$on(field + '_update', function( data ) {
                self.recieveEvent( data );
            });
        });
        
        // Init cached parts
        this.tags.forEach(function( tag ) {
            self.cachedParts.push( { 'data' : tag, 'tag' : tag } );
        });
        
        bus.$on('off_edit', function( id ) {
            self.offEdit( id );
        });
    },
    methods: {
        recieveEvent: function( data ) {
            var newData = null;
            for ( var i = 0; i < this.tags.length; i++ ) {
                if ( this.tags[i] == data[1] ) newData = { 'data' : data[0], 'tag' : data[1] } ;   
            }
            if ( this.cachedParts.length ) {
                for ( var i = 0; i < this.cachedParts.length; i++ ) {
                    if ( this.cachedParts[i].tag == data[1] ) {
                        //data[0] ? this.cachedParts[i].data = data[0] : this.cachedParts[i].data = data[1];
                        this.cachedParts[i].data = data[0];
                    }
                }
            }
            if ( newData ) this.changeCachedTags();
        },
        changeTag: function( data ) {
            if ( data.length > 0 ) {
                this.text = this.cachedText;
                for ( var i = 0; i < data.length; i++ ) {
                    if ( data[i].length > 0 ) {
                        var re = new RegExp(this.tags[i],"g");
                        this.text= this.text.replace( re, data[i] ); 
                    }
                }
            }
        },
        changeCachedTags: function() {
            var cache = this.cachedText;
            for ( var i = 0; i < this.tags.length; i++ ) {
                for ( var j = 0; j < this.cachedParts.length; j++ ) {
                    if ( this.tags[i] == this.cachedParts[j].tag ) {
                        var re = new RegExp(this.tags[i],"g");
                        cache = cache.replace( re, this.cachedParts[j].data );
                    }
                }
            }
            this.text = cache;
        },
        editText: function() {
            if ( ! this.ajax ) {
                bus.$emit( 'off_edit', this.id ); // All other
                this.edit = ! this.edit;
                if ( this.edit ) {
                    this.focus();
                } else {
                    this.saving = true;
                    this.blur();
                }
            }
        },
        editTheName: function() {
            if ( this.editName && this.cachedTitle != '' ) {
                this.title = this.cachedTitle;
            }
            this.editName = ! this.editName;
        },
        inputTitle: function( data ) {
            this.cachedTitle = data;
        },
        input: function( data ) {
            this.cachedText = data;
        },
        focus: function() {
            var newTags = [];
            for ( var i = 0; i < this.tags.length; i++ ) {
                newTags.push( '<span>' + this.tags[i] + '</span>' );
            }
            this.changeTag( newTags );
        },
        blur: function() {
            this.cachedText = this.cachedText.replace( /<\/?span[^>]*>/g, '' );
            this.changeCachedTags();
        },
        keyDown: function(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                this.editTheName();
                return false;
            }
        },
        offEdit: function( id ) {
            if ( this.edit && this.id != id ) this.editText();
        }
    }
});   

Vue.component('editable', {
    template: `<div class="editable" :contenteditable="edit" :class="edit ? 'active' : ''" @input="$emit('newtext', $event.target.innerHTML)" @keydown="keyDown"></div>`,
    props: ['content','edit'],
    mounted: function () {
        var self = this;
        this.$el.innerHTML = this.content;
        bus.$on('toggle_edit', function() {
            self.editalbe = ! self.editable;
        });        
    },
    watch: {
        content: function () {
            this.$el.innerHTML = this.content;
        }
    },
    methods: {
        keyDown: function(e) {
            if (e.keyCode === 13) {
                document.execCommand('insertHTML', false, '<br>');
                return false;
            }
        }
    }
});

var app = new Vue({
	el: '#wp-cgv',
	data: {
    	currentTab: 0,
    	doing_ajax: false,
    	doing_ajax_top: false,
    	urlOptions: wp_cgv.urls,
    	spinnerUrl: wp_cgv.spinnerUrl,
    	type: '',
    	url: wp_cgv.urls[0].value,
        description: wp_cgv.fields.description,
    	company_name: wp_cgv.fields.company_name,
    	capital: wp_cgv.fields.capital,
    	address: wp_cgv.fields.address,
    	postal: wp_cgv.fields.postal,
    	city: wp_cgv.fields.city,
    	siret: wp_cgv.fields.siret,
    	branch: wp_cgv.fields.branch,
    	kind: wp_cgv.fields.kind,
    	email: wp_cgv.fields.email,
    	phone: wp_cgv.fields.phone,
    	result: '',
    	site: wp_cgv.site,
    	parts: wp_cgv.parts,
    	strings: wp_cgv.strings,
    	page_exists: wp_cgv.page,
    	fields: ['company_name','address','capital','postal','city','siret','branch','kind','description','url','email','phone','site'],
    	tags: ['__ENTREPRISE__','__CAPITAL_SOCIAL__','__ADRESSE__','__POSTAL__','__VILLE__','__SIRET__','__REPRESENTANT__','__FONCTION__','__SERVICES_PRODUIT_VENDUS__','__SITE_WEB_LEGAL_URL__','__EMAIL__','__TELEPHONE__','__SITE_WEB__']
	},
	mounted: function() {
    	var self = this;
        this.emitEvent( 'url_update' , [this.url, '__SITE_WEB_LEGAL_URL__'] );	
        this.emitEvent( 'site_update' , [this.site, '__SITE_WEB__'] );
        this.emitEvent( 'company_name_update' , [this.company_name, '__ENTREPRISE__'] );
        this.emitEvent( 'address_update' , [this.address, '__ADRESSE__'] );
        this.emitEvent( 'capital_update' , [this.capital, '__CAPITAL_SOCIAL__'] );
        this.emitEvent( 'postal_update' , [this.capital, '__POSTAL__'] );
        this.emitEvent( 'city_update' , [this.city, '__VILLE__'] );
        this.emitEvent( 'siret_update' , [this.siret, '__SIRET__'] );
        this.emitEvent( 'branch_update' , [this.branch, '__REPRESENTANT__'] );
        this.emitEvent( 'kind_update' , [this.kind, '__FONCTION__'] );
        this.emitEvent( 'description_update' , [this.description, '__SERVICES_PRODUIT_VENDUS__'] );
        this.emitEvent( 'email_update' , [this.email, '__EMAIL__'] );
        this.emitEvent( 'phone_update' , [this.phone, '__TELEPHONE__'] );
        bus.$on('tab_changed', function( index ) {
            self.currentTab = index;
        });
        bus.$on('save', function() {
            self.generate( false );
        });
	},
	watch: {
        company_name: function( val ) {
            this.emitEvent( 'company_name_update' , [val, '__ENTREPRISE__'] );
        },
        address: function( val ) {
            this.emitEvent( 'address_update' , [val, '__ADRESSE__'] );
        },
        capital: function( val ) {
            this.emitEvent( 'capital_update' , [val, '__CAPITAL_SOCIAL__'] );
        },
        postal: function( val ) {
            this.emitEvent( 'postal_update' , [val, '__POSTAL__'] );
        },
        city: function( val ) {
            this.emitEvent( 'city_update' , [val, '__VILLE__'] );
        },
        siret: function( val ) {
            this.emitEvent( 'siret_update' , [val, '__SIRET__'] );
        },
        branch: function( val ) {
            this.emitEvent( 'branch_update' , [val, '__REPRESENTANT__'] );
        },
        kind: function( val ) {
            this.emitEvent( 'kind_update' , [val, '__FONCTION__'] );
        },
        description: function( val ) {
            this.emitEvent( 'description_update' , [val, '__SERVICES_PRODUIT_VENDUS__'] );
        },
        url: function( val ) {
            this.emitEvent( 'url_update' , [val, '__SITE_WEB_LEGAL_URL__'] );
        },
        email: function( val ) {
            this.emitEvent( 'email_update' , [val, '__EMAIL__'] );
        },
        phone: function( val ) {
            this.emitEvent( 'phone_update' , [val, '__TELEPHONE__'] );
        }
	},
    methods: {
        emitEvent: function( name ,payload ) {
            bus.$emit( name, payload );
        },
        preview: function() {
            var self = this;
            if ( ! this.doing_ajax_top ) {
                this.doing_ajax_top = true;
                this.offEdit();
                setTimeout(function() {
                    self.buildPreview();
                    self.openFancybox();    
                }, 200);
            }
        },
        buildPreview: function() {
            var result = this.strings.intro;
            for ( var i = 0; i < this.parts.length; i++ ) {
                var tag = 'h3';
                result += '<' + tag + '>';
                result += this.parts[i].name;
                result += '</' + tag + '>';
                result += this.parts[i].currentText;
            }
            this.result = result;
        },
        partUpdated: function( data ) {
            for ( var i = 0; i < this.parts.length; i++ ) {
                if ( this.parts[i].id == data.id ) this.parts[i].currentText = data.text;
            }
            if ( data.save ) this.generate();
        },
        cachedPartUpdated: function( data ) {
            for ( var i = 0; i < this.parts.length; i++ ) {
                if ( this.parts[i].id == data.id ) this.parts[i].currentCachedText = data.text;
            }
        },
        nameUpdated: function( data ) {
            for ( var i = 0; i < this.parts.length; i++ ) {
                if ( this.parts[i].id == data.id ) this.parts[i].name = data.text;
            }
        },
        generate: function( once ) {
            var self = this;
            if ( ! this.doing_ajax ) {
                this.doing_ajax = true;
                this.buildPreview(); 
                this.save();
    		}
        },
        reset: function() {
            var self = this;
            if ( ! this.doing_ajax_top ) {
                this.doing_ajax_top = true;

                var data = { 
                    action: 'reset_page'
                };
                
        		var success = function( returnedData ) {
        			self.doing_ajax_top = false;
        			location.reload();
        		}
        		AjaxOptions( data, success );        
            }     
        },
        save: function() {
            var self = this;
            var fields = {};
            
            for ( var i = 0; i < this.fields.length; i++ ) {                
                fields[this.fields[i]] = self[this.fields[i]];
            }
            
            var parts = [];
            
            for ( var i = 0; i < this.parts.length; i++ ) {
                var part = Object.assign({}, this.parts[i]);
                part.text = part.currentCachedText.replace( /<\/?span[^>]*>/g, '' );
                part.currentText = '';
                part.currentCachedText = '';
                parts.push( part );
            }
                                                
            var data = { 
                action: 'generate_page', 
                data: this.result, 
                fields: JSON.stringify( fields ), 
                parts: JSON.stringify( parts ) 
            };
            
    		var success = function( returnedData ) {
    			self.doing_ajax = false;
    			if ( returnedData ) self.page_exists = returnedData;
    		}
    		AjaxOptions( data, success );  
        },
        offEdit: function() {
            bus.$emit( 'off_edit' );
        },
        openFancybox: function() {
            var self = this;
            $.fancybox.open({
            	src  : '#wp-cgv-result',
            	type : 'inline',
            	opts : {
            		afterShow : function( instance, current ) {
            			self.doing_ajax_top = false;
            		}
            	}
            });
        }
    }
});

function AjaxOptions( ajaxData, successCallback ) {
	
	ajaxData.security = wp_cgv.ajaxnonce;
	
	jQuery.ajax({
		url: wp_cgv.ajaxurl,
		type: 'POST',
		cache: true,
        timeout: 8000,
		data: ajaxData,
		success: function( returnedData ) {
			if (successCallback) successCallback( returnedData );
		}
	});
}

function generateID() {
    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
    var string_length = 13;
    var randomstring = '';

    for (var x=0;x<string_length;x++) {

        var letterOrNumber = Math.floor(Math.random() * 2);
        if (letterOrNumber == 0) {
            var newNum = Math.floor(Math.random() * 9);
            randomstring += newNum;
        } else {
            var rnum = Math.floor(Math.random() * chars.length);
            randomstring += chars.substring(rnum,rnum+1);
        }

    }
    return randomstring;
}