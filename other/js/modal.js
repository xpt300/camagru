window.addEventListener("load", function() {
    // var img_can = document.getElementsByClassName("img_can");
    // for (var i = 0; i < img_can.length; i++)
    //     img_can[i].function(){
    //         var filter1 = this.name;
    //         c
    //         var data_json = sessionStorage.getItem(this.name);
    //         var data = JSON.parse(data_json);
    //         console.log("test");
    //         if (data && data.actif === 1){
    //             document.getElementById(filter1).style.display='block';
    //         }
    //     });
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
                  var height = data.filter_h;
                  var width = data.filter_w;
                  var can_h = document.getElementById('canvas').offsetHeight;
                  var can_w = document.getElementById('canvas').offsetWidth;
                  var delta_h = can_h / data.img_h;
                  var delta_w = can_w / data.img_w;
                  console.log(delta_h);
                  console.log(delta_w);
                  // document.getElementById(filter_can).height = (height * delta_h) +'px';
                  // document.getElementById(filter_can).width = (width * delta_w) +'px';
              }
          }

      modal.querySelector('#div_save').addEventListener('click', function(e) {
            e.preventDefault();
            modal.classList.remove('is-active');
            html.classList.remove('is-clipped');
      });
      modal.querySelector('#close_save').addEventListener('click', function(e) {
            e.preventDefault();
            modal.classList.remove('is-active');
            html.classList.remove('is-clipped');
      });
    });
})
