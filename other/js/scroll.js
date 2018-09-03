window.addEventListener("load", function() {
    document.addEventListener("scroll", function (event) {
        var pageOffset = window.pageYOffset + window.innerHeight;
        if(pageOffset > document.body.clientHeight - 20) {
            var length = document.getElementsByClassName("columns").length;
            var nb = 0;
            var i = 0;
            while (i < length && nb < 2){
                if (document.getElementsByClassName("columns")[i].style.display == "none"){
                    nb = nb + 1;
                    document.getElementsByClassName("columns")[i].style.display = "block";
                }
                i = i + 1;
            }
        }
    });
})
