<!-- Page Heading -->
<div class="d-lg-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>
<section>
    <div class="">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="../../<?php echo $children[0]['photo']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h4 class="my-3" id="name"><?php echo $children[0]['first_name'] . ' ' . $children[0]['middle_name'] . ' ' . $children[0]['last_name'] . ' ' . $children[0]['prefix']; ?></h4>
                            <div class="d-flex justify-content-center mb-2 mt-2">
                                <!-- edit profile -->
                                <input type="hidden" name="m_id" id="m_id" value="<?php echo $children[0]['mother_id']; ?>">
                                <button class="btn btn-primary" id="btn_edit_children" data-id="<?php echo $children[0]['id']; ?>" data-toggle="modal" data-target="#modal_edit_children"><i class="fa fa-edit"></i> Edit Children</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mother</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $mother[0]['first_name'] . ' ' . $mother[0]['middle_name'] . ' ' . $mother[0]['last_name']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Sex</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $children[0]['sex']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Date of Birth</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $children[0]['birthdate']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Age</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $children[0]['age']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Place of Birth</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $children[0]['birthplace']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Civil Status</p>
                            </div>
                            <div class="col-sm-9">
                                <?php
                                if (strtolower($children[0]['civil_status']) == 'other') {
                                ?>
                                    <p class="text-muted mb-0"><?php echo $children[0]['other_status']; ?></p>
                                <?php
                                } else {
                                ?>
                                    <p class="text-muted mb-0"><?php echo $children[0]['civil_status']; ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Religion</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $children[0]['religion']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Purok</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $children[0]['purok_name']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $children[0]['email']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Contact Number</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $children[0]['contact_no']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body text-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>