<?php
    // class database{
        $conn_v1=mysqli_connect("localhost","root","ArlanBB270899","lpm_unwira");
        if ($conn_v1->connect_error) {
            die("Connection failed: " . $conn_v1->connect_error);
        }
    // }