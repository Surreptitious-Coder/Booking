<?php

#function GetConflict($IP,$instance){
    error_reporting(E_ERROR);
    $link = mysqli_connect("192.168.208.2", $user="root", $password="Hi");

    $instance = ["id"=>1,"start_date"=>'2021-08-06 12:00:00',"end_date"=> '2021-08-06 12:40:01',"ref"=> '610c5dd321baa684688475',"series_id"=>1,"CPU"=>4,"spin"=>50,"HDD"=>200,"RAM"=>1000];
    $relevant = ["CPU"=>0,"RAM"=>0,"HDD"=>0];

    $query = "SELECT * FROM bookedscheduler.server_resources";
    $server_resource = mysqli_query($link, $query);


    $server_resources = [];
    while ($result = $server_resource->fetch_assoc()) {
        $server_resources[] = $result;
    }
///////////////////////////////////////////////////////////////////////////////////////
    $resources = "SELECT * FROM bookedscheduler.reservation_instances";
    $category = mysqli_query($link, $resources);
    $reservation_instances = [];

    while ($result = $category->fetch_assoc()) {
        $reservation_instances[] = $result;
    }

    #var_dump($reservation_instances);

///////////////////////////////////////////////////////////////////////////////////////////
    $series = $instance['series_id'];
    $reservation_intermediate = "SELECT resource_id FROM bookedscheduler.reservation_resources where series_id='$series'";
    $server_resource = mysqli_query($link, $reservation_intermediate);


    $instance_rows = [];
    while ($result = $server_resource->fetch_assoc()) {
        $instance_rows[] = $result;
    }

    var_dump($instance_rows);

    $resource_id = $instance_rows[0]['resource_id'];
    var_dump($resource_id);
    $reservation_module = "SELECT * FROM bookedscheduler.resources where resource_id='$resource_id'";
    $server_resource = mysqli_query($link, $reservation_module);


    $instance_rows = [];
    while ($result = $server_resource->fetch_assoc()) {
        $instance_rows[] = $result;
    }

/////////////////////////////////////////////////////////////////////////////////////////
    var_dump("instance rows",$instance_rows);


    //if instance between result.start_time and result.end_time or result between instance.start_time and instance.end_time
    foreach ($reservation_instances as $item) {
        if (((strtotime($instance['start_date']) >= strtotime($item['start_date'])) && ($instance['start_date']) < strtotime($item['end_date'])) ||  ($instance['end_date']) >= strtotime($item['start_date']) && (strtotime($instance['end_date']) < strtotime($item['end_date']))
    || ((strtotime($item['start_date']) >= strtotime($instance['start_date']) && strtotime($item['start_date']) < strtotime($instance['end_date']))   || (strtotime($item['end_date']) >= strtotime($instance['start_date'])) && (strtotime($item['end_date']) < strtotime($instance['end_date'])))) {


        $series_id = $item['series_id'];
        $item_intermediate = "SELECT resource_id FROM bookedscheduler.reservation_resources where series_id='$series_id'";
        $item_resource = mysqli_query($link, $reservation_intermediate);


        $item_rows = [];
        while ($result = $item_resource->fetch_assoc()) {
            $item_rows[] = $result;
        }

        $resource_id = $item_rows[0]['resource_id'];
        $item_module = "SELECT * FROM bookedscheduler.resources where resource_id='$resource_id'";
        $item_resource = mysqli_query($link, $item_module);


        $server_rows2 = [];
        while ($result = $item_resource->fetch_assoc()) {
            $server_rows2[] = $result;
        }

            $relevant['CPU'] += $server_rows2[0]['CPU'];
            $relevant['RAM'] += $server_rows2[0]['RAM'];
            $relevant['HDD'] += $server_rows2[0]['HDD'];
            printf("\n Collision \n");
        }
    }

    var_dump($relevant['CPU']);
    var_dump($instance_rows[0]['CPU']);
    var_dump($server_resources);

    if (($relevant['HDD']+$instance_rows[0]['HDD']<= $server_resources[0]['MAX_HDD']) && ($relevant['RAM']+$instance_rows[0]['RAM']<= $server_resources[0]['MAX_RAM']) && ($relevant['CPU']+$instance_rows[0]['CPU']<= $server_resources[0]['MAX_CPU'])) {
        return false;
    }
    else{
        return true;
    }
}

?>