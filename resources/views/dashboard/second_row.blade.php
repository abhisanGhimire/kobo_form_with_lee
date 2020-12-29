<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex ">
            <div class="mr-auto">Primary source of water</div>
        </div>
        <div class="card-body">
            <canvas id="total_primary_source_of_water" width="100" height="30"></canvas>
            <script>
                var unique_source_of_water=
                        [
                            @foreach ($unique_source_of_water as $primary_source_of_water)
                            '{{$primary_source_of_water}}',
                            @endforeach

                        ];
                        var value_source_of_water=
                        [
                            @foreach ($value_source_of_water as $value_source_of_waters)
                            '{{$value_source_of_waters}}',
                            @endforeach

                        ];
                console.log(unique_source_of_water);
              var ctx = document.getElementById('total_primary_source_of_water').getContext('2d');
            var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: unique_source_of_water,
                datasets: [{
                    backgroundColor: "#fff176",
                    borderColor:  "#fff176",
                    data: value_source_of_water
                }]
            },
            

    // Configuration options go here
    options: {
        legend: 
        {
            display: false
        },
        
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }

    }
});
            </script>
        </div>
    </div>
</div>
