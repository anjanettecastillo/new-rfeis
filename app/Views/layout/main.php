<!DOCTYPE html>
<html lang="en">
    
    <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/png" href="/assets/img/rfeis_logo.png" />
    <title><?= $page_title ?></title>
        <?php if ($page_title == "generate") : ?>
          <meta http-equiv="Content-Type" content="text/html;" charset=utf-8"/>
            <style>
                @page {
                    margin: 0.2cm 0.2cm;
                    <?php if($type == 'voucher'):?>
                      size: 612pt 235pt;
                    <?php endif;?>
                }
                
                table,
                th,
                td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                body {
                    margin-top: 2cm;
                    margin-left: 1cm;
                    margin-right: 1cm;
                    margin-bottom: 2cm;
                }
                
                /** Define the header rules **/
                header {
                    position: fixed;
                    top: 0cm;
                    left: 0cm;
                    right: 0cm;
                    height: 2cm;
                }

                /** Define the footer rules **/
                footer {
                    position: fixed;
                    bottom: 0cm;
                    left: 0cm;
                    right: 0cm;
                    height: 2cm;
                }

                .signature-left{
                  float:left;
                  margin-top: 150px;
                  border-top: 1px solid #000;
                  margin-left: 25px;
                }
                .signature-right{
                  float:right;
                  margin-top: 150px;
                  border-top: 1px solid #000;
                  margin-right:25px;
                }
                .signature-middle{
                  margin-top: 350px;
                  border-top: 1px solid #000;
                }
                .data-title{
                  padding-left: 20px;
                  width: 50%;
                }
                .table-data{
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                }
                td {
                  border: 1px solid #dddddd;
                  text-align: left;
                  padding: 8px;
                  font-size: 11pt;
                }
                #table-signature{
                  border: 1px solid #dddddd !important;
                }
                /* css example */
                  span .peso-sign{
                    content: "\20B1";
                    font-family: DejaVu Sans, sans-serif;
                  }
                </style>
        <?php else : ?>
        <link rel="stylesheet" href="/assets/css/style.css">
        <?php endif; ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
        <?php if($page_title == 'RFEIS | Dashboard'):?>
          <link rel="stylesheet" href="/assets/css/adminlte.min.css">
          <?php endif;?>
        <link rel="stylesheet" href="/assets/css/bootstrap-image-checkbox.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css" integrity="sha256-u40zn9KeZYpMjgYaxWJccb4HnP0i8XI17xkXrEklevE=" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> 
        <link href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css" rel="stylesheet" /> 
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.css"/>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">


</head>

<body id="<?= $page_title == 'RFEIS | Sign in' ? 'bg-image' : null ?>">
    <div id="wrapper">
        <?= $this->rendersection('content'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/r-2.2.9/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="https://kit.fontawesome.com/9cef9fee62.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js" integrity="sha256-AOrsg7pOO9zNtKymdz4LsI+KyLEHhTccJrZVU4UFwIU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js" integrity="sha256-GMN9UIJeUeOsn/Uq4xDheGItEeSpI5Hcfp/63GclDZk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.esm.js" integrity="sha256-OsWibt46P+gzQrnjYvWGnUi5tggkmMv4ZHXzU3g6uJk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.js" integrity="sha256-+s2W82x5uCYS4k+d4CN6IUKJ5lWiPJFsOTr5vYqnf4Y=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/helpers.esm.js" integrity="sha256-DBLfWTRw9KgCTW52S2DJ/h/ApFpgL06+MzZONT3BUL0=" crossorigin="anonymous"></script>
    <?= $this->rendersection('dashboard_data'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="/assets/js/adminlte.js"></script>
    <script src="/assets/js/sidenav.js"></script>
    <script src="/assets/js/datatables.js"></script>
    <script src="/assets/js/myAlerts.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/incrementer.js"></script>
    <script src="/assets/js/submitReceipt.js"></script>
    <script src="/assets/js/imageCheckbox.js"></script>
    <script src="/assets/js/permissions.js"></script>
    <script src="/assets/js/datepicker.js"></script>
    <script src="/assets/js/datepickerReports.js"></script>
</body>
</html>
<?= $this->include('templates/notifications'); ?>