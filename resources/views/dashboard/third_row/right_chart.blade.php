<div class="col-md-6">
    <div class="card">
        <div class="card-header d-flex ">
            <div class="mr-auto">Type of Containment Unit</div>
        </div>
        <div class="card-body">
            <canvas id="water_supply" width="400" height="400"></canvas>
            <script>
                var unique_water_supply=
                        [
                            @foreach ($unique_water_supply as $frequency_of_supply)
                            '{{$frequency_of_supply}}',
                            @endforeach

                        ];
                        var value_water_supply=
                        [
                            @foreach ($value_water_supply as $value_water_supply)
                            '{{$value_water_supply}}',
                            @endforeach

                        ];
                console.log(unique_water_supply);
              var ctx = document.getElementById('water_supply').getContext('2d');
            var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: unique_water_supply,
                datasets: [{
                    backgroundColor: "#fff176",
                    borderColor:  "#fff176",
                    data: value_water_supply
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
