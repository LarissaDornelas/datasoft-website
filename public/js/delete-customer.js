$("body").on("click", ".deleteCustomer", function () {
    let id = $(this).data("value");

    $("#deleteCustomerForm").attr("action", "/admin/clientes/excluir/" + id);
});
