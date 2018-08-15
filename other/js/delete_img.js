window.addEventListener("load", function() {


    document.getElementById("supp").addEventListener('click', function() {
        var form = document.createElement("form");
          form.setAttribute("method", "post");
          form.setAttribute("action", "./controleur/delete_img.php");
          //Ajout des paramètres sous forme de champs cachés
          var champCache = document.createElement("input");
          var key = sessionStorage.getItem("id");
          champCache.setAttribute("type","hidden");
          champCache.setAttribute("name", "image_del");
          champCache.setAttribute("value", key);
          form.appendChild(champCache);
          //Ajout du formulaire à la page et soumission du formulaire
          document.body.appendChild(form);
          form.submit();
        });
})
