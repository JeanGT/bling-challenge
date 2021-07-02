<?php
class Exercise3 extends Exercise
{
    protected function readInput()
    {
        return [
            Input::readDate("Digite a data inicial (dd/mm/aaaa): "),
            Input::readDate("Digite a data final (dd/mm/aaaa): ")
        ];
    }

    protected function solve($input)
    {
        list($initial_date, $final_date) = $input;

        $initial_day = $initial_date[0];
        $initial_month = $initial_date[1];
        $initial_year = $initial_date[2];

        $final_day = $final_date[0];
        $final_month = $final_date[1];
        $final_year = $final_date[2];

        $months_dictionary = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        $total_initial_days = $initial_day;
        for ($i = 0; $i < $initial_month - 1; $i++) {
            $total_initial_days += $months_dictionary[$i];
        }
        $total_initial_days += $initial_year * 365;

        $total_final_days = $final_day;
        for ($i = 0; $i < $final_month - 1; $i++) {
            $total_final_days += $months_dictionary[$i];
        }
        $total_final_days += $final_year * 365;

        //Corrects $initial_year and $final_year for leap years calculation
        if ($initial_month <= 2) $initial_year--;
        if ($final_month <= 2) $final_year--;

        //Adds all leap years since year 0
        $total_initial_days += $this->calcLeapYears($initial_year);
        $total_final_days += $this->calcLeapYears($final_year);

        return $total_final_days - $total_initial_days;
    }

    protected function displayAnswer($answer)
    {
        echo "Resultado: \n";
        print_r("Se passaram $answer dias entre as datas");
    }

    private function calcLeapYears(int $year)
    {
        return (int)($year / 4) - (int)($year / 100) + (int)($year / 400);
    }
}
