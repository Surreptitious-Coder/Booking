<?php

function GetConflict($IP,$instance){
    error_reporting(E_ERROR);
    $link = mysqli_connect("192.168.48.2", $user="root", $password="Hi");

    $instance = ["id"=>1,"start_date"=>'2021-08-06 12:00:00',"end_date"=> '2021-08-06 13:00:00',"ref"=> '610c5dd321baa684688475',"id2"=>1,"CPU"=>4,"spin"=>50,"HDD"=>100,"RAM"=>100];
    $relevant = ["CPU"=>0,"RAM"=>0,"HDD"=>0];


    $resources = "SELECT * FROM bookedscheduler.reservation_instances";
    $resource = mysqli_query($link, $resources);


    $query = "SELECT * FROM bookedscheduler.server_resources";
    $server_resource = mysqli_query($link, $query);


    $server_rows = [];
    while ($result = $server_resource->fetch_assoc()) {
        $server_rows[] = $result;
    }

    $category = mysqli_query($link, $resources);
    $rows = [];

    while ($result = $category->fetch_assoc()) {
        $rows[] = $result;
    }

    $result = $rows;



    //if instance between result.start_time and result.end_time or result between instance.start_time and instance.end_time
    foreach ($result as $item) {
        if (((strtotime($instance['start_date']) >= strtotime($item['start_date'])) && ($instance['start_date']) < strtotime($item['end_date'])) ||  ($instance['end_date']) >= strtotime($item['start_date']) && (strtotime($instance['end_date']) < strtotime($item['end_date']))
    || ((strtotime($item['start_date']) >= strtotime($instance['start_date']) && strtotime($item['start_date']) < strtotime($instance['end_date']))   || (strtotime($item['end_date']) >= strtotime($instance['start_date'])) && (strtotime($item['end_date']) < strtotime($instance['end_date'])))) {
            $relevant['CPU'] += $item['CPU'];
            $relevant['RAM'] += $item['RAM'];
            $relevant['HDD'] += $item['HDD'];
            printf("\n Collision \n");
        }
    }

    if (($relevant['HDD']+$instance['HDD']<= $server_rows['HDD']) && ($relevant['RAM']+$instance['RAM']<= $server_rows['RAM']) && ($relevant['CPU']+$instance['CPU']<= $server_rows['CPU'])) {
        return false;
    }
}

?>