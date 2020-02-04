
    <div class="container">
<?php
            
            $sql = "SELECT * FROM user where user_id ";
            $result = mysqli_query($database,$sql);
            $rws_count = mysqli_num_rows($result);
?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Users</h3>
                    </div>
<?php
                if($rws_count == 0){          
?>
                    <h4 class="text-center">No Users Yet</h4>
                </div>
<?php
                }
                else{          
?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Acces</th>
                                <th>Username</th>
                                <th>Email</th>
                            </tr>
                        </thead>
<?php                   
                    while($rws = mysqli_fetch_array($result)){
                         $rws['user_username'];
                         $rws['user_email'];
?>
                        <tbody>
                            <tr>
                            <td><a href="components/delete-user.php?user_id=<?php echo $rws['user_id'];?>"> <i class="fa fa-trash"></i> </a></td>
                            <td><a href="my-profile.php?user_id=<?php echo $rws['user_id'];?>"><?php echo$rws['user_username'];?></a></td>
                            <td><?php echo $rws['user_email'];?></td>
                            </tr>
                        </tbody>
<?php   
                    }
?>
                    </table>           
                </div>
<?php
                }
        
?>
    </div>
