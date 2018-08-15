window.addEventListener("load", function() {

    var filterButtons = document.getElementsByClassName("img");
    sessionStorage.setItem("filterOn", '0');
    for (var i = 0; i < filterButtons.length; i++)
        filterButtons[i].addEventListener('click', function() {
            var filter = this.name;
            var visibleornot = document.getElementById(filter).style.display;
            if (visibleornot == 'none'){
            document.getElementById(filter).style.display='block';
            sessionStorage.setItem("filterOn", '1');
            sessionStorage.setItem("src",this.src);
            }
            else {
                document.getElementById(filter).style.display='none';
                sessionStorage.setItem("filterOn", '0');
                sessionStorage.setItem("src","");
            }
        });
})
