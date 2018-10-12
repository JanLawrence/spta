<div class="content-wrapper">
    <div class="grid-margin stretch-card"">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>User Logs</h4>
                    </div>
                    <div class="col-sm-6" align="right">

                    </div>
                </div><br/><br/><br/>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover  dataTable">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>User Type</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Log</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $data = $this->Query_model->page_list('tbl_user_logs');

                                    if(!empty($data)){
                                        $i = 0;
                                        foreach ($data as $each){

                                            $profile = array();
                                            if($each->user_type == "admin"){
                                                $user = $this->Query_model->get_row('tbl_admin','id',$each->user_id)->result_array();
                                                $profile = $user[0];
                                            }else if($each->user_type == "teacher"){
                                                $user = $this->Query_model->get_row('tbl_teacher','id',$each->user_id)->result_array();
                                                $profile = $user[0];
                                            }else if($each->user_type == "student"){
                                                $user = $this->Query_model->get_row('tbl_students','id',$each->user_id)->result_array();
                                                $profile = $user[0];
                                            }else if($each->user_type == "parent"){
                                                $user = $this->Query_model->get_row('tbl_guardian','id',$each->user_id)->result_array();
                                                $profile = $user[0];
                                            }

                                            ?>
                                            <tr>
                                                <td><?= date('m/d/Y H:i a',strtotime($each->transaction_date)) ?></td>
                                                <td><?= $each->user_type ?></td>
                                                <td><?= $profile['first_name'] ?></td>
                                                <td><?= $profile['last_name'] ?></td>
                                                <td><?= $each->transaction ?></td>
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