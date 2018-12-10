<?php
if(!function_exists('formatMedicineUrl'))
{
    /**
     * Method used to parse response from XML to Laravel Collection.
     *
     * @param $sectionSlug
     * @param $medicineSlug
     * @param $medicineId
     * @return string
     */
    function formatMedicineUrl(string $sectionSlug, string $medicineSlug, int $medicineId)
    {
        return "/$sectionSlug/$medicineSlug/$medicineId";
    }
}

if(!function_exists('formatMedicineCardDate'))
{
    /**
     * Method used to parse response from XML to Laravel Collection.
     *
     * @param $sectionSlug
     * @param $medicineSlug
     * @param $medicineId
     * @return string
     */
    function formatMedicineCardDate($date)
    {
        return Carbon\Carbon::createFromTimeString($date)->diffForHumans();
    }
}



