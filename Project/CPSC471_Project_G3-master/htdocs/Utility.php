<?php
namespace Utility {
    // We store all constants here
    const database_host = "localhost";
    const database_user = "root";
    const database_password = "gMga2gv6ZVEgxwkGzsT7";
    const database_name = "cpsc_471_project_g3";

    // Create and return a connection, the user should manually close it
    function get_a_connection() {
        // Create connection
        $conn = mysqli_connect(database_host, database_user, database_password, database_name);

        // Check connection
        if (mysqli_connect_errno()) {
            exit("Failed to connect the database" . mysqli_connect_error());
        }
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conn->set_charset("utf8mb4");
        return $conn;
    }

    // Validate if the length of the item's description >= 5
    function description_min_length($description) {
        return (strlen($description) >= 5);
    }
    // Validate if the name of the item >= 3
    function item_min_length($name) {
        return (strlen($name) >= 3);
    }
    // Validate the item's condition
    function is_valid_item_condition($condition) {
        $temp = array('used_acceptable', 'used_good', 'used_very_good', 'used_open_box', 'new');
        return (in_array($condition, $temp));
    }
    // Validate the item's price/the total price of an item in the order
    function is_valid_price($price) {
        return ($price >= 0.00);
    }
    // Validate the item's type
    function is_valid_item_type($type) {
        $temp = array('books',
            'electronic_books',
            'consumer_electronics',
            'food',
            'personal_computers',
            'software',
            'sports_and_outdoors',
            'music',
            'musical_instrument',
            'video_games',
            'clothes',
            'office_products',
            'others');
        return (in_array($type, $temp));
    }
    // Validate the length of the comment
    function comment_min_length($content) {
        return strlen($content) >= 5;
    }
    // Validate the length of the password
    function password_min_length($password) {
        return strlen($password) >= 6;
    }
    // Validate the length of the username of clients and administrators
    function username_min_length($username) {
        return strlen($username) >= 6;
    }
    // Validate the length of the password question
    function password_question_min_length($question) {
        return strlen($question) >= 6;
    }
    // Validate the length of the answer of the password question
    function answer_for_password_question_min_length($answer) {
        return strlen($answer) >= 6;
    }

    // Validate the format of the phone number
    function is_valid_phone_number($phone_number) {
        if (strlen($phone_number) !== 13) {
            return false;
        }
        if ($phone_number[1] !=  '-')  {
            return false;
        }
        if ($phone_number[5] != '-') {
            return false;
        }
        if ($phone_number[9] !=  '-') {
            return false;
        }
        for ($i = 0; $i < 13; ++$i) {
            if ($i != 1 && $i != 5 && $i != 9)  {
                if (!is_numeric($phone_number[$i])) {
                    return false;
                }
            }
        }
        return true;
    }
    // Validate the email address
    function is_valid_email($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
    // Validate the gender
    function is_valid_gender($gender) {
        return ($gender === 'm' || $gender === "f");
    }
    // Validate the balance
    function is_valid_balance($balance) {
        return ($balance >= 0.00);
    }
    // Validate the length of the content in the announcement
    function content_minimum_length($content) {
        return strlen($content) >= 6;
    }
    // Validate the order status
    function is_valid_order_status($order_status) {
        $temp = array('order filled', 'order received', 'delivering', 'order finished');
        return (in_array($order_status, $temp));
    }
    // Validate the shipping method
    function is_valid_shipping_method($method) {
        return ($method === 'contact by buyer' || $method === 'online delivery');
    }
    // Validate the middle initial
    function is_valid_middle_initial($middle_initial) {
        if ($middle_initial === null) {
            return true;
        }
        if (strlen($middle_initial) === 1) {
            return ($middle_initial >= 'A' && $middle_initial <= 'Z');
        }
        return false;
    }
    // Validate the first/last name
    function is_valid_name($name) {
        if ($name === null) {
            return false;
        }
        return (preg_match('/^[A-Z]+$/',$name) == true);
    }
    // Valid the date of birth yyyy-mm-dd 1993-01-11
    function is_valid_date($date) {
        $tempDate = explode('-', $date);
        // checkdate(month, day, year)
        if (checkdate($tempDate[1], $tempDate[2], $tempDate[0])) {
            $year = (int)($tempDate[0]);
            if ($year < 1900 || $year > 2019) {
                return false;
            }
            if (strlen($tempDate[1]) != 2 || strlen($tempDate[2]) != 2) {
                return false;
            }
            return true;
        };
        return false;
    }
    // MD5 reverse and crypt
    function md5_rev_crypt($plaintext) {
        return md5(strrev(md5($plaintext)));
    }
    // Pop out an alert message
    function alert($message) {
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
