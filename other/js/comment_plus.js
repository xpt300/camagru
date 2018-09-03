window.addEventListener("load", function() {
    var notificationButtonsComment = document.getElementsByClassName("notification");
    for (var i = 0; i < notificationButtonsComment.length; i++)
        notificationButtonsComment[i].addEventListener('click', function() {
            var num = this.id.match(/[a-z]+|\d+/ig);
            var comment_cache = "comment_cache" + num;
            var display = document.getElementsByClassName(comment_cache)[0].style.display;
            var icon_off = "icon_off" + num;
            var icon_on = "icon_on" + num;
            if (display == 'none'){
              document.getElementsByClassName(comment_cache)[0].style.display='block';
              document.getElementById(icon_off).style.display='none';
              document.getElementById(icon_on).style.display='block';

            }
            else {
                document.getElementsByClassName(comment_cache)[0].style.display='none';
                document.getElementById(icon_off).style.display='block';
                document.getElementById(icon_on).style.display='none';

            }
        });
});
