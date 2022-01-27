<?php

// get CLO list.
$CLOList = ['CLO-1', 'CLO-2', 'CLO-3'];
$CLOList = removeCLODash($CLOList);

// returns perform db operation by fetching last inserted record.
$WeeklyTopicsArray = array( // is a two dimension array f18-or represents the key and has the following data.
    array('week-1', 'By default, Tailwind includes grid-template-column utilities for creating basic grids with up to 12 equal width columns. You change, add,  or remove these by customizing the gridTemplateColumns section of your Tailwind theme config',
        array('CLO-1', 'CLO-2', 'CLO-3'),
        'CSS property here so you can make your custom column values as generic or as complicated and site-specific',
    ),
    array('week-2', 'Tailwind includes grid-template-column utilities for creating basic grids with up to 12 equal width columns. You change, add,  or remove these by customizing the gridTemplateColumns section of your Tailwind theme config',
        array('CLO-2', 'CLO-3'),
        'CSS property here so you can make your custom column.......................................................'),
);

//$WeeklyTopicsArray = array();

switch (@$_POST['actionType']) {

    case 'SaveData':
        break;
    case 'UpdateData':
        $id = $_POST['id'];
//        $update = $OOP->UpdateData($_GET['idData']);

        break;
    case 'DeleteData':
        $idList = $_POST['deletedWeeklyID'];
        foreach ($idList as $id) {
//            $delete = $OOP->DeleteData($id);
        }
        break;
    default:
        ?>
        <div id="courseLearningHeaderID"
             class="learning-outcome-head learning-week-header-dp overflow-hidden">
            <!--  text-md row-flex w-full mx-0-->
            <div class="lweek-column bg-catalystBlue-l61 text-white col-start-1 col-end-2">
                <!--   flex justify-center items-center min-h-full min-w-full  -->
                <span class="wlearn-cell-data">Week</span>
            </div>
            <div class="lweek-column col-start-2 col-end-7">
                <span class="wlearn-cell-data">Detail of topics covered</span>
            </div>
            <div class="lweek-column col-start-7 col-end-8">
                <span class="wlearn-cell-data">CLO</span>
            </div>
            <div class="lweek-column col-start-8 col-end-12">
                <span class="wlearn-cell-data">Assessment</span>
            </div>
            <div class="lweek-column">
                <span class="wlearn-cell-data">Status</span>
            </div>
        </div>
        <?php
        $counter = 1;
        if (sizeof($WeeklyTopicsArray) != 0) {

            foreach ($WeeklyTopicsArray as $rowData) { ?>

                <div id="weeklyCoveredRow-<?php echo $counter ?>"
                     class="grid grid-cols-12 grid-rows-1 gap-0  w-auto learning-outcome-row h-auto overflow-hidden">
                    <input class="hidden" id="s-wtc-r-<?php echo $counter ?>-id" value="">
                    <div id="wct-wno-r<?php echo $counter ?>"
                         class="lweek-column bg-catalystBlue-l61 text-white col-start-1 col-end-2">
                        <span class="wlearn-cell-data"><?php echo $rowData[0]; ?></span>
                    </div>
                    <div id="wct-wdescription-r<?php echo $counter ?>" class="lweek-column col-start-2 col-end-7">
                        <label for="detail-<?php echo $counter ?>">
            <textarea type="text" class="cell-input pt-4 px-2 w-full h-full font-medium text-sm overflow-hidden min-h-0"
                      value=""
                      placeholder="Write weekly description here..."
                      id="detail-r-<?php echo $counter ?>" readonly="readonly"
                      style="height: 100px;"><?php echo $rowData[1]; ?></textarea></label>
                    </div>
                    <div class="lweek-column  col-start-7 col-end-8">
                        <div id="wtc-clos-r<?php echo $counter ?>" class="flex flex-col overflow-y-visible ">
                            <?php weeklyCLOCheckbox($CLOList, $rowData[2], $counter); ?>
                        </div>
                    </div>
                    <div id="wct-wassessment-r<?php echo $counter ?>" class="lweek-column  col-start-8 col-end-12">
                        <label for="assessment-clo-<?php echo $counter ?>">
            <textarea type="text" class="pt-4 cell-input w-full font-medium text-sm" value=""
                      placeholder="Write week assessment here..."
                      id="assessment-clo-<?php echo $counter ?>"
                      readonly="readonly"><?php echo $rowData[3]; ?></textarea></label>

                    </div>
                    <div class="lweek-column ">
                        <div class="flex flex-row flex-wrap cell-input w-full content-center justify-center">
                            <img class="h-10 w-6" alt=""
                                 src="../../../../Assets/Images/vectorFiles/Icons/add-button.svg"
                                 data-wtc-modify='modify'>
                            <img class="h-10 w-6" alt=""
                                 src="../../../../Assets/Images/vectorFiles/Icons/remove_circle_outline.svg"
                                 data-wtc-remove='remove'>
                        </div>
                    </div>
                </div>
                <?php $counter = $counter + 1;
            }
        } ?>

        <?php
        break;
}

function weeklyCLOCheckbox($CLOList, $checkedClos, $rowCounter)
{
    $cloCounter = 1;
    $checkedClos = removeCLODash($checkedClos);
//    print_r($checkedClos);

    foreach ($CLOList as $cloNo) { ?>

        <div id="wtc-clo-r<?php echo $rowCounter ?>-c<?php echo $cloCounter ?>">
            <?php if (in_array($cloNo, $checkedClos)) { ?>

                <input class="clo-toggle hidden"
                       id="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>ID"
                       value="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>"
                       name="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>"
                       type="checkbox" disabled checked>
            <?php } else { ?>
                <input class="clo-toggle hidden"
                       id="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>ID"
                       value="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>"
                       name="week<?php echo $rowCounter ?>_clo-<?php echo $cloCounter ?>"
                       type="checkbox">
            <?php } ?>

            <label class="inside-label cprofile-cell-data capitalize"
                   for="week<?php echo $rowCounter ?>-clo-<?php echo $cloCounter ?>ID">
                <?php echo $cloNo ?>
                <span><svg width="50px" height="15px"><use xlink:href="#check-tick"></use></svg> </span>
            </label>
        </div>

        <?php $cloCounter++;
    }
}


function removeCLODash($cloArray)
{
    return str_replace("-", "", $cloArray);
}

?>
