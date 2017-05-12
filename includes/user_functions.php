<?php
//-----------------------------------------------------------------------
// not used function. for next upgrade
//-----------------------------------------------------------------------

function find_all_users()
{
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM users ";
    $query .= "ORDER BY username ASC";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);
    return $user_set;
}

function find_user_by_id($user_id)
{
    global $connection;

    $safe_user_id = mysqli_real_escape_string($connection, $user_id);

    $query = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE id = {$safe_user_id} ";
    $query .= "LIMIT 1";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);
    if ($user = mysqli_fetch_assoc($user_set)) {
        return $user;
    } else {
        return null;
    }
}

function find_user_by_username($username)
{
    global $connection;

    $safe_username = mysqli_real_escape_string($connection, $username);

    $query = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE username = '{$safe_username}' ";
    $query .= "LIMIT 1";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);
    if ($admin = mysqli_fetch_assoc($user_set)) {
        return $user;
    } else {
        return null;
    }
}

function attempt_user_login($username, $password)
{
    $user = find_admin_by_username($username);
    if ($user) {
        if (password_check($password, $user["hashed_password"])) {
            return $user;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function logged_in()
{
    return isset($_SESSION['user_id']);
}

function confirm_logged_in()
{
    if (!logged_in()) {
        redirect_to("login.php");
    }
}

