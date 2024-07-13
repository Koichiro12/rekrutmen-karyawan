$(function () {
    $(".a-confirm").on("click", function (e) {
        e.preventDefault();
        var link = $(this).attr('href');

        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes !",
      }).then((result) => {
        if (result.isConfirmed) {
         window.location = link;
         
        }
      });
    });
    $(".form-confirm").on("click", function (e) {
        e.preventDefault();
        var form = $(this).closest("form");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes !",
        }).then((result) => {
          if (result.isConfirmed) {
           form.submit();
          }
        });
    });
});
