<div class="col-md-6">
    <div class="card">
        <div class="card-header d-flex ">
            <div class="mr-auto">Total survey completed by date</div>
        </div>
        <div class="card-body">
            <canvas id="total_survey_by_date" width="400" height="400"></canvas>
            <script>
                var unique_date=
                        [
                            @foreach ($unique_date as $date)
                            '{{$date}}',
                            @endforeach

                        ];
                        var value=
                        [
                            @foreach ($value as $values)
                            '{{$values}}',
                            @endforeach

                        ];
                console.log(unique_date);
              var ctx = document.getElementById('total_survey_by_date').getContext('2d');
            var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: unique_date,
                datasets: [{
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#571845","#fff176"],
                    borderColor:  ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#571845","#fff176"],
                    data: value
                }]
            },

    // Configuration options go here
    options: {
        legend: {
                        display: false
                            },

    }
});
            </script>
        </div>
    </div>
</div>
