window.addEventListener("load", function() {

    var filterButtons = document.getElementsByClassName("img");
    sessionStorage.setItem("filterOn", '0');

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
                var data_json = JSON.stringify(data);
                sessionStorage.setItem(filter, data_json);
            }
            var visibleornot = document.getElementById(filter).style.display;
            if (visibleornot == 'none'){
            document.getElementById(filter).style.display='block';
            var data_json = sessionStorage.getItem(filter);
            var data = JSON.parse(data_json);
            data.actif = 1;
            var data_json = JSON.stringify(data);
            sessionStorage.setItem(filter, data_json);
            console.log(data);
            }
            else {
                document.getElementById(filter).style.display='none';
                var data_json = sessionStorage.getItem(filter);
                var data = JSON.parse(data_json);
                data.actif = 0;
                var data_json = JSON.stringify(data);
                sessionStorage.setItem(filter, data_json);
                console.log(data);
            }
        });
})
