window.addEventListener("load", function() {
    var img_move = document.getElementsByClassName("img_move");
    for (var i = 0; i < img_move.length; i++)
    img_move[i].addEventListener('click', function(){
        var id = this.id;
        var a = 0;
        document.onmousemove = suitsouris;
        var delta_x = document.getElementById('video').offsetLeft;
        var delta_y = document.getElementById('video').offsetTop;
        console.log(delta_x);
        console.log(delta_y);
        function suitsouris(evenement){
            if(navigator.appName=="Microsoft Internet Explorer")
            {
                    var x = event.x+document.body.scrollLeft;
                    var y = event.y+document.body.scrollTop;
            }
            else
            {
                    var x =  evenement.pageX;
                    var y =  evenement.pageY;
            }
            document.getElementById(id).style.left = (x+1)+'px';
            document.getElementById(id).style.top  = (y+1)+'px';
            document.getElementById("video").addEventListener('click', function(){
                document.onmousemove = true;
                return ;
            });
        }
    });
})
