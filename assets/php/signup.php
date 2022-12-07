<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $role = mysqli_real_escape_string($conn, $_POST['role']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //check if email is valid 
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){  //if email is valid
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");//уже существует в бд или нет?
            if(mysqli_num_rows($sql) > 0){  //уже существует в бд
                echo "$email - This email already exist!";
            }else{  // не существует в бд, пропускаем
                if(isset($_FILES['image'])){ //проверка если пользователь загрузил фотографию. 
                    //$_files returns array(file name,file type,error,file size,tmp_name)
                    $img_name = $_FILES['image']['name'];//get user uploaded img_name
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];//tmp name используется для сохранения/перемещения в папку
                    
                    //давайте исследуем изображение и получим последнее расширение, например jpg png
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);//здесь мы получаем расширения загруженного пользователем файла изображения
    
                    $extensions = ["jpeg", "png", "jpg"];  // valid img extensions 
                    if(in_array($img_ext, $extensions) === true){ //если пользоват загрузил разрешенное разрешение фото 
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time(); //нам нужно это время, потому что, когда мы загружаем изображение пользователя в нашу папку, мы переименовываем файл пользователя с текущим временем. т.о все имг файлы будут иметь свое уникальное имя
                            $new_img_name = $time.$img_name;    
                            if(move_uploaded_file($tmp_name,"./../images/chat_images/".$new_img_name)){  //перемещение имг в соотв папку
                               //    ../images/chat_images/
                                $ran_id = rand(time(), 100000000);//random id
                                $status = "Active now"; // при авторизации помечается как активный статус юзера на сайте
                                $encrypt_pass = md5($password);
                                //insert user data in db(users)
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status, role)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}' , '{$role}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];//используем юникИД из сессии 
                                        echo "success";
                                    }else{
                                        echo "This email address not Exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>