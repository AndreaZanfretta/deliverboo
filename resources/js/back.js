/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./parsley.min.js');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        productName: null,
    },
    methods:{
        openModal(e, name){
            e.preventDefault();
            console.log(name.name)
            this.productName = name.name;
            console.log(e.currentTarget)
            this.currentForm= e.currentTarget.parentNode;
            console.log(this.currentForm);
            $('#deleteModal').modal('show');
        },
        submitForm(){
            this.currentForm.submit();
        }
    }
});
window.deliverboo = {
        previewImage(){
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        }
};
