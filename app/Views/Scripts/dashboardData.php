<script>
  const facility_data = {
    labels: [
        <?php foreach ($facility as $data) : ?> 
            '<?= strtoupper($data['facility_name']) ?>',
        <?php endforeach; ?>
    ],
    datasets: [{
      label: 'Organizations',
      data: [ <?php $ctr=0; foreach ($facility as $data) { $ctr++; echo $data['facility_count'] . ',';} ?>],
      backgroundColor: [
        <?php for($counter = 0; $counter <= $ctr; $counter++):?>
          'rgb(<?=rand(1,255)?>,<?=rand(1,100)?>,<?=rand(1,150)?>)',
        <?php endfor;?>
      ],
      hoverOffset: 4
    }]
  };
  const facility_config = {
    type: 'pie',
    data: facility_data,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Reservation per Facility',
                fullSize: true,
                font: {weight: 'bold'}
            },
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    usePointStyle: true,
                    pointStyle: 'circle',
                }
            }
        }
    }
  };
  
const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const reservation_data = {
  labels: labels,
  datasets: [{
    label: 'Reservations done each month',
    data: [
        <?php for($ctr = 1; $ctr <= 12; $ctr++):?>
            <?php foreach(${'reservations' . $ctr} as $data):?>
                <?= $data['count'];?>
            <?php endforeach;?>,
        <?php endfor;?>
    ],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
};
  const reservation_config = {
    type: 'line',
    data: reservation_data,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Reservations',
                fullSize: true,
                font: {weight: 'bold'}
            },
        }
    }
  };
    var chart_facility = new Chart(
      document.getElementById('chart-facility'),
      facility_config
    );
    var chart_course = new Chart(
      document.getElementById('canvas-month'),
      reservation_config
    );

</script>