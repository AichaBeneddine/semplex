<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <style>
        body{
            background: whitesmoke;
            font-family: "Tajawal", sans-serif;
        }
        #mother{
            width: 100%;
            font-size: 20px;
        }
        main{
            float: left;
            border: 1px solid gray;
            padding: 5px;
        }
        input{
            padding: 4px;
            border: 2px solid black;
            text-align: center;
            font-size: 17px;
            font-family: "Tajawal", sans-serif;
            transition: .5s;
        }
        aside{
            text-align: center;
            width: 300px;
            float: right;
            border: 1px solid black;
            padding: 10px;
            font-size: 20px;
            background-color: silver;
            color: white;
        }
        #tab{
            width: 890px;
            font-size: 20px;
        }
        #tab th{
            background: silver;
            color: black;
            font-size: 20px;
            padding: 10px;
        }
        button{
            margin-top: 7px;
            width: 190px;
            font-size: 20px;
            border: none;
            font-family: "Tajawal", sans-serif;
            font-weight: bold;
            border-radius: 10px;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            transition: .5s;
        }
        /* .bt{
            display: flex;
            justify-content: space-around;
        } */
        button:hover{
            cursor: pointer;
            border: 1px solid green;
            transform: scale(1.1);

        }
        input:focus{
            border: none;
            background-color: silver;
            color: #fff;
            transform: scale(1.1);
            border-radius: 10px;
        }
        img{
            margin-top: 15px;
            border-radius: 100px;
        }
    </style>
</head>
<body dir="rtl">
    <?php

    $host='localhost';
    $user='root';
    $pass='';
    $bd='std';
    $con= mysqli_connect($host,$user,$pass,$bd);
    $res = mysqli_query($con,"select * from student");
    $id='';
    $name='';
    $addresss='';
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }if(isset($_POST['name'])){
        $name=$_POST['name'];
    }if(isset($_POST['addresss'])){
        $addresss=$_POST['addresss'];
    }
    $sqls='';
    if(isset($_POST['add'])){
        $sqls="insert into student value($id,'$name','$addresss')";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    if(isset($_POST['del'])){
        $sqls="delete from student where name= '$name'";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    ?>
    <div id="mother">
        <form method="POST">
            <aside>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTW-XOqdzlGTdHYrfOydgZn-cAi26kP2kX2tQ&usqp=CAU" alt="" style="height: 200px; width: 200px;">
                    <h3>لوحة المدير</h3>
                    <label for="id">رقم الطالب</label><br>
                    <input type="text" name="id" id="id"><br>
                    <label for="">إسم الطالب</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label for="">عنوان الطالب</label><br>
                    <input type="text" name="addresss" id="addresss">
                    <br><br>
                    <div class="bt">
                        <button name="add">إضافة طالب</button>
                        <button name="del"> حذف طالب</button>
                    </div>
                </div>
            </aside>
            <main>
                <table id="tab">
                    <tr>
                        <th>الرقم التسلسلي</th>
                        <th> إسم الطالب</th>
                        <th> عنوان الطالب</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['addresss']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </main>
        </form>
    </div>
   
</body>
</html>