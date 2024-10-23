<?php
/*
 * Template Name: Lost Password
 */
get_header();

if (isset($_POST['user_login'])) {
    // Handle the form submission for initiating password reset
    $user_login = sanitize_text_field($_POST['user_login']);
    $user_data = get_user_by('login', $user_login);

    if ($user_data) {
        $user_email = $user_data->user_email;

        // Generate and send password reset email
        $reset_key = get_password_reset_key($user_data);
        $reset_url = esc_url(add_query_arg(['action' => 'rp', 'key' => $reset_key, 'login' => rawurlencode($user_login)], wp_login_url()));

        // Send the reset link to the user's email
        $subject = 'Password Reset';
        $message = 'Click the following link to reset your password: ' . $reset_url;
        wp_mail($user_email, $subject, $message);

        echo '<p class="message">Password reset link has been sent to your email address.</p>';
    } else {
        echo '<p class="error">Invalid username. Please try again.</p>';
    }
}

// Display the password reset form
?>
<div id="lostpassword-form">
    <form id="lostpassword" action="<?php echo esc_url(home_url('/lostpassword/')); ?>" method="post">
        <p>
            <label for="user_login">Username or Email:</label>
            <input type="text" name="user_login" id="user_login" class="input" value="" size="20" autocapitalize="off" />
        </p>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Reset Password" />
        </p>
    </form>
</div>

<?php
get_footer();
?>
