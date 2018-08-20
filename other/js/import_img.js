window.addEventListener("load", function() {
    var fileToRead = document.getElementById("file_import");
    fileToRead.addEventListener("change", function() {
        var files = fileToRead.files;
        // we should read just one file
        console.log("Filename: " + files[0].name);
        console.log("Type: " + files[0].type);
        console.log("Size: " + files[0].size + " bytes");
        console.log("Tmp name: " + files[0].tmp_name);
        console.log("Error: " + files[0].error);
         var key1 = files[0].name;
         var key2 = files[0].type;
         var key3 = files[0].size;
         var key4 = files[0].tmp_name;
         var poids_max = 512000;
         if (key2 != 'image/png' && key2 != 'image/jpeg' && key2 != 'image/jpg' && key2 != 'image/gif'){
             var modal = document.querySelector('#modal_type');
             var html = document.querySelector('html');
             modal.classList.add('is-active');
             html.classList.add('is-clipped');

             modal.querySelector('#div_type').addEventListener('click', function(e) {
               e.preventDefault();
               modal.classList.remove('is-active');
               html.classList.remove('is-clipped');
             });
             modal.querySelector('#delete_type').addEventListener('click', function(e) {
               e.preventDefault();
               modal.classList.remove('is-active');
               html.classList.remove('is-clipped');
             });
         }
         else if (key3 > poids_max){
             var modal = document.querySelector('#modal_poids');
             var html = document.querySelector('html');
             modal.classList.add('is-active');
             html.classList.add('is-clipped');

             modal.querySelector('#div_poids').addEventListener('click', function(e) {
               e.preventDefault();
               modal.classList.remove('is-active');
               html.classList.remove('is-clipped');
             });
             modal.querySelector('#delete_poids').addEventListener('click', function(e) {
               e.preventDefault();
               modal.classList.remove('is-active');
               html.classList.remove('is-clipped');
             });
         }
         else{
             console.log('test');
             var form = document.getElementById("img_form");
             form.submit();
     }
    });
})
