<?php
    $num = $result = $flag1 = $flag2 = $flag3 = $flag4 = $flag5 = $flag6 = $flag7 = 0;
    $flag8 = $flag9 = $flag10 = 0;
    require_once 'header.php';
    
    echo "<br><span class='main'>Welcome to $appname,";
    if ($loggedin)
    {
        echo "$user, you are logged in.";
    }
    else 
    {
        echo ' please sign up and/or log in to join in.';
        echo "<div id='image' class='divcenter'>";
        /*Check which location is available and which one is not available.*/
        $result = queryMysql("Select coor_id, available from coordinates");
        $num = $result->num_rows;
        for ($i = 0; $i < $num; $i++)
        {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if ($flag1 != 1)
            {
                if ($row["coor_id"] == 1)
                {
                    //$flag1 = 1;
                    if ($row["available"] == 0)
                    {
                        $flag1 = 1;
                        echo "<a id='loc1' class='map_part1_circle_green' title='Position 1 (10, 20)'></a>";
                    }
                    else
                    {
                        $flag1 = 1;
                        echo "<a id='loc1' class='map_part1_circle_black' title='Position 1 (10, 20)'></a>";
                    }
                    
                }
            }
            
            if ($flag2 != 1)
            {
                if ($row["coor_id"] == 2)
                {
                    //$flag2 = 1;
                    if ($row["available"] == 0)
                    {
                        $flag2 = 1;
                        echo "<a id='loc2' class='map_part2_circle_green' title='Position 2 (30, 30)'></a>";
                    }
                    else
                    {
                        $flag2 = 1;
                        echo "<a id='loc2' class='map_part2_circle_black' title='Position 2 (30, 30)'></a>";
                    }
                    
                }
            }
            
            if ($flag3 != 1)
            {
                if ($row["coor_id"] == 3)
                {
                    //$flag3 = 1;
                    if ($row["available"] == 0)
                    {
                        $flag3 = 1;
                        echo "<a id='loc3' class='map_part3_circle_green' title='Position 3 (30, 180)'></a>";
                    }
                    else
                    {
                        $flag3 = 1;
                        echo "<a id='loc3' class='map_part3_circle_black' title='Position 3 (30, 180)'></a>";
                    }
                    
                }
            }
            
            if ($flag4 != 1)
            {
                if ($row["coor_id"] == 4)
                {
                    //$flag4 = 1;
                    if ($row["available"] == 0)
                    {
                        $flag4 = 1;
                        echo "<a id='loc4' class='map_part4_circle_green' title='Position 4 (70, 290)'></a>";
                    }
                    else
                    {
                        $flag4 = 1;
                        echo "<a id='loc4' class='map_part4_circle_black' title='Position 4 (70, 290)'></a>";
                    }
                    
                }
            }
            
            if ($flag5 != 1)
            {
                if ($row["coor_id"] == 5)
                {
                    //$flag5 = 1;
                    if ($row["available"] == 0)
                    {
                        $flag5 = 1;
                        echo "<a id='loc5' class='map_part5_circle_green' title='Position 5 (75, 360)'></a>";
                    }
                    else
                    {
                        $flag5 = 1;
                        echo "<a id='loc5' class='map_part5_circle_black' title='Position 5 (75, 360)'></a>";
                    }
                    
                }
            }

            if ($flag6 != 1)
            {
                if ($row["coor_id"] == 6)
                {
                    //$flag6 = 1;
                    if ($row["available"] == 0)
                    {
                        $flag6 = 1;
                        echo "<a id='loc6' class='map_part6_circle_green' title='Position 6 (130, 241)'></a>";
                    }
                    else
                    {
                        $flag6 = 1;
                        echo "<a id='loc6' class='map_part6_circle_black' title='Position 6 (130, 241)'></a>";
                    }
                    
                }
            }
            
            if ($flag7 != 1)
            {
                if ($row["coor_id"] == 7)
                {
                    //$flag7 = 1;
                    if ($row["available"] == 0)
                    {
                        $flag7 = 1;
                        echo "<a id='loc7' class='map_part7_circle_green' title='Position 7 (240, 241)'></a>";
                    }
                    else
                    {
                        $flag7 = 1;
                        echo "<a id='loc7' class='map_part7_circle_black' title='Position 7 (240, 241)'></a>";
                    }
                    
                }
            }
            
            if ($flag8 != 1)
            {
                if ($row["coor_id"] == 8)
                {
                    //$flag8 = 1;
                    if ($row["available"] == 0)
                    {
                        $flag8 = 1;
                        echo "<a id='loc8' class='map_part8_circle_green' title='Position 8 (280, 302)'></a>";
                    }
                    else
                    {
                        $flag8 = 1;
                        echo "<a id='loc8' class='map_part8_circle_black' title='Position 8 (280, 302)'></a>";
                    }
                    
                }
            }
            
            if ($flag9 != 1)
            {
                if ($row["coor_id"] == 9)
                {
                    //$flag9 = 1;
                    if ($row["available"] == 0)
                    {
                        $flag9 = 1;
                        echo "<a id='loc9' class='map_part9_circle_green' title='Position 9 (350, 144)'></a>";
                    }
                    else
                    {
                        $flag9 = 1;
                        echo "<a id='loc9' class='map_part9_circle_black' title='Position 9 (350, 144)'></a>";
                    }
                    
                }
            }
            
            if ($flag10 != 1)
            {
                if ($row["coor_id"] == 10)
                {
                    //$flag10 = 1;
                    if ($row["available"] == 0)
                    {
                        $flag10 = 1;
                        echo "<a id='loc10' class='map_part10_circle_green' title='Position 10 (540, 203)'></a>";
                    }
                    else
                    {
                        $flag10 = 1;
                        echo "<a id='loc10' class='map_part10_circle_black' title='Position 10 (540, 203)'></a>";
                    }
                    
                }
            }
        }
        echo "</div>";
        echo "<br><br>";
    }
?>
			</span>
		</body>
	<//html>