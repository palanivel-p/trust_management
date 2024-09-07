 function change() {
     $("#titles").html("Change Password");
     $('#change_form')[0].reset();
     // $('#api').val("change_api.php")
 }

// to validate form
 $("#change_form").validate(
     {
         ignore: '.ignore',
         // Specify validation rules
         rules: {

             old_password: {
                 required: true
             },
             new_password: {
                 required: true
             },
         },
         // Specify validation error messages
         messages: {
             old_password: "*This field is required",
             new_password: "*This field is required",
         }
     });

 $('#change_btn').click(function () {
     $("#change_form").valid();

     if($("#change_form").valid()==true) {
         // var api = $('#api').val();
         var old_pwd =  $("#old_password").val();
         var new_pwd = $("#new_password").val();
         this.disabled = true;
         this.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
         $.ajax({
             type: "POST",
             url: 'https://atct.in/portal/includes/change_api.php',
             data: $.param({old_password : old_pwd,new_password : new_pwd}),
             // url: api,
             // data: formData,
             dataType: "json",
             success: function (res) {
                 if (res.status == 'success') {
                     Swal.fire(
                         {
                             title: "Success",
                             text: res.msg,
                             icon: "success",
                             button: "OK",
                             allowOutsideClick: false,
                             allowEscapeKey: false,
                             closeOnClickOutside: false,
                         }
                     )
                         .then((value) => {
                             window.window.location.reload();
                         });
                 } else if (res.status == 'failure') {

                     Swal.fire(
                         {
                             title: "Failure",
                             text: res.msg,
                             icon: "warning",
                             button: "OK",
                             allowOutsideClick: false,
                             allowEscapeKey: false,
                             closeOnClickOutside: false,
                         }
                     )
                         .then((value) => {

                             document.getElementById("change_btn").disabled = false;
                             document.getElementById("change_btn").innerHTML = 'Add';
                         });

                 }
             },
             error: function () {

                 Swal.fire('Check Your Network!');
                 document.getElementById("change_btn").disabled = false;
                 document.getElementById("change_btn").innerHTML = 'Add';
             }

         });



     } else {
         document.getElementById("change_btn").disabled = false;
         document.getElementById("change_btn").innerHTML = 'Add';

     }


 });