
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',    
    data: 
    {        
        group: null,
        id: null,
        showWindow: false,        
    },
    created: function () 
    {
        if(sessionStorage.getItem('activeTab') != null)
            document.getElementById(sessionStorage.getItem('activeTab')).className = "nav-link active";          
        else                       
            document.getElementById('generalSummary').className = 'nav-link active';
        console.log(sessionStorage.getItem('activeTab'));  
        
        this.group = document.getElementById('GRO').value;
    },
    methods: 
    {
        setActive: function(id)
        {
            document.getElementsByClassName('nav-link active')[0].className = "nav-link";
            document.getElementById(id).className = "nav-link active";
            sessionStorage.setItem('activeTab', id);
            
            console.log(sessionStorage.getItem('activeTab'));
        },
        swapShow: function(){
            if (!this.showWindow){
                this.showWindow = !this.showWindow;
                document.getElementsByClassName('inputPole')[0].style.display = 'block';
                document.getElementsByClassName('addBut')[0].style.display = 'none';
            }
            else{
                this.showWindow = !this.showWindow;
                document.getElementsByClassName('inputPole')[0].style.display = 'none';
                document.getElementsByClassName('addBut')[0].style.display = 'flex';
            }                    
        },
        transformReq: function(){
            document.getElementById('transform').action = '/rati/' + this.id;
        },
        resetReq: function(){
            document.getElementById('transform').action = '';
            this.id = null;
        },
        resetList: function(){
            this.group = document.getElementById('GRO').value;
        }
    }  
});




