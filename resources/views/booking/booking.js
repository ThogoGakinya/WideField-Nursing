$(document).on('keyup', '#search_booking', function(){
   var query = $(this).val();
   var page = $('#hidden_page').val();
   fetch_booking(page,query);
});
$(document).on('click', '.pagination a', function(event){
   event.preventDefault();
   var page = $(this).attr('href').split('page=')[1];
   $('#hidden_page').val(page);
   var query = $('#search_booking').val();
   $('li').removeClass('active');
   $(this).parent().addClass('active');
   fetch_booking(page, query);
});
function fetch_booking(page,query){
   var myurl = $("#fetch_bookings_url").attr('url');
   $.ajax({
      url:myurl,
      method:'GET',
      data:{page:page,query:query},
      success:function(bookingdata){
         $('.booking_table').html(bookingdata);
      }
   })
}

$(document).on('click','.select_handyman',function(){
   $('#booking_id').val($(this).attr('data-bookingid'));
});


function acceptbooking(id,status,title,yes,no,accepturl,wrong,recordsafe,serviceid) {
   swal({
      title: title,
      serviceid: serviceid,
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: yes,
      cancelButtonText: no,
      closeOnConfirm: false,
      closeOnCancel: false,
      showLoaderOnConfirm: true,
   },
   function(isConfirm) {
      
      if (isConfirm) {
         
         $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url:accepturl,
            data: {id: id,status: status,serviceid: serviceid},
            method: 'POST',
            success: function(response) {
               if (response == 1) {
                  swal.close()
                  window.location.reload();
               } else {
                  swal("Cancelled", response.message , "error");
               }
            },
            error: function(e) { 
               swal("Cancelled", wrong , "error");
            }
         });
      } else {
         swal("Cancelled", recordsafe, "error");
      }
   });
}

function cancelbooking(id,status,canceled_by,title,yes,no,cancelurl,wrong,recordsafe) {
   swal({
      title: title,
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: yes,
      cancelButtonText: no,
      closeOnConfirm: false,
      closeOnCancel: false,
      showLoaderOnConfirm: true,
   },
   function(isConfirm) {
      if (isConfirm) {
         $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url:cancelurl,
            data: {id: id,status: status,canceled_by: canceled_by},
            method: 'POST',
            success: function(response) {
               if (response == 1) {
                  swal.close();
                  window.location.reload();
               } else {
                  swal("Cancelled", response.message , "error");
               }
            },
            error: function(e) {
               swal("Cancelled", wrong, "error");
            }
         });
      } else {
         swal("Cancelled", recordsafe, "error");
      }
   });
}

function completebooking(id,status,title,yes,no,completeurl,wrong,recordsafe) {
   swal({
      title: title,
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: yes,
      cancelButtonText: no,
      closeOnConfirm: false,
      closeOnCancel: false,
      showLoaderOnConfirm: true,
   },
   function(isConfirm) {
      if (isConfirm) {
         $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url:completeurl,
            data: {id: id,status: status},
            method: 'POST',
            success: function(response) {
               if (response == 1) {
                  swal.close();
                  window.location.reload();
               } else {
                  swal("Cancelled", wrong , "error");
               }
            },
            error: function(e) {
               swal("Cancelled", wrong, "error");
            }
         });
      } else {
         swal("Cancelled", recordsafe, "error");
      }
   });
}