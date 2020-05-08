$("body").on("click", ".editPortfolio", function () {
    let title = $(this).data("title");
    let description = $(this).data("description");
    let link = $(this).data("link");
    let id = $(this).data("value");

    $("#editPortfolioTitle").val(title);
    $("#editPortfolioDescription").val(description);
    $("#editPortfolioLink").val(link);

    $("#editPortfolioForm").attr("action", "/admin/portfolio/" + id);
});
$("body").on("click", ".deletePortfolio", function () {
    let id = $(this).data("value");

    $("#deletePortfolioForm").attr("action", "/admin/portfolio/excluir/" + id);
});

$("body").on("click", ".deletePortfolio", function () {
    let id = $(this).data("value");
});
