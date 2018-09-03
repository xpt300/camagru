window.addEventListener("load", function() {
    var likeButtons = document.getElementsByClassName("far fa-heart");
    for (var i = 0; i < likeButtons.length; i++)
        likeButtons[i].addEventListener('click', function() {
          var str = this.attributes["name"].value;
          var res = str.split("-");
            $.ajax({
                url: './controleur/add_like.php',
                data: 'name=' + res[0] + '&user=' + res[1],
                type: 'POST',
                success: scriptReponse,
                dataType: 'html'
              });
            function scriptReponse(str){
              if (str == 1){
                var num = this.id.match(/[a-z]+|\d+/ig);
                var like_on = "like_on" + num[2];
                var like_off = "like_off" + num[2];
                var display = document.getElementById(like_on).style.display;
                if (display == 'none'){
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
            }
        });
        var likeButtonsOn = document.getElementsByClassName("fas fa-heart");
        for (var i = 0; i < likeButtonsOn.length; i++)
            likeButtonsOn[i].addEventListener('click', function() {
                var num = this.id.match(/[a-z]+|\d+/ig);
                var like_on = "like_on" + num[2];
                var like_off = "like_off" + num[2];
                var display = document.getElementById(like_on).style.display;
                if (display == 'block'){
                  document.getElementById(like_on).style.display='none';
                  document.getElementById(like_off).style.display='block';
                }
            });
});
