window.addEventListener("load", function() {
    var img_move = document.getElementsByClassName("img_move");
    for (var i = 0; i < img_move.length; i++)
    img_move[i].addEventListener('click', function(){
        var id = this.id;
        document.onmousemove = suitsouris;
        var left = document.getElementById('video').offsetLeft;
        var top = document.getElementById('video').offsetTop;
        var width = document.getElementById('video').offsetWidth;
        var height = document.getElementById('video').offsetHeight;
        var heightid = document.getElementById(id).offsetHeight;
        var widthid = document.getElementById(id).offsetWidth;
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
                    else if (x > (left + width - widthid - 2)){
                        x = left + width - widthid - 2;
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

        }
        document.getElementById("video").addEventListener('click', function(){
            var data_json = sessionStorage.getItem(document.getElementById(id).id);
            var data = JSON.parse(data_json);
            data.filter_x = parseInt(document.getElementById(id).style.left);
            data.filter_y = parseInt(document.getElementById(id).style.top);
            data.img_x = document.getElementById('video').offsetLeft;
            data.img_y = document.getElementById('video').offsetTop;
            data.img_w = document.getElementById('video').offsetWidth;
            data.img_h = document.getElementById('video').offsetHeight;
            var data_json = JSON.stringify(data);
            sessionStorage.setItem(document.getElementById(id).id, data_json);
            var data_json = sessionStorage.getItem(document.getElementById(id).id);
            var data = JSON.parse(data_json);
            console.log("move");
            console.log(data);
            document.onmousemove = true;
            return ;
        });
    });
})
