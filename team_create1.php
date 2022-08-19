<?php require_once ("datbasecon.php");?>
<?php
    session_start();

                       
    function writeMsgt($conn,$sql) {
        
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            $id = $row['Name'];
            
            
            
            echo '<tr>
                    
                    <td>'.$row['Country'].'</td>
                    <td>'.$row['Player_ID'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td>'.$row['Name'].'</td>                               
                
                    <td> 
                        
                        <button class="btn btn-success btn-sm" name = "button0">
                            <a href = "team_create1.php?addid='.$id.'" class="text-light" >     
                                remove

                            </a>
                        </button>

                    </td>
                </tr>';
        }
    }
                           
                      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="team_create_backgroun1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <title> Fantasy Team Selection</title>
</head>

<body>
    
    <div class='bg'>
        <div>
            <header>Here is Your Fantasy Team</header> 
        </div> 
        
        <div class="column5">
            <h2 style='font-family: "Times New Roman", Times, serif;'>Fantasy Team</h2>
            <table class = 'table table-striped'>
                <thead class= 'class="p-3 mb-2 bg-dark text-white'>
                    <tr>
                        <th >Country</th>
                        <th >Points</th>
                        <th>Ranking</th>
                        <th>Position</th>
                        <th >Name</th>                                                     
                        <th>Select</th>
                    </tr>
                </thead>
                <?php
                    
                    $name11 = $_SESSION['name'];
                    $sql11 = "SELECT * FROM $name11 ";
                    $query = mysqli_query($conn,$sql11);
                    $row = mysqli_num_rows($query);
                    
                    $result = $conn->query($sql11);
                    while ($row = $result->fetch_assoc()){
                        $id = $row['Player_ID'];
                        
                        echo '<tr>
                                
                                <td>'.$row['Country'].'</td>
                                
                                <td>'.$row['Player_ID'].'</td>
                                <td>'.$row['Name'].'</td>
                                <td>'.$row['Position'].'</td>                               
                            
                                <td>         
                                    <button class="btn btn-success btn-sm" name = "button1">
                                        <a href = "deleteplayerfant.php?deleteid='.$id.'" class="text-light" > 
                                            Remove
                                        </a>
                                    </button>
                                
                                </td>
                            </tr>';
                    }
                    

                ?>
                
            </table>
        </div>  
    
    </div> 
  
</body>
</html>









<?php  
    /*  
    
    <a href = "addplayerfant.php" class="text-light" > 
    
    
    
    function writeMsgt2($conn,$sql) {
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            $id = $row['Name'];
            
            echo '<tr>
                    
                    <td>'.$row['Points'].'</td>
                    <td>' .$row['Ranking'].'</td>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Position'].'</td>                               
                
                    <td>         
                        <button class="btn btn-success btn-sm" name = "button1">
                            <a href = "deleteplayerfant.php?deleteid='.$id.'" class="text-light" > 
                                Remove
                            </a>
                        </button>
                    
                    </td>
                </tr>';
        }
    }
    $table_name='abraca';

    $sql = "Select * FROM abraca where Position='Forward'";
    writeMsgt2($conn,$sql);  */
?>