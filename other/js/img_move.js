window.addEventListener("load", function() {
    var img_move = document.getElementsByClassName("img_move");
    for (var i = 0; i < img_move.length; i++)
    img_move[i].addEventListener('click', function(){
        var id = this.id;
        var a = 0;
        document.onmousemove = suitsouris;
        var left = document.getElementById('video').offsetLeft;
        var top = document.getElementById('video').offsetTop;
        var width = document.getElementById('video').offsetWidth;
        var height = document.getElementById('video').offsetHeight;
        var heightid = document.getElementById(id).offsetHeight;
        console.log(heightid);
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
                    if (x < left){
                        x = left;
                    }
                    else if (x > (left + width - 96)){
                        x = left + width - 96;
                    }
                    if (y < top){
                        y = top;
                    }
                    else if (y > (top + height - heightid - 2)){
                        y = top + height - heightid - 2;
                    }
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
