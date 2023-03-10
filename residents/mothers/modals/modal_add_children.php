<?php
require_once('../../model/CivilStatus.php');
require_once('../../model/Religion.php');
require_once('../../model/Purok.php');

$civil_status = new CivilStatus;
$all_civil_status = $civil_status->getCivilStatusAll();

$religions = new Religion;
$all_religion = $religions->getReligionAll();

$puroks = new Purok;
$all_purok = $puroks->getPurokAll();
?>

<div class="modal fade" id="modal_add_children" tabindex="-1" role="dialog" aria-labelledby="modalAddChildren" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddChildren"><strong>Add Children</strong></h5>
            </div>
            <form class="needs-validation" novalidate action="index.php" method="post">
                <input type="hidden" id="mother_id" name="mother_id" required>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First Name *</label>
                            <input type="text" class="form-control" id="children_first_name" required value="" name="first_name">
                            <div class="invalid-feedback">
                                Please enter first name.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="children_middle_name" value="" name="middle_name">
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" id="children_last_name" required value="" name="last_name">
                            <div class="invalid-feedback">
                                Please enter last name.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="prefix" class="form-label">Prefix</label>
                            <input type="text" class="form-control" id="children_prefix" value="" placeholder="e.g. Jr." name="prefix" maxlength="5">
                        </div>
                        <div class="col-md-6">
                            <label for="sex" class="form-label">Sex *</label>
                            <select id="children_sex" class="form-select" required name="sex">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="birthdate" class="form-label">Date of Birth *</label>
                            <input type="date" class="form-control" id="children_birthdate" required value="" name="birthdate">
                            <div class="invalid-feedback">
                                Please select a valid date.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="birthplace" class="form-label">Place of Birth *</label>
                            <input type="text" class="form-control" id="children_birthplace" required value="" name="birthplace">
                            <div class="invalid-feedback">
                                Please enter place of birth.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="civil_status" class="form-label">Civil Status *</label>
                            <select id="children_civil_status" class="form-select" required onchange="civil_status_change()" name="civil_status">
                                <?php
                                foreach ($all_civil_status as $status) {
                                ?>
                                    <option value="<?php echo $status['civil_status'] ?>"><?php echo $status['civil_status'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="children_highest_educ_attainment" class="form-label">Highest Educational Attainment *</label>
                            <select id="children_highest_educ_attainment" class="form-select" required name="highest_educ_attainment">
                                <option value="No Grade">No Grade</option>
                                <option value="Grade School">Grade School</option>
                                <option value="High School">High School</option>
                                <option value="Post Secondary">Post Secondary</option>
                                <option value="College">College</option>
                                <option value="Master/Doctoral">Master/Doctoral</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="religion" class="form-label">Religion *</label>
                            <select id="children_religion" class="form-select" required name="religion">
                                <?php
                                foreach ($all_religion as $religion) {
                                ?>
                                    <option value="<?php echo $religion['religion_name'] ?>"><?php echo $religion['religion_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="children_disability" class="form-label">Disability *</label>
                            <select id="children_disability" class="form-select" required name="disability">
                                <option value="None">None</option>
                                <option value="Total Blindness">Total Blindness</option>
                                <option value="Partial Blindness">Partial Blindness</option>
                                <option value="Low Vision">Low Vision</option>
                                <option value="Totally Deaf">Totally Deaf</option>
                                <option value="Partially Deaf">Partially Deaf</option>
                                <option value="Oral Defect">Oral Defect</option>
                                <option value="One Hand">One Hand</option>
                                <option value="No Hands">No Hands</option>
                                <option value="One Leg">One Leg</option>
                                <option value="No Legs, Mild Cerebral Palsy">No Legs, Mild Cerebral Palsy</option>
                                <option value="Severe Cerebral Palsy">Severe Cerebral Palsy</option>
                                <option value="Retarded">Retarded</option>
                                <option value="Mentally Ill">Mentally Ill</option>
                                <option value="Mental Retardation">Mental Retardation</option>
                                <option value="Multiple Impairment">Multiple Impairment</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="children_email" value="" name="email">
                            <div class="invalid-feedback">
                                Please enter a valid email.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="contact_no" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="children_contact_no" pattern="[0-9]{11}" value="" name="contact_no" maxlength="11">
                            <div class="invalid-feedback">
                                Please enter a valid phone number, ex: 09123456789.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" id="btn_close_modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn_save_children" name="request_add_children">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>