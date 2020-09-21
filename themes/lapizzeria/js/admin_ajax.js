$ = jQuery.noConflict();

$(document).ready(() => {
  console.log(admin_ajax);
  $(".remove_reservation").on("click", function (e) {
    e.preventDefault();
    let id = $(this).attr("data-reservation");
    swal({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: "post",
          data: {
            action: "laPizzeria_remove_reservation",
            id: id,
            type: "delete",
          },
          url: admin_ajax.ajaxurl,
          success: function (data) {
            let result = JSON.parse(data);

            if (result.response == "Success") {
              $(`[data-reservation="${result.id}"]`).parent().parent().remove();
              swal(
                "Reservation Deleted!",
                `Reservation ${id} has been removed`,
                "success"
              );
            } else {
              console.log("Something has gone wrong. Please try again later");
            }
          },
        });
      }else{
          console.log(result);
      }
    });
  });
});
