$(document).ready(function () {
  search_class_data(1);
  function search_class_data(page, query = "") {
    $.ajax({
      url: "class/search_class_data.php",
      method: "POST",
      data: { search: "search", page: page, query: query },
      success: function (data) {
        $("#dynamic_content").html(data);
      },
    });
  }
  $(document).on("click", ".page-link", function () {
    let page = $(this).data("page_number");
    let query = $("#search_box").val();
    search_class_data(page, query);
  });
  $("#search_box").keyup(function () {
    let query = $("#search_box").val();
    search_class_data(1, query);
  });
});
