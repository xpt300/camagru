window.addEventListener("load", function() {
    document.querySelector('#startbutton').addEventListener('click', function(event) {
          event.preventDefault();
          var modal = document.querySelector('#modal_save');  // assuming you have only 1
          var html = document.querySelector('html');
          modal.classList.add('is-active');
          html.classList.add('is-clipped');
          for(var i = 1; i < 7; i++) {
              var filter_can = "filter_can" + i;
              var filter = "filter" + i;
              var data_json = sessionStorage.getItem(filter);
              var data = JSON.parse(data_json);
              if (data != null && data.actif == 1){
                  var visible = document.getElementById(filter_can).style.display;
                  document.getElementById(filter_can).style.display='block';
                  var can_x = document.getElementById('canvas').offsetLeft;
                  var can_y = document.getElementById('canvas').offsetTop;
                  var delta_x = data.filter_x - data.img_x;
                  var delta_y = data.filter_y - data.img_y;
                  document.getElementById(filter_can).style.left = (can_x + delta_x) + 'px';
                  document.getElementById(filter_can).style.top = (can_y + delta_y) + 'px';
              }
          }

      modal.querySelector('#div_save').addEventListener('click', function(e) {
          for(var i = 1; i < 7; i++) {
              var filter_can = "filter_can" + i;
              var visible = document.getElementById(filter_can).style.display;
              if (visible = 'block'){
                  document.getElementById(filter_can).style.display='none';
              }
          }
            e.preventDefault();
            modal.classList.remove('is-active');
            html.classList.remove('is-clipped');
      });
      modal.querySelector('#close_save').addEventListener('click', function(e) {
          for(var i = 1; i < 7; i++) {
              var filter_can = "filter_can" + i;
              var visible = document.getElementById(filter_can).style.display;
              if (visible = 'block'){
                  document.getElementById(filter_can).style.display='none';
              }
          }
            e.preventDefault();
            modal.classList.remove('is-active');
            html.classList.remove('is-clipped');
      });
    });
})
