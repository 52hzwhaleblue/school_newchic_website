{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}

{{-- create imported invoice --}}
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new-imported-invoice").click(function() {
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();

            var row = '<tr>' +
                '<td><input type="text" class="form-control" name="importedinvoice_id" id="importedinvoice_id" disabled></td>' +
                '<td> <select class = "form-select" id="emp_id"  name ="emp_id">   <option> {{ Session::get('empID_session') }}  </option> </select> </td > ' +
                '<td><select class = "form-select" id="providerID"  name ="providerID"> @foreach ($providers_data as $item)  <option> {{ $item->id }}  </option> @endforeach </select> </td > ' +
                '<td><input type="text" class="form-control" name="totalPrice" id="totalPrice"></td>' +
                '<td><input type="text" class="form-control" name="totalQuantity" id="totalQuantity"></td>' +
                '<td> <input type="date" id="importedDate" name="importedDate"></td>' +
                '<td><input type="text" class="form-control" name="status" id="status"></td>' +
                '<td><button type="button" class="btn btn-primary"> <a style = "color:white" href = "{{ route('admin.imported_invoice.create_detail_view') }}" >create detail </a> </button></td > ' +

                '<td>' + actions + '</td>' +
                '</tr>';
            $("table").append(row);
            $("table tbody tr").eq(index + 1).find(", .edit").toggle();
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add", function() {
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            input.each(function() {
                if (!$(this).val()) {
                    $(this).addClass("error");
                    empty = true;
                } else {
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if (!empty) {
                input.each(function() {
                    $(this).parent("td").html($(this).val());
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").removeAttr("disabled");
            }
        });
        // Edit row on edit button click
        $(document).on("click", ".edit", function() {
            $(this).parents("tr").find("td:not(:last-child)").each(function() {
                $(this).html('<input type="text" class="form-control" value="' + $(this)
                    .text() + '">');
            });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
        });
        // Delete row on delete button click
        $(document).on("click", ".delete", function() {
            $(this).parents("tr").remove();
            $(".add-new").removeAttr("disabled");
        });
    });
</script>

{{-- create imported invoice detail --}}
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new-imported-invoice-detail").click(function() {
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();

            var row = '<tr>' +
                '<td> <input type="text" class="form-control" name="stt" id="stt" disabled></td>' +
                '<td><select class = "form-select" id="importedinvoice_id"  name ="importedinvoice_id"> @foreach ($imported_inv_data as $item)  <option> {{ $item->id }}  </option> @endforeach </select> </td > ' +
                '<td> <input type="text" class="form-control" name="productID" id="productID" disabled></td>' +
                '<td> <input type="text" class="form-control" name="productName" id="productName" ></td>' +
                '<td><input type="text" class="form-control" name="quantity" id="quantity"></td>' +
                '<td><input type="text" class="form-control" name="price" id="price"></td>' +
                '<td> <input type="text" id="unit" name="unit"></td>' +
                '<td> <input type="file" id="image" name="image"  accept="image/png, image/jpeg, image/jpg"></td>' +
                '<td>' + actions + '</td>' +
                '</tr>';
            $("table").append(row);
            $("table tbody tr").eq(index + 1).find(".add_imp_inv_detail, .edit").toggle();
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add", function() {
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            input.each(function() {
                if (!$(this).val()) {
                    $(this).addClass("error");
                    empty = true;
                } else {
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if (!empty) {
                input.each(function() {
                    $(this).parent("td").html($(this).val());
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").removeAttr("disabled");
            }
        });
        // Edit row on edit button click
        $(document).on("click", ".edit", function() {
            $(this).parents("tr").find("td:not(:last-child)").each(function() {
                $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
            });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
        });
        // Delete row on delete button click
        $(document).on("click", ".delete", function() {
            $(this).parents("tr").remove();
            $(".add-new").removeAttr("disabled");
        });
    });
</script>
