window.addEventListener("load", function() {

    var deleteButtons = document.getElementsByClassName("delete");

    for (var i = 0; i < deleteButtons.length; i++)
        deleteButtons[i].addEventListener('click', function() {
            sessionStorage.setItem("id",this.id);
            event.preventDefault();
            var modal = document.querySelector('#modal_supp');
            var html = document.querySelector('html');
            modal.classList.add('is-active');
            html.classList.add('is-clipped');

            modal.querySelector('#div_supp').addEventListener('click', function(e) {
              e.preventDefault();
              modal.classList.remove('is-active');
              html.classList.remove('is-clipped');
            });
            modal.querySelector('#close_supp').addEventListener('click', function(e) {
              e.preventDefault();
              modal.classList.remove('is-active');
              html.classList.remove('is-clipped');
            });
        });
})
