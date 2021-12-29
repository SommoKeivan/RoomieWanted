<div class="container">
    <div class="justify-content-center row no-gutters">
        <form class="form-signin" method="POST" action="index.php">
            <div class="">
                <h1 class="col-10 h3 mb-3 font-weight-normal">Login</h1>
            </div>
            <div class="form-group row">
                <div class="col-12 col-md-6">
                    <label for="username" class="col-form-label text-md-right">Username</label> 
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" id="username" class="form-control" name="username" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-md-6">
                    <label for="password" class="col-form-label text-md-right">Password</label> 
                </div>
                <div class="col-12 col-md-6">
                    <input type="password" id="password" class="form-control" name="password" required>
                </div>
            </div>
            <button class="btn btn-block rounded orange-button" type="submit">Sign in</button>
        </form>
    </div>
</div>