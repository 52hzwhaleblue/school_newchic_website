<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new-product").click(function() {
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();

            var row = '<tr>' +
                '<td><input type="text" class="form-control" name="id" id="id" disabled></td>' +
                '<td><input type="text" class="form-control" name="name" id="name" ></td>' +
                '<td><input type="text" class="form-control" name="price" id="price" ></td>' +
                '<td><input type="text" class="form-control" name="price_high" id="price_high" ></td>' +
                '<td><input type="text" class="form-control" name="image" id="image" ></td>' +
                '<td><input type="text" class="form-control" name="status" id="status" ></td>' +
                '<td><button type="button" class="btn btn-primary"> <a style = "color:white" href = "{{ route('admin.product_detail.ProductDetailView') }}" >create detail </a> </button></td > ' +
                '<td>' + actions + '</td>' +
                '</tr>';
            $("table").append(row);
            $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
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





{{-- tạo chi tiết sản phẩm --}}
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new-product-detail").click(function() {
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();

            var row = '<tr>' +
                '<td><input type="text" class="form-control" name="id" id="id" disabled></td>' +
                '<td> <select class = "form-select" id="productID"  name ="productID">  @foreach ($productNameDatas as $item)  <option> {{ $item->id }}  </option> @endforeach </select> </td > ' +
                '<td><input type="text" class="form-control" name="SKU" id="SKU" ></td>' +
                '<td><input type="text" class="form-control" name="price" id="price" ></td>' +
                '<td><input type="text" class="form-control" name="quantity" id="quantity" ></td>' +
                '<td><input type="text" class="form-control" name="size" id="size" ></td>' +
                '<td><input type="text" class="form-control" name="color" id="color" ></td>' +
                '<td><input type="text" class="form-control" name="image" id="quantity" ></td>' +
                '<td> <select class = "form-select" id="typeID"  name ="typeID">  @foreach ($productTpeData as $item)  <option> {{ $item->id }}  </option> @endforeach </select> </td > ' +
                '<td><select class = "form-select" id="providerID"  name ="providerID"> @foreach ($providerDatas as $item)  <option> {{ $item->id }}  </option> @endforeach </select> </td > ' +
                '<td><input type="text" class="form-control" name="status" id="status"></td>' +
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
