window.addEventListener("load", function() {
var reload_element = document.querySelector('#reload');

if(reload_element){
  reload_element.addEventListener('click',function(){
    window.location.reload(false); 
    });
}
})
