<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Contact details</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="name" class="form-control" />
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="text" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label>Street</label>
                <input type="text" name="street" class="form-control" />
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control"/>
            </div>
            <div class="form-group">
                <label>zipcode</label>
                <input type="text" name="zipcode" class="form-control" />
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
            <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
        </form>
    </div>
</div>