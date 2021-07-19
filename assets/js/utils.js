$("tbody tr").on("click", "td", function (e) {
  const id = $(e.target).parent().data("id");
  const pathname = location.href;
  location.href = pathname + "&action=getId&id=" + id;
});
