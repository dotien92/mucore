<?php
function votesReset()
{
    // Current day 
    $currentDay = date("d");
    // Reset day
    $resetDay = "01";

    if($currentDay == $resetDay)
    {
        // do query
        mssql_query("Update dbo.MEMB_INFO set TVote='0'");
            
        echo "All total votes reseted";
    }
}
votesReset();
?>