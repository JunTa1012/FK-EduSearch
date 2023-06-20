<?php


if(isset($_POST['id'])){

    include "../../dbconnect.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Post_ID = validate($_POST['id']);

    $sql = "SELECT * FROM post WHERE Post_ID=$Post_ID";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
    }
    else{
      header("Location: ../User/DiscussionBoard.php");

    }

}else if($_POST['Update']){
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
    $Post_ID = validate($_POST['Post_ID']);

    if(empty($postTitle)){
        header("Location:../EditPost.php?id=$Post_ID&error= Post Title is required");
    }else if(empty($postContent)){
        header("Location:../EditPost.php?id=$Post_ID&error= Post Content is required");
    }else if(empty($postKeyword)){
        header("Location:../EditPost.php?id=$Post_ID&error= Post Keyword is required");
    }else if(empty($postCategory)){
        header("Location:../EditPost.php?id=$Post_ID&error= Post Category is required");
    }else if(empty($postDateTime)){
        header("Location:../EditPost.php?id=$Post_ID&error= Post Date Time is required");
    }else if(empty($postComment)){
        header("Location:../EditPost.php?id=$Post_ID&error= Post Comment is required");
    }else{
        $sql = "UPDATE post
        SET post_title='$postTitle',
        post_content='$postContent',
        post_keyword='$postKeyword',
        post_category='$postCategory',
        post_dateTime='$postDateTime',
        post_comment='$postComment',
        WHERE Post_ID=$Post_ID";

        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location:../User/DiscussionBoard.php?success=succesfully updated");
        }else{
            header("Location:../User/EditPost.php?id=$Post_ID&error=unknown error occured&$user_data");
        }
    }

}else{
  header("Location: ../User/DiscussionBoard.php");
}


?>