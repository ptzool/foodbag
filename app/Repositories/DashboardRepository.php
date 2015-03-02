<?php namespace Gocompose\Foodbag\Repositories;

use Gocompose\Foodbag\Contracts\Repositories\DashboardRepositoryInterface;
use Illuminate\Support\Facades\DB;

class DashboardRepository implements DashboardRepositoryInterface
{

    /**
     * Constructor
     */
    public function __construct()
    {
    }

    public function stats($userId, $limit = 10)
    {
        /*
        Women: BMR = 655 + ( 9.6 x weight in kilos ) + ( 1.8 x height in cm ) - ( 4.7 x age in years )
        Men: BMR = 66 + ( 13.7 x weight in kilos ) + ( 5 x height in cm ) - ( 6.8 x age in years )
        */
        $parameters = array($userId, $limit);

        $stats = array();

        $end_date_limit = sprintf("-%d day", $limit);
        $end_date = date('Y-m-d', strtotime($end_date_limit, time()));
        $date = date("Y-m-d");


        while (strtotime($date) >= strtotime($end_date)) {

            $stat = array();
            $stat["date"] = $date;
            $stat["weight"] = null;
            $stat["cal_out"] = null;
            $stat["cal_in"] = null;
            $stat["gender"] = null;
            $stat["bmr_m"] = null;
            $stat["bmr_f"] = null;

            $stats[$date] = $stat;

            $date = date ("Y-m-d", strtotime("-1 day", strtotime($date)));
        }

        // EXERCISE - WEIGHT
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $exercises = DB::select("
            SELECT
                    DATE(w.date) as date,
                    w.weight,
                    SUM(((w.weight*3.5*2.20462262*et.met_rate)/200)*e.duration) as cal_out,
                    lcase(p.gender) as gender,
                    66 + (13.7*w.weight) + (5 * p.height*100) - (6.8*((TO_DAYS(CURRENT_DATE()) - TO_DAYS(p.birth))/365.244)) as bmr_m,
                    665 + (9.6*w.weight) + (1.8 * p.height*100) - (4.7*((TO_DAYS(CURRENT_DATE()) - TO_DAYS(p.birth))/365.244)) as bmr_f
                FROM weights w
                    LEFT JOIN activities e ON w.user_id = e.user_id AND DATE(e.activity_date) = DATE(w.date)
                    LEFT JOIN activity_types et ON e.activity_type_id = et.id
                    LEFT JOIN users p ON w.user_id = p.id
                WHERE
                    w.user_id = ? AND
                    w.date >= DATE_SUB(NOW(), INTERVAL ? DAY)
                GROUP BY DATE(w.date)
                ORDER BY DATE(w.date) DESC;
            ", $parameters);
        DB::setFetchMode(\PDO::FETCH_CLASS);

        foreach($exercises as $exercise)
        {
            $stats[$exercise['date']] = $exercise;
            $stats[$exercise['date']]['cal_in'] = null;
        }

        // EATS
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $eats = DB::select("
            SELECT
                    DATE(eatn.eaten) as `date`,
                    SUM(IF(
                            STRCMP(eatn.amount_type,'P'),
                            ((eatn.amount)/f.`size`)*f.calories,
                            ((eatn.amount*f.serving_size)/f.`size`)*f.calories
                    )) as eatn_calories
            FROM eats eatn
                    LEFT JOIN foods f ON eatn.food_id = f.id
            WHERE
                    eatn.user_id = ? AND
                    eatn.eaten >= DATE_SUB(NOW(), INTERVAL ? DAY)
            GROUP BY `date`
            ORDER BY `date` DESC
            ", $parameters);
        DB::setFetchMode(\PDO::FETCH_CLASS);

        foreach($eats as $eat)
        {
            $stats[$eat['date']]['cal_in'] = $eat['eatn_calories'];
        }

        return $stats;
    }


}
