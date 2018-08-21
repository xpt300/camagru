window.addEventListener("load", function() {
var reload_element = document.querySelector('#reload');

if(reload_element){
  reload_element.addEventListener('click',function(){
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "./controleur/reload_page.php");
        //Ajout des paramètres sous forme de champs cachés
        var champCache = document.createElement("input");
        champCache.setAttribute("type","hidden");
        champCache.setAttribute("name", "import");
        champCache.setAttribute("value", 0);
        form.appendChild(champCache);
        //Ajout du formulaire à la page et soumission du formulaire
        document.body.appendChild(form);
        form.submit();
        });
}
})
