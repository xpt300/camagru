window.addEventListener("load", function() {
    var likeButtons = document.getElementsByClassName("far fa-heart");
    for (var i = 0; i < likeButtons.length; i++)
        likeButtons[i].addEventListener('click', function() {
          var str = this.attributes["name"].value;
          var res = str.split("-");
          var num = this.id.match(/[a-z]+|\d+/ig);
            $.post(
                'http://localhost:8080/camagru/controleur/add_like.php',
                {
                    name:res[0],
                    user:res[1]
                },
                function (returnData){
                    if (returnData == 'success'){
                        var like_on = "like_on_user" + num[3];
                        var like_off = "like_off_user" + num[3];
                        var display = document.getElementById(like_on).style.display;
                        if (display == 'none'){
                            var txt = "txt" + num[3];
                            var nb = document.getElementById(txt).innerHTML.match(/[a-z]+|\d+/ig);
                            var nb = parseInt(nb[0]) + 1;
                            document.getElementById(txt).innerHTML = nb + " J'aime";
                          document.getElementById(like_on).style.display='block';
                          document.getElementById(like_off).style.display='none';
                        }
                      }
                  else {
                    var modal = document.querySelector('#modal_like');
                    var html = document.querySelector('html');
                    modal.classList.add('is-active');
                    html.classList.add('is-clipped');

                    modal.querySelector('#div_like').addEventListener('click', function(e) {
                      e.preventDefault();
                      modal.classList.remove('is-active');
                      html.classList.remove('is-clipped');
                    });
                    modal.querySelector('#delete_like').addEventListener('click', function(e) {
                      e.preventDefault();
                      modal.classList.remove('is-active');
                      html.classList.remove('is-clipped');
                    });
                  }
                },
                'text'
              );
        });
        var likeButtonsOn = document.getElementsByClassName("fas fa-heart");
        for (var i = 0; i < likeButtonsOn.length; i++)
            likeButtonsOn[i].addEventListener('click', function() {
                var str = this.attributes["name"].value;
                var res = str.split("-");
                var num = this.id.match(/[a-z]+|\d+/ig);
                $.post(
                    'http://localhost:8080/camagru/controleur/delete_like.php',
                    {
                        name:res[0],
                        user:res[1]
                    },
                    function (returnData){
                        var txt = "txt" + num[3];
                        var nb = document.getElementById(txt).innerHTML.match(/[a-z]+|\d+/ig);
                        var nb = parseInt(nb[0]) - 1;
                        document.getElementById(txt).innerHTML = nb + " J'aime";
                        var like_on = "like_on_user" + num[3];
                        var like_off = "like_off_user" + num[3];
                        console.log(like_on);
                        var display = document.getElementById(like_on).style.display;
                        if (display == 'block'){
                            document.getElementById(like_on).style.display='none';
                            document.getElementById(like_off).style.display='block';
                        }
                    },
                    'text'
                  );
            });
});
