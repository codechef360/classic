const { default: Axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#postAds',
    data(){
        return{
            title:'',
            description:'',
            categories:'',
            category:'',
            subcategories:'',
            subcategory:'',
            locations:'',
            district:'',
            price:2000,
            negotiable:false,
            condition:'',
            package:'',
            attachments:'',
        }
    },
    created(){
        this.initializeDefaults();
    },

    methods:{
         initializeDefaults(){
            Axios.post('/initialize-defaults')
            .then(response=>{
                this.categories = response.data.categories
            });
        },
        getSubCategories(){
            axios.post('/initialize-subcategories',{cat:this.category})
            .then(response=>{
                this.subcategories = response.data.subcategories
            });
        },
    },
});
