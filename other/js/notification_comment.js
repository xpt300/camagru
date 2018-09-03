window.addEventListener("load", function() {
    var str = window.location.search;
    var no = str.split("=");
    if (no[1] == 'no'){
      var modal = document.querySelector('#modal_comment');
      var html = document.querySelector('html');
      modal.classList.add('is-active');
      html.classList.add('is-clipped');

      modal.querySelector('#div_comment').addEventListener('click', function(e) {
        e.preventDefault();
        modal.classList.remove('is-active');
        html.classList.remove('is-clipped');
      });
      modal.querySelector('#delete_comment').addEventListener('click', function(e) {
        e.preventDefault();
        modal.classList.remove('is-active');
        html.classList.remove('is-clipped');
      });
    }
    else if (no[1] == 'non'){
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
})
