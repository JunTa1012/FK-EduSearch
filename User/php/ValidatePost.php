<?php 
        if (isset($_POST['create'])){

            include "../../dbconnect.php";

            function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $postTitle = validate($_POST['postTitle']);
            $postContent = validate($_POST['postContent']);
            $postKeyword = validate($_POST['postKeyword']);
            $postCategory = validate($_POST['postCategory']);
            $postDateTime = validate($_POST['postDateTime']);
            $postComment = validate($_POST['postComment']);

            $user_data = 'postTitle=' . $postTitle . '&postContent=' .$postContent . '&postKeyword=' . $postKeyword . '&postCategory=' . $postCategory . '&postDateTime='. $postDateTime . '&postComment=' . $postComment;

            if(empty($postTitle)){
                header("Location:../CreateNewPost.php?error= Post Title is required&$user_data");
            }else if(empty($postContent)){
                header("Location:../CreateNewPost.php?error= Post Content is required&$user_data");
            }else if(empty($postKeyword)){
                header("Location:../CreateNewPost.php?error= Post Keyword is required&$user_data");
            }else if(empty($postCategory)){
                header("Location:../CreateNewPost.php?error= Post Category is required&$user_data");
            }else if(empty($postDateTime)){
                header("Location:../CreateNewPost.php?error= Post Date Time is required&$user_data");
            }else if(empty($postComment)){
                header("Location:../CreateNewPost.php?error= Post Comment is required&$user_data");
            }else{
                $sql = "INSERT INTO post(post_title, post_content, post_keyword, post_category, post_dateTime, post_comment) 
                        VALUES ('$postTitle', '$postContent', '$postKeyword', '$postCategory', '$postDateTime', '$postComment')";
                $result = mysqli_query($conn, $sql);

                if($result){
                    echo "Success";
                }else{
                    header("Location:../User/CreateNewPost.php?error=unknown error occured&$user_data");
                }
            }
        }
        
        ?>