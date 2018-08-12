var element_save = document.querySelector('#save');

if(element_save){
  element_save.addEventListener('click',function(){
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "./controleur/envoi_canvas.php");
    //Ajout des paramètres sous forme de champs cachés
    var champCache = document.createElement("input");
    var key = document.getElementById("canvas").toDataURL();
    champCache.setAttribute("type","hidden");
    champCache.setAttribute("name", "image");
    champCache.setAttribute("value", key);
    form.appendChild(champCache);
    //Ajout du formulaire à la page et soumission du formulaire
    document.body.appendChild(form);
    form.submit();
    });
}
