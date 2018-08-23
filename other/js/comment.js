window.addEventListener("load", function() {
    var commentButtons = document.getElementsByClassName("input");
    for (var i = 0; i < commentButtons.length; i++)
        commentButtons[i].addEventListener('click', function() {
            var comment = this.name;

            document.getElementById(comment).classList.remove('is-hidden');
        });
    var cancelButtons = document.getElementsByClassName("button is-text");
    for (var i = 0; i < cancelButtons.length; i++)
        cancelButtons[i].addEventListener('click', function() {
            document.getElementById("input").value = '';
            document.getElementById(this.parentNode.parentNode.id).classList.add('is-hidden');
        });
    var submitButtons = document.getElementsByClassName("button is-link");
    for (var i = 0; i < submitButtons.length; i++)
        submitButtons[i].addEventListener('click', function() {
            var key = document.getElementById("input").value;
            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "./controleur/add_comment.php");
            var champCache = document.createElement("input");
            champCache.setAttribute("type","hidden");
            champCache.setAttribute("name", "comment");
            champCache.setAttribute("value", key);
            form.appendChild(champCache);
            document.body.appendChild(form);
            form.submit();
            document.getElementById(this.parentNode.parentNode.id).classList.add('is-hidden');
            document.getElementById("input").value = '';
        });
});
