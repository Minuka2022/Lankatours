<?php
if (isset($_POST['submit'])) {

    $to = 'ayodyakcc@gmail.com';
    $subject = 'New Customized Tour Request';



    $headers = "From: " . strip_tags($_POST["email"]) . "\r\n";
    $headers .= "Reply-To: " . strip_tags($_POST["email"]) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = '<p><b>Customized Tour Request From ';

    if (!empty($_POST['name'])) {
        $name = $_POST["name"];
        $message = $message . $name . '</b><br>';
    }

    $message = $message . '<p><b>Language Selection:</b></p>';


    if (!empty($_POST['language'])) {
        // $languages = $_POST["language"];
        foreach ($_POST['language'] as $value) {
            // echo $value . '<br>';
            $message = $message . $value . '<br>';

        }

    }


    if (!empty($_POST['other-language'])) {
        $otherLang = $_POST["other-language"];
        // echo $otherLang;
        $message = $message . $otherLang . '<br>';
    }

    $message = $message . '<p><b>Vacation Type:</b></p>';

    if (!empty($_POST['vacation-type'])) {
        // $vacationType = $_POST["vacation-type"];
        foreach ($_POST['vacation-type'] as $value) {
            // echo $value . '<br>';
            $message = $message . $value . '<br>';
        }
    }


    $message = $message . '<p><b>Accommodation Type:</b></p>';


    if (!empty($_POST['accommodation'])) {
        $accommodation = $_POST["accommodation"];
        // echo $accommodation . '<br>';
        $message = $message . $accommodation . '<br>';
    }



    $message = $message . '<p><b>Additional Services:</b></p><br>';

    if (!empty($_POST['additional'])) {
        // $additional = $_POST["additional"];
        foreach ($_POST['additional'] as $value) {
            // echo $value . '<br>';
            $message = $message . $value . '<br>';
        }
    }


    $message = $message . '<p><b>Message:</b></p>';


    if (!empty($_POST['user-message'])) {
        $userMessage = $_POST["user-message"];
        $message = $message . $userMessage . '<br>';
    }



    $message = $message . '<p><b>Adults:</b></p>';
    if (!empty($_POST['adults'])) {
        $adults = $_POST["adults"];
        $message = $message . $adults . '<br>';
    }


    $message = $message . '<p><b>Children:</b></p>';
    if (!empty($_POST['children'])) {
        $children = $_POST["children"];
        $message = $message . $children . '<br>';
    }


    $message = $message . '<p><b>Start Date:</b></p>';
    if (!empty($_POST['start'])) {
        $start = $_POST["start"];
        $message = $message . $start . '<br>';
    }


    $message = $message . '<p><b>End Date:</b></p>';
    if (!empty($_POST['end'])) {
        $end = $_POST["end"];
        $message = $message . $end . '<br>';
    }


    $message = $message . '<p><b>Flight Number:</b></p>';
    if (!empty($_POST['flight'])) {
        $flight = $_POST["flight"];
        $message = $message . $flight . '<br>';
    }

    $message = $message . '<p><b>Email:</b></p>';

    if (!empty($_POST['email'])) {
        $email = $_POST["email"];
        $message = $message . $email . '<br>';
    }

    // echo $message;

    mail($to, $subject, $message, $headers);

    header("Location: " . "/thank-you");
}
?>