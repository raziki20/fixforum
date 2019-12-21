
    <div class="container">
<?php
            $sql2 = "SELECT * FROM kategori ";
            $result2 = mysqli_query($database,$sql2);
        while($rws2 = mysqli_fetch_assoc($result2)){
            $kategori_id = $rws2["kategori_id"];
            $nama_kat = $rws2["kategori_name"];
            $sql = "SELECT * FROM notice_topic where notice_topic_kategori LIKE '%$kategori_id%' ORDER BY notice_topic_time";
            $result = mysqli_query($database,$sql);
            $rws_count = mysqli_num_rows($result);
?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><?php echo $nama_kat; ?></h3>
                    </div>
<?php
                if($rws_count == 0){          
?>
                    <h4 class="text-center">No Topics Yet</h4>
                </div>
<?php
                }
                else{          
?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th>Topic Name</th>
                                <th>Created By</th>
                            </tr>
                        </thead>
<?php                   
                    while($rws = mysqli_fetch_array($result)){
                        $temp_user_username = $rws['notice_topic_created_by'];
                        $sql_search_username = "SELECT * FROM user WHERE user_username = '$temp_user_username'";
                        $result_search_username = mysqli_query($database,$sql_search_username) or die(mysqli_error($database));
                        $rws_search_username = mysqli_fetch_array($result_search_username);
?>
                        <tbody>
                            <tr>
                                
                                <td><a href="notice-topic.php?notice_topic_id=<?php echo $rws['notice_topic_id'];?>"><?php echo $rws['notice_topic_name'];?></a></td>
                                <td><?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?></td>
                            </tr>
                        </tbody>
<?php   
                    }
?>
                    </table>           
                </div>
<?php
                }
        }
?>
    </div>
