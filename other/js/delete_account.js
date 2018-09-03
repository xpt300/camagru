window.addEventListener("load", function() {
    var deleteButtonsAccount = document.getElementById("supprime_account");
    deleteButtonsAccount.addEventListener('click', function() {
        event.preventDefault();
        var modal = document.querySelector('#modal_account');
        var html = document.querySelector('html');
        modal.classList.add('is-active');
        html.classList.add('is-clipped');

        modal.querySelector('#div_account').addEventListener('click', function(e) {
          e.preventDefault();
          modal.classList.remove('is-active');
          html.classList.remove('is-clipped');
        });
        modal.querySelector('#close_account').addEventListener('click', function(e) {
          e.preventDefault();
          modal.classList.remove('is-active');
          html.classList.remove('is-clipped');
        });
    document.getElementById("supp_account").addEventListener('click', function() {
        var form = document.createElement("form");
          form.setAttribute("method", "post");
          form.setAttribute("action", "./controleur/delete_account.php");
          //Ajout des paramètres sous forme de champs cachés
          var key = document.getElementById("supprime_account").name;
          var champCache = document.createElement("input");
          champCache.setAttribute("type","hidden");
          champCache.setAttribute("name", "user_del");
          champCache.setAttribute("value", key);
          form.appendChild(champCache);
          //Ajout du formulaire à la page et soumission du formulaire
          document.body.appendChild(form);
          form.submit();
        });
    });
});
