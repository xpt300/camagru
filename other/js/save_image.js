window.addEventListener("load", function() {
var element_save = document.querySelector('#save');

if(element_save){
  element_save.addEventListener('click',function(){
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "./controleur/envoi_canvas.php");
    //Ajout des paramètres sous forme de champs cachés
    var champCache = document.createElement("input");
    if (document.getElementById("canvas").src){
        var key = document.getElementById("canvas").src;
        champCache.setAttribute("type","hidden");
        champCache.setAttribute("name", "src");
        champCache.setAttribute("value", "1");
        form.appendChild(champCache);
    }
    else {
        var key = document.getElementById("canvas").toDataURL();
    }
    var champCache = document.createElement("input");
    champCache.setAttribute("type","hidden");
    champCache.setAttribute("name", "image");
    champCache.setAttribute("value", key);
    form.appendChild(champCache);
    for(var i = 1; i < 7; i++) {
        var filter_can = "filter_can" + i;
        var filter = "filter" + i;
        var data_json = sessionStorage.getItem(filter);
        var data = JSON.parse(data_json);
        if (data != null && data.actif == 1){
            var name = document.getElementById(filter).src;
            var key = name + ";" + data.filter_x + ";" + data.filter_y + ";" + data.img_x + ";" + data.img_y + ";" + data.filter_w + ";" + data.filter_h;
            var champCache = document.createElement("input");
            champCache.setAttribute("type","hidden");
            champCache.setAttribute("name", filter);
            champCache.setAttribute("value", key);
            form.appendChild(champCache);
        }
    }
    //Ajout du formulaire à la page et soumission du formulaire
    document.body.appendChild(form);
    form.submit();
    });
}
})
