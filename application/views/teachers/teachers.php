<div class="content-wrapper">
    <div class="grid-margin stretch-card"">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>List of Teachers</h4>
                    </div>
                    <div class="col-sm-6" align="right">
                        <a href="<?= base_url('teachers/add')?>">
                            <button type="button" class="btn btn-primary btn-sm ">
                                <i class="mdi mdi-plus"></i>New Teacher</button></a>
                    </div>
                </div><br/><br/><br/>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover  dataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Advisory</th>
                                <th>Subject</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $data = $this->Query_model->page_list('tbl_teacher');

                                    if(!empty($data)){
                                        $i = 0;
                                        foreach ($data as $each){
                                            $teacher_sub = $this->Query_model->get_row('tbl_teacher_subjects','teacher_id',$each->id)->result();
                                            $subject = $this->Query_model->get_row('tbl_subject','id',$teacher_sub[0]->subject_id)->result();

                                            $credentials = $this->Query_model->where_two_row('tbl_credentials','user_type','teacher','user_id',$each->id)->result();

                                            $enc = new EncryptPass();
                                            ?>
                                            <tr>
                                                <td><?= ++$i ?></td>
                                                <td><?= $each->first_name ?></td>
                                                <td><?= $each->last_name ?></td>
                                                <td><?= $each->phone ?></td>
                                                <td><?= $each->advisory ?></td>
                                                <td><?= $subject[0]->subject_name ?></td>
                                                <td ><?= $credentials[0]->username ?></td>
                                                <td ><?= $enc->pass_crypt($credentials[0]->password,'d') ?></td>
                                                <td>
                                                    <a href="<?= base_url('teachers/add/'.$each->id)?>">
                                                        <button type="button" class="btn btn-sm btn-success  btn-action">
                                                            <i class="mdi mdi-pencil text-xl-center"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                    <a href="<?= base_url('teachers/delete/'.$each->id)?>" class="delete_teacher">
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
