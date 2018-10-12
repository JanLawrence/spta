<div class="content-wrapper">
    <div class="grid-margin stretch-card col-md-6" style="margin: 5% auto">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4><?= $form_title ?></h4>
                    </div>

                </div><br/>
                <div class="row">
                    <div class="col-sm-12 ">
                        <form class="forms-sample" action="<?= base_url($form_link)?>" method="post">
                            <?php

                            if (validation_errors()) {
                                echo '<div class="alert alert-danger">';
                                echo validation_errors();
                                echo '</div>';
                            }
                            ?>
                            <div class="form-group">
                                <label for="exampleInputName1">Subject</label>
                                <input class="form-control" id="exampleInputName1" value="<?= $subject ?>" placeholder="" type="text" name="subject">
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <a href="<?= base_url('subjects')?>"><button type="button" class="btn btn-light">Cancel</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>