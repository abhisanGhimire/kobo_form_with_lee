<div class="col-md-6">
    <div class="card">
        <div class="card-header d-flex ">
            <div class="mr-auto">Type of Containment Unit</div>
        </div>
        <div class="card-body">
            <canvas id="containment_unit" width="400" height="400"></canvas>
            <script>
                var unique_containment_unit=
                        [
                            @foreach ($unique_containment_unit as $type_of_containment_unit)
                            '{{$type_of_containment_unit}}',
                            @endforeach

                        ];
                        var value_containment_unit=
                        [
                            @foreach ($value_containment_unit as $value_containment_units)
                            '{{$value_containment_units}}',
                            @endforeach

                        ];
                console.log(unique_containment_unit);
              var ctx = document.getElementById('containment_unit').getContext('2d');
            var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: unique_containment_unit,
                datasets: [{
                    backgroundColor: "#fff176",
                    borderColor:  "#fff176",
                    data: value_containment_unit
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
