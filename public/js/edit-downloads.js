$("body").on("click", ".edit", function () {
    let title = $(this).data("title");
    let description = $(this).data("description");
    let link = $(this).data("link");
    let id = $(this).data("value");

    $("#editTitle").val(title);
    $("#editDescription").val(description);
    $("#editLink").val(link);

    $("#editForm").attr("action", "/admin/downloads/" + id);
});
$("body").on("click", ".delete", function () {
    let id = $(this).data("value");

    $("#deleteForm").attr("action", "/admin/downloads/excluir/" + id);
});

$("body").on("click", ".delete", function () {
    let id = $(this).data("value");
});
