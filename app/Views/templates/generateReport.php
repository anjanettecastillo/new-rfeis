<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>               
                table,
                th,
                td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                </style>
</head>
<body>

                <h3 style="text-align:center; margin-top:-50px; line-height: 70%">Summary of Facility Reservation Report as of</h3>
                <h3 style="text-align:center; margin-top:-50px; line-height: 70%"><?= $start == $end?date('F d, Y',strtotime($start)):date('F d, Y',strtotime($start)) . ' to ' . date('F d, Y',strtotime($end))?></h3><br>
                <p style="line-height: 70%; font-size: 11pt;"><b>Department:</b> Head of Administrative Office</p>
                <p style="line-height: 70%; font-size: 11pt;"><b>Facility: </b><?= isset($facility['facility_name'])?$facility['facility_name']:$facility?></p>
                <p style="line-height: 70%; font-size: 11pt;"><b>Date generated: </b><?= date('F d, Y')?></p>
                <table style="width:100%">
                    <thead>
                        <tr>

                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>Reservation Code</center>
                            </th>
                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>Person-In-charge</center>
                            </th>
                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>Date Filed</center>
                            </th>
                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>Venue</center>
                            </th>
                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>Event Name</center>
                            </th>
                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>Event Type</center>
                            </th>
                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>Reservation Date</center>
                            </th>
                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>Duration</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($reservations)):?>
                            <tr>
                                <td colspan="8" style="text-align:center"><i>No Record available</i></td>
                            </tr>
                        <?php endif;?>
                        <?php
                        foreach ($reservations as $row) : ?>
                            <tr>
                                <td style="text-align:center; font-size: 11pt">
                                    <?= strtoupper($row['reservation_code']); ?>
                                </td>
                                <td style="text-align:center; font-size: 11pt">
                                    <?= ucwords($row['user']); ?>
                                </td>
                                <td style="text-align:center; font-size: 11pt">
                                    <?= strtoupper(date('m-d-Y', strtotime($row['created_at']))) ?>
                                </td>
                                <td style="text-align:center; font-size: 11pt">
                                    <?= ucwords($row['facility_name']); ?>
                                </td>
                                <td style="text-align:center; font-size: 11pt">
                                    <?= ucwords($row['event_name']) ?>
                                </td>
                                <td style="text-align:center; font-size: 11pt">
                                    <?= ucwords($row['event_type']) . ' Activity'?>
                                </td>
                                <td style="text-align:center; font-size: 11pt">
                                    <?= strtoupper(date('m-d-Y', strtotime($row['reservation_date']))); ?>
                                </td>
                                <td style="text-align:center; font-size: 11pt">
                                    <?=strtoupper(date('h:i a', strtotime($row['reservation_starting_time'])) . ' - ' . date('h:i a', strtotime($row['reservation_end_time'])));?>
                                </td>
                            </tr>
                        <?php
                        endforeach; ?>
                    </tbody>
                </table>
                <p style="text-align:center; font-size: 10pt"><i>**This report is system generated.**</i></p>
                <p style="text-align:center; font-size: 10pt; line-height: 30%"><i>**No signatures are required.**</i></p>
</body>
</html>