<div class="content-wrapper">
    <div class="grid-margin stretch-card"">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Subjects</h4>
                    </div>
                    <div class="col-sm-6" align="right">
                        <a href="<?= base_url('subjects/add')?>">
                            <button type="button" class="btn btn-primary btn-sm ">
                                <i class="mdi mdi-plus"></i>New Subject</button></a>
                    </div>
                </div><br/><br/><br/>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover  dataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $subjects = $this->Query_model->page_list('tbl_subject');

                                    if(!empty($subjects)){
                                        $i = 0;
                                        foreach ($subjects as $each){
                                            ?>
                                            <tr>
                                                <td><?= ++$i ?></td>
                                                <td><?= $each->subject_name ?></td>
                                                <td>
                                                    <a href="<?= base_url('subjects/add/'.$each->id)?>">
                                                        <button type="button" class="btn btn-sm btn-success  btn-action">
                                                            <i class="mdi mdi-pencil text-xl-center"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                    <a href="<?= base_url('subject/delete/'.$each->id)?>" class="delete_subject">
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