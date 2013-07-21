<h1> <?php echo $event->eventtype; ?> Report </h1>
<style>
    .CSS_Table_Example {
        margin:0px;padding:0px;
        width:50%;
        box-shadow: 10px 10px 5px #888888;
        border:1px solid #000000;
        -moz-border-radius-bottomleft:9px;
        -webkit-border-bottom-left-radius:9px;
        border-bottom-left-radius:9px;
        -moz-border-radius-bottomright:9px;
        -webkit-border-bottom-right-radius:9px;
        border-bottom-right-radius:9px;
        -moz-border-radius-topright:9px;
        -webkit-border-top-right-radius:9px;
        border-top-right-radius:9px;
        -moz-border-radius-topleft:9px;
        -webkit-border-top-left-radius:9px;
        border-top-left-radius:9px;
    }.CSS_Table_Example table{
         width:50%;
         height:100%;
         margin:0px;padding:0px;
     }.CSS_Table_Example tr:last-child td:last-child {
          -moz-border-radius-bottomright:9px;
          -webkit-border-bottom-right-radius:9px;
          border-bottom-right-radius:9px;
      }.CSS_Table_Example table tr:first-child td:first-child {
           -moz-border-radius-topleft:9px;
           -webkit-border-top-left-radius:9px;
           border-top-left-radius:9px;
       }.CSS_Table_Example table tr:first-child td:last-child {
            -moz-border-radius-topright:9px;
            -webkit-border-top-right-radius:9px;
            border-top-right-radius:9px;
        }.CSS_Table_Example tr:last-child td:first-child{
             -moz-border-radius-bottomleft:9px;
             -webkit-border-bottom-left-radius:9px;
             border-bottom-left-radius:9px;
         }.CSS_Table_Example tr:hover td{
              background-color:#ffffff;
              background:-o-linear-gradient(bottom, #82c0ff 5%, #56aaff 100%);	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #82c0ff), color-stop(1, #56aaff) );
              background:-moz-linear-gradient( center top, #82c0ff 5%, #56aaff 100% );
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#82c0ff", endColorstr="#56aaff");	background: -o-linear-gradient(top,#82c0ff,56aaff);
          }.CSS_Table_Example tr:first-child td{
               background:-o-linear-gradient(bottom, #0069d3 5%, #007fff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #0069d3), color-stop(1, #007fff) );
               background:-moz-linear-gradient( center top, #0069d3 5%, #007fff 100% );
               filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#0069d3", endColorstr="#007fff");	background: -o-linear-gradient(top,#0069d3,007fff);
               background-color:#ffcc66;
               border:0px solid #000000;
               text-align:center;
               border-width:0px 0px 1px 1px;
               font-size:19px;
               font-family:sans-serif;
               font-weight:bold;
               color:#ffffff;
           }.CSSTableGenerator tr:first-child:hover td{
                background:-o-linear-gradient(bottom, #0069d3 5%, #007fff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #0069d3), color-stop(1, #007fff) );
                background:-moz-linear-gradient( center top, #0069d3 5%, #007fff 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#0069d3", endColorstr="#007fff");	background: -o-linear-gradient(top,#0069d3,007fff);
                background-color:#0069d3;
            }.CSS_Table_Example tr:first-child td:first-child{
                 border-width:0px 0px 1px 0px;
             }.CSS_Table_Example tr:first-child td:last-child{
                  border-width:0px 0px 1px 1px;
              }.CSS_Table_Example td{
                   background:-o-linear-gradient(bottom, #ffffff 5%, #82c0ff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #56aaff), color-stop(1, #82c0ff) );
                   background:-moz-linear-gradient( center top, #ffffff 5%, #82c0ff 100% );
                   filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#56aaff", endColorstr="#82c0ff");	background: -o-linear-gradient(top,#56aaff,82c0ff);
                   background-color:#ffffff;
                   border:1px solid #000000;
                   border-width:0px 1px 1px 0px;
                   text-align:left;
                   padding:7px;
                   font-size:12px;
                   font-family:sans-serif;
                   font-weight:normal;
                   color:#000000;
               }.CSS_Table_Example tr:last-child td{
                    border-width:0px 1px 0px 0px;
                }.CSS_Table_Example tr td:last-child{
                     border-width:0px 0px 1px 0px;
                 }.CSS_Table_Example tr:last-child td:last-child{
                      border-width:0px 0px 0px 0px;
                  }
</style>
<div class="CSS_Table_Example" ">
<table >



    <tr>
        <td>Name of Program</td>
        <td><?php echo $event->eventtype; ?></td>

    </tr>
    <tr>
        <td>Date</td>
        <td><?php echo $event->eventdate; ?></td>

    </tr>
    <tr>
        <td>Assembly</td>
        <td><?php echo $assembly; ?></td>

    </tr>
    <tr>
        <td>Total Tithes</td>
        <td><?php echo $event->totaltithes; ?></td>

    </tr>
    <tr>
        <td>Fire Conference Contributions</td>
        <td><?php echo $event->conference; ?></td>

    </tr>
    <tr>
        <td>Total Offerings</td>
        <td><?php echo $event->totalofferings; ?></td>

    </tr>
    <tr>
        <td>Attendance</td>
        <td><?php echo $event->attendance; ?></td>

    </tr>
    <tr>
        <td>Pastor's Comment</td>
        <td><?php echo $event->comment; ?></td>

    </tr>
    </tbody>
</table>

<p><i>For any questions,comments or queries send us an email on
        churchmanager@rfm.org.za</i></p>
<p>Kind Regards</p><p>RFM Web Team!</p>
<i>Where everybody is somebody thorugh Christ Jesus!</i>
