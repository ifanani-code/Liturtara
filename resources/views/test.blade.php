<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>

<body>
    <h1>Welcome to the Platform!</h1>
    <p>Please choose your role to login:</p>

    <form id="roleForm">
        <label for="role">Select Role:</label>
        <select id="role" name="role" required>
            <option value="" disabled selected>-- Choose Role --</option>
            <option value="{{ route('caseowner.login') }}">Case Owner</option>
            <option value="{{ route('talent.login') }}">Talent</option>
            <option value="{{ route('reviewer.login') }}">Reviewer</option>
        </select>

        <button type="submit">Sign In</button>
    </form>

    <p>Or register if you don't have an account yet:</p>
    <ul>
        <li><a href="{{ route('caseowner.register') }}">Register as Case Owner</a></li>
        <li><a href="{{ route('talent.register') }}">Register as Talent</a></li>
        <li><a href="{{ route('reviewer.register') }}">Register as Reviewer</a></li>
    </ul>

    <script>
        document.getElementById('roleForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const selected = document.getElementById('role').value;
            if (selected) {
                window.location.href = selected;
            }
        });
    </script>
</body>

</html>
