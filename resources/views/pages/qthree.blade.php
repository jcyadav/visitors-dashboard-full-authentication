@extends('layouts.app')

@section('content')

<section id="main-content">
<section class="wrapper">

<div class="row">
<div class="col-md-12">

<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Question 2</h3>
</div>

<div class="panel-body">

<div class="row">
<div class="col-md-3">
<label>From Date</label>
<input type="text" id="from_date" class="form-control">
</div>

<div class="col-md-3">
<label>To Date</label>
<input type="text" id="to_date" class="form-control">
</div>

<div class="col-md-2" style="margin-top:25px;">
<button class="btn btn-primary" id="searchBtn">Search</button>
</div>
</div>

<br>

<table class="table table-bordered table-striped" id="serviceTable" width="100%">
    <thead>
        <tr></tr>
    </thead>

    <tbody></tbody>

    <tfoot>
        <tr></tr>
    </tfoot>
</table>

</div>
</div>

</div>
</div>

</section>
</section>
<script>
$('#from_date, #to_date').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true
});
function convertDate(date){
    let p = date.split('/');
    return p[2] + '-' + p[1] + '-' + p[0];
}
loadData();

$("#searchBtn").click(function () {
    loadData();
});

function loadData() {

    $.ajax({

        url: "{{ route('question3.data') }}",
        type: "POST",

        data: {
    _token: "{{ csrf_token() }}",
    from_date: convertDate($("#from_date").val()),
    to_date: convertDate($("#to_date").val())
},

        success: function (res) {

            let data = res.data || [];
            let services = res.services || [];

            // Build Dynamic Columns
            let columns = [
                {
                    title: "User ID",
                    data: "user_id"
                }
            ];

            services.forEach(function (service) {

                columns.push({

                    title: service,
                    data: service,
                    defaultContent: "0.00",

                    render: function (data) {

                        if (data == null || data === "")
                            return "0.00";

                        return parseFloat(data).toFixed(2);
                    }

                });

            });

            // Destroy Previous DataTable
            if ($.fn.DataTable.isDataTable('#serviceTable')) {
                $('#serviceTable').DataTable().destroy();
            }

            $('#serviceTable').empty();

            // Create DataTable
            $('#serviceTable').DataTable({

                data: data,
                columns: columns,

                scrollX: true,
                autoWidth: false,
                pageLength: 25,
                ordering: false,
                searching: false,
                destroy: true,

                footerCallback: function (row, data) {

                    let footer = "<tr><th>Total</th>";

                    for (let i = 1; i < columns.length; i++) {

                        let total = data.reduce(function (sum, item) {

                            return sum + (parseFloat(item[columns[i].data]) || 0);

                        }, 0);

                        footer += "<th>" + total.toFixed(2) + "</th>";
                    }

                    footer += "</tr>";

                    $('#serviceTable tfoot').html(footer);

                }

            });

        },

        error: function (xhr) {

            console.log(xhr);

        }

    });

}
</script>
@endsection