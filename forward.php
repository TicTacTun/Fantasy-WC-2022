<?php require_once ("datbasecon.php");?>
<?php
    session_start();

                       
    function writeMsgt($conn,$sql) {
        
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            $id = $row['Player_ID'];
            
            
            
            echo '<tr>
                    
                    <td>'.$row['Country'].'</td>
                    <td>'.$row['Player_ID'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td>'.$row['Name'].'</td>                               
                
                    <td> 
                        
                        <button class="btn btn-success btn-sm" name = "button0">
                            <a href = "forward.php?addid='.$id.'" class="text-light" >     
                                Add Player

                            </a>
                        </button>

                    </td>
                </tr>';
        }
    }
                    

    if (isset($_GET['addid'])){
        $id = $_GET['addid'];
        $name = $_SESSION['name'];
        $sqlF = "Select * FROM $name where Position='Forward'";
        
        $resultF = mysqli_query($conn,$sqlF);
        if ((mysqli_num_rows($resultF)<3)) {
            $sql = "INSERT INTO  $name (Name, Position,Country,Player_ID) SELECT Name, Position,Country,Player_ID FROM players where Player_ID =$id;";
            $result = mysqli_query($conn,$sql);
            if ($result ){
                
                header('location:forward.php');
            }
            else{
                mysqli_error($conn);
            }
        
        }
        else{
            header('location: mid_fielder.php');
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
    <title> Forward</title>
</head>

<body>
    
    <div class='bg'>
        <div>
            <header>Team Creation</header>
            <header>Choose Your Forward Players</header>
        </div> 
       
        
        <div class="column1" >
            <h2 style='font-family: "Times New Roman", Times, serif;'>Forward</h2>
            <table class = 'table table-striped'>
                <thead class = 'p-3 mb-2 bg-dark text-white'>
                    <tr>
                        <th >Country</th>
                        <th >PLayer ID</th>
                        <th>Position</th>
                        <th >Name</th>                                                     
                        <th>Select</th>
                    </tr>
                </thead>
                <?php                            
                    $sql = "Select * FROM players where Position='Forward' ";
                    writeMsgt($conn,$sql);  
                ?>
                <!---- ---------------------------------------------------  -->
            </table>
        </div>
        
        
            
        
    <div>  
  
</body>
</html>