<div class="content-wrapper">
    <div class="grid-margin stretch-card"">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Students</h4>
                    </div>
                    <div class="col-sm-6" align="right">
                        <a href="<?= base_url('students/add')?>">
                            <button type="button" class="btn btn-primary btn-sm ">
                                <i class="mdi mdi-plus"></i>New Student</button></a>
                    </div>
                </div><br/><br/><br/>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover  dataTable">
                            <thead>
                            <tr>
<!--                                <th>#</th>-->
                                <!-- <th>School ID</th> -->
                                <th>School Number</th>
                                <th>Student Name</th>
<!--                                <th>First Name</th>-->
<!--                                <th>Middle Name</th>-->
<!--                                <th>Last Name</th>-->
<!--                                <th>Phone</th>-->
                                <th>Student <br/>Username</th>
                                <th>Student <br/>Password</th>
                                <th>Guardian Name</th>
                                <th>Guardian <br/>Username</th>
                                <th>Guardian <br/>Password</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $data = $this->Query_model->page_list('tbl_students');

                                    if(!empty($data)){
                                        $i = 0;
                                        foreach ($data as $each){
                                            $guardian = $this->Query_model->get_row('tbl_guardian','student_id',$each->id)->result();

                                            $Scredentials = $this->Query_model->where_two_row('tbl_credentials','user_type','student','user_id',$each->id)->result();
                                            $Gcredentials = $this->Query_model->where_two_row('tbl_credentials','user_type','parent','user_id',$guardian[0]->id)->result();

                                            $enc = new EncryptPass();
                                            ?>
                                            <tr>
<!--                                                <td>--><?//= ++$i ?><!--</td>-->
                                                <td><?= $each->school_id ?></td>
                                                <td><?= $each->first_name.' '.$each->middle_name.' '.$each->last_name ?></td>
<!--                                                <td><?= $each->first_name ?></td>-->
<!--                                                <td><?= $each->middle_name ?></td>-->
<!--                                                <td><?= $each->last_name ?></td>-->
<!--                                                <td><?= $each->phone ?></td>-->
                                                <td ><?= $Scredentials[0]->username ?></td>
                                                <td ><?= $enc->pass_crypt($Scredentials[0]->password,'d') ?></td>
                                                <td><?= $guardian[0]->first_name ?> <?= $guardian[0]->last_name ?></td>
                                                <td ><?= $Gcredentials[0]->username ?></td>
                                                <td ><?= $enc->pass_crypt($Gcredentials[0]->password,'d') ?></td>
                                                <td>
                                                    <a href="<?= base_url('students/add/'.$each->id)?>">
                                                        <button type="button" class="btn btn-sm btn-success  btn-action">
                                                            <i class="mdi mdi-pencil text-xl-center"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                    <a href="<?= base_url('students/delete/'.$each->id)?>" class="delete_student">
                                                        <button type="button" class="btn btn-sm btn-danger  btn-action">
                                                            <i class="mdi mdi-delete text-xl-center"></i>
                                                            Delete
                                                        </button>
                                                    </a>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>