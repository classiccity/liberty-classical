<?php include(CCC_PLUGIN_PATH.'team/blocks/settings.php'); ?>

<?php

$prefix = prefix().'-people';
$fields = get_fields();

// Get the Order By
$order_by = (strlen($fields['order_by']) > 1) ? $fields['order_by'] : "name";

// All people divided by department
if($fields['style'] === "department") {
    $department_and_people = TeamDepartment::get_all($order_by);
}

// All people within a department
elseif($fields['style'] === "single-department") {
    $department = $fields['which_department'];

    // Get all people in Department
    $people_in_department = new TeamDepartment($department);
    $people_in_department->get_people($order_by);

    $people = $people_in_department->people;
}

// All people
elseif($fields['style'] === "people") {

    $all_people = new TeamDepartment(0);
    $all_people->get_all_people($order_by);

    $people = $all_people->people;

}

// Manually selecting people
elseif($fields['style'] === "manual-people") {

    // List of the People in WP_Post format
    $people_posts = $fields['which_people'];

    // Holder of People objects
    $people = array();

    if(is_array($people_posts) && !empty($people_posts)) {

        foreach($people_posts as $person) {

            // Initialize a new Person class
            $the_person = new TeamPerson($person->ID);

            // Add the object to the array of people
            $people[] = $the_person;

        }

    }

}



// Do we have $people?
if(isset($people) && !empty($people)) {
    $people_organized = new stdClass();
    $people_organized->name = "";
    $people_organized->people = $people;

    $department_and_people = array($people_organized);
}



// Make sure we have departments and people
if(is_array($department_and_people) && !empty($department_and_people)) { ?>

    <div class="<?=$prefix?>">

    <?php

    // Loop through each DEPARTMENT
    foreach($department_and_people as $department) {

        // Do we have people in this Department?
        if(is_array($department->people) && !empty($department->people)) { ?>

            <?php if(strlen($department->name) > 1) { ?>
                <h2><?=$department->name?></h2>
            <?php } ?>

            <div class="<?=$prefix?>__container has-3-columns">

                <?php foreach($department->people as $person) {
                    TeamCore::person_pod($person);
                } ?>

            </div>


        <?php }

    } ?>

    </div>

<?php }