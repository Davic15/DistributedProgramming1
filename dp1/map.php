<?php
    require_once 'header.php';
    $result = $num = $i = $row2 = $result2 = $j = $num2 = $location = $flag1 = $flag2 = $flag3 = $flag4 = $avail = 0;
    $flag5 = $flag5 = $flag6 = $flag7 = $flag8 = $flag9 = $flag10 = $message = $resultSql = $rowSql = $numTable = 0;
    $message = "Click location and then click on save or delete it if you have any.<br>";

echo <<<_END

_END;
    if (!$loggedin)
    {
        die();
    }
    echo "<div class='main'><h3>Please select your cordinates</h3>";
    /*Setting the picture to Div*/
    echo "<div id='image'>";
    /*First Check if the logged user has an entry in the DB*/
    $result = queryMysql("Select user_id, coor_id, datetime from transaction where user_id = '$user'");
    $num = $result->num_rows;
    for ($i = 0; $i < $num; $i++)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row["user_id"] == $user)
        {
            /*If the user exist I check in the DB for any location assigned to him/her.*/       
            $result2 = queryMysql("Select coordinates.coor_id, coor_location, available from coordinates inner join transaction on coordinates.coor_id = transaction.coor_id where transaction.coor_id = '" .$row['coor_id']. "' ");
            $num2 = $result2->num_rows;
            if ($num2 != 0)
            {
                for ($j =0; $j < $num2; $j++)
                {
                    $row2 = $result2->fetch_array(MYSQLI_ASSOC);
                    $avail = $avail["available"];
                    if ($row2["coor_id"] == $row["coor_id"])
                    {
                        /*Locations selected by the logged user*/
                        $location = $row2["coor_location"];
                        if ($flag1 != 1)
                        {
                            if ($location == "l1")
                            {
                                $flag1 = 1;
                                echo "<a id='loc1' class='map_part1_circle_yellow' title='Position 1 (10, 20)'></a>";
                            }
                        }  
                        if ($flag2 != 1)
                        { 
                            if($location == "l2")
                            {
                                $flag2 = 1;
                                echo "<a id='loc2' class='map_part2_circle_yellow' title='Position 2 (30, 30)'></a>";
                            }
                        }    
                        if ($flag3 != 1)
                        {
                            if($location == "l3")
                            {
                                $flag3 = 1;
                                echo "<a id='loc3' class='map_part3_circle_yellow' title='Position 3 (30, 180)'></a>";
                            }
                        }    
                        if ($flag4 != 1)
                        {
                            if ($location == "l4")
                            {
                                $flag4 = 1;
                                echo "<a id='loc4' class='map_part4_circle_yellow' title='Position 4 (70, 290)'></a>";
                            }
                        } 
                        if ($flag5 != 1)
                        {
                            if ($location == "l5")
                            {
                                $flag5 = 1;
                                echo "<a id='loc5' class='map_part5_circle_yellow' title='Position 5 (75, 360)'></a>";
                            }
                        }
                        if ($flag6 != 1)
                        {
                            if ($location == "l6")
                            {
                                $flag6 = 1;
                                echo "<a id='loc6' class='map_part6_circle_yellow' title='Position 6 (130, 241)'></a>";
                            }
                        }
                        if ($flag7 != 1)
                        {
                            if ($location == "l7")
                            {
                                $flag7 = 1;
                                echo "<a id='loc7' class='map_part7_circle_yellow' title='Position 7 (240, 241)'></a>";
                            }
                        }
                        if ($flag8 != 1)
                        {
                            if($location == "l8")
                            {
                                $flag8 = 1;
                                echo "<a id='loc8' class='map_part8_circle_yellow' title='Position 8 (280, 302)'></a>";
                            }
                        }
                        if($flag9 != 1)
                        {
                            if ($location == "l9")
                            {
                                $flag9 = 1;
                                echo "<a id='loc9' class='map_part9_circle_yellow' title='Position 9 (350, 144)'></a>";
                            }
                        }
                        if($flag10 != 1)
                        {
                            if ($location == "l10")
                            {
                                $flag10 = 1;
                                echo "<a id='loc10' class='map_part10_circle_yellow' title='Position 10 (540, 203)'></a>";
                            }
                        }
                    }
                }
            }
        }
        
    }
    /*Set the green circles to coordinates assigned to other users.*/
    //$result = queryMysql("Select user_id, coor_id, datetime from transaction where user_id = '$user'");
    $result = queryMysql("Select user_id, coor_id, datetime from transaction where user_id <> '$user'");
    $num = $result->num_rows;
    for ($i = 0; $i < $num; $i++)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        //if ($row["user_id"] == $user)
        if ($row["user_id"] != $user)
        {
            $result2 = queryMysql("Select coordinates.coor_id, coor_location, available from coordinates inner join transaction on coordinates.coor_id = transaction.coor_id where user_id <> '$user' ");
            $num2 = $result2->num_rows;
            if ($num2 != 0)
            {
                for ($j =0; $j < $num2; $j++)
                {
                    $row2 = $result2->fetch_array(MYSQLI_ASSOC);
                    $avail = $avail["available"];
                    if ($row2["available"] == 0)
                    {
                        /*Locations selected by the logged user*/
                        $location = $row2["coor_location"];
                        if ($flag1 != 1)
                        {
                            if ($location == "l1")
                            {
                                $flag1 = 1;
                                echo "<a id='loc1' class='map_part1_circle_green' title='Position 1 (10, 20)'></a>";
                            }
                        }
                        if ($flag2 != 1)
                        {
                            if($location == "l2")
                            {
                                $flag2 = 1;
                                echo "<a id='loc2' class='map_part2_circle_green' title='Position 2 (30, 30)'></a>";
                            }
                        }
                        if ($flag3 != 1)
                        {
                            if($location == "l3")
                            {
                                $flag3 = 1;
                                echo "<a id='loc3' class='map_part3_circle_green' title='Position 3 (30, 180)'></a>";
                            }
                        }
                        if ($flag4 != 1)
                        {
                            if ($location == "l4")
                            {
                                $flag4 = 1;
                                echo "<a id='loc4' class='map_part4_circle_green' title='Position 4 (70, 290)'></a>";
                            }
                        }
                        if ($flag5 != 1)
                        {
                            if ($location == "l5")
                            {
                                $flag5 = 1;
                                echo "<a id='loc5' class='map_part5_circle_green' title='Position 5 (75, 360)'></a>";
                            }
                        }
                        if ($flag6 != 1)
                        {
                            if ($location == "l6")
                            {
                                $flag6 = 1;
                                echo "<a id='loc6' class='map_part6_circle_green' title='Position 6 (130, 241)'></a>";
                            }
                        }
                        if ($flag7 != 1)
                        {
                            if ($location == "l7")
                            {
                                $flag7 = 1;
                                echo "<a id='loc7' class='map_part7_circle_green' title='Position 7 (240, 241)'></a>";
                            }
                        }
                        if ($flag8 != 1)
                        {
                            if($location == "l8")
                            {
                                $flag8 = 1;
                                echo "<a id='loc8' class='map_part8_circle_green' title='Position 8 (280, 302)'></a>";
                            }
                        }
                        if($flag9 != 1)
                        {
                            if ($location == "l9")
                            {
                                $flag9 = 1;
                                echo "<a id='loc9' class='map_part9_circle_green' title='Position 9 (350, 144)'></a>";
                            }
                        }
                        if($flag10 != 1)
                        {
                            if ($location == "l10")
                            {
                                $flag10 = 1;
                                echo "<a id='loc10' class='map_part10_circle_green' title='Position 10 (540, 203)'></a>";
                            }
                        }
                        
                    }
                }
            }
        }
    }
    /*Set the rectangles in areas no assigned to any user.*/
    if ($flag1 == 0)
    {
        echo "<a id='loc1' class='map-part1' href='map.php?location1=l1' title='Position 1 (10, 20)'></a>";
    }
    if ($flag2 == 0)
    {
        echo "<a id='loc2' class='map_part2' href='map.php?location2=l2' title='Position 2 (30, 30)'></a>";
    }
    if ($flag3 == 0)
    {
        echo "<a id='loc3' class='map_part3' href='map.php?location3=l3' title='Position 3 (30, 180)'></a>";
    }
    if ($flag4 == 0)
    {
        echo "<a id='loc4' class='map_part4' href='map.php?location4=l4' title='Position 4 (70, 290)'></a>";
    }
    if ($flag5 == 0)
    {
        echo "<a id='loc5' class='map_part5' href='map.php?location5=l5' title='Position 5 (75, 360)'></a>";
    }
    if ($flag6 == 0)
    {
        echo "<a id='loc6' class='map_part6' href='map.php?location6=l6' title='Position 6 (130, 241)'></a>";
    }
    if ($flag7 == 0)
    {
        echo "<a id='loc7' class='map_part7' href='map.php?location7=l7' title='Position 7 (240, 241)'></a>";
    }
    if ($flag8 == 0)
    {
        echo "<a id='loc8' class='map_part8' href='map.php?location8=l8' title='Position 8 (280, 302)'></a>";
    }
    if ($flag9 == 0)
    {
        echo "<a id='loc9' class='map_part9' href='map.php?location9=l9' title='Position 9 (350, 144)'></a>";
    }
    if ($flag10 == 0)
    {
        echo "<a id='loc10' class='map_part10' href='map.php?location10=l10' title='Position 10 (540, 203)'></a>";
    }
    
    /* This section colors the available position when the user clicks on it
     * Fist I check the value of the location clicked and later I check if the
     * session variable assigned to that location is 0 or not, and I saved the new 
     * state on the session variable.*/
    if (isset ($_GET["location1"]) == 'l1' && isset($_SESSION['flagco1']) == 0 )
    {
        $_SESSION['flagco1'] = 1;
    }
    if (isset($_GET["location2"]) == 'l2' && isset($_SESSION['flagco2']) == 0)
    {
        $_SESSION['flagco2'] = 1;
    }
    if (isset ($_GET["location3"]) == 'l3' && isset($_SESSION['flagco3']) == 0 )
    {
        $_SESSION['flagco3'] = 1;
    }
    if (isset($_GET["location4"]) == 'l4' && isset($_SESSION['flagco4']) == 0)
    {
        $_SESSION['flagco4'] = 1;
    }
    if (isset ($_GET["location5"]) == 'l5' && isset($_SESSION['flagco5']) == 0 )
    {
        $_SESSION['flagco5'] = 1;
    }
    if (isset($_GET["location6"]) == 'l6' && isset($_SESSION['flagco6']) == 0)
    {
        $_SESSION['flagco6'] = 1;
    }
    if (isset ($_GET["location7"]) == 'l7' && isset($_SESSION['flagco7']) == 0 )
    {
        $_SESSION['flagco7'] = 1;
    }
    if (isset($_GET["location8"]) == 'l8' && isset($_SESSION['flagco8']) == 0)
    {
        $_SESSION['flagco8'] = 1;
    }
    if (isset ($_GET["location9"]) == 'l9' && isset($_SESSION['flagco9']) == 0 )
    {
        $_SESSION['flagco9'] = 1;
    }
    if (isset($_GET["location10"]) == 'l10' && isset($_SESSION['flagco10']) == 0)
    {
        $_SESSION['flagco10'] = 1;
    }
    /* Here I check if the session variable change the state and I set a circle colored 
     * to visualy notice that location will be saved for the user.*/
    if (isset($_SESSION['flagco1']) == 1)
    {
        echo "<a id='loc1' class='map_part1_circle_selected' title='Position 1 (10, 20)'></a>";
    }
    if (isset($_SESSION['flagco2']) == 1)
    {
        echo "<a id='loc2' class='map_part2_circle_selected' title='Position 2 (30, 30)'></a>";
    }
    if (isset($_SESSION['flagco3']) == 1)
    {
        echo "<a id='loc3' class='map_part3_circle_selected' title='Position 3 (30, 180)'></a>";
    }
    if (isset($_SESSION['flagco4']) == 1)
    {
        echo "<a id='loc4' class='map_part4_circle_selected' title='Position 4 (70, 290)'></a>";
    }
    if (isset($_SESSION['flagco5']) == 1)
    {
        echo "<a id='loc5' class='map_part5_circle_selected' title='Position 5 (75, 360)'></a>";
    }
    if (isset($_SESSION['flagco6']) == 1)
    {
        echo "<a id='loc6' class='map_part6_circle_selected' title='Position 6 (130, 241)'></a>";
    }
    if (isset($_SESSION['flagco7']) == 1)
    {
        echo "<a id='loc7' class='map_part7_circle_selected' title='Position 7 (240, 241)'></a>";
    }
    if (isset($_SESSION['flagco8']) == 1)
    {
        echo "<a id='loc8' class='map_part8_circle_selected' title='Position 8 (280, 302)'></a>";
    }
    if (isset($_SESSION['flagco9']) == 1)
    {
        echo "<a id='loc9' class='map_part9_circle_selected' title='Position 9 (350, 144)'></a>";
    }
    if (isset($_SESSION['flagco10']) == 1)
    {
        echo "<a id='loc10' class='map_part10_circle_selected' title='Position 10 (540, 203)'></a>";
    }
    echo "</div>";
    echo "<br><br>";
    
    
    /*Save Data*/
    if (isset($_POST['Save']))
    {
        /*Two steps: 1) Insert a new new value in transactions (INSERT INTO....), 2) Update coordinates (UPDATE ....)*/
        if (isset($_SESSION['flagco1']) == 1)
        {   /*       
            queryMySQL("INSERT INTO transaction values ('$user', 1, NOW())");
            queryMySQL("UPDATE coordinates SET coor_location = 'l1', available = 0 where coor_id = 1");
            $message = "Location saved succefully.<br>";
            */
            $result = queryMysql("Select coor_id from transaction where coor_id = 1");
            if ($result->num_rows == 0)
            {
                $result = queryMySQL("INSERT INTO transaction values ('$user', 1, NOW())");
                $result = queryMySQL("UPDATE coordinates SET coor_location = 'l1', available = 0 where coor_id = 1");
                $message = "Location saved succefully.<br>";
            }
            else
            {
                $message = " Location already taken, reload your browser to see new changes.<br>";
            }
            
        }
        if (isset($_SESSION['flagco2']) == 1)
        {
            /*
            queryMySQL("INSERT INTO transaction VALUES ('$user', 2, NOW())");
            queryMySQL("UPDATE coordinates SET coor_location = 'l2', available = 0 where coor_id = 2");
            $message = "Location saved succefully.<br>";
            */
            $result = queryMysql("Select coor_id from transaction where coor_id = 2");
            if ($result->num_rows == 0)
            {
                queryMySQL("INSERT INTO transaction VALUES ('$user', 2, NOW())");
                queryMySQL("UPDATE coordinates SET coor_location = 'l2', available = 0 where coor_id = 2");
                $message = "Location saved succefully.<br>";
            }
            else
            {
                $message = " Location already taken, reload your browser to see new changes.<br>";
            }
        }
        if (isset($_SESSION['flagco3']) == 1)
        {
            /*
            queryMySQL("INSERT INTO transaction values ('$user', 3, NOW())");
            queryMySQL("UPDATE coordinates SET coor_location = 'l3', available = 0 where coor_id = 3");
            $message = "Location saved succefully.<br>";
            */
            $result = queryMysql("Select coor_id from transaction where coor_id = 3");
            if ($result->num_rows == 0)
            {
                queryMySQL("INSERT INTO transaction values ('$user', 3, NOW())");
                queryMySQL("UPDATE coordinates SET coor_location = 'l3', available = 0 where coor_id = 3");
                $message = "Location saved succefully.<br>";
            }
            else
            {
                $message = " Location already taken, reload your browser to see new changes.<br>";
            }
        }
        if (isset($_SESSION['flagco4']) == 1)
        {
            /*
            queryMySQL("INSERT INTO transaction values ('$user', 4, NOW())");
            queryMySQL("UPDATE coordinates SET coor_location = 'l4', available = 0 where coor_id = 4");
            $message = "Location saved succefully.<br>";
            */
            $result = queryMysql("Select coor_id from transaction where coor_id = 4");
            if ($result->num_rows == 0)
            {
                queryMySQL("INSERT INTO transaction values ('$user', 4, NOW())");
                queryMySQL("UPDATE coordinates SET coor_location = 'l4', available = 0 where coor_id = 4");
                $message = "Location saved succefully.<br>";
            }
            else
            {
                $message = " Location already taken, reload your browser to see new changes.<br>";
            }
        }
        if (isset($_SESSION['flagco5']) == 1)
        {
            /*
            queryMySQL("INSERT INTO transaction values ('$user', 5, NOW())");
            queryMySQL("UPDATE coordinates SET coor_location = 'l5', available = 0 where coor_id = 5");
            $message = "Location saved succefully.<br>";
            */
            $result = queryMysql("Select coor_id from transaction where coor_id = 5");
            if ($result->num_rows == 0)
            {
                queryMySQL("INSERT INTO transaction values ('$user', 5, NOW())");
                queryMySQL("UPDATE coordinates SET coor_location = 'l5', available = 0 where coor_id = 5");
                $message = "Location saved succefully.<br>";
            }
            else
            {
                $message = " Location already taken, reload your browser to see new changes.<br>";
            }
        }
        if (isset($_SESSION['flagco6']) == 1)
        {
            /*
            queryMySQL("INSERT INTO transaction values ('$user', 6, NOW())");
            queryMySQL("UPDATE coordinates SET coor_location = 'l6', available = 0 where coor_id = 6");
            $message = "Location saved succefully.<br>";
            */
            $result = queryMysql("Select coor_id from transaction where coor_id = 6");
            if ($result->num_rows == 0)
            {
                queryMySQL("INSERT INTO transaction values ('$user', 6, NOW())");
                queryMySQL("UPDATE coordinates SET coor_location = 'l6', available = 0 where coor_id = 6");
                $message = "Location saved succefully.<br>";
            }
            else
            {
                $message = " Location already taken, reload your browser to see new changes.<br>";
            }
        }
        if (isset($_SESSION['flagco7']) == 1)
        {
            /*
            queryMySQL("INSERT INTO transaction values ('$user', 7, NOW())");
            queryMySQL("UPDATE coordinates SET coor_location = 'l7', available = 0 where coor_id = 7");
            $message = "Location saved succefully.<br>";
            */
            $result = queryMysql("Select coor_id from transaction where coor_id = 7");
            if ($result->num_rows == 0)
            {
                queryMySQL("INSERT INTO transaction values ('$user', 7, NOW())");
                queryMySQL("UPDATE coordinates SET coor_location = 'l7', available = 0 where coor_id = 7");
                $message = "Location saved succefully.<br>";
            }
            else
            {
                $message = " Location already taken, reload your browser to see new changes.<br>";
            }
        }
        if (isset($_SESSION['flagco8']) == 1)
        {
            /*
            queryMySQL("INSERT INTO transaction values ('$user', 8, NOW())");
            queryMySQL("UPDATE coordinates SET coor_location = 'l8', available = 0 where coor_id = 8");
            $message = "Location saved succefully.<br>";
            */
            $result = queryMysql("Select coor_id from transaction where coor_id = 8");
            if ($result->num_rows == 0)
            {
                queryMySQL("INSERT INTO transaction values ('$user', 8, NOW())");
                queryMySQL("UPDATE coordinates SET coor_location = 'l8', available = 0 where coor_id = 8");
                $message = "Location saved succefully.<br>";
            }
            else
            {
                $message = " Location already taken, reload your browser to see new changes.<br>";
            }
        }
        if (isset($_SESSION['flagco9']) == 1)
        {
            /*
            queryMySQL("INSERT INTO transaction values ('$user', 9, NOW())");
            queryMySQL("UPDATE coordinates SET coor_location = 'l9', available = 0 where coor_id = 9");
            $message = "Location saved succefully.<br>";
            */
            $result = queryMysql("Select coor_id from transaction where coor_id = 9");
            if ($result->num_rows == 0)
            {
                queryMySQL("INSERT INTO transaction values ('$user', 9, NOW())");
                queryMySQL("UPDATE coordinates SET coor_location = 'l9', available = 0 where coor_id = 9");
                $message = "Location saved succefully.<br>";
            }
            else
            {
                $message = " Location already taken, reload your browser to see new changes.<br>";
            }
        }
        if (isset($_SESSION['flagco10']) == 1)
        {
            /*
            queryMySQL("INSERT INTO transaction values ('$user', 10, NOW())");
            queryMySQL("UPDATE coordinates SET coor_location = 'l10', available = 0 where coor_id = 10");
            $message = "Location saved succefully.<br>";
            */
            $result = queryMysql("Select coor_id from transaction where coor_id = 10");
            if ($result->num_rows == 0)
            {
                queryMySQL("INSERT INTO transaction values ('$user', 10, NOW())");
                queryMySQL("UPDATE coordinates SET coor_location = 'l10', available = 0 where coor_id = 10");
                $message = "Location saved succefully.<br>";
            }
            else
            {
                $message = " Location already taken, reload your browser to see new changes.<br>";
            }
        }
        
        if (isset($_SESSION['flagco1']) == 0 && isset($_SESSION['flagco2']) == 0 && isset($_SESSION['flagco3']) == 0 && 
            isset($_SESSION['flagco4']) == 0 && isset($_SESSION['flagco5']) == 0 && isset($_SESSION['flagco6']) == 0 &&
            isset($_SESSION['flagco7']) == 0 && isset($_SESSION['flagco8']) == 0 && isset($_SESSION['flagco9']) == 0 && 
            isset($_SESSION['flagco10']) == 0)
        {
            $message = "There is not selected location to save.<br>";
        }
        
        
        
        unset($_SESSION['flagco1']);
        unset($_SESSION['flagco2']);
        unset($_SESSION['flagco3']);
        unset($_SESSION['flagco4']);
        unset($_SESSION['flagco5']);
        unset($_SESSION['flagco6']);
        unset($_SESSION['flagco7']);
        unset($_SESSION['flagco8']);
        unset($_SESSION['flagco9']);
        unset($_SESSION['flagco10']);
        header("Refresh:2; map.php");
        
    }
    
    /*Delete Data*/
    if (isset($_POST['Delete']))
    {
        /* Two steps: First delete the transaction and update the coordinates to let them available
         * for another user.*/
        
        $resultSql = queryMySQL("SELECT user_id FROM transaction WHERE user_id='$user'");
        if ($resultSql->num_rows == 0)
        {
            $message = "There is not locations to delete.<br>";
            header("Refresh:2; map.php");
        }
        else
        {
            $resultSql = queryMysql("SELECT coor_id, user_id from transaction where user_id = '$user' ORDER BY datetime DESC LIMIT 1");
            $rowSql = $resultSql->fetch_array(MYSQLI_ASSOC);
            
            queryMySQL("DELETE FROM transaction where user_id = '$user' order by datetime desc limit 1");
            queryMysql("UPDATE coordinates SET available = 1 where coor_id = '".$rowSql['coor_id']."' ");
            $message = "Last location picked deleted succesfully.<br>";
            header("Refresh:2; map.php");
        }
    }
    
    echo "<table border='1'";
    echo "<tr><th>Position (X, Y)</th>";
    echo "<th>User</th></tr>";
    
    $resultSql = queryMysql("Select user_id, coor_id, datetime, user_id from transaction order by coor_id");
    $numTable = $resultSql->num_rows;
    for ($i = 0; $i < $numTable; $i++)
    {
        $rowSql = $resultSql->fetch_array(MYSQLI_ASSOC);
        echo "<tr>";
        if ($rowSql["coor_id"] == 1)
        {
            echo "<td>Position 1: 10, 20 </td>";
        }
        if ($rowSql["coor_id"] == 2)
        {
            echo "<td>Position 2: 30, 30 </td>";
        }
        if ($rowSql["coor_id"] == 3)
        {
            echo "<td>Position 3: 30, 180 </td>";
        }
        if ($rowSql["coor_id"] == 4)
        {
            echo "<td>Position 4: 70, 290 </td>";
        }
        if ($rowSql["coor_id"] == 5)
        {
            echo "<td>Position 5: 75, 360 </td>";
        }
        if ($rowSql["coor_id"] == 6)
        {
            echo "<td>Position 6: 130, 241 </td>";
        }
        if ($rowSql["coor_id"] == 7)
        {
            echo "<td>Position 7: 240, 241 </td>";
        }
        if ($rowSql["coor_id"] == 8)
        {
            echo "<td>Position 8: 280, 302 </td>";
        }
        if ($rowSql["coor_id"] == 9)
        {
            echo "<td>Position 9: 350, 144 </td>";
        }
        if ($rowSql["coor_id"] == 10)
        {
            echo "<td>Position 10: 540, 203 </td>";
        }
        echo "<td>" .$rowSql["user_id"]. "</td>";
        echo "</tr>";
    }
    echo "</table><br>";
echo <<<_END
    <form method='post' action='map.php'>$message
    <br>
    <span class='fieldname'>&nbsp;</span>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' name='Save' value='Save' title='Click here to save changes.'>
    <input type='submit' name='Delete' value='Delete' title='Click here to delete the last change you did.'>
    </form>
    <br>
_END;
?>
  </body>
</html>