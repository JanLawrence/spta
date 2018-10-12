<div class="content-wrapper">
    <div class="grid-margin stretch-card col-md-12" >
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4><?= $form_title ?></h4>
                    </div>

                </div><br/>
                <div class="row">
                    <div class="col-sm-12">
                        <form class="forms-sample" action="<?= base_url($form_link)?>" method="post">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="exampleInputName0">School ID</label>
                                        <input class="form-control" id="exampleInputName0" value="<?= $school_id ?>" type="text" name="school_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">First Name</label>
                                        <input class="form-control" id="exampleInputName1" value="<?= $first_name ?>" type="text" name="first_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName21">Middle Name</label>
                                        <input class="form-control" id="exampleInputName21" value="<?= $middle_name ?>" type="text" name="middle_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName2">Last Name</label>
                                        <input class="form-control" id="exampleInputName2" value="<?= $last_name ?>" type="text" name="last_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName3">Phone</label>
                                        <input class="form-control" id="exampleInputName3" value="<?= $phone ?>" type="text" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName31">Address</label>
                                        <input class="form-control" id="exampleInputName31" value="<?= $address ?>" type="text" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName6">Email</label>
                                        <input class="form-control" id="exampleInputName6" value="<?= $email ?>" type="email" name="email">
                                    </div>

                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="exampleInputName11">Guardian First Name</label>
                                        <input class="form-control" id="exampleInputName11" value="<?= $guardian_first_name ?>" type="text" name="guardian_first_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName211">Guardian Last Name</label>
                                        <input class="form-control" id="exampleInputName211" value="<?= $guardian_last_name ?>" type="text" name="guardian_last_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName2111">Guardian Email</label>
                                        <input class="form-control" id="exampleInputName2111" value="<?= $guardian_email ?>" type="email" name="guardian_email">
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                                        <a href="<?= base_url('students')?>">
                                            <button type="button" class="btn btn-light">Cancel</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>