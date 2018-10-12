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
                            <div class="form-group">
                                <label for="exampleInputName1">First Name</label>
                                <input class="form-control" id="exampleInputName1" value="<?= $first_name ?>" type="text" name="first_name">
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
                                <label for="exampleInputName4">Advisory</label>
                                <input class="form-control" id="exampleInputName4" value="<?= $advisory ?>" type="text" name="advisory">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName5">Subject</label>
                                <select class="form-control" id="exampleInputName5" name="subject">
                                     <?php

                                        $subjects = $this->Query_model->page_list('tbl_subject');

                                        if(!empty($subjects)){
                                            $i = 0;
                                            foreach ($subjects as $each){
                                                ?>
                                                    <option value="<?= $each->id?>"  <?= $subject == $each->id ? "selected" : "" ?>><?= $each->subject_name?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputName6">Email</label>
                                <input class="form-control" id="exampleInputName6" value="<?= $email ?>"  type="email" name="email">
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <a href="<?= base_url('teachers')?>"><button type="button" class="btn btn-light">Cancel</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>