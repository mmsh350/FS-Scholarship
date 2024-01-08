function logout(){
    swal({
      title: "Exit ?",
      text: "Are you sure want to logout",
      type: "info",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes",
      cancelButtonClass: "btn-secondary",
      cancelButtonText: "No",
      showLoaderOnConfirm: true
    }, function () {
      setTimeout(function () {
        var _token = $('#_token').val();
        $.ajax({
          type: "POST",
          data:{_token},
          url: 'logout',
          success: function (data) {
              window.location.reload(); 
              }})  
      }, 2000);
    });
     }
     