<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
</head>

<body>
    <p>Hi {{ $name }}</p>
    <p>We received a request to reset your password. Click the link below to reset it:</p>
    <p><a href="{{ route('auth.passwordReset.show', $token) }}">Reset Password</a></p>
    <p>If you did not request a password reset, please ignore this email.</p>
</body>

</html>
