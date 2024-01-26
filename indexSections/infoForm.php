<section class="my-5" id="queryForm">
    <div class="py-5">
        <h2 class="text-center">Ask your Queries here</h2>
    </div>
    <div class="w-50 m-auto">
        <form action="indexSections/infoFormInsert.php" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" autocomplete="off" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Email-Id</label>
                <input type="email" name="email" id="" autocomplete="off" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Contact-no.</label>
                <input type="text" name="contact" id="" pattern="[7-9]{1}[0-9]{9}" autocomplete="off" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Queries</label>
                <textarea name="query" id="" cols="20" rows="10" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-info" name="submit">
            </div>
        </form>
    </div>
</section>
