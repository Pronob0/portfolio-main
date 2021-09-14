// NORMAL FORM

$(document).on('submit','#portfolio',function(e){
    
    var $this = $(this);

    e.preventDefault();
    // if(admin_loader == 1)
    // {
    // $('.gocover').show();
    // }

  $('#submit-btn').prop('disabled',true);
      $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data: new FormData(this),
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
        
          if ((data.errors)) {
            for(var error in data.errors)
            {
               
                toastr.error(data.errors[error])
              
            }
          }
          else
          {
            toastr.success(data)

          }
          location.reload();
        //   if(admin_loader == 1)
        //   {
        //       $('.gocover').hide();
        //   }

          $('#submit-btn').prop('disabled',false);
          $('#categoryModal').modal('hide');
          
          $(window).scrollTop(0);

       }

      });

});



// Delete Popup Modal
// POPUP MODAL

$('.confirm-modal').on('show.bs.modal', function(e) {
  $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

$('.confirm-modal .btn-ok').on('click', function(e) {

// if(admin_loader == 1)
// {
// $('.submit-loader').show();
// }

  $.ajax({
  type:"GET",
  url:$(this).attr('href'),
  success:function(data)
  {
        $('.confirm-modal').modal('hide');
       
        toastr.success(data);
        location.reload();

        // if(admin_loader == 1)
        // {
        //   $('.submit-loader').hide();
        // }

  }
  });
  return false;
});

// POPUP MODAL ENDS
