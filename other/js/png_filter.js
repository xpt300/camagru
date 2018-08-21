window.addEventListener("load", function() {
    var filterButtons = document.getElementsByClassName("img");
    for (var i = 0; i < filterButtons.length; i++)
        filterButtons[i].addEventListener('click', function() {
            var filter = this.name;
            if (sessionStorage.getItem(filter) == null) {
                var data = {
                    actif: 1,
                    filter_x: 0,
                    filter_y: 0,
                    filter_w: 0,
                    filter_h: 0,
                    img_w: 0,
                    img_h: 0,
                    img_x: 0,
                    img_y: 0,
                    screen_w: 0,
                    screen_h: 0
                }
                data.img_x = document.getElementById('video').offsetLeft;
                data.img_y = document.getElementById('video').offsetTop;
                data.img_w = document.getElementById('video').offsetWidth;
                data.img_h = document.getElementById('video').offsetHeight;
                data.screen_h = screen.height;
                data.screen_w = screen.width;
                var data_json = JSON.stringify(data);
                sessionStorage.setItem(filter, data_json);
            }
            var visibleornot = document.getElementById(filter).style.display;
            if (visibleornot == 'none'){
            document.getElementById(filter).style.display='block';
            var data_json = sessionStorage.getItem(filter);
            var data = JSON.parse(data_json);
            data.actif = 1;
            data.filter_x = document.getElementById(filter).offsetLeft;
            data.filter_y = document.getElementById(filter).offsetTop;
            var data_json = JSON.stringify(data);
            sessionStorage.setItem(filter, data_json);
            }
            else {
                document.getElementById(filter).style.display='none';
                var data_json = sessionStorage.getItem(filter);
                var data = JSON.parse(data_json);
                data.actif = 0;
                var data_json = JSON.stringify(data);
                sessionStorage.setItem(filter, data_json);
            }
        });
})
