<?php

function updateFormation()
{
    $formation_id = (int) htmlspecialchars(strip_tags($_GET['id']));
    $elementType = (string) htmlspecialchars(strip_tags($_GET['type']));
    $Formation = new FormationRepository;
    $Stat = new StatRepository;
    $Job = new JobRepository;
    $Activity = new ActivityRepository;
    $Requirement = new RequirementRepository;
    $Program = new ProgramRepository;
    $Fee = new FeeRepository;
    $Certification = new CertificationRepository;

    if ($Formation->checkExistFormation($formation_id)) {
        switch ($elementType) {
            case 'description':
                $description = $_POST['description'];
                if (!empty($description))
                    $Formation->updateDescription($description, $formation_id);
                break;
            case 'stat':
                $stat_number = htmlspecialchars(strip_tags($_POST['stat_number']));
                $stat_name = htmlspecialchars(strip_tags($_POST['stat_name']));
                $stat_id = htmlspecialchars(strip_tags($_POST['stat_id']));
                if (!empty($key_number))
                    $Stat->udpdateNumber($stat_id, $stat_number);
                if (!empty($stat_name))
                    $Stat->udpdateName($stat_id, $stat_name);

                break;
            case 'job':
                $radioJob = htmlspecialchars(strip_tags($_POST['radio-job']));
                if ($radioJob == 'job-select') {
                    $id_job_table = (array) $_POST['job'];
                    if (!empty($id_job_table)) {
                        $Job->deleteLink($formation_id);
                        foreach ($id_job_table as $job_id) {
                            $Job->addLink($formation_id, (int) htmlspecialchars(strip_tags($job_id)));
                        }
                    }
                } else if ($radioJob == 'job-add') {
                    $newJob = htmlspecialchars(strip_tags($_POST['newJob']));
                    $Job->addJob($newJob);
                }

                break;
            case 'formation_activity':
                $id_activity_table = (array) $_POST['activity'];
                if (!empty($id_activity_table)) {
                    $Activity->deleteLink($formation_id);
                    foreach ($id_activity_table as $activity_id) {
                        $Activity->addLink($formation_id, (int) htmlspecialchars(strip_tags($activity_id)));
                    }
                }
                break;
            case 'activity':
                $activity_id = (int) htmlspecialchars(strip_tags($_POST['activity_id']));
                $activity_ref = htmlspecialchars(strip_tags($_POST['ref']));
                $activity_name = htmlspecialchars(strip_tags($_POST['name']));
                $activity_skill = $_POST['skill'];
                if (!empty($activity_ref))
                    $Activity->updateRef($activity_id, $activity_ref);
                if (!empty($activity_name))
                    $Activity->updateName($activity_id, $activity_name);
                if (!empty($activity_skill))
                    $Activity->updateSkill($activity_id, $activity_skill);
                break;
            case 'formation_requirement':
                $id_requirement_table = (array) $_POST['admission'];
                if (!empty($id_requirement_table)) {
                    $Requirement->deleteLink($formation_id);
                    foreach ($id_requirement_table as $requirement_id) {
                        $Requirement->addLink($formation_id, (int) htmlspecialchars(strip_tags($requirement_id)));
                    }
                }
                break;
            case 'program':
                $program_layout_id = (int) htmlspecialchars(strip_tags($_POST['programme_layout_id']));
                $program_description = $_POST['description'];
                if (!empty($program_description))
                    $Program->updateDescription($formation_id, $program_layout_id, $program_description);
                break;
            case 'fee':
                $id_fee_table = (array) $_POST['fee'];
                if (!empty($id_fee_table)) {
                    $Fee->deleteLink($formation_id);
                    foreach ($id_fee_table as $fee_id) {
                        $Fee->addLink($formation_id, (int) htmlspecialchars(strip_tags($fee_id)));
                    }
                }
                break;
            case "formation_certification":
                $id_certification_table = (array) $_POST['certification'];
                if (!empty($id_certification_table)) {
                    $Certification->deleteLink($formation_id);
                    foreach ($id_certification_table as $certification_id) {
                        $Certification->addLink($formation_id, (int) htmlspecialchars(strip_tags($certification_id)));
                    }
                }
                break;
            case "certification":
                $certification_id = (int) htmlspecialchars(strip_tags($_POST['certification_id']));
                $certification_ref = htmlspecialchars(strip_tags($_POST['ref']));
                $certification_name = htmlspecialchars(strip_tags($_POST['name']));
                $certification_link = htmlspecialchars(strip_tags($_POST['link']));
                $certification_description = $_POST['description'];
                if (!empty($certification_ref))
                    $Certification->updateReference($certification_id, $certification_ref);
                if (!empty($certification_name))
                    $Certification->updateName($certification_id, $certification_name);
                if (!empty($certification_link))
                    $Certification->updateLink($certification_id, $certification_link);
                if (!empty($certification_description))
                    $Certification->updateDescription($certification_id, $certification_description);
                break;
            default:
        }
        header('Location: index.php?action=formationPage&id=' . $formation_id);
    } else
        throw new Exception('error_404');

}