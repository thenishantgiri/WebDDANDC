<?php

        $i=0;
        foreach($_POST['num'] as $data)
        {
            $array[$i]=$data;
            $i++;
        }

        sort($array);

        $i=0;
        while($i!=5)
        {
            echo $array[$i]." ";
            $i++;
        }
?>