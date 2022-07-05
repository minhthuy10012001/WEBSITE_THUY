<?php
//Hàm login sau khi mạng xã hội trả dữ liệu về
function loginFromSocialCallBack($socialUser) {
    include './connect_db.php';
    $result = mysqli_query($con, "Select * from `user` WHERE `email` ='" . $socialUser['email'] . "'");
    if ($result->num_rows == 0) {
        $result = mysqli_query($con, "INSERT INTO `user` (`name`,`email`, `phone`) VALUES ('" . $socialUser['name'] . "', '" . $socialUser['email'] . "', '" . $socialUser['phone'] . "');");
        if (!$result) {
            echo mysqli_error($con);
            exit;
        }
        $result = mysqli_query($con, "Select `id`,`username`,`email` from `user` WHERE `email` ='" . $socialUser['email'] . "'");
    }
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['current_user'] = $user;
        header('Location: index.php');
    }
}
