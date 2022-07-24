<!-- Include Required Prerequisites -->
<script type="text/javascript" src="./dist/daterangepicker-master/moment.min.js"></script>
<!--
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
-->

<script>
    $(document).ready(function() {

        $('input[name="daterange"]').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                }
            },
            function(start, end, label) {
                $("input[name='from_date']").val(start.format('YYYY-MM-DD'));
                $("input[name='to_date']").val(end.format('YYYY-MM-DD'));
            });

    });
</script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="./dist/daterangepicker-master/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="./dist/daterangepicker-master/daterangepicker.css" />
<div class="col-12">
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label>Tanggal</label>
                    <input type="text" class="form-control" name="daterange">
                    <input type="hidden" name="from_date">
                    <input type="hidden" name="to_date">
                    <p></p>
                    <button class="btn btn-sm btn-success" onclick="var f = $('input[name=\'from_date\']').val(); var t = $('input[name=\'to_date\']').val(); window.open('./pdf.php?f='+f+'&t='+t)">Download</button>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>