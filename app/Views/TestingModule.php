<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workflow System</title>
    <?= css_container() ?>
</head>
<body>
<?= ShowHeader() ?>
<main class="page-main">
    <div class="col-md-12 page-main-content mb-3">  
        <div class="col-md-4 mb-3 p-0">
            <label>First name:</label>
            <input type="text" class="form-control" id="FirstName" disabled>
        </div>
        <div class="col-md-4 mb-3 p-0">
            <label>Middle name:</label>
            <input type="text" class="form-control" id="MiddleName" disabled>
        </div>
        <div class="col-md-4 mb-3 p-0">
            <label>Last name:</label>
            <input type="text" class="form-control" id="LastName" disabled>
        </div>
        <div class="col-md-4 mb-3 p-0">
            <label>Username:</label>
            <input type="text" class="form-control" id="UserName" disabled>
        </div>
        <div class="col-md-4 mb-3 p-0">
            <label>Email address:</label>
            <input type="text" class="form-control" id="UserEmail" disabled>
        </div>
        <div class="col-md-4 mb-3 p-0">
            <label>User role:</label>
            <select class="form-control" id="UserRole" disabled>
                <option value="">Select an Option</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
    </div>
</main>
<?= ShowFooter() ?>
</body>
</html>