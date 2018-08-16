window.addEventListener("load", function() {
    var modal = document.querySelector('#modal_notif');
    var html = document.querySelector('html');
    modal.classList.add('is-active');
    html.classList.add('is-clipped');

    modal.querySelector('#div_notif').addEventListener('click', function(e) {
      e.preventDefault();
      modal.classList.remove('is-active');
      html.classList.remove('is-clipped');
    });
    modal.querySelector('#delete_notif').addEventListener('click', function(e) {
      e.preventDefault();
      modal.classList.remove('is-active');
      html.classList.remove('is-clipped');
    });
})
